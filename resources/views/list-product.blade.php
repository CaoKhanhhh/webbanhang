@extends('layouts.clients.master')
@section('title','Món ăn')
@section('sidebar')
@include('layouts.clients.sidebar')
@endsection

@section('content')
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items </h2>
						@foreach($pro as $p)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{$p->image}}" alt="" />
										<h2>{{$p->price}}</h2>
										<p>{{$p->name}}</p>
										<a href="{{route('product.detail',['id'=>$p->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
									</div>
									
								</div>
							
							</div>
						</div>
						@endforeach
						
						

					</div><!--features_items-->
					
					<ul class="pagination">

						{{ $pro->links() 	}}
					</ul>

				</div>
@endsection