<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeseoController;

Route::get('/', [DeseoController::class, 'index'])->name('deseo.index');
Route::post('/deseos', [DeseoController::class, 'store'])->name('deseo.store');


