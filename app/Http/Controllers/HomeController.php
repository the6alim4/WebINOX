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
        $tt=DB::table('tbl_sanpham')->where('MaSP',$MaSP)->first();
        $sptt=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        ->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        ->join('tbl_chatlieu','tbl_sanpham.MaChatLieu','=','tbl_chatlieu.MaChatLieu')
        ->where('MaSP','!=',$MaSP)->where('tbl_sanpham.MaNSX',$tt->MaNSX)->where('tbl_sanpham.MaChatLieu',$tt->MaChatLieu)
        ->where('tbl_sanpham.MaLoai',$tt->MaLoai)
        ->select('MaSP','TenSP','DonGiaBan','tbl_sanpham.Anh as AnhSP','MoTa','TenNSX','TenLoai','TenChatLieu','KhuyenMai')->limit(4)->get();
        return view('pages.product.show_details',compact('loaisp','nsx','slider','data','anhbotro','kichthuoc','sptt'));

    } 
}
