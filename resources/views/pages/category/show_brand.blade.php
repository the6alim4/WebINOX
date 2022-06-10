@extends('welcome')
@section('content')		
				<!--Featured Products-->
				<div class="well well-small" style="font-family:Display;padding-right:40px;padding-left:0px;background: rgb(221, 231, 214);
                box-shadow: 15px 10px 8px -6px #ccc;
                border-radius: 24px;">
					<h2 style="width: 100%;text-align: center;height: 100%;font-size: x-large;font-weight: bold;color: rgb(228, 116, 11)"><i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;Thương hiệu {{$tennsx->TenNSX}}&nbsp;<i class="fa fa-star-o" aria-hidden="true"></i></h2>
					<hr class="soften" />
                    <div class="row" style="display: flex;justify-content:center;align-items:center ">
                        {{$category_by_id->links()}}          
                    </div>
					<div style="display:inline-block;width:100%;padding-left: 0;"> 
                        <div class="dssp">
                            @foreach($category_by_id as $key)                            
                            <div class="sp" style="width: 350px;height:450px;" >
                                <div class="thumbnail" style="width: 100%;height: 440px;">
                                    <form>
                                        @csrf
                                        <input type="hidden" id="wishlist_productid{{$key->MaSP}}" value="{{$key->MaSP}}">
										<input type="hidden" id="wishlist_productname{{$key->MaSP}}" value="{{$key->TenSP}}">
                                        <input type="hidden" id="wishlist_productnsx{{$key->MaSP}}" value="{{$key->TenNSX}}">
										<input type="hidden" id="wishlist_productchatlieu{{$key->MaSP}}" value="{{$key->TenChatLieu}}">
										<input type="hidden" id="wishlist_productprice{{$key->MaSP}}" value="{{number_format($key->DonGiaBan)}}">
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$key->MaSP)}}"><img id="wishlist_productimg{{$key->MaSP}}" src="{{asset($key->AnhSP)}}" style="max-width:100%;height: 250px;" alt=""></a>
                                    <div class="caption cntr" style="width: 100%;">
                                        <p>{{$key->TenSP}}</p>
                                        <p><strong>Giá bán: {{number_format($key->DonGiaBan)}} VND</strong></p>
                                        <h4><a class="shopBtn" id="wishlist_producturl{{$key->MaSP}}" href="{{URL::to('/chi-tiet-san-pham/'.$key->MaSP)}}" title="add to cart"> Thêm vào giỏ hàng </a></h4>
                                    </form>
                                        <div class="actionList">
                                            <a class="pull-left" href="#" id="{{$key->MaSP}}" onclick="add_wishlist(this.id);"><i class="fa fa-plus" aria-hidden="true"></i>Yêu thích</a>
                                            <a class="pull-left" href="#" onclick="add_compare({{$key->MaSP}});"><i class="fa fa-plus" aria-hidden="true"></i>So sánh</a>
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
            </div>
                
@endsection