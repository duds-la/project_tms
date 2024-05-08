<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Models\Recipient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DeliveryService
{

    public function searchDeliveryByCPF($cpf) : Collection
    {

        $deliveries = self::searchRecipientByCpfOnDb($cpf);
        
        if($deliveries->isEmpty())
        {
            $deliveries = self::searchRecipientByCpfOnApi($cpf);
        }
        
        return $deliveries;
    }

    public static function searchRecipientByCpfOnDb($cpf) : Collection
    {
        $search = DB::table('deliveries')
        ->join('recipients', 'deliveries.recipient_id', '=', 'recipients.id')
        ->where('recipients.cpf', '=', $cpf)
        ->select('deliveries.*')
        ->get();
        
        return $search;
    }

    public static function searchRecipientByCpfOnApi($cpf) : Collection
    {
        
        $apiResponse = ApiDelivery::get('6334edd3-ad56-427b-8f71-a3a395c5a0c7')->json();
        
        $dataCollection = collect($apiResponse['data']);
        
        
        $filteredData = $dataCollection->filter(
            function ($delivery) use ($cpf) 
            {
                return isset($delivery['_destinatario']['_cpf']) && $delivery['_destinatario']['_cpf'] === $cpf;
            }
        )
        ->values(); 

        return $filteredData;

    }
}