<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Models\Delivery;
use App\Models\Recipient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class IntegrationService
{

    public static function integrationDelivery($filteredData)
    {
        foreach ($filteredData as $data) {
            
            $delivery_uuid =$data['_id'];
            $volumes = $data['_volumes'];
            $carrier_uuid = $data['_id_transportadora'];
            
            $sender_data = $data['_remetente'];
            $recipient_data = $data['_destinatario'];
            $tracking_data = $data['_rastreamento'];

            $sender = SenderService::storeIntegrationSender($sender_data);
            $tracking = TrackingService::storeIntegrationTracking($tracking_data);
            $recipient = RecipientService::storeIntegrationRecipient($recipient_data);

            $delivery = new Delivery();

            $delivery->delivery_uuid = $delivery_uuid;
            $delivery->volumes = $volumes;
            $delivery->carrier_uuid = $carrier_uuid;
            $delivery->sender_id = $sender['id'];
            $delivery->tracking_id = $tracking['id'];
            $delivery->recipient_id = $recipient['id'];

            $delivery->save();
    
        }

    }

}