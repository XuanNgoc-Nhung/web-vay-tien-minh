@extends("admin.layout.app")
@section("title")
    <title>Admin - Quản lý cấu hình</title>
@endsection
@section("content")
    <div>
        <div id="app">
            <quan-ly-cau-hinh/>
        </div>
    </div>
@endsection
@section("js_location")
    <script src="{{asset('js/admin-quan-ly-cau-hinh.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
@endsection
