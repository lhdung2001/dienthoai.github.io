<form method="post" class="form-group w-75 m-auto" action="<?=ADMIN_URL?>/?ctrl=users&act=update" enctype="multipart/form-data">
<p><label for=""><strong>Tên tài khoản</strong></label>
<input name="Username" class="form-control bg-light border p-2 rounded" type="text" value="<?=$row["Username"]?>"></p>
    <p><label for=""><strong>Mật khẩu</strong></label>
    <input name="Pass" class="form-control bg-light border p-2 rounded" type="text" ></p>
    <input type="hidden" name="Passcu" value="<?=$row["Pass"]?>">
    <p><label for=""><strong>Họ và tên</strong></label>
    <input name="HoTen" class="form-control bg-light border p-2 rounded" type="text" value="<?=$row["HoTen"]?>"></p>
    <p><select name="KichHoat" id="" class="form-control bg-light border p-2 rounded">
    <option value="1" <?php if($row["KichHoat"]==1) echo "selected";?>> Đã kích hoạt</option>
    <option value="0" <?php if($row["KichHoat"]==0) echo "selected";?>>Chưa kích hoạt</option>
    </select></p>
    <p> <label for=""><strong>Thay đổi ảnh</strong></label>
    <input name="hinh" class="form-control bg-light border p-2 rounded" type="file"></p>
    <input type="hidden" name="hinhcu" value="<?=$row["urlHinh"]?>">
    <p><img src="../uploaded/user/<?=$row["urlHinh"]?>" alt="" class="w-25"></p>
    <p><input name="Email" class="form-control bg-light border p-2 rounded" type="email" placeholder=" Email" value="<?=$row["Email"]?>"></p>
    <div class="row m-2">
    <div class="col-6"><input name="VaiTro" value="1" class="" type="radio" placeholder="" <?php if($row["VaiTro"]==1) echo "checked";?>> <label for="AnHien"> Quản trị</label></div>
    <div class="col-6"><input name="VaiTro" value="0" class="" type="radio" placeholder="" <?php if($row["VaiTro"]==0) echo "checked";?>> <label for="AnHien"> Khách hàng </label></div></div>
    <div class="row m-2">
    <div class="col-6"><input name="AnHien" value="1" class="" type="radio" placeholder="Ẩn Hiện" <?php if($row["AnHien"]==1) echo "checked";?>> <label for="AnHien"> Hiên</label></div>
    <div class="col-6"><input name="AnHien" value="0" class="" type="radio" placeholder="Ẩn Hiện" <?php if($row["AnHien"]==0) echo "checked";?>> <label for="AnHien"> Ẩn </label></div></div>
    <input type="hidden" name="idUser" value="<?=$row["idUser"]?>">
    <p><button name="nutsave" class="btn btn-primary" type="submit"> LƯU </button> </p>
</form>