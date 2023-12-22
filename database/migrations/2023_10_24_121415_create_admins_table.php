<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('admin_type')->default('admin');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('admins');
    }
};