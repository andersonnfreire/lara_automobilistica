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
Route::get('cadastro/funcionario', 'Auth\RegisterController@create');
Route::post('cadastro/funcionario/store', 'Auth\RegisterController@store')->name('cadastrar.funcionario');
Route::get('consultar/funcionario', 'Auth\RegisterController@show');

Route::get('cadastro/automovel', 'Automovel\AutomovelController@create');
Route::get('cadastro/automovel/store', 'Automovel\AutomovelController@store')->name('cadastrar.automovel');
Route::get('cadastro/filial', function () {
    return view('pages.filial.create-edit');
});
