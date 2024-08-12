<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/job/create', 'jobs.create');
Route::get('/jobs', [JobController::class , 'index'] );
Route::post('/jobs' ,[JobController::class , 'create']);
Route::get('/job/{job}/edit', [JobController::class , 'edit']);
Route::patch('/job/{job}',[JobController::class , 'update']);
Route::delete('/job/{job}', [JobController::class , 'destroy']);
Route::get('/job/{job}', [JobController::class , 'show']);
