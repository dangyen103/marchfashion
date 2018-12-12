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

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_product_detail')
                    ->withPivot('order_quantity', 'order_discount');
    }
}
