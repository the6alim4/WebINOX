<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    //
    public function add_category_product(){
        $resultnsx = DB::table('tbl_nsx')->get();
        $resultchatlieu = DB::table('tbl_chatlieu')->get();
        $resultloaisp = DB::table('tbl_loaisp')->get();   
        $nsx=[];
        $mansx=[];
        $loaisp=[];
        $maloaisp=[];
        $chatlieu=[];
        $machatlieu=[];
        $i=0;$j=0;$k=0;
        for($i;$i<count($resultnsx);$i++){
        $nsx[$i]=$resultnsx[$i]->TenNSX;
        $mansx[$i]=$resultnsx[$i]->MaNSX;
        }
        for($j;$j<count($resultchatlieu);$j++){
        $chatlieu[$j]=$resultchatlieu[$j]->TenChatLieu;
        $machatlieu[$j]=$resultchatlieu[$j]->MaChatLieu;
        }
        for($k;$k<count($resultloaisp);$k++){
        $loaisp[$k]=$resultloaisp[$k]->TenLoai;
        $maloaisp[$k]=$resultloaisp[$k]->MaLoai;
        }
        Session::put('tennsx',$nsx); 
        Session::put('mansx',$mansx); 
        Session::put('tenchatlieu',$chatlieu); 
        Session::put('machatlieu',$machatlieu); 
        Session::put('tenloaisp',$loaisp); 
        Session::put('maloaisp',$maloaisp); 
        return view('admin.add_category_product');

    }
    public function all_category_product(){
        return view('admin.all_category_product');
        
    }
    public function save_category_product(Request $request){
        $data['TenSP']=$request->category_product_name;
        $data['DonGiaNhap']=$request->dongianhap;
        $data['DonGiaBan']=$request->dongiaban;
        $data['Anh']='storage/app/img/'.($request->file('anhchinhsanpham')->getClientOriginalName());
        $data['MoTa']=$request->motasanpham;
        $data['MaNSX']=$request->nsx;
        $data['MaLoai']=$request->loaisanpham;
        $data['MaChatLieu']=$request->chatlieu;
        $anhbotro='';
        $request->file('anhchinhsanpham')->storeAs('img',$request->file('anhchinhsanpham')->getClientOriginalName());
        foreach($request->file('anhphusanpham') as $i){         
            $i->storeAs('img',$i->getClientOriginalName());
        }
        foreach($request->file('anhphusanpham') as $j){
        $anhbotro=$anhbotro.'__'.'storage/app/img/'.($j->getClientOriginalName());
        
        }
        $data['Anhbotro']=$anhbotro;

    }
}
