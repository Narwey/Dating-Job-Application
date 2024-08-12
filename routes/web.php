<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/job/create', 'jobs.create');
Route::get('/jobs', [JobController::class , 'index'] );
Route::post('/jobs' ,[JobController::class , 'create']);
Route::get('/job/{job}/edit', [JobController::class , 'edit']);
Route::patch('/job/{job}',[JobController::class , 'update']);
Route::delete('/job/{job}', [JobController::class , 'destroy']);
Route::get('/job/{job}', [JobController::class , 'show']);


// Auth Routes

Route::get('/register' , [RegisterUserController::class , 'create']);
Route::post('/register',[RegisterUserController::class , 'store']);

Route::get('login',[LoginUserController::class , 'create']);
Route::post('login',[LoginUserController::class , 'store']);
