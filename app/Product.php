<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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


    public function categories(){
        return $this->belongsToMany('App\Categories');
    }

}
