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
        return view('pages.home',compact('loaisp','nsx'));
    }
}
