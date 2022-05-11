@extends('welcome')
@section('content')
<div style="background: rgb(221, 231, 214);color: rgb(12, 10, 8);padding:10px;height: 600px;">
    <p style="font-family: Display;font-size: x-large;text-align: center;"><i class="fa fa-ticket" aria-hidden="true"></i>&nbsp;Túi Voucher &nbsp;<i class="fa fa-ticket" aria-hidden="true"></i></p>
    <hr class="soft"/>   
    <div style="display: block;background: rgb(221, 231, 214);color: rgb(12, 12, 12);height: 80%;">
        <div>
            <ul id="productDetail" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Voucher đang diễn ra</a></li>
                <li class=""><a href="#profile" data-toggle="tab">Voucher sắp diễn ra</a></li>
              </ul>
        </div>
        
      <div id="myTabContent" class="tab-content tabWrapper" style="height: 80%;">
      <div class="tab-pane fade active in" id="home" style="text-align: center;margin-left: 20%;">
        @foreach($vcdhd as $key)      
            <div style="background: rgb(216, 237, 192);height:30%;width:80%;text-align: center;padding:5%;">       
              <p style="font-size: 15px;font-weight: bold;">Giảm:{{number_format($key->GiamGia)}}VND</p>      
              <p >Mã CODE:{{$key->MaKM}}</p>      
              <p >Số lượng còn:{{$key->SoLuongCon}}</p>    
              <p >Thời gian từ:{{date("d-m-Y", strtotime($key->NgayBatDau))}} đến {{date("d-m-Y", strtotime($key->NgayKetThuc))}}</p>      
            </div>
            <br>
            @endforeach  
      </div>
      <div class="tab-pane fade " id="profile" style="display: flex;justify-content: center;align-items: center;flex-direction: column;margin-top: 0;">
        @foreach($vcsc as $key)      
            <div style="background: rgb(216, 237, 192);height:30%;width:60%;text-align: center;padding:5%;">  
                <p style="font-size: 15px;font-weight: bold;">Giảm:{{number_format($key->GiamGia)}}VND</p>      
                <p >Mã CODE:{{$key->MaKM}}</p>      
                <p >Số lượng còn:{{$key->SoLuongCon}}</p>      
                <p >Thời gian từ:{{date("d-m-Y", strtotime($key->NgayBatDau))}} đến {{date("d-m-Y", strtotime($key->NgayKetThuc))}}</p>     
            </div>
            <br>
        @endforeach  
      </div>
     
    
    </div>
    </div>
    </div>
</div>
<br><br>

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