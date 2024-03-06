<form method="post" class="form-group w-75 m-auto" action="<?=ADMIN_URL?>/?ctrl=thuoctinh&act=store" enctype="multipart/form-data">
    <div class="row">
    <div class="col-6">
               <div class="form-group">
               <label for="">Điện thoại</label>
               <select class="form-control" name="idDT" id="">
               <?php foreach($row as $row) {?>
               <option value="<?=$row["idDT"]?>"><?=$row["TenDT"]?></option>
               <?php }?>
               </select>
               </div>
               <div class="form-group">
                 <label for="">Màn hình</label>
                 <input type="text" name="ManHinh" id="" class="form-control" placeholder="Màn hình..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Hệ điều hành</label>
                 <input type="text" name="HeDieuHanh" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Camera Sau</label>
                 <input type="text" name="Cameratruoc" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Camera Trước</label>
                 <input type="text" name="Camerasau" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
    </div>
    <div class="col-6">
               <div class="form-group">
                 <label for="">CPU</label>
                 <input type="text" name="cpu" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">RAM </label>
                 <input type="text" name="ram" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Bộ nhớ trong</label>
                 <input type="number" name="bonho" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Thẻ nhớ</label>
                 <input type="text" name="thenho" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Sim </label>
                 <input type="text" name="sim" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Dung lượng pin</label>
                 <input type="text" name="pin" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
    
    </div>
    </div>
    <p><button name="nutsave" class="btn btn-primary" type="submit"> LƯU </button> </p>
</form>
