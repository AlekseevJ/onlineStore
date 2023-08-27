<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Basket;
class Item extends Model
{
    use HasFactory;
    //protected $fillable = ['category_id','name', 'price','desc','image'];
  //  protected $fillable = [
 //       'options->enabled',
 //   ];
    protected $fillable = ['id','category_id','name','price','desc','image'];
    public function baskets(){
      return $this->belongsToMany(Basket::class);
  }
    public function kategory(){
      return $this->belongsTo(Kategory::class);
}
}
