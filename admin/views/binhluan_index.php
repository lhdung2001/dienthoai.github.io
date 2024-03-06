
<table class="table table-bordered table-hover" >
  <thead>
    <tr>
      <th scope="col" class="text-center">STT</th>
      <th scope="col">Tên </th>
      <th scope="col">Nội dung</th>
      <th scope="col">Ngày bình luận</th>
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
    $dt=$this->model->detailDT($row["idDT"]);
    $us=$this->model->detailusers($row["idUser"]);
   ?>
    <tr>
      <th class="text-center" scope="row"><?php echo $stt;?></th>
      <td>
               <p>Tên ĐT: <strong><?php echo $dt["TenDT"]; ?></strong></p>
               <p>Người đăng: <strong><?php echo $us["Username"]?></strong></p>

      </td>
      <td ><?=$row["NoiDungBL"]?></td>
      <td> <?=date_format(date_create($row["ThoiDiemBL"]), "d-m-Y")?></td>             
      <td>
      <?php if($row["AnHien"]==1) echo "Hiện"; else echo "Ẩn";?>
      </td>
      <td class="text-center"><a class="btn btn-danger" href="<?=ADMIN_URL?>/?ctrl=binhluan&act=edit&idBL=<?=$row["idBL"]?>">Sửa</a></td>
      <td class="text-center"><a class="btn btn-dark" href="javascript:Delete('<?=ADMIN_URL?>/?ctrl=binhluan&act=delete&idBL=<?=$row["idBL"]?>')">Xóa</a></td>
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