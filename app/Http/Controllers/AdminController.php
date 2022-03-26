<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $admin_password = $request->input('admin_pass');
        $result = DB::table('tbl_nguoidung')->where('TenDangNhap', $admin_name)->where('MatKhau', $admin_password)->where('MaQuyen', '1')->first();
        if ($result) {
            return view('admin.dashboard');
        } else {
            $alert = 'Tài khoản hoặc mật khẩu không đúng!';
            return redirect()->back()->with('alert', $alert);
        }
    }
}
