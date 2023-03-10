<?php

use App\Http\Controllers\FormularioPostulacionController;
use App\Http\Controllers\PostulanteController;
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

Route::resource('postulantes', PostulanteController::class);
Route::resource('formulario_postulaciones', FormularioPostulacionController::class);