<?php

namespace Tests\Unit\Services\Api;

use App\Http\Services\Api\DeliveryApiService;
use App\Http\Services\DeliverySearchService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class DeliveryApiServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_search_api_delivery()
    {  
        $api_delivery = new DeliveryApiService();
        $deliveries = $api_delivery->getDataApiDelivery();

        $this->assertNotEquals(null, $deliveries);
    }

}
