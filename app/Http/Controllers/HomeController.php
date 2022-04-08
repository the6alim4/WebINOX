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
}
