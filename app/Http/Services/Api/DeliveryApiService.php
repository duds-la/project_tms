<?php

namespace App\Http\Services\Api;

use App\Facades\ApiDelivery;
use App\Facades\FileDelivery;


class DeliveryApiService
{
    public function getDataApiDelivery(): mixed
    {
        $apiResponse = ApiDelivery::get('6334edd3-ad56-427b-8f71-a3a395c5a0c7')->json();

        if (!isset($apiResponse)) {
            $apiResponse = FileDelivery::loadFile('app/JsonFiles/API_LISTAGEM_ENTREGAS.json');
        }

        return $apiResponse;
    }
}