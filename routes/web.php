<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('consultar/funcionario', 'Auth\RegisterController@show');
Route::put('resetar/senha/{id}', 'Auth\RegisterController@resetar')->name('teste');
Route::get('consultar/funcionario/{id}', 'Auth\RegisterController@edit')->name('editar');
Route::post('consultar/funcionario/update/{id}', 'Auth\RegisterController@update');
Route::get('cadastro/funcionario', 'Auth\RegisterController@create');
Route::post('cadastro/funcionario/store', 'Auth\RegisterController@store')->name('cadastrar');
Route::get('excluir/funcionario/{id}', 'Auth\RegisterController@delete');
Route::post('excluir/funcionario/confirmar/{id}', 'Auth\RegisterController@destroy');


Route::get('consultar/automovel/{id}', 'Automovel\AutomovelController@edit');
Route::post('consultar/automovel/update/{id}', 'Automovel\AutomovelController@update');
Route::get('consultar/automovel', 'Automovel\AutomovelController@show');
Route::get('cadastro/automovel', 'Automovel\AutomovelController@create');
Route::post('cadastro/automovel/store', 'Automovel\AutomovelController@store')->name('automovel');
Route::get('excluir/automovel/{id}', 'Automovel\AutomovelController@delete');
Route::post('excluir/automovel/confirmar/{id}', 'Automovel\AutomovelController@destroy');

Route::get('consultar/filial', 'Filial\FilialController@show');
Route::get('consultar/filial/{id}', 'Filial\FilialController@edit');
Route::post('consultar/filial/update/{id}', 'Filial\FilialController@update');
Route::get('cadastro/filial', 'Filial\FilialController@create');
Route::post('cadastro/filial/store', 'Filial\FilialController@store')->name('inserir');
Route::get('excluir/filial/{id}', 'Filial\FilialController@delete');
Route::post('excluir/filial/confirmar/{id}', 'Filial\FilialController@destroy');