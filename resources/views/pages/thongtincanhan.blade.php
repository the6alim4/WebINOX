@extends('welcome')
@section('content')	
<div class="row" style="width: 873px;">
<div class="span9" >
  <ul class="breadcrumb">
  <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
  <li class="active">Thông tin cá nhân</li>
  </ul>
<h2 style="text-align: center;"> Cập nhật thông tin cá nhân</h2>	
<hr class="soft"/>
 @if(session('alert'))
    <section class='alert alert-success' id="alertxx" >
	{{session('alert')}}
</section>
@endif  
<div class="row" style="display: flex;justify-content: center;align-items: center;">
  <div class="span4">
    <div class="well" style="display: flex;justify-content: center;align-items: center;">
    <form action="{{URL::to('/cap-nhat-thong-tin')}}" method="post">
      {{ csrf_field() }}
      <div class="control-group">
      <label class="control-label">Họ và tên</label>
      <div class="controls">
        <input class="span3"  type="text" name="usname" placeholder="Họ và tên" value="{{$infor->TenNguoiDung}}" required>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label">Email</label>
      <div class="controls">
        <input type="email" class="span3" name="usemail" placeholder="Email" value="{{$infor->Email}}" required>
      </div>
      </div>
      <div class="control-group">
        <label class="control-label">Số điện thoại</label>
        <div class="controls">
          <input type="text" class="span3" name="usphone" placeholder="Số điện thoại" value="{{$infor->SoDienThoai}}" pattern="[0][0-9]{9,10}" required>
        </div>
        </div>
      <div class="control-group">
      <div class="controls">
        <button type="submit" class="defaultBtn">Cập nhật thông tin</button>
      </div>
      </div>
    </form>
  </div>
  </div>
</div>	

</div>
</div>
</div>
@endsection