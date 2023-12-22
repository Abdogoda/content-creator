<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller{
    public function index(){
        $read_messages = Message::where('status', 1)->get();
        $unread_messages = Message::where('status', 0)->get();
        return view("pages.backend.message.index", compact("read_messages", 'unread_messages'));
    }

    public function delete(int $id){
        $message = Message::find($id);
        if($message){
            $message->delete();
            return redirect()->back()->with("success", __('messages.message_deleted_successfully'));
        }else{
            return redirect()->back()->with("warning", __('messages.message_not_found'));
        }
    }

    public function mark_read(int $id){
        $message = Message::find($id);
        if($message && $message->status === 0){
            $message->status = 1;
            $message->save();
            return redirect()->back()->with("success", __('messages.marked_as_readed_successfully'));
        }else{
            return redirect()->back()->with("warning", __('messages.message_not_found'));
        }
    }

    public function mark_all_read(){
        $messages = Message::where('status', 0)->get();
        if($messages){
            foreach ($messages as $message) {
                $message->status = 1;
                $message->save();
            }
            return redirect()->back()->with("success", __('messages.marked_all_readed_successfully'));
        }else{
            return redirect()->back()->with("warning", __('messages.message_not_found'));
        }
    }
}