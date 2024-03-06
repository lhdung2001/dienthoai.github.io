<form method="post" class="form-group w-75 m-auto" action="<?=ADMIN_URL?>/?ctrl=nhasanxuat&act=update">
   <p> <label for="">Tên NSX</label><input name="TenNSX"  class="form-control bg-light border p-2 rounded" value="<?=$row['TenNSX']?>" type="text" placeholder= "Tên loại"> </p>
   <p> <label for="">Thứ tự</label><input name="ThuTu" class="form-control bg-light border p-2 rounded" value="<?=$row['ThuTu']?>" type="number" placeholder="Thứ tự"> </p>
   <div class="row m-2">
    <div class="col-6"><input name="AnHien" value="1" class="" type="radio" placeholder="Ẩn Hiện" <?php if($row["AnHien"]==1) echo "checked";?>> <label for="AnHien"> Hiện</label></div>
    <div class="col-6"><input name="AnHien" value="0" class="" type="radio" placeholder="Ẩn Hiện" <?php if($row["AnHien"]==0) echo "checked";?>> <label for="AnHien"> Ẩn </label></div>
    <input name="id" value="<?=$row['idNSX']?>" type="hidden">
               </div>   <p> <button class="btn btn-danger" name="nutsave" type="submit"> LƯU</button> </p>
</form> 