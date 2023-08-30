<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $name = ['Новое','Б\У']; 
        $n = array_rand($name);
        $country = ['Китай','Индия','Тайланд', 'Казахстан']; 
        $k = array_rand($country);
        return [
            
            'status'=>$name[$n],
            'country'=>$country[$k],
        ];
    }
}
