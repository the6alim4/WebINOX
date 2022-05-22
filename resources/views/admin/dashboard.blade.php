@extends('admin_layout')
@section('admin_content')
@if(Session::get('quyen')==1)
    <!-- //thang-->
    <h3 style="color: white;">Thống kê tháng hiện tại</h3>
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
                    <h5 style="color: white;">Best seller:</h5>
                    <a href="{{URL::to('/chi-tiet-product/'.$spbanchay[0]->MaS)}}"><h5 style="color: white;">{{$spbanchay[0]->TenSP}}({{$spbanchay[0]->total}}sp)</h5></a>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
       <div class="clearfix"> </div>
    </div>	
    <!-- //thang-->
@endif
@endsection
