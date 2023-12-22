<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller{
    public function index(){
        $team = User::where('role_as', 'admin')->get();
        return view('pages.frontend.team',compact('team'));
    }
}