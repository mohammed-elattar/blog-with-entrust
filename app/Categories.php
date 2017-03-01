<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    
    public $fillable = ['name','description'];
     public function items()
    {
        return $this->hasMany('App\Item','category_id');
    }
}