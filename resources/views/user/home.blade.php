@extends("user.layouts.app")
@section("title")
    <title>Trang chủ</title><!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <!-- import JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
@endsection
@section("content")
    <div id="app">
        <div style="padding-bottom: 80px;">
            <div class="fadein">
                <div class="container" style="padding: 0px !important;">
                    <div class="header-content">
                        <div><span class="ant-typography text-head">Xin chào, </span><br><span
                                class="ant-typography text-head">{{Auth::user()->phone}}</span></div>
                        <div style="margin-left: auto; padding-right: 20px;"><span class="ant-typography text-head">Tổng đài CSKH</span><br><span
                                class="ant-typography text-head">Hotline: 02558888898</span></div>
                        <div>
                            <a href="/thong-bao">
                            <span class="ant-badge">
                                <span role="img" aria-label="bell" class="anticon anticon-bell"
                                      style="font-size: 20px; color: white;">
                                    <svg
                                        viewBox="64 64 896 896" focusable="false" data-icon="bell" width="1em"
                                        height="1em"
                                        fill="currentColor" aria-hidden="true"><path
                                            d="M816 768h-24V428c0-141.1-104.3-257.8-240-277.2V112c0-22.1-17.9-40-40-40s-40 17.9-40 40v38.8C336.3 170.2 232 286.9 232 428v340h-24c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h216c0 61.8 50.2 112 112 112s112-50.2 112-112h216c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM512 888c-26.5 0-48-21.5-48-48h96c0 26.5-21.5 48-48 48z"></path></svg>
                                </span>
                            </span>
                            </a>
                        </div>
                    </div>
                    <div class="noti-text-container"><span
                            class="ant-typography noti-text">096***2 đã rút 40.000.000 đ</span></div>
                    <div style="display: flex; justify-content: center; min-height: 100px;">
                        <div class="ant-image"
                             style="width: 100%; max-width: calc(100% - 40px); height: auto; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                            <img src="/static/media/vay-tin-chap-vpbank.jpg" class="ant-image-img"
                                 style="border-radius: 10px; margin-bottom: 20px;"></div>
                    </div>
                    <a style="cursor: pointer" onclick="checkDangKyKhoanVay()" class="text-center">
                        <button type="button" class="ant-btn ant-btn-default choose-btn"
                                style="margin-top: 20px !important;">
                            <span class="ant-typography"
                                  style="color: rgb(255, 255, 255); font-weight: bold; font-size: 20px;">Đăng ký khoản vay</span>
                        </button>
                    </a>
                    <div style="padding: 20px;">
                        <div
                            style="margin: 10px 0px; display: flex; justify-content: space-between; align-items: center; padding: 7px 15px; border: 1px solid rgb(54, 124, 76); border-radius: 5px;">
                        <span class="ant-typography"
                              style="flex: 1 1 0%; font-size: 16px; color: rgb(54, 124, 76); font-weight: 500;">Thủ tục vay nhanh chóng, đơn giản</span><span
                                role="img" aria-label="alert" class="anticon anticon-alert"
                                style="font-size: 20px; color: rgb(255, 115, 35);"><svg viewBox="64 64 896 896"
                                                                                        focusable="false"
                                                                                        data-icon="alert"
                                                                                        width="1em" height="1em"
                                                                                        fill="currentColor"
                                                                                        aria-hidden="true"><path
                                        d="M512 244c176.18 0 319 142.82 319 319v233a32 32 0 01-32 32H225a32 32 0 01-32-32V563c0-176.18 142.82-319 319-319zM484 68h56a8 8 0 018 8v96a8 8 0 01-8 8h-56a8 8 0 01-8-8V76a8 8 0 018-8zM177.25 191.66a8 8 0 0111.32 0l67.88 67.88a8 8 0 010 11.31l-39.6 39.6a8 8 0 01-11.31 0l-67.88-67.88a8 8 0 010-11.31l39.6-39.6zm669.6 0l39.6 39.6a8 8 0 010 11.3l-67.88 67.9a8 8 0 01-11.32 0l-39.6-39.6a8 8 0 010-11.32l67.89-67.88a8 8 0 0111.31 0zM192 892h640a32 32 0 0132 32v24a8 8 0 01-8 8H168a8 8 0 01-8-8v-24a32 32 0 0132-32zm148-317v253h64V575h-64z"></path></svg></span>
                        </div>
                        <div
                            style="margin: 10px 0px; display: flex; justify-content: space-between; align-items: center; padding: 7px 15px; border: 1px solid rgb(54, 124, 76); border-radius: 5px;">
                        <span class="ant-typography"
                              style="flex: 1 1 0%; font-size: 16px; color: rgb(54, 124, 76); font-weight: 500;">Hạn mức vay lên đến 500 triệu VNĐ</span><span
                                role="img" aria-label="dashboard" class="anticon anticon-dashboard"
                                style="font-size: 20px; color: rgb(0, 143, 80);"><svg viewBox="64 64 896 896"
                                                                                      focusable="false"
                                                                                      data-icon="dashboard" width="1em"
                                                                                      height="1em" fill="currentColor"
                                                                                      aria-hidden="true"><path
                                        d="M924.8 385.6a446.7 446.7 0 00-96-142.4 446.7 446.7 0 00-142.4-96C631.1 123.8 572.5 112 512 112s-119.1 11.8-174.4 35.2a446.7 446.7 0 00-142.4 96 446.7 446.7 0 00-96 142.4C75.8 440.9 64 499.5 64 560c0 132.7 58.3 257.7 159.9 343.1l1.7 1.4c5.8 4.8 13.1 7.5 20.6 7.5h531.7c7.5 0 14.8-2.7 20.6-7.5l1.7-1.4C901.7 817.7 960 692.7 960 560c0-60.5-11.9-119.1-35.2-174.4zM482 232c0-4.4 3.6-8 8-8h44c4.4 0 8 3.6 8 8v80c0 4.4-3.6 8-8 8h-44c-4.4 0-8-3.6-8-8v-80zM270 582c0 4.4-3.6 8-8 8h-80c-4.4 0-8-3.6-8-8v-44c0-4.4 3.6-8 8-8h80c4.4 0 8 3.6 8 8v44zm90.7-204.5l-31.1 31.1a8.03 8.03 0 01-11.3 0L261.7 352a8.03 8.03 0 010-11.3l31.1-31.1c3.1-3.1 8.2-3.1 11.3 0l56.6 56.6c3.1 3.1 3.1 8.2 0 11.3zm291.1 83.6l-84.5 84.5c5 18.7.2 39.4-14.5 54.1a55.95 55.95 0 01-79.2 0 55.95 55.95 0 010-79.2 55.87 55.87 0 0154.1-14.5l84.5-84.5c3.1-3.1 8.2-3.1 11.3 0l28.3 28.3c3.1 3.1 3.1 8.1 0 11.3zm43-52.4l-31.1-31.1a8.03 8.03 0 010-11.3l56.6-56.6c3.1-3.1 8.2-3.1 11.3 0l31.1 31.1c3.1 3.1 3.1 8.2 0 11.3l-56.6 56.6a8.03 8.03 0 01-11.3 0zM846 582c0 4.4-3.6 8-8 8h-80c-4.4 0-8-3.6-8-8v-44c0-4.4 3.6-8 8-8h80c4.4 0 8 3.6 8 8v44z"></path></svg></span>
                        </div>
                        <div
                            style="margin: 10px 0px; display: flex; justify-content: space-between; align-items: center; padding: 7px 15px; border: 1px solid rgb(54, 124, 76); border-radius: 5px;">
                        <span class="ant-typography"
                              style="flex: 1 1 0%; font-size: 16px; color: rgb(54, 124, 76); font-weight: 500;">Nhận tiền chỉ sau 30 phút làm hồ sơ</span><span
                                role="img" aria-label="sliders" class="anticon anticon-sliders"
                                style="font-size: 20px; color: rgb(54, 124, 76);"><svg viewBox="64 64 896 896"
                                                                                       focusable="false"
                                                                                       data-icon="sliders"
                                                                                       width="1em" height="1em"
                                                                                       fill="currentColor"
                                                                                       aria-hidden="true"><path
                                        d="M904 296h-66v-96c0-4.4-3.6-8-8-8h-52c-4.4 0-8 3.6-8 8v96h-66c-4.4 0-8 3.6-8 8v416c0 4.4 3.6 8 8 8h66v96c0 4.4 3.6 8 8 8h52c4.4 0 8-3.6 8-8v-96h66c4.4 0 8-3.6 8-8V304c0-4.4-3.6-8-8-8zm-584-72h-66v-56c0-4.4-3.6-8-8-8h-52c-4.4 0-8 3.6-8 8v56h-66c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8h66v56c0 4.4 3.6 8 8 8h52c4.4 0 8-3.6 8-8v-56h66c4.4 0 8-3.6 8-8V232c0-4.4-3.6-8-8-8zm292 180h-66V232c0-4.4-3.6-8-8-8h-52c-4.4 0-8 3.6-8 8v172h-66c-4.4 0-8 3.6-8 8v200c0 4.4 3.6 8 8 8h66v172c0 4.4 3.6 8 8 8h52c4.4 0 8-3.6 8-8V620h66c4.4 0 8-3.6 8-8V412c0-4.4-3.6-8-8-8z"></path></svg></span>
                        </div>
                    </div>
                    <div style="position: relative; padding-left: 20px; padding-right: 20px;">
                        <div>
                            <div class="owl-carousel owl-theme owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(-1719px, 0px, 0px); transition: all 0.25s ease 0s; width: 4011px;">
                                        <div class="owl-item cloned" style="width: 573px;"><img
                                                src="/images/slider/img1.jpg">
                                        </div>
                                        <div class="owl-item cloned" style="width: 573px;"><img
                                                src="/images/slider/img2.jpg"></div>
                                        <div class="owl-item" style="width: 573px;"><img
                                                src="/images/slider/img3.jpg"></div>
                                        <div class="owl-item active" style="width: 573px;"><img
                                                src="/images/slider/img4.jpg">
                                        </div>
                                        <div class="owl-item" style="width: 573px;"><img
                                                src="/images/slider/img1.jpg"></div>
                                        <div class="owl-item cloned" style="width: 573px;"><img
                                                src="/images/slider/img2.jpg"></div>
                                        <div class="owl-item cloned" style="width: 573px;"><img
                                                src="/images/slider/img3.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: center; min-height: 100px; margin-top: 20px;">
                            <div class="ant-image"
                                 style="width: 100%; max-width: calc(100% - 40px); height: auto; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                                <img src="/static/media/1668013577_banner1.png" class="ant-image-img"
                                     style="border-radius: 10px; margin-bottom: 20px;"></div>
                        </div>
                        <div
                            style="padding-top: 20px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                            <div class="ant-image"><img src="/static/media/tick.e14cb23e178b8d3acd8f.png"
                                                        class="ant-image-img"
                                                        style="max-width: 100px;"></div>
                            <div style="padding: 0px 10px;"><span class="ant-typography"
                                                                  style="display: flex; justify-content: center; align-items: center; color: rgb(85, 85, 85); text-align: center;">
                    CÔNG TY TÀI CHÍNH TÍN VIỆT
                </span></div>
                        </div>
                    </div>
                </div>
                @include('user.layouts.chan-trang')
            </div>
        </div>
        <div role="alert" id="thongBao" class="el-message el-message--error is-closable dts-noty-error"
             style="top: 20px;z-index: 2013;display: none"><i class="el-message__icon el-icon-error"></i>
            <p class="el-message__content">Lỗi! Số điện thoại đã được đăng ký.</p><i class="el-message__closeBtn el-icon-close"></i></div>

        <script>
            function checkDangKyKhoanVay(){
                console.log('checkDangKyKhoanVay')
                let params = {
                }
                console.log('Thông tin giao dịch')
                console.log(params)
                axios.post('/check-dang-ky-khoan-vay', params)
                    .then(function (response) {
                        console.log('thêm giao dịch trả về')
                        console.log(response);
                        if (response.data.rc != 0) {
                            console.log('xacNhanRutTien')
                            $('#thongBao')[0].style.display = 'flex';
                            setTimeout(()=>{
                                $('#thongBao')[0].style.display = 'none';
                            },1500)
                        } else {
                            console.log('Chuyển hướng')
                            window.open('/dang-ky-khoan-vay','_self')
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        </script>
@endsection
