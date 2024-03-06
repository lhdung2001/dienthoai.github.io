

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Trang chủ</a>
                            <a href="">Chi tiết</a>
                            <a href=""><?=$spl["TenDT"]?></a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="../uploaded/<?=$spl["urlHinh"]?>" style="width: 80%;" alt="">
                                    </div>

                                    <!-- <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                    </div> -->
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?=$spl["TenDT"]?></h2>
                                    <div class="product-inner-price">
                                        <ins><?=number_format($spl["GiaKM"]),""?> VND</ins> <del><?=number_format($spl["Gia"]),""?> VND</del>
                                    </div>
                                    <a href="<?=SITE_URL?>/?act=cart&idDT=<?=$spl["idDT"]?>" class="add_to_cart_button" style="margin-bottom: 30px;"> Thêm vào giỏ </a>
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Đánh giá</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thông số kỹ thuật</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                
                                                <h2>Bình luận</h2>
                                                <!-- $editcoment -->
                                                <div class="submit-review">
                                                <!--form Sửa bình luận-->
                                                    <?php if (isset($editcoment)) {
                                                        ?>
                                                    <form method="post" action="<?=SITE_URL?>/?ctrl=home&act=updateBL&idDT=<?=$spl["idDT"]?>">
                                                    <input type="hidden" name="idBL" value="<?=$editcoment["idBL"]?>">
                                                    <p><label for="review">Bình luận của bạn</label>
                                                     <textarea name="review" id="" cols="30" rows="10"><?=$editcoment["NoiDungBL"]?></textarea></p>
                                                    <?php if(isset($_SESSION["id"])){
                                                    ?>
                                                    <p><input type="submit" value="Gửi"></p>
                                                    <?php }
                                                    else{
                                                        ?>
                                                        <a href="<?=SITE_URL?>/?ctrl=home&act=login" class="btn btn-primary">Bạn cần phải đăng nhập</a>
                                                        <?php
                                                    }
                                                    ?>
                                                    </form>
                                                    <!--form thêm bình luận-->
                                                        <?php
                                                    } else{
                                                        ?>
                                                        <form method="post" action="<?=SITE_URL?>/?ctrl=home&act=pushcomment&idDT=<?=$spl["idDT"]?>">
                                                    <p><label for="review">Bình luận của bạn</label>
                                                     <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <?php if(isset($_SESSION["id"])){
                                                    ?>
                                                    <p><input type="submit" value="Gửi"></p>
                                                    <?php }
                                                    else{
                                                        ?>
                                                        <a href="<?=SITE_URL?>/?ctrl=home&act=login" class="btn btn-primary">Bạn cần phải đăng nhập</a>
                                                        <?php
                                                    }
                                                    ?>
                                                    </form>
                                                        <?php
                                                    }?>
                                                </div>
                                                
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <table class="table">
                                                  
                                                  <tbody>
                                                    <tr>
                                                      <th scope="row">Màn Hình:</th>
                                                      <td><?=$spl["ManHinh"]?></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Hệ Điều Hành: </th>
                                                      <td><?=$spl["HeDieuHanh"]?></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Camera Sau:</th>
                                                      <td><?=$spl["CameraSau"]?></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Camera Trước:</th>
                                                      <td><?=$spl["CameraTruoc"]?></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">CPU:</th>
                                                      <td><?=$spl["CPU"]?></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">RAM:</th>
                                                      <td><?=$spl["RAM"]?></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Bộ Nhớ Trong:</th>
                                                      <td><?=$spl["BoNhoTrong"]?></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Thẻ Nhớ:</th>
                                                      <td><?=$spl["TheNho"]?></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Sim:</th>
                                                      <td><?=$spl["TheSim"]?></td>
                                                    </tr>
                                                    <tr>
                                                      <th scope="row">Pin:</th>
                                                      <td><?=$spl["DungLuongPin"]?></td>
                                                    </tr>
                                                    
                                                    
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
<div class="row" style="border-top: 1px black solid;">
<div class="row d-flex col-md-12 justify-content-center ">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Bình luận mới nhất</h4>
            </div>
            <div class="comment-widgets" style="overflow: scroll; height: 300px;">
                <!-- Comment Row -->
                                            <?php foreach($comment as $cmt) {?>
                                            <div class="d-flex flex-row comment-row m-t-0">
                                                <div class="p-2"><img src="../uploaded/user/<?php if($cmt["urlHinh"]!="") echo $cmt["urlHinh"]; else echo "user.jpg";?>" alt="user" width="50" class="rounded-circle"></div>
                                                <div class="comment-text w-100">
                                                    <h6 class="font-medium"><?=$cmt["Username"]?></h6> <span class="m-b-15 d-block"><?=$cmt["NoiDungBL"]?> </span>
                                                    <div class="comment-footer"> <span class="text-muted float-right"><?=date_format(date_create($cmt["ThoiDiemBL"]), "d-m-Y")?></span> 
                                                    <a href=""><button type="button" class="btn btn-success btn-sm">Trả lời</button> </a>
                                                    <?php if ($cmt["idUser"]==$_SESSION["id"]) {
                                                        ?>
                                                        <a href="<?=SITE_URL?>/?ctrl=home&act=editcmt&idBL=<?=$cmt["idBL"]?>&idDT=<?=$cmt["idDT"]?>"><button type="button" class="btn btn-cyan btn-sm">Sửa</button></a>
                                                        <a href="<?=SITE_URL?>/?ctrl=home&act=deleteBL&idBL=<?=$cmt["idBL"]?>&idDT=<?=$cmt["idDT"]?>"><button type="button" class="btn btn-danger btn-sm">Xóa</button> </div></a>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <a href=""><button type="button" class="btn btn-cyan btn-sm">Sửa</button></a>
                                                        <a href=""><button type="button" class="btn btn-danger btn-sm">Xóa</button> </div></a>
                                                        
                                                        <?php
                                                    }?>
                                                </div>
                                            </div> 
                                            <?php }?><!-- Comment Row -->
                
                                        </div> <!-- Card -->
                                    </div>
                                </div>
                            </div>
<div class="col-md-12" style=" background-color: #eeee;">
                        <h2>Mô tả</h2>
                        <p><?=$spl["MoTa"]?></p>
                        <div class="related-products-wrapper" >
                            <h2 class="related-products-title">SẢN PHẨM TƯƠNG TỰ</h2>
                            <div class="related-products-carousel">
                                <?php foreach($splq as $lq) {?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="../uploaded/<?=$lq["urlHinh"]?>"  alt="">
                                        <div class="product-hover">
                                            <a href="<?=SITE_URL?>/?ctrl=home&act=cart&idDT=<?=$lq["idDT"]?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</a>
                                            <a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$lq["idDT"]?>" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                        </div>
                                    </div>

                                    <h2><a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$lq["idDT"]?>"><?=$lq["TenDT"]?></a></h2>

                                    <div class="product-carousel-price">
                                        <ins><?=number_format($lq["GiaKM"]),""?> VND</ins> <del><?=number_format($lq["Gia"]),""?> VND</del>
                                        <br><small>(Lượt xem: <?=$lq["SoLanXem"]?>)</small>
                                    </div>
                                </div>
                            <?php }?>
                            </div>
                        </div>
</div>
    

                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .mt-100 {
    margin-top: 100px
}

.mb-100 {
    margin-bottom: 100px
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid transparent;
    border-radius: 0px
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.card .card-title {
    position: relative;
    font-weight: 600;
    margin-bottom: 10px
}

.comment-widgets {
    position: relative;
    margin-bottom: 10px
}

.comment-widgets .comment-row {
    border-bottom: 1px solid transparent;
    padding: 14px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: 10px 0
}

.p-2 {
    padding: 0.5rem !important
}

.comment-text {
    padding-left: 15px
}

.w-100 {
    width: 100% !important
}

.m-b-15 {
    margin-bottom: 15px
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.76563rem;
    line-height: 1.5;
    border-radius: 1px
}

.btn-cyan {
    color: #fff;
    background-color: #27a9e3;
    border-color: #27a9e3
}

.btn-cyan:hover {
    color: #fff;
    background-color: #1a93ca;
    border-color: #198bbe
}

.comment-widgets .comment-row:hover {
    background: rgba(0, 0, 0, 0.05)
}
</style>
    