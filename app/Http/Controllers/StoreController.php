<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use Illuminate\Http\Request;
use App\Models\Item;
class StoreController extends Controller
{
    public function category(){
      $cat =  Kategory::get();
        return view('kategory',compact('cat'));
    }
    public function categoryin($url)
    {   $kat= Kategory::where('url',$url)->first();
       
        $item = Item::where('kategory_id',$kat->id)->get();
   
        return view('katsort', compact('item'));
    }
    public function test(){
        $kat = Kategory::find(1);
       $test = Item::create([
            'name' => 'test',
            'price' => '100 test',
            'desc' => 'test test',
            'image' => 'https://images-ext-1.discordapp.net/external/UEfXZEk7YMCfvJ9NrL--Ga9t16LHQnmriRMgIkUXXAQ/%3Fsize%3D955x1080%26quality%3D96%26sign%3D16fc1533fe8e0bfe4eebed7a79ab4d91%26c_uniq_tag%3Dmfulns6u5WAM_KcighBj-I8v6RsYe185TaK6mR04BXk%26type%3Dalbum/https/sun9-59.userapi.com/impg/tbI5QyLvzBwHLDpFRURyF4zAVHzvU_9Ik4ABcA/D15SHLyT_oE.jpg?width=546&height=617',
        ]);
        $kat->items()->save($test);
        
    }
}
