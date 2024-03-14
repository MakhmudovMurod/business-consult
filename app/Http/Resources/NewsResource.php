<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            
            'title_uz' => $this->title_uz,
            'description_uz' => $this->description_uz,
            
            'title_ru' => $this->title_ru,
            'description_ru' => $this->description_ru,
            
            'title_en' => $this->title_en,
            'description_en' => $this->description_en,
            
            'created_at' => $this->created_at,
        ];
    }
}
