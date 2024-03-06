<?php
require_once "models/model_dienthoai.php"; //nạp model để có các hàm tương tác db
class dienthoai {
     function __construct()   {
        $this->model = new model_dienthoai();
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
        // = $this->model->listrecords();
       $page_num=1;
          if (isset($_GET['page_num'])==true) {
              $page_num= $_GET['page_num'];
          }
          if ($page_num <= 0) {
              $page_num = 1;
          }
          $page_size= PAGE_INDEX;
          // $dt=$this->model->detailDT();
          $list= $this->model->listrecords($page_num, $page_size);
          $total_rows= $this->model->demdienthoai();
          $baseurl= ADMIN_URL."/?ctrl=dienthoai&act=index";
          $links= $this->model->taolinks($baseurl, $page_num, $page_size, $total_rows);
          $link= $this->model->taolink($baseurl, $page_num, $page_size, $total_rows);
          $total_pages=ceil($total_rows/$page_size);
       $page_title="Danh sách điện thoại";
       $page_file = "views/dienthoai_index.php";
       require_once "layout.php";
//        echo __METHOD__;
     }
     function addnew(){
       /*  Chức năng nạp view thêm record,
           1.Nạp form,form này phải có method="post",action của form => store */
      $row = $this->model->listrecordsNSX();
          $page_title="Thêm điện thoại";
          $page_file = "views/dienthoai_addnew.php";
          require_once "layout.php";
          // echo __METHOD__;
     }
     function store(){
       /* Đây là chức năng tiếp nhận dữ liệu từ form addnew (method POST)
         1. Tiếp nhận các giá trị từ form addnew
         2. Kiểm tra hợp lệ các giá trị nhận được
         3. Gọi hàm chèn vào db
         4. Tạo thông báo     
         5. Chuyển hướng đến trang cần thiết*/
         $TenDT = trim(strip_tags($_POST["TenDT"]));
         $mota= trim(strip_tags($_POST["mota"]));
         $idNSX=$_POST["idNSX"];
         $Gia=$_POST["Gia"];
         $GiaKM=$_POST["GiaKM"];
         $ThoiDiemNhap=$_POST["ThoiDiemNhap"];
         $SoLanXem=$_POST["SoLanXem"];
         $SoLanMua=$_POST["SoLanMua"];
         $SoLuongTonKho=$_POST["SoLuongTonKho"];
         $hinh = $_FILES['hinh']['name'];
        $pathimg = '../uploaded/';
        $target_files = $pathimg . basename($hinh);
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target_files);
        $hot =$_POST["hot"]; 
        $AnHien =$_POST["AnHien"];
         settype($AnHien, "int");
         $this->model->store($TenDT, $mota, $hinh, $idNSX, $Gia, $GiaKM, $ThoiDiemNhap, $SoLanXem, $SoLanMua, $SoLuongTonKho, $AnHien, $hot);
         header("location: ".ADMIN_URL."/?ctrl=dienthoai");
      //  echo __METHOD__;
     }
     function edit(){   
        $id=$_GET["idDT"];
        settype($id, "int");
        $row=$this->model->detailrecord($id);
        $rownsx = $this->model->listrecordsNSX();
        $page_title="Sửa Thông tin điện thoại";
       $page_file = "views/dienthoai_edit.php";
       require_once "layout.php";
        //  echo __METHOD__;
     }
     function update(){
        $idDT=$_POST["idDT"];
        $TenDT = trim(strip_tags($_POST["TenDT"]));
         $mota= trim(strip_tags($_POST["mota"]));
         $idNSX=$_POST["idNSX"];
         $Gia=$_POST["Gia"];
         $GiaKM=$_POST["GiaKM"];
         $ThoiDiemNhap=  date_format(date_create($_POST["ThoiDiemNhap"]),"Y/m/d");
         $SoLanXem=$_POST["SoLanXem"];
         $SoLanMua=$_POST["SoLanMua"];
         $SoLuongTonKho=$_POST["SoLuongTonKho"];
         $hinh = $_FILES['hinh']['name'];
         if ($hinh=="") {
           $hinh=$_POST["hinhcu"];
         }
        $pathimg = '../uploaded/';
        $target_files = $pathimg . basename($hinh);
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target_files);
        $hot =$_POST["hot"]; 
        $AnHien =$_POST["AnHien"];
         settype($AnHien, "int");
         $this->model->update($idDT , $TenDT, $mota, $hinh, $idNSX, $Gia, $GiaKM, $ThoiDiemNhap, $SoLanXem, $SoLanMua, $SoLuongTonKho, $AnHien, $hot);
         header("location: ".ADMIN_URL."/?ctrl=dienthoai");
      //  echo __METHOD__;
     }
     function delete(){
       /* Chức năng xóa record
        1. Tiếp nhận biến id của record cần xóa
        2. Gọi hàm xóa
        3. Tạo thông báo
        4. Chuyển đến trang cần thiết*/
        $id=$_GET["idDT"];
        settype($id, "int");
        $this->model->delete($id);
        header("location: ".ADMIN_URL."/?ctrl=dienthoai");
      //  echo __METHOD__;
     }
     /*Đăng xuất*/
}
 //class nhasanxuat 
?>