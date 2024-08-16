<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctor/{id}', [DoctorController::class, 'show']);
Route::post('/appointments', [AppointmentController::class, 'store']);
Route::get('/appointments/earliest/{id}', [AppointmentController::class, 'findEarliestAppointment'])->name('appointments.earliest');
