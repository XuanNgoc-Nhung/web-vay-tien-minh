@extends("user.layouts.app")
@section("title")
    <title>Ví</title>
    <style>
        .el-dialog__body {
            padding-top: 0 !important;
            text-align: center
        }

        .el-dialog__wrapper.thongBaoRutTien {
            margin: 0 auto;
        }
    </style>
@endsection
@section("content")
    <div id="app">
        <div style="padding-bottom: 80px;">
            <vi-tien :cskh="'{{$linkCSKH}}'"></vi-tien>
            @include('user.layouts.chan-trang')
        </div>
    </div>
@endsection
@section("js_location")
    <script src="{{asset('js/user-vi-tien.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
@endsection
