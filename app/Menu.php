<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    
    protected $fillable = ['restaurant_id','menu_type_id','name','price','photos'];
    
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
    public function menu_type()
    {
        return $this->belongsTo('App\Menu_type');
    }
}
