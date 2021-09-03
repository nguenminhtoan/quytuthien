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
                            @foreach ($list as $item)
                            <li><a href="#">{{$item -> PHUTRACH}}</a></li>
                            @endforeach
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
                                <img class="img-fluid" src="{{$item->HINHANH}}" alt="{{$item->TENQUY}}">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="/tu-thien/{{$item->ID_TUTHIEN}}">{{$item->ID_TUTHIEN}}</a></h2>
                                <h4 class="card-text">{!! substr(strip_tags($item->MOTA), 0, 200) !!}...</h4>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&d=mm&r=x" alt="Sal">
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name"><a target="_blank" href="#">{{$item -> PHUTRACH}}</a></span><br/>
                                            <span class="post-date">{{date("Y/m/d" ,strtotime($item -> BATDAU))}}</span>
                                        </span>
                                        <span class="post-read-more"><a href="/quyen-gop/{{$item -> ID_TUTHIEN}}" title="Chi tiết {{$item->TENQUY}}"><i class="fa fa-link"></i></a></span>
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
                            <span class="page-number"> &nbsp; &nbsp; Page 1 of 1 &nbsp; &nbsp; </span>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection