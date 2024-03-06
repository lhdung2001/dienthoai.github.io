<?php
require_once "models/model_users.php"; //nạp model để có các hàm tương tác db
class users {
     function __construct()   {
        $this->model = new model_user();
        $act = "index";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {    
             case "index": $this->index(); break;
             case "addnew": $this->addnew(); break;
             case "store": $this->store(); break;
             case "edit": $this->edit(); break;
             case "update": $this->update(); break;
             case "delete": $this->delete(); break;
             case "logout": $this->logout(); break;
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
          $total_rows= $this->model->demUser();
          $baseurl= ADMIN_URL."/?ctrl=users&act=index";
          $links= $this->model->taolinks($baseurl, $page_num, $page_size, $total_rows);
          $link= $this->model->taolink($baseurl, $page_num, $page_size, $total_rows);
          $total_pages=ceil($total_rows/$page_size);
       $page_title="Danh sách tài khoản";
       $page_file = "views/thanhvien_index.php";
       require_once "layout.php";
//        echo __METHOD__;
     }
     function addnew(){
       /*  Chức năng nạp view thêm record,
           1.Nạp form,form này phải có method="post",action của form => store */
       $page_title="Thêm tài khoản";
       $page_file = "views/thanhvien_add.php";
       require_once "layout.php";
      //  echo __METHOD__;
     }
     function store(){
       /* Đây là chức năng tiếp nhận dữ liệu từ form addnew (method POST)
         1. Tiếp nhận các giá trị từ form addnew
         2. Kiểm tra hợp lệ các giá trị nhận được
         3. Gọi hàm chèn vào db
         4. Tạo thông báo     
         5. Chuyển hướng đến trang cần thiết*/
         $Username = trim(strip_tags($_POST["Username"]));
         $Pass = md5(trim(strip_tags($_POST["Pass"])));
         $HoTen= trim(strip_tags($_POST["HoTen"]));
         $KichHoat=$_POST["KichHoat"];
         $hinh = $_FILES['hinh']['name'];
        $pathimg = '../uploaded/user/';
        $target_files = $pathimg . basename($hinh);
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target_files);
         $Email= $_POST["Email"];
         $VaiTro=$_POST["VaiTro"];
         $AnHien =$_POST["AnHien"];
         settype($ThuTu, "int");
         settype($AnHien, "int");
         settype($KichHoat, "int");
         $this->model->store($Username, $Pass, $HoTen, $KichHoat, $hinh, $Email, $VaiTro, $AnHien);
         header("location: ".ADMIN_URL."/?ctrl=users");
      //  echo __METHOD__;
     }
     function edit(){
       /* Chức năng hiện form edit 1 record
         1. Tiếp nhận biến id của record cần chỉnh (ma_hh, ma_loai,...)
         2. Kiểm tra hợp lệ giá trị id
         3. Gọi hàm lấy record cần chỉnh (1 record)
         4. Nạp form chỉnh, trong form hiện thông tin của record,
         5. Form này cũng phải có method là Post, action trỏ lên act update*/     
        $id=$_GET["idUser"];
        settype($id, "int");
        $row=$this->model->detailrecord($id);
        $page_title="Sửa thông tin tài khoản";
       $page_file = "views/thanhvien_edit.php";
       require_once "layout.php";
        //  echo __METHOD__;
     }
     function update(){
       /* Đây là chức năng tiếp nhận dữ liệu từ form edit (method POST)
        1. Tiếp nhận các giá trị từ form edit
        2. Kiểm tra hợp lệ các giá trị nhận được
        3. Gọi hàm cập nhật vào db
        4. Tạo thông báo     
        5. Chuyển hướng đến trang cần thiết */
        $id=$_POST["idUser"];
        $Username = trim(strip_tags($_POST["Username"]));
        
        if ($_POST["Pass"]=="") {
          $Pass=$_POST["Passcu"];
        }
        else{
          $Pass = md5(trim(strip_tags($_POST["Pass"])));
        }
        $HoTen= trim(strip_tags($_POST["HoTen"]));
        $KichHoat=$_POST["KichHoat"];
        $hinh = $_FILES['hinh']['name'];
        if ($hinh=="") {
          $hinh=$_POST["hinhcu"];
        }
        else{
        $pathimg = '../uploaded/user/';
        $target_files = $pathimg . basename($hinh);
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target_files);
        }
        $Email= $_POST["Email"];
        $VaiTro=$_POST["VaiTro"];
        $AnHien =$_POST["AnHien"];
        settype($ThuTu, "int");
        settype($AnHien, "int");
        settype($KichHoat, "int");
        $this->model->update($id, $Username, $Pass, $HoTen, $KichHoat, $hinh, $Email, $VaiTro, $AnHien);
        header("location: ".ADMIN_URL."/?ctrl=users");
      //  echo __METHOD__;
     }
     function delete(){
       /* Chức năng xóa record
        1. Tiếp nhận biến id của record cần xóa
        2. Gọi hàm xóa
        3. Tạo thông báo
        4. Chuyển đến trang cần thiết*/
        $id=$_GET["idUser"];
        settype($id, "int");
        $this->model->delete($id);
        header("location: ".ADMIN_URL."/?ctrl=users");
      //  echo __METHOD__;
     }
     function logout(){
               if ($_GET["thoat"]==1) {
               session_destroy();
               header("location: login.php");
               }
     }
}
 //class nhasanxuat 
?>