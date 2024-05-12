<?php

namespace App\Http\Services\Search;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DeliverySearchAboutDetailsService
{
    public function searchDeatilsDelivery(string $uuid): Collection
    {
        $search = DB::table('deliveries')
            ->select(
                'deliveries.*',
                'senders.name AS senders_name',
                'recipients.*',
                'carriers.*'
            )
            ->join('recipients', 'deliveries.recipient_id', '=', 'recipients.id')
            ->join('senders', 'deliveries.sender_id', '=', 'senders.id')
            ->leftJoin('trackings', 'deliveries.delivery_uuid', '=', 'trackings.delivery_uuid')
            ->join('carriers', 'deliveries.carrier_uuid', '=', 'carriers.uuid')
            ->where('deliveries.delivery_uuid', '=', $uuid)
            ->groupBy('deliveries.id', 'senders_name', 'recipients.id', 'carriers.id')
            ->get();


        $search_message = DB::table('trackings')
            ->select(
                '*'
            )
            ->where('trackings.delivery_uuid', '=', $uuid)
            ->get();

        
        if($search_message)
        {
            $search[0]->messages = $search_message;
        }

        return $search;
    }

}