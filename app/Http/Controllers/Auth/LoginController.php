<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{

    public function showLoginForm(){
        return view('pages.login');
    }
    use AuthenticatesUsers;


    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(){
        if(Auth::user()->role_as == 'admin'){
            return redirect('/admin')->with('success', __('messages.successfully_logged_welcome_dashboard'));
        }else{
            return redirect('/')->with('success', __('messages.successfully_logged_welcome_dashboard'));
        }
    }

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
}