<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('paragraphs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paragraphable_id');
            $table->string('paragraph_model')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('paragraphs');
    }
};