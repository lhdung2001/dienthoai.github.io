<form method="post" class="form-group w-75 m-auto"  action="<?=ADMIN_URL?>/?ctrl=binhluan&act=update">
    <p><label for=""><strong>Điện thoại</strong></label>
    <select name="dt" id="dt" class="form-control">
    <?php foreach($dt as $dt){?>
               <option value="<?=$dt["idDT"]?>" <?php if($row["idDT"]==$dt["idDT"]) echo "selected";?> ><?=$dt["TenDT"]?></option>
    <?php }?>
    </select>
    </p>
    <p><label for=""><strong>Tên tài khoản</strong></label>
    <select name="user" id="user" class="form-control">
    <?php foreach($us as $us){?>
               <option value="<?=$us["idUser"]?>" <?php if($row["idUser"]==$us["idUser"]) echo "selected";?>><?=$us["Username"]?></option>
    <?php }?>
    </select>
    </p>
    <div class="row m-2">
    <div class="col-6"><input name="AnHien" value="1" class="" type="radio" placeholder="Ẩn Hiện" <?php if($row["AnHien"]==1) echo "checked";?>> <label for="AnHien"> Hiên</label></div>
    <div class="col-6"><input name="AnHien" value="0" class="" type="radio" placeholder="Ẩn Hiện" <?php if($row["AnHien"]==0) echo "checked";?>> <label for="AnHien"> Ẩn </label></div>
</div>
<p>
<label for=""><strong>Nội dung bình luận</strong></label>
<textarea name="ndbl" id="mytextarea" class="form-control" id="" cols="70" rows="5"><?=$row["NoiDungBL"]?></textarea>
</p>
<input type="hidden" name="idBL" value="<?=$row["idBL"]?>">
    <p><button name="nutsave" class="btn btn-primary" type="submit"> LƯU </button> </p>
</form>