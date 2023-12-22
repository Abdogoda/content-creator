<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AboutPageController extends Controller{
    public function index(){
        $about = Page::where('slug', 'about-us')->first();
        $counters = Counter::all()->take(4);
        $reviews = Review::all()->take(6);
        return view("pages.frontend.about", compact('about', 'counters', 'reviews'));
    }

    public function addReview(Request $request){
        $request->validate([
            'name' => 'nullable|string|max:100',
            'stars' => 'required|integer|not_in:0',
            'text' => 'required|string|max:500',
        ]);
        $review = new Review();
        if($request->name){
            $review->name = $request->name;
        }else{
            $review->name = 'Unknown';
        }
        $review->stars = $request->stars;
        $review->text = $request->text;
        $review->save();
        return redirect()->back()->with('success', __('messages.review_added_successfully'));
    }
}