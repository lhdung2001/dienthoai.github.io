<?php
 require_once '../system/model_system.php';
 class model_binhluan extends model_system {
      function store($noidung, $TenDT, $user, $ngaybl, $AnHien){ //hàm lưu 1 record vào table
          $sql = "INSERT into binhluan (NoiDungBL, idDT, idUser, ThoiDiemBL, AnHien) 
          values ('$noidung', '$TenDT', '$user', '$ngaybl', $AnHien )";
           $this->execute($sql);    
      }
     function updateBL($id, $noidung, $TenDT, $user, $ngaybl, $AnHien){ //hàm cập nhật 1 record vào table
     $sql= "UPDATE binhluan  SET   NoiDungBL='$noidung', idDT='$TenDT', idUser='$user', ThoiDiemBL='$ngaybl', AnHien='$AnHien' where idBL='$id'";
     $this->execute($sql); 
     }
      function delete($id){  //hàm xóa 1 record khỏi table
          $sql="DELETE FROM binhluan where idBL=$id";
          $this->execute($sql);
      }
       function detailrecord($id){ //hàm lấy các record trong table 
               $sql = "SELECT * FROM binhluan where idBL=$id";
               $kq= $this->queryOne($sql);
               return $kq;
               } 
             
      function listsdt(){ //hàm lấy chi tiết 1 record trong table
               $sql = "SELECT * FROM dienthoai ";
                              $kq= $this->query($sql);
                              return $kq;
               }
      function listus(){ //hàm lấy chi tiết 1 record trong table
               $sql = "SELECT * FROM users ";
                              $kq= $this->query($sql);
                              return $kq;
               }
//show điện thoại
    function detailDT($id){ //hàm lấy chi tiết 1 record trong table
               $sql = "SELECT * FROM dienthoai where idDT=$id";
               $kq= $this->queryOne($sql);
               return $kq;
      }
      function detailusers($id){ //hàm lấy chi tiết 1 record trong table
               $sql = "SELECT * FROM users where idUser=$id";
               $kq= $this->queryOne($sql);
               return $kq;
      }
    function listrecords($page_num, $page_size){
               $start_row = ($page_num - 1 ) * $page_size;
               $sql = "SELECT * from binhluan  ORDER BY idBL DESC LIMIT $start_row, $page_size";
               return $this->query($sql);
      }
    function dembinhluan() {   
               $sql="SELECT count(*) as sodong FROM  binhluan ";
               $kq = $this->query($sql);
               $row= $kq -> fetch();
               $rowcount = $row['sodong'];
               return $rowcount;
      }

    function taolinks($baseurl, $page_num, $page_size, $total_rows){
          if ($total_rows<=0) {
              return "";
          }
          $total_pages=ceil($total_rows/$page_size);
          if ($total_pages<=1) {
              return "";
          }
          
          if ($page_num>=2){
              $links="<li class='page-item'><a href='{$baseurl}' class='page-link'><<</a></li>"; 
              $pr = $page_num-1;
              $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pr}' class='page-link'> <</a></li>";
            }
          //   $links.="<li class='page-item active'><span class='page-link'>{$page_num}</span></li>";
                  
         
          return $links;
      }
      
    function taolink($baseurl, $page_num, $page_size, $total_rows){
          if ($total_rows<=0) {
              return "";
          }
          $total_pages=ceil($total_rows/$page_size);
          if ($total_pages<=1) {
              return "";
          }
          //   $links.="<li class='page-item active'><span class='page-link'>{$page_num}</span></li>";
            if ($page_num < $total_pages){
              $pn = $page_num + 1;
              $link="<li class='page-item'><a href='{$baseurl}&page_num={$pn}' class='page-link'> > </a></li>";        
              $link.="<li class='page-item'><a href='{$baseurl}&page_num={$total_pages}' class= 'page-link'>>></a></li>";
            }
                  
          return $link;
      }
 }//class 