<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;

Route::get('/',[VideoController::class, 'index'] )->name ('index');
Route::get('/ejercicios', [VideoController::class, 'ejercicios'])->name ('ejercicios');
Route::get('/create',[VideoController::class, 'create'] )->name ('create');
Route::POST('/store', [VideoController::class, 'store'] )->name ('store');
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');



Route::get('/login', [VideoController::class, 'login'])->name('login');
Route::post('/loginStore', [VideoController::class, 'loginStore'])->name('loginStore');

Route::get('/Registrarse', [VideoController::class, 'Registrarse'])->name('Registrarse');
Route::post('/iniciar', [VideoController::class, 'iniciar'])->name('iniciar');
Route::get('/logout', [VideoController::class, 'logout'])->name('logout');

Route::get('/todos', [VideoController::class, 'todos'])->name('todos');

Route::get('videos/usuario/{usuarioId}', [VideoController::class, 'mostrarVideosUsuario'] )->name('mostrarVideosUsuario');

Route::get('/presentacion', [VideoController::class, 'presentacion'])->name('presentacion');
Route::post('/presentacion2', [ProfileController::class, 'presentacion2'])->name('presentacion2');

Route::get('/calorias', [ProfileController::class, 'calorias'])->name('calorias');
Route::get('/caloriascreate', [ProfileController::class, 'caloriascreate'])->name('caloriascreate');
Route::post('/storecalorias', [ProfileController::class, 'storecalorias'])->name('storecalorias');

Route::get('/parque', [ProfileController::class, 'parques'])->name('parques');


Route::get('/videos-eliminados', [ProfileController::class, 'showDeletedVideos'])->name('videosEliminados.index');


