<?php


require_once __DIR__ . "./layouts/header.php";
use App\Category;
use App\Product;
use App\Controllers\ProductDetails_controller;
use App\Review;
if(isset($_GET['id'])){
$id=$_GET['id'];
$product=Product::findByID($db,$id);
}else{
$id=1;
$product=Product::findByID($db,$id);
}
$categorie=Category::findByID($db,$id);
$reviewObj = new Review($db);
$reviews = $reviewObj->getReviews($id);
$reviewCount = count($reviews);
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
                        <li>Product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->

<div class="product_details mt-60 mb-60">
    <div class="container">
        <div class="row mb-5 align-items-start">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab ">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="<?=$product->getImage()?>" data-zoom-image="<?=$product->getImage()?>" alt="big-1"
                                style="width:100%; height:420px; object-fit:contain; border-radius:8px;">
                        </a>
                    </div>
                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01"
                            style="display:flex; justify-content:center; flex-wrap:wrap; gap:10px;">
                                <?php foreach($product->getImageByID($db,$id) as $photo):?>
                            <li style="width:100px; height:100px; list-style:none; overflow:hidden; border-radius:6px;">
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?=$photo?>" data-zoom-image="<?=$photo?>">
                                    <img src="<?=$photo?>" alt="thumb"
                                        style="width:100%; height:100%; object-fit:cover; display:block;">
                                </a>
                            </li>
                                <?php endforeach;?>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                     <h1><?=$product->getName()?></h1>
                        <div class=" product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="review"><a href="#"> (250 reviews) </a></li>
                            </ul>

                        </div>
                        <div class="price_box">
                            <span class="current_price">$<?=$product->getPrice()?></span>
                            <span class="old_price">$<?=$product->getPrice()?></span>

                        </div>
                        <div class="product_desc">
                            <ul>
                                <?php if($product->getStock()==true): ?>
                                <li >In Stock</li>
                                <?php else:?>
                                <li class="product_desc1">Out Of Stock</li>
                                <?php endif;?>
                                <li>Free delivery available*</li>
                                <li>Sale 30% Off Use Code : 'Fashion'</li>
                            </ul>
                            <p><?=$product->getDescription()?></p>
                        </div>
                        <div class="product_timing">
                            <div data-countdown="2023/12/15"></div>
                        </div>
                        <div class="product_variant color">
                            <h3>Available Options</h3>
                            <label>color</label>
                            <ul>
                                <li class="color1"><a href="#"></a></li>
                                <li class="color2"><a href="#"></a></li>
                                <li class="color3"><a href="#"></a></li>
                                <li class="color4"><a href="#"></a></li>
                            </ul>
                        </div>
                        <div class="product_variant quantity">
                            <form method="post" action="index.php?page=cart-action&action=add">
                            <label>quantity</label>
                            <input  min="1" max="100" value="1" type="number">
                            <input name="product-id" type="hidden" value="<?=$id?>">
                            <?php if($product->getStock()==true): ?>
                            <button class="button" type="submit" name="add">add to cart</button>
                            <?php else:?>
                            <button class="button" type="submit" name="add" disabled>Out Of Stock</button>
                            <?php endif;?>
                            </form>
                        </div>
                        <div class=" product_d_action">
                            <ul>
                                <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                            </ul>
                        </div>
                        <div class="product_meta">
                            <span>Category: <a href="#"><?=$categorie->getName()?></a></span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--product details end-->

<!--product info start-->
<div class="product_d_info mb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">Description</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                    aria-selected="false">Specification</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews (1)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p><?=$product->getDescription()?> <?=$product->getDescription()?> <?=$product->getDescription()?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Compositions</td>
                                                <td>Polyester</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Styles</td>
                                                <td>Girly</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Properties</td>
                                                <td><?=$categorie->getName()?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                    feminine designs delivering stylish separates and statement dresses which have since
                                    evolved into a full ready-to-wear collection in which every item is a vital part of
                                    a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and
                                    unmistakable signature style. All the beautiful pieces are made in Italy and
                                    manufactured with the greatest attention. Now Fashion extends to a range of
                                    accessories including shoes, hats, belts and more!</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">

                                <h4>
                                    <?= $reviewCount ?> <?= $reviewCount == 1 ? 'Review' : 'Reviews' ?>
                                    For Fancy Chair for astron floor
                                </h4>

                                <?php if ($reviews): ?>
                                <?php foreach ($reviews as $rev): ?>
                                <div class="reviews_comment_box">
                                    <div class="comment_text">
                                        <p><strong><?= htmlspecialchars($rev['name']) ?></strong>
                                            (<?= htmlspecialchars($rev['rating']) ?>⭐)
                                        </p>
                                        <span><?= htmlspecialchars($rev['comment']) ?></span>
                                        <p><small><?= htmlspecialchars($rev['created_at']) ?></small></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <p>No reviews yet. Be the first to review!</p>
                                <?php endif; ?>

                                <div class="comment_title mt-4">
                                    <h2>Add a review</h2>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>

                                <div class="product_review_form">
                                    <form action="index.php?page=review_controller" method="POST">
                                        <input type="hidden" name="product_id"
                                            value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">

                                        <div class="product_ratting mb-10">
                                            <h3>Your rating</h3>
                                            <select name="rating" required>
                                                <option value="">Select rating</option>
                                                <option value="5">★★★★★ (5)</option>
                                                <option value="4">★★★★☆ (4)</option>
                                                <option value="3">★★★☆☆ (3)</option>
                                                <option value="2">★★☆☆☆ (2)</option>
                                                <option value="1">★☆☆☆☆ (1)</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review</label>
                                                <textarea name="comment" id="review_comment" required></textarea>
                                            </div>

                                            <?php if (!isset($_SESSION['user'])): ?>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author" name="name" type="text" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" type="email" required>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--product info end-->


<!--footer area start-->
<?php require_once __DIR__ . "./layouts/footer.php";?>