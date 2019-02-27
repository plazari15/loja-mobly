<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'lastname',
        'email',
        'taxvat',
        'rg',
        'ddd_cel',
        'celphone',
        'ddd_tel',
        'telephone'
    ];
}
