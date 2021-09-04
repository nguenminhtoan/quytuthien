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
                        <h5><span>Hoạt động cứu trợ</span></h5>
                        <ul style="list-none">
                            <li>Khoản chi: <a href="" class="price">{{number_format($detail -> TONGCHI)."đ"}}</a></li>
                            <li>Đã cứu trợ: {{ number_format($detail->TONGHTRO) }}</li>
                            <li>Thời gian: {{date("Y/m/d" ,strtotime($detail -> BATDAUHD))}} đến {{date("Y/m/d" ,strtotime($detail -> KETTHUCHD))}}</li>
                        </ul>
                        <a href="/hoat-dong/{{$detail -> ID_TUTHIEN}}" class="btn btn-primary">Chi tiết hoạt động</a>
                    </div>
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
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-sm-8">
                <div class="section-title">
                    <h2><span>Các hoạt cứu trợ đã diễn ra</span></h2>
                </div>
                <div class="masonrygrid row listrecent">
                    @foreach ($list as $item)
                    <div class="col-md-6 grid-item">
                        <div class="card">
                            <a href="/hoat-dong/chi-tiet/{{$item -> ID_HOATDONG}}">
                                <img class="img-fluid" src="{{"/storage".$item->PATH}}" alt="{{$item->TEN}}">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="/hoat-dong/chi-tiet/{{$item -> ID_HOATDONG}}">{{$item->TEN}}</a></h2>
                                <h4 class="card-text">{!! substr(strip_tags($item->MOTA), 0, 200) !!}...</h4>
                                <h6>Tổng chi tiêu hoạt động {{number_format($item->SOTIEN)}}đ</h6>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <img class="author-thumb" src="{{"/storage".($item->HINHANH ?? '/image/user/user.jpg')}}" alt="Sal">
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name">{{$item -> HOTEN}}</a></span><br/>
                                            <span class="post-date">{{date("Y/m/d" ,strtotime($item -> BATDAU))}}</span>
                                        </span>
                                        <span class="post-read-more"><a href="/hoat-dong/chi-tiet/{{$item -> ID_HOATDONG}}" title="Chi tiết {{$item->TEN}}">Chi tiết</a></span>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="bottompagination">
                    <div class="navigation">
                        <nav class="pagination">
                            <span class="page-number"> &nbsp; &nbsp; Trang {{$list->currentPage()}} của {{$list->lastPage()}} &nbsp; &nbsp; </span>
                        </nav>
                    </div>
                </div>
                {{ $list->links("paginate") }}
            </div>
            <div class="col-sm-4 pc-hidden">
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
            <!-- Post -->

            <!-- End Post -->
        </div>
        <!-- End Article
================================================== -->
    </div>
</div>
<!-- /.container -->
@endsection