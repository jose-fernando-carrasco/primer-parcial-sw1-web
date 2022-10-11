<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ImagenperfilController;
use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\UserController;
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


/* Route::resource('eventos',EventoController::class); */
Route::get('eventos',[EventoController::class,'index'])->name('eventos.index');
Route::get('eventos/create',[EventoController::class,'create'])->name('eventos.create');
Route::post('eventos/store',[EventoController::class,'store'])->name('eventos.store');
Route::get('eventos/generarQR',[EventoController::class,'generarQR'])->name('eventos.generarQR');
Route::post('eventos/storeQR',[EventoController::class,'storeQR'])->name('eventos.storeQR');
Route::get('eventos/especifico/{id}',[EventoController::class,'especifico'])->name('eventos.especifico');
Route::put('eventos/update/{Evento}',[EventoController::class,'update'])->name('eventos.update');
Route::put('eventos/eliminar/{Evento}',[EventoController::class,'eliminar'])->name('eventos.eliminar');
Route::get('eventos/clientes/{id}',[EventoController::class,'indexcliente'])->name('eventos.indexcliente');




/* Route::resource('users',UserController::class); */
Route::get('users',[UserController::class,'index'])->name('users.index');
Route::get('users/show/{id}',[UserController::class,'show'])->name('users.show');
Route::put('users/eliminar/{id}',[UserController::class,'eliminar'])->name('users.eliminar');


Route::resource('imagenperfils',ImagenperfilController::class);

/* Route::resource('contratos',ContratoController::class); */
Route::get('contratos',[ContratoController::class,'index'])->name('contratos.index');
Route::get('contratos/create',[ContratoController::class,'create'])->name('contratos.create');
Route::post('contratos/store',[ContratoController::class,'store'])->name('contratos.store');
Route::get('contratos/show/{contrato}',[ContratoController::class,'show'])->name('contratos.show');
Route::put('contratos/update/{contrato}',[ContratoController::class,'update'])->name('contratos.update');
Route::put('contratos/eliminar/{contrato}',[ContratoController::class,'eliminar'])->name('contratos.eliminar');



Route::resource('catalogos',CatalogoController::class);

Route::get('imagenes/{id}',[ImagenController::class,'index'])->name('imagenes.index');
Route::post('imagenes/store/{id}',[ImagenController::class,'store'])->name('imagenes.store');


Route::get('invitaciones',[InvitacionController::class,'index'])->name('invitaciones.index');
Route::get('invitaciones/create/{Evento}',[InvitacionController::class,'create'])->name('invitaciones.create');
Route::post('invitaciones/store',[InvitacionController::class,'store'])->name('invitaciones.store');
Route::get('invitaciones/show/{id}',[InvitacionController::class,'show'])->name('invitaciones.show');
Route::put('invitaciones/aceptar/{id}',[InvitacionController::class,'aceptar'])->name('invitaciones.aceptar');
Route::put('invitaciones/eliminar/{invitacion}',[InvitacionController::class,'eliminar'])->name('invitaciones.eliminar');


