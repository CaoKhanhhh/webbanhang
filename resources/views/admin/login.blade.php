<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8"/>
<title>@yield('title','Trang chủ')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<base href="{{asset('/admin-assets').'/'}}">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
@include('layouts.admin.style')
</head>
<body class="login">
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="">
	<img src="assets/admin/layout/img/logo-big.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="{{route('login')}}" method="post">
		@csrf
		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>

        @if (isset($msg))
        <h5 class="text-danger">{{$msg}}</h5>
        @endif
        @if (session('msg'))
        <h5 class="text-danger">{{session('msg')}}</h5>    
        @endif
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Remember </label>
			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
		</div>
		<div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
				</li>
			</ul>
		</div>
		<div class="create-account">
			<p>
				<a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="{{route('user.create')}}" method="post">
		@csrf
		<h3>Sign Up</h3>
		<p class="hint">
			 Enter your personal details below:
		</p>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Họ tên</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Họ và tên" name="name"/>
			@if ($errors->first('name'))
			<span class="text-danger">{{$errors->first('name')}}</span>
			@endif
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			@if ($errors->first('email'))
			<span class="text-danger">{{$errors->first('email')}}</span>
			@endif
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
		</div>
		<div class="form-group">
			@if ($errors->first('address'))
			<span class="text-danger">{{$errors->first('address')}}</span>
			@endif
			<label class="control-label visible-ie8 visible-ie9">Địa chỉ</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Địa chỉ" name="address"/>
		</div>
		<div class="form-group">
			@if ($errors->first('phone_number'))
			<span class="text-danger">{{$errors->first('phone_number')}}</span>
			@endif
			<label class="control-label visible-ie8 visible-ie9">Số điện thoại</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Số điện thoại" name="phone_number"/>
		</div>
		
		<div class="form-actions">
			<a href="{{route('login')}}">
				<button type="button" id="register-back-btn" class="btn btn-default">Back</button>
			</a>
			
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
	 2014 © Metronic. Admin Dashboard Template.
</div>


</body>
@include('layouts.admin.script')
</html>