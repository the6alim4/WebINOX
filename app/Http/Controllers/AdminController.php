<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_name = $request->input('admin_user');
        $admin_password = md5($request->input('admin_pass'));
        $result = DB::table('tbl_nguoidung')->where('TenDangNhap', $admin_name)->where('MatKhau', $admin_password)->where('MaQuyen', '1')->first();
        if ($result) {
            Session::put('admin_name',$result->TenNguoiDung);
            Session::put('admin_id',$result->MaNguoiDung);
            return Redirect::to('/dashboard');
        } else {
            $alert = 'Tài khoản hoặc mật khẩu không đúng!';
            return redirect()->back()->with('alert', $alert);
        }
    }
    public function logout()
    {
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
