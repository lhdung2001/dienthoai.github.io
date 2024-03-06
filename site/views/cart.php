
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Giỏ hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                        <th >STT</th>
                                            <th class="product-thumbnail">Hình</th>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng tiền</th>
                                            <th class="product-remove" style="color: red;">&nbsp;</th>
                                        </tr>
                                    </thead>
                                   
                                  
                                    <tbody>
                                        <?php $stt=0; foreach ($_SESSION["giohang"] as $idproduct => $sp) 
                                             { $stt+=1; ?>
                                        <tr class="cart_item">
                                            
                                                <td><?=$stt?></td>
                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145"  class="shop_thumbnail" src="../uploaded/<?=$sp["hinh"]?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?=$sp["TenDT"]?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?=number_format($sp["Gia"]), ""?> VND</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                <a href="<?=SITE_URL?>/?act=giamsl&idDT=<?=$idproduct?>">
                                                    <input type="button" class="minus" value="-">
                                                </a>
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="<?=$sp["Amount"]?>" min="0" step="1">
                                                    <a href="<?=SITE_URL?>/?act=tangsl&idDT=<?=$idproduct?>">   
                                                    <input type="button" class="plus" value="+">
                                                    </a>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount"><?=number_format($sp["Amount"]*$sp["Gia"]), ""?> VND</span> 
                                            </td>
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="<?=SITE_URL?>?act=cart&what=remove&idDT=<?=$idproduct?>"> <i class="fa fa-close"></i> </a> 
                                            </td>
                                        </tr>
                                        <?php }?>
                                        <tr>
                                            <td class="actions" colspan="4">
                                                <div class="coupon">
                                                    <a href="<?=SITE_URL?>/?ctrl=home" class="btn btn-warning"> <i class="fa fa-hand-o-left"></i> Tiếp tục mua</a>
                                                </div>
                                            </td>
                                                                                            
                                            <td class="actions" colspan="3">
                                            <a href="<?=SITE_URL?>/?act=cart&what=removeAll" class="btn btn-danger float-right"><i class="fa fa-trash"></i>  Xóa giỏ hàng</a>

                                            </td>
                                        </tr>
                                    </tbody>
                                
                                </table>
                            </form>

                            <div class="cart-collaterals">





                            <div class="cart_totals ">
                                <h2>Tổng đơn hàng</h2>

                                <table cellspacing="0">
                                    <tbody>
                                       

                                        <tr class="cart-subtotal">
                                            <th>Tổng tiền</th>
                                            <td><span class="amount"><?php 
                                            $tong=0;

                                            foreach($_SESSION["giohang"] as $id => $sp){
                                            $tong= $tong + $sp["Amount"]*$sp["Gia"];
                                            }
                                            echo number_format($tong), "";
                                            ?> VND</span></td>
                                        </tr>
                                        <tr>
                                        <td colspan="2">
                                        <?php if(isset($_SESSION["id"])){
                                            ?>
                                        <a href="<?=SITE_URL?>/?act=thanhtoan" class="btn btn-success">Thanh toán</a>
                                            <?php
                                        } else {?>
                                        <a href="<?=SITE_URL?>/?act=login" class="btn btn-success">Bạn cần đăng nhập để thanh toán</a>
                                        <?php }?>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    
   
