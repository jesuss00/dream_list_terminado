<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeseosController;

Route::get('/', function () {
    return view('welcome'); // Asegúrate de que la vista 'welcome' existe en resources/views/
});


Route::post('/deseos', [DeseosController::class, 'store'])->name('deseos.store');

Route::get('/', [DeseosController::class, 'index']);


