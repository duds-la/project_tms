<?php

namespace Tests\Unit\Services\Api;

use App\Http\Services\Api\CarrierApiService;
use App\Http\Services\DeliverySearchService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CarrierApiServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_search_api_delivery()
    {  
        $api_delivery = new CarrierApiService();
        $deliveries = $api_delivery->getDataApiCarrier();

        $this->assertNotEquals(null, $deliveries);
    }

}
