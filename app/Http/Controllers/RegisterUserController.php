<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
       //validate
       $validatedAttributes = request()->validate([
        'name'     => ['required'],
        'email'    => ['required' , 'email'],
        'password' => ['required'],
        // laravel looks for another field with the name of password_confirmation and compare both before validating the password
       ]);



       // create the user
        $user = User::create($validatedAttributes);

        Auth::login($user);

        return redirect('/jobs');

    }
}
