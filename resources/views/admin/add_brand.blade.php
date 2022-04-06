@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm thương hiệu
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
                <form role="form" action="{{URL::to('/save-brand')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                    <input type="text" name="category_product_name" class="form-control" required>
                </div> 
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" name="sdt" class="form-control" pattern="[0][0-9]{9}"  required>
                </div>                  
                <div class="form-group">
                    <label for="exampleInputFile">Logo thương hiệu</label>
                    <input type="file" id="exampleInputFile" name="anhnsx" accept="image/*">                
                </div>
                
                <button type="submit" name="add_product" class="btn btn-info">Thêm thương hiệu</button>
            </form>
            </div>

        </div>
    </section>

</div>
@endsection
