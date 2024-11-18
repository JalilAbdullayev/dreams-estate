<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('properties', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->text('keywords')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedTinyInteger('bedroom')->nullable();
            $table->unsignedTinyInteger('bathroom')->nullable();
            $table->unsignedTinyInteger('garage')->nullable();
            $table->unsignedSmallInteger('year')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->decimal('price', 12)->nullable();
            $table->string('area')->nullable();
            $table->string('garage_size')->nullable();
            $table->unsignedTinyInteger('floor')->default(1);
            $table->boolean('type')->nullable();
            $table->boolean('sale_type')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('verified')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('properties');
    }
};
