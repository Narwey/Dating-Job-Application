<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = job::with('employer')->simplePaginate(5);

    return view('jobs',
     [
        'jobs'=> $jobs
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/job/{id}', function ($id) {
    $job = job::find($id);
    return view('job',['job' => $job]);
});
