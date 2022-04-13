@extends('welcome')
@section('content')		
				<!--Featured Products-->
				<div class="well well-small" style="font-family:Display;padding-right:40px;padding-left:0px;">
					<p style="width: 100%;text-align: center;height: 100%;font-size: x-large;font-weight: bold;"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;{{$tenloai->TenLoai}}&nbsp;<i class="fa fa-hand-o-left" aria-hidden="true"></i></p>
					<hr class="soften" />
                    <div class="row" style="display: flex;justify-content:center;align-items:center ">
                        {{$category_by_id->links()}}          
                    </div>
					<div style="display:inline-block;width:100%;padding-left: 0;"> 
                        <div class="dssp">
                            @foreach($category_by_id as $key)
                            
                            <div class="sp" style="width: 350px;height:450px;" >
                                <div class="thumbnail" style="width: 100%;height: 440px;">
                                    <a class="zoomTool" href="{{URL::to('/chi-tiet-san-pham/'.$key->MaSP)}}" title="add to cart"><span class="icon-search"></span> Xem chi tiết</a>
                                    <a href="product_details.html"><img src="{{asset($key->Anh)}}" style="max-width:100%;height: 250px;" alt=""></a>
                                    <div class="caption cntr" style="width: 100%;">
                                        <p>{{$key->TenSP}}</p>
                                        <p><strong>Giá bán: {{number_format($key->DonGiaBan)}} VND</strong></p>
                                        <h4><a class="shopBtn" href="#" title="add to cart"> Thêm vào giỏ hàng </a></h4>
                                        <div class="actionList">
                                            <a class="pull-left" href="#"><i class="fa fa-heart" aria-hidden="true"></i>Yêu thích</a>
                                            <a class="pull-left" href="#"> So sánh</a>
                                        </div>
                                        {{-- <p style="height: 25px;"></p> --}}
                                    </div>
                                </div>
                            </div>

                            @endforeach   
                        </div>
                                              

					</div>
                    <div>

                        <div class="row" style="display: flex;justify-content:center;align-items:center ">
                            {{$category_by_id->links()}}          
                        </div>
                    </div>
				</div>
                
@endsection