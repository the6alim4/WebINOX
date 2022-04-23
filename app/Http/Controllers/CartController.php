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
            $datahdb['MaNguoiDung']=$maguoidung;
            $datahdb['NgayTao']=$ngaytao;
            $datahdb['TrangThai']=$trangthai;
            $datahdb['DiaChi']=$diachi;
            $datahdb['TongTien']=$tongtien;
            DB::table('tbl_hoadonban')->insert($datahdb);
            $mahdb=DB::table('tbl_hoadonban')
            ->where('MaNguoiDung',$maguoidung)
            ->where('TrangThai',$trangthai)
            ->where('TongTien',$tongtien)->first();
            $mahdb=$mahdb->MaHDB;
            foreach($cart as $key){
                $datachitiethdb=[];
                $datachitiethdb['MaHDB']=$mahdb;
                $datachitiethdb['MaSP']=$key['product_id'];
                $datachitiethdb['SoLuong']=$key['product_qty'];
                $datachitiethdb['DonGiaBan']=$key['product_price'];
                $datachitiethdb['ThanhTien']=$key['product_qty']*$key['product_price'];
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
            Session::forget('cart');
            $loaisp=DB::table('tbl_loaisp')->get();
            $nsx=DB::table('tbl_nsx')->get();
            $slider=DB::table('tbl_slider')->get();
            return view('pages.cart.cart_ajax',compact('loaisp','nsx','slider'));
        }
    }
}
