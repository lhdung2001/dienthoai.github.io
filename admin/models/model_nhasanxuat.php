<?php
 require_once '../system/model_system.php';
 class model_nhasanxuat extends model_system {
    function store($TenNSX, $ThuTu, $AnHien){ //hàm lưu 1 record vào table
          $sql = "INSERT into nhasanxuat (TenNSX, ThuTu, AnHien) values ('$TenNSX', '$ThuTu', '$AnHien')";
           $this->execute($sql);    
            }
    function update($id, $TenNSX, $ThuTu, $AnHien){ //hàm cập nhật 1 record vào table
        $sql= "UPDATE nhasanxuat  SET  TenNSX='$TenNSX', ThuTu='$ThuTu', AnHien='$AnHien' where idNSX='$id'";
        $this->execute($sql); 
            }
      function delete($id){  //hàm xóa 1 record khỏi table
          $sql="DELETE FROM nhasanxuat where idNSX=$id";
          $this->execute($sql);
             }
    
    function detailrecord($id){ //hàm lấy chi tiết 1 record trong table
          $sql = "SELECT * FROM nhasanxuat where idNSX=$id";
               $kq= $this->queryOne($sql);
               return $kq;
            }
    function listrecords( $page_num , $page_size){ //hàm lấy các record trong table
                $start_row = ($page_num - 1 ) * $page_size;
                $sql = "select * from nhasanxuat";
                $sql.=" ORDER BY ThuTu ASC LIMIT $start_row, $page_size";
                return $this->query($sql);
            }
    function demNSX() {   
        $sql="SELECT count(*) as sodong FROM  nhasanxuat ";
        $kq = $this->query($sql);
        $row= $kq -> fetch();
        $rowcount = $row['sodong'];
        return $rowcount;
            }
            //link phân trang
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