<?php

namespace App\Http\Services\Integration;

use App\Models\Recipient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class IntegrationRecepientService
{
    public static function storeRecepient(Array $recipient_data)
    {
        DB::beginTransaction();
        try {
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

            Log::info('Register create' . $recipient->id . 'on table recipients');
            DB::commit();

            return $recipient;
            
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in integration recipient method at ' . __METHOD__ . ' on ' . __LINE__ . ': ' . $e->getMessage());
            throw ValidationException::withMessages(['Erro ao realizar integração, contate o suporte!']);
        }
    }
}