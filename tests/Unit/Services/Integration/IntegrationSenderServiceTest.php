<?php

namespace Tests\Unit\Services\Integration;

use App\Http\Services\Integration\IntegrationSenderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class IntegrationSenderServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_integration_service()
    {  
        $data = array( 
            "_nome"=>"Pedro Alves"
            );
        $newCarrier = new IntegrationSenderService();
        $deliveries = $newCarrier->storeSender($data);

        $this->assertNotEquals(null, $deliveries);
    }

}
