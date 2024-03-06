<form method="post" class="form-group w-75 m-auto" action="<?=ADMIN_URL?>/?ctrl=dienthoai&act=store" enctype="multipart/form-data">
<div class="row">
<div class="col-6">    <p><label for=""><strong>Tên điện thoại</strong></label>
    <input name="TenDT" class="form-control bg-light border p-2 rounded" type="text" placeholder="Tên điện thoại"></p>
    <p>
    <label for=""><strong>Nhà sản xuất</strong></label>
    <select name="idNSX" id="" class="form-control bg-light border p-2 rounded">
    <?php foreach($row as $nsx) { ?>
    <option value="<?=$nsx["idNSX"]?>"> <?=$nsx["TenNSX"]?></option>
    <?php }?>
    </select>
    </p>
    <p>  <label for=""><strong>Giá</strong></label>
    <input name="Gia" class="form-control bg-light border p-2 rounded" type="number" placeholder=" Giá"></p>
    <p><label for=""><strong>Giá khuyến mãi</strong></label>
    <input name="GiaKM" class="form-control bg-light border p-2 rounded" type="number" placeholder=" Giá khuyến mãi"></p>
    <p><label for=""><strong>Thời điểm nhập</strong></label>
    <input name="ThoiDiemNhap" class="form-control bg-light border p-2 rounded" type="date" min="<?=date("d/m/Y")?>" placeholder=" Giá khuyến mãi"></p>
    <p><label for=""><strong>Số lần xem</strong></label>
    <input name="SoLanXem" class="form-control bg-light border p-2 rounded" type="number" placeholder=" Số lần xem"></p>
</div>
<div class="col-6">
<p><label for=""><strong>Số lần mua</strong></label>
    <input name="SoLanMua" class="form-control bg-light border p-2 rounded" type="number" placeholder=" Số lần mua"></p>
<p><label for=""><strong>Số lượng tồn kho</strong></label>
    <input name="SoLuongTonKho" class="form-control bg-light border p-2 rounded" type="number" placeholder=" Số lượng tồn kho"></p>
    <p>
    <label for=""><strong>Chọn ảnh</strong></label>
    <input name="hinh" class="form-control bg-light border p-2 rounded" type="file" placeholder=""></p>
    <div class="row m-2">
    <div class="col-6"><input name="hot" value="1" class="" type="radio" placeholder="" checked> <label for="AnHien"> Hot</label></div>
    <div class="col-6"><input name="hot" value="0" class="" type="radio" placeholder=""> <label for="AnHien"> Không hot </label></div></div>
    <div class="row m-2">
    <div class="col-6"><input name="AnHien" value="1" class="" type="radio" placeholder="Ẩn Hiện" checked> <label for="AnHien"> Hiên</label></div>
    <div class="col-6"><input name="AnHien" value="0" class="" type="radio" placeholder="Ẩn Hiện"> <label for="AnHien"> Ẩn </label></div></div>
    <div class="form-group">
      <label for=""><strong>Mô tả</strong></label>
      <textarea class="form-control " name="mota" id="mytextarea" rows="3"></textarea>
    </div></div>
</div>
    
    <p><button name="nutsave" class="btn btn-primary" type="submit"> LƯU </button> </p>
</form>
