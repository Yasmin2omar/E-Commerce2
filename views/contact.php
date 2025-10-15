<?php require_once __DIR__ . "./layouts/header.php";
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
                            <li>Contact</li>
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
				<div class="col-lg-12">
					<div class="account-contents" style="background: url('/project3-e-commerce-main/assets/img/about/about2.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Contact us</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                            <div class="account-content">
                                <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['success']; ?>
                                </div>
                                <?php unset($_SESSION['success']); ?>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['errors'])): ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($_SESSION['errors'] as $error): ?>
                                    <p><?php echo $error; ?></p>
                                    <?php endforeach; ?>
                                </div>
                                <?php unset($_SESSION['errors']); ?>
                                <?php endif; ?>


                                <form action="index.php?page=contact_controller" method="POST">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-acc-field">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" placeholder="Name" id="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-acc-field">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" placeholder="Email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single-acc-field">
                                                <label for="msg">Message</label>
                                                <textarea name="message" id="msg" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-acc-field">
                                        <button type="submit">Send Message</button>
                                    </div>
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
    <?php require_once __DIR__ . "./layouts/footer.php"; ?>