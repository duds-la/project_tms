<?php

use App\Http\Controllers\CarrierController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/delivery');

Route::prefix('/delivery')->group(function () {
    Route::controller(DeliveryController::class)->group(function () {
        Route::get('/', 'viewIndexDeliveries')->name('delivery.index');
        Route::get('/search-by-cpf', 'searchDeliveryByCPF')->name('delivery.search-by-cpf');
        Route::get('/details-about', 'detailsAboutDelivery')->name('delivery.deatils-about');
        Route::get('/details-message', 'detailsAboutMessage')->name('delivery.details-message');

    });
});

Route::prefix('carrier')->group(function () {
    Route::controller(CarrierController::class)->group(function () {
        Route::get('/search-by-name', 'searchCarrierByName');
    });
});

