<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminitrator extends Model
{
    protected $fillable = [
        'user_id','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'adminitrator_role');
    }

}
