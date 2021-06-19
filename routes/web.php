<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ContratoController;
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

Route::get('/servicio/{servicio}',[ServicioController::class, 'services'])->name('service');
Route::get('/huanuco',[ServicioController::class, 'showservicesh'])->name('showservicesh');
Route::get('/pillcomarca',[ServicioController::class, 'showservicesp'])->name('showservicesp');
Route::get('/amarillis',[ServicioController::class, 'showservicesa'])->name('showservicesa');
Route::get('/{servicio}/trabajadores',[ServicioController::class, 'service'])->name('showservice');


Route::get('{user}/profile',[UsersController::class, 'showuser'])->name('showuser');
Route::get('{user}/editprofile',[UsersController::class, 'edituser'])->name('edituser');
Route::put('{user}/profile',[UsersController::class, 'updateuser'])->name('updateuser');
Route::get('{user}/worker_profile',[PerfilController::class,'workerdata'])->name('workerprofile');

Route::get('{user}/register',[PerfilController::class, 'createprofile'])->name('registerp');
Route::post('{user}/profilepro',[PerfilController::class, 'saveprofile'])->name('saveprofile');

Route::get('{worker}/worker',[PerfilController::class, 'showworker'])->name('showworker');

Route::get('{worker}/contract',[ContratoController::class, 'createcontract'])->name('createcontract');
Route::post('{worker}/contract',[ContratoController::class, 'savecontract'])->name('savecontract');

Route::get('{contract}/view',[ContratoController::class, 'viewcontract'])->name('viewcontract');
Route::get('{user}/contracts',[ContratoController::class, 'showcontractsbyUser'])->name('mycontracts');

Route::get('{worker}/requests',[ContratoController::class, 'myrequests'])->name('requests');
Route::get('{worker}/works',[ContratoController::class, 'myworks'])->name('works');
Route::put('{request}/results',[ContratoController::class, 'requestresult'])->name('requestresult');

