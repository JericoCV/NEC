<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PerfilController;
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

Route::get('{user}/profile',[UsersController::class, 'showuser'])->name('showuser');
Route::get('{user}/editprofile',[UsersController::class, 'edituser'])->name('edituser');
Route::put('{user}/profile',[UsersController::class, 'updateuser'])->name('updateuser');

Route::get('{user}/register',[PerfilController::class, 'createprofile'])->name('registerp');
Route::post('{user}/profilepro',[PerfilController::class, 'saveprofile'])->name('saveprofile');
