<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','unsigned_name','category_id','price','description','label','thumnail','view'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function product_details()
    {
        return $this->hasMany('App\ProductDetail');
    }

    public function discounts()
    {
        return $this->belongsToMany('App\Discount', 'product_discount');
    }

    public function sets()
    {
        return $this->belongsToMany('App\Set', 'product_set');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }
}
