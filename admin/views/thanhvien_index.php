<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center">STT</th>
      <th scope="col">Tên đăng nhập</th>
      <th scope="col">Họ và tên</th>
      <th scope="col">Hình</th>
      <th scope="col">Email</th>
      <th scope="col">Vai trò</th>
      <th scope="col">Ẩn hiện</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody>
<?php
if ($list==NULL) echo "Chưa có dữ liệu";
else foreach ($list as $row) {
    $stt+=1;
   ?>
    <tr>
      <th class="text-center" scope="row"><?php echo $stt;?></th>
      <td><?=$row["Username"]?></td>
      <td><?=$row["HoTen"]?></td>
      <td style="width: 10%;"><img src="../uploaded/user/<?=$row["urlHinh"]?>" class="w-100" height="100" alt=""></td>             
      <td><?=$row["Email"]?>
      <p><?php if($row["KichHoat"]==1) echo "Đã kích hoạt"; else echo "Chưa kích hoạt";?></p>
      </td>
      <td><?php if($row["VaiTro"]==1) echo "Admin"; else echo "Khách hàng";?></td>
      <td><?php if($row["AnHien"]==1) echo "Hiện"; else echo "Ẩn";?></td>
      <td class="text-center"><a class="btn btn-danger" href="<?=ADMIN_URL?>/?ctrl=users&act=edit&idUser=<?=$row["idUser"]?>">Sửa</a></td>
      <td class="text-center"><a class="btn btn-dark" href="javascript:Delete('<?=ADMIN_URL?>/?ctrl=users&act=delete&idUser=<?=$row["idUser"]?>')">Xóa</a></td>
    </tr>
    

   <?php
}
?>
  </tbody>
</table>

<div class="container">
<nav aria-label="Page navigation example ">
  <ul class="pagination justify-content-end modal-2">
    <li class="page-item">
    <?=$links?>
    </li>
    <?php for ($i=1; $i<=$total_pages  ; $i++) { 
  ?>
    <li class="page-item rounded <?php if($page_num == $i) echo "active";?>" ><a class="page-link" href="<?=$baseurl?>&page_num=<?=$i?>"><?=$i?></a></li>
    <?php }?>
    <li class="page-item">
    <?=$link?>
    </li>
    
  </ul>
</nav>
</div>