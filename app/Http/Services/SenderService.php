<?php

namespace App\Http\Services;

use App\Facades\ApiDelivery;
use App\Models\Recipient;
use App\Models\Sender;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SenderService
{

    public static function storeIntegrationSender($sender_data) 
    {
        
        $sender = new Sender();
        $sender->name = $sender_data['_nome'];
        $sender->save();

        return $sender;
    }

}