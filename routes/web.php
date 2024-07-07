<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Generar la ruta a la clase alumno, esta instruccion
// genera las rutas al crud
Route::resource('/alumnos', AlumnoController::class);

// Otra forma para generar las rutas una a una por ejemplo:
// Route::get('/alumnos', [AlumnoController::class, 'index']);
// Route::get('/alumnos/create', [AlumnoController::class, 'create']);
// Route::post('/alumnos', [AlumnoController::class, 'store']);
// Route::get('/alumnos/{alumno}', [AlumnoController::class, 'show
// Route::get('/alumnos/{alumno}/edit', [AlumnoController::class,

