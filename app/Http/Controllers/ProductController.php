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
      // if(empty(Cache::get('key'))){$hi = Product::all();
      // Cache::put('key', $hi, 600);}
      // $fath = Cache::get('key');
    if(!(Cache::get('key')))
    {   $hi = Product::all();
       $mas = array();$pul = array();
       foreach($hi as $item){
        $mas = [ 
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'color'=> $item->color,
            'desc'=> $item->desc,
        ];
        array_push($pul,$mas);
       }
    }
        Cache::put('key', $pul, 600);
        $pul = Cache::get('key');
      return response()->json($pul) ;
    }

  
    public function store(StoreProductRequest $request)
    {   
      //  if(!$request->name || !$request->price ){
      //      
      //      return'need [name => ??, price=> etc]';
      //  };
      //  DB::table('products')->insert([
      //     'name'=> $request->name,
      //     'price'=>$request->price,
      //     'desc'=>$request->desc,
      //     'color_id'=>$request->color_id,
      //  ]);
       if(!($request->name)){return response('введите name price color desc');}
       if(!empty(Color::where('color',$request->input('color'))->firstOr(function(){}))){
        $col = Color::where('color',$request->input('color'));
        
        $newpr = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'color_id'=> $col->first()->id ,
          //  'color_id'=>$col,
        ]);
       }else{
        $col = Color::create([
            'color'=>$request->color
        ]);
        $newpr = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'color_id'=> $col->id ,
          //  'color_id'=>$col,
        ]);
       } //$newpr->color()->associate($col->id)->save();
       return $newpr. 'Добавлено' ;
       //return "good";
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
