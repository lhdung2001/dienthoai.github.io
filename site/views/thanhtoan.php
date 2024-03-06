<div class="container" style="margin-bottom: 30px; margin-top: 20px;">
<form action="<?=SITE_URL?>/?act=luudonhang" method="post">
<fieldset class="border m-2 p-3">
   <legend class="small text-primary fw-bold">Thông tin người nhận hàng</legend>
   <div class="row" style="width: 50%; float: left;">
               <div class="form-group col-6 row">
               <label for="email" class="col-sm-2 col-form-label">Địa chỉ </label>
               <div class="col-sm-10"> <input type="text" class="form-control" id="diachi" name="diachi"> </div>
               </div>
               <div class="form-group col-6 row">
               <label for="email" class="col-sm-2 col-form-label">Số ĐT</label>
               <div class="col-sm-10"><input type="number" class="form-control" id="sdt" name="sdt"> </div>
               </div>
   </div>
  <div class="row" style="float: right; width: 50%; margin-top: -20px; margin-left: 20px;">
  <div class="form-group row ">
    <label for="email" class=" col-form-label">Ghi chú</label>
     <textarea name="ghichu" id="" cols="75" rows="3" ></textarea>
  </div>
  </div>
</fieldset> 
<div class="row" style="margin-left: 20px;">
               <div class=" d-flex">
               <fieldset class="border col-6" style="width: 46%; float: left;">    
               <legend class="small text-primary fw-bold">Phương thức thanh toán</legend>
               <div class="form-group row">
               <p><input type="radio" name="phuongthuctt" value="ck" checked> Chuyển khoản</p>
               <p><input type="radio" name="phuongthuctt" value="khinhan"> Khi nhận hàng</p>
               <p><input type="radio" name="phuongthuctt" value="onepay"> Onepay</p>
               <p><input type="radio" name="phuongthuctt" value="nganluong"> Ngân Lượng</p>
               </div>
               </fieldset>
               <fieldset class="border " style="width: 46%; float: right;" >    
               <legend class="small text-primary fw-bold">Phương thức giao hàng</legend>
               <div class="form-group row">
               <p><input type="radio" name="phuongthucnh" value="ghnhanh" checked> Giao hàng nhanh</p>
               <p><input type="radio" name="phuongthucnh" value="ghtietkiem"> Giao hàng tiế t kiệm</p>
               <p><input type="radio" name="phuongthucnh" value="vnpost"> VN Post</p>
               <p><input type="radio" name="phuongthucnh" value="viettel"> Viettel</p>
               </div>
               </fieldset>    
               </div> 
</div>  
<div class="  d-flex justify-content-end">  
    <div class=" text-end">
        <button class="btn btn-danger" type="submit">Mua hàng</button>
    </div>
</div>
</form>               
</div>