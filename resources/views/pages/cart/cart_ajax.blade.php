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

<table class="table table-bordered table-condensed">
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
            $total=0;
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
                <p id="price">{{number_format($key['product_price'])}}</p>
                <p style="display: none;" id="realcost">{{$key['product_price']}}</p>
              </td>          
              <td>                
              <div class="input-append">
                <input class="span1" type="number" style="width:50px;height: 30px;" id="qty" size="30" type="text" min="1" max="{{$key['product_maxquan']}}" step="1" value="{{$key['product_qty']}}">
            </div>
            </td>
              <td>
                <p id="thanhtien"> {{number_format($subtotal)}}</p>
                <p style="display: none;" id="realsubtotal">{{$subtotal}}</p>
              </td>
              <td><button class="btn btn-mini btn-danger" type="button"><span class="icon-remove"></span></button></td>
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
                  <p>{{number_format($total)}}</p>
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
        <table class="table table-bordered">
        <tbody>
            <tr><td>ESTIMATE YOUR SHIPPING & TAXES</td></tr>
             <tr> 
             <td>
                <form class="form-horizontal">
                  <div class="control-group">
                    <label class="span2 control-label" for="inputEmail">Country</label>
                    <div class="controls">
                      <input type="text" placeholder="Country">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="span2 control-label" for="inputPassword">Post Code/ Zipcode</label>
                    <div class="controls">
                      <input type="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="shopBtn">Click to check the price</button>
                    </div>
                  </div>
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
 $(document).on('keyup mouseup', '#qty', function() {                                                                                                                     
  var quantity=document.getElementById('qty').value;
  var price=document.getElementById('realcost').textContent;
  var total=quantity*price;
  $('#total').text(total);
  $('#realtotal').text(total);
});
</script>
@endsection