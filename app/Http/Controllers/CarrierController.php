<?php

namespace App\Http\Controllers;

use App\Facades\ApiCarrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarrierController extends Controller
{
    //controller transportadora
    public function __invoke()
    {
        return ApiCarrier::get('6334edd3-ad56-427b-8f71-a3a395c5a0c7')->json();
    }

}
