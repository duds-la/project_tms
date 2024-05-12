<?php

namespace App\Http\Services\Api;

use App\Facades\ApiCarrier;
use App\Facades\FileCarrier;


class CarrierApiService
{
    public function getDataApiCarrier(): mixed
    {
        $apiResponse = ApiCarrier::get('e8032a9d-7c4b-4044-9d00-57733a2e2637')->json();

        if (!isset($apiResponse)) {
            
            $apiResponse = FileCarrier::loadFile('app/JsonFiles/API_LISTAGEM_TRANSPORTADORAS.json');

        }

        return $apiResponse;
    }
}