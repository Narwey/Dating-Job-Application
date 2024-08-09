<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});



Route::get('/jobs', function () {
    $jobs = job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index',
     [
        'jobs'=> $jobs
    ]);
});

Route::get('/job/create',function() {
    return view('jobs.create');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::post('/jobs' , function(){

    // input validation needed

    Job::create([
        'title'=> request('title') ,
        'salary' => request('salary'),
        'employer_id'=> 1 // for employer id , it would be fetched from the authenticated employer later , after integrating the auth .
    ]);

    return redirect('/jobs');
});

Route::get('/job/{id}', function ($id) {
    $job = job::find($id);
    return view('job.show',['job' => $job]);
});
