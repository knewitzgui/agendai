<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationsController extends Controller{

    public function login(Request $request){
        if (Auth::attempt($request->only(['email', 'password']))){

            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with(['error' => 'Email ou senha incorretos']);
        }
    }

    public function logout(){
        Auth::logout();
        return view('admin.login');
    }
}
