@extends('welcome')
@section('content')	
<!-- Body Section -->
<div class="row" style="width: 873px;background: none;color: whitesmoke;">
	<div class="span12" style="width: 873px;">
    <ul class="breadcrumb">
		<li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Giỏ hàng</li>
    </ul>
<div class="well well-small">
<hr class="soften"/>	
 @if(session('alert'))
    <section class='alert alert-success' id="alertxx" >
	{{session('alert')}}
</section>
<?
Session::forget('alert');

?>
@endif  
<table class="table table-bordered table-condensed" style="border:1px black;">
          <thead>
            <tr>
              <th style="text-align: center;">Tên sản phẩm</th>
              <th style="text-align: center;">Hình ảnh</th>
              <th style="text-align: center;">Kích cỡ</th>
              <th style="text-align: center;">Đơn giá</th>
              <th style="text-align: center;">Số lượng</th>
              <th style="text-align: center;">Thành tiền </th>
              <th style="text-align: center;"> </th>
            </tr>
          </thead>
          <tbody>
              {{-- san pham --}}
              
            @php
            $total=30000;
            @endphp
            @if(!Session::get('cart'))
            <p style="color: red;font-size: x-large;text-align: center;">Bạn chưa có sản phẩm nào!</p>
            @else
            @foreach(Session::get('cart') as $key)
            @php
              $subtotal= (int)str_replace(',','',$key['product_price'])*(int)$key['product_qty'];
              $total+=$subtotal;
            @endphp
            <tr>
              <td>{{$key['product_name']}}</td>
              <td>
                <img width="100" src="{{asset($key['product_image'])}}">
              </td>
              @if($key['product_size']==0)
                <td>Không</td>
              @else
              <td>
                {{$key['product_size']}}
              </td>
              @endif
              <td>
                <p id="price_<?=$key['session_id']?>">{{number_format($key['product_price'])}}</p>
                <p style="display: none;"  id="realcost_<?=$key['session_id']?>">{{$key['product_price']}}</p>
              </td>          
              <td>                
              <div class="input-append">
                <input type="hidden" id="sessionid_<?=$key['session_id']?>" value="<?=$key['session_id']?>">
                <button class="btn btn-mini discount" type="button" id="subtract" style="height:30px;" data="<?=$key['session_id']?>"><i class="fa fa-minus" aria-hidden="true"></i></button>
                <input class="span1" type="number" style="width:50px;height: 30px;"           data="<?=$key['session_id']?>" id="qty_<?=$key['session_id']?>" size="30" type="text" min="1" max="{{$key['product_maxquan']}}" step="1" value="{{$key['product_qty']}}" disabled>
                <button class="btn btn-mini increase" type="button" id="add" style="height:30px;"      data="<?=$key['session_id']?>"><i class="fa fa-plus" aria-hidden="true"></i></button>
              </div>
            </td>
              <td>
                <p id="thanhtien_<?=$key['session_id']?>"> {{number_format($subtotal)}}</p>
                <input type="hidden" style="display: none;" class="realsubtotal" id="realsubtotal_<?=$key['session_id']?>" value="{{$subtotal}}">
              </td>
              <td><a class="btn btn-mini btn-danger" href="{{URL::to('/delete-cart/'.$key['session_id'])}}"><span class="icon-remove"></span></a></td>
            </tr>
            @endforeach
            @endif
          
                {{-- san pham --}}
            <tr>
                <td colspan="6" class="alignR">Phí giao hàng (toàn quốc):	</td>
                <td> {{number_format(30000)}}</td>
            </tr>
            <tr id="giamgia" style="display: none;">
              <td colspan="6" class="alignR">Mã giảm giá:	</td>
              <td><p id="tiengiamgia"></p></td>
            </tr>  
            <tr>
                <td colspan="6" class="alignR">Tổng tiền:	</td>
                <td> 
                  <p id="total">{{number_format($total)}}</p>
                  <p style="display: none;" id="realtotal">{{$total}}</p>
                </td>
            </tr>    
                  
            </tbody>
        </table><br/>
      
    
        <table class="table table-bordered">
        <tbody>
             <tr>
              <td> 
            <form class="form-inline">
              <label style="min-width:159px"> VOUCHER: </label> 
            <input type="text" class="input-medium" id="vouchercode" placeholder="CODE">
            <a class="shopBtn"id="apdung" onclick="useVC();" style="cursor: pointer;"> Áp dụng</a>
            <div id="warningvoucher" style="visibility: hidden;"></div>

            </form>
            </td>
            </tr>
            <tr>
              <label style="min-width:159px"> Địa chỉ nhận hàng: </label> 
              <textarea type="text" id="diachi" style="resize: none;color: black;" rows="5" required></textarea>
              <div id="warning" style="visibility: hidden;"></div>

            </tr>
            
        </tbody>
            </table>

<a href="{{URL::to('/trang-chu')}}" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Tiếp tục mua hàng </a>
<a href="{{URL::to('/dat-hang')}}" class="shopBtn btn-large pull-right" id="dathang" style="pointer-events: none;">Đặt hàng <span class="icon-arrow-right"></span></a>

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
function useVC(){
  var code=document.getElementById('vouchercode').value;
  if(code==''){

  }else{
    $.ajax({
      url:`../WebINOX/api/useCode/?code=${code}`,
      method: 'GET',
      contentType: 'application/json',
      success:function(rs){
        if(rs==1){
          $("#warningvoucher").text("Voucher không tồn tại!");
          $("#warningvoucher").css('visibility','visible');
          $("#warningvoucher").css('color','red');
        }
        else if(rs==2){
          $("#warningvoucher").text("Voucher đã được dùng hết!");
          $("#warningvoucher").css('visibility','visible');
          $("#warningvoucher").css('color','red');
        }
        else if(rs==4){
          $("#warningvoucher").text("Voucher đã chưa bắt đầu hoặc đã hết hạn!");
          $("#warningvoucher").css('visibility','visible');
          $("#warningvoucher").css('color','red');
        }
        else if(rs>100){
          $("#warningvoucher").text("Áp dụng thành công!");
          $("#warningvoucher").css('visibility','visible');
          $("#warningvoucher").css('color','green');
          var result_style = document.getElementById('giamgia').style;
          result_style.display = 'table-row';
          $('#tiengiamgia').empty();
          $('#tiengiamgia').append(`-${format1(parseInt(rs))}`);
          var total=document.getElementById('realtotal').textContent;
          var newtotal=parseInt(total)-parseInt(rs);
          $('#total').empty();
          $('#total').append(`${format1(newtotal)}`)
        }
      }
    });
  }
  
}
function updateCart(sessionid,qty){
  $.ajax({
    url:`../WebINOX/api/updatecart/?sessionid=${sessionid}&qty=${qty}`,
    method: 'GET',
    contentType: 'application/json',
    success:function(rs){
    }
  });
}
$('.btn ').click(function(){    
  var key=$(this).attr('data')     
  var sessionid=$('#sessionid_'+key).val()
  var qty =$('#qty_'+key).val()
  var maxquan=$('#qty_'+key).attr('max')
  var price=$('#realcost_'+key).html()

  //thay doi so luong thi thay doi thanh tien+update session gio hang
  if($(this).hasClass('discount')){
    newval=parseInt(qty)-1
    if(newval<1){
      newval=parseInt(qty)
    }
    $('#qty_'+key).val(newval)
    var subtotal=parseInt(price)*newval
    $('#thanhtien_'+key).empty();
    $('#thanhtien_'+key).append(`${format1(subtotal)}`);
    $('#realsubtotal_'+key).val(subtotal)
       //thay doi so luong thi thay doi tong tien
  var grandTotal=30000
  $('.table').find('td').find('.realsubtotal').each(function(){
          if(!isNaN($(this).val()))
            {grandTotal += parseInt($(this).val()); 
            }
      });
      $('#realtotal').empty()
      $('#realtotal').append(`${grandTotal}`)
      $('#total').empty();
      $('#total').append(`${format1(grandTotal)}`)
    updateCart(sessionid,newval)
  }else if($(this).hasClass('increase')){
    var newval=parseInt(qty)+1
    if(newval>parseInt(maxquan)){
      newval=parseInt(qty)
      $('#qty_'+key).val(parseInt(qty))
      var subtotal=parseInt(price)*newval
      $('#thanhtien_'+key).empty();
      $('#thanhtien_'+key).append(`${format1(subtotal)}`);
      $('#realsubtotal_'+key).val(subtotal)
   //thay doi so luong thi thay doi tong tien
   var grandTotal=30000
  $('.table').find('td').find('.realsubtotal').each(function(){
          if(!isNaN($(this).val()))
            {grandTotal += parseInt($(this).val()); 
            }
      });
      $('#realtotal').empty()
      $('#realtotal').append(`${grandTotal}`)
      $('#total').empty();
      $('#total').append(`${format1(grandTotal)}`)
      updateCart(sessionid,newval)
    }else{
      $('#qty_'+key).val(newval)
      var subtotal=parseInt(price)*newval
      $('#thanhtien_'+key).empty();
      $('#thanhtien_'+key).append(`${format1(subtotal)}`);
      $('#realsubtotal_'+key).val(subtotal)
   //thay doi so luong thi thay doi tong tien
   var grandTotal=30000
  $('.table').find('td').find('.realsubtotal').each(function(){
          if(!isNaN($(this).val()))
            {grandTotal += parseInt($(this).val()); 
            }
      });
      $('#realtotal').empty()
      $('#realtotal').append(`${grandTotal}`)
      $('#total').empty();
      $('#total').append(`${format1(grandTotal)}`)
      updateCart(sessionid,newval)
    }
    
  }

});
$('body').on('focusout', '#vouchercode', function(e) {
    var voucher=document.getElementById("vouchercode").value;
    if(voucher==''){
      $.ajax({
      url:"{{url('/xoa-ss-voucher')}}",
      method: 'GET',
      contentType: 'application/json',
      success:function(rs){
    }
  });
}
});
$('body').on('focusout', '#diachi', function(e) {
    var diachi=document.getElementById("diachi").value;
    if(diachi==''){
      $('#dathang').css('pointer-events','none');
      $("#warning").text("Vui lòng nhập địa chỉ nhận hàng!");
      $("#warning").css('visibility','visible');
      $("#warning").css('color','red');
      
    }else{
      $.ajax({
      url:`../WebINOX/api/updiachi/?diachi=${diachi}`,
      method: 'GET',
      contentType: 'application/json',
      success:function(rs){
      }
    });
    $("#warning").css('visibility','hidden');
    $('#dathang').css('pointer-events','auto');
    }
    
    
});
</script>
@endsection