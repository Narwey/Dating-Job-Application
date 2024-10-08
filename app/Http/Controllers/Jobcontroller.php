<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::with('employer')->latest()->simplePaginate(5);

        return view('jobs.index',
         [
            'jobs'=> $jobs
        ]);
    }

    public function show(Job $job) {
        return view('jobs.show',['job' => $job]);
    }

    public function create() {
        $request = new Request();
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
    }

    public function edit(Job $job) {

        if(Auth::guest()){
            return redirect('/login');
        }

        if($job->employer->user->isNot(Auth::user())){
            abort(403);
        }

        return view('jobs.edit',['job' => $job]);

    }

    public function update(Job $job) {

        $job->update([
            'title'=>request('title'),
            'salary'=>request('salary')
        ]);

        return redirect('job/' . $job->id);

    }

    public function destroy(Job $job) {
        $job->delete();
        return redirect('/jobs');
    }
}
