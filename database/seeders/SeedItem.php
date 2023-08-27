<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Kategory;

class SeedItem extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { for($i=0;$i<2;$i++){
      $kat = Kategory::find(1);
      $test = Item::create([
          'name' => 'iphone',
          'price' => '100 рублей',
          'desc' => 'Павел деревянко',
          'image' => 'https://phonoteka.org/uploads/posts/2021-05/1620286651_15-phonoteka_org-p-bez-zadnego-fona-17.png',
        ])
        ;
        $kat->items()->save($test);
      };$kat = Kategory::find(2);
      $test = Item::create([
          'name' => 'Пылесос',
          'price' => '190 рублей',
          'desc' => 'ВАУ',
          'image' => 'https://media.discordapp.net/attachments/1010121376293720114/1145347064222453833/image.png',
        ]);
        $kat->items()->save($test);
     }
}
