<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Color;

class ProductRepository implements ProductRepositoryInterface{

    public function all()
    {
        return Product::all();
    }
    public function getByColor(Color $color)
    {
        return Product::where('color_id'. $color->id)->get();
    }
}