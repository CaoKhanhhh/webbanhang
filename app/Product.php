<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    public function category(){
        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }
    public function galleries(){
        return $this->hasMany('App\ProductGallery', 'product_id', 'id');
    }
    
    protected $fillable = ['name', 'cate_id', 'price', 
                            'views', 'star', 'short_desc', 
                            'detail'];

}
