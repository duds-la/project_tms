<?php

namespace Tests\Unit\Services;

use App\Http\Services\DeliverySearchService;
use App\Models\Carrier;
use App\Models\Delivery;
use App\Models\Recipient;
use App\Models\Sender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class DeliverySearchServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_search_recipient_by_cpf_on_api()
    {  
        $service = new DeliverySearchService();
        $deliveries = $service->searchRecipientByCpfOnApi('35595606088');

        $this->assertNotEquals(null, $deliveries);
    }

    /** @test */
    public function it_can_search_recipient_by_cpf_on_db()
    {
       
        $recipient = Recipient::factory()->create();
        $carrier = Carrier::factory()->create();
        $sender = Sender::factory()->create();
        $delivery = Delivery::factory()->create();

        $service = new DeliverySearchService();
        $deliveries = $service->searchRecipientByCpfOnDb($recipient->cpf);

        $this->assertCount(1, $deliveries);
        $this->assertEquals($recipient->cpf, $deliveries[0]['_destinatario']['_cpf']);
    }

    /** @test */
    public function it_can_search_recipient_by_cpf()
    {
       
        $recipient = Recipient::factory()->create();
        $carrier = Carrier::factory()->create();
        $sender = Sender::factory()->create();
        $delivery = Delivery::factory()->create();

        $service = new DeliverySearchService();
        $deliveries = $service->searchDeliveryByCPF($recipient->cpf);
        
        $this->assertCount(1, $deliveries);
        $this->assertEquals($recipient->cpf, $deliveries[0]['_destinatario']['_cpf']);
    }

    /** @test */
    public function it_can_search_recipient_without_cpf_on_db()
    {
       
        $recipient = Recipient::factory()->create();
        $carrier = Carrier::factory()->create();
        $sender = Sender::factory()->create();
        $delivery = Delivery::factory()->create();

        $service = new DeliverySearchService();
        $deliveries = $service->queryRecipientWithoutFilterByCpf();

        $this->assertNotEmpty($deliveries);
    }
}
