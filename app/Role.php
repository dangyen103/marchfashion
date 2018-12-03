<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name','code','permission','description'
    ];

    public function adminitrators()
    {
        return $this->belongsToMany('App\Adminitrator','adminitrator_role');
    }
}
