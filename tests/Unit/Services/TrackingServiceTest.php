<?php

namespace Tests\Unit\Services;

use App\Http\Services\TrackingService;
use App\Models\Tracking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class TrackingServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_integration_tracking()
    {
        $tracking_data = [
           
                [
                    "message" => "ENTREGA CRIADA",
                    "date" => "2023-11-14T09:00:00Z"
                ]
            
        ];

        $service = new TrackingService();
        $integration = $service->storeIntegrationTracking($tracking_data);

        $this->assertEquals(1, Tracking::count());
        
    }


}
