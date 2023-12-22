<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware{

    public function handle(Request $request, Closure $next): Response{
        if(Auth::check()){
            if(Auth::user()->role_as == 'admin'){
                return $next($request);
            }else{
                return redirect('/')->with("danger", 'Access Denied as you are not admin');
            }
        }else{
            return redirect('/login')->with("danger", 'Login to access the website info');
        }
        return $next($request);
    }
}