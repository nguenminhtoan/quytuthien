@extends('layouts.layout_home')
@section('content')
<div class="container">
    <div class="main-content">		
        <!-- Category Archive
================================================== -->
        <section class="recent-posts row">
            <div class="col-sm-4">
                <div class="sidebar">
                    <div class="sidebar-section">
                        <h5><span>Người kêu gọi quyên gớp</span></h5>

                        <ul style="list-none">
                            @foreach ($user as $item)
                            <li><a href="/tu-thien/tim-kiem/{{$item -> ID_NGUOIDUNG}}">{{$item -> HOTEN}}</a></li>
                            @endforeach
                            <li><a href="/tu-thien">Tất cả</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="section-title">
                    <h2><span>Các hoạt động từ hiện đang diễn ra</span></h2>
                </div>
                <div class="masonrygrid row listrecent">
                    <!-- begin post -->
                    @foreach ($list as $item)
                    <div class="col-md-6 grid-item">
                        <div class="card">
                            <a href="/tu-thien/{{$item->ID_TUTHIEN}}">
                                <img class="img-fluid" src="{{"/storage".$item->HINHANH}}" alt="{{$item->TENQUY}}">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="/tu-thien/{{$item->ID_TUTHIEN}}">{{$item->TENQUY}}</a></h2>
                                <h4 class="card-text">{!! substr(strip_tags($item->MOTA), 0, 200) !!}...</h4>
                                <h6>Được quyên gớp: {{number_format($item -> SOTIEN)."đ"}}</h6>
                                <h6>Người tham gia: {{number_format($item -> SONGUOI)}}</h6>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <img class="author-thumb" src="{{"/storage".$item->PATH}}" alt="Sal">
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name">{{$item -> PHUTRACH}}</span><br/>
                                            <span class="post-date">{{date("Y/m/d" ,strtotime($item -> BATDAU))}}</span>
                                        </span>
                                        <span class="post-read-more"><a href="/quyen-gop/{{$item -> ID_TUTHIEN}}" title="Chi tiết {{$item->TENQUY}}">Chi tiết</a></span>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end post -->
                    
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
        </section>
    </div>
</div>
@endsection