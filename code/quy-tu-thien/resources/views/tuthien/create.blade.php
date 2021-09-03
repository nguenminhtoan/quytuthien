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
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="name" placeholder="Tên ngân hàng">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="name" placeholder="Tài khoản">
                        </div>
                        <div class="col-md-6">
                            <div class='row'>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" name="_replyto" placeholder="Chủ sở hữu">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="name" placeholder="Tên ngân hàng">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="name" placeholder="Tài khoản">
                        </div>
                        <div class="col-md-6">
                            <div class='row'>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" name="_replyto" placeholder="Chủ sở hữu">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-danger">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-title">
                        <h2><span>Thông tin người phụ trách quyên gớp</span></h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="name" placeholder="Họ tên">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="email" name="_replyto" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="name" placeholder="Địa chỉ Email">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="email" name="_replyto" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="name" placeholder="Ghi chú">
                        </div>
                    </div>
                    <div class="section-title">
                        <h2><span>Mô tả hoạt động và mục đích quyên gớp</span></h2>
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
