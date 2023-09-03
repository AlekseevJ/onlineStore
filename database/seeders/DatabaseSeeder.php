<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\CartFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

      Color::factory(3)->has(Product::factory()->count(10))->create();
     $tok = User::create( [
      'name' => fake()->name(),
      'email' => fake()->unique()->safeEmail(),
      'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
  ]);
     $tok->token()->create(['token_api'=>Str::random(30)]);
    }
}
