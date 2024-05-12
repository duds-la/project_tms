<?php

namespace App\Http\Services\Integration;

use App\Models\Sender;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class IntegrationSenderService
{
    public static function storeSender(Array $senderData): Sender
    {
        DB::beginTransaction();
        try {
            $sender = new Sender();
            $sender->name = $senderData['_nome'];
            $sender->save();

            Log::info('Register create' . $sender->id . 'on table senders');
            DB::commit();

            return $sender;
            
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in integration sender method at ' . __METHOD__ . ' on ' . __LINE__ . ': ' . $e->getMessage());
            throw ValidationException::withMessages(['Erro ao realizar integração, contate o suporte!']);
        }
    }
}