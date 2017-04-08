<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    protected $table = "product";
    protected $hidden = [];


    function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
