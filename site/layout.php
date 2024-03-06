<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
                    .danhsachgio table {
                        display: none;
                        position: absolute;
                        top: 85px;
                        background-color: white;
                        border: 1px black solid;
                        z-index: 9999999999999;
                        overflow: scroll;
                        height: 200px;
                    }
                    .showgio{
                        position: relative;
                    }
                    .showgio:hover .danhsachgio table {
                        display: block;
                    }

                    </style>
<body>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> Tài khoản của tôi</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Danh sách</a></li>
                            <li><a href="<?=SITE_URL?>/?ctrl=home&act=cart"><i class="fa fa-user"></i> Giỏ hàng</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Thủ tục thanh toán</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Tiền tệ :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Ngôn ngữ :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo">
                        <h1>
                            <a href="./"><img src="img/logo.png"></a>
                        </h1>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shopping-item justify-content-end" style="border: none; width: 100%;">
                    <form action="<?=SITE_URL?>/?act=search" method="POST">
                    <input type="text" style="width: 80%; padding: 5px;" name="key" id="" placeholder="Tiềm kiếm ..." >        
                    <button ><i class="fa fa-search" style="padding-right: 10px; padding-top: 5px; padding-bottom: 5px;"></i></button> 
                    </form>           
                    </div>
                </div>
                <div class="col-sm-4 showgio">
                    <div class="shopping-item">
                        <a href="<?=SITE_URL?>/?ctrl=home&act=cartview">Giỏ hàng : <span class="cart-amunt"><?php 
                                            $tong=0;

                                            foreach($_SESSION["giohang"] as $id => $sp){
                                            $tong= $tong + $sp["Amount"]*$sp["Gia"];
                                            }
                                            echo number_format($tong), "";
                                            ?> VND</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">
                                                <?php $tong=0;
                                                foreach ($_SESSION["giohang"] as $id) { $tong+=1; } echo $tong?>

                                            </span></a>
                        
                    </div>
                                            <?php if($_SESSION["giohang"]!=null) {?>
                    <div class="danhsachgio">
                        <table class="table table-hover">
                        <tr>
                        <th>STT</th>
                        <th >Tên SP</th>
                        <th>Hình</th>
                        <th style="width: 25%;">Số lượng</th>
                        <th>Giá</th>
                        <th> </th>
                        </tr>
                        <tbody>
                        <?php foreach ($_SESSION["giohang"] as $idproduct => $sp) 
                                             { $stt+=1; ?>
                            <tr>
                            <td><?=$stt?></td>
                            <td style="width: 30%;"><small><?=$sp["TenDT"]?></small></td>
                            <td><img src="../uploaded/<?=$sp["hinh"]?>" alt=""></td>
                            <td class="text-center"><?=$sp["Amount"]?></td>
                            <td style="width: 35%;"><small><?=number_format($sp["Gia"]), ""?> vnd</small></td>
                            <td><a href="<?=SITE_URL?>?act=cart&what=remove&idDT=<?=$idproduct?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                                             <?php }?>
                        </tbody>
                        </table>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <!-- End site branding area -->

    <div class="mainmenu-area  " style="background-color: rgb(220, 220, 220);">
        <div class="container ">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?=SITE_URL?>/?ctrl=home">Trang chủ</a></li>
                        
                        <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key"></span><span class="value">Hãng Sản Xuất </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <?php foreach($nsx as $nsx) {?>
                                    <li><a href="<?=SITE_URL?>/?ctrl=home&act=cat&id=<?=$nsx["idNSX"]?>"><?=$nsx["TenNSX"]?></a></li>
                                <?php }?>    
                                </ul>
                            </li>
                        <li><a href="<?=SITE_URL?>/?ctrl=home&act=danhsach">Danh Sách Diện thoại</a></li>
                        <li><a href="<?=SITE_URL?>/?ctrl=home&act=cartview">Giỏ hàng</a></li>
                                    
                        <?php 
                                if (isset($_SESSION["id"])&&($_SESSION["id"]!=0)) {
                                    ?>
                                    <li class="dropdown dropdown-small"><a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">TK: </span><span class="value"><?=$_SESSION["suser"]?> </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=SITE_URL?>/?act=chitietus">Đổi mật khẩu</a></li>
                                        <li><a href="<?=SITE_URL?>/?ctrl=home&act=logout&thoat=1">Đăng xuất</a></li>
                                    </ul>
                                </li>
                                    <?php
                                }
                                else{
                                    ?>
<li class="dropdown dropdown-small"><a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">TÀI KHOẢN </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=SITE_URL?>/?ctrl=home&act=dangky">ĐĂNG KÝ</a></li>
                                        <li><a href="<?=SITE_URL?>/?ctrl=home&act=login">ĐĂNG NHẬP</a></li>
                                    </ul>
                                </li>                                    <?php
                                }
                                ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End mainmenu area -->

    
    <!-- End promo area -->
    <?php if (file_exists($viewFile)) require_once "$viewFile";?>

    
    <!-- End product widget area -->

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint!
                            Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?=var_dump($_SESSION["themghtc"])?>
    <!-- End footer bottom area -->
    <?php if (isset($ttthanhcong) == true) { 
   unset($_SESSION["giohang"]);
   ?>
                <script>
                    swal("Cảm ơn bạn đả mua hàng", "Tiếp tục mua sắm nào", "success");
                </script>
            <?php } ?>

            <?php if (isset($_SESSION["themghtc"])==true) {
                unset($_SESSION["themghtc"])
   ?>
                <script>
                    swal(" Đã thêm vào giỏ hàng  ", "Tiếp tục mua sắm nào", "success");
                </script>
            <?php  } ?>

            <?php if (isset($_SESSION["dntc"]) == true) { 
              unset($_SESSION["dntc"]);
            ?>
                <script>
                    swal(" Đăng nhập thành công ", "Khám phá ngay nào", "success");
                </script>
            <?php } ?> 
            <?php if (isset($_SESSION["tbxn"]) == true) { 
              unset($_SESSION["tbxn"]);
            ?>
                <script>
                    swal(" Tài khoản của bạn chưa được xác nhận ", "Vui lòng xác nhận email", "warning");
                </script>
            <?php } ?> 
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>
</body>

</html>