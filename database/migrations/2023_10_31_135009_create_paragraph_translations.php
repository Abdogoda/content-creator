<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('paragraph_translations', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->string("locale")->index();
            $table->unique(['paragraph_id','locale']);
            $table->foreignId("paragraph_id")->references("id")->on("paragraphs")->cascadeOnDelete();
        });
    }

    public function down(): void{
        Schema::dropIfExists('paragraph_translations');
    }
};