<?php

namespace App\Http\Controllers;

use App\Http\Services\DeliveryService;
use App\Models\Delivery;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class DeliveryController extends Controller
{

    //controller entrega
    public function viewIndexDeliveries(Request $request)  : InertiaResponse
    {
        try{

            $deliveries = DeliveryService::deliveriesListWithoutFilterByCpf();
            
            return Inertia::render('App',[
                'deliveries' => $deliveries
            ]);

        }catch(Exception $e){
            return $e;
        }
    }

    public function searchDeliveryByCPF(Request $request) 
    {
        try{

            $post = $request->all();

            $result = DeliveryService::deliveriesByCPF($post['cpf']);

            return Inertia::render('App',[
                'deliveries' => $result
            ]);

        }catch(Exception $e){
            return $e;
        }
    }
}
