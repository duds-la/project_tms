<?php

use App\Http\Controllers\CarrierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', [CarrierController::class]);
