<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

session_start();
class CartController extends Controller
{
    //
    public function gio_hang(Request $request){
        //seo
        $meta_desc="Giỏ hàng của bạn";
        $meta_keywords="Giỏ hàng Ajax";
        $meta_title="Giỏ hàng Ajax";
        $url_canonical=$request->url();
        //--seo
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        $all_product=DB::table('tbl_sanpham')->orderby('MaSP','asc')->limit(4)->get();
        return view('pages.cart.cart_ajax',compact('loaisp','nsx','slider','all_product','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $session_size = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart'); 

        if($cart==true){
            $is_available=0;
            foreach($cart as $key){
                if($key['product_id']==$data['cart_product_id'] && $key['product_size']==$data['cart_product_size']){
                    $is_available++;
                }
            }
            if($is_available==0){
                //Tao session cart moi
            $cart[]=array(
                'session_id'=> $session_id,
                'session_size'=>$session_size,
                'product_name'=> $data['cart_product_name'],
                'product_id'=> $data['cart_product_id'],
                'product_image'=> $data['cart_product_image'],
                'product_qty'=> $data['cart_product_qty'],
                'product_price'=> $data['cart_product_price'],
                'product_size'=>$data['cart_product_size'],
                'product_maxquan'=>$data['cart_product_maxquan'],
            );
            Session::put('cart');
            }
        }else{
            //Tao session cart moi
            $cart[]=array(
                'session_id'=> $session_id,
                'session_size'=>$session_size,
                'product_name'=> $data['cart_product_name'],
                'product_id'=> $data['cart_product_id'],
                'product_image'=> $data['cart_product_image'],
                'product_qty'=> $data['cart_product_qty'],
                'product_price'=> $data['cart_product_price'],
                'product_size'=>$data['cart_product_size'],
                'product_maxquan'=>$data['cart_product_maxquan'],
            );
        }
        Session::put('cart',$cart);
        Session::save();
    }
    public function updateCart(Request $request){
        $cart=Session::get('cart');
        $data=$request->all();        
        if($cart){
            foreach($cart as $key=>$val){
                    if($val['session_id']==$data['sessionid']){
                        $cart[$key]['product_qty']=$data['qty'];
                        $res=$cart[$key]['product_qty'];
                    }
                }         
        }
        Session::put('cart',$cart);
        return $res;
    }
    public function delete_cart($session_id){
        $cart=Session::get('cart');
        if($cart==true){
            foreach($cart as $key=>$val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    //Đặt hàng
    public function updiachi(Request $request){
        $diachi=$request->diachi;
        Session::put('diachi',$diachi);
    }
    public function dathang(){
        if(!Session::get('cart')){
          return Redirect::to('/trang-chu');
        }else{
        if(!Session::get('user_id')){
            $alert='Bạn chưa đăng nhập! Vui lòng đăng nhập!';
            Session::put('alert',$alert);
            $loaisp=DB::table('tbl_loaisp')->get();
            $nsx=DB::table('tbl_nsx')->get();
            $slider=DB::table('tbl_slider')->get();
            return view('pages.login',compact('loaisp','nsx','slider'));
        }else{
            $maguoidung=Session::get('user_id');
            $trangthai=1;
            $ngaytao=Carbon::now();
            $cart=Session::get('cart');
            $tongtien=30000;
            $diachi=Session::get('diachi');
            foreach($cart as $key){
                $tongtien+=$key['product_qty']*$key['product_price'];
            } 
            $datahdb=[];
            if(Session::get('idvoucher')<1){
                $datahdb['IDKM']=null;
                $datahdb['KhuyenMai']=null;
            }else{
                $datahdb['IDKM']=Session::get('idvoucher');
                $datahdb['KhuyenMai']=Session::get('voucher');
                $slvc=DB::table('tbl_khuyenmai')->where('IDKM',Session::get('idvoucher'))->first();
                $slvcmoi=(int)$slvc->SoLuongCon-1;
                $datakm=[];
                $datakm['SoLuongCon']=$slvcmoi;
                DB::table('tbl_khuyenmai')->where('IDKM',Session::get('idvoucher'))->update($datakm);
            }
            $datahdb['MaNguoiDung']=$maguoidung;
            $datahdb['NgayTao']=$ngaytao;
            $datahdb['TrangThai']=$trangthai;
            $datahdb['DiaChi']=$diachi;
            $datahdb['TongTien']=$tongtien-(int)Session::get('voucher');
            $datahdb['isevaluated']=0;
            DB::table('tbl_hoadonban')->insert($datahdb);
            $mahdb=DB::table('tbl_hoadonban')
            ->where('MaNguoiDung',$maguoidung)
            ->where('TrangThai',$trangthai)
            ->where('TongTien',$tongtien-(int)Session::get('voucher'))->first();
            $mahdb=$mahdb->MaHDB;
            foreach($cart as $key){
                $datachitiethdb=[];
                $datachitiethdb['MaHDB']=$mahdb;
                $datachitiethdb['MaSP']=$key['product_id'];
                $datachitiethdb['SoLuong']=$key['product_qty'];
                $datachitiethdb['DonGiaBan']=$key['product_price'];
                $datachitiethdb['ThanhTien']=$key['product_qty']*$key['product_price'];
                $datachitiethdb['DuongKinh']=$key['product_size'];
                DB::table('tbl_chitiethdb')->insert($datachitiethdb);
                $newquan=(int)$key['product_maxquan']-(int)$key['product_qty'];
                $idsp=$key['product_id'];
                $size=$key['product_size'];
                if($size==0){
                    $size=Null;
                }
                $datasl=[];
                $datasl['SoLuong']=$newquan;
                DB::table('tbl_kichthuoc')->where('MaSP',$idsp)->where('DuongKinh',$size)->update($datasl);
            } 
            Session::put('check1',1);
            Session::forget('cart');
            Session::forget('idvoucher',0);
            Session::forget('voucher',0);

            $loaisp=DB::table('tbl_loaisp')->get();
            $nsx=DB::table('tbl_nsx')->get();
            $slider=DB::table('tbl_slider')->get();
            return view('pages.cart.cart_ajax',compact('loaisp','nsx','slider'));
        }
    }
    }
    //Xem đơn hàng user
    //Đơn hàng chờ xác nhận
    public function choxacnhan(){
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('tbl_hoadonban.MaNguoiDung',Session::get('user_id'))
        ->where('TrangThai',1)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.choxacnhan',compact('bills','loaisp','nsx','slider'));
    }
    public function detailwaiting($MaHDB){
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.detailwaiting',compact('infor','sp','loaisp','nsx','slider'));
    }
    public function demolishbill($MaHDB){
        $data=[];
        $data['TrangThai']=5;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        $sanpham=DB::table('tbl_chitiethdb')->where('MaHDB',$MaHDB)->get();
        foreach($sanpham as $key){
            $kichthuoc=$key->DuongKinh;
            if($kichthuoc==0){
                $kichthuoc=Null;
            }
            $soluong=DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->first();
            $soluong=$soluong->SoLuong;
            $soluongmua=$key->SoLuong;
            $soluong=$soluong+$soluongmua;
            $data1=[];
            $data1['SoLuong']=$soluong;
            DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->update($data1);
        }
        return Redirect::to('/cho-xac-nhan');
    }
    public function changeaddress($MaHDB){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        Session::put('MaHDB',$MaHDB);
        $all_product=DB::table('tbl_sanpham')->orderby('MaSP','asc')->limit(4)->get();        
        return view('pages.cart.changeaddress',compact('loaisp','nsx','slider','all_product'));
    }
    public function changeadd(Request $request){
        $data=[];
        $hdb=Session::get('MaHDB');
        $data['DiaChi']=$request->addr;
        DB::table('tbl_hoadonban')->where('MaHDB',$hdb)->update($data);
        Session::put('MaHDB',null);
        return Redirect::to('/cho-xac-nhan');
    }
    //Đơn hàng đã xác nhận
    public function daxacnhan(){
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('tbl_hoadonban.MaNguoiDung',Session::get('user_id'))
        ->where('TrangThai',2)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.daxacnhan',compact('bills','loaisp','nsx','slider'));
    }
    public function detailconfirmedinvoice($MaHDB){
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.detailconfirmedinvoice',compact('infor','sp','loaisp','nsx','slider'));
    }
    public function demolishconfirmedinvoice($MaHDB){
        $data=[];
        $data['TrangThai']=5;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        $sanpham=DB::table('tbl_chitiethdb')->where('MaHDB',$MaHDB)->get();
        foreach($sanpham as $key){
            $kichthuoc=$key->DuongKinh;
            if($kichthuoc==0){
                $kichthuoc=Null;
            }
            $soluong=DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->first();
            $soluong=$soluong->SoLuong;
            $soluongmua=$key->SoLuong;
            $soluong=$soluong+$soluongmua;
            $data1=[];
            $data1['SoLuong']=$soluong;
            DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->update($data1);
        }
        return Redirect::to('/da-xac-nhan');
    }
    //Đơn hàng đang giao
    public function danggiao(){
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('tbl_hoadonban.MaNguoiDung',Session::get('user_id'))
        ->where('TrangThai',3)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.danggiao',compact('bills','loaisp','nsx','slider'));
    }
    public function detaildeliveringinvoice($MaHDB){
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.detaildeliveringinvoice',compact('infor','sp','loaisp','nsx','slider'));
    }
    //Đơn hàng đã hoàn thành
    public function dahoanthanh(){
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('tbl_hoadonban.MaNguoiDung',Session::get('user_id'))
        ->where('TrangThai',4)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.dahoanthanh',compact('bills','loaisp','nsx','slider'));
    }
    public function detaildeliveredevaluatedinvoice($MaHDB){
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.detaildeliveredevaluatedinvoice',compact('infor','sp','loaisp','nsx','slider'));
    }
    public function detaildeliverednotevaluatedinvoice($MaHDB){
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.detaildeliverednotevaluatedinvoice',compact('infor','sp','loaisp','nsx','slider'));
    }
    //Đánh giá sản phẩm
    public function evaluate($MaHDB){
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        return view('pages.cart.evaluate',compact('infor','sp','loaisp','nsx','slider'));
    }
    public function sendEvaluate(Request $request){
        $mand=$request->MaNguoiDung;
        $mahdb=$request->MaHDB;
        $sao=$request->Sao;
        $bl=$request->BinhLuan;
        $datahdb=[];
        $datahdb['isevaluated']=1;
        DB::table('tbl_hoadonban')->where('MaHDB',$mahdb)->update($datahdb);
        $sp=DB::table('tbl_chitiethdb')->where('MaHDB',$mahdb)->get();
        foreach($sp as $key){
            $datadanhgia=[];
            $datadanhgia['Sao']=$sao;
            $datadanhgia['MaSP']=$key->MaSP;
            $datadanhgia['MaNguoiDung']=$mand;
            $datadanhgia['MaHDB']=$mahdb;
            DB::table('tbl_danhgia')->insert($datadanhgia);
            $databinhluan=[];
            $databinhluan['BinhLuan']=$bl;
            $databinhluan['NgayBinhLuan']=Carbon::now();
            $databinhluan['MaSP']=$key->MaSP;
            $databinhluan['MaNguoiDung']=$mand;
            $databinhluan['MaHDB']=$mahdb;            
            DB::table('tbl_binhluan')->insert($databinhluan);
        }
    }
    //use Voucher
    public function useCode(Request $request){
        $code=$request->code;
        $todaydate=strtotime(Carbon::now());
        $res=DB::table('tbl_khuyenmai')->where('MaKM',$code)->first();
        if($res==null){
            return 1;
        }
        else{
            if($res->SoLuongCon<1){
                return 2;
            }else{
                $ngaybd=strtotime($res->NgayBatDau);
                $ngaykt=strtotime($res->NgayKetThuc);
                if($todaydate>$ngaybd && $todaydate<$ngaykt){
                    Session::put('voucher',$res->GiamGia);
                    Session::put('idvoucher',$res->IDKM);
                    return $res->GiamGia;
                }else{
                    return 4;
                }
            }
        }
    }
    public function xoavoucher(){
        Session::put('idvoucher',0);
    }
}
