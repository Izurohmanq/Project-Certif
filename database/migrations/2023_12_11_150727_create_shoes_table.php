<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shoes', function (Blueprint $table) {
          $table->id();
          $table->boolean('available')->default(true);
          $table->string('name');
          $table->string('image')->nullable();
          $table->enum('category', ['sport', 'kids', 'casual', 'formal']);
          $table->bigInteger('price');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
