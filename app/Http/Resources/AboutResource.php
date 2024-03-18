<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AboutResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => Storage::disk('public')->url($this->image),
            'description_ru' => $this->description_ru,
            'description_uz' => $this->description_uz,
            'description_en' => $this->description_en,
            
        ];
    }
}
