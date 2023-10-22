<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AtendimentoController;

Route::get('/', function () {
    return view('index');
});

//ROTAS PLANO
Route::resource('/plano', PlanoController::class);

Route::post('/plano/search',
    [PlanoController::class, 'search'])->name('plano.search');

//ROTAS SETOR
Route::resource('/setor', SetorController::class);

Route::post('/setor/search',
    [SetorController::class, 'search'])->name('setor.search');

//ROTAS COLABORADOR
Route::resource('/colaborador', ColaboradorController::class);

Route::post('/colaborador/search',
    [ColaboradorController::class, 'search'])->name('colaborador.search');

//ROTAS CLIENTE
Route::resource('/cliente', ClienteController::class);

Route::post('/cliente/search',
    [ClienteController::class, 'search'])->name('cliente.search');

//ROTAS ATENDIMENTO
Route::resource('/atendimento', AtendimentoController::class);

Route::post('/atendimento/search',
    [AtendimentoController::class, 'search'])->name('atendimento.search');

    