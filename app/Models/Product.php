<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function color(){
        return $this->belongsTo(Color::class);
        
    }

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
    protected $fillable = ['name','desc','price','color_id'];
}
