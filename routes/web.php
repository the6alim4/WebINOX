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
//Đặt hàng
Route::get('/dat-hang','CartController@dathang');
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
Route::get('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang');
Route::get('/delete-cart/{session_id}','CartController@delete_cart');
//Quản lý đơn hàng admin
//Đơn hàng đang chờ xác nhận
Route::get('/don-hang-cho','AdminController@donhangcho');
Route::get('/delete-bill/{MaHDB}','AdminController@deletebill');
Route::get('/confirm-bill/{MaHDB}','AdminController@confirmbill');
Route::get('/detail-bill/{MaHDB}','AdminController@detailbill');
//Đơn hàng đã xác nhận
Route::get('/don-hang-xac-nhan','AdminController@donhangxacnhan');
Route::get('/delete-confirmed-bill/{MaHDB}','AdminController@deleteconfirmedbill');
Route::get('/transport-bill/{MaHDB}','AdminController@transportbill');
Route::get('/detail-confirmed-bill/{MaHDB}','AdminController@detailconfirmedbill');
//Đơn hàng đang giao
Route::get('/don-hang-dang-giao','AdminController@donhangdanggiao');
Route::get('/finish-bill/{MaHDB}','AdminController@finishbill');
Route::get('/delete-transporting-bill/{MaHDB}','AdminController@deletetransportingbill');
Route::get('/detail-transporting-bill/{MaHDB}','AdminController@detailtransportingbill');
//Đơn hàng đã hoàn thành
Route::get('/don-hang-hoan-thanh','AdminController@donhanghoanthanh');
Route::get('/detail-transported-bill/{MaHDB}','AdminController@detailtransportedbill');
//Đơn hàng lưu trữ
Route::get('/don-hang-luu-tru','AdminController@donhangluutru');
Route::get('/detail-archived-bill/{MaHDB}','AdminController@detailarchivedbill');
//Đơn hàng thất bại
Route::get('/don-hang-that-bai','AdminController@donhangthatbai');
Route::get('/detail-failed-bill/{MaHDB}','AdminController@detailfailedbill');

//Xem đơn hàng user
//Đơn hàng chờ xác nhận
Route::get('/cho-xac-nhan','CartController@choxacnhan');
Route::get('/detail-watiing-bill/{MaHDB}','CartController@detailwaiting');
Route::get('/demolish-bill/{MaHDB}','CartController@demolishbill');
Route::get('/change-address/{MaHDB}','CartController@changeaddress');
Route::post('/change-add','CartController@changeadd');
//Đơn hàng xác nhận
Route::get('/da-xac-nhan','CartController@daxacnhan');
Route::get('/detail-confirmed-invoice/{MaHDB}','CartController@detailconfirmedinvoice');
Route::get('/demolish-confirmed-invoice/{MaHDB}','CartController@demolishconfirmedinvoice');
//Đơn hàng đang giao
Route::get('/dang-giao','CartController@danggiao');
Route::get('/detail-delivering-invoice/{MaHDB}','CartController@detaildeliveringinvoice');
//Đơn hàng đã hoàn thành
Route::get('/da-hoan-thanh','CartController@dahoanthanh');
Route::get('/detail-deliverd-evaluated-invoice/{MaHDB}','CartController@detaildeliveredevaluatedinvoice');
Route::get('/detail-deliverd-notevaluated-invoice/{MaHDB}','CartController@detaildeliverednotevaluatedinvoice');
Route::get('/evaluate/{MaHDB}','CartController@evaluate');

//Voucher
Route::get('/xoa-ss-voucher','CartController@xoavoucher');
Route::get('/giao-dien-them-voucher','AdminController@gdthemvoucher');
Route::post('/them-voucher','AdminController@themvoucher');
Route::get('/giao-dien-voucher-danghd','AdminController@gdvoucherdanghd');






