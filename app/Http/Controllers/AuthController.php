<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __invoke(){
        return view('auth.sign-in');
    }
    public function login(){
        validator(request()->all(), [
            'email' => ['required','email'],
            'password' => ['required'],
        ])->validate();

        if (auth()->attempt(request()->only(['email', 'password']))) {
            $user = auth()->user();
            switch ($user->role) {
                case 'Admin':
                    return redirect('/admin');
                case 'Company':
                    return redirect('/company');
                default:
                    return redirect('/');
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function logout(){
        auth()->logout();

        return redirect('/');
    }

}
