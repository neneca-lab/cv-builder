<?php

use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
})->name('welcome');

Route::get('init', function () {
    return view('init');
})->name('init');


Route::get('/init', [DocumentoController::class, 'index'])->name('init');


Route::post('/curriculo', [CurriculoController::class, 'store'])->name('curriculo.store');
Route::get('/consulta-cep/{cep}', [EnderecoController::class, 'buscarEndereco']);
Route::get('/pdf/download/{arquivo}', [DocumentoController::class, 'download'])->name('download');



Route::get('/upload', [UploadController::class, 'uploadForm']);
Route::post('/upload', [UploadController::class, 'upload'])->name('upload.pdf');
