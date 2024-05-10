<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Models\Recipient;
use App\Models\Tracking;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TrackingService
{

    public static function storeIntegrationTracking($tracking_data)
    {
        $lastTracking = null;

        foreach ($tracking_data as $data) {
            
            $tracking = new Tracking();
            $tracking->message = $data['message'];
            $tracking->date = date('Y-m-d H:i:s', strtotime($data['date']));
            $tracking->save();

            $lastTracking = $tracking;
        }

        return $lastTracking;
    }
}
