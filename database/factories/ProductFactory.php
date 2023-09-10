<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $namepull = ['Iphone','Samsung','Nokia','INOE','RealMe','Xiaomu','BQ','Infinix','Motorola','POCO'];
        $key = array_rand($namepull);
        $num= random_int(0,10);
        $facker = $namepull[$key].' '.$num; 
        return [
            'name'=>$facker,
            'price'=>$this->faker->randomDigit()*500+450,
            'color_id'=>Color::factory(),
            'desc'=>$this->faker->text(120),
        ];
    }
}
