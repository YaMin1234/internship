<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_category extends Model
{
   protected $fillable = ['name'];

   public function restaurant()
   {
       return $this->hasMany('App\Restaurant');
   }
   
}
