<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- start linking  -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet"> -->
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <!-- icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="icon" href="img/log.png">
    <script src='https://cdn.tiny.cloud/1/59ywkzq8llgjzie0m43mar11mxl8blos0530rqoyn4h3yps6/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
    <script>
    tinymce.init({
      selector: '#mytextarea1'
    });
  </script>
    <!-- end linking -->
    <title>ĐIỆN THOẠI</title>
</head>
<style>
    .active{
        background-color: orangered;
    }
    
</style>
<body style="font-family: sans-serif;">
    <!-- start admin -->
    <section id="admin">
        <!-- start sidebar -->
        <div class="sidebar " style="background-color: white;">
            <!-- start with head -->
            <div class="head">
                <div class="logo">
                    <img src="img/logo-admin.png" alt="">
                </div>
                <a href="#" class="btn btn-danger">WEBSITE ĐIỆN THOẠI</a>
            </div>
            <!-- end with head -->
            <!-- start the list -->
            <div id="list">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="#menu3" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Nhà Sản Xuất<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
                    <!-- start charts submenue -->
                    <li class="sub collapse" id="menu3">
                        <a href="<?=ADMIN_URL?>/?ctrl=nhasanxuat" class="nav-link" data-parent="#menu3">Danh sách NSX</a>
                        <a href="<?=ADMIN_URL?>/?ctrl=nhasanxuat&act=addnew" class="nav-link" data-parent="#menu3">Thêm NSX</a>
                    </li>

                    <li class="nav-item"><a href="#menu4" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Điện thoại<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
                    <!-- start charts submenue -->
                    <li class="sub collapse" id="menu4">
                        <a href="<?=ADMIN_URL?>/?ctrl=dienthoai" class="nav-link" data-parent="#menu4">Danh sách điện thoại</a>
                        <a href="<?=ADMIN_URL?>/?ctrl=dienthoai&act=addnew" class="nav-link" data-parent="#menu4">Thêm điện thoại</a>
                    </li>
                    <li class="nav-item"><a href="#menu5" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Thuộc tính DT<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
                    <!-- start charts submenue -->
                    <li class="sub collapse" id="menu5">
                        <a href="<?=ADMIN_URL?>/?ctrl=thuoctinh" class="nav-link" data-parent="#menu5">Danh sách TC điện thoại</a>
                        <a href="<?=ADMIN_URL?>/?ctrl=thuoctinh&act=addnew" class="nav-link" data-parent="#menu5">Thêm TC điện thoại</a>
                    </li>
                    <li class="nav-item"><a href="#menu6" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Đơn hàng<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
                    <!-- start charts submenue -->
                    <li class="sub collapse" id="menu6">
                        <a href="<?=ADMIN_URL?>/?ctrl=donhang" class="nav-link" data-parent="#menu6">DS Đơn hàng</a>
                        <a href="<?=ADMIN_URL?>/?ctrl=donhang&act=addnew" class="nav-link" data-parent="#menu6">Thêm đơn hàng</a>
                    </li>
                    <li class="nav-item"><a href="#menu7" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Đơn hàng chi tiết<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
                    <!-- start charts submenue -->
                    <li class="sub collapse" id="menu7">
                        <a href="<?=ADMIN_URL?>/?ctrl=donhang&act=addnewCT" class="nav-link" data-parent="#menu7">Thêm đơn hàng CT</a>
                    </li>
                    <li class="nav-item"><a href="#menu8" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Bình luận<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
                    <!-- start charts submenue -->
                    <li class="sub collapse" id="menu8">
                        <a href="<?=ADMIN_URL?>/?ctrl=binhluan" class="nav-link" data-parent="#menu8">DS bình luận</a>
                        <a href="<?=ADMIN_URL?>/?ctrl=binhluan&act=addnew" class="nav-link" data-parent="#menu8">Thêm bình luận</a>
                    </li>
                    <li class="nav-item"><a href="#menu9" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-fire"></i>Tài khoản<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
                    <!-- start charts submenue -->
                    <li class="sub collapse" id="menu9">
                        <a href="<?=ADMIN_URL?>/?ctrl=users" class="nav-link" data-parent="#menu9">DS tài khoản</a>
                        <a href="<?=ADMIN_URL?>/?ctrl=users&act=addnew" class="nav-link" data-parent="#menu9">Thêm tài khoản</a>
                    <!-- end charts submenue -->
                    <!-- end with charts -->
                    
                    <li class="nav-item"><a href="<?=ADMIN_URL?>/?ctrl=users&act=logout&thoat=1" class="nav-link"><i class="fa fa-life-ring"></i>Đăng xuất</a></li>
                </ul>
            </div>
            <!-- end the list -->
        </div>
        <!-- end sidebar -->
        <!-- start content -->
        <div class="content "  >
            <!-- start content head -->
            <div class="head">
                <!-- head top -->
                <div class="top">
                    <div class="left">
                        <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
                        <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
                        <button class="btn btn-info hidden-xs-down"><i class="fa fa-expand-arrows-alt"></i></button>
                        <button class="btn btn-info hidden-xs-down"><i class="fa fa-home"></i>Back Home</button>
                    </div>
                    <div class="right">
                        <button class="btn btn-info hidden-xs-down"><i class="fa fa-bell"></i></button>
                        <button class="btn btn-info hidden-xs-down"><i class="fa fa-envelope"></i></button>
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADMIN</button>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">Thông tin</a>
                                <a class="dropdown-item" href="<?=ADMIN_URL?>/?ctrl=users&act=logout&thoat=1">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2">
            <h2>
                        <?php if(isset($page_title)==true) echo $page_title; else echo " TRANG QUẢN TRỊ";?>
                        </h2>
                    <?php if (file_exists($page_file)==true) {
                      require_once "$page_file";
                    } else{ echo "Chào mừng bạn đả đến với trang quản trị";} ?>
            </div>
        </div>
        <!-- end content -->
    </section>
    <!-- end admin -->
    <!-- start screpting -->
    <script>
        function Delete(url) {
            if (confirm('Bạn chắc chắn muốn xóa chứ')) {
                document.location = url;
            }
            return false;
        }
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/app.js"></script>
    <!-- end screpting -->
</body>

</html>