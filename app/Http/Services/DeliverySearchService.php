<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Facades\FileDelivery;
use App\Models\Recipient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DeliverySearchService
{

    public static function searchDeliveryByCPF($cpf): Collection
    {

        $deliveries = self::searchRecipientByCpfOnDb($cpf);

        if ($deliveries->isEmpty()) {
            $deliveries = self::searchRecipientByCpfOnApi($cpf);
        }

        return $deliveries;
    }

    public static function searchRecipientByCpfOnDb($cpf): Collection
    {
        $search = DB::table('deliveries')
            ->select(
                'deliveries.delivery_uuid as _id',
                'deliveries.carrier_uuid as _id_transportadora',
                'deliveries.volumes as _volumes',
                'senders.name as _remetente_nome',
                'recipients.name as _destinatario_nome',
                'recipients.cpf as _destinatario_cpf',
                'recipients.address as _endereco',
                'recipients.state as _estado',
                'recipients.cep as _cep',
                'recipients.country as _pais',
                'recipients.geo_lat as _lat',
                'recipients.geo_lng as _lng',
                'trackings.message as message',
                'trackings.date as date'
            )
            ->join('recipients', 'deliveries.recipient_id', '=', 'recipients.id')
            ->join('senders', 'deliveries.sender_id', '=', 'senders.id')
            ->join('trackings', 'deliveries.tracking_id', '=', 'trackings.id')
            ->where('recipients.cpf', '=', $cpf)
            ->get();


        $formattedResult = $search->map(function ($item) {
            return [
                '_id' => $item->_id,
                '_id_transportadora' => $item->_id_transportadora,
                '_volumes' => $item->_volumes,
                '_remetente' => [
                    '_nome' => $item->_remetente_nome
                ],
                '_destinatario' => [
                    '_nome' => $item->_destinatario_nome,
                    '_cpf' => $item->_destinatario_cpf,
                    '_endereco' => $item->_endereco,
                    '_estado' => $item->_estado,
                    '_cep' => $item->_cep,
                    '_pais' => $item->_pais,
                    '_geolocalizao' => [
                        '_lat' => $item->_lat,
                        '_lng' => $item->_lng
                    ]
                ],
                '_rastreamento' => [
                    [
                        'message' => $item->message,
                        'date' => $item->date
                    ]
                ]
            ];
        });

        return collect($formattedResult);
    }

    public static function searchRecipientByCpfOnApi($cpf): Collection
    {
        

        $apiResponse = ApiDelivery::get('6334edd3-ad56-427b-8f71-a3a395c5a0c7')->json();

        if(!isset($apiResponse))
        {
            $apiResponse = FileDelivery::loadFile('app/JsonFiles/API_LISTAGEM_ENTREGAS.json');
        }

        $dataCollection = collect($apiResponse['data']);

        $filteredData = $dataCollection->filter(
            function ($delivery) use ($cpf) {
                return isset($delivery['_destinatario']['_cpf']) && $delivery['_destinatario']['_cpf'] === $cpf;
            }
        )
            ->values();

        DeliveryService::storeIntegrationDelivery($filteredData);

        return $filteredData;
    }

    public static function queryRecipientWithoutFilterByCpf()
    {
        $search = DB::table('deliveries')
            ->select(
                'deliveries.delivery_uuid as _id',
                'deliveries.carrier_uuid as _id_transportadora',
                'deliveries.volumes as _volumes',
                'senders.name as _remetente_nome',
                'recipients.name as _destinatario_nome',
                'recipients.cpf as _destinatario_cpf',
                'recipients.address as _endereco',
                'recipients.state as _estado',
                'recipients.cep as _cep',
                'recipients.country as _pais',
                'recipients.geo_lat as _lat',
                'recipients.geo_lng as _lng',
                'trackings.message as message',
                'trackings.date as date'
            )
            ->join('recipients', 'deliveries.recipient_id', '=', 'recipients.id')
            ->join('senders', 'deliveries.sender_id', '=', 'senders.id')
            ->join('trackings', 'deliveries.tracking_id', '=', 'trackings.id')
            ->get();


        $formattedResult = $search->map(function ($item) {
            return [
                '_id' => $item->_id,
                '_id_transportadora' => $item->_id_transportadora,
                '_volumes' => $item->_volumes,
                '_remetente' => [
                    '_nome' => $item->_remetente_nome
                ],
                '_destinatario' => [
                    '_nome' => $item->_destinatario_nome,
                    '_cpf' => $item->_destinatario_cpf,
                    '_endereco' => $item->_endereco,
                    '_estado' => $item->_estado,
                    '_cep' => $item->_cep,
                    '_pais' => $item->_pais,
                    '_geolocalizao' => [
                        '_lat' => $item->_lat,
                        '_lng' => $item->_lng
                    ]
                ],
                '_rastreamento' => [
                    [
                        'message' => $item->message,
                        'date' => $item->date
                    ]
                ]
            ];
        });

        return collect($formattedResult);
    }
}
