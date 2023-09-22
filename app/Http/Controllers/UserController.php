<?php

namespace App\Http\Controllers;

use App\rutTien;
use App\thongTinCaNhan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Hash;

class UserController extends Controller
{
    public function getHome()
    {
        return view('user.home');
    }

    public function getDangKy()
    {
        return view('user.dang-ky');
    }

    public function getDangNhap()
    {
        return view('user.dang-nhap');
    }

    public function getPageHoSo()
    {
        $profile = thongTinCaNhan::where('user_id', Auth::user()->id)->first();
        return view('user.ho-so', compact('profile'));
    }

    public function getBankInfo()
    {
        $admin = User::where('role',2)->first();
        $config = thongTinCaNhan::where('user_id',$admin->id)->first();
        return view('user.bank-info',compact('config'));
    }

    public function getUserInfo()
    {
        $profile = thongTinCaNhan::where('user_id', Auth::user()->id)->first();
        return view('user.user-info', compact('profile'));
    }

    public function getDangKyKhoanVay()
    {
        return view('user.dang-ky-khoan-vay');
    }

    public function getXacMinhThongTin()
    {
        return view('user.xac-minh');
    }

    public function getXacMinhThongTinCaNhan()
    {
        return view('user.xac-minh-thong-tin-ca-nhan');
    }

    public function getXacMinhThongTinNganHang()
    {
        return view('user.xac-minh-thong-tin-ngan-hang');
    }

    public function getHoanTatXacMinh()
    {
        return view('user.hoan-tat-xac-minh');
    }

    public function getXacNhanKhoanVay()
    {
        return view('user.xac-nhan-khoan-vay');
    }

    public function getVayThanhCong()
    {
        return view('user.vay-thanh-cong');
    }

    public function getViTien()
    {
        return view('user.vi-tien');
    }

    public function getThongBao()
    {
        return view('user.thong-bao');
    }

    public function getBienDongSoDu()
    {
        return view('user.bien-dong-so-du');
    }

    public function getHopDongVay()
    {
        return view('user.hop-dong-vay');
    }
    public function rutTienCaNhan(){
        $profile = thongTinCaNhan::where('user_id',Auth::user()->id)->first();
        if($profile->so_du==0){
            $res = [
                'rc' => '1',
                'rd' => Auth::user()->thong_bao,
            ];
        }else{
            if(Auth::user()->status!=1){
                $res = [
                    'rc' => '-1',
                    'rd' => Auth::user()->thong_bao,
                ];
            }else{
                $dataCreat = rutTien::create([
                    'user_id' => Auth::user()->id,
                    'so_tien' => $profile->so_du,
                ]);
                $profile->so_du = 0;
                $profile->save();
                $res = [
                    'rc' => '0',
                    'data'=>$dataCreat,
                    'rd' => 'Yêu cầu rút tiền thành công. Vui lòng đợi admin phê duyệt',
                ];
            }
        }
        return json_encode($res);

    }

    public function dangXuat(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function getThongTinCaNhan()
    {
        $thongTin = thongTinCaNhan::where('user_id', Auth::user()->id)->with('thongTinTaiKhoan')->first();
        if (isset($thongTin)) {
            $res = [
                'rc' => '0',
                'rd' => 'Lấy thông tin thành công',
                'data' => $thongTin
            ];
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Không tìm thấy tài khoản',
            ];
        }
        return json_encode($res);
    }

    public function xacMinhThongTinNganHang(Request $request)
    {

        $profile = thongTinCaNhan::where('user_id', Auth::user()->id)->first();
        if ($profile) {
            $profile->ngan_hang = $request->nganHang;
            $profile->so_tai_khoan = $request->soTaiKhoan;
            $profile->chu_tai_khoan = $request->chuTaiKhoan;
            $profile->save();
            $res = [
                'rc' => '0',
                'rd' => 'Cập nhật thành công',
                'data' => $profile
            ];
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Tài khoản đã có khoản vay',
            ];
        }
        return json_encode($res);
    }

    public function xacMinhThongTinCaNhan(Request $request)
    {

        $profile = thongTinCaNhan::where('user_id', Auth::user()->id)->first();
        if ($profile) {
            $profile->ho_ten = $request->hoTen;
            $profile->cmnd = $request->cccd;
            $profile->gioi_tinh = $request->gioiTinh;
            $profile->ngay_sinh = $request->ngaySinh;
            $profile->nghe_nghiep = $request->ngheNghiep;
            $profile->thu_nhap = $request->thuNhap;
            $profile->muc_dich_vay = $request->mucDichVay;
            $profile->dia_chi = $request->diaChi;
            $profile->sdt_nguoi_than = $request->sdtNguoiThan;
            $profile->moi_quan_he = $request->mqhNguoiThan;
            $profile->save();
            $res = [
                'rc' => '0',
                'rd' => 'Cập nhật thành công',
                'data' => $profile
            ];
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Tài khoản đã có khoản vay',
            ];
        }
        return json_encode($res);
    }

    public function getXacMinhThongTinHinhAnh(Request $request)
    {
        Log::info('Xác minh thông tin hình ảnh:');
        $req = $request->all();
        $filePathHinhAnhMatTruoc = null;
        $filePathHinhAnhMatSau = null;
        $filePathHinhAnhChanDung = null;
        if ($request->file('matTruoc')) {
            $hinhAnhMatTruoc = $request->file('matTruoc');
            $filePathHinhAnhMatTruoc = '/images/xacMinh/' . uniqid() . '.' . $hinhAnhMatTruoc->extension();
            $hinhAnhMatTruoc->move(public_path('images/xacMinh'), $filePathHinhAnhMatTruoc);
        }
        if ($request->file('matSau')) {
            $hinhAnhMatSau = $request->file('matSau');
            $filePathHinhAnhMatSau = '/images/xacMinh/' . uniqid() . '.' . $hinhAnhMatSau->extension();
            $hinhAnhMatSau->move(public_path('images/xacMinh'), $filePathHinhAnhMatSau);
        }
        if ($request->file('chanDung')) {
            $hinhAnhChanDung = $request->file('chanDung');
            $filePathHinhAnhChanDung = '/images/xacMinh/' . uniqid() . '.' . $hinhAnhChanDung->extension();
            $hinhAnhChanDung->move(public_path('images/xacMinh'), $filePathHinhAnhChanDung);
        }
        $profile = thongTinCaNhan::where('user_id', Auth::user()->id)->first();
        if ($profile) {
            $profile->anh_mat_truoc = $filePathHinhAnhMatTruoc;
            $profile->anh_mat_sau = $filePathHinhAnhMatSau;
            $profile->anh_chan_dung = $filePathHinhAnhChanDung;
            $profile->save();
            $res = [
                'rc' => '0',
                'rd' => 'Cập nhật thành công',
                'data' => $profile
            ];
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Tài khoản đã có khoản vay',
            ];
        }
        return json_encode($res);
    }
    public function checkDangKyKhoanVay(){
        $check = thongTinCaNhan::where('user_id', Auth::user()->id)->first();
        if (isset($check)&&$check->so_tien_vay>0) {
            $res = [
                'rc' => '-1',
                'rd' => 'Lỗi! Số điện thoại đã được đăng ký',
                'data' => $check
            ];
        } else {
            $res = [
                'rc' => '0',
            ];
        }
        return json_encode($res);
    }

    public function luuThongTinChuKy(Request $request){
        $check = thongTinCaNhan::where('user_id', Auth::user()->id)->first();
        if($check){
            $check->chu_ky = $request->chuKy;
            $check->save();
            $res = [
                'rc' => '0',
                'data' => $check,
                'rd' => 'Xác nhận chữ ký thành công',
            ];

        }else{
            $res = [
                'rc' => '-1',
                'rd' => 'Hệ thống bận. Vui lòng thử lại sau ít phút.',
            ];
        }
        return json_encode($res);
    }
    public function dangKySoTienVay(Request $request)
    {
        Log::info('Đăng ký số tiền vay');
        $req = $request->all();
        $check = thongTinCaNhan::where('user_id', Auth::user()->id)->first();
        if (isset($check)) {
            if($check->so_tien_vay>0){
                $res = [
                    'rc' => '-1',
                    'rd' => 'Lỗi! Số điện thoại đã được đăng ký',
                    'data' => $check
                ];
            }else{
                $check->so_tien_vay = $req['soTien'];
                $check->thoi_han_vay = $req['thoiHan'];
                $check->lai_suat = $req['laiSuat'];
                $check->tra_moi_ky = $req['traMoiKy'];
                $check->save();
                $res = [
                    'rc' => '0',
                    'data' => $check,
                    'rd' => 'Đăng ký khoản vay thành công',
                ];

            }
        } else {
            $dataCreat = thongTinCaNhan::create([
                'user_id' => Auth::user()->id,
                'so_tien_vay' => $req['soTien'],
                'thoi_han_vay' => $req['thoiHan'],
                'lai_suat' => $req['laiSuat'],
                'tra_moi_ky' => $req['traMoiKy'],
            ]);
            $res = [
                'rc' => '0',
                'data' => $dataCreat,
                'rd' => 'Đăng ký khoản vay thành công',
            ];
        }
        return json_encode($res);
    }

    public function dangNhapTaiKhoan(Request $request)
    {
        $credentials = array(
            'phone' => $request->phone,
            'password' => $request->pass
        );
        $auth = Auth::attempt($credentials);
        if ($auth) {
            $res = [
                'rc' => '0',
                'rd' => 'Đăng nhập thành công',
                'data' => $auth
            ];
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Tài khoản hoặc mật khẩu không chính xác ',
            ];
        }
        return json_encode($res);

    }

    public function dangKyTaiKhoan(Request $request)
    {
        Log::info('Đăng ký tài khoản:');
        $check = User::where('phone', $request->phone)->count();
        $res = null;
        if ($check >= 1) {
            Log::info('Đã có tài khoản đăng đăng ký với sđt trên');
            $res = [
                'rc' => '1',
                'rd' => 'Số điện thoại đã được sử dụng',
            ];
        } else {
            Log::info('Tiến hành đăng ký');
            $newMember = User::create([
                'phone' => $request->phone,
                'name' => $request->phone,
                'status' => 1,
                'password' => Hash::make($request->pass)
            ]);
            $credentials = array(
                'phone' => $request->phone,
                'password' => $request->pass
            );
            $auth = Auth::attempt($credentials);
            if ($auth) {
                $newProfile = thongTinCaNhan::create([
                    'user_id' => Auth::user()->id,
                ]);
                Log::info('Đăng nhập thành công');
                $res = [
                    'rc' => '0',
                    'rd' => 'Đăng ký thành công',
                    'data' => $auth,
                ];
            }
        }
        return json_encode($res);
    }
}
