<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'web'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/receitas',  [App\Http\Controllers\ReceitaController::class, 'index']);
    Route::get('/receitas/new',  [App\Http\Controllers\ReceitaController::class, 'new']);
    Route::post('/receitas/add',  [App\Http\Controllers\ReceitaController::class, 'add']);
    Route::post('/receitas/update/{id}',  [App\Http\Controllers\ReceitaController::class, 'update']);
    Route::get('/receitas/{id}/edit',  [App\Http\Controllers\ReceitaController::class, 'edit']);
    Route::delete('/receitas/delete/{id}',  [App\Http\Controllers\ReceitaController::class, 'delete']);

    Route::get('/despesas',  [App\Http\Controllers\DespesaController::class, 'index']);
    Route::get('/despesas/new',  [App\Http\Controllers\DespesaController::class, 'new']);
    Route::post('/despesas/add',  [App\Http\Controllers\DespesaController::class, 'add']);
    Route::post('/despesas/update/{id}',  [App\Http\Controllers\DespesaController::class, 'update']);
    Route::get('/despesas/{id}/edit',  [App\Http\Controllers\DespesaController::class, 'edit']);
    Route::delete('/despesas/delete/{id}',  [App\Http\Controllers\DespesaController::class, 'delete']);
    

    Route::get('/operacao',  [App\Http\Controllers\OperacaoController::class, 'index']);
    Route::get('/operacao/new',  [App\Http\Controllers\OperacaoController::class, 'new']);
    Route::post('/operacao/add',  [App\Http\Controllers\OperacaoController::class, 'add']);
    Route::post('/operacao/update/{id}',  [App\Http\Controllers\OperacaoController::class, 'update']);
    Route::get('/operacao/{id}/edit',  [App\Http\Controllers\OperacaoController::class, 'edit']);
    Route::delete('/operacao/delete/{id}',  [App\Http\Controllers\OperacaoController::class, 'delete']);

    Route::get('/conta',  [App\Http\Controllers\ContaController::class, 'index']);

    Route::get('/balanco',  [App\Http\Controllers\BalancoController::class, 'index']);

});