<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name'
    ];


    public static function getAll(){
        $feature = Feature::all();

        $feats = [];
        foreach ($feature as $key => $item) {
            $feats[$item->id] = $item->name;
        }

        return $feats;
    }
}
