<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
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
    {   $title = ['Iphone','Samsung','Nokia','Philips','Macintosh'];
        $k = array_rand($title);
        return [
            'title'=> $title[$k] .' '. rand(1,10),
            'price'=> $this->faker->numberBetween(500,50000),
            'desc'=> $this->faker->text(150),
            'tag_id'=> Tag::factory(), //function(){ if($k=1 ||$k=2 ||$k=3){               return Tag::where('id',1)                ->get();            }elseif($k=4) {return Tag::where('id',2)->get();}else{return Tag::where('id',3)->get();}},  ];
        ];
    }
}
