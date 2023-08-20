<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function category(){
      $cat =  Kategory::get();
        return view('kategory',compact('cat'));
    }
    public function categoryin($url)
    {
        $category = Kategory::where('url', $url)->first();
        return view('category', compact('category'));
    }
    
}
