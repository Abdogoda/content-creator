<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceWork;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller{
    public function index(){
        $admins_count = User::where('role_as', 'admin')->count();
        $visitors_count = Visitor::all()->count();
        $services_count = Service::all()->count();
        $works_count = ServiceWork::all()->count();
        return view("pages.backend.index", compact('admins_count', 'visitors_count', 'services_count', 'works_count'));
    }
}