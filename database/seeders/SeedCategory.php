<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategory;
class SeedCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
            Kategory::create([
                'title' => 'Телефоны',
                'url' => 'phones',
                'desc' => 'Многофункциональные переносные устройства',
                'image' => 'https://phonoteka.org/uploads/posts/2021-05/1620286651_15-phonoteka_org-p-bez-zadnego-fona-17.png',
              ]);
              Kategory::create([
                'title' => 'PC',
                'url' => 'pcs',
                'desc' => 'Мощнейшие компьютерные решения',
                'image' => 'https://phonoteka.org/uploads/posts/2021-05/1620286651_15-phonoteka_org-p-bez-zadnego-fona-17.png',
              ]);
              Kategory::create([
                'title' => 'Роботы-уборщицы',
                'url' => 'robots',
                'desc' => 'Моющие пылесосы с искуственным интеллектом',
                'image' => 'https://phonoteka.org/uploads/posts/2021-05/1620286651_15-phonoteka_org-p-bez-zadnego-fona-17.png',
              ]);
    }
}
