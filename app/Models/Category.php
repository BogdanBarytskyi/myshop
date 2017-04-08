<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $hidden = []; //


    public function products(){
     return $this->hasMany('App\Product'.'category_id');
    }
}
