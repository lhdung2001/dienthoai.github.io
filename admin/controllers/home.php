<?php
 //nạp model để có các hàm tương tác db
class home {
     function __construct()   {
        $act = "index";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {    
             case "index": require_once "layout.php"; break;
        }
      
     }
}
?>