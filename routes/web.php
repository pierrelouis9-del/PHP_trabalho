<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\idadeController;
use App\Http\Controllers\jogosController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\notasController;
use App\Http\Controllers\poo2Controller;



Route::get('/', function () {
    return view('portfolio');
});

Route::get('/helpdesk',[HelpdeskController::class, 'index'])->name('helpdesk');
Route::post('/helpdesk',[HelpdeskController::class, 'index'])->name('helpdesk.salvar');

Route::get('/idade',[idadeController::class, 'index'])->name('idade');
Route::post('/idade',[idadeController::class, 'index'])->name('idade.salvar');

Route::get('/jogos',[jogosController::class, 'index'])->name('jogos');
Route::post('/jogos',[jogosController::class, 'index'])->name('jogos.salvar');

Route::get('/login',[loginController::class, 'index'])->name('login');
Route::post('/login',[loginController::class, 'index'])->name('login.salvar');

Route::get('/notas',[notasController::class, 'index'])->name('notas');
Route::post('/notas',[notasController::class, 'index'])->name('notas.salvar');

Route::get('/poo2',[poo2Controller::class, 'index'])->name('poo2');
Route::post('/poo2',[poo2Controller::class, 'index'])->name('poo2.salvar');