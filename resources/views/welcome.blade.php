<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>INOX HOOK</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap styles -->
	<link href="{{asset('public/frontend/css/bootstrap.css')}}" rel="stylesheet" />
	<!-- Customize styles -->
	<link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet" />
	<link href="{{asset('public/frontend/css/bootstrap-responsive.css')}}" rel="stylesheet" />
	<!-- font awesome styles -->
	<link href="{{asset('public/frontend/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
	<!--[if IE 7]>
			<link href="{{asset('public/frontendcss/font-awesome-ie7.min.css')}}" rel="stylesheet">
		<![endif]-->

	<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{asset('public/frontend/ico/favicon.ico')}}">
</head>

<body>
	<div>
		<!--Lower Header Section-->
		<div class="container">
			<div id="gototop"> </div>
			<header id="header">
				<div class="row">
					<h1>
						<div class="logo"  style="display: inline-flex;">
							<a href="{{url('/trang-chu')}}">
								<img src="{{('public/frontend/img/logo.jpg')}}" alt="bootstrap sexy shop">
							</a>
							&nbsp;
							<img src="{{('public/frontend/img/logo2.jpg')}}" alt="bootstrap sexy shop">
							
							
						</div>
					</h1>

				</div>
			</header>
			<div id="sear">
				<form action="#" class="navbar-search pull-left" style="display: inline-flex;">
					<i class="fa fa-search" aria-hidden="true"></i>&nbsp;
					<input type="text" placeholder="Bạn đang tìm sản phẩm nào" class="search-query span2">
				</form>
			</div>
			<br>
			<!--
Navigation Bar Section 
-->

			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<div class="nav-collapse">
							<ul class="nav">

								<li class=""><a href="{{url('/trang-chu')}}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
								<li class=""><a href="list-view.html"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Giới thiệu</a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa-brands fa-font-awesome"></i>&nbsp; Thương hiệu <b class="caret"></b></a>
									<div class="dropdown-menu">
										@foreach($nsx as $key)
										<div style="text-align: center;width:100%;">
											<a>{{$key->TenNSX}}</a>
										</div>
										<br>
										@endforeach
									</div>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp; Loại sản phẩm <b class="caret"></b></a>
									<div class="dropdown-menu">
										@foreach($loaisp as $key)
										<div style="text-align: center;width:100%;">
											<a style="width: 100%;">{{$key->TenLoai}}</a>
										</div>
										<br>
										@endforeach
									</div>
								</li>								
								<li class=""><a href="list-view.html"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Hỗ trợ</a></li>
								<li class=""><a href="list-view.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Giỏ hàng</a></li>
								<li class=""><a href="list-view.html"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;Lịch sử mua hàng</a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Tài khoản <b class="caret"></b></a>
									<div class="dropdown-menu">
										<div style="text-align: center;width:100%;padding: 0">
											<i class="fa fa-sign-in" aria-hidden="true"></i>
											<a>Đăng nhập</a>
										</div>
										<br>
										<div style="text-align: center;width:100%;">
											<i class="fa fa-sign-out" aria-hidden="true"></i>
											<a>Đăng xuất</a>
										</div>
									</div>
								</li>
							</ul>



						</div>
					</div>
				</div>
			</div>
			<!--Body Section-->
			<div class="row">
				<div id="sidebar" class="span3">
					<div class="well well-small">
						<h2>Loại sản phẩm</h2>
						<ul class="nav nav-list">
							@foreach ($loaisp as $key)
							<li><a href="products.html"><span class="icon-chevron-right"></span>{{$key->TenLoai}}</a></li><br>							
							@endforeach
							<li style="border:0"> &nbsp;</li>
						</ul>
					</div>
				</div>

				<div class="span9">
					<div class="well np">
						<div id="myCarousel" class="carousel slide homCar">
							<div class="carousel-inner">
								<div class="item">
									<img style="width:100%" src="{{('public/frontend/img/bootstrap_free-ecommerce.png')}}" alt="bootstrap ecommerce templates">
									<div class="carousel-caption">
										<h4>Bootstrap shopping cart</h4>
										<p><span>Very clean simple to use</span></p>
									</div>
								</div>
								<div class="item">
									<img style="width:100%" src="{{('public/frontend/img/carousel1.png')}}" alt="bootstrap ecommerce templates">
									<div class="carousel-caption">
										<h4>Bootstrap Ecommerce template</h4>
										<p><span>Highly Google seo friendly</span></p>
									</div>
								</div>
								<div class="item active">
									<img style="width:100%" src="{{('public/frontend/img/carousel3.png')}}" alt="bootstrap ecommerce templates">
									<div class="carousel-caption">
										<h4>Twitter Bootstrap cart</h4>
										<p><span>Very easy to integrate and expand.</span></p>
									</div>
								</div>
								<div class="item">
									<img style="width:100%" src="{{('public/frontend/img/bootstrap-templates.png')}}" alt="bootstrap templates">
									<div class="carousel-caption">
										<h4>Bootstrap templates integration</h4>
										<p><span>Compitable to many more opensource cart</span></p>
									</div>
								</div>
							</div>
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
						</div>
					</div>
					@yield('content')
					<!-- Clients-->

				</div>
				

			</div>
			
			<!-- /container -->
			<!--Footer-->
			<footer class="footer">
				<section class="our_client">
					<hr class="soften" />
					<h4 class="title cntr"><span class="text">Nhà cung cấp</span></h4>
					<hr class="soften" />
					<div class="row">
						<div class="span2">
							<a href="#"><img alt="" src="{{('public/frontend/img/TH1.png')}}"></a>
						</div>
						<div class="span2">
							<a href="#"><img alt="" src="{{('public/frontend/img/TH2.jpg')}}"></a>
						</div>
						<div class="span2">
							<a href="#"><img alt="" src="{{('public/frontend/img/3.png')}}"></a>
						</div>
						<div class="span2">
							<a href="#"><img alt="" src="{{('public/frontend/img/4.png')}}"></a>
						</div>
						<div class="span2">
							<a href="#"><img alt="" src="{{('public/frontend/img/5.png')}}"></a>
						</div>
						<div class="span2">
							<a href="#"><img alt="" src="{{('public/frontend/img/6.png')}}"></a>
						</div>
					</div>
				</section>
			</footer>
			<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
			<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
			<script src="{{asset('public/frontend/js/jquery.easing-1.3.min.js')}}"></script>
			<script src="{{asset('public/frontend/js/jquery.scrollTo-1.4.3.1-min.js')}}"></script>
			<script src="{{asset('public/frontend/js/shop.js')}}"></script>
			<script src="https://kit.fontawesome.com/7e14c6b25d.js" crossorigin="anonymous"></script>
</body>

</html>