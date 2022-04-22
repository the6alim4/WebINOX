@extends('welcome')
@section('content')	
<div class="row" style="width: 873px;">
<div class="span9" >
  <ul class="breadcrumb">
  <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
  <li class="active">Cập nhật mật khẩu</li>
  </ul>
<h2 style="text-align: center;"> Cập nhật mật khẩu</h2>	
<hr class="soft"/>
 @if(session('alert'))
    <section class='alert alert-success' id="alertxx" >
	{{session('alert')}}
</section>
@endif  
<div class="row" style="display: flex;justify-content: center;align-items: center;">
  <div class="span4">
    <div class="well" style="display: flex;justify-content: center;align-items: center;">
    <form action="{{URL::to('/cap-nhat-mat-khau')}}" method="post">
      {{ csrf_field() }}
      <div class="control-group">
      <label class="control-label">Mật khẩu hiện tại</label>
      <div class="controls">
        <input class="span3"  type="password" name="uspassword" placeholder="Mật khẩu hiện tại" required>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label">Mật khẩu mới</label>
      <div class="controls">
        <input type="password" class="span3" name="usnewpassword" placeholder="Mật khẩu mới" required>
      </div>
      </div>
      <div class="control-group">
        <label class="control-label">Nhập lại mật khẩu mới</label>
        <div class="controls">
          <input type="password" class="span3" name="reusnewpassword" placeholder="Nhập lại mật khẩu mới" required>
        </div>
        </div>
      <div class="control-group">
      <div class="controls">
        <button type="submit" class="defaultBtn">Cập nhật mật khẩu</button>
      </div>
      </div>
    </form>
  </div>
  </div>
</div>	

</div>
</div>
@endsection