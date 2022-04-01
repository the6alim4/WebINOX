@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập nhật danh mục sản phẩm
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
                <form role="form" action="{{URL::to('/update-category-product')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                    <input type="text" name="category_product_name" class="form-control" value="{{$sp->TenSP}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đơn giá nhập</label>
                    <input type="number" name="dongianhap" class="form-control" value="{{$sp->DonGiaNhap}}" required>
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Đơn giá bán</label>
                    <input type="number" name="dongiaban" class="form-control" value="{{$sp->DonGiaBan}}" required> 
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh chính sản phẩm</label>
                    <input type="file" id="exampleInputFile" name="anhchinhsanpham" accept="image/*" value="{{$sp->Anh}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh phụ sản phẩm</label>
                    <input type="file" id="exampleInputFile" name="anhphusanpham[]" accept="image/*"  multiple>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="motasanpham" rows="7" style="resize: none;color: black"required>{{$sp->MoTa}}</textarea>
                </div>
                <div style="border: 1em darkorchid">
                    <label for="exampleInputEmail1">Số lượng</label>
                    <div>
                        <?php
                        $c16=null;$c18=null;$c20=null;$c22=null;$c24=null;
                        $c26=null;$c28=null;$c30=null;$c32=null;$khac=null;
                        for($k=0;$k<count($kt);$k++){
                            switch($kt[$k]->DuongKinh){
                                case '16':
                                $c16=$kt[$k]->SoLuong;
                                break;
                                case '18':
                                $c18=$kt[$k]->SoLuong;
                                break;
                                case '20':
                                $c20=$kt[$k]->SoLuong;
                                break;
                                case '22':
                                $c22=$kt[$k]->SoLuong;
                                break;
                                case '24':
                                $c24=$kt[$k]->SoLuong;
                                break;
                                case '26':
                                $c26=$kt[$k]->SoLuong;
                                break;
                                case '28':
                                $c28=$kt[$k]->SoLuong;
                                break;
                                case '30':
                                $c30=$kt[$k]->SoLuong;
                                break;
                                case '32':
                                $c32=$kt[$k]->SoLuong;
                                break;
                                case 'null':
                                $khac=$kt[$k]->SoLuong;
                                break;
                            }
                        }
                        ?>
                        <div class="kichco"><span>16cm</span>&nbsp;                            
                            <input type="number" name="c16" value="{{$c16}}">
                        </div>
                        <div class="kichco"><span>18cm</span>&nbsp;
                            <input type="number" name="c18"  value="{{$c18}}">
                        </div>
                        <div class="kichco"><span>20cm</span>&nbsp;
                            <input type="number" name="c20" value="{{$c20}}" >
                        </div>
                        <div class="kichco"><span>22cm</span>&nbsp;
                            <input type="number" name="c22" value="{{$c22}}">
                        </div>
                        <div class="kichco"><span>24cm</span>&nbsp;
                            <input type="number" name="c24" value="{{$c24}}">
                        </div>
                        <div class="kichco"><span>26cm</span>&nbsp;
                            <input type="number" name="c26" value="{{$c26}}">
                        </div>
                        <div class="kichco"><span>28cm</span>&nbsp;
                            <input type="number" name="c28" value="{{$c28}}">
                        </div>
                        <div class="kichco"><span>30cm</span>&nbsp;
                            <input type="number" name="c30" value="{{$c30}}">
                        </div>
                        <div class="kichco"><span>32cm</span>&nbsp;
                            <input type="number" name="c32" value="{{$c32}}">
                        </div>
                        <div class="kichco"><span>Khác</span>&nbsp;&nbsp;
                            <input type="number" name="khac"value="{{$khac}}">
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
                        if($sp->MaNSX==$mansx[$i]){
                            echo '<option value="'.$mansx[$i].'" selected>'.$tennsx[$i].'</option>';
                        }
                        else{
                            echo '<option value="'.$mansx[$i].'">'.$tennsx[$i].'</option>';
                        }
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
                        if($sp->MaLoai==$maloaisp[$j]){
                        echo '<option value="'.$maloaisp[$j].'" selected>'.$tenloaisp[$j].'</option>';                            
                        }else{
                            echo '<option value="'.$maloaisp[$j].'">'.$tenloaisp[$j].'</option>';
                        }
                    }
					
					?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chất liệu</label>
                    <select class="form-control input-sm m-bot15" name="chatlieu" value="{{$sp->MaChatLieu}}">
                        <?php
					$tenchatlieu=Session::get('tenchatlieu');
					$machatlieu=Session::get('machatlieu');
                    for($k=0;$k<count($tenchatlieu);$k++){
                        if($sp->MaChatLieu==$machatlieu[$k]){
                        echo '<option value="'.$machatlieu[$k].'" selected>'.$tenchatlieu[$k].'</option>';
                        }else{
                            echo '<option value="'.$machatlieu[$k].'">'.$tenchatlieu[$k].'</option>';
                        }
                    }

					?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giảm giá</label>
                    <input type="number" name="giamgia" class="form-control" min="0" max="0.99" step="any" value="{{$sp->KhuyenMai}}" required>
                </div>
                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục sản phẩm</button>
            </form>
            </div>

        </div>
    </section>

</div>
@endsection
