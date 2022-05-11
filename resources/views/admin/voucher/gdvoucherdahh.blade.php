@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Voucher đã hết hạn
      </div>
      <div class="row w3-res-tb">
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
              <th style="text-align: center;">ID Voucher</th>
              <th style="text-align: center;">Mã code</th>
              <th style="text-align: center;">Giảm giá</th>
              <th style="text-align: center;">Số lượng còn</th>
              <th style="text-align: center;">Ngày bắt đầu</th>
              <th style="text-align: center;">Ngày kết thúc</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($voucher as $key ) 
              <tr>
              <td>{{$key->IDKM}}</td>
              <td>{{$key->MaKM}}</td>
              <td>{{$key->GiamGia}}</td>
              <td>{{$key->SoLuongCon}}</td>
              <td>{{$key->NgayBatDau}}</td>
              <td>{{$key->NgayKetThuc}}</td>
              <td>
                <a href="{{URL::to('/gd-sua-voucher-dahh/'.$key->IDKM)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
              </td>
            
             @endforeach
             {!! $voucher->withPath('giao-dien-voucher-dahh/') !!}
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          {!! $voucher->withPath('giao-dien-voucher-dahh/') !!}          
        </div>
      </footer>
    </div>
  </div>
@endsection