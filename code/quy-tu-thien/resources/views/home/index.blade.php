@extends('layouts.layout_home')
@section('content')
<section class="intro">
    <div class="wrapintro">
        <h1>Quỹ từ thiện công khai</h1>
        <h2 class="lead">Công khai trong từng hoạt động</h2>
    </div>
</section>
<div class="container">
    <div class="main-content">
        <section class="featured-posts">
            <div class="section-title">
                <h2><span>Nổi bật</span></h2>
            </div>
            <div class="row listfeaturedtag">
                @foreach ($listhost as $item)
                <!-- begin post -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-5 wrapthumbnail">
                                <a href="/tu-thien/{{$item->ID_TUTHIEN}}">
                                    <div class="thumbnail" style="background-image:url('{{"/storage".$item->HINHANH}}');">
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-block">
                                    <h2 class="card-title"><a href="/tu-thien/{{$item->ID_TUTHIEN}}">{{$item -> TENQUY}}</a></h2>
                                    <h4 class="card-text">{!! substr(strip_tags($item->MOTA), 0, 230) !!}...</h4>
                                    <h6>Được quyên gớp: {{number_format($item -> SOTIEN)."đ"}}</h6>
                                    <h6>Người tham gia: {{number_format($item -> SONGUOI)}}</h6>
                                    <div class="metafooter">
                                        <div class="wrapfooter">
                                            <span class="meta-footer-thumb">
                                                <img class="author-thumb" src="{{'/storage'.$item -> PATH}}" alt="{{$item -> PHUTRACH}}">
                                            </span>
                                            <span class="author-meta">
                                                <span class="post-name">{{$item -> PHUTRACH}}</span><br/>
                                                <span class="post-date">{{date("Y/m/d" ,strtotime($item -> BATDAU))}}</span>
                                            </span>
                                            <span class="post-read-more"><a href="/quyen-gop/{{$item -> ID_TUTHIEN}}" title="Chi tiết{{$item -> TENQUY}}">Đóng gớp</a></span>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end post -->
                @endforeach
            </div>
        </section>
        <!-- Posts Index
        ================================================== -->
        <section class="recent-posts row">
            <div class="col-sm-4">
                <div class="sidebar">
                    <div class="sidebar-section">
                        <h5><span>Nhận thông báo</span></h5>
                        <!-- Go to your Mailchimp account/Lists/Sign Up Forms/Embedded forms and replace the code below with your own  -->
                        <!-- Begin MailChimp Signup Form -->
                        <link href="https://cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                        <div id="mc_embed_signup">
                            <form action="https://wowthemes.us11.list-manage.com/subscribe/post?u=8aeb20a530e124561927d3bd8&amp;id=8c3d2d214b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <h2>Đăng ký để được nhận thông báo các hoạt động thiện nguyện</h2>
                                    <div class="mc-field-group">
                                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Địa chỉ email">
                                    </div>
                                    <div class="clear">
                                        <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">Đăng ký</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End mc_embed_signup-->
                    </div>

                </div>
            </div>
            <div class="col-sm-8">
                <div class="section-title">
                    <h2><span>Tất cả</span></h2>
                </div>
                <div class="masonrygrid row listrecent">
                    <!-- begin post -->
                    @foreach ($list as $item)
                    <div class="col-md-6 grid-item">
                        <div class="card">
                            <a href="/tu-thien/{{$item->ID_TUTHIEN}}">
                                <img class="img-fluid" src="{{"/storage".$item->HINHANH}}" alt="{{$item -> TENQUY}}">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="/tu-thien/{{$item->ID_TUTHIEN}}">{{$item -> TENQUY}}</a></h2>
                                <h4 class="card-text">{!! substr(strip_tags($item->MOTA), 0, 200) !!}...</h4>
                                <h6>Được quyên gớp: {{number_format($item -> SOTIEN)."đ"}}</h6>
                                <h6>Người tham gia: {{number_format($item -> SONGUOI)}}</h6>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <img class="author-thumb" src="{{'/storage'.$item -> PATH}}" alt="{{$item -> PHUTRACH}}">
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name">{{$item -> PHUTRACH}}</span><br/>
                                            <span class="post-date">{{date("Y/m/d" ,strtotime($item -> BATDAU))}}</span>
                                        </span>
                                        <span class="post-read-more"><a href="/quyen-gop/{{$item -> ID_TUTHIEN}}" title="Chi tiết{{$item -> TENQUY}}">Đóng gớp</a></span>
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
