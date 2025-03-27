<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeseoController;

Route::get('/', [DeseoController::class, 'index'])->name('deseo.index');
Route::post('/deseo', [DeseoController::class, 'store'])->name('deseo.store');
Route::delete('/deseo/{deseo}', [DeseoController::class, 'destroy'])->name('deseo.destroy');
Route::get('/deseo/{deseo}/edit', function() {
    return "Página de edición en construcción.";
})->name('deseo.edit');


