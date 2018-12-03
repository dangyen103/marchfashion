<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
        'product_id','color','size','quantity'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
