<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name','location','type','city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
