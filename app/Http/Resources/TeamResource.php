<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TeamResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => Storage::disk('public')->url($this->image),
            'name_ru' => $this->name_ru,
            'name_uz' => $this->name_uz,
            'name_en' => $this->name_en,
            'position_ru' => $this->position_ru,
            'position_uz' => $this->position_uz,
            'position_en' => $this->position_en,
            'info_ru' => $this->info_ru,
            'info_uz' => $this->info_uz,
            'info_en' => $this->info_en,
        ];
    }
}
