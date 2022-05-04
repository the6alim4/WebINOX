@extends('welcome')
@section('content')		
				<!--Featured Products-->
				<div class="well well-small" style="font-family:Display;padding-right:40px;padding-left:0px;">
                    <div >
                        <ul class="breadcrumb">
                        <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
                        <li class="active">Đơn hàng đã hoàn thành</li>
                        </ul>
                      <h2 style="text-align: center;"> Đơn hàng đã hoàn thành</h2>
					<hr class="soften" />
                    <div class="row" style="display: flex;justify-content:center;align-items:center ">
                        {{$bills->links()}}          
                    </div>
					<div style="display:inline-block;width:70%;padding-left: 0;margin-left:25%;margin-right:15%;"> 
                        <div class="dssp1">
                            
                            
                            <div class="sp" style="width: 350px;" >
                                <div class="thumbnail" style="width: 70%;">
                                    @foreach($bills as $key)
                                    <div style="width: 100%;background: rgb(216, 237, 192);height:160px;padding:5%;">
                                        <div>
                                            <span>
                                                <span style="width: 45%;text-align: start;float: left;">Mã hóa đơn:{{$key->MaHDB}}</span>
                                                <span style="width: 45%;text-align: end;float: right;">{{$key->NgayTao}}</span>    
                                            </span>                                      
                                        </div>
                                        <br>
                                        <div>
                                            <p style="text-align: left;">Trạng thái: Đã hoàn thành</p>
                                        </div>
                                        <div>                                            
                                            <p style="text-align: left;"><strong>Tổng tiền:{{number_format($key->TongTien)}} VND</strong></p>                                            
                                        </div>  
                                        @if($key->isevaluated==0)                                      
                                        <span style="width: 45%;text-align: start;float: left;">
                                            <h4><a class="shopBtn" href="{{URL::to('/detail-deliverd-notevaluated-invoice/'.$key->MaHDB)}}"> Chi tiết đơn hàng </a></h4>
                                        </span>
                                        <span style="width: 45%;text-align: end;float: right;">
                                            <h4><a class="shopBtn" href="{{URL::to('/evaluate/'.$key->MaHDB)}}"> Đánh giá sản phẩm </a></h4>
                                        </span>
                                        @else
                                        <h4 style="text-align: center;"><a class="shopBtn" style="text-align: center;" href="{{URL::to('/detail-deliverd-evaluated-invoice/'.$key->MaHDB)}}"> Chi tiết đơn hàng </a></h4>
                                        @endif
                                    </div>
                                    <br>
                                    @endforeach 
                                </div>
                            </div>

                              
                        </div>
                                              

					</div>
                    <div>
                        <div class="row" style="display: flex;justify-content:center;align-items:center ">
                            {{$bills->links()}}          
                        </div>
                    </div>
                    
				</div>
                </div>
            </div>
                
@endsection