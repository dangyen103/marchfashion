<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id','city','district','address','phone','gender','birthday','fashion_style','spend_money','age_group'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
