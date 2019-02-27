<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'taxvat',
        'client_id',
        'shipping_zip_code',
        'shipping_street',
        'shipping_city',
        'shipping_state',
        'shipping_neighborhood',
        'shipping_number',
        'shipping_complement',
        'invoice_zip_code',
        'invoice_street',
        'invoice_city',
        'invoice_state',
        'invoice_neighborhood',
        'invoice_complement',
        'invoice_number',
        'status_id',
    ];
}
