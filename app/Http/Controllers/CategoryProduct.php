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
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    //Product
    public function add_product(){
        $this->AuthLogin();
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
        return view('admin.add_product');

    }
    public function all_product(){
        $this->AuthLogin();
        $data=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        ->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        ->join('tbl_chatlieu','tbl_sanpham.MaChatLieu','=','tbl_chatlieu.MaChatLieu')
        ->orderby('MaSP','asc')
        ->select('MaSP','TenSP','DonGiaNhap','DonGiaBan','tbl_sanpham.Anh','MoTa','TenNSX','TenLoai','TenChatLieu','KhuyenMai')
        ->paginate(5);          
        return view('admin.all_product', compact('data'));
        
    }
    public function save_product(Request $request){
        $this->AuthLogin();
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
        Session::put('message','Thêm sản phẩm thành công!');
        return Redirect::to('add-product');

    }
    public function edit_product($MaSP){
        $this->AuthLogin();
        $sp=DB::table('tbl_sanpham')->join('tbl_nsx','tbl_sanpham.MaNSX','=','tbl_nsx.MaNSX')
        ->join('tbl_loaisp','tbl_sanpham.MaLoai','=','tbl_loaisp.MaLoai')
        ->join('tbl_chatlieu','tbl_sanpham.MaChatLieu','=','tbl_chatlieu.MaChatLieu')
        ->where('MaSP',$MaSP)->first();     
        $anhbotro=DB::table('tbl_anhbotro')->where('MaSP',$MaSP)->get();     
        $kt=DB::table('tbl_kichthuoc')->where('MaSP',$MaSP)->get();
        $chatlieu=DB::table('tbl_chatlieu')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $loai=DB::table('tbl_loaisp')->get();
        return view('admin.edit_product', compact('sp','anhbotro','kt','chatlieu','nsx','loai'));
    }
    public function update_product(Request $request,$MaSP){
        $this->AuthLogin();
        $datasp=[];
        $dataanhbotro=[];
        $addanhbotro=[];
        $datakichthuoc=[];
        $addkt=[];
        $makt=0;
        $datasp['TenSP']=$request->category_product_name;
        $datasp['DonGiaNhap']=$request->dongianhap;
        $datasp['DonGiaBan']=$request->dongiaban;
        if($request->anhchinhsanpham!=null){
        $request->file('anhchinhsanpham')->storeAs('img',$request->file('anhchinhsanpham')->getClientOriginalName());
        $datasp['Anh']='storage/app/img/'.($request->file('anhchinhsanpham')->getClientOriginalName());
        }
        $datasp['MoTa']=$request->motasanpham;
        $datasp['MaNSX']=$request->nsx;
        $datasp['MaLoai']=$request->loaisanpham;
        $datasp['MaChatLieu']=$request->chatlieu;
        $datasp['KhuyenMai']=$request->giamgia;
        $anhbotro=[];
        $soluong=[10];
        if($request->file('anhphusanpham')!=null)
        {
            foreach($request->file('anhphusanpham') as $i){         
                $i->storeAs('img',$i->getClientOriginalName());
            }
            for($j=0;$j<count($request->file('anhphusanpham'));$j++){
                $anhbotro[$j]='storage/app/img/'.($request->file('anhphusanpham'))[$j]->getClientOriginalName();        
                }
        }
        
        
        DB::table('tbl_sanpham')->where('MaSP',$MaSP)->update($datasp);
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
            DB::table('tbl_anhbotro')->where('MaSP',$MaSP)->delete();
            for ($k = 0; $k < count($anhbotro); $k++) {
                $addanhbotro[] = [
                    'Anhbotro' => $anhbotro[$k],
                    'MaSP' => $MaSP
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
                    'MaSP' => $MaSP,
                    'SoLuong'=>$soluong[$l]
                ]; 
            }
            
        }
        DB::table('tbl_kichthuoc')->where('MaSP',$MaSP)->delete();
        DB::table('tbl_kichthuoc')->insert($addkt);
        Session::put('message','Cập nhật sản phẩm thành công!');
        return Redirect::to('all-product');
    }
    public function delete_product($MaSP){
        $this->AuthLogin();
        DB::table('tbl_kichthuoc')->where('MaSP',$MaSP)->delete();
        DB::table('tbl_anhbotro')->where('MaSP',$MaSP)->delete();
        DB::table('tbl_sanpham')->where('MaSP',$MaSP)->delete();
        Session::put('message','Xóa sản phẩm thành công!');
        return Redirect::to('all-product');
    }
    //Category Product
    public function add_category_product(){
        $this->AuthLogin();
        $result = DB::table('tbl_loaisp')->get();       
        return view('admin.add_category_product',compact('result'));
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data=[];       
        $data['TenLoai']=$request->category_product_name;        
        DB::table('tbl_loaisp')->insert($data);       
        Session::put('message','Thêm danh mục sản phẩm thành công!');
        return Redirect::to('add-category-product');

    }
    public function all_category_product(){
        $this->AuthLogin();
        $data=DB::table('tbl_loaisp')
        ->orderby('MaLoai','asc')
        ->paginate(5);          
        return view('admin.all_category_product', compact('data'));
        
    }
    public function edit_category_product($MaLoai){
        $this->AuthLogin();
        $sp=DB::table('tbl_loaisp')
        ->where('MaLoai',$MaLoai)->first();     
        return view('admin.edit_category_product', compact('sp'));
    }
    public function update_category_product(Request $request,$MaLoai){
        $this->AuthLogin();
        $datasp=[];       
        $datasp['TenLoai']=$request->category_product_name;           
        DB::table('tbl_loaisp')->where('Maloai',$MaLoai)->update($datasp);
        Session::put('message','Cập nhật danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($MaLoai){
        $this->AuthLogin();
        DB::table('tbl_loaisp')->where('MaLoai',$MaLoai)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }
    //Brand
    public function add_brand(){
        $this->AuthLogin();
        $result = DB::table('tbl_nsx')->get();       
        return view('admin.add_brand',compact('result'));
    }
    public function save_brand(Request $request){
        $this->AuthLogin();
        $datasp=[];        
        $datasp['TenNSX']=$request->category_product_name;
        $datasp['SDT']=$request->sdt;
        if($request->file('anhnsx')!=null){
            $datasp['Anh']='storage/app/img/'.($request->file('anhnsx')->getClientOriginalName());
            $request->file('anhnsx')->storeAs('img',$request->file('anhnsx')->getClientOriginalName());
        }   
        DB::table('tbl_nsx')->insert($datasp);        
        Session::put('message','Thêm thương hiệu thành công!');
        return Redirect::to('add-brand');

    }
    public function all_brand(){
        $this->AuthLogin();
        $data=DB::table('tbl_nsx')
        ->orderby('MaNSX','asc')
        ->paginate(5);          
        return view('admin.all_brand', compact('data'));
        
    }
    public function edit_brand($MaNSX){
        $this->AuthLogin();
        $sp=DB::table('tbl_nsx')->where('MaNSX',$MaNSX)->first();     
        return view('admin.edit_brand', compact('sp'));
    }
    public function update_brand(Request $request,$MaNSX){
        $this->AuthLogin();
        $datasp=[];       
        $datasp['TenNSX']=$request->category_product_name;
        $datasp['SDT']=$request->sdt;
        if($request->anhnsx!=null){
        $request->file('anhnsx')->storeAs('img',$request->file('anhnsx')->getClientOriginalName());
        $datasp['Anh']='storage/app/img/'.($request->file('anhnsx')->getClientOriginalName());
        }      
        DB::table('tbl_nsx')->where('MaNSX',$MaNSX)->update($datasp);
        Session::put('message','Cập nhật thương hiệu thành công!');
        return Redirect::to('all-brand');
    }
    public function delete_brand($MaNSX){
        $this->AuthLogin();
        DB::table('tbl_nsx')->where('MaNSX',$MaNSX)->delete();
        Session::put('message','Xóa thương hiệu thành công!');
        return Redirect::to('all-brand');
    }
    //End function admin page
    
}
