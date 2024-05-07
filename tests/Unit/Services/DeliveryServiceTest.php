<?php

namespace Tests\Unit\Services;

use App\Http\Services\DeliveryService;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class DeliveryServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_search_recipient_by_cpf()
    {
        // Criar um recipient de exemplo no banco de dados
        $recipient = Recipient::factory()->create([
            'cpf' => '12345678900',
        ]);

        // Chamar o método de busca no serviço
        $service = new DeliveryService();
        $deliveries = $service->searchRecipientByCpfOnDb('12345678900');

        // Verificar se o recipient retornado corresponde ao CPF buscado
        $this->assertCount(1, $deliveries);
        $this->assertEquals($recipient->id, $deliveries[0]->id);
    }

    
}
