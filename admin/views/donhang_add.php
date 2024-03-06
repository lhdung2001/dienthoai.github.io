<form action="<?=ADMIN_URL?>/?ctrl=donhang&act=store" method="POST" >
<div class="row">
               <div class="form-group col-6">
               <label for="">Người mua hàng</label>
               <select class="form-control" name="iduser" id="">
               <?php foreach($us as $us) {?>
               <option value="<?=$us["idUser"]?>"><?=$us["HoTen"]?></option>
               <?php }?>
               </select>
               </div>
               <div class="form-group col-6">
               <label for="">Số điện thoại</label>
               <input type="text" class="form-control" name="sdt"  aria-describedby="helpId" placeholder="Số điện thoại">
               </div>
</div>
<div class="row">
               <div class="form-group col-4">
               <label for="">Chọn điện thoại</label>
               <select class="form-control" name="idDT" id="">
               <?php foreach($dt as $dt) {?>
               <option value="<?=$dt["idDT"]?>"><?=$dt["TenDT"]?></option>
               <?php }?>
               </select>
               </div>
               <div class="form-group col-4">
               <label for="">Địa chỉ</label>
               <input type="text" class="form-control" name="diachi"  aria-describedby="helpId" placeholder="Địa chỉ giao...">
               </div>
               <div class="form-group col-4">
               <label for="">Số lượng</label>
               <input type="text" class="form-control" name="soluong"  aria-describedby="helpId" placeholder="Số lượng">
               </div>
</div>
<div class="row">
               <div class="form-group col-6">
               <label for="">Thời điểm đặt</label>
               <input type="date" class="form-control" name="tddh"  aria-describedby="helpId" >
               </div>
               <div class="form-group col-6">
               <label for="">Thời điểm giao hàng</label>
               <input type="date" class="form-control" name="tdgh"  aria-describedby="helpId" >
               </div>
</div>

<div class="row">
               <div class="form-group col-6">
                              <label for="">Chọn phương thức thanh toán</label>
                              <select class="form-control" name="pptt" id="">
                              <option value="ck" >Chuyển khoản</option>
                              <option value="khinhan">Thanh toán khi nhận</option>
                              <option value="onepay">Onepay</option>
                              <option value="nganluong">Ngân lượng</option>
                              </select>
               </div>
               <div class="form-group col-6">
                              <label for="">Chọn phương thức giao hàng</label>
                              <select class="form-control" name="ppgh" id="">
                              <option value="ghnhanh" >Giao hàng nhanh</option>
                              <option value="ghtietkiem">Giao hàng tiết kiệm</option>
                              <option value="vnpost">VN POST</option>
                              <option value="viettel">Viettel</option>
                              </select>
               </div>
</div>

<div class="row">
               <div class="form-group col-6"><br>
               <label for="">Ghi chú của khách hàng</label>
               <textarea name="ghichukh"  rows="5"  id="mytextarea"></textarea>
               </div>
               <div class="form-group col-6"><br>
               <label for="">Ghi chú của ADMIN</label>
               <textarea name="ghichuadmin" id="mytextarea1"  rows="5" class="w-100" ></textarea>
               </div>
</div>

<div class="row">
<div class="form-check col-6 " style="border-right: 1px black solid;">
               <label class="form-check-label mr-3">
               <input type="radio" class="form-check-input " name="anhien" id="" value="1" checked>
              Hiện
               </label>
               <label class="form-check-label">
               <input type="radio" class="form-check-input" name="anhien" id="" value="0" >
               Ẩn
               </label>
</div>
<div class="form-check col-6 " >
               <label class="form-check-label mr-3">
               <input type="radio" class="form-check-input " name="trangthai" id="" value="1" checked>
              Đả xử lý
               </label>
               <label class="form-check-label">
               <input type="radio" class="form-check-input" name="trangthai" id="" value="0" >
               Chưa xử lý
               </label>
</div>
</div>
<button type="submit" class="btn btn-success">Lưu</button>

</form>