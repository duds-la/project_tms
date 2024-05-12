<?php

namespace Tests\Unit\Services\Search;

use App\Http\Services\DeliverySearchService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CarrierSearchByNameServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_search_recipient_by_cpf_on_api()
    {  
        $service = new DeliverySearchService();
        $deliveries = $service->searchRecipientByCpfOnApi('35595606088');

        $this->assertNotEquals(null, $deliveries);
    }

}
