<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeed extends Seeder{

    public function run(): void{
        DB::table('contacts')->insert([
            'phone' => '0123456789',
            'phone_2' => '0123456789',
            'email' => 'email@example.com',
            'address' => 'your company address',
            'location' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7292345.9661662085!2d25.581484212108595!3d26.817176353316377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14368976c35c36e9%3A0x2c45a00925c4c444!2sEgypt!5e0!3m2!1sen!2seg!4v1697803695101!5m2!1sen!2seg",
        ]);
    }
}