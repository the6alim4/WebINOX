<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::get('/help','HomeController@help');
Route::get('/infor','HomeController@infor');
//User
Route::get('/login','HomeController@login');
Route::post('/login-trang-chu','HomeController@login_Trangchu');
Route::get('/logout-user','HomeController@logout_user');
Route::get('/register','HomeController@register');
Route::post('/dang-ki-tai-khoan','HomeController@dangkitaikhoan');
Route::post('/dang-ki-thong-tin','HomeController@dangkithongtin');
Route::get('/thong-tin-ca-nhan','HomeController@thongtincanhan');
Route::post('/cap-nhat-thong-tin','HomeController@capnhatthongtin');
Route::get('/update-mat-khau','HomeController@updatematkhau');
Route::post('/cap-nhat-mat-khau','HomeController@capnhatmatkhau');

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{MaLoai}','HomeController@show_category_home');
Route::get('/thuong-hieu-san-pham/{MaNSX}','HomeController@show_brand_home');
Route::get('/tim-kiem','HomeController@search');

//Chi tiet san pham
Route::get('/chi-tiet-san-pham/{MaSP}','HomeController@details_product');


//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Product
Route::get('/add-product','CategoryProduct@add_product');
Route::get('/edit-product/{MaSP}','CategoryProduct@edit_product');
Route::post('/update-product/{MaSP}','CategoryProduct@update_product');
Route::get('/delete-product/{MaSP}','CategoryProduct@delete_product');
Route::get('/all-product','CategoryProduct@all_product');
Route::post('/save-product','CategoryProduct@save_product');
//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{MaLoai}','CategoryProduct@edit_category_product');
Route::post('/update-category-product/{MaLoai}','CategoryProduct@update_category_product');
Route::get('/delete-category-product/{MaLoai}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
//Brand
Route::get('/add-brand','CategoryProduct@add_brand');
Route::get('/edit-brand/{MaNSX}','CategoryProduct@edit_brand');
Route::post('/update-brand/{MaNSX}','CategoryProduct@update_brand');
Route::get('/delete-brand/{MaNSX}','CategoryProduct@delete_brand');
Route::get('/all-brand','CategoryProduct@all_brand');
Route::post('/save-brand','CategoryProduct@save_brand');
//Cart
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang');
Route::get('/delete-cart/{session_id}','CartController@delete_cart');
