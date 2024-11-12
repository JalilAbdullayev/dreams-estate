<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contact', function(Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('location')->nullable();
            $table->text('map')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('contact');
    }
};
