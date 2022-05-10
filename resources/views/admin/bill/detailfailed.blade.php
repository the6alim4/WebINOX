@extends('admin_layout')
@section('admin_content')	
<!-- Body Section -->
<div class="row" style="width: 950px;margin-left:3.5%;">
	<div class="span1" style="width: 950px;">
    <ul class="breadcrumb">
		<li><a href="{{url('/dashboard')}}">Admin</a> <span class="divider">/</span></li>
		<li class="active">Đơn hàng thất bại</li>
    </ul>
<div class="well well-small">
<hr class="soften"/>	
<?php
            $message=Session::get('message');
            if($message){
                echo '<div style="display: flex;justify-content: center; width: 100%; color: green;">'.$message.'</div>';
                Session::put('message',null);
            }
            ?>
      <div class="table-responsive">
          <div>
              <div>Mã HDB:{{$infor->MaHDB}}</div>
              <div>Người đặt hàng:{{$infor->TenNguoiDung}}</div>
              <div>Số điện thoại:{{$infor->SoDienThoai}}</div>
              <div>Địa chỉ nhận hàng:{{$infor->DiaChi}}</div>
          </div>
          <br>
        <table class="table table-striped b-t b-light" >
          <thead >
            <tr>
              <th style="text-align: center;">Sản phẩm</th>
              <th style="text-align: center;">Hình ảnh</th>
              <th style="text-align: center;">Kích cỡ</th>
              <th style="text-align: center;">Số lượng</th>
              <th style="text-align: center;">Đơn giá bán</th>
              <th style="text-align: center;min-width: 300px;">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sp as $key ) 
              <tr>
              <td>{{$key->TenSP}}</td>
              <td><img src="{{asset($key->Anh)}}"style="height:250px;width:250px;"></td>
              @if($key->DuongKinh==0)
              <td>Không có</td>
              @else
              <td>{{$key->DuongKinh}}</td>
              @endif
              <td>{{$key->SoLuong}}</td>
              <td>{{$key->DonGia}}</td>
              <td>{{$key->ThanhTien}}</td> 
              </tr>           
             @endforeach  
          </tbody>
        </table>
        <div>
            <div>
                Phí giao hàng (toàn quốc):{{number_format(30000)}} VND
            </div>
            @if($infor->KhuyenMai>0)
            <div>
              Giảm giá:{{number_format($infor->KhuyenMai)}} VND
            </div>
            @endif
            <div>
                Tổng tiền:{{number_format($infor->TongTien)}} VND
            </div>
        </div>
      </div>
    </div>
  </div>
<script src="{{asset('public/frontend/js/jquery3x.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script type="text/javascript">

</script>
@endsection