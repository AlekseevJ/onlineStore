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
     
    }
}
