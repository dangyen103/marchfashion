<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name','location','type'
    ];

    public function districts()
    {
        return $this->hasMany('App\District');
    }
}
