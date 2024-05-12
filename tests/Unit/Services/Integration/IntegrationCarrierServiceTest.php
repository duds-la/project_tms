<?php

namespace Tests\Unit\Services\Integration;

use App\Http\Services\DeliverySearchService;
use App\Http\Services\Integration\IntegrationCarrierService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class IntegrationCarrierServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_integration_service()
    {  
        $data = collect( [0=>[
            "_id"=> "1f0a1c69-3e02-4f40-a10e-1b8c80d5d7c6",
            "_cnpj"=> 1234567890001,
            "_fantasia"=> "SWIFT CARGO"
        ]]);
        $newCarrier = new IntegrationCarrierService();
        $deliveries = $newCarrier->storeCarrier($data);

        $this->assertEquals(null, $deliveries);
    }

}
