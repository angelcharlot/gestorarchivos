<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\archivo;
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
    
/*     $imagick = new Imagick();
   //dd(Storage::disk('public')->url('archivos/92Ue0KWMAEzAwGK6Wr0hdUDyVtPwLO0PBTVQm7sx.pdf'));
    $imagick->readImage(Storage::disk('public')->url('archivos/92Ue0KWMAEzAwGK6Wr0hdUDyVtPwLO0PBTVQm7sx.pdf')); */

    $archivo=archivo::find(3);
    
    $archivo2 = public_path($archivo->url);
    //dd($archivo2);
    $archivo_img=public_path('storage/archivos/prueba_definitiva.jpg');
    $comando="magick convert -density 300 -quality 96 ".$archivo2." ".$archivo_img;
     
    //dd($comando);
    $respuesta=shell_exec($comando);
    dd($respuesta);
  /*   $image=imagecreatefromjpeg("$img_path/$file_name.jpg");
    header('Content-Type: image/jpeg');
    imagejpeg($image);
    unlink("$img_path/$file_name.jpg"); */


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

//archivo
Route::middleware(['auth:sanctum', 'verified'])->get('/archivo/{id}', function ($id) {
  return view('viewarchivo.index',['id' => $id]);
})->name('archivo');
//---------------------------------------

