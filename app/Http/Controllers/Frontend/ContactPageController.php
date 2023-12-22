<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactLink;
use App\Models\Message;
use App\Models\Page;
use Illuminate\Http\Request;

class ContactPageController extends Controller{
    public function index(){
        $contact = Contact::all()->first();
        $sociallinks = ContactLink::all();
        $contact_section = Page::where('slug', 'contact-us')->first();
        return view("pages.frontend.contact", compact('contact', 'sociallinks', 'contact_section'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|max:500'
        ]);
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        return redirect()->back()->with('success', __('messages.message_sent_successfully')); 
    }
}