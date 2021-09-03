@extends('layouts.layout_home')
@section('content')
<script src="https://cdn.tiny.cloud/1/yoabqynrahzewkgm5ww00xi1i9wnw5s4kd0lxfpcmb8liwth/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mota',
        plugins: ["advlist autolink lists link image charmap print preview anchor textcolor textcolor colorpicker",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"],
        toolbar: 'undo redo | bold italic underline | forecolor fontsizeselect |  numlist bullist checklist | alignleft aligncenter alignright link image',
        automatic_uploads: true,
        images_upload_url: '/admin/upload',
        images_reuse_filename: true,
        content_css: ["/css/style.css", "/css/admin-style.css"]
    });
</script>
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
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Hình ảnh dại diện <span class="text-danger text-center">*</span></label>
                            <input class="form-control" type="file" name="image">
                            @if($errors->first('image'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('image')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Tên quỹ từ thiện <span class="text-danger text-center">*</span></label>
                            <input class="form-control" type="text" name="tenquy" placeholder="Tên quỹ từ thiện" value="{{ old('tenquy') }}">
                            @if($errors->first('tenquy'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('tenquy')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Ngày bắt đầu</label>
                            <input class="form-control" type="date" name="batdau" value="{{ old('batdau') ?? date('Y-m-d') }}">
                            @if($errors->first('batdau'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('batdau')}}</small>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label>Ngày kết thúc</label>
                            <input class="form-control" type="date" name="ketthuc" value="{{ old('ketthuc') ?? date('Y-m-d') }}">
                            @if($errors->first('ketthuc'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('ketthuc')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="section-title">
                        <h2><span>Thông tin ngân hàng tiếp nhận quyên gớp</span></h2>
                    </div>
                    @if(old('taikhoan'))
                    @foreach(old('taikhoan') as $key => $item)
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="taikhoan[{{$key}}][nganhang]" placeholder="Tên ngân hàng" value="{{$item['nganhang']}}">
                            @if($errors->first('taikhoan.'.$key.'.nganhang'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('taikhoan.'.$key.'.nganhang')}}</small>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="taikhoan[{{$key}}][ma_taikhoan]" placeholder="Tài khoản" value="{{$item['ma_taikhoan']}}">
                            @if($errors->first('taikhoan.'.$key.'.ma_taikhoan'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('taikhoan.'.$key.'.ma_taikhoan')}}</small>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class='row'>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="taikhoan[{{$key}}][hoten]" placeholder="Chủ sở hữu" value="{{$item['hoten']}}">
                                    @if($errors->first('taikhoan.'.$key.'.hoten'))
                                        <small id="emailHelp" class="form-text text-danger">{{$errors->first('taikhoan.'.$key.'.hoten')}}</small>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if($key == 0)
                                    <button type="button" onclick="add(this)" class="btn btn-primary">Thêm</button>
                                    @else
                                    <button type="button" onclick="remove(this)" class="btn btn-danger">Xóa</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    
                    <div class="form-group row">
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="taikhoan[0][nganhang]" placeholder="Tên ngân hàng (*)">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="taikhoan[0][ma_taikhoan]" placeholder="Tài khoản (*)">
                        </div>
                        <div class="col-md-6">
                            <div class='row'>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="taikhoan[0][hoten]" placeholder="Chủ sở hữu (*)">
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" onclick="add(this)">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="section-title">
                        <h2><span>Thông tin người phụ trách quyên gớp</span></h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="phutrach" placeholder="Họ tên (bắt buộc)" value="{{ old('phutrach') }}">
                            @if($errors->first('phutrach'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('phutrach')}}</small>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="diachi" placeholder="Địa chỉ" value="{{ old('diachi') }}">
                            @if($errors->first('diachi'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('diachi')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="form-control" type="phone" name="sdt" maxlength="12" placeholder="Số điện thoại (bắt buộc 1 trong 2)" value="{{ old('sdt') }}">
                            @if($errors->first('sdt'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('sdt')}}</small>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" maxlength="255" name="email" placeholder="Địa chỉ Email (bắt buộc 1 trong 2)" value="{{ old('email') }}">
                            @if($errors->first('email'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('email')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea class="form-control" type="text" name="ghichu" placeholder="Mô tả cơ bản về bản thân"></textarea>
                            @if($errors->first('ghichu'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('ghichu')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="section-title">
                        <h2><span>Mô tả hoạt động và mục đích quyên gớp</span></h2>
                    </div>
                    <textarea id="mota"  class="form-control" rows="30" name="mota" placeholder="Mô tả về hoạt động quyên gớp"></textarea>
                    <button class="btn btn-success mt-4">Đăng ký hoạt động gây quỹ từ thiện</button>
                </form>
            </div>
        </section>
    </div>
</div>
<!-- /.container -->
<script>
    var inx = {{ (count(old('taikhoan') ?? [1]) ?? 1) - 1 }};
    function remove(evnt){
        $(evnt).closest(".form-group.row").remove();
        inx--;
    }
    function add(evnt){
        inx++;
        var clone = $(evnt).closest(".form-group.row").clone();
        clone.find("input")[0].value = '';
        clone.find("input")[0].name = "taikhoan["+inx+"][nganhang]";
        clone.find("input")[1].value = '';
        clone.find("input")[1].name = "taikhoan["+inx+"][ma_taikhoan]";
        clone.find("input")[2].value = '';
        clone.find("input")[2].name = "taikhoan["+inx+"][hoten]";
        clone.find('small').remove();
        clone.find("button").attr('onclick', 'remove(this)');
        clone.find("button").removeClass("btn-primary");
        clone.find("button").addClass("btn-danger");
        clone.find("button").html("Xóa");
        $(evnt).closest(".form-group.row").after(clone);
    }
</script>
@endsection
