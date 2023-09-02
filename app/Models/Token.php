<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Token extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user() {
        return $this->belongsTo(User::class);
    }
    protected $fillable=['token_api','user_id'];
}
