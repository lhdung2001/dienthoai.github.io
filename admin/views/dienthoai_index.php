<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center">STT</th>
      <th scope="col">Tên điện thoại</th>
      <th scope="col">Giá</th>
      <th scope="col">Hình</th>
      <th scope="col">Mô Tả</th>
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
      <td><?=$row["TenDT"]?></td>
      <td><?=$row["Gia"]?> <br> <?=$row["GiaKM"]?></td>
      <td style="width: 50%;"><img src="../uploaded/<?=$row["urlHinh"]?>" class="w-100" height="100" alt=""></td>             
      </td>
      <td><?=$row["MoTa"]?></td>
      <td class="text-center"><a class="btn btn-danger" href="<?=ADMIN_URL?>/?ctrl=dienthoai&act=edit&idDT=<?=$row["idDT"]?>">Sửa</a></td>
      <td class="text-center"><a class="btn btn-dark" href="javascript:Delete('<?=ADMIN_URL?>/?ctrl=dienthoai&act=delete&idDT=<?=$row["idDT"]?>')">Xóa</a></td>
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