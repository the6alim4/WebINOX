@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm danh mục sản phẩm
        </header>
        <div class="panel-body">
            <div class="position-center">
                <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                    <input type="text" name="category_product_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đơn giá nhập</label>
                    <input type="number" name="dongianhap" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Đơn giá bán</label>
                    <input type="number" name="dongiaban" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh chính sản phẩm</label>
                    <input type="file" id="exampleInputFile" name="anhchinhsanpham">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh phụ sản phẩm</label>
                    <input type="file" id="exampleInputFile" name="anhphusanpham" multiple>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="motasanpham" style="resize: none" rows="5"></textarea>
                </div>
                <div style="border: 1em darkorchid">
                    <label for="exampleInputEmail1">Số lượng</label>
                    <div>
                        <div class="kichco"><span>16cm</span>&nbsp;
                            <input type="number" name="16" >
                        </div>
                        <div class="kichco"><span>18cm</span>&nbsp;
                            <input type="number" name="18" >
                        </div>
                        <div class="kichco"><span>20cm</span>&nbsp;
                            <input type="number" name="20" >
                        </div>
                        <div class="kichco"><span>22cm</span>&nbsp;
                            <input type="number" name="20" >
                        </div>
                        <div class="kichco"><span>24cm</span>&nbsp;
                            <input type="number" name="20" >
                        </div>
                        <div class="kichco"><span>26cm</span>&nbsp;
                            <input type="number" name="20" >
                        </div>
                        <div class="kichco"><span>28cm</span>&nbsp;
                            <input type="number" name="20" >
                        </div>
                        <div class="kichco"><span>30cm</span>&nbsp;
                            <input type="number" name="20" >
                        </div>
                        <div class="kichco"><span>32cm</span>&nbsp;
                            <input type="number" name="20" >
                        </div>
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Nhà sản xuất</label>
                    <select class="form-control input-sm m-bot15" name="nsx">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Loại sản phẩm</label>
                    <select class="form-control input-sm m-bot15" name="loaisanpham">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chất liệu</label>
                    <select class="form-control input-sm m-bot15" name="chatlieu">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giảm giá</label>
                    <input type="number" name="giamgia" class="form-control">
                </div>
                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục sản phẩm</button>
            </form>
            </div>

        </div>
    </section>

</div>
@endsection
