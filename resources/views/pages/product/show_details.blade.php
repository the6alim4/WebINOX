@extends('welcome')
@section('content')
<div style="background-color: rgba(245, 245, 245, 0.995);padding:10px;height: 600px;">
    <p style="font-family: Display;font-size: x-large;text-align: center;"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Chi tiết sản phẩm &nbsp;<i class="fa fa-hand-o-left" aria-hidden="true"></i></p>
    <hr class="soft"/>
    <div style="width: 41.66666666666667%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;display: block;">
        <div class="view-product">
            <img src="{{asset($data->AnhSP)}}" alt="" />
            <h3><i class="fa fa-search" aria-hidden="true"></i></h3>
        </div>
        <div id="similar-product" class="carousel slide " style="height:90px;width: 100%;background-color: transparent;border: 1px rgb(236, 210, 175);">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner" style="display: flex;justify-content: center;align-items: center;top:30%;">
                  @foreach($anhbotro as $key)
                    <div class="item" style="width: 100px;height:50px;">
                      <a href=""><img src="{{asset($key->Anhbotro)}}" alt="" style="width: 100px;height:50px;"></a>                      
                    </div>  
                  @endforeach                 
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev" >&lsaquo;</a>
              <a class="right item-control" href="#similar-product" data-slide="next">&rsaquo;</a>

        </div>

    </div>
    <form style="margin-left: 35%;">
        
      <div class="control-group">
        <p style="font-family:Display;font-size: x-large;font-weight: bold; ">{{$data->TenSP}}</p>
        <label class="control-label" style="display: inline-flex;font-size: x-large;">Giá bán: <p id="cost"><strong> {{number_format($data->DonGiaBan)}} </strong> </p> VND</label><br>
        <label class="control-label"><span>Thương hiệu: {{$data->TenNSX}} </span></label><br>
        <label class="control-label"><span>Chất liệu: {{$data->TenChatLieu}}</span></label><br>
        <label class="control-label" style="display: inline-flex;width: 60%;"><span>Số lượng còn: </span><p id="slcon" style="width:15%;"> {{$valfisrtsize}} </p></label><br>
        <div class="controls">
          <label class="control-label"><span>Số lượng mua: </span></label>
          <input type="number" class="span6" min="0" step="1" id="slmua" style="width: 10%;" required>
        </div>
        @if(count($kichthuoc)==1)
        @else   
         
        <div class="controls">
          <label class="control-label"><span>Kích thước: </span></label>  
          <select class="span11" style="width: 10%;" id="choosesize" onchange="myFunction()">
            @foreach($kichthuoc as $key)
              <option value="{{$key->DuongKinh}}">{{$key->DuongKinh}}</option>
            @endforeach
          </select>
        </div>
        @endif
      </div>
      @if($maxsize==0)
      @else
          <input value='{{$maxsize}}' id='maxsize' readonly style="display: none;">
      @endif
      <input value="{{$data->DonGiaBan}}" id="maxval" style="display: none;">
      <button type="submit" class="shopBtn" onclick="acceptAdd()"><span class=" icon-shopping-cart"></span> Thêm vào giỏ hàng</button>
      
    </form>
</div>
<br><br>
<div style="display: block">
    <div>
        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Thông tin chi tiết</a></li>
            <li class=""><a href="#profile" data-toggle="tab">Sản phẩm tương tự </a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acceseries <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#cat1" data-toggle="tab">Category one</a></li>
                <li><a href="#cat2" data-toggle="tab">Category two</a></li>
              </ul>
            </li>
          </ul>
    </div>
    
  <div id="myTabContent" class="tab-content tabWrapper">
  <div class="tab-pane fade active in" id="home">
    <h4>Thông tin sản phẩm</h4>
      <table class="table table-striped">
      <tbody>
      <tr class="techSpecRow"><td class="techSpecTD1">Thương hiệu:</td><td class="techSpecTD2">{{$data->TenNSX}}</td></tr>
      <tr class="techSpecRow"><td class="techSpecTD1">Chất liệu:</td><td class="techSpecTD2">{{$data->TenChatLieu}}</td></tr>
      <tr class="techSpecRow"><td class="techSpecTD1">Loại sản phẩm:</td><td class="techSpecTD2">{{$data->TenLoai}}</td></tr>
      </tbody>
      </table>
      <p>{{$data->MoTa}}</p>
  </div>
  <div class="tab-pane fade" id="profile">
  <div class="row-fluid">	  
    @if(count($sptt)==0)
    <p>Không có sản phẩm giống vậy!</p>
    @else
    <div class="dssp">
      @foreach($sptt as $key)      
      <div class="sp" style="width: 350px;height:450px;" >
          <div class="thumbnail" style="width: 100%;height: 440px;">
              <a class="zoomTool" href="{{URL::to('/chi-tiet-san-pham/'.$key->MaSP)}}" title="add to cart"><span class="icon-search"></span> Xem chi tiết</a>
              <a href="product_details.html"><img src="{{asset($key->AnhSP)}}" style="max-width:100%;height: 250px;" alt=""></a>
              <div class="caption cntr" style="width: 100%;">
                  <p>{{$key->TenSP}}</p>
                  <p><strong>Giá bán: {{number_format($key->DonGiaBan)}} VND</strong></p>
                  <h4><a class="shopBtn" href="#" title="add to cart"> Thêm vào giỏ hàng </a></h4>
                  <div class="actionList">
                      <a class="pull-left" href="#"><i class="fa fa-heart" aria-hidden="true"></i>Yêu thích</a>
                      <a class="pull-left" href="#"> So sánh</a>
                  </div>
                  {{-- <p style="height: 25px;"></p> --}}
              </div>
          </div>
      </div>

      @endforeach   
  </div>
  @endif
  </div>
  </div>

</div>
</div>
<script>
  function format1(n) {
  return n.toFixed(0).replace(/./g, function(c, i, a) {
    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
  });
}
  //change cost when choosing other size
function myFunction(){
	var maxsize=document.getElementById("maxsize").value;
	var maxval=document.getElementById("maxval").value;
	var selectedsize=document.getElementById("choosesize").value;
	var newval=(selectedsize/maxsize)*maxval;
	document.getElementById("cost").innerHTML =format1(newval);
}
function acceptAdd(){
	var quantity=parseInt(document.getElementById("slmua").value);
	var slcon=parseInt(document.getElementById("slcon").value);
  if(quantity>slcon){
    return focusElement(slmua, 'Please enter a First Name that is more than 2 and less than 15 characters long.');
  }
	
}
</script>
@endsection