<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $filable = [
        'name'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
