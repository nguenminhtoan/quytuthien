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
                        <h5><span>Đàm Vĩnh Hưng</span></h5>

                        <ul style="list-none;">
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
                        <button class="btn btn-primary mb-2">Sao kê</button>
                        <button class="btn btn-success mb-2">Đóng gớp</button>
                    </div>
                    <div class="sidebar-section">
                        <h5><span>Hoạt động cứu trợ</span></h5>
                        <ul style="list-none;">
                            <li>Khoản chi: <a href="" class="price">21,000,000,000đ</a></li>
                            <li>Đã cứu trợ: 3,000</li>
                            <li>Thời gian: 2021/01/01 đến 2021/10/10</li>
                        </ul>
                        <button class="btn btn-primary">Chi tiết hoạt động</button>
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
                <img class="featured-image img-fluid" src="assets/images/3.jpg" alt="">
                <!-- End Featured Image -->
                <!-- Post Content -->
                <div class="article-post">
                    <p>
                        The first mass-produced book to deviate from a rectilinear format, at least in the United States, is thought to be this 1863 edition of Red Riding Hood, cut into the shape of the protagonist herself with the troublesome wolf curled at her feet. Produced by the Boston-based publisher Louis Prang, this is the first in their “Doll Series”, a set of five “die-cut” books, known also as shape books — the other titles being Robinson Crusoe, Goody Two-Shoes (also written by Red Riding Hood author Lydia Very), Cinderella, and King Winter.
                    </p>
                    <p>
                        As for this particular rendition of Charles Perrault’s classic tale, the text and design is by Lydia Very (1823-1901), sister of Transcendentalist poet Jones Very. The gruesome ending of the original — which sees Little Red Riding Hood being gobbled up as well as her grandmother — is avoided here, the gore giving way to the less bloody aims of the morality tale, and the lesson that one should not disobey one’s mother.
                    </p>
                    <blockquote>
                        <p>
                            It would seem the claim could also extend to die cut books in general, as we can’t find anything sooner, but do let us know in the comments if you have further light to shed on this! Such books are, of course, still popular in children’s publishing today, though the die cutting is not now limited to mere outlines, as evidenced in a beautiful 2014 version of the same Little Red Riding Hood story.
                        </p>
                    </blockquote>
                    <p>
                        An 1868 Prang catalogue would later claim that such “books in the shape of a regular paper Doll… originated with us”.
                    </p>
                    <p>
                        The die cut has also been employed in the non-juvenile sphere as well, a recent example being Jonathan Safran Foer’s ambitious Tree of Codes.
                    </p>
                    <div class="clearfix">
                    </div>
                </div>
                <!-- Post Date -->
                <p>
                    <small>
                        <span class="post-date"><time class="post-date" datetime="2018-01-12">12 Jan 2018</time></span>
                    </small>
                </p>
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
                <!-- Begin Comments
================================================== -->
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

                            <ul style="list-none;">
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
                            <ul style="list-none;">
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