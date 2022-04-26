<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Http\Middleware\FrameGuard;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    //
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_name = $request->input('admin_user');
        $admin_password = md5($request->input('admin_pass'));
        $result = DB::table('tbl_nguoidung')->where('TenDangNhap', $admin_name)->where('MatKhau', $admin_password)->where('MaQuyen','!=','2')->first();
        if ($result) {
            Session::put('admin_name', $result->TenNguoiDung);
            Session::put('admin_id', $result->MaNguoiDung);
            Session::put('quyen', $result->MaQuyen);
            return Redirect::to('/dashboard');
        } else {
            $alert = 'Tài khoản hoặc mật khẩu không đúng!';
            return redirect()->back()->with('alert', $alert);
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
    //Quản lý đơn hàng
    public function donhangcho(){
        $this->AuthLogin();
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('TrangThai',1)
        ->orderby('MaHDB','asc')
        ->paginate(5);
        return view('admin.bill.donhangcho',compact('bills'));
    }
    public function deletebill($MaHDB){
        $this->AuthLogin();
        $data=[];
        $data['TrangThai']=5;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        Session::put('message','Hủy đơn hàng thành công!');
        return Redirect::to('/don-hang-cho');
    }
    public function confirmbill($MaHDB){
        $this->AuthLogin();
        $data=[];
        $data['TrangThai']=2;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        Session::put('message','Xác nhận đơn hàng thành công!');
        return Redirect::to('/don-hang-cho');
    }
    public function detailbill($MaHDB){
        $this->AuthLogin();
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        return view('admin.bill.detail',compact('infor','sp'));
    }
}
