@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê thương hiệu
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-4">
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
              <th style="text-align: center;">Tên thương hiệu</th>
              <th style="text-align: center;">Số điện thoại</th>
              <th style="text-align: center;min-width: 300px;">Logo thương hiệu</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key ) 
              <tr>
              <td>{{$key->TenNSX}}</td>
              <td>{{$key->SDT}}</td>
              <td><img src="{{asset($key->Anh)}}" style="width: 50%;"></td>
              <td>
                <a href="{{URL::to('/edit-brand/'.$key->MaNSX)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn có chắc xóa thương hiệu?')" href="{{URL::to('/delete-brand/'.$key->MaNSX)}}" class="active styling-edit" ui-toggle-class="">  
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