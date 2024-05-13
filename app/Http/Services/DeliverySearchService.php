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


}
