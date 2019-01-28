@extends('layouts.clients.master')
@section('title','Giỏ hàng')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Món ăn</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $c)
						<tr id='pro_{{$c->rowId}}'>
							<td class="cart_product">
								<a href=""><img src="{{$c->options->image}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$c->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$c->price}}<u>đ</u></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="javascript:;" pro_id="{{$c->rowId}}" > + </a>
									<input class="cart_quantity_input" min="1" type="text" name="quantity" id="qty_{{$c->rowId}}" value="{{$c->qty}}" autocomplete="off" size="2">
									<a class="cart_quantity_down"  href="javascript:;" pro_id="{{$c->rowId}}"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" id="total_{{$c->rowId}}">{{$c->options->tong}}đ</p>
							</td>

							<td class="cart_delete">
								<a class="cart_quantity_delete" href="javascript:;" pro_id="{{$c->rowId}}" id="down_{{$c->rowId}}" ><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
			
	</section> <!-- /#cart_items -->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng:<span class="tong">{{$tongcong}}<u>đ</u></span></li>
							<li>Phí ship: <span>0<u>đ</u></span></li>
							<li>Tổng cộng: <span class="tong1">{{$tongcong}}<u>đ</u></span></li>
						</ul>
							
							<a class="btn btn-default check_out " href="{{route('product.checkout')}}">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
@section('js')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script>

	$(document).ready(function(){
	
	$('.cart_quantity_delete').click(function(){
		var pro_id=$('.cart_quantity_delete').attr('pro_id');
		$.ajax({
		url:'{{route('Cart.remove')}}',
		method:'POST',
		data: {
			id : pro_id,
			_token: '{{csrf_token()}}' 
		},
		dataType:'JSON',
		success: function(rp){
			$('#pro_'+rp.id).remove();
			$('.tong').text(rp.total);
			$('.tong1').text(rp.total);
		},
		error: function(){
			console.log('error');
		}

		});
	})
	
	$('.cart_quantity_up').click(function(){
		var pro_id=$(this).attr('pro_id');
		var val= $('#qty_'+pro_id).val(); 
		val++;
		$('#qty_'+pro_id).attr('value', val);
		$.ajax({
			url:'{{route('Cart.change')}}',
			method:'POST',
			data:{
				id:pro_id,
				val:val,
				_token: '{{csrf_token()}}'
			},
			dataType:'JSON',
			success: function(rp){
				$('#total_'+rp.id).text(rp.valrp +'đ');
				$('.tong').text(rp.total);
				$('.tong1').text(rp.total);
			},
			error: function(){
				console.log('error');
			}


		});
		
	});
	$('.cart_quantity_down').click(function(){
		var pro_id=$(this).attr('pro_id');
		var val= $('#qty_'+pro_id).val(); 

		if(val >=2){
			val--;
			$('#qty_'+pro_id).attr('value', val);
		}
		$.ajax({
			url:'{{route('Cart.change')}}',
			method:'POST',
			data:{
				id:pro_id,
				val:val,
				_token: '{{csrf_token()}}'
			},
			dataType:'JSON',
			success: function(rp){
				console.log(rp);
				$('#total_'+rp.id).text(rp.valrp +'đ');
				$('.tong').text(rp.total);
				$('.tong1').text(rp.total);
			},
			error: function(){
				console.log('error');
			}


		});
		
		
	});

});

</script>


@endsection