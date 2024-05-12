<?php

namespace App\Http\Services\Search;

use App\Http\Services\Api\DeliveryApiService;
use App\Http\Services\CarrierSearchService;
use App\Http\Services\FormateDataService;
use App\Http\Services\IntegrationService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DeliverySearchByCpfService
{
    public function searchDeliveryByCpfOnDb(string $cpf): Collection
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
                'trackings.date as date',
                'carriers.company_name as company_name'
            )
            ->join('recipients', 'deliveries.recipient_id', '=', 'recipients.id')
            ->join('senders', 'deliveries.sender_id', '=', 'senders.id')
            ->join('trackings', 'deliveries.tracking_id', '=', 'trackings.id')
            ->join('carriers', 'deliveries.carrier_uuid', '=', 'carriers.uuid')
            ->where('recipients.cpf', '=', $cpf)
            ->get();

        $formattedResult = $search->map(function ($item) {
            return [
                '_id' => $item->_id,
                '_id_transportadora' => $item->_id_transportadora,
                '_nome_transportadora' => $item->company_name,
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

    public function searchDeliveryByCpfOnApi(string $cpf)
    {
        $integration = new IntegrationService();

        $delivery_api = new DeliveryApiService();

        $response = $delivery_api->getDataApiDelivery();

        $dataCollection = collect($response['data']);

        $position = ['_destinatario','_cpf'];

        $formate = new FormateDataService();

        $filteredData = $formate->formateDataAssociativeArray($dataCollection, $position, $cpf);

        if ($filteredData->isEmpty()) {

            throw ValidationException::withMessages(['CPF não encontrado, por favor verifique os números inseridos!']);
        }

        $uuid = $filteredData[0]['_id_transportadora'];
        $carrier = new CarrierSearchService();
        $dataCarrier = $carrier->searchByUuid($uuid);

        $companName = ['_nome_transportadora' => $dataCarrier[0]->company_name];


        $newDelivery = $integration->storeIntegrationDelivery($filteredData);
        
        $filteredData[0] = array_merge($filteredData[0], $companName);
        return $filteredData;
    }

}