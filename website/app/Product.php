<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image_name',
        'ext',
        'description',
        'colors',
        'price',
        'tag',
        'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public function path(){
        return url("/product/{$this->id}-" . Str::slug($this->name));
    }
    public function view_path(){
        return url("/view/{$this->id}-" . Str::slug($this->name));
    }
      
}
