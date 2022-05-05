@extends('welcome')
@section('content')	
<div class="row" style="width: 873px;">
<div class="span9" style="background: rgb(193, 227, 170);color: rgb(24, 23, 23);" >
  <ul class="breadcrumb">
  <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
  <li class="active">Thay đổi địa chỉ nhận hàng</li>
  </ul>
<hr class="soft"/>
<div class="row" style="display: flex;justify-content: center;align-items: center;">
  <div class="span4">
    <div class="well" style="display: flex;justify-content: center;align-items: center;">
    <form action="{{URL::to('/change-add')}}" method="post">
      {{ csrf_field() }}
      <div class="control-group">
      <label class="control-label">Địa chỉ nhận hàng mới</label>
      <div class="controls">
        <textarea class="span3" style="resize: none;" type="text" name="addr" placeholder="" required></textarea>
      </div>
      </div>      
      <div class="controls">
        <button style="margin-left: 33%;" type="submit" onclick="return confirm('Bạn có chắc thay đổi địa chỉ nhận hàng?')" class="defaultBtn">Thay đổi</button>
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