<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $status = 'active';

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $db->prepare("INSERT INTO users (first_name, last_name, email, password, phone, address, status)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([$first_name, $last_name, $email, $hashedPassword, $phone, $address, $status]);

   header("Location: index.php?page=users&created=1");
exit;

}




require_once __DIR__ . "./layouts/header.php";
?>

<div class="navbar-nav pl-2">
    <ol class="breadcrumb p-0 m-0 bg-white">
        <li class="breadcrumb-item"><a href="index.php?page=users">Users</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
</div>

<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
            <img src="img/avatar5.png" class='img-circle elevation-2' width="40" height="40" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
            <h4 class="h4 mb-0"><strong>Admin</strong></h4>
            <div class="mb-3">admin@example.com</div>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"><i class="fas fa-user-cog mr-2"></i> Settings</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"><i class="fas fa-lock mr-2"></i> Change Password</a>
            <div class="dropdown-divider"></div>
<a href="index.php?page=logout_controller" class="dropdown-item text-danger">
								<i class="fas fa-sign-out-alt mr-2"></i> Logout							
							</a>        </div>
    </li>
</ul>
</nav>

<!-- Sidebar -->
<?php require_once __DIR__ . "./layouts/nav.php"; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="index.php?page=users" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errors as $err): ?>
                            <li><?= htmlspecialchars($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                        required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"
                                        value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" class="form-control" cols="30"
                                        rows="5"><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="pb-5 pt-3">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="index.php?page=users" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once __DIR__ . "./layouts/footer.php"; ?>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/demo.js"></script>
</body>

</html>