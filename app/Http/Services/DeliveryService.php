<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Models\Recipient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DeliveryService
{

    public static function deliveriesByCPF($cpf) : Collection
    {

        $deliveries = DeliverySearchService::searchDeliveryByCPF($cpf);
        
        return $deliveries;
    }

    public static function storeIntegrationDelivery($filteredData) 
    {

        $integration = IntegrationService::integrationDelivery($filteredData);

        return $integration;
    }

    public static function deliveriesListWithoutFilterByCpf() : Collection
    {

        $deliveries = DeliverySearchService::queryRecipientWithoutFilterByCpf();

        return $deliveries;
    }


}