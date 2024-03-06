<form method="post" class="form-group w-75 m-auto" action="<?=ADMIN_URL?>/?ctrl=users&act=store" enctype="multipart/form-data">
    <p><input name="Username" class="form-control bg-light border p-2 rounded" type="text" placeholder="Tên đăng nhập"></p>
    <p><input name="Pass" class="form-control bg-light border p-2 rounded" type="text" placeholder=" Mật khâu"></p>
    <p><input name="HoTen" class="form-control bg-light border p-2 rounded" type="text" placeholder=" Họ và tên"></p>
    <p>
    <label for=""><strong>Kích hoạt</strong></label><br>
    <select name="KichHoat" id="" class="form-control bg-light border p-2 rounded">
    <option value="1" > Đã kích hoạt</option>
    <option value="0">Chưa kích hoạt</option>
    </select>
    </p>
    <p>
    <label for=""><strong>Chọn ảnh</strong></label>
    <input name="hinh" class="form-control bg-light border p-2 rounded" type="file" placeholder=""></p>
    <p><input name="Email" class="form-control bg-light border p-2 rounded" type="email" placeholder=" Email"></p>
    <div class="row m-2">
    <div class="col-6"><input name="VaiTro" value="1" class="" type="radio" placeholder="" checked> <label for="AnHien"> Quản trị</label></div>
    <div class="col-6"><input name="VaiTro" value="0" class="" type="radio" placeholder=""> <label for="AnHien"> Khách hàng </label></div></div>
    <div class="row m-2">
    <div class="col-6"><input name="AnHien" value="1" class="" type="radio" placeholder="Ẩn Hiện" checked> <label for="AnHien"> Hiên</label></div>
    <div class="col-6"><input name="AnHien" value="0" class="" type="radio" placeholder="Ẩn Hiện"> <label for="AnHien"> Ẩn </label></div></div>
    <p><button name="nutsave" class="btn btn-primary" type="submit"> LƯU </button> </p>
</form>