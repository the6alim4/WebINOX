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
                echo '<span style="display:fex;justify-self:center";color:green>'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="position-center">
                <form role="form" action="{{URL::to('/save-category-product')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                    <input type="file" id="exampleInputFile" name="anhchinhsanpham" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh phụ sản phẩm</label>
                    <input type="file" id="exampleInputFile" name="anhphusanpham[]" accept="image/*" multiple>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="motasanpham" style="resize: none" rows="5"></textarea>
                </div>
                <div style="border: 1em darkorchid">
                    <label for="exampleInputEmail1">Số lượng</label>
                    <div>
                        <div class="kichco"><span>16cm</span>&nbsp;
                            <input type="number" name="c16">
                        </div>
                        <div class="kichco"><span>18cm</span>&nbsp;
                            <input type="number" name="c18"  >
                        </div>
                        <div class="kichco"><span>20cm</span>&nbsp;
                            <input type="number" name="c20" >
                        </div>
                        <div class="kichco"><span>22cm</span>&nbsp;
                            <input type="number" name="c22" >
                        </div>
                        <div class="kichco"><span>24cm</span>&nbsp;
                            <input type="number" name="c24" >
                        </div>
                        <div class="kichco"><span>26cm</span>&nbsp;
                            <input type="number" name="c26" >
                        </div>
                        <div class="kichco"><span>28cm</span>&nbsp;
                            <input type="number" name="c28" >
                        </div>
                        <div class="kichco"><span>30cm</span>&nbsp;
                            <input type="number" name="c30" >
                        </div>
                        <div class="kichco"><span>32cm</span>&nbsp;
                            <input type="number" name="c32" >
                        </div>
                        <div class="kichco"><span>Khác</span>&nbsp;&nbsp;
                            <input type="number" name="khac">
                        </div>
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Nhà sản xuất</label>
                    <select class="form-control input-sm m-bot15" name="nsx">
                        <?php
					$tennsx=Session::get('tennsx');
					$mansx=Session::get('mansx');
                    for($i=0;$i<count($tennsx);$i++){
                        echo '<option value="'.$mansx[$i].'">'.$tennsx[$i].'</option>';
                    }
					?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Loại sản phẩm</label>
                    <select class="form-control input-sm m-bot15" name="loaisanpham">
                        <?php
					$tenloaisp=Session::get('tenloaisp');
					$maloaisp=Session::get('maloaisp');
                    for($j=0;$j<count($tenloaisp);$j++){
                        echo '<option value="'.$maloaisp[$j].'">'.$tenloaisp[$j].'</option>';
                    }
					
					?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chất liệu</label>
                    <select class="form-control input-sm m-bot15" name="chatlieu">
                        <?php
					$tenchatlieu=Session::get('tenchatlieu');
					$machatlieu=Session::get('machatlieu');
                    for($k=0;$k<count($tenchatlieu);$k++){
                        echo '<option value="'.$machatlieu[$k].'">'.$tenchatlieu[$k].'</option>';
                    }

					?>
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
