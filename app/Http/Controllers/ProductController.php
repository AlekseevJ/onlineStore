<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
class ProductController extends Controller
{
   
    public function index()
    {  
       if(empty(Cache::get('key'))){$hi = DB::select('select * from products');
        Cache::put('key', $hi, 600);}
       
       return  Cache::get('key');
      
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
