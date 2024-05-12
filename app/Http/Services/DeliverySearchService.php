<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Facades\FileDelivery;
use App\Http\Services\Search\DeliverySearchAboutDetailsService;
use App\Http\Services\Search\DeliverySearchByCpfService;
use App\Http\Services\Search\DeliverySearchWithoutCpfService;
use App\Interfaces\DeliverySearchInterface;
use App\Models\Recipient;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DeliverySearchService implements DeliverySearchInterface
{

    public function searchByCPF(string $cpf): Collection
    {

        $search = new DeliverySearchByCpfService();
        $delivery = $search->searchDeliveryByCpfOnDb($cpf);

        if($delivery->isEmpty())
        {
            $delivery = $search->searchDeliveryByCpfOnApi($cpf);
        }

        return $delivery;
    }

    public function searchWithoutCPF(): Collection
    {
        $search = new DeliverySearchWithoutCpfService();
        $delivery = $search->searchDeliveryWithoutCpfOnDb();

        return $delivery;
    }

    public function searchDeatilsDelivery(string $uuid): Collection
    {
        $search = new DeliverySearchAboutDetailsService();
        $details = $search->searchDeatilsDelivery($uuid);
        
        return $details;
    }

    public static function searchRecipientByCpfOnApi($cpf)
    {

        $apiResponse = ApiDelivery::get('6334edd3-ad56-427b-8f71-a3a395c5a0c7')->json();

        if (!isset($apiResponse)) {
            $apiResponse = FileDelivery::loadFile('app/JsonFiles/API_LISTAGEM_ENTREGAS.json');
        }

        $dataCollection = collect($apiResponse['data']);

        $filteredData = $dataCollection->filter(
            function ($delivery) use ($cpf) {
                return isset($delivery['_destinatario']['_cpf']) && $delivery['_destinatario']['_cpf'] === $cpf;
            }
        )
            ->values();

        if ($filteredData->isEmpty()) {

            throw ValidationException::withMessages(['CPF não encontrado, por favor verifique os números inseridos!']);
        }
        
    }

}
