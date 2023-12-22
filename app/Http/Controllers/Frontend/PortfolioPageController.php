<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceWork;
use Illuminate\Http\Request;

class PortfolioPageController extends Controller{
    public function index(){
        $works = ServiceWork::paginate(9);
        $services = Service::all();
        $portfolio = Page::where('slug', 'portfolio')->first();
        return view('pages.frontend.portfolio', compact('works', 'services', 'portfolio'));
    }
}