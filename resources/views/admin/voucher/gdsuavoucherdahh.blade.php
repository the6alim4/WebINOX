@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập nhật Voucher
        </header>
        <div class="panel-body">
            <?php
            $message=Session::get('message');
            if($message){
                echo '<div style="display: flex;justify-content: center; width: 100%; color: green;">'.$message.'</div>';
                Session::put('message',null);
            }
            ?>
            <div class="position-center">
                <form role="form" action="{{URL::to('/sua-voucher-danghd/'.$voucher->IDKM)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã Code</label>
                    <input type="text" name="macode" class="form-control" style="width: 45%;" value="{{$voucher->MaKM}}" required>
                </div> 
                <div class="form-group">
                    <label for="exampleInputEmail1">Giảm giá</label>
                    <span>
                    <input type="number" name="giamgia" class="form-control" min="1000" step="1000" style="width: 45%;" value="{{$voucher->GiamGia}}"  required>
                    </span>
                </div>                  
                <div class="form-group">
                    <label for="exampleInputFile">Số lượng</label>
                    <input type="number" name="soluong" min="1" step="1" value="{{$voucher->SoLuongCon}}" required>                
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ngày bắt đầu</label>
                    <input type="date" name="ngaybd" value="{{$voucher->NgayBatDau}}" required>                
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ngày kết thúc</label>
                    <input type="date" name="ngaykt" value="{{$voucher->NgayKetThuc}}" required>                
                </div>
                <button type="submit" name="add_product" class="btn btn-info">Cập nhật</button>
            </form>
            </div>

        </div>
    </section>

</div>
@endsection
