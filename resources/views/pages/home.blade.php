@extends('welcome')
@section('content')		
				<!--New Products-->				
				<div class="well well-small" style="font-family:Display;">
					<h3 style="width: 100%;text-align: center;height: 100%;">Sản phẩm mới </h3>
					<hr class="soften" />
					<div class="row-fluid">
						<div id="newProductCar" class="carousel slide" style="display: flex;justify-content: center;align-items: center; width: 100%;">
							<ul class="thumbnails">
							@foreach($all_product as $key)
							
							<li class="span4">
										<div class="thumbnail" style="width: 100%;">
		
											<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> Xem chi tiết</a>
											<a href="product_details.html"><img src="{{$key->Anh}}" style="width: 100%;height: max-content;" alt=""></a>
											<div class="caption cntr">
												<p>{{$key->TenSP}}</p>
												<p><strong>Giá bán: {{number_format($key->DonGiaBan)}} VND</strong></p>
												<h4><a class="shopBtn" href="#" title="add to cart"> Thêm vào giỏ hàng </a></h4>
												<div class="actionList">
													<a class="pull-left" href="#"><i class="fa fa-heart" aria-hidden="true"></i>Yêu thích</a>
													<a class="pull-left" href="#"> So sánh</a>
												</div>
												<br class="clr">
											</div>
										</div>
							</li>
							@endforeach
							</ul>
							<a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
							<a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
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
@endsection