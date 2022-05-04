@extends('welcome')
@section('content')	
<div class="row" style="width: 873px;">
<div class="span9" >
  <ul class="breadcrumb">
  <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
  <li class="active">Đăng nhập</li>
  </ul>
<h2 style="text-align: center;"> Đăng nhập</h2>	
<hr class="soft"/>
 @if(session('alert'))
    <section class='alert alert-success' id="alertxx" >
	{{session('alert')}}
</section>
@endif  
<div class="row" style="display: flex;justify-content: center;align-items: center;">
  <div class="span4">
    <div class="well" style="display: flex;justify-content: center;align-items: center;">
    <form action="{{URL::to('/login-trang-chu')}}" method="post">
      {{ csrf_field() }}
      <div class="control-group">
      <label class="control-label">Tài khoản</label>
      <div class="controls">
        <input class="span3"  type="text" name="username" placeholder="Tài khoản" required>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="inputPassword">Mật khẩu</label>
      <div class="controls">
        <input type="password" class="span3" name="userpassword" placeholder="Mật khẩu" required>
      </div>
      </div>
      <div class="control-group">
      <div class="controls">
        <button type="submit" class="defaultBtn">Đăng nhập</button> <a href="#">Quên mật khẩu?</a>
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