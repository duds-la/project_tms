<?php

namespace App\Http\Controllers;

use App\Http\Services\DeliveryService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeliveryController extends Controller
{

    protected $deliveryService;

    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    //controller entrega

    public function searchDeliveryByCPF(Request $request)  
    {
        try{

            $post = $request->all();

            $result = $this->deliveryService->searchDeliveryByCPF($post['cpf']);

        }catch(Exception $e){
            return $e;
        }
    }
}
