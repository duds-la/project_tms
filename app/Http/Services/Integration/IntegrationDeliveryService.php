<?php

namespace App\Http\Services\Integration;

use App\Http\Services\IntegrationService;
use App\Models\Carrier;
use App\Models\Delivery;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class IntegrationDeliveryService
{
    public static function storeDelivery(Collection $delivery_data)
    {
        DB::beginTransaction();

        $integration = new IntegrationService();

        try {
            foreach ($delivery_data as $data) {
                $delivery_uuid = $data['_id'];
                $volumes = $data['_volumes'];
                $carrier_uuid = $data['_id_transportadora'];

                $sender_data = $data['_remetente'];
                $recipient_data = $data['_destinatario'];
                $tracking_data = $data['_rastreamento'];

                $sender = $integration->storeIntegrationSender($sender_data);
                $tracking = $integration->storeIntegrationTracking($tracking_data, $delivery_uuid);
                $recipient = $integration->storeIntegrationRecepient($recipient_data);

                $delivery = new Delivery();

                $delivery->delivery_uuid = $delivery_uuid;
                $delivery->volumes = $volumes;
                $delivery->carrier_uuid = $carrier_uuid;
                $delivery->sender_id = $sender['id'];
                $delivery->tracking_id = $tracking['id'];
                $delivery->recipient_id = $recipient['id'];

                $delivery->save();

                Log::info('Register create'. $delivery->id . 'on table deliveries');

            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in integration Delivery method at '. __METHOD__. ' on ' . __LINE__ . ': ' . $e->getMessage());
            throw ValidationException::withMessages(['Erro ao realizar integração, contate o suporte!']);
        }
    }
}