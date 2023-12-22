<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('description')->nullable();
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->longText('meta_description')->nullable();
            $table->string("locale")->index();
            $table->unique(['page_id','locale']);
            $table->foreignId("page_id")->references("id")->on("pages")->cascadeOnDelete();
        });
    }

    public function down(): void{
        Schema::dropIfExists('page_translations');
    }
};