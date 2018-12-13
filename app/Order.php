<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id','receiver_name','receiver_city','receiver_district','receiver_address',
        'receiver_phone','shipping_price','shipping_price','shipping_price','status','total'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function product_details()
    {
        return $this->belongsToMany('App\ProductDetail', 'order_product_detail')
                    ->withPivot('order_quantity', 'order_discount');
    }
}
