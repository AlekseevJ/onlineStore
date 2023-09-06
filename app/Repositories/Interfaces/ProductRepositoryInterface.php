<?php 

namespace App\Repositories\Interfaces;

use App\Models\Color;


interface ProductRepositoryInterface
{
    public function all();

    public function getByColor(Color $color);
}