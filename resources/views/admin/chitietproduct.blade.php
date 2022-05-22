@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Chi tiết sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-4">
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light" >
          <thead >
            <tr>
              <th style="text-align: center;">Tên danh mục</th>
              <th style="text-align: center;">Đơn giá nhập</th>
              <th style="text-align: center;">Đơn giá bán</th>
              <th style="text-align: center;min-width: 1000px">Mô tả</th>
              <th style="text-align: center;min-width: 300px;">Ảnh sản phẩm</th>
              <th style="text-align: center;">Khuyến mãi</th>
              <th style="text-align: center;">Tên NSX</th>
              <th style="text-align: center;">Tên loại</th>
              <th style="text-align: center;">Chất liệu</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              <tr>
              <td>{{$data->TenSP}}</td>
              <td>{{$data->DonGiaNhap}}</td>
              <td>{{$data->DonGiaBan}}</td>
              <td>{{$data->MoTa}}</td>
              <td><img src="{{asset($data->AnhSP)}}" style="width: 50%;"></td>
              <td>{{$data->KhuyenMai}}</td>
              <td>{{$data->TenNSX}}</td>
              <td>{{$data->TenLoai}}</td>
              <td>{{$data->TenChatLieu}}</td>
              <td>
                <a href="{{URL::to('/edit-product/'.$data->MaSP)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn có chắc xóa sản phẩm này?')" href="{{URL::to('/delete-product/'.$data->MaSP)}}" class="active styling-edit" ui-toggle-class="">  
                  <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection