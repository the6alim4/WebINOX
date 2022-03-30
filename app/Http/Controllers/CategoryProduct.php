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
        $datasp=[];
        $dataanhbotro=[];
        $addanhbotro=[];
        $datakichthuoc=[];
        $addkt=[];
        $makt=0;
        $datasp['TenSP']=$request->category_product_name;
        $datasp['DonGiaNhap']=$request->dongianhap;
        $datasp['DonGiaBan']=$request->dongiaban;
        $datasp['Anh']='storage/app/img/'.($request->file('anhchinhsanpham')->getClientOriginalName());
        $datasp['MoTa']=$request->motasanpham;
        $datasp['MaNSX']=$request->nsx;
        $datasp['MaLoai']=$request->loaisanpham;
        $datasp['MaChatLieu']=$request->chatlieu;
        $datasp['KhuyenMai']=$request->giamgia;
        $anhbotro=[];
        $soluong=[10];
        $request->file('anhchinhsanpham')->storeAs('img',$request->file('anhchinhsanpham')->getClientOriginalName());
        if($request->file('anhphusanpham')!=null)
        {
            foreach($request->file('anhphusanpham') as $i){         
                $i->storeAs('img',$i->getClientOriginalName());
            }
            for($j=0;$j<count($request->file('anhphusanpham'));$j++){
                $anhbotro[$j]='storage/app/img/'.($request->file('anhphusanpham'))[$j]->getClientOriginalName();        
                }
        }
        
        
        DB::table('tbl_sanpham')->insert($datasp);
        $masp=DB::table('tbl_sanpham')->where('TenSP',$request->category_product_name)->first();
        $maspmoi=$masp->MaSP;
        $soluong[0]=$request->c16;
        $soluong[1]=$request->c18;
        $soluong[2]=$request->c20;
        $soluong[3]=$request->c22;
        $soluong[4]=$request->c24;
        $soluong[5]=$request->c26;
        $soluong[6]=$request->c28;
        $soluong[7]=$request->c30;
        $soluong[8]=$request->c32;
        $soluong[9]=$request->khac;
        $datakichthuoc['SoLuong']=$soluong;
        $dataanhbotro['Anhbotro']=$anhbotro;
        if($anhbotro!=null){
            for ($k = 0; $k < count($anhbotro); $k++) {
                $addanhbotro[] = [
                    'Anhbotro' => $anhbotro[$k],
                    'MaSP' => $maspmoi
                ];
            }
            DB::table('tbl_anhbotro')->insert($addanhbotro);
        }
        
        for ($l = 0; $l < count($soluong); $l++) {
            if($soluong[$l]==0||$soluong[$l]==null){
                continue;
            }else{
                switch($l){
                    case '0':
                        $makt=16;
                        break;
                    case '1':
                        $makt=18;
                        break;
                    case '2':
                        $makt=20;
                        break;
                    case '3':
                        $makt=22;
                        break;
                    case '4':
                        $makt=24;
                        break;
                    case '5':
                        $makt=26;
                        break;
                    case '6':
                        $makt=28;
                        break;
                    case '7':
                        $makt=30;
                        break;
                    case '8':
                        $makt=32;
                        break;
                    case '9':
                        $makt=null;
                        break;
                }
                $addkt[] = [
                    'Duongkinh' => $makt,
                    'MaSP' => $maspmoi,
                    'SoLuong'=>$soluong[$l]
                ]; 
            }
            
        }
        DB::table('tbl_kichthuoc')->insert($addkt);
        Session::put('message','Thêm danh mục sản phẩm thành công!');
        return Redirect::to('add-category-product');

    }
}
