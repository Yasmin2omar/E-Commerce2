<?php
require_once "./views/layouts/header.php";
use App\Category;
use App\Product;
use App\ProductColors;
$products = Product::getAll($db);
$categories = Category::getAll($db);
$catById=[];
foreach($categories as $cat){
    $catById[$cat->getID()]=$cat->getName();
}
?>

<!--header area end-->


    <!--slider area start-->
    <section class="slider_section d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>NEXT LEVEL OF FASHION</h1>
                                <h2>STYLE THAT SPEAKS FOR YOU</h2>
                                <p>Special Offer <span> 20% Off  </span> This Week</p>
                                <a class="button" href="index.php?page=product-details">Buy now</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/resize_image_68e47e1683b99.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>BEST QUALITY & STYLE</h1>
                                <h2>100% COMFORT GUARANTEED</h2>
                                <p>Exclusive Offer <span> 20% off </span> this week</p>
                                <a class="button" href="index.php?page=product-details">Shop now</a>
                            </div>
                        </div>                        
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/c2163550c643a38704f55241316a9834_wipe_bg.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>GET YOUR PERFECT LOOK</h1>
                                <h2>SPECIAL DEALS JUST FOR YOU</h2>
                                <p>Exclusive Offer <span> 20% off </span> this week</p>
                                <a class="button" href="index.php?page=product-details">shopping now</a>
                            </div>
                        </div>                      
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/5dbe38da7ff93002fe4ec2a6a233959e_wipe_bg.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!--Tranding product-->
    <section class="pt-60 pb-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Tranding Products</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-stretch">
                    <?php for($i=0 ; $i<6 ; $i++): ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">    
                    <div class="single-tranding">
                        <form method="post" action="index.php?page=send-data">
                           <div class="tranding-pro-img"> 
                                <input type="hidden" name="product_id" value="<?=$products[$i]->getID();?>">
                                <button type="submit" name="submit"><img src="<?=$products[$i]->getImage()?>" alt=""></button>
                            </div>
                            <div class="tranding-pro-title">
                                <h3><?=$products[$i]->getName()?></h3>
                                <h4><?=$catById[$products[$i]->getCategoryId()]?></h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">$<?=$products[$i]->getPrice()?></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <?php endfor;?>
               
            </div>
        </div>
    </section><!--Tranding product-->

    <!--Features area-->
    <section class="features-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Awesome Features</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/1.png" alt="">
                        <h3>Impressive Distance</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/2.png" alt="">
                        <h3>100% self safe</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/3.png" alt="">
                        <h3>Awesome Support</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <a href="#"><img src="assets/img/product/2.png" alt=""></a>
                </div>
            </div>
        </div>
    </section><!--Features area-->

    <!--Features area-->
    <section class="gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-1 order-md-1 order-sm-1">
                    <div class="pro-details-feature">
                        <img src="assets/img/product/shop3.png" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-2 order-md-2 order-sm-2">
                    <div class="pro-details-feature">
                        <h3>Style That Lasts</h3>
                        <p>Discover our exclusive collection of trendy clothing, stylish sunglasses, and comfortable shoes — designed to keep you looking confident and fashionable every day. Each piece combines modern design with premium quality to make sure you always stand out.</p>
                        <ul>
                            <li>High-quality materials built to last</li>
                            <li>Modern designs for every occasion</li>
                            <li>Affordable prices and special daily offers</li>
                            <li>Fast and secure shipping nationwide</li>
                        </ul>
                        <a href="index.php?page=product-details"> Buy now</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-3 order-md-4 order-sm-4 order-4">
                    <div class="pro-details-feature">
                        <h3>Effortless Elegance</h3>
                        <p>Whether you're dressing up for a special event or keeping it casual, our fashion collection blends comfort with timeless style.From statement sunglasses to everyday sneakers and modern outfits — we make it easy to look your best anywhere you go.</p>
                        <ul>
                            <li>Elegant designs that match your personality</li>
                            <li>Lightweight and comfortable materials</li>
                            <li>Perfect accessories for every occasion</li>
                            <li>Designed for everyday confidence</li>
                        </ul>
                        <a href="index.php?page=product-details"> Buy now</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-4 order-md-3 order-sm-3 order-3">
                    <div class="pro-details-feature">
                        <img src="assets/img/product/shop4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section><!--Features area-->

    
    <!--area-->
    <section class="pt-60 pb-60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Watch it now</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="./assets/img/product/video.mp4" style="position:absolute;top:0;left:0;width:100%;height:100%;" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="../../../player.vimeo.com/api/player.js"></script>
                </div>
            </div>
        </div>
    </section><!--area-->

    
    <!--Other product-->
    <section class="pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>All collections</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach($products as $product):?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding mb-30">
                    
                    <form method="post" action="index.php?page=send-data">
                        
                           <div class="tranding-pro-img">
                                <input type="hidden" name="product_id" value="<?=$product->getID()?>">
                                <button type="submit" name="submit"><img src="<?=$product->getImage()?>" alt=""></button>
                             </div>
                            <div class="tranding-pro-title">
                                <h3><?=$product->getName()?></h3>
                                <h4><?=$catById[$products[$i]->getCategoryId()]?></h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">$<?=$product->getPrice()?></span>
                                </div>
                            </div>
                       
                    </form>
                    </div>
                </div>
                    <?php endforeach;?>
            </div>
        </div>
    </section><!--Other product-->

    <!--Testimonials-->
    <section class="pb-60 pt-60 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="testimonial_are">
                        <div class="testimonial_active owl-carousel">       
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-3.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45</p>
                                        <h3><a href="#">Kathy Young</a><span> - CEO of SunPark</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article> 
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-1.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even</p>
                                        <h3><a href="#">John Sullivan</a><span> - Customer</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article> 
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-2.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites</p>
                                        <h3><a href="#">Jenifer Brown</a><span> - Manager of AZ</span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article>      
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Testimonials-->

    <!--Blog-->
    <section class="pt-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Blog Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row blog_wrapper">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.php"><img src="assets/img/blog/blog2.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.php">How to start drone</a></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date"><a href="#">Sep 20, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.php">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog blog_bidio mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.php"><img src="assets/img/blog/blog1.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.php">See the tutorial</a></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date">On : <a href="#">Aug 25, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.php">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.php"><img src="assets/img/blog/blog-details.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.php">How to start drone</a></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date"><a href="#">Sep 20, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.php">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </section><!--/Blog-->

    <!--shipping area start-->
    <section class="shipping_area">
        <div class="container">
            <div class=" row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Support 24/7</h2>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>100% Money Back</h2>
                            <p>You have 30 days to Return</p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping4.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Payment Secure</h2>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </section>
    <!--shipping area end-->
	
	
    <!--footer area start-->
    <?php require_once "./views/layouts/footer.php"; ?>