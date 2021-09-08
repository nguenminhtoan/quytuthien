<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Thương Mại Điện Tử - Shop</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <!-- App favicon -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
        <link href="/assets/css/theme.css" rel="stylesheet">
   </head>
   <body class="loading" >
      <!-- Begin page -->
      <div class="row container" style="margin-right: auto; margin-right: auto; width: 100%">
        <div class="center col-sm-6">
          <form action="/save" method="post">
              @csrf
              <table class="table-bordered">
                  <thead>
                      <th>Số tài khoản</th>
                      <th>Ngày </th>
                      <th>số tiền</th>
                  </thead>
                  <tbody>
                      @foreach($list as $key => $row)
                      <input type="hidden" name="taikhoan[{{$key}}][hinhanh]" value="{{$row["hinhanh"]}}">
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
          <div class="col-sm-2">{{$html}}</div>
        <div class="col-sm-4">
            @foreach ($listimg as $row)
            <img  src="{{$row}}" >
            @endforeach
        </div>
      </div>
      <!-- /End-bar -->
      <!-- bundle -->
      <!-- third party js -->
      <!-- third party js ends -->
      <!-- demo app -->
      <!-- end demo js-->
   </body>
</html>