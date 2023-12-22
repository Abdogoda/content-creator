<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->string("locale")->index();
            $table->unique(['service_id','locale']);
            $table->foreignId("service_id")->references("id")->on("services")->cascadeOnDelete();
            $table->string('name')->unique();
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->longText('meta_description')->nullable();
            $table->longText('description');
        });
    }

    public function down(): void{
        Schema::dropIfExists('service_translations');
    }
};