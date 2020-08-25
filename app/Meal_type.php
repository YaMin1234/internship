<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal_type extends Model
{
    protected $fillable = ['name'];

    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant');
    }
}
