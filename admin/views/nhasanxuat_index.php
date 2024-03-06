<table class="table table-hover table-bordered " >
  <thead>
    <tr>
      <th scope="col" class="text-center">STT</th>
      <th scope="col">Tên nhà sản xuất</th>
      <th scope="col">Thứ tự</th>
      <th scope="col">Ẩn hiện</th>
      <th scope="col" class="text-center">Sửa</th>
      <th scope="col" class="text-center">Xóa</th>

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
      <td><?=$row["TenNSX"]?></td>
      <td><?=$row["ThuTu"]?></td>
      <td><?php if($row["AnHien"]==1) echo "Hiện"; else echo "Ẩn";?></td>
      <td class="text-center"><a class="btn btn-danger" href="<?=ADMIN_URL?>/?ctrl=nhasanxuat&act=edit&idNSX=<?=$row["idNSX"]?>">Sửa</a></td>
      <td class="text-center"><a class="btn btn-dark" href="javascript:Delete('<?=ADMIN_URL?>/?ctrl=nhasanxuat&act=delete&idNSX=<?=$row["idNSX"]?>')">Xóa</a></td>
    </tr>
    

   <?php
}
?>
  </tbody>
</table>
<div class="row">

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
    <?=$links?>
    </li>
    <?php for ($i=1; $i<=$total_pages  ; $i++) { 
  ?>
    <li class="page-item <?php if($page_num == $i) echo "active";?>" ><a class="page-link" href="<?=$baseurl?>&page_num=<?=$i?>"><?=$i?></a></li>
    <?php }?>
    <li class="page-item">
    <?=$link?>
    </li>
    
  </ul>
</nav>
</div>