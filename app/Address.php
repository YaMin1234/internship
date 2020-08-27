<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['no','street','township_id','city'];
    public function restaurant()
  {
       return $this->hasMany('App\Restaurant');
  }
  public function  township()
  {
       return $this->belongsTo('App\Township');
  }
}
