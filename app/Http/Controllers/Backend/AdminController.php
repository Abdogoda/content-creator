<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller{

    use ImageTrait;
    
    public function index(){
        $admins = User::where('role_as', 'admin')->where('id', '!=' , Auth::user()->id)->get();
    return view('pages.backend.admins.index', compact('admins'));
    }
    
    public function show(int $id){
        $admin = User::where('role_as', 'admin')->where('id', $id)->first();
        if($admin){
            return view('pages.backend.admins.show', compact('admin'));
        }else{
            return redirect()->back()->with('error', __('messages.admin_not_found'));
        }
    }
    
    public function create(){
        return view('pages.backend.admins.add');
    }

    public function store(Request $request){
        if(Auth::user()->admin->admin_type != "admin"){
            $request->validate([    
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|unique:users,phone',
                'status' => 'required|in:0,1',
                'admin_type' => 'required|in:owner,manager,admin',
                'password' => 'required|string|min:6|confirmed',
                'image' => 'required|image|mimes:png,jpg,jpeg'
            ]);
            DB::beginTransaction();
            try {
                $admin = new User();
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->phone = $request->phone;
                $admin->role_as = 'admin';
                $admin->status = $request->status ? '1' : '0';
                $admin->password = Hash::make($request->password);
                $admin->save();
                
                if($request->hasfile('image')){
                    $this->uploadImage($request, 'image', 'user', $admin->id, null, 'User');
                }
    
                $admin_info = new Admin();
                $admin_info->admin_id = $admin->id;
                $admin_info->admin_type = $request->admin_type;
                $admin_info->save();
    
                DB::commit();
                return redirect('/admin/admins')->with('success', __('messages.admin_created_successfully'));
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }else{
            return redirect()->back()->with('danger', __('messages.access_denied_as_you_are_not_a_manager'));
        }
    }

    public function update(Request $request, int $id){
        if(Auth::user()->admin->admin_type != "admin" || Auth::user()->id == $id){
            $admin = User::where('id', $id)->where('role_as', 'admin')->first();
            if($admin->admin->admin_type == 'owner' && Auth::user()->id != $id){
                return redirect()->back()->with('danger', __('messages.access_denied_you_cannot_update_owner_profile'));
            }else{
                $request->validate([
                    'name' => 'required|string|max:100',
                    'email' => ['required', 'email', 'unique:users,email,'.$id],
                    'phone' => ['required', 'unique:users,phone,'.$id],
                    'status' => 'required|in:0,1',
                    'admin_type' => 'required|in:owner,manager,admin',
                    'image' => 'nullable|image|mimes:png,jpg,jpeg'
                ]);
                if($admin){
                    DB::beginTransaction();
                    try {
                        $admin->name = $request->name;
                        $admin->email = $request->email;
                        $admin->phone = $request->phone;
                        $admin->status = $request->status ? '1' : '0';
                        
                        $admin->save();
                        
                        if($request->hasfile('image')){
                            $this->delete_image_imageable($admin->id, 'User');
                            $this->uploadImage($request, 'image', 'user', $admin->id, null, 'User');
                        }
    
                        $admin_info = Admin::where('admin_id', $admin->id)->first();
                        if(!$admin_info){
                            $admin_info = new Admin();
                        }
                        $admin_info->admin_id = $admin->id;
                        $admin_info->admin_type = $request->admin_type;
                        $admin_info->save();
    
                        DB::commit();
                        return redirect()->back()->with('success', __('messages.admin_updated_successfully'));
                    }catch(\Exception $e){
                        DB::rollback();
                        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                    }
                }else{
                    return redirect()->back()->with('danger', __('messages.admin_not_found'));
                }
            }
        }else{
            return redirect()->back()->with('danger', __('messages.access_denied_as_you_are_not_a_manager'));
        }
    }
    

    public function updatePassword(Request $request, int $id){
        if(Auth::user()->admin->admin_type != "admin" || Auth::user()->id == $id){
            $admin = User::where('id', $id)->where('role_as', 'admin')->first();
            if($admin->admin->admin_type == 'owner' && Auth::user()->id != $id){
                return redirect()->back()->with('danger', __('messages.access_denied_you_cannot_update_owner_profile'));
            }else{
                $request->validate([
                    'current_password' => 'required|string|min:6',
                    'password' => 'required|string|min:6|confirmed',
                ]);
                if($admin){
                    DB::beginTransaction();
                    try {
                        #Match The Old Password
                        if(Hash::check($request->current_password, $admin->password)){
                            #Update the new Password
                            $admin->password = Hash::make($request->password);
                            $admin->save();

                            DB::commit();
                            return redirect()->back()->with('success', __('messages.password_updated_successfully'));
                        }else{
                            return redirect()->back()->with("danger", __('messages.old_password_not_matched'));
                        }
                    }catch(\Exception $e){
                        DB::rollback();
                        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                    }
                }else{
                    return redirect()->back()->with('danger', __('messages.admin_not_found'));
                }
            }
        }else{
            return redirect()->back()->with('danger', __('messages.access_denied_as_you_are_not_a_manager'));
        }
    }
    
    public function delete(Request $request, int $id){
        if(count(User::where('role_as', 'admin')->get()) == 1){
            return redirect()->back()->with('danger', __('messages.access_denied_you_are_the_last_admin'));
        }else{
            if(Auth::user()->admin->admin_type != "admin" || Auth::user()->id == $id){
                $admin = User::where('id', $id)->where('role_as', 'admin')->first();
                if($admin->admin->admin_type == 'owner' && Auth::user()->id != $id){
                    return redirect()->back()->with('danger', __('messages.access_denied_you_cannot_update_owner_profile'));
                }else{
                    $request->validate([
                        'password' => 'required|min:6'
                    ]);
                    if($admin){
                        if (Hash::check($request->password, Auth::user()->password)) {
                            $this->delete_image_imageable($admin->id, 'User');
                            $admin->delete();
                            return redirect()->back()->with('success', __('messages.admin_deleted_successfully'));
                        }else{
                            return redirect()->back()->with('danger', __('messages.password_not_correct'));
                        }
                    }else{
                        return redirect()->back()->with('danger', __('messages.admin_not_found'));
                    }
                }
            }else{
                return redirect()->back()->with('danger', __('messages.access_denied_as_you_are_not_a_manager'));
            }
        }
    }


}