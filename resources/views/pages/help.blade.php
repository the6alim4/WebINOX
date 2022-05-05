@extends('welcome')
@section('content')		
    <div style="text-align: center;width: 100%;color: rgb(24, 23, 23);">
        <h1 style="font-weight: bold;">{{$ttch->TenCH}}</h1>
        <p>Liên hệ đường dây nóng: {{$ttch->SDT}}</p>
        <p>Địa chỉ: {{$ttch->DiaChi}}</p>
    </div>
</div>
@endsection