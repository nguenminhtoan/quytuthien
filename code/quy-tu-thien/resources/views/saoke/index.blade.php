@extends('layouts.layout_home')
@section('content')
<div class="container">
    <!-- Content
================================================== -->
    <div class="main-content">
        <!-- Begin Article
================================================== -->
        <div class="row">
            <div class="col-sm-4 sp-hidden">
                <div class="sidebar">
                    <div class="sidebar-section">
                        <h5><span>{{$detail->HOTEN}}</span></h5>

                        <ul style="list-none">
                            <li>
                                <div class="meta-footer-thumb">
                                    <img class="author-thumb-sigin" src="{{"/storage".$detail->PATH}}" alt="{{$detail -> HOTEN}}">
                                </div>
                            </li>
                            <li>Được quyên gớp: <a href="" class="price">{{number_format($detail -> SOTIEN)."đ"}}</a></li>
                            <li>Người tham gia: {{number_format($detail -> SONGUOI)}}</li>
                            <li>Tiếp nhận: {{date("Y/m/d" ,strtotime($detail -> BATDAU))}} đến {{date("Y/m/d" ,strtotime($detail -> KETTHUC))}}</li>
                            @foreach($detail->TAIKHOAN as $item)
                            <li>
                                Tài khoản tiếp nhận: 
                                <ul>
                                    
                                    <li>Ngân hàng: {{$item["NGANHANG"]}}</li>
                                    <li>Số TK: {{$item["MA_TAIKHOAN"]}} </li>
                                    <li>Chủ sở hữu: {{$item["HOTEN"]}}</li>
                                </ul>
                            </li>
                            @endforeach
                            <li>Điện thoại: {{$detail -> DT}}</li>
                            <li>Địa chỉ: {{$detail -> DIACHI}}</li>
                            <li>Ghi chú: {{$detail -> GHICHU}}</li>
                        </ul>
                        <a href="/sao-ke/{{$detail -> ID_TUTHIEN}}" class="btn btn-primary mb-2">Sao kê</a>
                        <a href="/quyen-gop/{{$detail -> ID_TUTHIEN}}" class="btn btn-success mb-2">Đóng gớp</a>
                    </div>
                    <div class="sidebar-section">
                        <h5><span>Hoạt động cứu trợ</span></h5>
                        <ul style="list-none">
                            <li>Khoản chi: <a href="" class="price">{{number_format($detail -> TONGCHI)."đ"}}</a></li>
                            <li>Đã cứu trợ: {{ number_format($detail->TONGHTRO) }}</li>
                            <li>Thời gian: {{date("Y/m/d" ,strtotime($detail -> BATDAUHD))}} đến {{date("Y/m/d" ,strtotime($detail -> KETTHUCHD))}}</li>
                        </ul>
                        <a href="/hoat-dong/{{$detail -> ID_TUTHIEN}}" class="btn btn-primary">Chi tiết hoạt động</a>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-sm-8">
                <div class="mainheading">
                    <!-- Post Categories -->
                    <!-- End Categories -->
                    <!-- Post Title -->
                    <h1 class="posttitle">Quyên góp cho bà con vùng lũ</h1>
                </div>
                
                <!-- Post Featured Image -->
                <div class="article-post">
                    <table class="table">
                        <thead>
                            <th>Tài khoản</th>
                            <th>Người đóng gớp</th>
                            <th>Số tiền</th>
                        </thead>
                        <tbody>
                            @foreach($list as $item)
                            <tr>
                                <td>{{ substr_replace($item->TAIKHOAN, "*******",0,6) }}</td>
                                <td>{{ $item->TEN }}</td>
                                <td>{{ number_format($item->SOTIEN) }}đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $list->links("paginate") }}
                <!-- End Prev/Next -->
                <!-- Author Box -->
                <div class="row post-top-meta">
                    <div class="col-md-2">
                        <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal">
                    </div>
                    <div class="col-md-10">
                        <a target="_blank" class="link-dark" href="#">Nhóm phát triển</a>
                        <span class="author-description">Thông tin bạn cung cấp được chúng tôi sử dụng với mục đích thống kê các khoản đóng gớp tạo tính minh bạch, Thông tin tài khoản và chủ sở hữu sẽ được bảo mật tuyệt đối</span>
                    </div>
                </div>
                <!-- Begin Comments
================================================== -->
                <!--End Comments
                ================================================== -->
            </div>
            <div class="col-sm-4 pc-hidden">
                <div class="sidebar-right">
                    <div class="sidebar">
                        <div class="sidebar-section">
                            <h5><span>{{$detail->HOTEN}}</span></h5>

                            <ul style="list-none">
                                <li>
                                    <div class="meta-footer-thumb">
                                        <img class="author-thumb-sigin" src="{{$detail->PATH}}" alt="{{$detail -> HOTEN}}">
                                    </div>
                                </li>
                                <li>Được quyên gớp: <a href="" class="price">{{number_format($detail -> SOTIEN)."đ"}}</a></li>
                                <li>Người tham gia: {{number_format($detail -> SONGUOI)}}</li>
                                <li>Tiếp nhận: {{date("Y/m/d" ,strtotime($detail -> BATDAU))}} đến {{date("Y/m/d" ,strtotime($detail -> KETTHUC))}}</li>
                                @foreach($detail->TAIKHOAN as $item)
                                <li>
                                    Tài khoản tiếp nhận: 
                                    <ul>

                                        <li>Ngân hàng: {{$item["NGANHANG"]}}</li>
                                        <li>Số TK: {{$item["MA_TAIKHOAN"]}} </li>
                                        <li>Chủ sở hữu: {{$item["HOTEN"]}}</li>
                                    </ul>
                                </li>
                                @endforeach
                                <li>Điện thoại: {{$detail -> DT}}</li>
                                <li>Địa chỉ: {{$detail -> DIACHI}}</li>
                                <li>Ghi chú: {{$detail -> GHICHU}}</li>
                            </ul>
                            <a href="/sao-ke/{{$detail -> ID_TUTHIEN}}" class="btn btn-primary mb-2">Sao kê</a>
                            <a href="/quyen-gop/{{$detail -> ID_TUTHIEN}}" class="btn btn-success mb-2">Đóng gớp</a>
                        </div>
                        <div class="sidebar-section">
                            <h5><span>Hoạt động cứu trợ</span></h5>
                            <ul style="list-none">
                                <li>Khoản chi: <a href="" class="price">{{number_format($detail -> TONGCHI)."đ"}}</a></li>
                                <li>Đã cứu trợ: {{ number_format($detail->TONGHTRO) }}</li>
                                <li>Thời gian: {{date("Y/m/d" ,strtotime($detail -> BATDAUHD))}} đến {{date("Y/m/d" ,strtotime($detail -> KETTHUCHD))}}</li>
                            </ul>
                            <a href="/hoat-dong/{{$detail -> ID_TUTHIEN}}" class="btn btn-primary">Chi tiết hoạt động</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Post -->

            <!-- End Post -->
        </div>
        <!-- End Article
================================================== -->
    </div>
</div>
@endsection
