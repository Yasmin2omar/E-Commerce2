<?php require_once("./views/layouts/header.php"); ?>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="home.php">home</a></li>
                            <li>Forget password</li>
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
					<div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Forgot password?</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-content">
                                <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['errors'])): ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($_SESSION['errors'] as $error): ?>
                                    <p><?= $error; ?></p>
                                    <?php endforeach; unset($_SESSION['errors']); ?>
                                </div>
                                <?php endif; ?>


                                <form action="index.php?page=forget_password_controller" method="POST">

                                    <div class="single-acc-field">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" placeholder="Enter your Email">

                                    </div>
                                    <div class="single-acc-field">
                                        <button type="submit">Reset Password</button>
                                    </div>
                                    <a href="login.php">Login now</a>

                                </form>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!--footer area start-->
    <?php require_once "./views/layouts/footer.php"; ?>