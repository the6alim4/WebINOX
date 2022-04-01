@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <?php
            $message=Session::get('message');
            if($message){
                echo '<div style="display: flex;justify-content: center; width: 100%; color: green;">'.$message.'</div>';
                Session::put('message',null);
            }
            ?>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light" >
          <thead >
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th style="text-align: center;">Tên danh mục</th>
              <th style="text-align: center;">Đơn giá nhập</th>
              <th style="text-align: center;">Đơn giá bán</th>
              <th style="text-align: center;min-width: 1000px">Mô tả</th>
              <th style="text-align: center;">Ảnh</th>
              <th style="text-align: center;">Khuyến mãi</th>
              <th style="text-align: center;">Tên NSX</th>
              <th style="text-align: center;">Tên loại</th>
              <th style="text-align: center;">Chất liệu</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key ) 
              <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$key->TenSP}}</td>
              <td>{{$key->DonGiaNhap}}</td>
              <td>{{$key->DonGiaBan}}</td>
              <td>{{$key->MoTa}}</td>
              <td>{{$key->Anh}}</td>
              <td>{{$key->KhuyenMai}}</td>
              <td>{{$key->TenNSX}}</td>
              <td>{{$key->TenLoai}}</td>
              <td>{{$key->TenChatLieu}}</td>
              <td>
                <a href="{{URL::to('/edit-category-product/'.$key->MaSP)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn có chắc xóa danh mục này?')" href="{{URL::to('/delete-category-product/'.$key->MaSP)}}" class="active styling-edit" ui-toggle-class="">  
                  <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            
             @endforeach
             {{$data->links()}}
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          {{$data->links()}}          
        </div>
      </footer>
    </div>
  </div>
@endsection