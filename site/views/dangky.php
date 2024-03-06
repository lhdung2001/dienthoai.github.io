<div class="container">
               <form action="<?=SITE_URL?>/?act=dangky_" method="POST" class="w-50 m-auto" style="width: 50%; margin: 0 auto; margin-top: 20px; margin-bottom: 20px;">
                              <h2 class="text-center mt-5">ĐĂNG KÝ</h2>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Họ và tên</strong></label>
                              <input type="text" class="form-control" name="hoten" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Tên tài khoản</strong></label>
                              <input type="text" class="form-control" name="user" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <div class="form-group mb-3">
                              <label for=""><strong>Mật khẩu</strong></label>
                              <input type="password" class="form-control" name="pass" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <div class="form-group mb-3">
                              <label for=""><strong>Nhập lại mật khẩu</strong></label>
                              <input type="password" class="form-control" name="repass" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <div class="form-group mb-3">
                              <label for=""><strong>Email</strong></label>
                              <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <br>
                              <button type="submit" class="btn btn-warning mt-3 mb-5">Đăng ký</button>
                              <?php if (isset($thongbao)&& ($thongbao!="")) {
                                             echo $thongbao;
                              }?>
               </form>
<!-- Gửi thất bại -->
<?php
if (isset($_SESSION["guithatbai"]) == true) { 
               unset($_SESSION["guithatbai"]);
?>
<script>
swal(" Gửi kích hoạt thành công ", "Kiểm tra email để xác nhận", "warning");
</script>
<?php  } ?>
<!-- $_SESSION['thongbaoht']=$thongbaoht;
                $_SESSION['thongbaou']=$thongbaou;
                $_SESSION['thongbaoe']=$thongbaoe;
                $_SESSION['thongbaop1']=$thongbaop1;
                $_SESSION['thongbaop2']=$thongbaop2; -->
                <!-- Thông báo lỗi -->
<?php
if (isset($_SESSION["thongbaoht"]) == true) { 
               unset($_SESSION["thongbaoht"]);
?>
<script>
swal(" Họ tên còn trống", "Hãy kiểm tra lại", "warning");
</script>
<?php  } ?>

<?php
if (isset($_SESSION["thongbaou"]) == true) { 
unset($_SESSION["thongbaou"]);
?>
<script>
swal(" Tên tài khoản quá ngắn hoặc đả được sử dụng", "Hãy kiểm tra lại", "warning");
</script>
<?php  } ?>
<!-- kiểm tra email -->
<?php
if (isset($_SESSION["thongbaoe"]) == true) { 
unset($_SESSION["thongbaoe"]);
?>
<script>
swal(" Email không hợp lệ hoặc đả được sử dụng", "Hãy kiểm tra lại", "warning");
</script>
<?php  } ?>

<!-- kiểm tra pass -->
<?php
if (isset($_SESSION["thongbaop1"]) == true) { 
unset($_SESSION["thongbaop1"]);
?>
<script>
swal(" Mật khẩu quá ngắn", "Hãy kiểm tra lại", "warning");
</script>
<?php  } ?>

<!-- kiểm tra pass -->
<?php
if (isset($_SESSION["thongbaop2"]) == true) { 
unset($_SESSION["thongbaop2"]);
?>
<script>
swal(" Mật khẩu không khớp", "Hãy kiểm tra lại", "warning");
</script>
<?php  } ?>
</div>