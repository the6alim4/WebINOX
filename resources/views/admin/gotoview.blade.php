@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Chi tiết lượt khách ghé thăm tháng hiện tại
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-4">
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light" >
          <thead >
            <tr>
              <th style="text-align: center;">View ID</th>
              <th style="text-align: center;">Mã người dùng</th>
              <th style="text-align: center;min-width: 300px;">Ngày ghé thăm</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($soview as $key ) 
              <tr>
              <td style="text-align: center;">{{$key->ViewID}}</td>
              <td style="text-align: center;">{{$key->MaNguoiDung}}</td>
              <td style="text-align: center;">{{date("d-m-Y", strtotime($key->NgayDangNhap))}}</td>
             @endforeach
             {{$soview->links()}}
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          {{$soview->links()}}          
        </div>
      </footer>
    </div>
  </div>
@endsection