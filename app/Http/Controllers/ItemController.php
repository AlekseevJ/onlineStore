<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Kategory;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Item::get();
        return view('item.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect()->route('item.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
      
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $hkategory = Kategory::get();
        return view('item.edit', compact('item','hkategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $updt = Item::find($item->id);
        $updt->update(
            ['category_id'=>$request->category_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'image'=>$request->image,

            ]);
       return redirect()->route('item.show',$item->id)->with('success','Изменения сохранены!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index');
    }
}
