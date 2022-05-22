@extends('admin_layout')
@section('admin_content')	
<!-- Body Section -->
<div class="row" style="width: 950px;margin-left:3.5%;">
	<div class="span1" style="width: 950px;">
    <ul class="breadcrumb">
		<li><a href="{{url('/dashboard')}}">Admin</a> <span class="divider">/</span></li>
		<li class="active">Danh sách đơn hàng tháng hiện tại</li>
    </ul>
<div class="well well-small">
<hr class="soften"/>	
      <div class="table-responsive">
        <table class="table table-striped b-t b-light" >
          <thead >
            <tr>
              <th style="text-align: center;">Mã HDB</th>
              <th style="text-align: center;">Ngày tạo</th>
              <th style="text-align: center;">Người đặt hàng</th>
              <th style="text-align: center;">Số điện thoại</th>
              <th style="text-align: center;min-width: 300px;">Địa chỉ</th>
              <th style="text-align: center;">Tổng tiền</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sodonhang as $key ) 
              <tr>
              <td>{{$key->MaHDB}}</td>
              <td>{{date("d-m-Y", strtotime($key->NgayTao))}}</td>
              <td>{{$key->TenNguoiDung}}</td>
              <td>{{$key->SoDienThoai}}</td>
              <td>{{$key->DiaChi}}</td>
              <td>{{$key->TongTien}}</td>
              <td>
                <a href="{{URL::to('/go-to-detail-bill/'.$key->MaHDB)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-info" aria-hidden="true"></i>
                </a>   
              </td>
            
             @endforeach
             {{$sodonhang->links()}}
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          {{$sodonhang->links()}}          
        </div>
      </footer>
    </div>
  </div>
<script src="{{asset('public/frontend/js/jquery3x.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script type="text/javascript">

</script>
@endsection