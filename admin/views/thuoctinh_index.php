<table class="table table-bordered table-hover" >
  <thead>
    <tr>
      <th scope="col" class="text-center">STT</th>
      <th scope="col">Tên điện thoại</th>
      <th scope="col">Màn hình</th>
      <th scope="col">Camera</th>
      <th scope="col">Phần Cứng</th>
      <th scope="col" >Sim & Pin</th>
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
      <td>
               Tên: <strong><?=$row["TenDT"]?></strong>
               <p>HDH: <?=$row["HeDieuHanh"]?></p>
      </td>

      <td><?=$row["ManHinh"]?> </td>

      <td>
      <p>Trước: <strong><?=$row["CameraTruoc"]?></strong></p>
      <p>Trước: <strong><?=$row["CameraSau"]?></strong></p>
      </td>
                   
      <td>
      <p>CPU:  <strong><?=$row["CPU"]?></strong></p>
      <p>RAM: <?=$row["RAM"]?></p>
      <p>Bộ Nhớ: <?=$row["BoNhoTrong"]?></p>
      </td>
      <td>
      <p>Sim: <strong><?=$row["TheSim"]?></strong></p>
      <p>Pin: <strong><?=$row["DungLuongPin"]?></strong></p>
      </td>

      <td class="text-center"><a class="btn btn-danger" href="<?=ADMIN_URL?>/?ctrl=thuoctinh&act=edit&id=<?=$row["id"]?>">Sửa</a></td>
      <td class="text-center"><a class="btn btn-dark" href="javascript:Delete('<?=ADMIN_URL?>/?ctrl=thuoctinh&act=delete&id=<?=$row["id"]?>')">Xóa</a></td>
    </tr>
   <?php
}
?>
  </tbody>
</table>

<div class="container">
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
    <?=$links?>
    </li>
    <?php for ($i=1; $i<=$total_pages  ; $i++) { 
  ?>
    <li class="page-item <?php if($page_num == $i) echo "active bg-danger";?>" ><a class="page-link" href="<?=$baseurl?>&page_num=<?=$i?>"><?=$i?></a></li>
    <?php }?>
    <li class="page-item">
    <?=$link?>
    </li>
    
  </ul>
</nav>
</div>