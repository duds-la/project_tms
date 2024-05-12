<?php

namespace App\Http\Services\Search;

use App\Facades\ApiDelivery;
use App\Facades\FileDelivery;
use App\Http\Services\Api\CarrierApiService;
use App\Http\Services\CarrierService;
use App\Http\Services\FormateDataService;
use App\Http\Services\IntegrationService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CarrierSearchByUuidService
{
    public function searchCarrierByUuidOnDb(string $uuid): Collection
    {
        $carriers = DB::table('carriers')
            ->select('*')
            ->where('uuid', $uuid)
            ->get();

        return $carriers;
    }

    public function searchCarrierByUuidOnApi($uuid): void
    {

        $carrier_api = new CarrierApiService();

        $response = $carrier_api->getDataApiCarrier();

        $dataCollection = collect($response['data']);

        $position = '_id';

        $formate = new FormateDataService();

        $filteredData = $formate->formateData($dataCollection, $position, $uuid);

        if ($filteredData->isEmpty()) {

            throw ValidationException::withMessages(['Erro ao buscar Transportadoras, contate o suporte']);

        }

        $new_carrier = new IntegrationService();
        $new_carrier->storeIntegrationCarrier($filteredData);

    }
}