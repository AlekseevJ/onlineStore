<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
class SeedItem extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { for($i=0;$i<15;$i++){
      Item::create([
          'name' => 'iphone',
          'price' => '100 рублей',
          'desc' => 'Павел деревянко',
          'image' => 'https://phonoteka.org/uploads/posts/2021-05/1620286651_15-phonoteka_org-p-bez-zadnego-fona-17.png',
        ]);};
     }
}
