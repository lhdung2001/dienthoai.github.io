<div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <li>
                    <img src="img/h4-slide.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            iPhone <span class="primary">6 <strong>Plus</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Dual SIM</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="img/h4-slide2.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            by one, get one <span class="primary">50% <strong>off</strong></span>
                        </h2>
                        <h4 class="caption subtitle">school supplies & backpacks.*</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="img/h4-slide3.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Select Item</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="img/h4-slide4.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">& Phone</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- ./Slider -->
    </div>
    <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Ngày Đổi Trả</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Miễn phí vận chuyển</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Thanh toán an toàn</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Sản Phẩm Mới</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title" style="font-weight: bold;">SẢN PHẨM MỚI NHẤT</h2>
                        <div class="product-carousel">
                                       <?php foreach($listsp as $sp) {?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="../uploaded/<?=$sp["urlHinh"]?>" alt="">
                                    <div class="product-hover">
                                        <a  href="<?=SITE_URL?>/?ctrl=home&act=cart&idDT=<?=$sp["idDT"]?>"  class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Mua ngay</a>
                                        <a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$sp["idDT"]?>" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                    </div>
                                </div>
                                <h2 style="height: 45px;"><a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$sp["idDT"]?>"><?=$sp["TenDT"]?></a></h2>

                                <div class="product-carousel-price">
                                    <ins><?=number_format($sp["GiaKM"]),""?> VND </ins> <del><?=number_format($sp["Gia"]),""?></del>
                                    <br><small>(Lượt xem:<?=$sp["SoLanXem"]?>)</small>
                                </div>
                                
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content area -->

    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                            <img src="img/brand3.png" alt="">
                            <img src="img/brand4.png" alt="">
                            <img src="img/brand5.png" alt="">
                            <img src="img/brand6.png" alt="">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End brands area -->

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title" style="font-weight: bold;">Mua nhiều nhất</h2>
                        <a href="" class="wid-view-more">Xem tất cả</a>
                        <?php foreach($spmn as $spmn) {?>
                        <div class="single-wid-product">
                            <a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$spmn["idDT"]?>"><img src="../uploaded/<?=$spmn["urlHinh"]?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$spmn["idDT"]?>"><?=$spmn["TenDT"]?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price" style="margin-top: -10px;">
                                <ins><?=number_format($spmn["GiaKM"])?> VND</ins> <del><?=number_format($spmn["Gia"])?></del>
                                <br><small>(Lượt xem:<?=$spmn["SoLanXem"]?>)</small>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title" style="font-weight: bold;">Xem nhiều nhất</h2>
                        <a href="#" class="wid-view-more">Xem tất cả</a>
<?php foreach($spxn as $xnn) {?>
                        <div class="single-wid-product">
                            <a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$xnn["idDT"]?>"><img src="../uploaded/<?=$xnn['urlHinh']?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$xnn["idDT"]?>"><?=$xnn["TenDT"]?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price" style="margin-top: -10px;">
                                <ins><?=number_format($xnn["GiaKM"]), ""?> VND</ins> <del><?=number_format($xnn["Gia"]), ""?></del>
                                <br><small>(Lượt xem:<?=$xnn["SoLanXem"]?>)</small>
                            </div>
                        </div>
<?php }?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title" style="font-weight: bold;">Sản phẩm mới</h2>
                        <a href="#" class="wid-view-more">Xem tất cả</a>
                        <?php foreach($topnew as $topnew) {?>
                        <div class="single-wid-product">
                            <a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$topnew["idDT"]?>"><img src="../uploaded/<?=$topnew["urlHinh"]?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$topnew["idDT"]?>"><?=$topnew["TenDT"]?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price " style="margin-top: -10px;">
                                <ins><?=number_format($topnew["GiaKM"])?></ins> <del><?=number_format($topnew["Gia"]), ""?></del>
                                <br><small>(Lượt xem:<?=$topnew["SoLanXem"]?>)</small>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>