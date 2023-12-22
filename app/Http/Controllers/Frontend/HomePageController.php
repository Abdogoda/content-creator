<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactLink;
use App\Models\Counter;
use App\Models\Hero;
use App\Models\Page;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceWork;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomePageController extends Controller{
    public function index(Request $request){
        // handle visitors
        $ip = hash('sha512', $request->ip());
        if (Visitor::where('ip', $ip)->count() < 1){
            Visitor::create([
                'ip' => $ip,
            ]);
        }
        
        $heros = Hero::all()->take(5);
        $about = Page::where('slug', 'about-us')->first();
        $home = Page::where('slug', 'home')->first();
        $counters = Counter::all()->take(4);
        $contact = Contact::all()->first();
        $sociallinks = ContactLink::all();
        $services = Service::all()->take(4);
        $reviews = Review::all()->take(6);
        $works = ServiceWork::all()->take(9);
        $team = User::where('role_as', 'admin')->get()->take(4);
        return view("pages.frontend.index", compact('heros', 'about', 'home', 'counters', 'contact', 'sociallinks', 'services', 'reviews', 'works', 'team'));
    }


}