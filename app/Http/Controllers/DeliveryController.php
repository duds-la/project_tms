<?php

namespace App\Http\Controllers;

use App\Http\Services\DeliverySearchService;
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
    public function viewIndexDeliveries(Request $request, DeliverySearchService $deliverySearchService)  : InertiaResponse
    {
        try{

            $deliveries = $deliverySearchService->searchWithoutCPF();

            return Inertia::render('App',[
                'deliveries' => $deliveries,
                'error' => null,
            ]);

        }catch(Exception $e){
            return Inertia::render('App', [
                'deliveries' => null,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function searchDeliveryByCPF(Request $request, DeliverySearchService $deliverySearchService) 
    {
        try{

            $post = $request->all();

            $result = $deliverySearchService->searchByCPF($post['cpf']);

            return Inertia::render('App',[
                'deliveries' => $result,
                'error' => null,
            ]);

        }catch(Exception $e){
            return Inertia::render('App', [
                'deliveries' => null,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function detailsAboutDelivery(Request $request, DeliverySearchService $deliverySearchService) 
    {
        try{

            $post = $request->all();

            $result = $deliverySearchService->searchDeatilsDelivery($post['id']);

            return Inertia::render('Details',[
                'details' => $result
            ]);

        }catch(Exception $e){
            return $e;
        }
    }

}
