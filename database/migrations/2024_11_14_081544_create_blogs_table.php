<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('blogs', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedSmallInteger('order')->default(1);
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('blogs');
    }
};
