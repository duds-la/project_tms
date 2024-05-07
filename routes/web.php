<?php

use App\Http\Controllers\CarrierController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return inertia::render('App');
});

Route::get('/user', CarrierController::class);

