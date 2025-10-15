<?php 
use App\Cart;
$cart=new Cart();
$numberItems=count($cart->getItems());
$items=$cart->getItems();
?>
<!doctype html>
<html class="no-js" lang="en">

<!-- index.php  03:25:08 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kraliçe</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>👑</text></svg>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS 
    ========================= -->
   

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/project3-e-commerce-main/assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/project3-e-commerce-main/assets/css/style.css">
    <link rel="stylesheet" href="/project3-e-commerce-main/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


</head>

<body>

    <!--header area start-->
    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">
            
    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                              <a href="javascript:void(0)"><i class="ion-android-close"></i></a>  
                        </div>
                        <div class="support_info">
                            <p>Any Enquiry: <a href="tel:">+56985475235</a></p>
                        </div>
                        <div class="top_right text-right">
                                <?php if (isset($_SESSION['user'])): ?>
                                <li><a href="index.php?page=logout">Logout</a></li>
                                <li><a href="index.php?page=checkout">Checkout</a></li>
                                <i class="bi bi-box-arrow-right"></i>

                                <?php else: ?>
                                <li><a href="index.php?page=login">Login</a></li>
                                <li><a href="index.php?page=register">Register</a></li>
                                <?php endif; ?>
                            </ul>
                        </div> 
                        <div class="search_container">
                           <form action="#">
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button> 
                                </div>
                            </form>
                        </div> 
                        
                        <div class="middel_right_info">
                            <div>
                                <a href="index.php?page=logout_controller" class="text-white fs-1"><i class="bi bi-box-arrow-right"></i> Logout</a>

                                
                            </div>
                            <div class="header_wishlist">
                                <a href="../../project3-e-commerce-main/index.php?page=wishlist"><img src="/project3-e-commerce-main/assets/img/user.png" alt=""></a>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)"><img src="/project3-e-commerce-main/assets/img/shopping-bag.png" alt=""></a>
                                <span class="cart_quantity"><?=$numberItems?></span>
                                <!--mini cart-->
                                 <div class="mini_cart">
                                    <div class="cart_item">
                                       <div class="cart_img">
                                           <a href="#"><img src="/project3-e-commerce-main/assets/img/s-product/product.jpg" alt=""></a>
                                       </div>
                                        <div class="cart_info">
                                            <a href="#">Sit voluptatem rhoncus sem lectus</a>
                                            <p>Qty: 1 X <span> $60.00 </span></p>    
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                       <div class="cart_img">
                                           <a href="#"><img src="/project3-e-commerce-main/assets/img/s-product/product2.jpg" alt=""></a>
                                       </div>
                                        <div class="cart_info">
                                            <a href="#">Natus erro at congue massa commodo</a>
                                            <p>Qty: 1 X <span> $60.00 </span></p>   
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Sub total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                       <div class="cart_button">
                                            <a href="../../project3-e-commerce-main/index.php?page=cart">View cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="../../project3-e-commerce-main/index.php?page=check-out">Checkout</a>
                                        </div>

                                    </div>

                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="../../project3-e-commerce-main/index.php?page=product-details">product</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="../../project3-e-commerce-main/index.php?page=about">About Us</a></li>
										<li><a href="../../project3-e-commerce-main/index.php?page=contact">contact</a></li>
										<li><a href="../../project3-e-commerce-main/index.php?page=privacy">privacy policy</a></li>
										<li><a href="../../project3-e-commerce-main/index.php?page=faq">Frequently Questions</a></li>
										<li><a href="../../../project3-e-commerce-main/index.php?page=login">login</a></li>
										<li><a href="../../../project3-e-commerce-main/index.php?page=register">register</a></li>
										<li><a href="../../../project3-e-commerce-main/index.php?page=forget-password">Forget Password</a></li>
										<li><a href="../../project3-e-commerce-main/index.php?page=404">Error 404</a></li>
										<li><a href="../../project3-e-commerce-main/index.php?page=cart">cart</a></li>
										<li><a href="../../project3-e-commerce-main/index.php?page=tracking">tracking</a></li>
										<li><a href="../../project3-e-commerce-main/index.php?page=check-out">checkout</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="../../project3-e-commerce-main/index.php?page=blog">blog</a></li>
                                        <li><a href="../../project3-e-commerce-main/index.php?page=blog-details">blog details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="../../../project3-e-commerce-main/views/auth/login.php">my account</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="../../project3-e-commerce-main/index.php?page=contact"> Contact Us</a> 
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@drophunt.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->
    
    <header>
        <div class="main_header">
            <!--header top start-->
            <div class="header_top">
                <div class="container">  
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="support_info">
                                <p>Email: <a href="mailto:">support@drophunt.com</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                                <ul>
                                   <li><a href="../../project3-e-commerce-main/index.php?page=my-account">Account</a></li> 
                                   <li><a href="../../project3-e-commerce-main/index.php?page=check-out">Checkout</a></li> 
                                </ul>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="logo">
                                <a href="../../project3-e-commerce-main/index.php?page=home"><img src="/project3-e-commerce-main/assets/img/logo/Kraliçe.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                   <form action="index.php" method="GET">
                                        <input type="hidden" name="page" value="search_controller">
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text" name="keyword">
                                            <button type="submit">Search</button>
                                        </div>
                                    </form>
                                </div>
                            <div>
                                
                                    <a href="index.php?page=logout_controller" class="text-white fs-1"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                
                            </div>
                                <div class="middel_right_info">
                                    <div class="header_wishlist">
                                        <a href="../../project3-e-commerce-main/index.php?page=wishlist"><img src="/project3-e-commerce-main/assets/img/user.png" alt=""></a>
                                    </div>
                                    
                                    <div class="mini_cart_wrapper">
                                        <a href="javascript:void(0)"><img src="/project3-e-commerce-main/assets/img/shopping-bag.png" alt=""></a>
                                        <span class="cart_quantity"><?=$numberItems?></span>
                                        <!--mini cart-->
                                         <div class="mini_cart">
                                            <div class="cart_item">
                                               <?php foreach($items as $item):?>
                                               <div class="cart_img">
                                                   <a href="#"><img src="<?=$item->getProduct()->getImage()?>" alt=""></a>
                                               </div>
                                                <div class="cart_info">
                                                    <a href="#"><?=$item->getProduct()->getName()?></a>
                                                    <p>Qty: <?=$item->getQty()?> X <span> $<?=$item->getProduct()->getPrice()?> </span></p>    
                                                </div>
                                                <form action="index.php?page=cart-action&action=delete&id=<?=$item->getProduct()->getID()?>"method="POST">
                                                <div class="cart_remove">
                                                    <button type="submit" name="remove"style=" background: none; border: none;padding: 0; cursor: pointer;color:red;font-size: inherit;outline: none;"><i class="ion-android-close"></i></button>
                                                </div>
                                                </form>
                                                <?php endforeach;?>
                                            </div>
                                          
                                            <div class="mini_cart_table">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">$<?=$cart->getTotalPrice()?></span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <?php if(!empty($cart->getTotalPrice())): ?>
                                                    <span>total:</span>
                                                    <span class="price">$<?=$cart->getTotalPrice()+50?></span>
                                                     <?php else:?>
                                                    <span>total:</span>
                                                    <span class="price">$<?=$cart->getTotalPrice()?></span>
                                                    <?php endif;?>
                                                </div>
                                            </div>

                                            <div class="mini_cart_footer">
                                               <div class="cart_button">
                                                    <a href="../../project3-e-commerce-main/index.php?page=cart">View cart</a>
                                                </div>
                                                <div class="cart_button">
                                                    <a href="../../project3-e-commerce-main/index.php?page=check-out">Checkout</a>
                                                </div>

                                            </div>

                                        </div>
                                        <!--mini cart end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->
            <!--header bottom satrt-->
            <div class="main_menu_area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="main_menu menu_position"> 
                                <nav>  
                                    <ul>
                                        <li><a href="../../project3-e-commerce-main/index.php?page=home">home</a></li>
                                        <li><a href="../../project3-e-commerce-main/index.php?page=product-details">Product</a></li>
                                        
                                        <li><a class="active" href="#">pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="../../project3-e-commerce-main/index.php?page=about">About Us</a></li>
                                                <li><a href="../../project3-e-commerce-main/index.php?page=contact">contact</a></li>
                                                <li><a href="../../project3-e-commerce-main/index.php?page=privacy">privacy policy</a></li>
                                                <li><a href="../../project3-e-commerce-main/index.php?page=faq">Frequently Questions</a></li>
                                                <li><a href="../../../project3-e-commerce-main/index.php?page=login">login</a></li>
                                                <li><a href="../../../project3-e-commerce-main/index.php?page=register">register</a></li>
                                                <li><a href="../../../project3-e-commerce-main/index.php?page=forget-password">Forget Password</a></li>
                                                <li><a href="../../project3-e-commerce-main/index.php?page=404">Error 404</a></li>
                                                <li><a href="../../project3-e-commerce-main/index.php?page=cart">cart</a></li>
                                                <li><a href="../../project3-e-commerce-main/index.php?page=tracking">tracking</a></li>
                                                <li><a href="../../project3-e-commerce-main/index.php?page=check-out">checkout</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="../../project3-e-commerce-main/index.php?page=blog">blog<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="../../project3-e-commerce-main/index.php?page=blog">blog</a></li>
                                                <li><a href="../../project3-e-commerce-main/index.php?page=blog-details">blog details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="../../project3-e-commerce-main/index.php?page=contact"> Contact Us</a></li>
                                    </ul>  
                                </nav> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div> 
    </header>
