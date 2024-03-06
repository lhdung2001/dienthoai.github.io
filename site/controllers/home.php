<?php
session_start();
require_once "models/model_home.php"; //nạp model để có các hàm tương tác db
class home {
     function __construct()   {
        $this->model = new model_home();
        $act = "home";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];//chức năng user request
        switch ($act) {    
            case "home": $this->home(); break;
            case "detail": $this->detail(); break;
            case "cat": $this->cat(); break;
            case "danhsach": $this->danhsach(); break;
            case "thongbao": $this->thongbao(); break;
            case "pushcomment": $this->pushcomment(); break;
            case "login": $this->login(); break;   
            case "checklogin": $this->checklogin(); break; 
            case "logout": $this->logout(); break; 
            case "editcmt": $this->editcmt(); break;
            case "updateBL": $this->updateBL(); break;
            case "deleteBL": $this->delete(); break;
            case "search": $this->search(); break;
            case "cart": $this->cart(); break;
            case "cartview": $this->cartview(); break;
            case "giamsl": $this->giamsl(); break;
            case "tangsl": $this->tangsl(); break;
            case "thanhtoan": $this->thanhtoan(); break;
            case "luudonhang": $this->luudonhang(); break;
            case "dangky": $this->dangky(); break;
            case "dangky_": $this->dangky_(); break;
            case "kichhoat": $this->kichhoat(); break;
            case "quenpass": $this->quenpass(); break;
            case "xnemail": $this->xnemail();break;
               case "nhapotp": $this->nhapotp();break;
               case "maOTP": $this->maOTP();break;
               case "doipass": $this->doipass(); break;
               case "doimkuser": $this->doimkuser(); break;
               case "chitietus": $this->chitietus(); break;

              
                }
             //$this->$act;
     }
function home(){
               /*  Chức năng trang chủ
               1. Gọi các hàm trong model lấy dữ liệu cần thiết
               2. Nạp view 
               */
               $nsx = $this->model->getnhasanxuat();
               $listsp = $this->model->sanphamMoi();
               $spxn=$this->model->sanphamXemnhieu();
               $spmn=$this->model->sanphambanchay(); 
               $topnew=$this->model->topnew();          
               $viewFile = "views/home.php";     
               require_once "layout.php";  
    
        }
function detail(){
               $nsx = $this->model->getnhasanxuat();
               $id = $_GET['idDT'];
               settype($id, "int");
               $spl = $this->model->detail($id);
               $comment=$this->model->showbinhluan($id);
               $splq=$this->model->sanphamMoi();
               $this->model->tangsoluotxem($id);   
               // if($sp==FALSE) {
               // header("location: ".SITE_URL."/?ctrl=home&act=thongbao");
               // exit();
               // }
               $viewFile = "views/detail.php";     
               require_once "layout.php";  
               }

function cat(){
               $nsx = $this->model->getnhasanxuat();
               $idNSX = $_GET['id'];
               settype($idNSX, "int");
               $tennsx = $this->model->tenNSX($idNSX);
               $page_num=1;
               if (isset($_GET['page_num'])==true) {
               $page_num= $_GET['page_num'];
               }
               if ($page_num <= 0) {
               $page_num = 1;
               }
               $page_size= 8;
               $listsp = $this->model->sanphamtheoNSX($idNSX, $page_num, $page_size); 
               if($listsp==FALSE) {
               header("location: ". SITE_URL."/?ctrl=home&act=thongbao");
               exit();
               }
               $total_rows= $this->model->demdienthoaitheonsx($idNSX);
               $baseurl= SITE_URL."/?ctrl=home&act=cat&id=$idNSX";
               $links= $this->model->taolinks($baseurl, $page_num, $page_size, $total_rows);
               $link= $this->model->taolink($baseurl, $page_num, $page_size, $total_rows);
               $total_pages=ceil($total_rows/$page_size);
               $viewFile = "views/shop.php";     
               require_once "layout.php";
    }
    function danhsach(){
               $nsx = $this->model->getnhasanxuat();
               $page_num=1;
               if (isset($_GET['page_num'])==true) {
               $page_num= $_GET['page_num'];
               }
               if ($page_num <= 0) {
               $page_num = 1;
               }
               $page_size= 8;
               $listsp = $this->model->danhsachsanpham( $page_num, $page_size); 
               if($listsp==FALSE) {
               header("location: ". SITE_URL."/?ctrl=home&act=thongbao");
               exit();
               }
               $total_rows= $this->model->demdienthoai();
               $baseurl= SITE_URL."/?ctrl=home&act=danhsach";
               $links= $this->model->taolinks($baseurl, $page_num, $page_size, $total_rows);
               $link= $this->model->taolink($baseurl, $page_num, $page_size, $total_rows);
               $total_pages=ceil($total_rows/$page_size);
               $title="DANH SÁCH ĐIỆN THOẠI";
               $viewFile = "views/danhsach.php";     
               require_once "layout.php";
    }
    function thongbao(){
                $nsx = $this->model->getnhasanxuat();
               $viewFile = "views/thongbao.php";     
               require_once "layout.php";
    }
    //themm bình luận
    function pushcomment(){
               $idDT=$_GET["idDT"];
               $noidung=$_POST["review"];
               $idUser=$_SESSION["id"];
               $ngay=date("Y-m-d");
               $this->model->pushcmt($noidung, $idDT, $idUser, $ngay);
               header("location: ".SITE_URL."/?ctrl=home&act=detail&idDT=$idDT");
    }
    function login(){
               $nsx = $this->model->getnhasanxuat();
               $viewFile = "views/login.php";     
               require_once "layout.php";
    }
    function checklogin(){
            if (isset($_POST["dn"])&&($_POST["dn"])) {
               $user= $_POST["user"];
               $pass= md5($_POST["pass"]);
               $check=$this->model->checkdn($user, $pass);
               if (is_array($check)) {
                     $_SESSION["suser"]=$check["Username"];
                     $_SESSION["spass"]=$check["Pass"];
                     $_SESSION["urlHinh"]=$check["urlHinh"];
                     $_SESSION["shoten"]=$check["HoTen"];
                     $_SESSION["email"]=$check["Email"];
                     $_SESSION["id"]=$check["idUser"];
                     $_SESSION["svaitro"]=$check["VaiTro"];
                     unset($_SESSION["messeg"]);
                     $_SESSION["dntc"]="Đăng nhập thành công";
                     header("location: ".SITE_URL."/?ctrl=home");
               }
               else{
                  $_SESSION["tbxn"]="Tài khoản của bạn chưa được kích hoạt";
                  $_SESSION["messeg"]="Sai tài khoản hoặc mật khẩu";
                  header("location: ".SITE_URL."/?ctrl=home&act=login");
               }
               }
   }
    function logout(){
            if ($_GET["thoat"]==1) {
               session_destroy();
               header("location: ".SITE_URL."/?ctrl=home&act=login");
               }
   }
   //edit bình luận
   function editcmt(){
               $nsx = $this->model->getnhasanxuat();
               $idbl = $_GET['idBL'];
               $id = $_GET['idDT'];
               settype($id, "int");
               $sp = $this->model->detail($id);
               $comment=$this->model->showbinhluan($id);
               $editcoment=$this->model->editcomment($idbl);
               $splq=$this->model->sanphamMoi();
               if($sp==FALSE) {
               header("location: ". SITE_URL."/?ctrl=home&act=thongbao");
               exit();
               }
               $viewFile = "views/detail.php";     
               require_once "layout.php";  
      }   
   function updateBL(){
               $idDT=$_GET["idDT"];
               $idbl = $_POST['idBL'];
               $noidung=$_POST["review"];
               $this->model->updateBL($idbl, $noidung);
               header("location: ".SITE_URL."/?ctrl=home&act=detail&idDT=$idDT");        
      }
   function delete(){
               $idDT=$_GET["idDT"];
               $idbl=$_GET['idBL'];
               $this->model->deleteBL($idbl);
               header("location: ".SITE_URL."/?ctrl=home&act=detail&idDT=$idDT"); 
      }
   function search(){
               $key=$_POST["key"];
               $nsx = $this->model->getnhasanxuat();
               $page_num=1;
               if (isset($_GET['page_num'])==true) {
               $page_num= $_GET['page_num'];
               }
               if ($page_num <= 0) {
               $page_num = 1;
               }
               $page_size= 8;
               $listsp = $this->model->danhsachsearch( $key, $page_num, $page_size); 
               if($listsp==FALSE) {
               header("location: ". SITE_URL."/?ctrl=home&act=thongbao");
               exit();
               }
               $total_rows= $this->model->demdienthoaisearch($key);
               $baseurl= SITE_URL."/?ctrl=home&act=danhsach";
               $links= $this->model->taolinks($baseurl, $page_num, $page_size, $total_rows);
               $link= $this->model->taolink($baseurl, $page_num, $page_size, $total_rows);
               $total_pages=ceil($total_rows/$page_size);
               $title="DANH SÁCH ĐIỆN THOẠI";
               $viewFile = "views/danhsach.php";     
               require_once "layout.php";
   }
   function cartview(){
         $spqt= $this->model->getdt();
         $nsx = $this->model->getnhasanxuat();
         $viewFile="views/cart.php";
         require_once "layout.php";
      }

   function cart(){  
         $nsx = $this->model->getnhasanxuat();    
         //Tiếp nhậtn biến id (mã sản phẩm) và what (để biết thêm/xóa sp)
         $id = $_GET['idDT'];  settype($id, "int");        
         $what ="add"; if(isset($_GET['what'])) $what = $_GET['what']; 
         if ($what=="add"){              
         if (isset($_SESSION['giohang'])==false) $_SESSION['giohang']=[]; //tạo mảng rổng nếu chưa có
         $spFromDB = $this->model->detail($id);  //if ($spFromDB==null) ...
         $spInCart = $_SESSION['giohang'][$id]; //['TenDT'=>'A','Amount'=>2]
         if ($spInCart!=null) {
         $soluongtonkho= $this->model->detail($id);
         $soluong=$spInCart['Amount']+1;
            if ($soluongtonkho["SoLuongTonKho"] <= $soluong) {
            $soluong=$soluong["SoLuongTonKho"];
            }
         }
         else
            {
            $soluong = 1;
            }
         $_SESSION['giohang'][$id]=[
         'hinh'=>$spFromDB['urlHinh'],
         'TenDT'=>$spFromDB['TenDT'],
         'Gia'=>$spFromDB['Gia'],
         'Amount' =>$soluong
         ];
         $_SESSION["themghtc"]= true;
         // header("location: ".SITE_URL."/?ctrl=home&act=cartview"); 
         header('Location: ' . $_SERVER['HTTP_REFERER']);
   //  echo "<pre>"; print_r($_SESSION['giohang']);
   }//if what=="add"
   if ($what=="remove"){
   unset($_SESSION['giohang'][$id]);
   }
   if($what=="removeAll"){
   unset($_SESSION['giohang']);
   }   
   $viewFile = "views/cart.php";
   require_once "layout.php";  
   }

   function giamsl(){
      $id=$_GET["idDT"];
      if (is_array($_SESSION["giohang"][$id])&& $_SESSION["giohang"][$id]["Amount"] >=1) {
         $_SESSION["giohang"][$id]["Amount"]=$_SESSION["giohang"][$id]["Amount"]-1;
      }
      if ($_SESSION["giohang"][$id]["Amount"] == 0) {
         unset($_SESSION['giohang'][$id]);
      }
      header("location: ".SITE_URL."/?act=cartview");
}
   function tangsl(){
         $id=$_GET["idDT"];
         if (is_array($_SESSION["giohang"][$id])) {
            $soluong= $this->model->detail($id);
            if ($soluong["SoLuongTonKho"] <= $_SESSION["giohang"][$id]["Amount"]) {
               $_SESSION["giohang"][$id]["Amount"]=$soluong["SoLuongTonKho"];
            }
            else{
            $_SESSION["giohang"][$id]["Amount"]=$_SESSION["giohang"][$id]["Amount"]+1;
            }
         
         }
         header("location: ".SITE_URL."/?act=cartview");
   }
   function thanhtoan(){
      $nsx = $this->model->getnhasanxuat();    
      $viewFile = "views/thanhtoan.php";
      require_once "layout.php";  
   }

   function luudonhang(){
      if (is_array($_SESSION["giohang"])) {
         $idus=$_SESSION["id"];
      $hoten = trim(strip_tags($_SESSION["shoten"]));
      $email = trim(strip_tags($_SESSION["email"]));
      $diachi= trim(strip_tags($_POST['diachi']));
      $sdt=$_POST['sdt'];
      settype($sdt, "int");
      $ghichu=trim(strip_tags($_POST['ghichu']));
      $pptt=trim(strip_tags($_POST['phuongthuctt']));
      $ppgh=trim(strip_tags($_POST["phuongthucnh"]));
      if (isset($_SESSION['idDH'])) $idDH= $_SESSION['idDH']; else $idDH="-1";
      $idDH = $this->model->luudonhangnhe($idDH, $idus, $hoten, $email, $diachi, $sdt, $ghichu, $pptt, $ppgh);
      if ($idDH){
         $_SESSION['idDH'] = $idDH;
         unset($_SESSION['idDH']);
         $giohang = $_SESSION['giohang'];
         $this->model->luugiohangnhe($idDH, $giohang);
         $ttthanhcong=true;
         $nsx = $this->model->getnhasanxuat();
         $listsp = $this->model->sanphamMoi();
         $spxn=$this->model->sanphamXemnhieu();
         $spmn=$this->model->sanphambanchay(); 
         $topnew=$this->model->topnew();           
         $viewFile = "views/home.php";     
         require_once "layout.php";  
      }
   } 
}

//dangky tài khoản
function dangky(){

   $nsx = $this->model->getnhasanxuat();           
   $viewFile = "views/dangky.php";     
   require_once "layout.php"; 
}
function quenpass(){
   $nsx = $this->model->getnhasanxuat();
    $viewFile = "views/quenpass.php";     
   require_once "layout.php";
}

function maOTP(){
   $nsx = $this->model->getnhasanxuat();
    $viewFile = "views/maOTP.php";     
   require_once "layout.php";
}

function dangky_(){
   $ht=trim(strip_tags($_POST["hoten"]));
   $u = trim(strip_tags($_POST["user"]));
   $p1=trim(strip_tags($_POST["pass"]));
   $p2=trim(strip_tags($_POST["repass"]));
   $e=trim(strip_tags($_POST["email"]));
   $thanhcong=TRUE;
   $thongbaoht="";
   if ($ht=="") {
      $thongbaoht.="Bạn nhập họ tên<br>";
      $thanhcong = FALSE;
  }
   
   if ($u=="") {
       $thongbaou="Tên tài khoản chưa nhập <br>";
       $thanhcong = FALSE;
   }
   elseif (strlen($u) < 2) {
       $thongbaou="Tên tài khoản quá ngắn<br>";
       $thanhcong = FALSE;
   }
   elseif ($this->model->checkUserTontai($u) == true) {
       $thongbaou="Tên tài khoản đả tồn tại<br>";
       $thanhcong = FALSE;
   }

   if (strlen($p1) < 3) {
       $thongbaop1="Mật khẩu  quá ngắn<br>";
       $thanhcong = FALSE;
   }
   elseif ($p1 != $p2) {
       $thongbaop2="Mật khẩu không khớp<br>";
       $thanhcong = FALSE;
   }
   else{
      $p1=md5($p1);
  }
   
   if ($e == "") {
       $thongbaoe="Email chưa nhập <br>";
       $thanhcong = FALSE;
   }
   elseif (filter_var($e, FILTER_VALIDATE_EMAIL) == FALSE) {
       $thongbaoe="Email không đúng<br>";
       $thanhcong = FALSE;
   }   
   elseif ($this->model->checkEmailTontai($e) == true) {
       $thongbaoe="Email đả tồn tại<br>";
       $thanhcong = FALSE;
   }
   if ($thanhcong==FALSE) {
      $_SESSION['thongbaoht']=$thongbaoht;
       $_SESSION['thongbaou']=$thongbaou;
       $_SESSION['thongbaoe']=$thongbaoe;
       $_SESSION['thongbaop1']=$thongbaop1;
       $_SESSION['thongbaop2']=$thongbaop2;
       header("location: ". SITE_URL."/?act=dangky");
       exit();
   }
   
      
   
   if ($thanhcong==True) {
       $active=0;
       $randomKey = rand(0, 999999);
       $idUser= $this->model->luuThongTinDangky( $ht ,$u, $p1, $e, $active, $randomKey);
      require_once "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
      require_once "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
      require_once 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
      $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
        try {
            $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $nguoigui = 'ngoanhquoc5@gmail.com';
            $matkhau = 'anhquoc201201';
            $tennguoigui = 'Link kích hoạt tài khoản của bạn';
            $mail->Username = $nguoigui; // SMTP username
            $mail->Password = $matkhau;   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom($nguoigui, $tennguoigui ); 
            $to = $e;
            $to_name = $u;
            
            $mail->addAddress($e, $u); //mail và tên người nhận  
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Gửi thư từ Anh Quốc';      
            $noidungthu = "<b>Kích hoạt tài khoản của bạn!</b><br><a href='". $_SERVER['HTTP_HOST'].SITE_URL.
            "/?act=kichhoat&id=" . $idUser . "'>Nhấp vào đây để kích hoạt</a>" ;
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            echo 'Đã gửi mail xong';
            $_SESSION["guitc"]="Gửi thành công";
        } catch (Exception $e) {
            echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            $_SESSION["guithatbai"]="Gửi thất bại";
        }
        header("location: ". SITE_URL."/?act=login");
      }
}
   function kichhoat(){
      $id=$_GET["id"];
      $this->model->kichhoattk($id);
      $_SESSION["kichhoat"]="Kích hoạt thành công";
      header("location: ". SITE_URL."/?act=login");
   }
   function xnemail(){
      if ($this->model->checkEmailTontai($_POST["email"]) != true) {
         $_SESSION["guithatbai"]="Email không tồn tại";
         header("location: ". SITE_URL."/?act=quenpass");
      }
      else{
         $e=$_POST["email"];
         $u="";
         $_SESSION["emails"]=$e;
         $otp=$this->model->OTP($e);
            require_once "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
            require_once "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
            require_once 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
              try {
                  $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                  $mail->isSMTP();  
                  $mail->CharSet  = "utf-8";
                  $mail->Host = 'smtp.gmail.com';  //SMTP servers
                  $mail->SMTPAuth = true; // Enable authentication
                  $nguoigui = 'ngoanhquoc5@gmail.com';
                  $matkhau = 'anhquoc201201';
                  $tennguoigui = 'Link kích hoạt tài khoản của bạn';
                  $mail->Username = $nguoigui; // SMTP username
                  $mail->Password = $matkhau;   // SMTP password
                  $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                  $mail->Port = 465;  // port to connect to                
                  $mail->setFrom($nguoigui, $tennguoigui ); 
                  $to = $e;
                  $to_name = $u;
                  $maotp=$otp["random_key"];
                  $mail->addAddress($e, $u); //mail và tên người nhận  
                  $mail->isHTML(true);  // Set email format to HTML
                  $mail->Subject = 'Gửi thư từ Anh Quốc';      
                  $noidungthu = "<b>Xác nhận tài khoản. Mã OTP: $maotp </b>" ;
                  $mail->Body = $noidungthu;
                  $mail->smtpConnect( array(
                      "ssl" => array(
                          "verify_peer" => false,
                          "verify_peer_name" => false,
                          "allow_self_signed" => true
                      )
                  ));
                  $mail->send();
                  echo 'Đã gửi mail xong';
                  $_SESSION["guitc1"]="Gửi thành công";
                  header("location: ". SITE_URL."/?act=maOTP");
              } catch (Exception $e) {
                  echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                  $_SESSION["guithatbai"]="Gửi thất bại";
                  header("location: ". SITE_URL."/?act=quenpass");
              }
              
      }
   }
   //nhập mã otp
   function nhapotp(){
      $otp=$_POST["otp"];
      $e=$_SESSION["emails"];
      $otpmoi=rand(0, 999999);
      if ($this->model->ktOTPtontai($e, $otp)==true) {
      $kt=$this->model->ktOTP($e, $otp);
      $iduser=$kt["idUser"];
      $this->model->updateOtp($e, $otpmoi);
      $nsx = $this->model->getnhasanxuat();
      $viewFile = "views/doipass.php";     
      require_once "layout.php";
      }
      else{
         $_SESSION["saiotp"]="Mã otp không đúng";
         header("location: ". SITE_URL."/?act=maOTP");
      }
      
   }
//di chuyển đến trang nhập mã otp


   function doipass(){
      $iduser=$_POST["id"];
      if ($_POST["pass"]==$_POST["repass"]) {   
      // $pass=$_POST["pass"];
      $repass=md5($_POST["repass"]);
      $this->model->updatePass($repass, $iduser);
      $_SESSION["doimktc"]="Đổi mật khẩu thành công";
      header("location: ".SITE_URL."/?act=login");
   }
   else{
      $mkkk="Mật khẩu không khớp";
   }
   $nsx = $this->model->getnhasanxuat();
      $viewFile = "views/doipass.php";     
      require_once "layout.php";
}

function chitietus(){
   $nsx = $this->model->getnhasanxuat();
      $viewFile = "views/chitietuser.php";     
      require_once "layout.php";
}

function doimkuser(){
      $iduser=$_POST["id"];
      $passcu=md5($_POST["passcu"]);
      if ($_POST["pass"]==$_POST["repass"] && $_POST["passcu"]!=$_POST["repass"] && $_POST["passcu"]!=$_POST["pass"] && $this->model->checktaikhoan($iduser, $passcu) == true) {   
      // $pass=$_POST["pass"];
      $repass=md5($_POST["repass"]);
      $this->model->updatePass($repass, $iduser);
      $dmktc="Đổi thành công";
   }
   else{
      $mkkk="Mật khẩu không khớp";
   }
   $nsx = $this->model->getnhasanxuat();
      $viewFile = "views/chitietuser.php";     
      require_once "layout.php";
}
          
 }