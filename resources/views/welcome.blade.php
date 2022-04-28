<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
							<ul class="nav" style="font-family:Display;font-size: 17px;width: max-content;">

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
								<li class=""><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Giỏ hàng</a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp; Đơn hàng 
										@if((Session::get('check1') && (Session::get('check1')==1)) || (Session::get('check2') && (Session::get('check2')==2)) || (Session::get('check3') && (Session::get('check3')==3)))
											<i class="fa fa-exclamation" aria-hidden="true" style="color: red;"></i>
										@endif
										<b class="caret"></b></a>
									<div class="dropdown-menu">
										<div style="width:100%;text-align: center;" class="divus">
											<a href="{{URL::to('/cho-xac-nhan')}}">Chờ xác nhận
												@if(Session::get('check1') && Session::get('check1')==1)
													<i class="fa fa-exclamation" aria-hidden="true" style="color: red;"></i>
												@endif
											</a>
										</div>
										<br>
										<div style="width:100%;text-align: center;" class="divus">
											<a href="{{URL::to('/da-xac-nhan')}}">Đã xác nhận
												@if(Session::get('check2') && Session::get('check2')==2)
													<i class="fa fa-exclamation" aria-hidden="true" style="color: red;"></i>
												@endif
											</a>
										</div>
										<br>
										<div style="width:100%;text-align: center;" class="divus" >
											<a href="{{URL::to('/dang-giao')}}">Đang giao
												@if(Session::get('check3') && Session::get('check3')==3)
													<i class="fa fa-exclamation" aria-hidden="true" style="color: red;"></i>
												@endif
											</a>
										</div>
										<br>
										<div style="width:100%;text-align: center;" class="divus">
											<a href="{{URL::to('/da-hoan-thanh')}}">Đã hoàn thành</a>
										</div>
									</div>
								</li>
								@if(Session::get('user_id'))
								<?php
								$username=Session::get('user_name');
								?>
								<li class="dropdown" style=";float: right;">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; {{$username}} <b class="caret"></b></a>
									<div class="dropdown-menu">
										<div style="width:100%;" class="divus">
											<i class="fa fa-pencil" aria-hidden="true"></i>
											&nbsp;
											<a href="{{URL::to('/thong-tin-ca-nhan')}}">Thông tin cá nhân</a>
										</div>
										<br>
										<div style="width:100%;" class="divus">
											<i class="fa fa-pencil" aria-hidden="true"></i>
											&nbsp;
											<a href="{{URL::to('/update-mat-khau')}}">Thay đổi mật khẩu</a>
										</div>
										<br>
										<div style="width:100%;" class="divus">
											<i class="fa fa-sign-out" aria-hidden="true"></i>											
											&nbsp;
											<a href="{{URL::to('/logout-user')}}">Đăng xuất</a>
										</div>
									</div>
								</li>
								@else
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"></span><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Tài khoản <b class="caret"></b></a>
									<div class="dropdown-menu">
										<div style="width:100%;" class="divus">
											<i class="fa fa-sign-in" aria-hidden="true"></i>
											&nbsp;
											<a href="{{URL::to('/login')}}">Đăng nhập</a>
										</div>
										<br>
										<div style="width:100%;" class="divus">
											<i class="fa fa-pencil" aria-hidden="true"></i>
											&nbsp;
											<a href="{{URL::to('/register')}}">Đăng ký</a>
										</div>
									</div>
								</li>
								@endif
							</ul>



						</div>
					</div>
				</div>
			</div>
			<div class="container" style="width: 100%;">
				<!-- Modal -->
				<div class="modal fade" id="sosanh" role="dialog" style="width: 70%;height:100%;margin-left: 15%;margin-right: 15%;margin-bottom: 5%;">
				  <div class="modal-dialog" style="width: 100%;height: 100%;margin-top: 0;margin-bottom: 0;">
				  
					<!-- Modal content-->
					<div class="modal-content" style="width: 100%;height: 100%;margin-top: 0;margin-bottom: 0;">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><span id="title-compare" style="text-align: center;"></span></h4>
					  </div>
					  <div class="modal-body">
						<div id="row_compare">
							<table class="table table-hover">
								<thead>
								  <tr>
									<th>Tên sản phẩm</th>
									<th>Hình ảnh</th>
									<th>Giá bán</th>
									<th>Chất liệu</th>
									<th>Nhà sản xuất</th>
									<th>Đặt hàng</th>
									<th>Xóa</th>
								  </tr>
								</thead>
								<tbody>
															
								</tbody>
							  </table>
						</div>
						
					  </div>
					  {{-- <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div> --}}
					</div>
					
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
						<div class="well well-small" style="font-family:Display;overflow: scroll;height: 600px;">
							<h2 style="text-align: center; x-large;font-weight: bold;">Thương hiệu</h2>
							<br>
							<ul class="nav nav-list" style="font-size: 20px;">
								@foreach ($nsx as $key)
								<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$key->MaNSX)}}"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;{{$key->TenNSX}}</a></li><br>							
								@endforeach
								<li style="border:0"> &nbsp;</li>
							</ul>
						</div>
						<div class="well well-small" style="font-family:Display;">
							<h2 style="text-align: center; x-large;font-weight: bold;">Sản phẩm yêu thích</h2>
							<br>	
							<div id="row_wishlist" class="row">
							
							</div>						
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
<script src="{{asset('public/frontend/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
{{-- <script src="{{asset('public/frontend/js/jquery.js')}}"></script> --}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollTo-1.4.3.1-min.js')}}"></script>
<script src="{{asset('public/frontend/js/shop.js')}}"></script>			
<script src="https://kit.fontawesome.com/7e14c6b25d.js" crossorigin="anonymous"></script>
<script type="text/javascript">
//So sánh SP
function delete_compare(id){
	if(localStorage.getItem('compare')!=null){
		var data=JSON.parse(localStorage.getItem('compare'));
		var index=data.findIndex(item=>item.id===id);
		data.splice(index,1);
		localStorage.setItem('compare',JSON.stringify(data));
		//remove element by id
		document.getElementById('row_compare'+id).remove();
	}
}
sosanh();
function sosanh(){
	if(localStorage.getItem('compare')!=null){
		var data=JSON.parse(localStorage.getItem('compare'));
		for(i=0;i<data.length;i++){
			var name=data[i].name;
			var price=data[i].price;
			var image=data[i].image;
			var url=data[i].url;
			var id=data[i].id;
			var nsx=data[i].nsx;
			var chatlieu=data[i].chatlieu;
			$('#row_compare').find('tbody').append(`
			<tr id="row_compare${id}">
								<td>${name}</td>
								<td><img src="${image}" style="width:200px;height:200px;"></td>
								<td>${price}</td>
								<td>${chatlieu}</td>
								<td>${nsx}</td>
								<td><a href="${url}" class="shopBtn" style="font-size:8px;cursor:pointer;">Thêm vào giỏ hàng</a></td>
								<td><a class="shopBtn" onclick="delete_compare(${id})" style="font-size:8px;cursor:pointer;">Xóa so sánh</a></td>
			</tr>	
			`);
		}
	}
}

function add_compare(product_id){
	document.getElementById('title-compare').innerText='Chỉ cho phép so sánh tối đa 2 sản phẩm!'
	var id=product_id;
	var name=document.getElementById('wishlist_productname'+id).value;
	var price=document.getElementById('wishlist_productprice'+id).value;
	var image=document.getElementById('wishlist_productimg'+id).src;
	var url=document.getElementById('wishlist_producturl'+id).href;
	var nsx=document.getElementById('wishlist_productnsx'+id).value;
	var chatlieu=document.getElementById('wishlist_productchatlieu'+id).value;
	var newItem={
		'url':url,
		'id':id,
		'name':name,
		'price':price,
		'image':image,
		'nsx':nsx,
		'chatlieu':chatlieu
	};
	if(localStorage.getItem('compare')==null){
		localStorage.setItem('compare','[]');
	}
	var old_data=JSON.parse(localStorage.getItem('compare'));
	var matches=$.grep(old_data,function(obj){
		return obj.id==id;
	})
	if(matches.length){
		alert('Sản phẩm đã thêm vào so sánh!')
	}else{
		if(old_data.length<2){
			old_data.push(newItem);
			$('#row_compare').find('tbody').append(`
			<tr id="row_compare${newItem.id}">
								<td>${newItem.name}</td>
								<td><img src="${newItem.image}" style="width:200px;height:200px;"></td>
								<td>${newItem.price}</td>
								<td>${newItem.chatlieu}</td>
								<td>${newItem.nsx}</td>
								<td><a href="${newItem.url}" class="shopBtn" style="font-size:8px;cursor:pointer;">Thêm vào giỏ hàng</a></td>
								<td><a class="shopBtn" onclick="delete_compare(${newItem.id})" style="font-size:8px;cursor:pointer;">Xóa so sánh</a></td>
			</tr>	
			`);
		}
	}
	localStorage.setItem('compare',JSON.stringify(old_data));
	$('#sosanh').modal();
}
//SP yêu thích
function view(){
	if(localStorage.getItem('data')!=null){
		var data=JSON.parse(localStorage.getItem('data'));
		data.reverse();
		document.getElementById('row_wishlist').style.overflow='scroll';
		document.getElementById('row_wishlist').style.height='600px;';
		for(i=0;i<data.length;i++){
			var name=data[i].name;
			var price=data[i].price;
			var image=data[i].image;
			var url=data[i].url;
			$('#row_wishlist').append(`<div class="row" style="margin-left:20px;margin-right:15px;border:solid 1px white;width:90%;padding:5px;"><div class="col-md-4">
				<img src="${image}" style="width:150px;height:70px;"></div><div class="col-md-8"><p>${name}</p>
				<p style="color:#FE980F;font-size:20px;">${price}VND</p><a href="${url}" class="shopBtn" style="font-size:10px;cursor:pointer;">Thêm vào giỏ hàng</a></div></div><br>`);
		}
	}
}
view();
function add_wishlist(clicked_id){
	var id=clicked_id;
	var name=document.getElementById('wishlist_productname'+id).value;
	var price=document.getElementById('wishlist_productprice'+id).value;
	var image=document.getElementById('wishlist_productimg'+id).src;
	var url=document.getElementById('wishlist_producturl'+id).href;
	var newItem={
		'url':url,
		'id':id,
		'name':name,
		'price':price,
		'image':image
	};
	if(localStorage.getItem('data')==null){
		localStorage.setItem('data','[]');
	}
	var old_data=JSON.parse(localStorage.getItem('data'));
	var matches=$.grep(old_data,function(obj){
		return obj.id==id;
	})
	if(matches.length){
		alert('Sản phẩm đã yêu thích!')
	}else{
		old_data.push(newItem);
		$('#row_wishlist').append(`<div class="row" style="margin-left:20px;margin-right:15px;border:solid 1px white;width:90%;padding:5px;"><div class="col-md-4">
				<img src="${newItem.image}" style="width:150px;height:70px;"></div><div class="col-md-8"><p>${newItem.name}</p>
				<p style="color:#FE980F;font-size:20px;">${newItem.price}VND</p><a href="${newItem.url}" class="shopBtn" style="font-size:12px;cursor:pointer;">Thêm vào giỏ hàng</a></div></div><br>`);
		alert('Thêm sản phẩm vào yêu thích thành công!!')
		
	}
	localStorage.setItem('data',JSON.stringify(old_data));
}
</script>
</body>

</html>