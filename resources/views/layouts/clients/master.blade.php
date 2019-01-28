<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','Trang chủ') | Bulgogi</title>
    <base href="{{asset('/assets').'/'}}" >
    @include('layouts.clients.style')
</head><!--/head-->

<body>
	
	@include('layouts.clients.header')
	@yield('slide')
	
	<section >
		<div class="container ">
			<div class="row">
				@yield('sidebar')
				
				@yield('content')
				
			</div>
		</div>
	</section>
	
	@include('layouts.clients.footer')
	@include('layouts.clients.script')
	@yield('js')
  
    
</body>
</html>