<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
       return $hi = DB::select('select * from products');
    }

  
    public function store(StoreProductRequest $request)
    {   
        if(!$request->name || !$request->price ){
            
            return'need [name => ??, price=> etc]';
        };
        DB::table('products')->insert([
           'name'=> $request->name,
           'price'=>$request->price,
           'desc'=>$request->desc,
           'color_id'=>$request->color_id,
        ]);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        Product::whereId($product)->update($request->all());

    }

    public function destroy(Request $request)
    {  
       $prod = Product::find($request->id);
       $prod->delete();
    }
}
