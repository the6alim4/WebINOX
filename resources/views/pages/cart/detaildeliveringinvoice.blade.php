@extends('welcome')
@section('content')		
				<!--Featured Products-->
				<div class="well well-small" style="font-family:Display;padding-right:40px;padding-left:0px;background: rgb(193, 227, 170);color: rgb(24, 23, 23);">
                    <div >
                        <ul class="breadcrumb">
                        <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
                        <li class="active">Đơn hàng đang giao</li>
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
                                    <div style="width: 100%;background: rgb(159, 226, 81);height:120px;padding:5%;">
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
                                        @if($infor->KhuyenMai>0)
                                            <div>
                                            Giảm giá:{{number_format($infor->KhuyenMai)}} VND
                                            </div>
                                            <br>
                                        @endif
                                        <p style="text-align: left;"><strong>Tổng tiền:{{number_format($infor->TongTien)}}VND</strong></p>
                                    </div>
                                    
                                </div>
                            </div>

                              
                        </div>
                                              

					</div>                    
				</div>
                </div>
            </div>
                
@endsection