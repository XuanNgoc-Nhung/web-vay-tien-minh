@extends("admin.layout.app")
@section("title")
    <title>Admin - Quản lý thông báo</title>
@endsection
@section("content")
    <div>
        <div id="app">
            <quan-ly-thong-bao/>
        </div>
    </div>
@endsection
@section("js_location")
    <script src="{{asset('js/admin-quan-ly-thong-bao.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
@endsection
