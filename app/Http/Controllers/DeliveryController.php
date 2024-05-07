<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeliveryController extends Controller
{
    //controller entrega
    public function __invoke()
    {
        return Http::get('https://run.mocky.io/v3/6334edd3-ad56-427b-8f71-a3a395c5a0c7')->json();
    }
}
