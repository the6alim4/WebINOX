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
              <th style="text-align: center;">Sản phẩm</th>
              <th style="text-align: center;">Ảnh sản phẩm</th>
              <th style="text-align: center;">Kích cỡ</th>
              <th style="text-align: center;">Đơn giá</th>
              <th style="text-align: center;">Số lượng</th>
              <th style="text-align: center;">Thành tiền </th>
              <th style="text-align: center;"> </th>
            </tr>
          </thead>
          <tbody>
              {{-- san pham --}}
            <tr>
              <td><img width="100" src="assets/img/e.jpg" alt=""></td>
              <td>Items name here<br>Carate : 22<br>Model : n/a</td>
              <td> - </td>
              <td><span class="shopBtn"><span class="icon-ok"></span></span> </td>
              <td>$50.00</td>
              <td>
                
              <div class="input-append">
                <button class="btn btn-mini" type="button" style="height: 30px;"><i class="fa fa-minus" aria-hidden="true"></i></button>
                <input class="span1" style="max-width:34px;height: 30px;" id="appendedInputButtons" size="30" type="text" min="1" step="1">
                <button class="btn btn-mini" type="button" style="height: 30px;"> <i class="fa fa-plus" aria-hidden="true"></i></button>                
            </div>
            </td>
              <td>$100.00</td>
              <td><button class="btn btn-mini btn-danger" type="button"><span class="icon-remove"></span></button></td>
            </tr>
                {{-- san pham --}}
            <tr>
                <td colspan="6" class="alignR">Phí giao hàng (toàn quốc):	</td>
                <td> {{number_format(30000)}} VND</td>
            </tr>
            <tr>
                <td colspan="6" class="alignR">Tổng tiền:	</td>
                <td> $448.42</td>
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
<a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
<a href="login.html" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

</div>
</div>
</div>
@endsection