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
                                    <div class="thumbnail" style="background-image:url('{{$item->HINHANH}}');">
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
                                                <img class="author-thumb" src="https://www.gravatar.com/avatar/b1cc14991db7a456fcd761680bbc8f81?s=250&d=mm&r=x" alt="John">
                                            </span>
                                            <span class="author-meta">
                                                <span class="post-name">{{$item -> PHUTRACH}}</span><br/>
                                                <span class="post-date">{{date("Y/m/d" ,strtotime($item -> BATDAU))}}</span>
                                            </span>
                                            <span class="post-read-more"><a href="/quyen-gop/{{$item -> ID_TUTHIEN}}" title="Read Story">Đóng gớp</a></span>
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
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none">
                                        </div>
                                        <div class="response" id="mce-success-response" style="display:none">
                                        </div>
                                    </div>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                        <input type="text" name="b_8aeb20a530e124561927d3bd8_8c3d2d214b" tabindex="-1" value="">
                                    </div>
                                    <div class="clear">
                                        <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">Đăng ký</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script type='text/javascript' src='https://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                        <script type='text/javascript'>(function ($) {
                                window.fnames = new Array();
                                window.ftypes = new Array();
                                fnames[0] = 'EMAIL';
                                ftypes[0] = 'email';
                                fnames[3] = 'MMERGE3';
                                ftypes[3] = 'text';
                                fnames[1] = 'MMERGE1';
                                ftypes[1] = 'text';
                                fnames[2] = 'MMERGE2';
                                ftypes[2] = 'text';
                                fnames[4] = 'MMERGE4';
                                ftypes[4] = 'text';
                                fnames[5] = 'MMERGE5';
                                ftypes[5] = 'text';
                            }(jQuery));
                            var $mcj = jQuery.noConflict(true);</script>
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
                    <div class="col-md-6 grid-item">
                        <div class="card">
                            <a href="single.html">
                                <img class="img-fluid" src="assets/images/2.jpg" alt="Tree of Codes">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="single.html">Tree of Codes</a></h2>
                                <h4 class="card-text">The first mass-produced book to deviate from a rectilinear format, at least in the United States, is thought to be this 1863 edition of Red Riding Hood, cut into the...</h4>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&d=mm&r=x" alt="Sal">
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name"><a target="_blank" href="#">Sal</a></span><br/>
                                            <span class="post-date">12 Jan 2018</span>
                                        </span>
                                        <span class="post-read-more"><a href="single.html" title="Read Story"><i class="fa fa-link"></i></a></span>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->
                    <!-- begin post -->
                    <div class="col-md-6 grid-item">
                        <div class="card">
                            <a href="single.html">
                                <img class="img-fluid" src="assets/images/3.jpg" alt="Red Riding Hood">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="single.html">Red Riding Hood</a></h2>
                                <h4 class="card-text">The first mass-produced book to deviate from a rectilinear format, at least in the United States, is thought to be this 1863 edition of Red Riding Hood, cut into the...</h4>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&d=mm&r=x" alt="Sal">
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name"><a target="_blank" href="#">Sal</a></span><br/>
                                            <span class="post-date">12 Jan 2018</span>
                                        </span>
                                        <span class="post-read-more"><a href="single.html" title="Read Story"><i class="fa fa-link"></i></a></span>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->
                    <!-- begin post -->
                    <div class="col-md-6 grid-item">
                        <div class="card">
                            <a href="single.html">
                                <img class="img-fluid" src="assets/images/5.jpg" alt="Is Intelligence Enough">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="single.html">Is Intelligence Enough</a></h2>
                                <h4 class="card-text">Education must also train one for quick, resolute and effective thinking. To think incisively and to think for one’s self is very difficult. </h4>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&d=mm&r=x" alt="Sal">
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name"><a target="_blank" href="#">Sal</a></span><br/>
                                            <span class="post-date">12 Jan 2018</span>
                                        </span>
                                        <span class="post-read-more"><a href="single.html" title="Read Story"><i class="fa fa-link"></i></a></span>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->
                    <!-- begin post -->
                    <div class="col-md-6 grid-item">
                        <div class="card">
                            <a href="single.html">
                                <img class="img-fluid" src="assets/images/6.jpg" alt="Markdown Example">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="single.html">Markdown Example</a></h2>
                                <h4 class="card-text">You’ll find this post in your _posts directory. Go ahead and edit it and re-build the site to see your changes. You can rebuild the site in many different ways,...</h4>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <img class="author-thumb" src="https://www.gravatar.com/avatar/b1cc14991db7a456fcd761680bbc8f81?s=250&d=mm&r=x" alt="John">
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name"><a target="_blank" href="#">John</a></span><br/>
                                            <span class="post-date">11 Jan 2018</span>
                                        </span>
                                        <span class="post-read-more"><a href="single.html" title="Read Story"><i class="fa fa-link"></i></a></span>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->
                </div>
                <!-- Pagination -->
                <div class="bottompagination">
                    <div class="navigation">
                        <nav class="pagination">
                            <span class="page-number"> &nbsp; &nbsp; Trang 1 của 1 &nbsp; &nbsp; </span>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
