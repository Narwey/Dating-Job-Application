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

$request = new Illuminate\Http\Request();
$request->replace([
    'title' => request('title'),
    'salary' => request('salary')
]);

$request->validate([
    'title' => 'required|min:3',
    'salary' => 'required'
]);

    Job::create([
        'title'=> request('title') ,
        'salary' => request('salary'),
        'employer_id'=> 3 // for employer id , it would be fetched from the authenticated employer later , after integrating the auth .
    ]);

    return redirect('/jobs');
});

Route::get('/job/{id}/edit', function ($id) {
    $job = job::find($id);
    return view('jobs.edit',['job' => $job]);
});

Route::patch('/job/{id}', function ($id) {
    // steps : validation , Auth(check user id)
    // $request = new Illuminate\Http\Request();
    // $request->validate([
    //     'title' => ['required','min:3'],
    //     'salary' => ['required']
    // ]);

    // validation error to fix later

    $job = Job::findOrFail($id);

    $job->update([
        'title'=>request('title'),
        'salary'=>request('salary')
    ]);

    return redirect('job/' . $job->id);

});

Route::delete('/job/{id}', function ($id) {

    // auth on hold until making breeze auth
    Job::findOrFail($id)->delete();
    return redirect('/jobs');

});


Route::get('/job/{id}', function ($id) {
    $job = job::find($id);
    return view('jobs.show',['job' => $job]);
});
