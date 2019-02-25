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
            'normal_price' => number_format($this->normal_price, 2, '.', ','),
            'updated_price' => number_format($this->updated_price, 2, '.', ','),
            'in_promotion' => $this->updated_price < $this->normal_price ? true : false,
            'description' => $this->big_description,
            'desc' => $this->description,
            'sku' => $this->SKU,
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length,
            'weight' => $this->weight,
            'photos' => PhotosProductResource::collection($this->images),
            'cover'  => $this->getLastPhoto(),
            'categories' => CategoriesProductResource::collection($this->categories),
            'comprar' => route('comprar.produto', $this->id)
        ];
        //return parent::toArray($request);
    }
}
