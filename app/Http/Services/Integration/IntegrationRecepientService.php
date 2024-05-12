<?php

namespace App\Http\Services\Integration;

use App\Models\Recipient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class IntegrationRecepientService
{
    public static function storeRecepient(Array $recipientData)
    {
        DB::beginTransaction();
        try {
            $recipient = new Recipient();
            $recipient->name = $recipientData['_nome'];
            $recipient->cpf = $recipientData['_cpf'];
            $recipient->address = $recipientData['_endereco'];
            $recipient->state = $recipientData['_estado'];
            $recipient->cep = $recipientData['_cep'];
            $recipient->country = $recipientData['_pais'];
            $recipient->geo_lat = $recipientData['_geolocalizao']['_lat'];
            $recipient->geo_lng = $recipientData['_geolocalizao']['_lng'];
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