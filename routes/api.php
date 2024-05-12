<?php

use App\Http\Controllers\CarrierController;
use App\Http\Controllers\DeliveryController;
use App\Models\Carrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('delivery')->group(function () {
    Route::controller(DeliveryController::class)->group(function () {
        Route::get('/search-delivery', 'searchDeliveryByCPF');
        Route::get('/search-by-cpf', 'viewIndexDeliveries');
        Route::get('/details-about', 'detailsAboutDelivery')->name('delivery.deatils-about');
    });
});

Route::prefix('carrier')->group(function () {
    Route::controller(CarrierController::class)->group(function () {
        Route::get('/search-by-name', 'searchCarrierByName');
    });
});
