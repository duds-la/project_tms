<?php

namespace App\Http\Services\Integration;

use App\Models\Carrier;
use App\Models\Tracking;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class IntegrationTrackingService
{
    public static function storeTracking(Array $trackingData, $delivery_uuid): Tracking
    {
        DB::beginTransaction();
        try {
            $lastTracking = null;

            foreach ($trackingData as $data) {

                $tracking = new Tracking();
                $tracking->message = $data['message'];
                $tracking->date = date('Y-m-d H:i:s', strtotime($data['date']));
                $tracking->delivery_uuid = $delivery_uuid;
                $tracking->save();

                $lastTracking = $tracking;

                Log::info('Register create'. $tracking->id . 'on table trackings');
                DB::commit();
            }

            return $lastTracking;
            
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in integration tracking method at ' . __METHOD__ . ' on ' . __LINE__ . ': ' . $e->getMessage());
            throw ValidationException::withMessages(['Erro ao realizar integração, contate o suporte!']);
        }
    }
}