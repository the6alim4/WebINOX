@extends('welcome')
@section('content')	
<!-- Body Section -->
<div class="row" style="width: 873px;">
	<div class="span12" style="width: 873px;">
    <ul class="breadcrumb">
		<li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Giỏ hàng</li>
    </ul>
<div class="well well-small">
    <h1>Giỏ hàng <small class="pull-right"> 2 Items are in the cart </small></h1>
<hr class="soften"/>	

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
          
                {{-- san pham --}}
            <tr>
                <td colspan="6" class="alignR">Phí giao hàng (toàn quốc):	</td>
                <td> {{number_format(30000)}}</td>
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
            <input type="text" class="input-medium" placeholder="CODE">
            <button type="submit" class="shopBtn"> Thêm khuyến mãi</button>
            </form>
            </td>
            </tr>
            
        </tbody>
            </table>

<a href="{{URL::to('/trang-chu')}}" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Tiếp tục mua hàng </a>
<a href="login.html" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

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

</script>
@endsection