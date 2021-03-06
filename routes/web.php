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
    return redirect()->route('consultaCep');
})->name('home');


Route::get('consultar', ['as' => 'consultaCep', 'uses' => 'Viacep\ViaCepController@consultar']);
Route::get('listar', ['as' => 'listarCep', 'uses' => 'Viacep\ViaCepController@listar']);
Route::get('detalhes/{cep}', ['as' => 'detalhaCep', 'uses' => 'Viacep\ViaCepController@detalhaCep']);
