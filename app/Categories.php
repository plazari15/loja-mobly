<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Categories extends Model
{
    use NodeTrait;
    protected $fillable = [
        'description',
        'name'
    ];

}
