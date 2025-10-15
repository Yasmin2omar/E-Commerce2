<?php
if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

 require_once __DIR__."/../layouts/header.php"; ?>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php?page=home">home</a></li>
                            <li>Register</li>
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
					<div class="account-contents" style="background: url('../../assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Register now</h2>
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

                                <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                                <div
                                    style="background-color:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:10px;">
                                    Account created successfully! <a href="register.php"></a>.
                                </div>
                                <?php endif; ?>

                                <form action="index.php?page=register_controller" method="POST">
                                    <div class="single-acc-field">
                                        <label for="first_name">First Name</label>
                                        <input type="text" id="first_name" name="first_name"
                                            placeholder="Enter Your First Name">
                                    </div>

                                    <div class="single-acc-field">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" id="last_name" name="last_name"
                                            placeholder="Enter Your Last Name">
                                    </div>

                                    <div class="single-acc-field">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Enter your Email">
                                    </div>

                                    <div class="single-acc-field">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password"
                                            placeholder="At least 6 Characters">
                                    </div>

                                    <div class="single-acc-field">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" name="phone" placeholder="Enter Your Phone">
                                    </div>

                                    <div class="single-acc-field">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" placeholder="Enter Your Address">
                                    </div>

                                    <div class="single-acc-field boxes">
                                        <input type="checkbox" id="checkbox" name="robot_check">
                                        <label for="checkbox">I'm not a robot</label>
                                    </div>

                                    <div class="single-acc-field">
                                        <button type="submit">Register now</button>
                                    </div>

                                    <a href="index.php?page=login">Already have an account? Login</a>
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