<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CrudUsersController;
use App\Http\Controllers\PruebaControlador;
use App\Http\Controllers\utilityController;




// DASHBOARD UTYLIDAD
Route::post('/dashboard/filtrar', [utilityController::class, 'filtrar'])
    ->middleware('admin')
    ->middleware('auth');


Route::get('/dashboard/updateData', [utilityController::class, 'updateData'])
    ->middleware('admin')
    ->middleware('auth');
Route::post('/dashboard/{id}/updateData', [utilityController::class, 'updateDataPost'])
    ->middleware('admin')
    ->middleware('auth');

Route::get('/dashboard/dataNoVacunado', [utilityController::class, 'dataNoVacunado'])
    ->middleware('admin')
    ->middleware('auth');
Route::post('/dashboard/{id}/dataNoVacunado', [utilityController::class, 'dataNoVacunadoPost'])
    ->middleware('admin')
    ->middleware('auth');

Route::get('/dashboard/completarDatos', [utilityController::class, 'completarDatos'])
    ->middleware('admin')
    ->middleware('auth');
Route::post('/dashboard/{id}/completarDatos', [utilityController::class, 'completarDatosPost'])
    ->middleware('admin')
    ->middleware('auth');



// DASHBOARD CRUD
Route::delete('/dashboard/{id}', [CrudUsersController::class, 'destroy'])->name('usuarios.destroy')
    ->middleware('admin')
    ->middleware('auth');

Route::resource('/dashboard', CrudUsersController::class)
    ->middleware('admin')
    ->middleware('auth')
    ->middleware('verificar_datos');


// AUTENTICACION
Route::get('/login', [SessionController::class, 'create'])
    // ->middleware('admin')
    ->middleware('guest')
    ->name('login.index');

Route::get('/', [SessionController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');



Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');
