@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm mới voucher
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
                <form role="form" action="{{URL::to('/them-voucher')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã Code</label>
                    <input type="text" name="macode" class="form-control" style="width: 45%;" required>
                </div> 
                <div class="form-group">
                    <label for="exampleInputEmail1">Giảm giá</label>
                    <span>
                    <input type="number" name="giamgia" class="form-control" min="1000" step="1000" style="width: 45%;"  required>
                    </span>
                </div>                  
                <div class="form-group">
                    <label for="exampleInputFile">Số lượng</label>
                    <input type="number" name="soluong" min="1" step="1" required>                
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ngày bắt đầu</label>
                    <input type="date" name="ngaybd" required>                
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ngày kết thúc</label>
                    <input type="date" name="ngaykt" required>                
                </div>
                <button type="submit" name="add_product" class="btn btn-info">Thêm mới</button>
            </form>
            </div>

        </div>
    </section>

</div>
@endsection
