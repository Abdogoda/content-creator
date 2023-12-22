<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller{
    public function index(){
        $contact = Contact::all()->first();
        $sociallinks = ContactLink::all();
        return view("pages.backend.contact.index", compact('contact', 'sociallinks'));
    }
    public function update(Request $request){
        $request->validate([
            'phone' => 'required|string',
            'phone_2' => 'required|string',
            'address' => 'required|string|min:3',
            'location' =>  ["required", 'url', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'email' => 'required|email',
        ]);
        $contact = Contact::all()->first();
        if($contact){
        try {
            $contact->phone = $request->phone;
            if($request->phone_2){
                $contact->phone_2 = $request->phone_2;
            }
            $contact->address = $request->address;
            $contact->location = $request->location;
            $contact->email = $request->email;
            $contact->save();
            
            return redirect()->back()->with('success', __('messages.contact_infomration_saved_successfully'));
           } catch (\Exception $e) {
               return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           }
       }else{
        return "not found";
       }
    }

    public function updateLinks(Request $request){
         $request->validate([
            'names.*' => 'required|string',
            'links.*' => 'required|url',
        ]);
        if(count($request->links) == count($request->names)){
            ContactLink::truncate();
            foreach (array_combine($request->names, $request->links) as $name => $link) {                
                $contactlink = new ContactLink();
                $contactlink->name = $name;
                $contactlink->link = $link;
                $contactlink->save();
            }
            return redirect()->back()->with('success', __('messages.social_links_updated_successfully'));
        }else{
            return redirect()->back()->with('warning', __('messages.datat_invalid'));
        }
    }
}