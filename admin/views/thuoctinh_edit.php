<form method="post" class="form-group w-75 m-auto" action="<?=ADMIN_URL?>/?ctrl=thuoctinh&act=update" enctype="multipart/form-data">
    <div class="row">
    <div class="col-6">
               <div class="form-group">
               <label for="">Điện thoại</label>
               <select class="form-control" name="idDT" id="">
               <?php foreach($dt as $row) {?>
               <option value="<?=$row["idDT"]?>" <?php if($rowtc["idDT"]==$row["idDT"]) echo "selected";?>><?=$row["TenDT"]?></option>
               <?php }?>
               </select>
               </div>
               <div class="form-group">
                 <label for="">Màn hình</label>
                 <input type="text" name="ManHinh" value="<?=$rowtc["ManHinh"]?>" id="" class="form-control" placeholder="Màn hình..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Hệ điều hành</label>
                 <input type="text" name="HeDieuHanh" value="<?=$rowtc["HeDieuHanh"]?>" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Camera Sau</label>
                 <input type="text" name="Cameratruoc" value="<?=$rowtc["CameraTruoc"]?>"  id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Camera Trước</label>
                 <input type="text" name="Camerasau" value="<?=$rowtc["CameraSau"]?>" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
    </div>
    <div class="col-6">
               <div class="form-group">
                 <label for="">CPU</label>
                 <input type="text" name="cpu" value="<?=$rowtc["CPU"]?>" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">RAM </label>
                 <input type="text" name="ram" value="<?=$rowtc["RAM"]?>" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Bộ nhớ trong</label>
                 <input type="number" name="bonho" value="<?=$rowtc["BoNhoTrong"]?>" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Thẻ nhớ</label>
                 <input type="text" name="thenho" value="<?=$rowtc["TheNho"]?>" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Sim </label>
                 <input type="text" name="sim" value="<?=$rowtc["TheSim"]?>" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Dung lượng pin</label>
                 <input type="text" name="pin" value="<?=$rowtc["DungLuongPin"]?>" id="" class="form-control" placeholder="Hệ điều hành..." aria-describedby="helpId">
               </div>
               <input type="hidden" value="<?=$rowtc["id"]?>" name="id">
    
    </div>
    </div>
    <p><button name="nutsave" class="btn btn-primary" type="submit"> LƯU </button> </p>
</form>
