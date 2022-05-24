@extends('admin_layout')
@section('admin_content')
@if(Session::get('quyen')==1)
    <!-- //thang-->
    <h3 style="color: rgb(140, 24, 24);text-align: center;">Thống kê tháng hiện tại</h3>
    <div class="market-updates">
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                 <div class="col-md-8 market-update-left">
                 <h4>Views</h4>
                <a href="{{URL::to('/go-to-view')}}"><h4>{{$view}}</h4></a>
              </div>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-1">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Số đơn hàng</h4>
                    <a href="{{URL::to('/go-to-bill')}}"><h4>{{$tongdonhang}}</h4></a>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Doanh thu</h4>
                    <a href="{{URL::to('/go-to-bill')}}"><h4>{{number_format($tongdoanhthu)}}</h4></a>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-4">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4 style="color: white;">Tổng SP</h4>
                    <h4 style="color: white;">{{$tongsosp}}</h4>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
       <div class="clearfix"> </div>
    </div>
    <!-- //thang-->
    <hr class="soft"/>
    <br>
    <!-- //top 5 sp-->
    <h3 style="color: rgb(140, 24, 24);text-align: center;">TOP 5 sản phẩm bán chạy nhất</h3>
    <br>
    @foreach($spbanchay as $key) 
        <div>
            <p style="font-weight: bold;margin-left: 2%;color:black;">{{ $loop->index+1 }}, {{$key->TenSP}}: {{$key->total}} sản phẩm</p>
        </div>
    @endforeach
    <!-- //top 5 sp-->
    <hr class="soft"/>
    <br>
    <!-- //thke ngay-->    
    <h3 style="color: rgb(140, 24, 24);text-align: center;">Thống kê theo ngày</h3>	
    <br>
    <div>
        <div>
            <label style="color:black;">Chọn ngày thống kê:</label>
            <input type="date" id="ngaytk">
            <a type="submit" name="tke_ngay" class="btn btn-info" onclick="TKE();">Thống kê</a>
        </div>
        <div id="showngay">

        </div>

    </div>
    <!-- //thke ngay--> 
    <hr class="soft"/>
    <br>
    <!-- //thke nam-->  
    <h3 style="color: rgb(140, 24, 24);text-align: center;">Thống kê năm hiện tại</h3>	
    <br>
    <div style="color: black;">
        <div class="table-responsive">
            <table class="table  b-t b-light" style="background: #eee" >
              <thead >
                <tr>
                  <th style="text-align: center;">Tháng</th>
                  <th style="text-align: center;">Số đơn hàng</th>
                  <th style="text-align: center;min-width: 300px;">Tổng doanh thu (VND)</th>
                </tr>
              </thead>
              <tbody>
                  <tr style="text-align: center;">
                    <td>1</td>
                        <td>{{$donhang[0]}}</td>
                        <td>{{number_format(round($doanhthu[0],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>2</td>                                          
                    <td>{{$donhang[1]}}</td>
                    <td>{{number_format(round($doanhthu[1],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>3</td>
                    <td>{{$donhang[2]}}</td>
                    <td>{{number_format(round($doanhthu[2],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>4</td>
                    <td>{{$donhang[3]}}</td>
                    <td>{{number_format(round($doanhthu[3],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>5</td>
                    <td>{{$donhang[4]}}</td>
                    <td>{{number_format(round($doanhthu[4],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>6</td>
                    <td>{{$donhang[5]}}</td>
                    <td>{{number_format(round($doanhthu[5],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>7</td>
                    <td>{{$donhang[6]}}</td>
                    <td>{{number_format(round($doanhthu[6],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>8</td>
                    <td>{{$donhang[7]}}</td>
                    <td>{{number_format(round($doanhthu[7],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>9</td>
                    <td>{{$donhang[8]}}</td>
                    <td>{{number_format(round($doanhthu[8],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>10</td>
                    <td>{{$donhang[9]}}</td>
                    <td>{{number_format(round($doanhthu[9],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>11</td>
                    <td>{{$donhang[10]}}</td>
                    <td>{{number_format(round($doanhthu[10],0))}}</td>
                  </tr>
                  <tr style="text-align: center;">
                    <td>12</td>
                    <td>{{$donhang[11]}}</td>
                    <td>{{number_format(round($doanhthu[11],0))}}</td>
                  </tr>
              </tbody>
            </table>
          </div>
    </div>
    
@endif
<script src="{{asset('public/frontend/js/jquery3x.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script type="text/javascript">
    function TKE(){
        var ngay=document.getElementById('ngaytk').value;
        if(ngay==''){

        }else{
            //tke
            $.ajax({
                url:"{{url('/tke-ngay')}}",
                method: 'GET',
                contentType: 'application/json',
                data:{
                    ngaytk:ngay
                },
                success:function(rs){
                    var soview=rs[0];
                    var sodonhang=rs[1];
                    var doanhthu=new Intl.NumberFormat().format(Math.round(rs[2],0));
                    var dayss=String(rs[3]);
                    $('#showngay').empty()
                    $('#showngay').append(`<div style="display:flex;font-weight:bold;color:black;"><p style="width:max-content;">Lượt ghé thăm:${soview}</p><a style="cursor:pointer;" href="{{URL::to('/chi-tiet-view-ngay/'.'${dayss}')}}">&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></a></div>
                                           <div style="display:flex;font-weight:bold;color:black;"><p style="width:max-content;">Số đơn hàng:${sodonhang}</p><a style="cursor:pointer;" href="{{URL::to('/chi-tiet-bill-ngay/'.'${dayss}')}}">&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></a></div>
                                           <div style="display:flex;font-weight:bold;color:black;"><p style="width:max-content;">Doanh thu:${doanhthu}VND</p><a style="cursor:pointer;" href="{{URL::to('/chi-tiet-bill-ngay/'.'${dayss}')}}">&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></a></div>`)
                }
            });
        }
        

    }
</script>
@endsection
