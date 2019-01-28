@extends('layouts.clients.master')
@section('title','Chi tiết món ăn')
@section('sidebar')
	@include('layouts.clients.sidebar')
@endsection

@section('content')
<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{$pro->image}}" alt="" />
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
											@foreach($pro->galleries as $key =>$gl)
											@if($key >2)
												@break
											@endif
										  		<a href=""><img src="{{$gl->img_url}}" alt=""></a>
										  	@endforeach

										
										</div>
										<div class="item">
										 @foreach($pro->galleries as $key =>$gl)
											@if($key < 3)
												@continue
											@endif
										  		<a href=""><img src="{{$gl->img_url}}" alt=""></a>
										  	@endforeach
										  
										</div>
										
										
									</div>


								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
								<form action="{{route('Cart.add',['id' => $pro->id])}}" method="get" accept-charset="utf-8">
									<h2>{{$pro->name}}</h2>
									<!-- <img src="images/product-details/rating.png" alt="" /> -->
									<span>
										<label>Số lượng:</label>
										<input type="number" value="1" name="qty" min="1" />
										
									</span>
									
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Mua ngay
									</button>
								
								</form>
								
								<!-- <p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p> -->
								<p>{{$pro->detail}}</p>		
				
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Mô tả</a></li>
								<!-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li> -->
								<li class="active"><a href="#reviews" data-toggle="tab">Chi tiết</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								
								<textarea name="" rows="10">{{$pro->short_desc}}</textarea>
							</div>
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<textarea name="" rows="10">{{$pro->detail}}</textarea>
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