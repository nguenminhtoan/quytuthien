<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Trang quản trị</title>
        <link href="/admin_css/images/favicon2.png" rel="icon" />    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- third party css -->
        <link href="{{ URL::asset('/admin_css/css/style.css') }} " rel="stylesheet" type="text/css" />
        <link href="/admin_css/css/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <!-- App css -->
        <link href="/admin_css/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin_css/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="/admin_css/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!--         end demo js
        <script src="/js/chartjs-example-charts.js"></script>-->
    </head>
    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="/admin_css/images/logo.png" alt="" height="30">
                    </span>
                    <span class="logo-sm">
                        <img src="/admin_css/images/logo.png" alt="" height="16">
                    </span>
                </a>
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="/admin_css/images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="/admin_css/images/logo.png" alt="" height="16">
                    </span>
                </a>
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!--- Sidemenu -->
                    <ul class="side-nav">
                       
                        <li class="side-nav-title side-nav-item"></li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class="badge bg-success float-end">1</span>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        
                        <li class="side-nav-title side-nav-item">Ứng dụng</li>
                        <li class="side-nav-item">
                            <a href="/admin/categories/index" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span>Danh mục sản phẩm </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/admin/chat/chat" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Trao đổi <span class="badge rounded-pill badge-light-lighten font-10 float-end">Chăm sóc khách hàng</span> </span>
                            </a>
                        </li>
                        
                        <li class="side-nav-item">
                            <a href="/admin/customers" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span>Tất cả Khách hàng <span class="badge rounded-pill badge-success-lighten font-10 float-end"> mới</span> </span>
                            </a>
                        </li>
                        
                        <li class="side-nav-item">
                            <a href="/admin/shipper" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span>Tất cả Shipper </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span class="badge rounded-pill badge-light-lighten font-10 float-end">mới</span><span> Quản lý shop </span>
                            </a>
                            <div class="collapse" id="sidebarProjects">
                                <ul class="side-nav-second-level">
                                    
                                    <li>
                                        <a href="/admin/cuahang/{{$cuahang->MA_CUAHANG}}">Hồ sơ shop</a>
                                    </li>
                                    <li>
                                        <a href="/admin/cuahang/list">Danh sách cửa hàng</a>
                                    </li>
                                    <li>
                                        <a href="/admin/industries/index">Ngành Hàng shop</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebargoods" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Quản lý nhập hàng </span><span class="badge bg-success float-end">2</span>
                            </a>
                            <div class="collapse" id="sidebargoods">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/goods/add">Nhập sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="/admin/goods/index">Hóa đơn nhập</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Quản lý đơn hàng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/orders/index">Đơn hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                <i class="uil-copy-alt"></i>
                                <span>Cài đặt</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/status/index">Các trạng thái sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="/admin/voucher/index">Các hình thức khuyến mãi</a>
                                    </li>
                                    <li>
                                        <a href="/admin/properties/index">Thuộc tính sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="/admin/chat/autochat">Tự động trả lời</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                                <i class="uil-table"></i>
                                <span> Vận chuyển </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                <ul class="side-nav-second-level">
                                    @if(Session::get("MA_NGUOIDUNG")->ADMIN == 2)
                                    <li>
                                        <a href="/admin/ship/shipper">Shipper</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="/admin/ship/index">Phương thức vận chuyển</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        
                        <li class="side-nav-item">
                            <a href="/admin/ship/info" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span class="badge bg-success float-end"></span>
                                <span> Thông tin cá nhân </span>
                            </a>
                            
                        </li>
                        <li class="side-nav-title side-nav-item">Vân chuyển hàng</li>
                        <li class="side-nav-item">
                            <a href="/admin/ship/padding" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Đơn hàng chờ tiếp nhận </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/admin/ship/order" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span>Đơn hàng vận chuyển </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/admin/ship/complete" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Đã giao </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/admin/ship/cancel" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Đã bị hủy</span>
                            </a>
                        </li>
                        
                    </ul>

                    <!-- End Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- content -->
                <div class="content">
                    
                    @yield('content')
                <!-- content -->
                
                </div>
                <!-- Footer Start -->
                
                @include("layouts.admin_footer")
                <!-- end Footer -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        
        <!-- bundle -->
        <script src="/admin_css/js/vendor.min.js"></script>
        <script src="/admin_css/js/app.min.js"></script>
        <!-- third party js -->
        <script src="/admin_css/js/jquery.dataTables.min.js"></script>
        <script src="/admin_css/js/dataTables.bootstrap4.js"></script>
        <script src="/admin_css/js/dataTables.responsive.min.js"></script>
        <script src="/admin_css/js/responsive.bootstrap4.min.js"></script>
        <script src="/admin_css/js/dataTables.checkboxes.min.js"></script>
        <!-- third party js ends -->
        <!-- demo app -->
        <script src="/admin_css/js/demo.products.js"></script>
    </body>
</html>