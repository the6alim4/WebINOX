@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập nhật thương hiệu
        </header>
        <div class="panel-body">            
            <div class="position-center">
                <form role="form" action="{{URL::to('/update-brand/'.$sp->MaNSX)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                        <input type="text" name="category_product_name" class="form-control" value="{{$sp->TenNSX}}" required>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text" name="sdt" class="form-control" pattern="[0][0-9]{9}" value="{{$sp->SDT}}"  required>
                    </div>                  
                    <div class="form-group">
                        <label for="exampleInputFile">Logo thương hiệu</label>
                        <input type="file" id="exampleInputFile" name="anhnsx" accept="image/*">                
                    </div>
                <button type="submit" name="update_product" class="btn btn-info">Cập nhật thương hiệu</button>
            </form>
            </div>

        </div>
    </section>

</div>
@endsection
