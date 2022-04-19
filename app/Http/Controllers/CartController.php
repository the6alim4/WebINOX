<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    //
    public function save_cart(Request $request){
        $MaSP=$request->masp;
        $quantity=$request->quantity;
        $size=$request->size;
        $loaisp=DB::table('tbl_loaisp')->get();
        $nsx=DB::table('tbl_nsx')->get();
        $slider=DB::table('tbl_slider')->get();
        $data= DB::table('tbl_sanpham')->where('MaSP',$MaSP)->get();
        return view('pages.cart.show_cart',compact('loaisp','nsx','slider','data',));
    }
}
