<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategory extends Model
{
    use HasFactory;
    public $timestamps = false; 
    public $created_at = false;
    
    protected $fillable = ['id','title','desc','image'];
}
