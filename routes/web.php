<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\EnderecoController;

Route::get('/', function () {

    return view('welcome');
});


Route::post('/curriculo', [CurriculoController::class, 'store'])->name('curriculo.store');
Route::get('/consulta-cep/{cep}', [EnderecoController::class, 'buscarEndereco']);
