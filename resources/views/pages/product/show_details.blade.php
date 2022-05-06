@extends('welcome')
@section('content')
<div style="background: rgb(221, 231, 214);color: rgb(12, 10, 8);padding:10px;height: 600px;">
    <p style="font-family: Display;font-size: x-large;text-align: center;"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Chi tiết sản phẩm &nbsp;<i class="fa fa-hand-o-left" aria-hidden="true"></i></p>
    <hr class="soft"/>
    <div style="width: 41.66666666666667%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;display: block;">
        <div class="view-product">
            <img src="{{asset($data->AnhSP)}}" alt="" id="realimg" />
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
    @php
        $cost=round((1-$data->KhuyenMai)*$data->DonGiaBan,1);
    @endphp
    <form style="margin-left: 35%;" >
        @csrf
        <input type="hidden" value="{{$data->MaSP}}" >
				<input type="hidden" value="{{$data->TenSP}}" >
				<input type="hidden" value="{{$data->AnhSP}}" >
				<input type="hidden" value="{{$data->DonGiaBan}}" >
				<input type="hidden" value="1" class="cart_product_qty_{{$data->MaSP}}">
      <div class="control-group">
        <input name="masp" type="hidden" id="product_id" value="{{$data->MaSP}}" style="display: none" readonly>
        <input name="anhsp" type="hidden" id="anhsp" value="{{asset($data->AnhSP)}}" style="display: none" readonly>
        <p style="font-family:Display;font-size: x-large;font-weight: bold; " id="tensp">{{$data->TenSP}}</p>
        @if($data->KhuyenMai>0)        
        <label class="control-label" style="display: inline-flex;font-size: large;">Giá gốc: <p><s id="precost"><strong> {{number_format($data->DonGiaBan)}} </strong></s> </p> VND</label><br>
        <label class="control-label" style="display: inline-flex;font-size: x-large;">Giá bán: <p id="cost"><strong> {{number_format($cost)}} </strong> </p> VND</label><br>
        @else
        <label class="control-label" style="display: inline-flex;font-size: x-large;">Giá bán: <p id="cost"><strong> {{number_format($data->DonGiaBan)}} </strong> </p> VND</label><br>
        @endif
        @for($i=0;$i<$rating;$i++)
        <a class="ion-android-star" style="color: rgb(241, 196, 15);font-size:25px;"></a>  
        @endfor
        <br>
        <label class="control-label"><span>Thương hiệu: {{$data->TenNSX}} </span></label><br>
        <label class="control-label"><span>Chất liệu: {{$data->TenChatLieu}}</span></label><br>
        <label class="control-label" style="display: inline-flex;width: 60%;"><span>Số lượng còn: </span><p id="sl" style="width:15%;" > {{$valfisrtsize}} </p></label><br>
        <div class="controls">
          <label class="control-label" ><span>Số lượng mua: </span></label>
          <input type="number" name="quantity" class="span6" min="1" step="1" id="slmua" style="width: 10%;"  required>
          <div id="note" style="visibility: hidden;"></div>
        </div>
        @if(count($kichthuoc)==1)
        <input type="hidden" value="0" id="choosesize">
        @else   
         
        <div class="controls">
          <label class="control-label"><span>Kích thước: </span></label>  
          <select class="span11" style="width: 10%;" id="choosesize" name="size" onchange="myFunction()">
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
      <input value="{{$data->KhuyenMai}}" id="discount" style="display: none;">
      <input value="{{$valfisrtsize}}" id="slcon" style="display: none;">
      <input value="0" id="maxquan" style="display: none;">
      <input value="{{$data->DonGiaBan}}" id='realcost' type="hidden">
      <h4><button type="button" class="shopBtn" id="addtocart" name="addtocart" > Thêm vào giỏ hàng </button></h4>
      
    </form>
</div>
<br><br>
<div style="display: block;background: rgb(221, 231, 214);color: rgb(12, 12, 12);">
    <div>
        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Thông tin chi tiết</a></li>
            <li class=""><a href="#profile" data-toggle="tab">Sản phẩm tương tự </a></li>
            @if(count($danhgia)==0)
            <li class=""><a href="#evaluation" data-toggle="tab">Đánh giá và bình luận </a></li>
            @else
            <li class=""><a href="#evaluation" data-toggle="tab">Đánh giá và bình luận ({{count($danhgia)}} đánh giá) </a></li>
            @endif
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
              <img src="{{asset($key->AnhSP)}}" style="max-width:100%;height: 250px;" alt="">
              <div class="caption cntr" style="width: 100%;">
                  <p>{{$key->TenSP}}</p>
                  <p><strong>Giá bán: {{number_format($key->DonGiaBan)}} VND</strong></p>
                  <h4><a href="{{URL::to('/chi-tiet-san-pham/'.$key->MaSP)}}" class="shopBtn" data-id_product="{{$key->MaSP}}" name="addtocart" > Thêm vào giỏ hàng </a></h4>
                  {{-- <p style="height: 25px;"></p> --}}
              </div>
          </div>
      </div>

      @endforeach   
  </div>
  @endif
  </div>
  </div>
  <div class="tab-pane fade" id="evaluation">
    <div class="row-fluid" style="background: rgb(231, 239, 224)">	  
      <div class="row" style="display: flex;justify-content:center;align-items:center ">
        {{$danhgia->links()}}          
    </div>
      @if(count($danhgia)==0)
      <p>Chưa có đánh giá nào! !</p>
      @else
      <div style="width: 50%;margin-left:23%;margin-right:auto;">
        @foreach($danhgia as $key)      
        <div style="width: 100%;background: rgb(216, 237, 192);height:140px;padding:5%;">
          <div>
              <span>
                  <span style="width: 45%;text-align: start;float: left;">
                  <img src="{{asset('public/frontend/img/us.png')}}" style="width: 50px;height: 50px;">{{$key->TenNguoiDung}}
                  </span>
                  <span style="width: 45%;text-align: end;float: right;">{{$key->NgayBinhLuan}}</span>    
              </span>                                      
          </div>
          <br>
          <div style="margin-left:20%;display: flex;justify-content: flex-start;align-items: flex-start;width: 100%">
            <div class="box" style="font-size: 14px;margin-left:0;width: 100%;;display: flex;justify-content: flex-start;align-items: flex-start;">
              @for($i=0;$i<$key->Sao;$i++)
              <a class="ion-android-star" style="color: rgb(241, 196, 15)"></a>  
              @endfor          
            </div>
            <br>            
          </div>   
          <p style="border: 1px azure;background:azure;height:30px; ">{{$key->BinhLuan}}</p>      
      </div>
      <br>
        @endforeach   
    </div>
    @endif
    </div>
    <div class="row" style="display: flex;justify-content:center;align-items:center ">
      {{$danhgia->links()}}          
  </div>
    </div>

</div>
</div>
</div>
<script src="{{asset('public/frontend/js/jquery3x.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 


<script type="text/javascript">
  function format1(n) {
  return n.toFixed(0).replace(/./g, function(c, i, a) {
    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
  });
}
  //change cost when choosing other size
function myFunction(){
	var maxsize=document.getElementById("maxsize").value;
	var maxval=document.getElementById("maxval").value;
	var discount=document.getElementById("discount").value;
	var selectedsize=document.getElementById("choosesize").value;
  if(discount>0){
	var newval=(selectedsize/maxsize)*maxval*(1-discount);
  document.getElementById("cost").innerHTML =format1(newval);
	document.getElementById("precost").innerHTML =format1((selectedsize/maxsize)*maxval);
  }else{
    var newval=(selectedsize/maxsize)*maxval;
    document.getElementById("cost").innerHTML =format1(newval);
  }
	
	
	$('#realcost').val(newval);
  var realcost=$("#realcost").val();
	var masp=document.getElementById("product_id").value;
  //change so luong con khi chon size
$.ajax({
                url:`../api/getcountsize/?MaSP=${masp}&DuongKinh=${selectedsize}`,
                method: 'GET',
                contentType: 'application/json',
                success: function(rs) {
                $('#sl').empty();
                $('#sl').append(`${rs[0].SoLuong}`);
                }
                });
               
    
}

  $('body').on('focusout', '#slmua', function(e) {
    var val=document.getElementById("sl").textContent;
    var quan=document.getElementById("slmua").value;
    if(parseInt(val)<parseInt(quan)){
      const box = document.getElementById('note');
      box.style.visibility = 'visible';
      box.style.color = 'red';
      $("#note").text("Số lượng vượt quá giới hạn!");
      const btn = document.getElementById('addtocart');
      btn.disabled=true;

    }
    else{
      const box = document.getElementById('note');
      box.style.visibility = 'hidden';
      const btn = document.getElementById('addtocart');
      btn.disabled=false;
    }
    
});

</script>
<script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
<script type="text/javascript">
				$(document).ready(function(){
					$('.shopBtn').click(function(){
						var cart_product_id = document.getElementById('product_id').value;
						var cart_product_name = document.getElementById('tensp').textContent;
						var cart_product_image = document.getElementById('anhsp').value;
						var cart_product_price = document.getElementById('realcost').value;
						var cart_product_qty = document.getElementById('slmua').value;
						var cart_product_size = document.getElementById('choosesize').value;
						var cart_product_maxquan = document.getElementById('sl').textContent;
						var _token = $('input[name="_token"]').val();    
            if(cart_product_qty<1){
              const box = document.getElementById('note');
              box.style.visibility = 'visible';
              box.style.color = 'red';
              $("#note").text("Số lượng quá ít!");
              const btn = document.getElementById('addtocart');
              btn.disabled=true;
            }else{
              $.ajax({
							url: "{{url('/add-cart-ajax')}}",
              method: 'GET',
							data:{
								cart_product_id:cart_product_id,
								cart_product_name:cart_product_name,
								cart_product_image:cart_product_image,
								cart_product_price:cart_product_price,
								cart_product_qty:cart_product_qty,
								cart_product_size:cart_product_size,
                cart_product_maxquan:cart_product_maxquan,
								_token:_token
							},success:function(){
								swal({  
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });

							}

						});
            }   
						
					});
				});
</script>
@endsection