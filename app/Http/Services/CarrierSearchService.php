<?php

namespace App\Http\Services;

use App\Http\Services\Search\CarrierSearchByNameService;
use App\Http\Services\Search\CarrierSearchByUuidService;
use App\Interfaces\CarrierSearchInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CarrierSearchService implements CarrierSearchInterface
{

    public function searchByName(string $name) : Collection
    {
        $search = new CarrierSearchByNameService();
        $carrier = $search->searchCarrierByNameOnDb($name);
        
        return $carrier;
    }

    public function searchByUuid(string $uuid): Collection
    {
        $search = new CarrierSearchByUuidService();
        $carrier = $search->searchCarrierByUuidOnDb($uuid);

        if($carrier->isEmpty())
        {
            $carrier = $search->searchCarrierByUuidOnApi($uuid);
        }
        $carrier = $search->searchCarrierByUuidOnDb($uuid);

        return $carrier;
    }
    
}
