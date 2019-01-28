@extends('layouts.clients.master')
@section('title','Kiểm tra đơn hàng')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">
					<!-- <div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div> -->
					<div class="col-sm-8 text-align">
						<h4><b>Thông tin người nhận</b></h4>
					</div>
					
					<div class="col-sm-offset-9 text-left">
						<h4><b>Thông tin thanh toán	</b></h4>
					</div>
					<form class="form-horizontal" action="{{route('product.postcheckout')}}" method="post" accept-charset="utf-8">
						@csrf
						<div class="col-sm-6  ">
							
							<label class="label-control">Họ và tên <span class="text-danger">*</span></label>
							@if ($errors->first('customer_name'))
							<span class="text-danger">{{$errors->first('customer_name')}}</span>
							@endif
							<input type="text" class="form-control" name="customer_name" placeholder="Họ và tên" >

							<label class="label-control">Email <span class="text-danger">*</span> </label>
							@if ($errors->first('customer_email'))
							<span class="text-danger">{{$errors->first('customer_email')}}</span>
							@endif
							<input type="text" class="form-control" name="customer_email" placeholder="Email" >
							<label class="label-control">Số điện thoại <span class="text-danger">*</span> </label>
							@if ($errors->first('customer_phone_number'))
							<span class="text-danger">{{$errors->first('customer_phone_number')}}</span>
							@endif
							<input type="text" class="form-control" name="customer_phone_number" placeholder="Số điện thoại" >
							<label class="label-control">Địa chỉ <span class="text-danger">*</span> </label>
							@if ($errors->first('customer_address'))
							<span class="text-danger">{{$errors->first('customer_address')}}</span>
							@endif
							<input type="text" class="form-control" name="customer_address" placeholder="Số nhà, quận, huyện, phường, xã, thành phố" >
							<input type="hidden" name="total_price" value="{{$tongcong}}">

							<label class="label-control">Ghi chú</label>
							
							<textarea name="note" class="form-control" rows="5"></textarea>
						</div>

						<div class="col-sm-5 col-sm-offset-1">
							
							<div class="total_area">
								<ul>
									<li>Tổng:<span>{{$tongcong}}<u>đ</u></span></li>
									<li>Phí ship: <span>0<u>đ</u></span></li>
									<li>Tổng cộng: <span>{{$tongcong}}<u>đ</u></span></li>
								</ul>
								<button type="submit" id="btn-checkout" class="btn-checkout btn btn-primary col-sm-offset-6">
									Hoàn tất 
								</button>
							</div>

						</div>
					</form>
				</div>
			</div>
			
				
			<!-- <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div> -->
		</div>
	</section> <!--/#cart_items-->
	<p></p>
@endsection
