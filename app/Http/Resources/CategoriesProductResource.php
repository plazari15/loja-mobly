<?php

namespace App\Http\Resources;

use App\Categories;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'parent' => Categories::find($this->parent_id),
        ];
    }
}
