<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.form');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    
    //Rutas especialidades
    Route::get('/especialidades', [App\Http\Controllers\Admin\SpecialtyController::class, 'index']);
    Route::get('/especialidades/create', [App\Http\Controllers\admin\SpecialtyController::class, 'create']);
    Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);
    Route::post('/especialidades', [App\Http\Controllers\Admin\SpecialtyController::class, 'sendData']);
    Route::put('/especialidades/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'update']);
    Route::delete('/especialidades/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);

    //Rutas medicos
    Route::resource('medicos', App\Http\Controllers\Admin\DoctorController::class);

    //Rutas pacientes
    Route::resource('pacientes', App\Http\Controllers\Admin\PatientController::class);
});

Route::middleware(['auth', 'doctor'])->group(function () {
    
    Route::get('/horario', [App\Http\Controllers\Doctor\HorarioController::class, 'edit']);
    Route::post('/horario', [App\Http\Controllers\Doctor\HorarioController::class, 'store']);
    

});

Route::middleware(['auth'])->group(function () {
    Route::get('/reservarcitas/create', [App\Http\Controllers\AppointmentController::class, 'create']);
    Route::post('/reservarcitas', [App\Http\Controllers\AppointmentController::class, 'store']);
    Route::post('/miscitas', [App\Http\Controllers\AppointmentController::class, 'index']);
    //JSON
    Route::get('/especialidades/{specialty}/medicos', [App\Http\Controllers\Api\SpecialtyController::class, 'doctor']);
    Route::get('/horario/horas', [App\Http\Controllers\Api\HorarioController::class, 'hours']);
});
