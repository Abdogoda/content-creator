<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('phone_2')->nullable();
            $table->string('email');
            $table->longText('address');
            $table->longText('location');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('contacts');
    }
};