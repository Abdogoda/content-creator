<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactLinksSeed extends Seeder{

    public function run(): void{
        $contact_links = ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube'];
        foreach ($contact_links as $link) {
            DB::table('contact_links')->insert([
                'name' => $link,
                'link' => 'https://'.$link.'.com',
            ]);
        }
    }
}