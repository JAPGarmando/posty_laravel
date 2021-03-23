<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view("auth.login");
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('status', 'Invalid login details');
        }

    }
}
