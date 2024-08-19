<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:6'],
        ]);

        if(!Auth::attempt($attrs))
        {
            throw ValidationException::withMessages([
                'email' => "Sorry, those credentials do not match our records.",
            ]);
        }

        $request->session()->regenerate();
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }

}
