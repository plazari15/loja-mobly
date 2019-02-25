<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'description' => $this->description,
            'normal_price' => $this->normal_price,
            'updated_price' => $this->updated_price,
            'in_promotion' => $this->updated_price < $this->normal_price ? true : false,
            'description' => $this->big_description,
            'sku' => $this->SKU,
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length,
            'weight' => $this->weight,
            'photos' => PhotosProductResource::collection($this->images),
            'categories' => CategoriesProductResource::collection($this->categories)
        ];
        //return parent::toArray($request);
    }
}
