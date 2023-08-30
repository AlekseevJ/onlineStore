<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductRes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'price'=>$this->price,
            'desc'=>$this->desc,
            'tagId'=>$this->tag_id,
            
        ];
    }
}