<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store() {
        $request = Request();
        $validatedAttributes = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]); // validation for the request sended by the user

        Auth::attempt($validatedAttributes); // attempt check if the user input is correct by the method attempt return boolean

        if (Auth::attempt($validatedAttributes)) {
            $request->session()->regenerate();

            return redirect('/jobs');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
