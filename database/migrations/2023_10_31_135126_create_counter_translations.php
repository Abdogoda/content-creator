<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('counter_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string("locale")->index();
            $table->unique(['counter_id','locale']);
            $table->foreignId("counter_id")->references("id")->on("counters")->cascadeOnDelete();
        });
    }

    public function down(): void{
        Schema::dropIfExists('counter_translations');
    }
};