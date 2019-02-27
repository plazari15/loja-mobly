<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ElasticquentTrait;

    protected $fillable = [
      'name',
      'description',
      'qtd',
      'minimum',
      'normal_price',
      'updated_price',
      'description',
      'big_description',
      'SKU',
      'height',
      'width',
      'length',
      'weight',
    ];

    protected $mappingProperties = [
        'name' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
    ];


    public function categories(){
        return $this->belongsToMany('App\Categories');
    }

    public function features(){
        return $this->belongsToMany('App\Feature');
    }

    public function images(){
        return $this->hasMany('App\ProductImage');
    }

    public function getLastPhoto(){
        foreach ($this->images  as $image){
            return url('/app/public/'.$image->url);
        }
    }

}
