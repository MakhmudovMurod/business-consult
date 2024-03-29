<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;


class ServicesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => Storage::disk('public')->url($this->image),
            'title_ru' => $this->title_ru,
            'title_uz' => $this->title_uz,
            'title_en' => $this->title_en,
            'description_ru' => $this->description_ru,
            'description_uz' => $this->description_uz,
            'description_en' => $this->description_en,
            
        ];
    }
}
