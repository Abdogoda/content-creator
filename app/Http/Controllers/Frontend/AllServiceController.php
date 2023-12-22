<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class AllServiceController extends Controller{
    public function index(){
        $services = Service::all();
        $service_section = Page::where('slug', 'services')->first();
        return view("pages.frontend.services.index", compact('services', 'service_section'));
    }
    
    public function show(string $slug){
        $service = Service::where('slug', $slug)->first();
        if($service){
            return view('pages.frontend.services.show', compact('service'));
        }else{
            return redirect()->back()->with('danger','Service not found');
        }
    }
}