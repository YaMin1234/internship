<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','product_id','user-id'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
    public function user()
    {
         return $this->belongsTo('App\User');
    }   
}
