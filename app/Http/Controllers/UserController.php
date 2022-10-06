<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create () {
        return view('users.register');
    }

    public function store (Request $request) {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return to_route('listings.index')->with('message', 'ACCOUNT CREATED SUCCESSFULLY');
    }

    public function logout (Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return to_route('listings.index')->with('delete', 'LOGGED OUT');
    }

    public function show () {
        return view('users.login');
    }

    public function login(Request $request) {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return to_route('listings.index')->with('message', 'LOGGED IN');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
