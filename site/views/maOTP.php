<form action="<?=SITE_URL?>/?act=nhapotp" method="POST" class="w-50 m-auto" style="width: 50%; margin: 0 auto; margin-top: 20px; margin-bottom: 20px;">
                              <h2 class="text-center mt-5">Nhập mã OTP</h2>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Mã OTP của bạn</strong></label>
                              <input type="text" class="form-control" name="otp" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              
                              <button type="submit" class="btn btn-success mt-3 mb-5">Xác thực</button>
               </form>
<?php
if (isset($_SESSION["saiotp"]) == true) { 
               unset($_SESSION["saiotp"]);
?>
<script>
swal(" Mã OTP không đúng", "Kiểm tra lại", "warning");
</script>
<?php  } ?>

<?php
if (isset($_SESSION["guitc1"]) == true) { 
               unset($_SESSION["guitc1"]);
?>
<script>
swal(" Gửi xác nhận thành công", "Kiểm tra email để nhập mã OTP", "success");
</script>
<?php  } ?>