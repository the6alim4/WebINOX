@extends('welcome')
@section('content')		
				<!--New Products-->
				<div class="well well-small">
					<h3>New Products </h3>
					<hr class="soften" />
					<div class="row-fluid">
						<div id="newProductCar" class="carousel slide">
							<div class="carousel-inner">
								<div class="item active">
									<ul class="thumbnails">
										<li class="span3">
											<div class="thumbnail">
												<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
												<a href="#" class="tag"></a>
												<a href="product_details.html"><img src="{{('public/frontend/img/bootstrap-ring.png')}}" alt="bootstrap-ring"></a>
											</div>
										</li>
									</ul>
								</div>
								<div class="item">
									<ul class="thumbnails">
										<li class="span3">
											<div class="thumbnail">
												<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
												<a href="product_details.html"><img src="{{('public/frontend/img/i.jpg')}}" alt=""></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
							<a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
						</div>
					</div>
					<div class="row-fluid">
						<ul class="thumbnails">
							<li class="span4">
								<div class="thumbnail">

									<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
									<a href="product_details.html"><img src="{{('public/frontend/img/b.jpg')}}" alt=""></a>
									<div class="caption cntr">
										<p>Manicure & Pedicure</p>
										<p><strong> $22.00</strong></p>
										<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
										<div class="actionList">
											<a class="pull-left" href="#">Add to Wish List </a>
											<a class="pull-left" href="#"> Add to Compare </a>
										</div>
										<br class="clr">
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!--Featured Products-->
				<div class="well well-small">
					<h3><a class="btn btn-mini pull-right" href="products.html" title="View more">VIew More<span class="icon-plus"></span></a> Featured Products </h3>
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

				<div class="well well-small">
					<a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
					Popular Products
				</div>
				<hr>
				<div class="well well-small">
					<a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
					Best selling Products
				</div>
			</div>
		</div>
@endsection