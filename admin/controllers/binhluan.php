<?php
require_once "models/model_binhluan.php"; //nạp model để có các hàm tương tác db
class binhluan {
     function __construct()   {
        $this->model = new model_binhluan();
        $act = "index";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {    
             case "index": $this->index(); break;
             case "addnew": $this->addnew(); break;
             case "store": $this->store(); break;
             case "edit": $this->edit(); break;
             case "update": $this->update(); break;
             case "delete": $this->delete(); break;
        }
        //$this->$act;
     }
              function index(){
              $page_num=1;
              if (isset($_GET['page_num'])==true) {
              $page_num= $_GET['page_num'];
              }
              if ($page_num <= 0) {
              $page_num = 1;
              }
              $page_size= PAGE_INDEX;

              $list= $this->model->listrecords($page_num, $page_size);
              $total_rows= $this->model->dembinhluan();
              $baseurl= ADMIN_URL."/?ctrl=binhluan&act=index";
              $links= $this->model->taolinks($baseurl, $page_num, $page_size, $total_rows);
              $link= $this->model->taolink($baseurl, $page_num, $page_size, $total_rows);
              $total_pages=ceil($total_rows/$page_size);
              $page_title="Danh sách bình luận";
              $page_file = "views/binhluan_index.php";
              require_once "layout.php";
//        echo __METHOD__;
     }
     function addnew(){
       /*  Chức năng nạp view thêm record,
           1.Nạp form,form này phải có method="post",action của form => store */
               $dt = $this->model->listsdt();
               $us= $this->model->listus();
               $page_title="Thêm bình luận";
               $page_file = "views/binhluan_addnew.php";
               require_once "layout.php";
          // echo __METHOD__;
     }
     function store(){
               $TenDT = $_POST["dt"];
               $user= $_POST["user"];
               settype($TenDT, "int");
               settype($user, "int");
               $noidung=trim(strip_tags($_POST["ndbl"]));
               $AnHien =$_POST["AnHien"];
               settype($AnHien, "int");
               $ngaybl=date("Y-m-d");
               $this->model->store($noidung, $TenDT, $user, $ngaybl, $AnHien);
               header("location: ".ADMIN_URL."/?ctrl=binhluan");
      //  echo __METHOD__;
     }
     function edit(){
        $id=$_GET["idBL"];
        settype($id, "int");
        $row=$this->model->detailrecord($id);
        $dt = $this->model->listsdt();
        $us= $this->model->listus();
        $page_title="Sửa bình luận";
       $page_file = "views/binhluan_edit.php";
       require_once "layout.php";
        //  echo __METHOD__;
     }
     function update(){
       $id=$_POST["idBL"];
      $TenDT = $_POST["dt"];
      $user= $_POST["user"];
      settype($TenDT, "int");
      settype($user, "int");
      $noidung=trim(strip_tags($_POST["ndbl"]));
      $AnHien =$_POST["AnHien"];
      settype($AnHien, "int");
      $ngaybl=date("Y-m-d");
      $this->model->updateBL($id, $noidung, $TenDT, $user, $ngaybl, $AnHien);
      header("location: ".ADMIN_URL."/?ctrl=binhluan");
      //  echo __METHOD__;
     }
     function delete(){
       /* Chức năng xóa record
        1. Tiếp nhận biến id của record cần xóa
        2. Gọi hàm xóa
        3. Tạo thông báo
        4. Chuyển đến trang cần thiết*/
        $id=$_GET["idBL"];
        settype($id, "int");
        $this->model->delete($id);
        header("location: ".ADMIN_URL."/?ctrl=binhluan");
      //  echo __METHOD__;
     }
     /*Đăng xuất*/
}
 //class nhasanxuat 
?>