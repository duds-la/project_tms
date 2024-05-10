<?php

namespace Tests\Unit\Services;

use App\Http\Services\IntegrationService;
use App\Models\Carrier;
use App\Models\Delivery;
use App\Models\Recipient;
use App\Models\Sender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class IntegrationServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_integration_delivery()
    {
        $filteredData = [
            [
                "_id" => "f1e7be5c-90f3-4b0a-a5ff-3a44941a5412",
                "_id_transportadora" => "1f0a1c69-3e02-4f40-a10e-1b8c80d5d7c6",
                "_volumes" => 1,
                "_remetente" => [
                    "_nome" => "Lojas B - Suprimentos Alimentos"
                ],
                "_destinatario" => [
                    "_nome" => "Maria Oliveira",
                    "_cpf" => "35595606088",
                    "_endereco" => "Avenida Principal, 456",
                    "_estado" => "Rio de Janeiro",
                    "_cep" => "04567-890",
                    "_pais" => "Brasil",
                    "_geolocalizao" => [
                        "_lat" => "-22.9068",
                        "_lng" => "-43.1729"
                    ]
                ],
                "_rastreamento" => [
                    [
                        "message" => "ENTREGA CRIADA",
                        "date" => "2023-11-14T09:00:00Z"
                    ],
                    [
                        "message" => "EM TRÂNSITO",
                        "date" => "2023-11-15T10:30:00Z"
                    ],
                    [
                        "message" => "SAIU PARA ENTREGA",
                        "date" => "2023-11-16T08:45:00Z"
                    ],
                    [
                        "message" => "ENTREGA REALIZADA",
                        "date" => "2023-11-17T11:20:00Z"
                    ]
                ]
            ]
        ];

        $service = new IntegrationService();
        $integration = $service->integrationDelivery($filteredData);

        $this->assertEquals(1, Delivery::count());

        $this->assertDatabaseHas('deliveries', [
            'delivery_uuid' => 'f1e7be5c-90f3-4b0a-a5ff-3a44941a5412'
        ]);
    }


}
