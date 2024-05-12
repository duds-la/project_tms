<?php

namespace Tests\Unit\Services\Integration;

use App\Http\Services\DeliverySearchService;
use App\Http\Services\Integration\IntegrationCarrierService;
use App\Http\Services\Integration\IntegrationRecepientService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class IntegrationRecepientServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_integration_service()
    {  
        $data = array( 
            "_nome"=>"Pedro Alves",
            "_cpf"=> "01582267049",
            "_endereco"=>"Avenida Principal, 7829",
            "_estado"=>"Pernambuco",
            "_cep"=>"09876-543",
            "_pais"=>"Brasil",
            "_geolocalizao"=>[
               "_lat"=>"-8.0476",
               "_lng"=>"-34.8770"
            ]
            );
        $newCarrier = new IntegrationRecepientService();
        $deliveries = $newCarrier->storeRecepient($data);

        $this->assertNotEquals(null, $deliveries);
    }

}
