<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('service_work_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("locale")->index();
            $table->unique(['service_work_id','locale']);
            $table->foreignId("service_work_id")->references("id")->on("service_works")->cascadeOnDelete();
        });
    }

    public function down(): void{
        Schema::dropIfExists('service_work_translations');
    }
};