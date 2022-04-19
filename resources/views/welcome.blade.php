<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>INOX HOMES</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet" />
	<!-- Bootstrap styles -->\
	<link href="{{asset('public/frontend/css/bootstrap.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >

	<!-- Customize styles -->
	<link href="{{asset('public/frontend/css/bootstrap-responsive.css')}}" rel="stylesheet" />
	<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet" />
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
				<div id="sear">
					<form action="{{URL::to('/tim-kiem')}}" class="navbar-search pull-left" style="display: inline-flex;font-family:Display;" method="GET">
						<input type="text" name="ten" placeholder="Bạn đang tìm sản phẩm nào" class="search-query span2">
						<button type="submit" name="search" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</header>
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
							<ul class="nav" style="font-family:Display;font-size: 17px">

								<li class=""><a href="{{url('/trang-chu')}}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
								<li class=""><a href="{{URL::to('/infor')}}"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Giới thiệu</a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa-brands fa-font-awesome"></i>&nbsp; Thương hiệu <b class="caret"></b></a>
									<div class="dropdown-menu">
										@foreach($nsx as $key)
										<div style="text-align: center;width:100%;" class="divnsx">
											<a href="{{URL::to('/thuong-hieu-san-pham/'.$key->MaNSX)}}">{{$key->TenNSX}}</a>
										</div>
										<br>
										@endforeach
									</div>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp; Danh mục sản phẩm <b class="caret"></b></a>
									<div class="dropdown-menu">
										@foreach($loaisp as $key)
										<div style="text-align: center;width:100%;" class="divhv">
											<a href="{{URL::to('/danh-muc-san-pham/'.$key->MaLoai)}}" style="width: 100%;">{{$key->TenLoai}}</a>
										</div>
										<br>
										@endforeach
									</div>
								</li>								
								<li class=""><a href="{{URL::to('/help')}}"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Hỗ trợ</a></li>
								<li class=""><a href="list-view.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Giỏ hàng</a></li>
								<li class=""><a href="list-view.html"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;Lịch sử mua hàng</a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Tài khoản <b class="caret"></b></a>
									<div class="dropdown-menu">
										<div style="display: flex;justify-content: center;align-items: center;width:100%;" class="divus">
											<i class="fa fa-sign-in" aria-hidden="true"></i>
											&nbsp;
											<a href="{{URL::to('/login')}}">Đăng nhập</a>
										</div>
										<br>
										<div style="display: flex;justify-content: center;align-items: center;width:100%;" class="divus">
											<i class="fa fa-pencil" aria-hidden="true"></i>
											&nbsp;
											<a>Đăng ký</a>
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
				<div>
					<div id="sidebar" class="span3">
						<div class="well well-small" style="font-family:Display;">
							<h2 style="text-align: center; font-size: x-large;font-weight: bold;">Danh mục sản phẩm</h2>
							<br>
							<ul class="nav nav-list" style="font-size: 20px;">
								@foreach ($loaisp as $key)
								<li><a href="{{URL::to('/danh-muc-san-pham/'.$key->MaLoai)}}"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;{{$key->TenLoai}}</a></li><br>							
								@endforeach
								<li style="border:0"> &nbsp;</li>
							</ul>
						</div>
						<div class="well well-small" style="font-family:Display;">
							<h2 style="text-align: center; x-large;font-weight: bold;">Thương hiệu</h2>
							<br>
							<ul class="nav nav-list" style="font-size: 20px;">
								@foreach ($nsx as $key)
								<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$key->MaNSX)}}"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;{{$key->TenNSX}}</a></li><br>							
								@endforeach
								<li style="border:0"> &nbsp;</li>
							</ul>
						</div>
					</div>

				</div>
				
				<div>
					<div class="span9">
						<div class="well np">
							<div id="myCarousel" class="carousel slide homCar">
								<div class="carousel-inner" style="display: flex;justify-content: center;align-items: center;" id="dvv">
									<div class="spin" id="spin"></div>
										@foreach($slider as $key)
											<div class="item">
												<img style="width:100%" src="{{asset($key->Anh)}}">
											</div>
										@endforeach								
								</div>
								<a class="left carousel-control" href="#myCarousel" data-slide="prev" style="width: 10%;margin-top: 20px;">&lsaquo;</a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next" style="width: 10%;margin-top: 20px;">&rsaquo;</a>
							</div>
						</div>
					
					@yield('content')


					</div>
				</div>
				
				

			</div>
			
			<!-- /container -->
			<!--Footer-->
			<footer class="footer" style="height: fit-content;">
				<section class="our_client" style="height: fit-content;">
					<hr class="soften" />
					<h4 class="title cntr"><span class="text" style="color: rgb(57, 55, 52)">Thương hiệu</span></h4>
					<hr class="soften" />
					<div class="row" style="display: inline-flex;height: fit-content;">
						@foreach($nsx as $key)
						@if ($key->Anh==null)
						@else
						<div class="span2" style="width: auto;">
							<a href="#"><img alt="" src="{{asset($key->Anh)}}" style="height: 100px;width:auto;" ></a>
						</div>
						&nbsp;
						@endif
						
						@endforeach
					</div>
				</section>
			</footer>
			<a href="#" class="gotop" id="btnup"><i class="icon-double-angle-up"></i></a>
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="{{asset('public/frontend/js/jquery3x.js')}}"></script>
			{{-- <script src="{{asset('public/frontend/js/jquery.js')}}"></script> --}}
			<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
			<script src="{{asset('public/frontend/js/jquery.easing-1.3.min.js')}}"></script>
			<script src="{{asset('public/frontend/js/jquery.scrollTo-1.4.3.1-min.js')}}"></script>
			<script src="{{asset('public/frontend/js/shop.js')}}"></script>
			<script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('.shopBtn').click(function(){
						var id = $(this).data('id_product');
						var cart_product_id = $('.cart_product_id_' + id).val();
						var cart_product_name = $('.cart_product_name_' + id).val();
						var cart_product_image = $('.cart_product_image_' + id).val();
						var cart_product_price = $('.cart_product_price_' + id).val();
						var cart_product_qty = $('.cart_product_qty_' + id).val();
						var _token = $('input[name="_token"]').val();

						$.ajax({
							url: "{{url('/add-cart-ajax')}}",
                    		method: 'POST',
							data:{
								cart_product_id:cart_product_id,
								cart_product_name:cart_product_name,
								cart_product_image:cart_product_image,
								cart_product_price:cart_product_price,
								cart_product_qty:cart_product_qty,
								_token:_token
							},success:function(data){
								alert(data);
							}

						});
					});
				});
			</script>
			<script src="https://kit.fontawesome.com/7e14c6b25d.js" crossorigin="anonymous"></script>
</body>

</html>