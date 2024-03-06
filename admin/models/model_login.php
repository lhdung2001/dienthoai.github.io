<?php

 class model_login extends model_system {
      function checkdn($user, $pass){ //hàm lấy chi tiết 1 record trong table
               $sql = "SELECT * FROM users WHERE Username = '$user' AND Pass = '$pass'";
               $kq= $this->queryOne($sql);
               return $kq;
      }
 }//class 