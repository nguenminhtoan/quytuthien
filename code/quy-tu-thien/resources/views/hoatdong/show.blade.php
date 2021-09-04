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
                <div class="mainheading">
                    <!-- Post Categories -->
                    <!-- End Categories -->
                    <!-- Post Title -->
                    <h1 class="posttitle">{{$hoatdong -> TEN}}</h1>
                    <small>
                        <span class="post-date">Bắt đầu <time class="post-date" datetime="{{$detail -> BATDAU}}">{{date('Y/m/d', strtotime($detail -> BATDAU))}}</time></span>
                    </small>
                    <small>
                        <span class="post-date"> đến <time class="post-date" datetime="{{$detail -> KETTHUC}}">{{date('Y/m/d', strtotime($detail -> KETTHUC))}}</time></span>
                    </small>
                </div>
                <!-- Post Featured Image -->
                @foreach($hoatdong->HINHANH as $row)
                <img src="{{'/storage'.$row->PATH}}" />
                @endforeach
                <!-- End Featured Image -->
                <!-- Post Content -->
                <div class="article-post">
                    {!! $hoatdong->MOTA !!}
                    <table class="table">
                        <thead>
                            <th>Tên</th>
                            <th>Chứng từ</th>
                            <th>Số tiền</th>
                        </thead>
                        <tbody>
                        @foreach($hoatdong->CHITIET as $row)
                        <tr>
                            <td>{{$row->TEN}}</td>
                            <td><img src="{{'/storage'.$row->CHUNGTU}}"/></td>
                            <td>{{number_format($row->SOTIEN)}}đ</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2" class="text-right text-bold">Tổng tiền</th>
                            <th>{{number_format($hoatdong->CHITIET->sum("SOTIEN"))}}đ</th>
                        </tr>
                        </tbody>
                    </table>
                    {!!$detail -> MOTA!!}
                    <div class="clearfix">
                    </div>
                </div>
                <!-- Post Date -->
                <!-- Prev/Next -->
                <div class="row PageNavigation mt-4 prevnextlinks">
                    <div class="col-md-6 rightborder pl-0">
                        <a class="thepostlink" href="single.html">« Red Riding Hood</a>
                    </div>
                    <div class="col-md-6 text-right pr-0">
                        <a class="thepostlink" href="single-right-sidebar.html">We all wait for summer »</a>
                    </div>
                </div>
                <!-- End Prev/Next -->
                <!-- Author Box -->
                <div class="row post-top-meta">
                    <div class="col-md-2">
                        <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal">
                    </div>
                    <div class="col-md-10">
                        <a target="_blank" class="link-dark" href="#">Sal</a><a target="_blank" href="https://twitter.com/wowthemesnet" class="btn follow">Follow</a>
                        <span class="author-description">Author of Affiliates, a template available for WordPress, HTML, Ghost and Jekyll. You are currently previewing Jekyll template demo.</span>
                    </div>
                </div>
                <!-- Begin Comments ================================================== -->
                <section>
                    <div id="comments">
                        <section class="disqus">
                            <div id="disqus_thread">
                            </div>
                            <script type="text/javascript">
                                var disqus_shortname = 'demowebsite';
                                var disqus_developer = 0;
                                (function () {
                                    var dsq = document.createElement('script');
                                    dsq.type = 'text/javascript';
                                    dsq.async = true;
                                    dsq.src = window.location.protocol + '//' + disqus_shortname + '.disqus.com/embed.js';
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                })();
                            </script>
                            <noscript>
                            Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                            </noscript>                        
                        </section>
                    </div>
                </section>
                <!--End Comments
                ================================================== -->
            </div>
            <div class="col-sm-4 pc-hidden">
                <div class="sidebar-right">
                    <div class="sidebar">
                        <div class="sidebar-section">
                            <h5><span>Đàm Vĩnh Hưng</span></h5>

                            <ul style="list-none">
                                <li>
                                    <div class="meta-footer-thumb">
                                        <img class="author-thumb-sigin" src="https://www.gravatar.com/avatar/b1cc14991db7a456fcd761680bbc8f81?s=250&amp;d=mm&amp;r=x" alt="John">
                                    </div>
                                </li>
                                <li>Được quyên gớp: <a href="" class="price">21,000,000,000đ</a></li>
                                <li>Người tham gia: 3,000</li>
                                <li>Tiếp nhận: 2021/01/01 đến 2021/10/10</li>
                                <li>
                                    Tài khoản tiếp nhận: 
                                    <ul>
                                        <li>Ngân hàng: TP Bank</li>
                                        <li>Số TK: 01280080001 </li>
                                        <li>Chủ sở hữu: Đàm Vĩnh Hưng</li>
                                    </ul>
                                </li>
                                <li>Điện thoại: 0987654321</li>
                                <li>Địa chỉ: TP. Hồ Chí Minh</li>
                                <li>Ghi chú: Ca sỉ</li>
                            </ul>
                            <button class="btn btn-primary">Sao kê</button>
                            <button class="btn btn-success">Đóng gớp</button>
                        </div>
                        <div class="sidebar-section">
                            <h5><span>Hoạt động cứu trợ</span></h5>
                            <ul style="list-none">
                                <li>Khoản chi: <a href="" class="price">21,000,000,000đ</a></li>
                                <li>Đã cứu trợ: 3,000</li>
                                <li>Thời gian: 2021/01/01 đến 2021/10/10</li>
                            </ul>
                            <button class="btn btn-primary">Chi tiết hoạt động</button>
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
<!-- /.container -->
@endsection