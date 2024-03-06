<form method="post" class="form-group w-75 m-auto"  action="<?=ADMIN_URL?>/?ctrl=nhasanxuat&act=store">
    <p><input name="TenNSX" class="form-control  border p-2 rounded" type="text" placeholder="Tên loại"></p>
    <p><input name="ThuTu" class="form-control  border p-2 rounded" type="number" placeholder="Thứ tự"></p>
    <div class="row m-2">
    <div class="col-6"><input name="AnHien" value="1" class="" type="radio" placeholder="Ẩn Hiện" checked> <label for="AnHien"> Hiên</label></div>
    <div class="col-6"><input name="AnHien" value="0" class="" type="radio" placeholder="Ẩn Hiện"> <label for="AnHien"> Ẩn </label></div>
               </div>
    <p><button name="nutsave" class="btn btn-primary" type="submit"> LƯU </button> </p>
</form>