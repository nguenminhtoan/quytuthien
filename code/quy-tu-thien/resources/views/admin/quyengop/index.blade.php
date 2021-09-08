@extends('layouts.layout_admin')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
            <h4 class="page-title">Tất Cả Hoạt Động Quyên Góp</h4>
        </div>
    </div>
</div>
<!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Quyên Góp</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1">Xác thực</button>
                            <button type="button" class="btn btn-light mb-2">Xóa</button>
                        </div>
                    </div>
                    <!-- end col-->
                </div>
                <div class="table-responsive">
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                               <div class="dataTables_length" id="products-datatable_length">
                                  <label class="form-label">
                                     Số 
                                     <select class="form-select form-select-sm ms-1 me-1">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="-1">All</option>
                                     </select>
                                     dòng
                                  </label>
                               </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                               <div id="products-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="products-datatable"></label></div>
                            </div>
                         </div>
                        <div class="row">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all" style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th class="all">Tên người quyên góp</th>
                                        <th>Ngày tạo</th>
                                        <th>Tài Khoản</th>
                                        <th>Nội dung</th>
                                        <th>Số Tiền</th>
                                        <th>Thời Gian</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 85px;">Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $item)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{$item -> HINHANH}}" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                <a href="apps-ecommerce-products-details.html" class="text-body">{{$item -> TEN}}</a>
                                                <br/>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                            </p>
                                        </td>
                                        <td>
                                            {{date("Y/m/d" ,strtotime($item -> NGAYTAO))}}
                                        </td>
                                        <td>
                                            {{$item -> TAIKHOAN}}
                                        </td>
                                        <td>
                                            {{$item -> NOIDUNG}}
                                        </td>
                                        <td>
                                            {{number_format($item -> SOTIEN)."đ"}}
                                        </td>
                                        <td>
                                            {{date("Y/m/d" ,strtotime($item -> THOIGIAN))}}
                                        </td>
                                        <td>
                                            <span class="badge bg-success">{{$item -> XACTHUC}}</span>
                                        </td>
                                        <td class="table-action">
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $list->links("admin.paginate_table") }}
                    </div>
                </div>
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->
</div>
<!-- end row -->    
@endsection