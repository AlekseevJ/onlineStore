<?php 

namespace App\Repositories\Interfaces;

use App\Models\Color;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all();

    public function getById(Product $id);

    public function createItem($request);

    public function update($request);

    public function delete($request);

    public function findUserByToken($request);

    public function getUnEndedCart($request);
    public function getStrongUnEndedCart($user);

    public function showBasket($cart);

    public function endCart($cart);

    public function getAllEndedCart($us);

    
}