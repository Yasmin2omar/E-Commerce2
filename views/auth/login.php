<?php 
require_once __DIR__ . "/../layouts/header.php"; ?>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php?page=home">home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

	<section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('/project3-e-commerce-main/assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Login now</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                   
                                <?php if (isset($_SESSION['errors'])): ?>
                                <div
                                    style="background-color:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:10px;">
                                    <ul style="margin:0; padding-left:20px;">
                                        <?php foreach ($_SESSION['errors'] as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php unset($_SESSION['errors']); ?>
                                <?php endif; ?>

                                <?php if (isset($_GET['login']) && $_GET['login'] == 1): ?>
                                <div
                                    style="background-color:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:10px;">
                                    Logged in successfully! Welcome back
                                </div>
                                <?php endif; ?>
                                <?php if (isset($_GET['logout'])): ?>
                                <div
                                    style="background:#d4edda;color:#155724;padding:10px;border-radius:6px;margin-bottom:10px;">
                                    Logged out successfully.
                                </div>
                                <?php endif; ?>
                                <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <?= $_SESSION['success']; ?>
                                </div>
                                <?php unset($_SESSION['success']); ?>
                                <?php endif; ?>



                                <form action="index.php?page=login_controller" method="POST">
                                    <div class="single-acc-field">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Enter your Email">
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password"
                                            placeholder="Enter your password">
                                    </div>
                                    <div class="single-acc-field boxes">
                                        <input type="checkbox" id="checkbox">
                                        <label for="checkbox">Remember me</label>
                                    </div>
                                    <div class="single-acc-field">
                                        <button type="submit">Login Account</button>
                                    </div>
                                    <a href="index.php?page=forget-password">Forget Password?</a>
                                    <a href="index.php?page=register">Not Account Yet?</a>
                                </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!--footer area start-->
    <?php require_once __DIR__ . "/../layouts/footer.php"; ?>