<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Http\Services\Integration\IntegrationCarrierService;
use App\Http\Services\Integration\IntegrationDeliveryService;
use App\Http\Services\Integration\IntegrationRecepientService;
use App\Http\Services\Integration\IntegrationSenderService;
use App\Http\Services\Integration\IntegrationTrackingService;
use App\Interfaces\IntegrationInterface;
use App\Models\Carrier;
use App\Models\Delivery;
use App\Models\Recipient;
use App\Models\Sender;
use App\Models\Tracking;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class IntegrationService implements IntegrationInterface
{

    public function storeIntegrationCarrier(Collection $carrier_data): void
    {
        $new_carrier = new IntegrationCarrierService();
        $new_carrier->storeCarrier($carrier_data);
    }

    public function storeIntegrationDelivery(Collection $delivery): void
    {

        $new_delivery = new IntegrationDeliveryService();
        $new_delivery->storeDelivery($delivery);
    }

    public function storeIntegrationSender(Array $senderData): Sender
    {
        $new_sender = new IntegrationSenderService();
        $sender = $new_sender->storeSender($senderData);

        return $sender;
    }

    public function storeIntegrationRecepient(Array $recepientData): Recipient
    {
        $newRecepient = new IntegrationRecepientService();
        $recepient = $newRecepient->storeRecepient($recepientData);

        return $recepient;
    }

    public function storeIntegrationTracking(Array $trackingData, mixed $delivery_uuid) : Tracking
    {
        $newTracking = new IntegrationTrackingService();
        $tracking = $newTracking->storeTracking($trackingData,$delivery_uuid);

        return $tracking;
    }
    
}
