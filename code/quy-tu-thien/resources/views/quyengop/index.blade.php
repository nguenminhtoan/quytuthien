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
                        <button class="btn btn-primary mb-2">Sao kê</button>
                        <button class="btn btn-success mb-2">Đóng gớp</button>
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
                    <form action="/quyen-gop/{{$id}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="taikhoan">Số tài khoản <span class="text-danger text-center">*</span></label>
                                <input id="taikhoan" class="form-control" type="number" name="taikhoan" value="{{old('taikhoan')}}" placeholder="số tài khoản ngân hàng">
                                @if($errors->first('taikhoan'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('taikhoan')}}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>Chủ sở hữu <span class="text-danger text-center">*</span></label>
                                <input class="form-control" type="text" name="ten" placeholder="Họ tên" value="{{old('ten')}}">
                                @if($errors->first('ten'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('ten')}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Số tiền đóng gớp <span class="text-danger text-center">*</span></label>
                                <input class="form-control" type="number" name="sotien" placeholder="Số tiền đóng gớp" value="{{old('sotien')}}">
                                @if($errors->first('sotien'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('sotien')}}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>Ngày đóng gớp <span class="text-danger text-center">*</span></label>
                                <input class="form-control" type="date" name="thoigian" value="{{old('thoigian') ?? date('Y-m-d')}}">
                                @if($errors->first('thoigian'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('thoigian')}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Chứng từ <span class="text-danger text-center">*</span></label>
                                <input class="form-control" type="file" name="image" accept="image/jpeg,png,jpg,gif,tiff,svg" value="{{old('image')}}">
                                @if($errors->first('image'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('image')}}</small>
                                @endif
                            </div>
                        </div>
                        <a class="btn btn-info" href="/tu-thien/{{$id}}">Trở lại</a>
                        <button class="btn btn-success">Đóng gớp</button>
                    </form>
                </div>
                <!-- End Prev/Next -->
                <!-- Author Box -->
                <div class="row post-top-meta">
                    <div class="col-md-2">
                        <img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal">
                    </div>
                    <div class="col-md-10">
                        <a target="_blank" class="link-dark" href="#">Nhóm phát triển</a>
                        <span class="author-description">Thông tin bạn cung cấp được chúng tôi sử dụng với mục đích thống kê các khoản đóng gớp tạo tính minh bạch sao này</span>
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
@endsection
