<?php

use App\Http\Controllers\ShippingController;
use App\Livewire\ShippingLabelGenerator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/shipping-label', ShippingLabelGenerator::class);
Route::post('/shipping-label', [ShippingController::class, 'generate']);
