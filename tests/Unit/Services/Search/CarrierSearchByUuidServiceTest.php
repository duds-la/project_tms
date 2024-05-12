<?php

namespace Tests\Unit\Services\Search;

use App\Http\Services\CarrierSearchService;
use App\Http\Services\DeliverySearchService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CarrierSearchByUuidServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_search_recipient_by_cpf_on_api()
    {  
        $service = new CarrierSearchService();
        $deliveries = $service->searchByUuid('b03aae7e-2014-4a1b-8fbf-589f7e42c39e');

        $this->assertNotEquals(null, $deliveries);
    }

}
