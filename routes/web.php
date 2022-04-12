<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
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

//rutas


//ruta inicial
Route::get('/', function () {
    return view('login');
});

//ruta para acceder al controlador de clientes
Route::resource('clientes', ClienteController::class)->names('clientes');

//ruta para acceder al controlador de usuarios
Route::resource('usuarios', UsuarioController::class)->names('usuarios');

//ruta para eliminar un cliente
Route::get('/clientes/{cliente}/delete/', [ClienteController::class, 'delete'])->name('clientes.delete');

