<?php
 require_once '../system/model_system.php';
 class model_thuoctinh extends model_system {
      function store($id, $HDH, $manhinh, $cameratruoc, $camerasau, $cpu, $ram, $bonho, $thenho, $sim, $pin){ //hàm lưu 1 record vào table
               $sql = "INSERT into thuoctinhdt (idDT, HeDieuHanh, ManHinh,CameraSau, CameraTruoc, CPU, RAM, BoNhoTrong, TheNho, TheSim, DungLuongPin) 
               values ('$id', '$HDH', '$manhinh', '$camerasau', '$cameratruoc', '$cpu', '$ram', '$bonho', '$thenho', '$sim', '$pin')";
               $this->execute($sql);    
      }
     function update($id, $idDT, $HDH, $manhinh, $cameratruoc, $camerasau, $cpu, $ram, $bonho, $thenho, $sim, $pin){ //hàm cập nhật 1 record vào table
               $sql= "UPDATE thuoctinhdt  SET  idDT='$idDT', HeDieuHanh='$HDH', ManHinh='$manhinh', CameraSau='$camerasau', CameraTruoc='$cameratruoc', CPU='$cpu', RAM='$ram', BoNhoTrong='$bonho', TheNho='$thenho', TheSim='$sim', DungLuongPin='$pin' WHERE id=$id";
               $this->execute($sql); 
               }
      function delete($id){  //hàm xóa 1 record khỏi table
               $sql="DELETE FROM thuoctinhdt where id=$id";
               $this->execute($sql);
      }

    function listrecordsDT(){ //hàm lấy các record trong table 
               $sql = "SELECT * FROM dienthoai ";
               $kq= $this->query($sql);
               return $kq;
               }           
    function detailrecord($id){ //hàm lấy chi tiết 1 record trong table
               $sql = "SELECT * FROM thuoctinhdt tc inner join dienthoai dt on tc.idDT=dt.idDT where id=$id";
               $kq= $this->queryOne($sql);
               return $kq;
      }
    function listrecords($page_num, $page_size){
               $start_row = ($page_num - 1 ) * $page_size;
               $sql = "select * from thuoctinhdt tc inner join dienthoai dt on tc.idDT=dt.idDT";
               $sql.=" ORDER BY id DESC LIMIT $start_row, $page_size";
               return $this->query($sql);
      }
    function demthuoctinh() {   
               $sql="SELECT count(*) as sodong FROM  thuoctinhdt";
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