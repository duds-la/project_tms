<?php

namespace Tests\Unit\Services\Integration;

use App\Http\Services\DeliverySearchService;
use App\Http\Services\Integration\IntegrationCarrierService;
use App\Http\Services\Integration\IntegrationDeliveryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class IntegrationDeliveryServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_integration_service()
    {  
        $data = collect( [0=>[
                "_id"=>"e9bcf89a-1b8e-4df4-b9b4-df33b9dfc3c5",
                "_id_transportadora"=>"2c71e3b0-1291-4964-8d78-9e34c2299b45",
                "_volumes"=>3,
                "_remetente"=>[
                   "_nome"=>"EComercial Compre Online"
                ],
                "_destinatario"=>[
                   "_nome"=>"Pedro Alves",
                   "_cpf"=> "01582267049",
                   "_endereco"=>"Avenida Principal, 7829",
                   "_estado"=>"Pernambuco",
                   "_cep"=>"09876-543",
                   "_pais"=>"Brasil",
                   "_geolocalizao"=>[
                      "_lat"=>"-8.0476",
                      "_lng"=>"-34.8770"
                   ]
                   ],
                "_rastreamento"=>[
                    0=>[
                      "message"=>"ENTREGA CRIADA",
                      "date"=>"2023-11-24T08:00:00Z"
                   ],
                   1=>[
                      "message"=>"EM TRÂNSITO",
                      "date"=>"2023-11-25T09:30:00Z"
                   ],
                   2=>[
                      "message"=>"CHEGOU À FILIAL DA CIDADE",
                      "date"=>"2023-11-26T10:45:00Z"
                   ],
                   3=>[
                      "message"=>"ENTREGA REALIZADA",
                      "date"=>"2023-11-27T12:15:00Z"
                   ]
                ]
             
        ]]);
        $newCarrier = new IntegrationDeliveryService();
        $deliveries = $newCarrier->storeDelivery($data);

        $this->assertEquals(null, $deliveries);
    }

}
