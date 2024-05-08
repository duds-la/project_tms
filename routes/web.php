<?php

use App\Http\Controllers\CarrierController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix('delivery')->group(function () {
    Route::controller(DeliveryController::class)->group(function () {
        Route::get('/search-delivery', 'searchDelivery');
    });
});

