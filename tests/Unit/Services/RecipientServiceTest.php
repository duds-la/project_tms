<?php

namespace Tests\Unit\Services;

use App\Http\Services\RecipientService;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RecipientServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_integration_recipient()
    {
        $recipient_data = [
            "_nome" => "Maria Oliveira",
            "_cpf" => "35595606088",
            "_endereco" => "Avenida Principal, 456",
            "_estado" => "Rio de Janeiro",
            "_cep" => "04567-890",
            "_pais" => "Brasil",
            "_geolocalizao" => [
                "_lat" => "-22.9068",
                "_lng" => "-43.1729"
            ]
        ];

        $service = new RecipientService();
        $integration = $service->storeIntegrationRecipient($recipient_data);

        $this->assertEquals(1, Recipient::count());
        
    }


}
