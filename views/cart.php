<?php

if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

use App\Cart;
require_once("./views/layouts/header.php");
$cart=new Cart();
$items=$cart->getItems();

                    
?>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="home.php">home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">  
            
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                    <th class="product_remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($items as $key=> $item): ?>
                                <tr>
                                    <td class="product_thumb"><a href="#"><img src="<?=$item->getProduct()->getImage()?>" alt=""></a></td>
                                    <td class="product_name"><a href="#"><?=$item->getProduct()->getName()?></a></td>
                                    <td class="product-price">$<?=$item->getProduct()->getPrice()?></td>
                                    <td class="product_quantity"><input min="1" max="100" value="<?=$item->getQty()?>" type="number"></td>
                                    <td class="product_total">$<?=$item->getItemPrice()?></td>
                                   <form method="post" action="index.php?page=cart-action&action=remove"> 
                                    <input type="hidden" name="product-id" value="<?=$item->getProduct()->getID()?>">
									<td class="product_remove">
                                        <button name="remove" type="submit" class="remove-btn" ><i class="ion-android-close"></i></button></td>
                               
                                        </form>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>   
                            </div>
                            <form method="post" action="index.php?page=cart-action&action=clear"> 
                            <div class="cart_submit">
                                <button type="submit" name="clear">Clear cart</button>
                            </div>   
                            </form>    
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount"><?=$cart->getTotalPrice()?></p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Flat Rate:</span> $50.00</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <?php if(!empty($cart->getTotalPrice())): ?>
                                    <p class="cart_amount">$<?=$cart->getTotalPrice()+50?></p>
                                    <?php else:?>
                                    <p class="cart_amount">$<?=$cart->getTotalPrice()?></p>
                                    <?php endif;?>
                                </div>
                                <div class="checkout_btn">
                                    <a href="index.php?page=check-out">Proceed to Checkout</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form> 
        </div>     
    </div>
    <!--shopping cart area end -->
        

    <!--footer area start-->
    <?php require_once("./views/layouts/footer.php"); ?>