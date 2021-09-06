<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Thương Mại Điện Tử - Shop</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="/main/assets/images/favicon.ico">
      <!-- third party css -->
      <link href="/main/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
      <!-- third party css end -->
      <!-- App css -->
      <link href="/main/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
      <link href="/main/css/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="/main/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
      <link href="/main/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
   </head>
   <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
      <!-- Begin page -->
      <div class="wrapper">
         <!-- ========== Left Sidebar Start ========== -->
         <div class="leftside-menu">
            <!-- LOGO -->
            <a href="/main/index.html" class="logo text-center logo-light">
            <span class="logo-lg">
            <img src="/main/images/logo.png" alt="" height="30">
            </span>
            <span class="logo-sm">
            <img src="/main/images/logo.png" alt="" height="16">
            </span>
            </a>
            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
            <span class="logo-lg">
            <img src="/main/images/logo.png" alt="" height="16">
            </span>
            <span class="logo-sm">
            <img src="/main/images/logo.png" alt="" height="16">
            </span>
            </a>
            <div class="h-100" id="leftside-menu-container" data-simplebar>
               <!--- Sidemenu -->
               <ul class="side-nav">
                  <li class="side-nav-title side-nav-item"></li>
                  <li class="side-nav-item">
                     <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                     <i class="uil-home-alt"></i>
                     <span class="badge bg-success float-end">3</span>
                     <span>Tổng quan</span>
                     </a>
                     <div class="collapse" id="sidebarDashboards">
                        <ul class="side-nav-second-level">
                           <li>
                              <a href="cmd.html">Phân tích bán hàng</a>
                           </li>
                           <li>
                              <a href="index.html">Marketing</a>
                           </li>
                           <li>
                              <a href="projects.html">Dự án</a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  <li class="side-nav-title side-nav-item">Ứng dụng</li>
                  <li class="side-nav-item">
                     <a href="chat.html" class="side-nav-link">
                     <i class="uil-comments-alt"></i>
                     <span> Trò chuyện </span>
                     </a>
                  </li>
                  <li class="side-nav-item">
                     <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                     <i class="uil-store"></i>
                     <span> Từ thiện </span>
                     <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarEcommerce">
                        <ul class="side-nav-second-level">
                           <li>
                              <a href="apps-ecommerce-products.html">Tất cả</a>
                           </li>
                           <li>
                              <a href="addproduct.html">Cần duyệt</a>
                           </li>
                           <li>
                              <a href="addproduct.html">Đã duyệt</a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  <li class="side-nav-item">
                     <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                     <i class="uil-envelope"></i>
                     <span> Quỹ đóng gớp </span>
                     <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarEmail">
                        <ul class="side-nav-second-level">
                           <li>
                              <a href="Email.html">Đã xác nhận</a>
                           </li>
                           <li>
                              <a href="readEmail.html">Chờ xác nhận</a>
                           </li>
                           <li>
                              <a href="readEmail.html">Không hợp lệ</a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  <li class="side-nav-item">
                     <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                     <i class="uil-briefcase"></i>
                     <span> Người đăng ký </span>
                     <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarProjects">
                        <ul class="side-nav-second-level">
                           <li>
                              <a href="sellers.html">Đã xác thực</a>
                           </li>
			   <li>
                              <a href="customers.html">Chưa xác thực</a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  <li class="side-nav-item">
                     <a href="chat.html" class="side-nav-link">
                     <i class="dripicons-user"></i>
                     <span> Người tham gia </span>
                     </a>
                  </li>
                  <li class="side-nav-item">
                     <a href="chat.html" class="side-nav-link">
                     <i class="dripicons-briefcase"></i>
                     <span> Quản lý hoạt động </span>
                     </a>
                  </li>
                  <li class="side-nav-item">
                     <a href="chat.html" class="side-nav-link">
                     <i class="uil-comments-alt"></i>
                     <span> Thư gớp ý </span>
                     </a>
                  </li>
                  <li class="side-nav-item">
                     <a href="chat.html" class="side-nav-link">
                     <i class="uil-table"></i>
                     <span> Tài chính </span>
                     </a>
                  </li>
                  <li class="side-nav-item">
                     <a href="#" class="side-nav-link">
                     <i class="uil-chart"></i>
                     <span> Dữ liệu </span>
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
            <div class="content">
               <!-- Topbar Start -->
               <div class="navbar-custom">
                  <ul class="list-unstyled topbar-menu float-end mb-0">
                     <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span class="noti-icon-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                           <!-- item-->
                           <div class="dropdown-item noti-title">
                              <h5 class="m-0">
                                 <span class="float-end">
                                 <a href="javascript: void(0);" class="text-dark">
                                 <small>Làm sạch tât cả</small>
                                 </a>
                                 </span>Thông báo
                              </h5>
                           </div>
                           <div style="max-height: 230px;" data-simplebar>
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item notify-item">
                                 <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                 </div>
                                 <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                 </p>
                              </a>
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item notify-item">
                                 <div class="notify-icon bg-info">
                                    <i class="mdi mdi-account-plus"></i>
                                 </div>
                                 <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                 </p>
                              </a>
                              <!-- item-->
                              <a href="javascript:void(0);" class="dropdown-item notify-item">
                                 <div class="notify-icon">
                                    <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> 
                                 </div>
                                 <p class="notify-details">Karen Robinson</p>
                                 <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                 </p>
                              </a>
                           </div>
                           <!-- All-->
                           <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                           Xem tất cả
                           </a>
                        </div>
                     </li>
                     <li class="notification-list">
                        <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                        <i class="dripicons-gear noti-icon"></i>
                        </a>
                     </li>
                     <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                           aria-expanded="false">
                        <span class="account-user-avatar"> 
                            <img src="/main/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                        </span>
                        <span>
                            <span class="account-user-name">Dominic Keller</span>
                        </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                           <!-- item-->
                           <div class=" dropdown-header noti-title">
                              <h6 class="text-overflow m-0">Chào mừng !</h6>
                           </div>
                           <!-- item-->
                           <a href="javascript:void(0);" class="dropdown-item notify-item">
                           <i class="mdi mdi-account-circle me-1"></i>
                           <span>Tài khoản của tôi</span>
                           </a>
                           <!-- item-->
                           <a href="javascript:void(0);" class="dropdown-item notify-item">
                           <i class="mdi mdi-account-edit me-1"></i>
                           <span>Cài đặt</span>
                           </a>
                           <!-- item-->
                           <a href="javascript:void(0);" class="dropdown-item notify-item">
                           <i class="mdi mdi-lifebuoy me-1"></i>
                           <span>Ủng hộ</span>
                           </a>
                           <!-- item-->
                           <a href="javascript:void(0);" class="dropdown-item notify-item">
                           <i class="mdi mdi-lock-outline me-1"></i>
                           <span>Màn hình Khóa</span>
                           </a>
                           <!-- item-->
                           <a href="javascript:void(0);" class="dropdown-item notify-item">
                           <i class="mdi mdi-logout me-1"></i>
                           <span>Đăng xuất</span>
                           </a>
                        </div>
                     </li>
                  </ul>
                  <button class="button-menu-mobile open-left disable-btn">
                    <i class="mdi mdi-menu"></i>
                  </button>
                  <div class="app-search dropdown d-none d-lg-block">
                     <form>
                        <div class="input-group">
                           <input type="text" class="form-control dropdown-toggle"  placeholder="Tìm kiếm..." id="top-search">
                           <span class="mdi mdi-magnify search-icon"></span>
                           <button class="input-group-text btn-primary" type="submit">Tìm kiếm</button>
                        </div>
                     </form>
                     <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                           <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                        </div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="uil-notes font-16 me-1"></i>
                        <span>Analytics Report</span>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="uil-life-ring font-16 me-1"></i>
                        <span>How can I help you?</span>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="uil-cog font-16 me-1"></i>
                        <span>User profile settings</span>
                        </a>
                        <!-- item-->
                     </div>
                  </div>
               </div>
               <!-- end Topbar -->
               <!-- Start Content-->
               <div class="container-fluid">
                  <!-- start page title -->
                  @yield('content')
                  <!-- end page title -->
               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <!-- Footer Start -->
            <footer class="footer">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> © Hyper - Supermarket.com
                     </div>
                     <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                           <a href="javascript: void(0);">Bao gồm</a>
                           <a href="javascript: void(0);">Hỗ trợ</a>
                           <a href="javascript: void(0);">Liên hệ với chúng tôi</a>
                        </div>
                     </div>
                  </div>
               </div>
            </footer>
            <!-- end Footer -->
         </div>
         <!-- ============================================================== -->
         <!-- End Page content -->
         <!-- ============================================================== -->
      </div>
      <!-- END wrapper -->
      <!-- Right Sidebar -->
      <div class="end-bar">
         <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
            <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Cài đặt</h5>
         </div>
         <div class="rightbar-content h-100" data-simplebar>
            <div class="p-3">
               <div class="alert alert-warning" role="alert">
                  <strong>Tùy chỉnh </strong> bảng màu tổng thể, menu thanh bên,v.v.v
               </div>
               <!-- Settings -->
               <h5 class="mt-3">Bảng màu</h5>
               <hr class="mt-1" />
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                  <label class="form-check-label" for="light-mode-check">Chế độ sáng</label>
               </div>
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                  <label class="form-check-label" for="dark-mode-check">Chế độ tối</label>
               </div>
               <!-- Width -->
               <h5 class="mt-4">Chiều rộng</h5>
               <hr class="mt-1" />
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                  <label class="form-check-label" for="fluid-check">Dịch</label>
               </div>
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                  <label class="form-check-label" for="boxed-check">Đóng hộp</label>
               </div>
               <!-- Left Sidebar-->
               <h5 class="mt-4">Thanh bên trái</h5>
               <hr class="mt-1" />
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                  <label class="form-check-label" for="default-check">Mặc định</label>
               </div>
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check">
                  <label class="form-check-label" for="light-check">Ánh sáng</label>
               </div>
               <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check" checked>
                  <label class="form-check-label" for="dark-check">Tối</label>
               </div>
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                  <label class="form-check-label" for="fixed-check">Đã Sửa</label>
               </div>
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                  <label class="form-check-label" for="condensed-check">Cô đặc</label>
               </div>
               <div class="form-check form-switch mb-1">
                  <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                  <label class="form-check-label" for="scrollable-check">Dạng cuộc</label>
               </div>
               <div class="d-grid mt-4">
                  <button class="btn btn-primary" id="resetBtn">Đạt lại mặc định</button>
               </div>
            </div>
            <!-- end padding-->
         </div>
      </div>
      <div class="rightbar-overlay"></div>
      <!-- /End-bar -->
      <!-- bundle -->
      <script src="/main/js/vendor.min.js"></script>
      <script src="/main/js/app.min.js"></script>
      <!-- third party js -->
      <script src="/main/js/vendor/apexcharts.min.js"></script>
      <script src="/main/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="/main/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
      <!-- third party js ends -->
      <!-- demo app -->
      <script src="/main/js/pages/demo.dashboard.js"></script>
      <!-- end demo js-->
   </body>
</html>