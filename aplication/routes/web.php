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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/receitas',  [App\Http\Controllers\ReceitaController::class, 'index']);
    Route::get('/receitas/new',  [App\Http\Controllers\ReceitaController::class, 'new']);
    Route::post('/receitas/add',  [App\Http\Controllers\ReceitaController::class, 'add']);
    Route::post('/receitas/update/{id}',  [App\Http\Controllers\ReceitaController::class, 'update']);
    Route::get('/receitas/{id}/edit',  [App\Http\Controllers\ReceitaController::class, 'edit']);
    Route::delete('/receitas/delete/{id}',  [App\Http\Controllers\ReceitaController::class, 'delete']);

    

});