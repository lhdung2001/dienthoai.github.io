<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 >DANH SÁCH ĐIỆN THOẠI</h2>
               
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($key))
{
    ?>
    <div class="container" style="margin-top: 30px; margin-bottom: -30px;">
    <p style="">Kết quả tiềm kiếm với từ khóa: <strong><?php echo $key;?></strong></p>
    </div>
    <?php
}
?>
<div class="single-product-area">

    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php foreach($listsp as $listsp){?>
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                    <a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$listsp["idDT"]?>">
                        <img src="../uploaded/<?=$listsp["urlHinh"]?>" alt="">
                        </a>
                    </div>
                    <h2 style="height: 40px;"><a href="<?=SITE_URL?>/?ctrl=home&act=detail&idDT=<?=$listsp["idDT"]?>"><?=$listsp["TenDT"]?></a></h2>
                    <div class="product-carousel-price" >
                        <ins><?=number_format($listsp["GiaKM"]),""?> VND</ins> <del><?=number_format($listsp["Gia"]),""?></del>
                        <br><small>(Lượt xem: <?=$listsp["SoLanXem"]?>)</small>
                    </div>

                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" href="<?=SITE_URL?>/?act=cart&idDT=<?=$listsp["idDT"]?>" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            <?php }?>
            
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                            <li>
                            <?=$links?>
                            </li>
                            <?php for ($i=1; $i<=$total_pages  ; $i++) { 
                            ?>
                                <li class="page-item <?php if($page_num == $i) echo "active bg-danger";?>" ><a class="page-link" href="<?=$baseurl?>&page_num=<?=$i?>"><?=$i?></a></li>
                                <?php }?>
                            <li>
                            <?=$link?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>