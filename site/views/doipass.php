<form action="<?=SITE_URL?>/?act=doipass" method="POST" class="w-50 m-auto" style="width: 50%; margin: 0 auto; margin-top: 20px; margin-bottom: 20px;">
                              <h2 class="text-center mt-5">Đổi mật khẩu</h2>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Mật khẩu mới</strong></label>
                              <input type="text" class="form-control" name="pass" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <div class="form-group mb-3 mt-3">
                              <label for=""><strong>Nhập lại mật khẩu mới</strong></label>
                              <input type="text" class="form-control" name="repass" id="" aria-describedby="helpId" placeholder="">
                              </div>
                              <input type="hidden" name="id" value="<?=$iduser?>">
                              <br>
                              <button type="submit" class="btn btn-success mt-3 mb-5">Gửi</button>
               <p>
               <?php if (isset($mkkk)) {
                              echo $mkkk;
               }?>
               </p>
               </form>
