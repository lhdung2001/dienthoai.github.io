<div class="container " style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row text-center">
        <h3 style="color: orangered; font-weight: bolder;">ĐĂNG NHẬP</h3>
    </div>
<form action="<?=SITE_URL?>/?ctrl=home&act=checklogin" method="POST" class="w-50 " style="margin: 0 auto; width: 50%; padding: 40px; background-color: #eeee;">
    <div class="form-group">
      <label for="">Tên tài khoản</label>
      <input type="text" name="user" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Mật khẩu</label>
      <input type="password" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <p><a href="<?=SITE_URL?>/?act=quenpass">Quên mật khẩu ?</a> </p>
    <div class="row" style="text-align: center;">
    <input type="submit" name="dn" style="background-color: orangered;" value="Đăng nhập">
    </div>
    <p><?php if(isset($_SESSION["messeg"])) echo $_SESSION["messeg"];?></p>
    <?php if (isset($guitc)&& ($guitc!="")) {
                              echo $guitc;
               }?>
</form>
</div>
<?php
if (isset($_SESSION["kichhoat"]) == true) { 
               unset($_SESSION["kichhoat"]);
?>
<script>
swal(" Kích hoạt thành công ", "Đăng nhập ngay nào", "success");
</script>
<?php  } ?>

<!-- Gửi mail thành công -->

<?php
if (isset($_SESSION["guitc"]) == true) { 
               unset($_SESSION["guitc"]);
?>
<script>
swal(" Gửi kích hoạt thành công ", "Kiểm tra email để xác nhận", "success");
</script>
<?php  } ?> 

<!-- Đổi mk thành công -->

<?php
if (isset($_SESSION["doimktc"]) == true) { 
               unset($_SESSION["doimktc"]);
?>
<script>
swal(" Đổi mật khẩu thành công ", "Đăng nhập ngay nào", "success");
</script>
<?php  } ?> 

<?php
if (isset($thongbao) == true) { 
             
?>
<script>
swal(" Sai tài khoản hoặc mật khẩu ", "", "warning");
</script>
<?php  } ?> 