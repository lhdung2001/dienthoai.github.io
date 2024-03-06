<?php
 require_once '../system/model_system.php';
 class model_dienthoai extends model_system {
      function store($TenDT, $mota, $hinh, $idNSX, $Gia, $GiaKM, $ThoiDiemNhap, $SoLanXem, $SoLanMua, $SoLuongTonKho, $AnHien, $hot){ //hàm lưu 1 record vào table
          $sql = "INSERT into dienthoai (TenDT, MoTa, urlHinh, idNSX, Gia, GiaKM, ThoiDiemNhap, SoLanXem, SoLanMua, SoLuongTonKho, AnHien, Hot) 
          values ('$TenDT', '$mota', '$hinh', '$idNSX', '$Gia', '$GiaKM', '$ThoiDiemNhap', '$SoLanXem', '$SoLanMua', '$SoLuongTonKho', '$AnHien', '$hot')";
           $this->execute($sql);    
      }
     function update($idDT , $TenDT, $mota, $hinh, $idNSX, $Gia, $GiaKM, $ThoiDiemNhap, $SoLanXem, $SoLanMua, $SoLuongTonKho, $AnHien, $hot){ //hàm cập nhật 1 record vào table
     $sql= "UPDATE dienthoai  SET  TenDT='$TenDT', MoTa='$mota', urlHinh='$hinh', idNSX='$idNSX', Gia='$Gia', GiaKM='$GiaKM', ThoiDiemNhap='$ThoiDiemNhap', SoLanXem='$SoLanXem', SoLanMua = '$SoLanMua', SoLuongTonKho='$SoLuongTonKho', AnHien='$AnHien', Hot='$hot' where idDT='$idDT'";
     $this->execute($sql); 
     }
      function delete($id){  //hàm xóa 1 record khỏi table
          $sql="DELETE FROM dienthoai where idDT=$id";
          $this->execute($sql);
      }
    //    function listrecords(){ //hàm lấy các record trong table 
    //            $sql = "SELECT * FROM dienthoai  dt inner join nhasanxuat nsx on dt.idNSX=nsx.idNSX";
    //            $kq= $this->query($sql);
    //            return $kq;
    //            } 
    function listrecordsNSX(){ //hàm lấy các record trong table 
               $sql = "SELECT * FROM nhasanxuat";
               $kq= $this->query($sql);
               return $kq;
               }           
    function detailrecord($id){ //hàm lấy chi tiết 1 record trong table
          $sql = "SELECT * FROM dienthoai where idDT=$id";
               $kq= $this->queryOne($sql);
               return $kq;
      }
    function listrecords($page_num, $page_size){
          $start_row = ($page_num - 1 ) * $page_size;
          $sql = "select * from dienthoai dt inner join nhasanxuat nsx on dt.idNSX=nsx.idNSX";
          $sql.=" ORDER BY ThoiDiemNhap DESC LIMIT $start_row, $page_size";
          return $this->query($sql);
      }
    function demdienthoai() {   
          $sql="SELECT count(*) as sodong FROM  dienthoai ";
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