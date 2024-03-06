<form action="<?=SITE_URL?>/?act=doimkuser" method="POST" class="w-50 m-auto" style="width: 50%; margin: 0 auto; margin-top: 20px; margin-bottom: 20px;">
                              <h2 class="text-center mt-5">ĐỔI MẬT KHẨU</h2>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Email</strong></label>
                              <p class="form-control"><?=$_SESSION["email"]?></p>
                              </div>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Mật khẩu củ</strong></label>
                              <input type="password" class="form-control" name="passcu" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Mật khẩu mới</strong></label>
                              <input type="password" class="form-control" name="pass" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Nhập lại mật khẩu mới</strong></label>
                              <input type="password" class="form-control" name="repass" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <input type="hidden" name="id" value="<?=$_SESSION["id"]?>">
                              <br>
                              <button type="submit" class="btn btn-success mt-3 mb-5">Cập nhật</button>
              
               </form>

               <?php 
            
            if (isset($dmktc) != "") { 
            ?>
                <script>
                    swal(" Đổi mật khẩu thành công ", "", "success");
                </script>
            <?php  } ?>  

            <?php 
            
            if (isset($mkkk) != "") { 
            ?>
                <script>
                    swal(" Mật khẩu không khớp ", "", "warning");
                </script>
            <?php  } ?>  
