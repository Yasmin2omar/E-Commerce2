
<?php require_once "./views/layouts/header.php"; ?>
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li>Reset Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="account">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="account-contents"
                    style="background: url('../../assets/img/about/about1.jpg'); background-size: cover;">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-thumb">
                                <h2>Reset Password</h2>
                                <p>Enter your new password below.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-content">
                                <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <?= $_SESSION['success']; ?>
                                </div>
                                <?php unset($_SESSION['success']); ?>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['errors'])): ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($_SESSION['errors'] as $error): ?>
                                    <p><?= $error; ?></p>
                                    <?php endforeach; ?>
                                </div>
                                <?php unset($_SESSION['errors']); ?>
                                <?php endif; ?>



                                <form action="index.php?page=reset_password_controller" method="POST">
                                    <div class="single-acc-field">
                                        <label for="password">New Password</label>
                                        <input type="password" name="password" id="password"
                                            placeholder="Enter new password">
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            placeholder="Confirm new password">
                                    </div>
                                    <div class="single-acc-field">
                                        <button type="submit">Save Password</button>
                                    </div>
                                    <a href="index.php?page=login">Back to Login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once "./views/layouts/footer.php"; ?>