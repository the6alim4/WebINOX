<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    //
    public function index()
    {
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        // $data=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        // ->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        // ->join('tbl_chatlieu','tbl_sanpham.MaChatLieu','=','tbl_chatlieu.MaChatLieu')
        // ->orderby('MaSP','asc')->get();
        $all_product=DB::table('tbl_sanpham')->orderby('MaSP','asc')->limit(4)->get();
        
        return view('pages.home',compact('loaisp','nsx','slider','all_product'));
    }
    //Login+Logout
    public function login(){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        // $data=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        // ->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        // ->join('tbl_chatlieu','tbl_sanpham.MaChatLieu','=','tbl_chatlieu.MaChatLieu')
        // ->orderby('MaSP','asc')->get();
        $all_product=DB::table('tbl_sanpham')->orderby('MaSP','asc')->limit(4)->get();
        
        return view('pages.login',compact('loaisp','nsx','slider','all_product'));
    }
    public function login_Trangchu(Request $request){
        $user_name = $request->input('username');
        $user_password = md5($request->input('userpassword'));
        $result = DB::table('tbl_nguoidung')->where('TenDangNhap', $user_name)->where('MatKhau', $user_password)->first();
        if ($result) {
            Session::put('user_name', $result->TenNguoiDung);
            Session::put('user_id', $result->MaNguoiDung);
            return Redirect::to('/trang-chu');
        } else {
            $alert = 'Tài khoản hoặc mật khẩu không đúng!';
            return redirect()->back()->with('alert', $alert);
        }
    }
    public function logout_user(){
        Session::put('user_name', null);
        Session::put('user_id', null);
        return Redirect::to('/login');
    }
    //Đăng kí tài khoản
    public function register(){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        // $data=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        // ->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        // ->join('tbl_chatlieu','tbl_sanpham.MaChatLieu','=','tbl_chatlieu.MaChatLieu')
        // ->orderby('MaSP','asc')->get();
        $all_product=DB::table('tbl_sanpham')->orderby('MaSP','asc')->limit(4)->get();
        
        return view('pages.register',compact('loaisp','nsx','slider','all_product'));
    }
    public function dangkitaikhoan(Request $request){   
        $taikhoan=$request->input('username');
        $matkhau=$request->input('userpassword');
        $nhaplaimatkhau=$request->input('reuserpassword');
        $checkusername=DB::table('tbl_nguoidung')->where('TenDangNhap',$taikhoan)->first();
        if($checkusername){
            $alert='Tài khoản đã tồn tại!';
            return redirect()->back()->with('alert', $alert);
        }else{
            if($matkhau!=$nhaplaimatkhau){
            $alert='Mật khẩu không trùng khớp!';
            return redirect()->back()->with('alert', $alert);
            }else{
                Session::put('TaiKhoan',$taikhoan);
                Session::put('MatKhau',$matkhau);
                $loaisp=DB::table('tbl_loaisp')->get();
                $nsx=DB::table('tbl_nsx')->get();
                $slider=DB::table('tbl_slider')->get();
                return view('pages.dangkithongtin',compact('loaisp','nsx','slider'));
            }
        }

    }
    public function dangkithongtin(Request $request){
        $data=[];
        $data['TenNguoiDung']=$request->input('usname');
        $data['Email']=$request->input('usemail');
        $data['SoDienThoai']=$request->input('usphone');
        $data['MaQuyen']=2;
        $data['TenDangNhap']=Session::get('TaiKhoan');
        $data['MatKhau']=md5(Session::get('MatKhau'));
        DB::table('tbl_nguoidung')->insert($data);
        $alert='Tạo tài khoản thành công!';
        return Redirect::to('/login')->with('alert', $alert);
    }
    public function help(){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        $ttch=DB::table('tbl_ttch')->get()->first();
        return view('pages.help',compact('ttch','loaisp','nsx','slider'));
    }
    public function infor(){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        $ttch=DB::table('tbl_ttch')->get()->first();
        return view('pages.information',compact('ttch','loaisp','nsx','slider'));
    }
    public function show_category_home($MaLoai){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        $category_by_id=DB::table('tbl_sanpham')->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        ->where('tbl_sanpham.MaLoai',$MaLoai)->orderby('MaSP','asc')
        ->select('MaSP','TenSP','DonGiaBan','TenLoai','Anh')
        ->paginate(6);
        $tenloai=DB::table('tbl_loaisp')->where('MaLoai',$MaLoai)->first();
        return view('pages.category.show_category',compact('loaisp','nsx','slider','category_by_id','tenloai'));
    }
    public function show_brand_home($MaNSX){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        $category_by_id=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        ->where('tbl_sanpham.MaNSX',$MaNSX)->orderby('MaSP','asc')
        ->select('MaSP','TenSP','DonGiaBan','TenNSX','tbl_sanpham.Anh as AnhSP')
        ->paginate(6);
        $tennsx=DB::table('tbl_nsx')->where('MaNSX',$MaNSX)->first();
        return view('pages.category.show_brand',compact('loaisp','nsx','slider','category_by_id','tennsx'));
    }
    public function search(Request $request){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        $ten=$request->ten;
        $category_by_id=DB::table('tbl_sanpham')
        ->where('tbl_sanpham.TenSP','like','%'.$ten.'%')->orderby('MaSP','asc')
        ->select('MaSP','TenSP','DonGiaBan','Anh')
        ->paginate(6);
        return view('pages.category.search',compact('loaisp','nsx','slider','category_by_id'));
    }
    public function details_product($MaSP){
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        $data=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        ->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        ->join('tbl_chatlieu','tbl_sanpham.MaChatLieu','=','tbl_chatlieu.MaChatLieu')
        ->where('MaSP',$MaSP)
        ->orderby('MaSP','asc')
        ->select('MaSP','TenSP','DonGiaBan','tbl_sanpham.Anh as AnhSP','MoTa','TenNSX','TenLoai','TenChatLieu','KhuyenMai')->first();
        $anhbotro=DB::table('tbl_anhbotro')->where('MaSP',$MaSP)->get();
        $kichthuoc=DB::table('tbl_kichthuoc')->where('MaSP',$MaSP)->get();
        $maxsize=0;
        if(count($kichthuoc)==1){

        }else{
            foreach($kichthuoc as $key){
                if($key->DuongKinh>$maxsize){
                    $maxsize=$key->DuongKinh;
                }
            }
        }
        $fisrtsize=DB::table('tbl_kichthuoc')->where('MaSP',$MaSP)->first();
        $valfisrtsize=$fisrtsize->SoLuong;
        $tt=DB::table('tbl_sanpham')->where('MaSP',$MaSP)->first();
        $sptt=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        ->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        ->join('tbl_chatlieu','tbl_sanpham.MaChatLieu','=','tbl_chatlieu.MaChatLieu')
        ->where('MaSP','!=',$MaSP)->where('tbl_sanpham.MaNSX',$tt->MaNSX)->where('tbl_sanpham.MaChatLieu',$tt->MaChatLieu)
        ->where('tbl_sanpham.MaLoai',$tt->MaLoai)
        ->select('MaSP','TenSP','DonGiaBan','tbl_sanpham.Anh as AnhSP','MoTa','TenNSX','TenLoai','TenChatLieu','KhuyenMai')->limit(4)->get();
        return view('pages.product.show_details',compact('loaisp','nsx','slider','data','anhbotro','kichthuoc','sptt','maxsize','valfisrtsize'));

    } 
    public function getCountSize(Request $request){
    $count=DB::table('tbl_kichthuoc')
    ->where('MaSP',$request->MaSP)
    ->where('DuongKinh',$request->DuongKinh)
    ->select('SoLuong')
    ->get();
      return $count;
    }
}
