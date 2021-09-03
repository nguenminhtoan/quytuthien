@extends('layouts.layout_home')
@section('content')

<div class="container">
    <!-- Content (replace with your e-mail address below)
    ================================================== -->
    <div class="main-content">
        <section>
            <div class="section-title">
                <h2><span>Gây quỹ từ thiện công khai</span></h2>
            </div>
            <div class="article-post">
                <form action="gay-quy" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Hình ảnh dại diện</label>
                            <input class="form-control" type="file" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Tên quỹ từ thiện</label>
                            <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Ngày bắt đầu</label>
                            <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>
                        <div class="col-md-6">
                            <label>Ngày kết thúc</label>
                            <input class="form-control" type="email" name="_replyto" placeholder="E-mail Address">
                        </div>
                    </div>
                    <div class="section-title">
                        <h2><span>Thông tin ngân hàng tiếp nhận quyên gớp</span></h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="name" placeholder="Tên ngân hàng">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="name" placeholder="Tài khoản">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="email" name="_replyto" placeholder="Chủ sở hữu">
                        </div>
                        <div class="col-md-1">
                            <button>Thêm</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="email" name="_replyto" placeholder="E-mail Address">
                        </div>
                    </div>
                    <textarea rows="8" class="form-control mb-3" name="message" placeholder="Message"></textarea>
                    <input class="btn btn-success" type="submit" value="Send">
                </form>
            </div>
        </section>
    </div>
</div>
<!-- /.container -->
@endsection
