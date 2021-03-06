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
                    <div class="sidebar-section">
                        <h5><span>Hoạt động cứu trợ</span></h5>
                        <ul style="list-none">
                            <li>Khoản chi: <a href="" class="price">{{number_format($detail -> TONGCHI)."đ"}}</a></li>
                            <li>Đã cứu trợ: {{ number_format($detail->TONGHTRO) }}</li>
                            <li>Thời gian: {{date("Y/m/d" ,strtotime($detail -> BATDAUHD))}} đến {{date("Y/m/d" ,strtotime($detail -> KETTHUCHD))}}</li>
                        </ul>
                        <a href="/hoat-dong/{{$detail -> ID_TUTHIEN}}" class="btn btn-primary">Chi tiết hoạt động</a>
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
                <div>
                    <p>Mục đích của việc khai báo đóng gớp để chúng tôi tổng hợp và công khai số tiền, gớp phần tạo tính minh bạch trong việc làm thiện nguyện</p>
                </div>
                <!-- Post Featured Image -->
                <div class="article-post">
                    @if($errors->first('sdt'))
                    <small id="emailHelp" class="form-text text-danger">{{$errors->first('sdt')}}</small>
                    @endif
                    <form action="/quyen-gop/{{$id}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" name="sdt" value="{{old('sdt')}}">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Chứng từ <span class="text-danger text-center">*</span></label>
                                <input class="form-control" type="file" name="image" onchange="loadFile(event)" accept="image/jpeg,image/png,image/jpg,image/gif,image/tiff,image/svg" value="{{old('image')}}">
                                @if($errors->first('image'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('image')}}</small>
                                @endif
                                <small id="emailHelp" class="form-text text-small">Ảnh chụp màn hình chi tiết chuyển khoản hoặc ảnh chụp giấp tờ chuyển khoản</small>
                            </div>
                            <div class="col-md-6">
                                <label>Ngân hàng</label>
                                <!--<input type="search" id="form-autocomplete" class="form-control mdb-autocomplete" data-url="/api/listbank" autocomplete="on">-->
                                
                                <select name="nganhang" class="form-control" onchange="checkInfo()">
                                    <option value="">Chọn</option>
                                    @foreach($nganhang as $item)
                                    <option class="form-control" {{old('nganhang') == $item->ID_NGANHANG ? "selected" : ""}} value="{{$item->ID_NGANHANG}}">{{$item->TENFULL."(".$item->TEN.")"}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('ten'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('ten')}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="taikhoan">Số tài khoản <span class="text-danger text-center">*</span></label>
                                <input id="taikhoan" class="form-control" type="text" name="taikhoan" onfocusout="checkInfo()" value="{{old('taikhoan')}}" placeholder="số tài khoản ngân hàng">
                                @if($errors->first('taikhoan'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('taikhoan')}}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>Chủ sở hữu</label>
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
                        <a class="btn btn-info" href="/tu-thien/{{$id}}">Trở lại</a>
                        <button type="button" onclick="submitForm()" class="btn btn-success">Đóng gớp</button>
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
                        <span class="author-description">Thông tin bạn cung cấp được chúng tôi sử dụng với mục đích thống kê các khoản đóng gớp tạo tính minh bạch, Thông tin tài khoản và chủ sở hữu sẽ được bảo mật tuyệt đối</span>
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
                            <h5><span>{{$detail->HOTEN}}</span></h5>

                            <ul style="list-none">
                                <li>
                                    <div class="meta-footer-thumb">
                                        <img class="author-thumb-sigin" src="{{$detail->PATH}}" alt="{{$detail -> HOTEN}}">
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
                        <div class="sidebar-section">
                            <h5><span>Hoạt động cứu trợ</span></h5>
                            <ul style="list-none">
                                <li>Khoản chi: <a href="" class="price">{{number_format($detail -> TONGCHI)."đ"}}</a></li>
                                <li>Đã cứu trợ: {{ number_format($detail->TONGHTRO) }}</li>
                                <li>Thời gian: {{date("Y/m/d" ,strtotime($detail -> BATDAUHD))}} đến {{date("Y/m/d" ,strtotime($detail -> KETTHUCHD))}}</li>
                            </ul>
                            <a href="/hoat-dong/{{$detail -> ID_TUTHIEN}}" class="btn btn-primary">Chi tiết hoạt động</a>
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
<script type="text/javascript">
    var info = "Để đảm bảo thông tin chính xác vui lòng cung cấp thêm số điện thoại hoặc email liên hệ phục vụ cho việc xác minh";
    window.onload = function() {
        @if($errors->first('sdt'))
        check = prompt(info);
        if(check !== null){
            $("input[name='sdt']").attr("value",check);
            $("form").submit();
        };
        @endif
    }
    function submitForm(){
        if($("input[name='sotien']")[0].value > 2000000) {
            if($("input[name='sdt']")[0].value !== "") {
                check = prompt(info, $("input[name='sdt']")[0].value);
            }else{
                check = prompt(info);
            }
            if(check !== null){
                $("input[name='sdt']")[0].value=check;
                $("form").submit();
            }
        }else{
            $("form").submit();
        }
    }
    
    
    function loadFile(event) {
        var fd = new FormData();
        var files = event.target.files;
        if(files.length > 0 ){
           fd.append('file',files[0]);
           $.ajax({
                url: '/api/convertInfo',
                type: 'post',
                data: fd,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                contentType: false,
                processData: false,
                success: function(response){
                    $("input[name='taikhoan']").attr("value",response.taikhoan);
                    $("input[name='sotien']").attr("value",response.sotien);
                    checkInfo();
                },
             });
        }
    };
    
    function checkInfo(){
        var taikhoan = $("input[name='taikhoan']").val();
        var bankid = $("select[name='nganhang']").val();
        if(bankid != "" && taikhoan != ""){
            var fd = new FormData();
            fd.append('taikhoan', $("input[name='taikhoan']").val());
            fd.append('bankid', $("select[name='nganhang']").val());
            $.ajax({
                url: '/api/accoutcheck',
                type: 'post',
                data: fd,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.responseCode == null) {
                        $("input[name='ten']")[0].value=response.creditorInfo.name;
                    } else {
                        alert("Thông tin tài khoảng không chính xác"); 
                    }
                },
             });
        }
    }
    
//    $(function() {
//        var availableTags = JSON.parse('{!! $nganhang->toJson() !!}');
//
//        $("#form-autocomplete").autocomplete({
//    source: availableTags
//  });
//      });
</script>
@endsection
