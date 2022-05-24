@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Chi tiết đơn hàng ngày {{date("d-m-Y", strtotime($ngaytk))}}
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-4">
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light" >
          <thead >
            <tr>
              <th style="text-align: center;">Mã HDB</th>
              <th style="text-align: center;">Mã KH</th>
              <th style="text-align: center;">Tên KH</th>
              <th style="text-align: center;">Số điện thoại</th>
              <th style="text-align: center;">Khuyến mãi</th>
              <th style="text-align: center;">Địa chỉ</th>
              <th style="text-align: center;">Tổng tiền</th>
              <th style="width:30px;"></th>

            </tr>
          </thead>
          <tbody>
            @foreach ($bills as $key ) 
              <tr>
              <td style="text-align: center;">{{$key->MaHDB}}</td>
              <td style="text-align: center;">{{$key->MaNguoiDung}}</td>
              <td style="text-align: center;">{{$key->TenNguoiDung}}</td>
              <td style="text-align: center;">{{$key->SoDienThoai}}</td>
              <td style="text-align: center;">{{$key->KhuyenMai}}</td>
              <td style="text-align: center;">{{$key->DiaChi}}</td>
              <td style="text-align: center;">{{number_format($key->TongTien)}} VND</td>  
              <td>
                <a href="{{URL::to('/go-to-detail-bill/'.$key->MaHDB)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-info" aria-hidden="true"></i>
                </a>   
              </td>            
             @endforeach
             {{$bills->links()}}
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          {{$bills->links()}}          
        </div>
      </footer>
    </div>
  </div>
@endsection