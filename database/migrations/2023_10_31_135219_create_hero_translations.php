<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('hero_translations', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("subtitle")->nullable();
            $table->string("locale")->index();
            $table->unique(['hero_id','locale']);
            $table->foreignId("hero_id")->references("id")->on("heros")->cascadeOnDelete();
        });
    }

    public function down(): void{
        Schema::dropIfExists('hero_translations');
    }
};