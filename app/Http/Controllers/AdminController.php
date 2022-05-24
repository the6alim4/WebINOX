<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Middleware\FrameGuard;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

session_start();
class AdminController extends Controller
{
    //
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id) {           
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        $thang=Carbon::now()->month;
        $nam=Carbon::now()->year;
        $sodonhang=DB::select('select * from tbl_hoadonban where  MONTH(NgayTao)='.$thang.' AND YEAR(NgayTao)='.$nam.' AND TrangThai !=5 AND TrangThai !=6');
        $tongdonhang=count($sodonhang);
        $tongdoanhthu=0;
        $soview=DB::table('tbl_view')
        ->whereMonth('NgayDangNhap',$thang)
        ->whereYear('NgayDangNhap',$nam)
        ->get();
        foreach($sodonhang as $key){
            $tongdoanhthu+=$key->TongTien;
        }
        $view=count($soview);
        $spbanchay=DB::select('SELECT TenSP,tbl_chitiethdb.MaSP MaS,COUNT(tbl_chitiethdb.MaSP) total FROM tbl_chitiethdb
        join tbl_sanpham on tbl_chitiethdb.MaSP=tbl_sanpham.MaSP
        join tbl_hoadonban on tbl_chitiethdb.MaHDB=tbl_hoadonban.MaHDB
        where MONTH(NgayTao)='.$thang.' AND YEAR(NgayTao)='.$nam.' AND TrangThai !=5 AND TrangThai !=6
        GROUP BY tbl_chitiethdb.MaSP
        ORDER BY total DESC
        LIMIT 5');
        $tongsp=DB::table('tbl_chitiethdb')
        ->join('tbl_hoadonban','tbl_hoadonban.MaHDB','=','tbl_chitiethdb.MaHDB')
        ->whereMonth('NgayTao',$thang)
        ->whereYear('NgayTao',$nam)
        ->where('TrangThai','!=',5)
        ->where('TrangThai','!=',6)
        ->get();
        $tongsosp=count($tongsp);
        $t1=DB::table('tbl_hoadonban')->whereMonth('NgayTao',1)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t2=DB::table('tbl_hoadonban')->whereMonth('NgayTao',2)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t3=DB::table('tbl_hoadonban')->whereMonth('NgayTao',3)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t4=DB::table('tbl_hoadonban')->whereMonth('NgayTao',4)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t5=DB::table('tbl_hoadonban')->whereMonth('NgayTao',5)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t6=DB::table('tbl_hoadonban')->whereMonth('NgayTao',6)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t7=DB::table('tbl_hoadonban')->whereMonth('NgayTao',7)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t8=DB::table('tbl_hoadonban')->whereMonth('NgayTao',8)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t9=DB::table('tbl_hoadonban')->whereMonth('NgayTao',9)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t10=DB::table('tbl_hoadonban')->whereMonth('NgayTao',10)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t11=DB::table('tbl_hoadonban')->whereMonth('NgayTao',11)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $t12=DB::table('tbl_hoadonban')->whereMonth('NgayTao',12)->where('TrangThai','!=',5)->where('TrangThai','!=',6)->whereYear('NgayTao',$nam)->get();
        $donhang=[];        
        $donhang[0]=count($t1);
        $donhang[1]=count($t2);
        $donhang[2]=count($t3);
        $donhang[3]=count($t4);
        $donhang[4]=count($t5);
        $donhang[5]=count($t6);
        $donhang[6]=count($t7);
        $donhang[7]=count($t8);
        $donhang[8]=count($t9);
        $donhang[9]=count($t10);
        $donhang[10]=count($t11);
        $donhang[11]=count($t12);
        $doanhthu=[];
        $dt1=0;$dt2=0;$dt3=0;$dt4=0;$dt5=0;$dt6=0;$dt7=0;$dt8=0;$dt9=0;$dt10=0;$dt11=0;$dt12=0;
        foreach($t1 as $key){
            $dt1+=$key->TongTien;
        }
        foreach($t2 as $key){
            $dt2+=$key->TongTien;
        }   
        foreach($t3 as $key){
            $dt3+=$key->TongTien;
        }   
        foreach($t4 as $key){
            $dt4+=$key->TongTien;
        }   
        foreach($t5 as $key){
            $dt5+=$key->TongTien;
        }   
        foreach($t6 as $key){
            $dt6+=$key->TongTien;
        }   
        foreach($t7 as $key){
            $dt7+=$key->TongTien;
        }   
        foreach($t8 as $key){
            $dt8+=$key->TongTien;
        }   
        foreach($t9 as $key){
            $dt9+=$key->TongTien;
        }   
        foreach($t10 as $key){
            $dt10+=$key->TongTien;
        }   
        foreach($t11 as $key){
            $dt11+=$key->TongTien;
        }   
        foreach($t12 as $key){
            $dt12+=$key->TongTien;
        }           
        $doanhthu[0]=$dt1;
        $doanhthu[1]=$dt2;
        $doanhthu[2]=$dt3;
        $doanhthu[3]=$dt4;
        $doanhthu[4]=$dt5;
        $doanhthu[5]=$dt6;
        $doanhthu[6]=$dt7;
        $doanhthu[7]=$dt8;
        $doanhthu[8]=$dt9;
        $doanhthu[9]=$dt10;
        $doanhthu[10]=$dt11;
        $doanhthu[11]=$dt12;
        
        return view('admin.dashboard',compact('tongdonhang','tongdoanhthu','view','spbanchay','tongsosp','donhang','doanhthu'));
    }
    public function dashboard(Request $request)
    {
        $admin_name = $request->input('admin_user');
        $admin_password = md5($request->input('admin_pass'));
        $result = DB::table('tbl_nguoidung')->where('TenDangNhap', $admin_name)->where('MatKhau', $admin_password)->where('MaQuyen','!=','2')->first();
        if ($result) {
            Session::put('admin_name', $result->TenNguoiDung);
            Session::put('admin_id', $result->MaNguoiDung);
            Session::put('quyen', $result->MaQuyen);
            return Redirect::to('/dashboard');
        } else {
            $alert = 'Tài khoản hoặc mật khẩu không đúng!';
            return redirect()->back()->with('alert', $alert);
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
    //Quản lý đơn hàng
    //Đơn hàng chờ xác nhận
    public function donhangcho(){
        $this->AuthLogin();
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('TrangThai',1)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        return view('admin.bill.donhangcho',compact('bills'));
    }
    public function deletebill($MaHDB){
        $this->AuthLogin();
        $data=[];
        $data['TrangThai']=5;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        $sanpham=DB::table('tbl_chitiethdb')->where('MaHDB',$MaHDB)->get();
        foreach($sanpham as $key){
            $kichthuoc=$key->DuongKinh;
            if($kichthuoc==0){
                $kichthuoc=Null;
            }
            $soluong=DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->first();
            $soluong=$soluong->SoLuong;
            $soluongmua=$key->SoLuong;
            $soluong=$soluong+$soluongmua;
            $data1=[];
            $data1['SoLuong']=$soluong;
            DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->update($data1);
        }
        Session::put('message','Hủy đơn hàng thành công!');
        return Redirect::to('/don-hang-cho');
    }
    public function confirmbill($MaHDB){
        $this->AuthLogin();
        $data=[];
        $data['TrangThai']=2;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        Session::put('message','Xác nhận đơn hàng thành công!');
        return Redirect::to('/don-hang-cho');
    }
    public function detailbill($MaHDB){
        $this->AuthLogin();
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $mand=$infor->MaNguoiDung;
        $countbill=DB::table('tbl_hoadonban')->where('MaNguoiDung',$mand)->get();
        $tilebomhang=0;
        if(count($countbill)>1){
            $countbillbom=DB::table('tbl_hoadonban')
            ->where('MaNguoiDung',$mand)
            ->where('TrangThai',5)
            ->get();
            $tilebomhang=round(100*count($countbillbom)/count($countbill),1);
        }
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        return view('admin.bill.detail',compact('infor','sp','tilebomhang'));
    }
    //Đơn hàng đã xác nhận
    public function donhangxacnhan(){
        $this->AuthLogin();
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('TrangThai',2)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        return view('admin.bill.donhangxacnhan',compact('bills'));
    }
    public function transportbill($MaHDB){
        $this->AuthLogin();
        $data=[];
        $data['TrangThai']=3;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        Session::put('message','Đơn hàng đã bắt đầu được vận chuyển!');
        return Redirect::to('/don-hang-xac-nhan');
    }
    public function deleteconfirmedbill($MaHDB){
        $this->AuthLogin();
        $data=[];
        $data['TrangThai']=5;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        $sanpham=DB::table('tbl_chitiethdb')->where('MaHDB',$MaHDB)->get();
        foreach($sanpham as $key){
            $kichthuoc=$key->DuongKinh;
            if($kichthuoc==0){
                $kichthuoc=Null;
            }
            $soluong=DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->first();
            $soluong=$soluong->SoLuong;
            $soluongmua=$key->SoLuong;
            $soluong=$soluong+$soluongmua;
            $data1=[];
            $data1['SoLuong']=$soluong;
            DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->update($data1);
        }
        Session::put('message','Hủy đơn hàng thành công!');
        return Redirect::to('/don-hang-xac-nhan');
    }
    public function detailconfirmedbill($MaHDB){
        $this->AuthLogin();
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        return view('admin.bill.detailconfirm',compact('infor','sp'));
    }
    //Đơn hàng đang giao
    public function donhangdanggiao(){
        $this->AuthLogin();
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('TrangThai',3)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        return view('admin.bill.donhangdanggiao',compact('bills'));
    }
    public function finishbill($MaHDB){
        $this->AuthLogin();
        $data=[];
        $data['TrangThai']=4;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        Session::put('message','Đơn hàng đã vận chuyển thành công!');
        return Redirect::to('/don-hang-dang-giao');
    }
    public function deletetransportingbill($MaHDB){
        $this->AuthLogin();
        $data=[];
        $data['TrangThai']=6;
        DB::table('tbl_hoadonban')->where('MaHDB',$MaHDB)->update($data);
        $sanpham=DB::table('tbl_chitiethdb')->where('MaHDB',$MaHDB)->get();
        foreach($sanpham as $key){
            $kichthuoc=$key->DuongKinh;
            if($kichthuoc==0){
                $kichthuoc=Null;
            }
            $soluong=DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->first();
            $soluong=$soluong->SoLuong;
            $soluongmua=$key->SoLuong;
            $soluong=$soluong+$soluongmua;
            $data1=[];
            $data1['SoLuong']=$soluong;
            DB::table('tbl_kichthuoc')->where('MaSP',$key->MaSP)->where('DuongKinh',$kichthuoc)->update($data1);
        }
        Session::put('message','Đơn hàng giao thất bại!');
        return Redirect::to('/don-hang-dang-giao');
    }
    public function detailtransportingbill($MaHDB){
        $this->AuthLogin();
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        return view('admin.bill.detailtransport',compact('infor','sp'));
    }
    //Đơn hàng đã hoàn thành
    public function donhanghoanthanh(){
        $this->AuthLogin();
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('TrangThai',4)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        return view('admin.bill.donhanghoanthanh',compact('bills'));
    }
    public function detailtransportedbill($MaHDB){
        $this->AuthLogin();
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        return view('admin.bill.detailtransported',compact('infor','sp'));
    }
    //Đơn hàng lưu trữ
    public function donhangluutru(){
        $this->AuthLogin();
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('TrangThai',5)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        return view('admin.bill.donhangluutru',compact('bills'));
    }
    public function detailarchivedbill($MaHDB){
        $this->AuthLogin();
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        return view('admin.bill.detailarchived',compact('infor','sp'));
    }
    //Đơn hàng thất bại
    public function donhangthatbai(){
        $this->AuthLogin();
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('TrangThai',6)
        ->orderby('MaHDB','desc')
        ->paginate(5);
        return view('admin.bill.donhangthatbai',compact('bills'));
    }
    public function detailfailedbill($MaHDB){
        $this->AuthLogin();
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        return view('admin.bill.detailfailed',compact('infor','sp'));
    }
    //Voucher
    public function gdthemvoucher(){
        $this->AuthLogin();
        return view('admin.voucher.gdthemvoucher');
    }
    public function themvoucher(Request $request){
        $this->AuthLogin();
        $data=[];
        $data['MaKM']=$request->macode;
        $data['GiamGia']=$request->giamgia;
        $data['SoLuongCon']=$request->soluong;
        $data['NgayBatDau']=$request->ngaybd;
        $data['NgayKetThuc']=$request->ngaykt;
        DB::table('tbl_khuyenmai')->insert($data);
        Session::put('message','Thêm mới voucher thành công!');
        return redirect()->back();
    }
    //voucher dang dien ra
    public function gdvoucherdanghd(){
        $this->AuthLogin();
        $voucher=DB::select('SELECT * from tbl_khuyenmai where CURDATE() BETWEEN NgayBatDau and NgayKetThuc');
        $voucher = $this->paginate($voucher,2);
        $voucher->path('WebINOX/giao-dien-voucher-danghd/');
        return view('admin.voucher.gdvoucherdanghd',compact('voucher'));
    }
    public function paginate($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total=count($items);
        $currentpage=$page;
        $offset=($currentpage*$perPage)-$perPage;
        $itemstoshow=array_slice($items,$offset,$perPage);
        return new LengthAwarePaginator($itemstoshow,$total,$perPage);
    }
    public function gdsuavoucherdanghd($IDKM){
        $this->AuthLogin();
        $voucher=DB::table('tbl_khuyenmai')
        ->where('IDKM',$IDKM)->first();
        return view('admin.voucher.gdsuavoucherdanghd',compact('voucher'));

    }
    
    public function suavoucherdanghd($IDKM,Request $request){
        $data=[];
        $data['MaKM']=$request->macode;
        $data['GiamGia']=$request->giamgia;
        $data['SoLuongCon']=$request->soluong;
        $data['NgayBatDau']=$request->ngaybd;
        $data['NgayKetThuc']=$request->ngaykt;
        DB::table('tbl_khuyenmai')->where('IDKM',$IDKM)->update($data);
        Session::put('message','Thêm mới voucher thành công!');
        return redirect()->back();
    }

    //voucher da het han
    public function gdvoucherdahh(){
        $this->AuthLogin();
        $voucher=DB::select('SELECT * from tbl_khuyenmai where CURDATE()'.'>'.'NgayKetThuc');
        $voucher = $this->paginate($voucher,2);
        $voucher->path('WebINOX/giao-dien-voucher-dahh/');
        return view('admin.voucher.gdvoucherdahh',compact('voucher'));
    }
    public function gdsuavoucherdahh($IDKM){
        $this->AuthLogin();
        $voucher=DB::table('tbl_khuyenmai')
        ->where('IDKM',$IDKM)->first();
        return view('admin.voucher.gdsuavoucherdahh',compact('voucher'));

    }
    public function suavoucherdahh($IDKM,Request $request){
        $data=[];
        $data['MaKM']=$request->macode;
        $data['GiamGia']=$request->giamgia;
        $data['SoLuongCon']=$request->soluong;
        $data['NgayBatDau']=$request->ngaybd;
        $data['NgayKetThuc']=$request->ngaykt;
        DB::table('tbl_khuyenmai')->where('IDKM',$IDKM)->update($data);
        Session::put('message','Thêm mới voucher thành công!');
        return redirect()->back();
    }

    //voucher sap dien ra
    public function gdvouchersapco(){
        $this->AuthLogin();
        $voucher=DB::select('SELECT * from tbl_khuyenmai where CURDATE()'.'<'.'NgayBatDau');
        $voucher = $this->paginate($voucher,2);
        $voucher->path('WebINOX/giao-dien-voucher-sapco/');
        return view('admin.voucher.gdvouchersapco',compact('voucher'));
    }
    public function gdsuavouchersapco($IDKM){
        $this->AuthLogin();
        $voucher=DB::table('tbl_khuyenmai')
        ->where('IDKM',$IDKM)->first();
        return view('admin.voucher.gdsuavouchersapco',compact('voucher'));

    }
    public function suavouchersapco($IDKM,Request $request){
        $data=[];
        $data['MaKM']=$request->macode;
        $data['GiamGia']=$request->giamgia;
        $data['SoLuongCon']=$request->soluong;
        $data['NgayBatDau']=$request->ngaybd;
        $data['NgayKetThuc']=$request->ngaykt;
        DB::table('tbl_khuyenmai')->where('IDKM',$IDKM)->update($data);
        Session::put('message','Thêm mới voucher thành công!');
        return redirect()->back();
    }
    //thống kê tháng
    //views
    public function gotoview(){
        $this->AuthLogin();
        $thang=Carbon::now()->month;
        $nam=Carbon::now()->year;
        $soview=DB::table('tbl_view')
        ->whereMonth('NgayDangNhap',$thang)
        ->whereYear('NgayDangNhap',$nam)
        ->paginate(5);
        return view('admin.gotoview',compact('soview'));
    }
    //bill
    public function gotobill(){
        $this->AuthLogin();
        $thang=Carbon::now()->month;
        $nam=Carbon::now()->year;
        $sodonhang=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.manguoidung')
        ->whereMonth('NgayTao',$thang)
        ->whereYear('NgayTao',$nam)
        ->where('TrangThai','!=','5')
        ->where('TrangThai','!=','6')
        ->paginate(5);
        return view('admin.gotobill',compact('sodonhang'));
    }
    public function gotodetailbill($MaHDB){
        $this->AuthLogin();
        $infor=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('MaHDB',$MaHDB)->first();
        $mand=$infor->MaNguoiDung;
        $countbill=DB::table('tbl_hoadonban')->where('MaNguoiDung',$mand)->get();
        $tilebomhang=0;
        if(count($countbill)>1){
            $countbillbom=DB::table('tbl_hoadonban')
            ->where('MaNguoiDung',$mand)
            ->where('TrangThai',5)
            ->get();
            $tilebomhang=round(100*count($countbillbom)/count($countbill),1);
        }
        $sp=DB::table('tbl_chitiethdb')
        ->join('tbl_sanpham','tbl_sanpham.MaSP','=','tbl_chitiethdb.MaSP')
        ->where('MaHDB',$MaHDB)
        ->select('TenSP','Anh','DuongKinh','SoLuong','tbl_chitiethdb.DonGiaBan as DonGia','ThanhTien')
        ->get();
        return view('admin.gotodetailbill',compact('infor','sp','tilebomhang'));
    }
    //tke ngay
    public function tkengay(Request $request){
        $this->AuthLogin();
        $ngay=$request->ngaytk;
        $view=DB::table('tbl_view')
        ->where('NgayDangNhap',$ngay)->get();
        $soview=count($view);
        if($soview<1){
            $soview=0;
        }
        $donhang=DB::table('tbl_hoadonban')
        ->where('NgayTao',$ngay)
        ->where('TrangThai','!=',5)
        ->where('TrangThai','!=',6)
        ->get();
        $sodonhang=count($donhang);
        if($sodonhang<1){
            $sodonhang=0;
        }
        $doanhthu=0;
        if($sodonhang>0){
            foreach($donhang as $key){
                $doanhthu+=$key->TongTien;
            }
        }
        $data=[];
        $data[0]=$soview;
        $data[1]=$sodonhang;
        $data[2]=$doanhthu;
        $data[3]=$ngay;
        return $data;
    }
    public function chitietviewngay($NgayTK){
        $this->AuthLogin();
        $ngaytk=$NgayTK;
        $views=DB::table('tbl_view')
        ->where('NgayDangNhap',$ngaytk)
        ->paginate(5);
        return view('admin.chitietviewngay',compact('views','ngaytk'));  
    }
    public function chitietbillngay($NgayTK){
        $this->AuthLogin();
        $ngaytk=$NgayTK;
        $bills=DB::table('tbl_hoadonban')
        ->join('tbl_nguoidung','tbl_nguoidung.MaNguoiDung','=','tbl_hoadonban.MaNguoiDung')
        ->where('NgayTao',$ngaytk)
        ->where('TrangThai','!=',5)
        ->where('TrangThai','!=',6)
        ->paginate(5);
        return view('admin.chitietbillngay',compact('bills','ngaytk'));  
    }
}
