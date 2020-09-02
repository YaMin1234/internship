<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Status extends Model
{
   protected $fillable = ['$name'];
   public function order()
   {
       $this->belongsToMany('App\Order');
   }
}
