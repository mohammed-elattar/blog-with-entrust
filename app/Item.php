<?php<?php namespace App;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    public $fillable = ['title','description','category_id'];
    public function category()
    {
        return $this->belongsTo('App\Categories','category_id');
    }
}
