<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
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

Route::get('/adminMarcas', [MarcaController::class,"index"]);

Route::get('/agregarMarca', [MarcaController::class,"create"]);
Route::post('/agregarMarca', [MarcaController::class,"store"]);

Route::get('/modificarMarca/{id}', [MarcaController::class,"edit"]);
Route::put('/modificarMarca', [MarcaController::class,"update"]);

//TO-DO: logica para eliminar marca. Usar Swal para mostrar el resultado.
Route::delete('/eliminarMarca', [MarcaController::class,"destroy"]);


Route::get('/inicio', function () {
    return view('inicio');
});
