@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm danh mục sản phẩm
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
                <form role="form" action="{{URL::to('/save-category-product')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                    <input type="text" name="category_product_name" class="form-control" required>
                </div>                
                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục sản phẩm</button>
            </form>
            </div>

        </div>
    </section>

</div>
@endsection
