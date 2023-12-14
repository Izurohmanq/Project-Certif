<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // \App\Models\User::factory(10)->create();

    \App\Models\User::factory()->create([
      'name' => 'Wisnu Wirayuda',
      'email' => 'wisnuwirayuda15@gmail.com',
      'password' => bcrypt('11111111'),
      'is_admin' => true,
      'email_verified_at' => now(),
    ]);

    \App\Models\User::factory()->create([
      'name' => 'User',
      'email' => 'user@example.com',
      'password' => bcrypt('11111111'),
      'is_admin' => false,
      'email_verified_at' => now(),
    ]);

    for ($x = 0; $x <= 10; $x++) {
      \App\Models\Category::factory()->create([
        'name' => fake()->word(),
      ]);
    }
  }
}
