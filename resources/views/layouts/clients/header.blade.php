<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{route('home')}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{route('home')}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{route('home')}}"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="{{route('home')}}"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="{{route('home')}}"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{route('home')}}"><img class="logo-img" src="images/mon-an/ava1.jpg" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{route('product.checkout')}}"><i class="fa fa-crosshairs"></i> Kiểm tra đơn hàng</a></li>
								<li><a href="{{route('Cart.index')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								@if(Auth::user())
								<li><a href=""><i class="fa fa-user"></i>Xin chào,{{Auth::user()->name}}</a> </li>
								<li><a href="{{route('logout')}}">Đăng xuất</a></li>
								@endif

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('home')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Đặt món<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	@foreach($cates as $c)
                                        <li><a href="{{route('product.list',['id' => $c->id])}}">{{$c->cate_name}}</a></li>
										
										@endforeach 
                                    </ul>
                                </li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="" method="get" accept-charset="utf-8">
							
							<div class="search_box pull-right">
								<input type="text" name="keyword">
								<button type="submit" class="btn btn-sm">Tìm kiếm</button>
							</div>
				
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->