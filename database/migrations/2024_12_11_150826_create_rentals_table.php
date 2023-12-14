<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('rentals', function (Blueprint $table) {
      $table->id();
      $table->enum('status', ['pending_rent', 'pending_return', 'rented', 'returned', 'expired'])->default('pending_rent');
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('shoe_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('rentals');
  }
};
