<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $fillable = [
        'description'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_set');
    }
}
