@extends('welcome')
@section('content')		
				<!--Featured Products-->
				<div class="well well-small" style="font-family:Display;padding-right:40px;padding-left:0px;background: rgb(193, 227, 170);color: rgb(24, 23, 23);">
                    <div >
                        <ul class="breadcrumb">
                        <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
                        <li class="active">Đơn hàng đang giao</li>
                        </ul>
                      <h2 style="text-align: center;"> Đơn hàng đang giao</h2>
					<hr class="soften" />
                    <div class="row" style="display: flex;justify-content:center;align-items:center ">
                        {{$bills->links()}}          
                    </div>
					<div style="display:inline-block;width:70%;padding-left: 0;margin-left:25%;margin-right:15%;"> 
                        <div class="dssp1">
                            
                            
                            <div class="sp" style="width: 350px;" >
                                <div class="thumbnail" style="width: 70%;">
                                    @foreach($bills as $key)
                                    <div style="width: 100%;background: rgb(167, 230, 94);height:160px;padding:5%;">
                                        <div>
                                            <span>
                                                <span style="width: 45%;text-align: start;float: left;">Mã hóa đơn:{{$key->MaHDB}}</span>
                                                <span style="width: 45%;text-align: end;float: right;">{{$key->NgayTao}}</span>    
                                            </span>                                      
                                        </div>
                                        <br>
                                        <div>
                                            <p style="text-align: left;">Trạng thái: Đang giao</p>
                                        </div>
                                        <div>                                            
                                            <p style="text-align: left;"><strong>Tổng tiền:{{number_format($key->TongTien)}} VND</strong></p>                                            
                                        </div>
                                        <div style="display: flex;justify-content: center;align-items:center;">
                                            <h4><a class="shopBtn" href="{{URL::to('/detail-delivering-invoice/'.$key->MaHDB)}}"> Chi tiết đơn hàng </a></h4>                                           
                                        </div>
                                        
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