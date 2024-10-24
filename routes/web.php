<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\CargosController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [EmpleadosController::class, 'indexView'])->name('empleados.view');


Route::get('/empleados/crear', [EmpleadosController::class, 'crearEmpleadoView'])->name('crear.empleados.view');
Route::get('/empleados/{id}', [EmpleadosController::class, 'updateEmpleadoView'])->name('update.empleado.view');
Route::put('/empleados/{id}', [EmpleadosController::class, 'updateEmpleado'])->name('update.empleado');
Route::delete('/empleados/{id}', [EmpleadosController::class, 'deleteEmpleado'])->name('delete.empleado');
Route::post('/empleados/crear', [EmpleadosController::class, 'crearEmpleado'])->name('crear.empleado');

Route::get('/cargos/crear', [CargosController::class, 'crearCargosView'])->name('crear.cargos.view');
Route::post('/cargos/crear', [CargosController::class, 'crearCargos'])->name('crear.cargo');
