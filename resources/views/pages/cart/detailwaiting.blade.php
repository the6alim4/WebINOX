@extends('welcome')
@section('content')		
				<!--Featured Products-->
				<div class="well well-small" style="font-family:Display;padding-right:40px;padding-left:0px;">
                    <div >
                        <ul class="breadcrumb">
                        <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
                        <li class="active">Đơn hàng chờ xác nhận</li>
                        </ul>
                      <h2 style="text-align: center;"> Chi tiết đơn hàng</h2>
					<hr class="soften" />
					<div style="display:inline-block;width:70%;padding-left: 0;margin-left:15%;margin-right:10%;"> 
                        <div class="dssp1">                                   
                            <div class="sp" style="width: 350px;" >
                                <div class="thumbnail" style="width: 100%;">
                                    <div>
                                        <div>Mã HDB:{{$infor->MaHDB}}</div>
                                        <div>Người đặt hàng:{{$infor->TenNguoiDung}}</div>
                                        <div>Số điện thoại:{{$infor->SoDienThoai}}</div>
                                        <div>Địa chỉ nhận hàng:{{$infor->DiaChi}}</div>
                                    </div>
                                    @foreach($sp as $key)
                                    <div style="width: 100%;background: rgb(216, 237, 192);height:120px;padding:5%;">
                                        <span style="height: 100%;width: 100%;">
                                            <span style="width: 60%;text-align: start;float: left;">
                                                
                                                @if($key->DuongKinh==0)
                                                    <p style="text-align: left;">{{$key->SoLuong}}&nbsp;x&nbsp;{{$key->TenSP}}</p>
                                                @else
                                                    <p style="text-align: left;">{{$key->SoLuong}}&nbsp;x&nbsp;{{$key->TenSP}}&nbsp;({{$key->DuongKinh}}cm)</p>
                                                @endif
                                            </span>
                                            <span style="width: 25%;text-align: end;float: right;">
                                                <p style="text-align: right;">{{number_format($key->ThanhTien)}}VND</p>
                                            </span>
                                        </span>
                                        
                                        
                                    </div>
                                    <br>
                                    @endforeach 
                                    <div>
                                        <p style="text-align: left;"> Phí giao hàng (toàn quốc):{{number_format(30000)}} VND</p>
                                        <p style="text-align: left;"><strong>Tổng tiền:{{number_format($infor->TongTien)}}VND</strong></p>
                                    </div>
                                    
                                </div>
                                <div>
                                    <span style="width: 45%;float:left;">
                                        <h4><a class="shopBtn" onclick="return confirm('Bạn có chắc hủy đơn hàng?')" href="{{URL::to('/demolish-bill/'.$infor->MaHDB)}}"> Hủy đơn hàng </a></h4>
                                    </span>
                                        &nbsp;
                                        &nbsp;
                                    <span style="width: 45%;float:right;text-align: right;">
                                        <h4><a class="shopBtn" href="{{URL::to('/change-address/'.$infor->MaHDB)}}"> Thay đổi địa chỉ nhận hàng </a></h4>
                                    </span>
                                </div>
                            </div>

                              
                        </div>
                                              

					</div>                    
				</div>
                </div>
                
@endsection