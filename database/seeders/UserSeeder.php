<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{

    public function run(): void{
        $user = new User();
        $user->name = 'Admin One';
        $user->email = 'admin1@gmail.com';
        $user->phone = '0123456789';
        $user->role_as = 'admin';
        $user->password = Hash::make("123456");
        $user->save();

        $admin  = new Admin();
        $admin->admin_id = $user->id;
        $admin->admin_type = "owner";
        $admin->save();
        
            
    }
}