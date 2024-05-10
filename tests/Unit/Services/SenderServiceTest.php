<?php

namespace Tests\Unit\Services;

use App\Http\Services\SenderService;
use App\Models\Sender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class SenderServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_integration_sender()
    {
        $sender_data = [
            "_nome" => "Lojas B - Suprimentos Alimentos"
        ];

        $service = new SenderService();
        $integration = $service->storeIntegrationSender($sender_data);

        $this->assertEquals(1, Sender::count());
        
    }


}
