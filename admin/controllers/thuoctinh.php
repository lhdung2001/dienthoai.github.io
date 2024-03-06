<?php
require_once "models/model_thuoctinh.php"; //nạp model để có các hàm tương tác db
class thuoctinh {
     function __construct()   {
        $this->model = new model_thuoctinh();
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
          $list= $this->model->listrecords($page_num, $page_size);
          $total_rows= $this->model->demthuoctinh();
          $baseurl= ADMIN_URL."/?ctrl=thuoctinh&act=index";
          $links= $this->model->taolinks($baseurl, $page_num, $page_size, $total_rows);
          $link= $this->model->taolink($baseurl, $page_num, $page_size, $total_rows);
          $total_pages=ceil($total_rows/$page_size);
       $page_title="Danh sách thuộc tính điện thoại";
       $page_file = "views/thuoctinh_index.php";
       require_once "layout.php";
//        echo __METHOD__;
     }
     function addnew(){
       /*  Chức năng nạp view thêm record,
           1.Nạp form,form này phải có method="post",action của form => store */
          $row = $this->model->listrecordsDT();
          $page_title="Thêm thuộc tính";
          $page_file = "views/thuoctinh_addnew.php";
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
         $id=$_POST["idDT"];
         $HDH = trim(strip_tags($_POST["HeDieuHanh"]));
         $manhinh= trim(strip_tags($_POST["ManHinh"]));
         $cameratruoc= trim(strip_tags($_POST["Cameratruoc"]));
         $camerasau= trim(strip_tags($_POST["Camerasau"]));
         $cpu= trim(strip_tags($_POST["cpu"]));
         $ram= trim(strip_tags($_POST["ram"]));
         $bonho= settype($_POST["bonho"], "int");
         $thenho= trim(strip_tags($_POST["thenho"]));
         $sim= trim(strip_tags($_POST["sim"]));
         $pin= trim(strip_tags($_POST["pin"]));
         $this->model->store($id, $HDH, $manhinh, $cameratruoc, $camerasau, $cpu, $ram, $bonho, $thenho, $sim, $pin);
         header("location: ".ADMIN_URL."/?ctrl=thuoctinh");
      //  echo __METHOD__;
     }
     function edit(){
       /* Chức năng hiện form edit 1 record
         1. Tiếp nhận biến id của record cần chỉnh (ma_hh, ma_loai,...)
         2. Kiểm tra hợp lệ giá trị id
         3. Gọi hàm lấy record cần chỉnh (1 record)
         4. Nạp form chỉnh, trong form hiện thông tin của record,
         5. Form này cũng phải có method là Post, action trỏ lên act update*/     
        $id=$_GET["id"];
        settype($id, "int");
        $dt=$this->model->listrecordsDT();
        $rowtc=$this->model->detailrecord($id);
        $page_title="Sửa thông tin thuộc tính";
        $page_file = "views/thuoctinh_edit.php";
       require_once "layout.php";
        //  echo __METHOD__;
     }
     function update(){
         $id=$_POST["id"];
         $idDT=$_POST["idDT"];
         $HDH = trim(strip_tags($_POST["HeDieuHanh"]));
         $manhinh= trim(strip_tags($_POST["ManHinh"]));
         $cameratruoc= trim(strip_tags($_POST["Cameratruoc"]));
         $camerasau= trim(strip_tags($_POST["Camerasau"]));
         $cpu= trim(strip_tags($_POST["cpu"]));
         $ram= trim(strip_tags($_POST["ram"]));
         $bonho= $_POST["bonho"];
         $thenho= trim(strip_tags($_POST["thenho"]));
         $sim= trim(strip_tags($_POST["sim"]));
         $pin= trim(strip_tags($_POST["pin"]));
         settype($bonho, "int");
         $this->model->update($id,$idDT, $HDH, $manhinh, $cameratruoc, $camerasau, $cpu, $ram, $bonho, $thenho, $sim, $pin);
         header("location: ".ADMIN_URL."/?ctrl=thuoctinh");
      //  echo __METHOD__;
     }
     function delete(){
       /* Chức năng xóa record
        1. Tiếp nhận biến id của record cần xóa
        2. Gọi hàm xóa
        3. Tạo thông báo
        4. Chuyển đến trang cần thiết*/
        $id=$_GET["id"];
        settype($id, "int");
        $this->model->delete($id);
        header("location: ".ADMIN_URL."/?ctrl=thuoctinh");
      //  echo __METHOD__;
     }
     /*Đăng xuất*/
}
 //class nhasanxuat 
?>