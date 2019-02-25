<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Categories extends Model
{
    use NodeTrait;

    protected static $cats;

    protected $fillable = [
        'description',
        'name'
    ];


    public function products(){
        return $this->belongsToMany('App\Product');
    }

    public static function showAsTree(){
        $categories = \App\Categories::get()->toTree();


        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                self::$cats[$category->id] = $prefix.' '.$category->name;

                $traverse($category->children, $prefix.'-');
            }

            return self::$cats;
        };

        return $traverse($categories);
    }
}
