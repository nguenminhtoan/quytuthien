@extends('layouts.layout_home')
@section('content')
<div class="container">
    <!-- Content (replace with your e-mail address below)
    ================================================== -->
    <div class="main-content">
        <section>
            <div class="section-title">
                <h2><span>Đóng gớp ý kiến để xây dựng trang web</span></h2>
            </div>
            <div class="article-post">
                <form action="gop-y" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Họ tên</label>
                            <input class="form-control" type="text" name="hoten" placeholder="Họ tên" value="{{ old('hoten') }}">
                            @if($errors->first('hoten'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('hoten')}}</small>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Địa chỉ email" value="{{ old('email') }}">
                            @if($errors->first('email'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('email')}}</small>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Tài liệu gớp ý</label>
                            <input class="form-control" type="file" name="attach" accept="image/jpeg,image/png,image/jpg,image/gif,image/tiff,image/svg" >
                            @if($errors->first('attach'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('attach')}}</small>
                            @endif
                        </div>
                    </div>
                    <textarea id="mota"  class="form-control" rows="10" name="noidung" placeholder="Nội dung đóng gớp"></textarea>
                    @if($errors->first('noidung'))
                        <small id="emailHelp" class="form-text text-danger">{{$errors->first('noidung')}}</small>
                    @endif
                    <button class="btn btn-success mt-4">Gớp ý</button>
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
