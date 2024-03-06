<?php
 require_once '../system/model_system.php';
 class model_home extends model_system {
                //Trang chủ
               function sanphamMoi($sd=6){
                              $sql="SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY idDT ASC LIMIT 0, $sd";
                              $kq = $this->query($sql);
                              return $kq;
                              }
               function topnew($sd=3){
                              $sql="SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY idDT ASC LIMIT 0, $sd";
                              $kq = $this->query($sql);
                              return $kq;
                              }
               function sanphamXemnhieu($sd=3){
                              $sql="SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY SoLanXem DESC LIMIT 0, $sd";
                              $kq = $this->query($sql);
                              return $kq;
                              }
               function sanphambanchay($sd=3){
                              $sql="SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY SoLanMua ASC LIMIT 0, $sd";
                              $kq = $this->query($sql);
                              return $kq;
                              }
               function getnhasanxuat(){
                              $sql="SELECT * FROM nhasanxuat";
                              return $this->query($sql);
                              }
                function getdt(){
                                $sql="SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY idDT DESC LIMIT 0, 2";
                                $kq = $this->query($sql);
                                return $kq;
                                }
                              //end trang chủ
               function sanphamtheoNSX($idNSX, $page_num, $page_size){ 
                              $start_row = ($page_num - 1 ) * $page_size;
                              $sql = "SELECT * FROM dienthoai WHERE AnHien=1 AND idNSX=$idNSX 
                                      ORDER BY ThoiDiemNhap DESC LIMIT $start_row, $page_size";
                              $kq= $this->query($sql);
                              return $kq;
                              }
               function demdienthoaitheonsx($idNSX) {   
                              $sql="SELECT count(*) as sodong FROM  dienthoai WHERE  idNSX=$idNSX ";
                              $kq = $this->query($sql);
                              $row= $kq -> fetch();
                              $rowcount = $row['sodong'];
                              return $rowcount;
                              }
               function tenNSX($idNSX){ 
                              $sql = "SELECT * FROM NhaSanXuat WHERE AnHien=1 AND idNSX=$idNSX ";
                              $kq= $this->queryOne($sql);
                              return $kq;
                              }
               //danh sách điện thoại trong trang danh sách
               function danhsachsanpham( $page_num, $page_size){ 
                              $start_row = ($page_num - 1 ) * $page_size;
                              $sql = "SELECT * FROM dienthoai WHERE AnHien=1  ORDER BY ThoiDiemNhap DESC LIMIT $start_row, $page_size";
                              $kq= $this->query($sql);
                              return $kq;
                              }
               function demdienthoai() {   
                              $sql="SELECT count(*) as sodong FROM  dienthoai ";
                              $kq = $this->query($sql);
                              $row= $kq -> fetch();
                              $rowcount = $row['sodong'];
                              return $rowcount;
                              }
               //Link phân trang
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

               //Trang chi tiết
               function detail($id){   
                                $sql = "SELECT * FROM dienthoai dt inner join thuoctinhdt ttd on dt.idDT=ttd.idDT WHERE dt.AnHien=1 AND dt.idDT=$id";
                                $kq= $this->query($sql);
                                if (!$kq) return FALSE;
                                $row = $kq -> fetch();
                                return $row;
                              }
                function tangsoluotxem($id){
                                $sql="UPDATE dienthoai SET SoLanXem = SoLanXem + 1 where idDT=$id";
                                $this->execute($sql);
                }
                
                //login
                function checkdn($user, $pass){ //hàm lấy chi tiết 1 record trong table
                                $sql = "SELECT * FROM users WHERE Username = '$user' AND Pass = '$pass'";
                                $kq= $this->queryOne($sql);
                                return $kq;
                }
                //Bình luận
                function showbinhluan($id){
                                $sql="SELECT * FROM binhluan bl inner join dienthoai dt on bl.idDT=dt.idDT 
                                inner join users us on bl.idUser = us.idUser  WHERE bl.idDT = '$id' AND bl.AnHien = 1 ORDER BY idBL DESC ";
                                $kq= $this->query($sql);
                                return $kq;
                }
                function pushcmt($noidung, $idDT, $idUser, $ngay){
                                $sql = "INSERT into binhluan (NoiDungBL, idDT, idUser, ThoiDiemBL, AnHien) 
                                values ('$noidung', '$idDT', '$idUser', '$ngay', 1)";
                                $this->execute($sql);  
                }
                function editcomment($idbl){
                                $sql = "SELECT * FROM binhluan WHERE idBL = '$idbl' ";
                                $kq= $this->queryOne($sql);
                                return $kq;
                }
                function updateBL($idbl, $noidung){ //hàm cập nhật 1 record vào table
                                $sql= "UPDATE binhluan  SET  NoiDungBL='$noidung' where idBL ='$idbl'";
                                $this->execute($sql); 
                }
                function deleteBL($idbl){
                                $sql="DELETE  FROM binhluan WHERE idBL=$idbl";
                                $this->execute($sql);
                }

                //search
                function danhsachsearch( $key, $page_num, $page_size){ 
                                $start_row = ($page_num - 1 ) * $page_size;
                                $sql = "SELECT * FROM dienthoai WHERE AnHien=1 and TenDT like '%$key%' or MoTa like '%$key%' ORDER BY ThoiDiemNhap DESC LIMIT $start_row, $page_size";
                                $kq= $this->query($sql);
                                return $kq;
                  }
                  function demdienthoaisearch($key) {   
                                $sql="SELECT count(*) as sodong FROM  dienthoai where TenDT like '%$key%' or MoTa like '%$key%' ";
                                $kq = $this->query($sql);
                                $row= $kq -> fetch();
                                $rowcount = $row['sodong'];
                                return $rowcount;
                  }
//Lưu giỏ hàng vào database
                  function luudonhangnhe($idDH, $idus, $ht, $email, $diachi, $sdt, $ghichu, $pptt, $ppgh){            
                    if ($idDH==-1){
                            $sql = "INSERT INTO donhang SET idUser='{$idus}', TenNguoiNhan='{$ht}', emailNguoiNhan='{$email}',"
                            . "ThoiDiemDatHang=Now(),DiaChiNguoiNhan='{$diachi}', sdt='{$sdt}', AnHien=1, GhiChuCuaKhach='{$ghichu}', Phuongthucthanhtoan='{$pptt}', Phuongthucgiaohang='{$ppgh}'";              
                            $kq= $this->query($sql);
                            if (!$kq) return false;
                            else return $this->conn->lastInsertId();
                    } else {
                            $sql = "UPDATE donhang SET idUser='{$idus}', TenNguoiNhan='{$ht}', emailNguoiNhan='{$email}',"
                            . "ThoiDiemDatHang=Now(),DiaChiNguoiNhan='{$diachi}', sdt='{$sdt}', AnHien=1, GhiChuCuaKhach='{$ghichu}',  Phuongthucthanhtoan='{$pptt}', Phuongthucgiaohang='{$ppgh}' where idDH=$idDH";              
                            $kq= $this->query($sql);
                            if (!$kq) return false;
                            else return $idDH;
                            }
                 }//function luudonhangnh
                  function luugiohangnhe($idDH, $giohang){
                            $sql = "DELETE FROM donhangchitiet WHERE idDH='$idDH'";
                            $this->query($sql);
                            foreach ($giohang as $idDT=>$dt){
                            $tenDT = $dt['TenDT'];
                            $gia= $dt['Gia'];
                            $Amount= $dt['Amount'];
                            $urlHinh=$dt['hinh'];
                            $sql = "INSERT INTO donhangchitiet SET idDH='$idDH', idDT= '$idDT', "           . "TenDT='{$tenDT}', Gia='{$gia}', SoLuong='$Amount', urlHinh='$urlHinh'";
                            $kq= $this->query($sql);
                            }//foreach
                  }

                  function checkUserTontai($username){
                        $sql="SELECT count(*) as sodong FROM users WHERE Username='$username'";
                        $kq= $this->query($sql);
                        $row= $kq -> fetch();
                        $rowcount = $row ['sodong'];
                        return $rowcount>0; //true là khi user tồn tại
                    }
                    function checkEmailTontai($e){
                        $sql="SELECT count(*) as sodong FROM users WHERE Email='$e'";
                        $kq= $this->query($sql);
                        $row= $kq -> fetch();
                        $rowcount = $row ['sodong'];
                        return $rowcount>0; //true là khi user tồn tại
                    }
                    function luuThongTinDangky($ht, $u, $p1, $e, $active, $randomKey){
                        $conn = $this->getConnection();
                        $sql="INSERT INTO users(HoTen, Username, Pass, Email, KichHoat, random_key) VALUES ('$ht', '$u', '$p1', '$e', '$active', '$randomKey' ) ";
                        $conn->exec($sql);
                        $idUser = $conn->lastInsertId();
                        return $idUser;
                    }

                    //kích hoạt tk
                    function kichhoattk($id){
                        $sql="UPDATE users SET KichHoat=1 where idUser='$id'";
                        $this->execute($sql);
                }
                function OTP($e){
                        $sql="SELECT * FROM users WHERE Email='$e'";
                        $kq=$this->queryOne($sql);
                        return $kq;
                }
                function ktOTPtontai($e, $otp){
                        $sql="SELECT count(*) as sodong FROM users WHERE Email='$e'and random_key='$otp'";
                        $kq= $this->query($sql);
                        $row= $kq -> fetch();
                        $rowcount = $row ['sodong'];
                        return $rowcount>0; //true là khi user tồn tại
                    }

                    function ktOTP($e, $otp){
                        $sql="SELECT * FROM users WHERE Email='$e'and random_key='$otp'";
                        $kq=$this->queryOne($sql);
                        return $kq;
                }
                function updateOtp($e, $otpmoi){
                        $sql="UPDATE users SET random_key='$otpmoi' where Email='$e'";
                        $this->execute($sql);
                }
                function updatePass($repass, $iduser){
                        $sql="UPDATE users SET Pass='$repass' where idUser='$iduser'";
                        $this->execute($sql);
                }
                function checktaikhoan($iduser, $passcu){
                        $sql="SELECT count(*) as sodong FROM users WHERE idUser='$iduser'and Pass='$passcu'";
                        $kq= $this->query($sql);
                        $row= $kq -> fetch();
                        $rowcount = $row ['sodong'];
                        return $rowcount>0;
                }

 } 