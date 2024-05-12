<?php

namespace App\Interfaces;

use App\Models\Recipient;
use App\Models\Sender;
use App\Models\Tracking;
use Illuminate\Support\Collection;

interface IntegrationInterface
{
    public function storeIntegrationCarrier(Collection $carrier): void;

    public function storeIntegrationDelivery(Collection $delivery): void;

    public function storeIntegrationSender(Array $sender): Sender;

    public function storeIntegrationRecepient(Array $recepient): Recipient;

    public function storeIntegrationTracking(Array $tracking, mixed $delivery_uuid): Tracking;
}