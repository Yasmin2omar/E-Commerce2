<?php
require_once __DIR__ . "./layouts/header.php";;
use App\Blog;
use App\BlogComment;

$commentObj = new BlogComment($db);
$blogs=Blog::getAll($db);
if(isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    $id=1;
}
$blog=Blog::getBlogById($db,$id);
$current_blog_id = $id;
$comments = $commentObj->getComments($current_blog_id);
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
                            <li>blog details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
	
	
	<!--blog body area start-->
    <div class="blog_details mt-60">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper">
                        <article class="single_blog">
                            <figure>
                               <div class="post_header">
                                   <h3 class="post_title"><?=$blog['Title']?></h3>
                                    <div class="blog_meta">                                        
                                        <span class="author">Posted by : <a href="#"><?=$blog['creator']?></a> / </span>
                                        <span class="post_date"><a href="#"><?=$blog['created_at']?></a></span>
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                   <a href="#"><img src="<?=$blog['image']?>" alt=""></a>
                               </div>
                               <figcaption class="blog_content">
                                    <div class="post_content">
                                        <blockquote>
                                            <p><?=$blog['short_description']?></p>
                                        </blockquote>
                                        <p><?=$blog['long_description']?></p>
                                    </div>
                                    <div class="entry_content">
                                        <div class="post_meta">
                                            <span>Tags: </span>
                                            <span><a href="#">Drone, </a></span>
                                            <span><a href="#">Sky, </a></span>
                                            <span><a href="#">Fly</a></span>
                                        </div>

                                        <div class="social_sharing">
                                            <p>share this post:</p>
                                            <ul>
                                                <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                               </figcaption>
                            </figure>
                        </article>
                        <div class="comments_box">
                        <h3><?= count($comments) ?> Comment<?= count($comments) != 1 ? 's' : '' ?></h3>

                        <?php if ($comments): ?>
                        <?php foreach ($comments as $com): ?>
                        <div class="comment_list">
                            <div class="comment_thumb">
                                <img src="assets/img/blog/comment3.png.jpg" alt="">
                            </div>
                            <div class="comment_content">
                                <div class="comment_meta">
                                    <h5><a href="#"><?= htmlspecialchars($com['name']) ?></a></h5>
                                    <span><?= htmlspecialchars($com['created_at']) ?></span>
                                </div>
                                <p><?= htmlspecialchars($com['comment']) ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p>No comments yet. Be the first to comment!</p>
                        <?php endif; ?>
                    </div>

                    <!-- ===== Add Comment Form ===== -->
                    <div class="comments_form">
                        <h3>Leave a Reply </h3>
                        <p>Your email address will not be published. Required fields are marked *</p>

                        <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                        <?php elseif (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                        <?php endif; ?>

                        <form action="index.php?page=blog_comment_controller" method="POST">
                            <input type="hidden" name="blog_id" value="<?= htmlspecialchars($current_blog_id) ?>">

                            <div class="row">
                                <div class="col-12">
                                    <label for="review_comment">Comment </label>
                                    <textarea name="comment" id="review_comment" required></textarea>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label for="author">Name</label>
                                    <input id="author" name="name" type="text" required>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label for="email">Email </label>
                                    <input id="email" name="email" type="email" required>
                                </div>
                            </div>
                            <button class="button" type="submit">Post Comment</button>
                        </form>
                    </div>
                         
                    </div>
                    <!--blog grid area start-->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <h3>Search</h3>
                            <form action="#">
                                <input placeholder="Search..." type="text">
                                <button type="submit">search</button>
                            </form>
                        </div>
                        <div class="widget_list widget_post">
                            <h3>Recent Posts</h3>
                            <?php foreach($blogs as $blog):?>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.php"><img src="<?=$blog->getImage()?>" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <?php $id=$blog->getId();
                                          $time=$blog->getTime($db,$id);?>
                                    <h3><a href="blog-details.php">Blog image post</a></h3>
                                    <span><?=$time['created_at']?> </span>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <div class="widget_list widget_tag">
                            <h3>Tag products</h3>
                            <div class="tag_widget">
                                <ul>
                                    <li><a href="#">Drone</a></li>
                                    <li><a href="#">Sky</a></li>
                                    <li><a href="#">Fly</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->
	
	
    <!--footer area start-->
    <?php require_once __DIR__ . "./layouts/footer.php"; ?>