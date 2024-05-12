<?php

namespace Tests\Unit\Services\Integration;

use App\Http\Services\Integration\IntegrationTrackingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class IntegrationTrackingServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_integration_service()
    {
        $data = array(

            0 => [
                "message" => "ENTREGA CRIADA",
                "date" => "2023-11-24T08:00:00Z"
            ],
            1 => [
                "message" => "EM TRÂNSITO",
                "date" => "2023-11-25T09:30:00Z"
            ],
            2 => [
                "message" => "CHEGOU À FILIAL DA CIDADE",
                "date" => "2023-11-26T10:45:00Z"
            ],
            3 => [
                "message" => "ENTREGA REALIZADA",
                "date" => "2023-11-27T12:15:00Z"
            ]

        );

        $uuid = '0e99f223-5763-4876-9b9f-6031c8d8f76f';
        $newCarrier = new IntegrationTrackingService();
        $deliveries = $newCarrier->storeTracking($data, $uuid);

        $this->assertNotEquals(null, $deliveries);
    }
}
