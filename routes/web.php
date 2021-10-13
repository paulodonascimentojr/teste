<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('clientes/busca', [\App\Http\Controllers\ClienteController::class, 'search'])->name('clientes.search');

Route::resource('empresas', EmpresaController::class);
Route::resource('clientes', ClienteController::class);

