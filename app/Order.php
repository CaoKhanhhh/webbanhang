<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable =['customer_name','customer_phone_number','customer_email','customer_address','total_price',
    					 'note'];
     public function products(){
        return $this->belongsToMany('App\Product', 'order_details', 'order_id', 'product_id');
    }
}
