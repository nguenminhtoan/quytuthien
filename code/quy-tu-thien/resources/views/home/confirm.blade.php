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
      <div class="center">
        <form action="/save" method="post">
            @csrf
            <input type="hidden" name="image" value="{{$image}}" />
            <table class="table-bordered">
                <thead>
                    <th>Số tài khoản</th>
                    <th>Ngày </th>
                    <th>số tiền</th>
                </thead>
                <tbody>
                    @foreach($list as $key => $row)
                    <tr>
                        <td>
                            <input class="form-control" name="taikhoan[{{$key}}][taikhoan]" value="{{$row["taikhoan"]}}">
                        </td>
                        <td>
                            <input class="form-control" name="taikhoan[{{$key}}][thoigian]" value="{{$row["thoigian"]}}">
                        </td>
                        <td>
                            <input class="form-control" name="taikhoan[{{$key}}][sotien]" value="{{$row["sotien"]}}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary">Lưu thông tin</button>
        </form>
      </div>
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