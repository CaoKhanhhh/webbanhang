<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Requests\UserRequest;
use App\Product;
use App\Category;
use App\Order;
use App\Order_details;
use App\User;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Cart;
class HomeController extends Controller
{
	public function index(Request $rq){
		$flag=0;
		$doan = Product::where('cate_id','1')->take(4)->get();
		$douong = Product::where('cate_id','2')->take(4)->get();
		$doanvat = Product::where('cate_id','3')->take(4)->get();
		$comtrua = Product::where('cate_id','4')->take(4)->get();
		$trangmieng = Product::where('cate_id','5')->take(4)->get();
		$recommend = Product::take(6)->orderBy('star','desc')->get();
		if($rq->keyword){
			$pro=Product::where('name','like',"%$rq->keyword%")->paginate(6);
			$flag=1;
		}
		else{
			$pro = Product::orderBy('views','desc')->orderBy('id','asc')->take(6)->get();
		}
		// dd($pro);die;
		return view('homepage',compact('pro','doan','douong','doanvat','comtrua','trangmieng','recommend','cates','flag'));
	}

	public function listProduct($id){
		$cates = Category::find($id);
		
		if($cates == null){
			return "not found!";
		}
		$pro= Product::where('cate_id', $id)->paginate(6);
		// dd($pro);die;
		return view('list-product', compact('cates', 'pro'));
	}

	public function productDetail($id){
		
		$pro = Product::find($id);

		if(!$pro){
			return "404 notfound";
		}
		$pro->views = ++$pro->views;
		$pro->save();
		return view('detail-product', compact('pro'));
	}
	function getcheckout(){
      return view('checkout'); 
    }

    public function postcheckout(CartRequest $rq){
    	$content=Cart::content();
    	$total=Cart::subtotal(0);
    	$order = new Order();
    	// dd($rq->all());die;
    	$order->fill($rq->all());
    	$order->save();
    	foreach ($content as $key => $c) {
    		$ord =new Order_details();
    		$ord->order_id=$order->id;
    		$ord->product_id=$c->id;
    		$ord->quantity=$c->qty;
    		$ord->unit_price=$c->price;
    		$ord->save();
    	}
    	return view('After-checkout');
    }

	public function login(){
		return view('admin.login');
	}

	public function logout(){
		Auth::logout();
		return redirect(route('home'));
	}

	public function postLogin(Request $request){
		$remember = $request->has('remember');
		if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
			if(Auth::user()->role >100){
				return redirect(route('dashboard'));
			}
			elseif(Auth::user()->role <=100){
				return redirect(route('home'));
			}
		}
		else{
			return view('admin.login')->with('msg', 'Sai tài khoản/mật khẩu');
		}
	}
	public function createUsers(UserRequest $rq){
		$user =new User();
		$user->fill($rq->all());
		$user->password=Hash::make($rq->password);
		$user->save();
		return view('admin.login');
	}
}