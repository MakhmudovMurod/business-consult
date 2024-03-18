<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BannersResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'desktop_image' => Storage::disk('public')->url($this->desktop_image),
            'mobile_image' => Storage::disk('public')->url($this->mobile_image),
            'title_ru' => $this->title_ru,
            'title_uz' => $this->title_uz,
            'title_en' => $this->title_en,
            'subtitle_ru' => $this->subtitle_ru,
            'subtitle_uz' => $this->subtitle_uz,
            'subtitle_en' => $this->subtitle_en,
            'more_details_link' => $this->more_details_link,
            
        ];
    }
}
