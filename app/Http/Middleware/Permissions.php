<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::Check()){
            if (Auth::user()->role_id == 1){
                return $next($request);
            } else if (Auth::user()->role_id == 0){
                return redirect('/')->with('success', 'Bem vindo!');
            }
        }else{
            return redirect('/')->with('success', 'Bem vindo!');
        }
    }
}
