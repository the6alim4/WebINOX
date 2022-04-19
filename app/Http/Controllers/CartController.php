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
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        print_r($data);
    }
}
