@extends('welcome')
@section('content')		
				<!--New Products-->				
				<div class="well well-small" style="font-family:Display;">
					<h3 style="width: 100%;text-align: center;height: 100%;">Sản phẩm mới </h3>
					<hr class="soften" />
					<div class="row-fluid">
						<div id="newProductCar" class="carousel slide" style="display: flex;justify-content: center;align-items: center; width: 100%;">
							<div class="carousel-inner" style="display: flex;justify-content: center;align-items: center;" id="dvv1" >
								<div class="spin" id="spin1"></div>
								@foreach($all_product as $key)								
								<div class="item " style="margin-left: 250px;margin-right: auto;width: 350px;height:400px;">
									<div class="thumbnail" style="width: 350px;height:400px;">
										<form>
											@csrf	
										<input type="hidden" id="wishlist_productid{{$key->MaSP}}" value="{{$key->MaSP}}">
										<input type="hidden" id="wishlist_productname{{$key->MaSP}}" value="{{$key->TenSP}}">
										<input type="hidden" id="wishlist_productnsx{{$key->MaSP}}" value="{{$key->TenNSX}}">
										<input type="hidden" id="wishlist_productchatlieu{{$key->MaSP}}" value="{{$key->TenChatLieu}}">
										<input type="hidden" id="wishlist_productprice{{$key->MaSP}}" value="{{number_format($key->DonGiaBan)}}">										
										<img id="wishlist_productimg{{$key->MaSP}}" src="{{$key->AnhSP}}" style="width: 350px;height: 250px;" alt="">
										<div class="caption cntr">
											<p>{{$key->TenSP}}</p>
											<p><strong>Giá bán: {{number_format($key->DonGiaBan)}} VND</strong></p>
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
				<div class="well well-small" style="font-family:Display;">
					<h3 100%;text-align: center;height: 100%;><a class="btn btn-mini pull-right" href="products.html" title="View more">VIew More<span class="icon-plus"></span></a> Featured Products </h3>
					<hr class="soften" />
					<div class="row-fluid">
						<ul class="thumbnails">
							<li class="span4">
								<div class="thumbnail">
									<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
									<a href="product_details.html"><img src="{{('public/frontend/img/d.jpg')}}" alt=""></a>
									<div class="caption">
										<h5>Manicure & Pedicure</h5>
										<h4>
											<a class="defaultBtn" href="product_details.html" title="Click to view"><span class="icon-zoom-in"></span></a>
											<a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
											<span class="pull-right">$22.00</span>
										</h4>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="well well-small" style="font-family:Display;">
					<a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
					Popular Products
				</div>
				<hr>
				<div class="well well-small" style="font-family:Display;">
					<a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
					Best selling Products
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
</script>
@endsection