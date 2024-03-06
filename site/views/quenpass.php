<form action="<?=SITE_URL?>/?act=xnemail" method="POST" class="w-50 m-auto" style="width: 50%; margin: 0 auto; margin-top: 20px; margin-bottom: 20px;">
                              <h2 class="text-center mt-5">Gửi email xác nhận</h2>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Nhập email của bạn</strong></label>
                              <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                              </div>
                            
                              <button type="submit" class="btn btn-success mt-2 mb-5">Gửi</button>
               </form>

               <?php
if (isset($_SESSION["guithatbai"]) == true) { 
               unset($_SESSION["guithatbai"]);
?>
<script>
swal(" Email này chưa đăng ký ", "Vui lòng kiểm tra lại", "warning");
</script>
<?php  } ?>