<?php
session_start();
require_once "../system/config.php";
require_once "../system/model_system.php";
require_once "models/model_login.php";

 class login {
     function __construct()
     {
         $this->model=new model_login();
         $this->login();
     }
     function login()
     {
         if (isset($_POST["dn"])&&($_POST["dn"])) {
             $user= $_POST["user"];
             $pass= md5($_POST["pass"]);
             $check=$this->model->checkdn($user, $pass);
             if (is_array($check)) {
                $_SESSION["suser"]=$check["Username"];
                $_SESSION["spass"]=$check["Pass"];
                $_SESSION["urlHinh"]=$check["urlHinh"];
                 $_SESSION["shoten"]=$check["HoTen"];
                 $_SESSION["sid"]=$check["idUser"];
                 $_SESSION["svaitro"]=$check["VaiTro"];
                 unset($_SESSION["messeg"]);
                 header("location: index.php");
             }
             else{
                $_SESSION["messeg"]="Sai tài khoản hoặc mật khẩu";
                header("location: login.php");
             }
         }
     }
 }
//  ham chay
 new login();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body style="background-image: url('../uploaded/banneradmin/iphonebanner.png'); background-size: 100%; background-repeat: no-repeat;">
    <div class="container " style="margin-top: 15%;">
        <form  method="post" class="form-group w-50 p-5 m-auto rounded" style="background-color: rgb(255, 255, 255, 0.9);">
            <h3 class="text-center text-danger">ADMIN</h3>
            <div class="form-group">
                <label for=""><strong>Tên đăng nhập</strong></label>
                <input type="text" class="form-control" name="user" placeholder="Tên đăng nhập...">
            </div>
            <div class="form-group mt-2">
                <label for=""><strong>Mật khẩu</strong></label>
                <input type="password" class="form-control" name="pass" placeholder="Mật khẩu...">
            </div>
            <input type="submit" value="Đăng nhập" name="dn" class="btn btn-danger mt-3">   
            <p class="text-danger">
            <?php if(isset($_SESSION["messeg"])!="") echo $_SESSION["messeg"];?> 
            </p>   
             </form>
             
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>