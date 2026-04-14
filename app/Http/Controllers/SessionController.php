<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        // validate input
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ]);
        // attemp a login
        // redirect
        if (Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect(route('blogs'));
        }
        // redirect back on failure
        return back()->withErrors([
            'email' => 'The provided credentials do not match with our records'
        ]);
    }

    public function destroy(){
        Auth::logout();
        return redirect(route('home'));
    }
}
