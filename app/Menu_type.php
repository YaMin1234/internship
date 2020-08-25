<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_type extends Model
{
    protected $fillable = ['name'];

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }
    
}
