<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
//pagina principal
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//---------------------------------------------------------------
//prubas 
Route::get('/pruebas', function () {
    
dd(Storage::disk());

})->name('pruebas');
//----------------------------------
//dashboard o panel (protegida por autentificacion y permisos)
Route::middleware(['auth:sanctum', 'verified','ver_panel'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//---------------------------------------

//dashboard o panel (protegida por autentificacion y permisos)
Route::middleware(['auth:sanctum', 'verified'])->get('/files', function () {
    return view('Files.index');
})->name('Files');
//---------------------------------------



