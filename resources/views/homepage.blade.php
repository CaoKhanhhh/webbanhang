@extends('layouts.clients.master')

@section('slide')
	@include('layouts.clients.slide')
@endsection

@section('sidebar')
	@include('layouts.clients.sidebar')
@endsection

@section('content')
	<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Món ăn</h2>
						@if(!$pro)
						<h4><b>Không tìm thấy kết quả</b></h4>
						@endif	
						@foreach($pro as $p)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset($p->image)}}" alt="" />
											<h2>{{$p->price}}<u>đ</u></h2>
											<p>{{$p->name}}</p>
											<a href="{{route('product.detail',['id'=> $p->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
										</div>
										
								</div>
								
							</div>
						</div>
						@endforeach
						@if($flag==1)
						<ul class="pagination">

							{{ $pro->links() 	}}
						</ul>
						@endif
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#doan" data-toggle="tab">Đồ ăn</a></li>
								<li><a href="#douong" data-toggle="tab">Đồ uống</a></li>
								<li><a href="#doanvat" data-toggle="tab">Đồ ăn vặt</a></li>
								<li><a href="#comtrua" data-toggle="tab">Cơm trưa</a></li>
								<li><a href="#trangmieng" data-toggle="tab">Tráng miệng</a></li>
							</ul>
						</div>
						<div class="tab-content">
							
							<div class="tab-pane fade active in" id="doan" >
								@foreach($doan as $d)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{$d->image}}" alt="" />
												<h2>{{$d->price}}<u>đ</u></h2>
												<p>{{$d->name}}</p>
												<a href="{{route('product.detail',['id' =>$d->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
											</div>
											
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
							
							<div class="tab-pane fade" id="douong" >
								@foreach($douong as $du)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{$du->image}}" alt="" />
												<h2>{{$du->price}}<u>đ</u></h2>
												<p>{{$du->name}}</p>
												<a href="{{route('product.detail',['id'=>$du->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
											</div>
											
										</div>
									</div>
								</div>
								
								@endforeach
							</div>
							
							<div class="tab-pane fade" id="doanvat" >
								@foreach($doanvat as $dav)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{$dav->image}}" alt="" />
												<h2>{{$dav->price}}<u>đ</u></h2>
												<p>{{$dav->name}}</p>
												<a href="{{route('product.detail',['id'=>$dav->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
											</div>
											
										</div>
									</div>
								</div>
								
								@endforeach
								
							</div>
							
							<div class="tab-pane fade" id="comtrua" >
								@foreach($comtrua as $ct)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{$ct->image}}" alt="" />
												<h2>{{$ct->price}}<u>đ</u></h2>
												<p>{{$ct->name}}</p>
												<a href="{{route('product.detail',['id'=>$ct->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
											</div>
											
										</div>
									</div>
								</div>
								
								@endforeach
								
							</div>
							
							<div class="tab-pane fade" id="trangmieng" >
								@foreach($trangmieng as $tm)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{$tm->image}}" alt="" />
												<h2>{{$tm->price}}<u>đ</u></h2>
												<p>{{$tm->name}}</p>
												<a href="{{route('product.detail',['id'=>$tm->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
											</div>
											
										</div>
									</div>
								</div>
								
								@endforeach
								
							</div>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Gợi ý</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								@foreach($recommend as $key =>$re)
								@if($key >2)
								@break
								@endif	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo recommend-img text-center">
													<img src="{{$re->image}}" alt="" />
													<h2>{{$re->price}}<u>đ</u></h2>
													<p>{{$re->name}}</p>
													<a href="{{route('product.detail',['id'=>$re->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
												</div>
												
											</div>
										</div>
									</div>
								@endforeach
									
								</div>
								<div class="item">
								@foreach($recommend as $key =>$re)
								@if($key< 3) 
								@continue
								@endif	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo recommend-img text-center">
													<img src="{{$re->image}}" alt="" />
													<h2>{{$re->price}}<u>đ</u></h2>
													<p>{{$re->name}}</p>
													<a href="{{route('product.detail',['id'=>$re->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
												</div>
												
											</div>
										</div>
									</div>
								@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
@endsection

	
	