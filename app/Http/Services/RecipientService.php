<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Models\Recipient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RecipientService
{

    public static function storeIntegrationRecipient($recipient_data) 
    {
        $recipient = new Recipient();
        $recipient->name = $recipient_data['_nome'];
        $recipient->cpf = $recipient_data['_cpf'];
        $recipient->address = $recipient_data['_endereco'];
        $recipient->state = $recipient_data['_estado'];
        $recipient->cep = $recipient_data['_cep'];
        $recipient->country = $recipient_data['_pais'];
        $recipient->geo_lat = $recipient_data['_geolocalizao']['_lat'];
        $recipient->geo_lng = $recipient_data['_geolocalizao']['_lng'];
        $recipient->save();

        return $recipient;
    }

}