<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_type extends Model
{
    protected $fillable = ['user_id','restaurant_id','name'];

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
    public function user()
    {
      return $this->belongsTo("App\User");
    }
    
}
