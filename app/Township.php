<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = ['name','postal_code'];

    public function address()
    {
        return $this->hasMany('App\Address');
    }
    public function restaurant()
    {
        return $this->hasMany('App\Restaurant');
    }
}
