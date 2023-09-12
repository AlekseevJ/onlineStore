<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Color;
use App\Models\Token;

class ProductRepository implements ProductRepositoryInterface
{

    public function all()
    {
        return Product::all();
    }

    public function getById(Product $id)
    {
        return Product::findOrFail($id);
    }

    public function createItem($request)
    {
        $col = Color::firstOrCreate(['color' => $request->input('color')])->id;
        $item = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->desc,
            'color_id' => $col,
        ]);
        $itemWithJs = ["id" => $item->id, "name" => $item->name, "property" => ["price" => $item->price, "desc" => $item->desc, "color" => $item->color()->get('color')]];
        return $itemWithJs;
    }
    public function update($request)
    {
        Product::whereId($request->id)->update(
            [
                'name' => $request->name,
                'price' => $request->price,
                'desc' => $request->desc,
                'color_id' => Color::firstOrCreate(['color' => $request->input('color')])->id,
            ]
        );
        $item = Product::find($request->id);
        $itemWithJ = ["id" => $item->id, "name" => $item->name, "property" => ["price" => $item->price, "desc" => $item->desc, "color" => $item->color()->get('color')]];
        return $itemWithJ;
    }
    public function delete($request)
    {
        Product::find($request->input('id'))->delete();
        return;
    }

    public function findUserByToken($request)
    {
        $tok = !empty($request->input('token')) ? $request->input('token') : $request->header('token');
        $tok = Token::where('token_api', $tok)->first();
        return $tok->user;
    }
    public function getUnEndedCart($user)
    {
        return $user->carts()->firstOrCreate(['status' => 'false']);
    }
    public function getStrongUnEndedCart($user)
    {
        return $user->carts()->where(['status' => 'false'])->firstOrFail();
    }
    public function showBasket($cart)
    {
        return $cart->products()->get();
    }
    public function endCart($cart)
    {
        $cart->update(['status' => true]);
        return;
    }

    public function getAllEndedCart($us)
    {
        return $us->carts()->where('status', true)->get();
    }
}
