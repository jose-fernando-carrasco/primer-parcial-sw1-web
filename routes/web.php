<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InvitacionController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});

Route::get('home', function () {
    return view('home');
})->name('home');


Route::resource('eventos',EventoController::class);
Route::resource('contratos',ContratoController::class);
Route::resource('catalogos',CatalogoController::class);
Route::get('invitaciones/create/{Evento}',[InvitacionController::class,'create'])->name('invitaciones.create');
Route::post('invitaciones/store',[InvitacionController::class,'store'])->name('invitaciones.store');

