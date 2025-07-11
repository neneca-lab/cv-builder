<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculoController;

Route::get('/', function () {

    return view('welcome');
});


Route::post('/curriculo', [CurriculoController::class, 'store'])->name('curriculo.store');
Route::get('/consulta-cep/{cep}', [App\Http\Controllers\EnderecoController::class, 'buscarEndereco']);
