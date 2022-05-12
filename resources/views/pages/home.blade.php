@extends('welcome')
@section('content')		
				<!--New Products-->				
				<div class="well well-small" style="font-family:Display;background: rgb(221, 231, 214);
				box-shadow: 15px 10px 8px -6px #ccc;
				border-radius: 24px;">
					<h2 style="width: 100%;text-align: center;height: 100%;color: rgb(228, 116, 11);font-weight: bold;"><p id="blink1"><i class="fa fa-star-o" aria-hidden="true"></i>Sản phẩm mới<i class="fa fa-star-o" aria-hidden="true"></i></p></h2>
					<hr class="soften" style="color: rgb(228, 116, 11);background: rgb(228, 116, 11);"/>
					<div class="row-fluid">
						<div id="newProductCar" class="carousel slide" style="display: flex;justify-content: center;align-items: center; width: 100%;">
							<div class="carousel-inner" style="display: flex;justify-content: center;align-items: center;" id="dvv1" >
								<div class="spin" id="spin1"></div>
								@foreach($all_product as $key)								
								<div class="item " style="margin-left: 250px;margin-right: auto;width: 350px;height:360px;">
									<div class="thumbnail" style="width: 350px;height:400px;">
										<form>
											@csrf	
										<input type="hidden" id="wishlist_productid{{$key->MaSP}}" value="{{$key->MaSP}}">
										<input type="hidden" id="wishlist_productname{{$key->MaSP}}" value="{{$key->TenSP}}">
										<input type="hidden" id="wishlist_productnsx{{$key->MaSP}}" value="{{$key->TenNSX}}">
										<input type="hidden" id="wishlist_productchatlieu{{$key->MaSP}}" value="{{$key->TenChatLieu}}">
										<input type="hidden" id="wishlist_productprice{{$key->MaSP}}" value="{{$key->DonGiaBan}}">
										<input type="hidden" id="wishlist_productkm{{$key->MaSP}}" value="{{$key->KhuyenMai}}">											
										<img id="wishlist_productimg{{$key->MaSP}}" src="{{$key->AnhSP}}" style="width: 350px;height: 250px;" alt="">
										<div class="caption cntr" style="padding:0;">
											<p>{{$key->TenSP}}</p>
											@if($key->KhuyenMai>0)
											<p  style="color: red;font-size: larger;"><strong>Sale:{{($key->KhuyenMai)*100}}%</strong></p>
											@endif
											<p><strong>Giá bán: {{number_format(round((int)($key->DonGiaBan)*(1-$key->KhuyenMai)),0)}} VND</strong></p>
											<h4><a id="wishlist_producturl{{$key->MaSP}}" href="{{URL::to('/chi-tiet-san-pham/'.$key->MaSP)}}" class="shopBtn" name="addtocart" > Thêm vào giỏ hàng </a></h4>
										</form>
											<div class="actionList" style="height: 10%;">
												<a class="pull-left" href="#" id="{{$key->MaSP}}" onclick="add_wishlist(this.id);"><i class="fa fa-plus" aria-hidden="true"></i>Yêu thích</a>
												<a class="pull-left" href="#" onclick="add_compare({{$key->MaSP}});"><i class="fa fa-plus" aria-hidden="true"></i>So sánh</a>
											</div>
											<br class="clr">
										</div>
									</div>
								</div>
											
								@endforeach		
								<a class="left carousel-control" href="#newProductCar" data-slide="prev" style="    margin-left: 500px;
								margin-right: 600px;
								margin-top: 180px;
								position: absolute;
								height: 50px;
								width: 50px;
								font-size: 30px;">&lsaquo;</a>
								<a class="right carousel-control" href="#newProductCar" data-slide="next" style="margin-top: 180px;
								height: 50px;
								width: 50px;
								position: absolute;
								margin-right: 130px;
								margin-left: 600px;font-size: 30px;">&rsaquo;</a>			
							</div>
							
						</div>
					</div>
				</div>
				<!--Featured Products-->
				<div class="well well-small" style="font-family:Display;background: rgb(221, 231, 214);
				box-shadow: 15px 10px 8px -6px #ccc;
				border-radius: 24px;">
					<h2 style="width: 100%;text-align: center;height: 100%;color: rgb(228, 116, 11);font-weight: bold;"><p id="blink"><i class="fa fa-bolt" aria-hidden="true"></i>Sản phẩm bán chạy<i class="fa fa-bolt" aria-hidden="true"></i></p></h2>
					<hr class="soften" style="color: rgb(228, 116, 11);background: rgb(228, 116, 11);"/>
					<div class="row-fluid">
						
						<div class="dssp">
							@foreach($spbanchay as $key)								
									<div class="thumbnail" style="width: 350px;height:420px;">
										<form style="margin: 0;">
											@csrf	
										<input type="hidden" id="wishlist_productid{{$key->MaSP}}" value="{{$key->MaSP}}">
										<input type="hidden" id="wishlist_productname{{$key->MaSP}}" value="{{$key->TenSP}}">
										<input type="hidden" id="wishlist_productnsx{{$key->MaSP}}" value="{{$key->TenNSX}}">
										<input type="hidden" id="wishlist_productchatlieu{{$key->MaSP}}" value="{{$key->TenChatLieu}}">
										<input type="hidden" id="wishlist_productprice{{$key->MaSP}}" value="{{$key->DonGiaBan}}">
										<input type="hidden" id="wishlist_productkm{{$key->MaSP}}" value="{{$key->KhuyenMai}}">											
										<img id="wishlist_productimg{{$key->MaSP}}" src="{{$key->AnhSP}}" style="width: 350px;height: 250px;" alt="">
										<div class="caption cntr" style="padding:0;">
											<p>{{$key->TenSP}}</p>
											@if($key->KhuyenMai>0)
											<p  style="color: red;font-size: larger;"><strong>Sale:{{($key->KhuyenMai)*100}}%</strong></p>
											@endif
											<p><strong>Giá bán: {{number_format(round((int)($key->DonGiaBan)*(1-$key->KhuyenMai)),0)}} VND</strong></p>
											<h4><a id="wishlist_producturl{{$key->MaSP}}" href="{{URL::to('/chi-tiet-san-pham/'.$key->MaSP)}}" class="shopBtn" name="addtocart" > Thêm vào giỏ hàng </a></h4>
										</form>
											<div class="actionList" style="height: 10%;">
												<a class="pull-left" href="#" id="{{$key->MaSP}}" onclick="add_wishlist(this.id);"><i class="fa fa-plus" aria-hidden="true"></i>Yêu thích</a>
												<a class="pull-left" href="#" onclick="add_compare({{$key->MaSP}});"><i class="fa fa-plus" aria-hidden="true"></i>So sánh</a>
											</div>
											<br class="clr">
										</div>
								</div>
											
								@endforeach   
						</div>	
						
					</div>
				</div>
				<!-- San pham giam gia-->
				<div class="well well-small" style="font-family:Display;background: rgb(221, 231, 214);
				box-shadow: 15px 10px 8px -6px #ccc;
				border-radius: 24px;">
					<h2 style="width: 100%;text-align: center;height: 100%;color: rgb(228, 116, 11);font-weight: bold;"><p id="blink2"><i class="fa fa-bolt" aria-hidden="true"></i>Sản phẩm giảm giá mạnh<i class="fa fa-bolt" aria-hidden="true"></i></p></h2>
					<hr class="soften" style="color: rgb(228, 116, 11);background: rgb(228, 116, 11);"/>
					<div class="row-fluid">
						
						<div class="dssp" style="height: 100%;">
							@foreach($spgiamgia as $key)								
									<div class="thumbnail" style="width: 350px;height:450px;">
										<form style="margin: 0;">
											@csrf	
										<input type="hidden" id="wishlist_productid{{$key->MaSP}}" value="{{$key->MaSP}}">
										<input type="hidden" id="wishlist_productname{{$key->MaSP}}" value="{{$key->TenSP}}">
										<input type="hidden" id="wishlist_productnsx{{$key->MaSP}}" value="{{$key->TenNSX}}">
										<input type="hidden" id="wishlist_productchatlieu{{$key->MaSP}}" value="{{$key->TenChatLieu}}">
										<input type="hidden" id="wishlist_productprice{{$key->MaSP}}" value="{{$key->DonGiaBan}}">										
										<input type="hidden" id="wishlist_productkm{{$key->MaSP}}" value="{{$key->KhuyenMai}}">										
										<img id="wishlist_productimg{{$key->MaSP}}" src="{{$key->AnhSP}}" style="width: 350px;height: 250px;" alt="">
										<div class="caption cntr" style="padding:0;">
											<p>{{$key->TenSP}}</p>
											<p  style="color: red;font-size: larger;"><strong>Sale:{{($key->KhuyenMai)*100}}%</strong></p>
											<p>Giá gốc:<s id="precost"><strong> {{number_format($key->DonGiaBan)}} </strong></s> VND</p>
											<p style="font-size: large"><strong>Giá bán: {{number_format(round((int)($key->DonGiaBan)*(1-$key->KhuyenMai)),0)}} VND</strong></p>
											<h4><a id="wishlist_producturl{{$key->MaSP}}" href="{{URL::to('/chi-tiet-san-pham/'.$key->MaSP)}}" class="shopBtn" name="addtocart" > Thêm vào giỏ hàng </a></h4>
										</form>
											<div class="actionList" style="height: 10%;">
												<a class="pull-left" href="#" id="{{$key->MaSP}}" onclick="add_wishlist(this.id);"><i class="fa fa-plus" aria-hidden="true"></i>Yêu thích</a>
												<a class="pull-left" href="#" onclick="add_compare({{$key->MaSP}});"><i class="fa fa-plus" aria-hidden="true"></i>So sánh</a>
											</div>
											<br class="clr">
										</div>
								</div>
											
								@endforeach   
						</div>	
						
					</div>
				</div>
			</div>
		</div>
<script src="{{asset('public/frontend/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script type="text/javascript">
	  setTimeout(() => {
	const box = document.getElementById('spin1');
	const dvv = document.getElementById('dvv1');
	box.style.display = 'none';
	dvv.style.display = 'inline';
  }, 5500);
  var blink = document.getElementById('blink');
      setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
      }, 300);
	  var blink11 = document.getElementById('blink1');
      setInterval(function() {
        blink1.style.opacity = (blink1.style.opacity == 0 ? 1 : 0);
      }, 300);
	  var blink2 = document.getElementById('blink2');
      setInterval(function() {
        blink2.style.opacity = (blink2.style.opacity == 0 ? 1 : 0);
      }, 300);
</script>
@endsection