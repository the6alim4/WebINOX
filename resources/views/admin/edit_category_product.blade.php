@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập nhật danh mục sản phẩm
        </header>
        <div class="panel-body">            
            <div class="position-center">
                <form role="form" action="{{URL::to('/update-category-product/'.$sp->MaLoai)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                    <input type="text" name="category_product_name" class="form-control" value="{{$sp->TenLoai}}" required>                </div>
                
                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục sản phẩm</button>
            </form>
            </div>

        </div>
    </section>

</div>
@endsection
