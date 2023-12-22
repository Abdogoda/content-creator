<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller{
    public function index(){
        $reviews = Review::all();
        return view("pages.backend.reviews.index", compact("reviews"));
    }

    public function delete(int $id){
        $review = Review::find($id);
        if($review){
            $review->delete();
            return redirect()->back()->with("success", __('messages.review_deleted_successfully'));
        }else{
            return redirect()->back()->with("danger", __('messages.review_not_found'));
        }
    }

}