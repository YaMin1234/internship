<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
  use SoftDeletes;
  protected $fillable = ['user_id','name','address','township_id','food_category_id','delivery_hour','phone','photos'];

  public function address()
  {
       return $this->belongsTo('App\Address');
  }
  public function township()
  {
    return $this->belongsTo('App\Township');
  }
  public function food_category()
  {
      return $this->belongsTo('App\Food_category');
  }
  public function meal_types()
  {
    return $this->belongsToMany('App\Meal_type');
  }
  public function user()
  {
    return $this->belongsTo("App\User");
  }
  public function menus()
  {
    return $this->hasMany('App\Menu');
  }
  public function menu_types()
  {
    return $this->hasMany('App\Menu_type');
  }
}
