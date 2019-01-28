<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Cart;
class CartController extends Controller
{
   
    function add(Request $rq){
    	$id =$rq->id;
    	if($id != null){
   			$pro=Product::find($id);
   			
   			Cart::add(['id' => $pro->id, 'name' => $pro->name ,'price' => $pro->price,'qty' => $rq->qty,
          
   				'options' =>['tong' => $pro->price* $rq->qty, 'image' => $pro->image ] ]);

		}
   		return redirect(route('Cart.index'));
    }
    function index(){
    	$content=Cart::content();
      $tongcong= Cart::subtotal(0);
    	return view('Cart',compact('content','tongcong'));
    }

    function remove(Request $rq){
    	Cart::remove($rq->id);
      $total=Cart::subtotal(0);
      return response()->json(['success' => true, 'id' =>$rq->id,'total' =>$total]);   
    }
    function change(Request $rq){
      $pro=Cart::get($rq->id);
      $valrp= $pro->price*$rq->val;
      Cart::update($rq->id,['qty'=> $rq->val,'options->tong' => $valrp]); 
      $pro->options->tong = $valrp;
      // $pro->save();
      $total=Cart::subtotal(0);
      return response()->json(['success' => true ,'id'=>$rq->id,'valrp' =>$valrp,'total' =>$total]);
    }
}
