<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'discountValue','start_time','finish_time','description'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_discount');
    }
}
