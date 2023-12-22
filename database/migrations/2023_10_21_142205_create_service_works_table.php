<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void{
        Schema::create('service_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->references('id')->on('services')->cascadeOnDelete();
            $table->string('attachment_type')->default("image");
            $table->string('image_style')->default("wide");
            $table->string('attachment'); 
            $table->timestamps();
        });
    }


    public function down(): void{
        Schema::dropIfExists('service_works');
    }
};