<?php

namespace App\Http\Controllers;

use App\Facades\ApiCarrier;
use App\Http\Services\CarrierSearchService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class CarrierController extends Controller
{
    public function searchCarrierByName(Request $request, CarrierSearchService $carrierSearchService) 
    {
        try{
            
            $post = $request->all();

            $result = $carrierSearchService->searchByName($post['name']);

            return Inertia::render('App',[
                'deliveries' => $result,
                'error' => null
            ]);

        }catch(Exception $e){
            return Inertia::render('App', [
                'deliveries' => null,
                'error' => $e->getMessage()
            ]);
        }
    }
    
}
