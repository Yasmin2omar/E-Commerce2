<?php

use App\Database;

$db = Database::getInstance($config)->getConnection();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	header("Location: index.php?page=users");
	exit;
}

$id = intval($_GET['id']);

$stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
	header("Location: index.php?page=users");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$first_name = $_POST['first_name'] ?? '';
	$last_name  = $_POST['last_name'] ?? '';
	$email      = $_POST['email'] ?? '';
	$phone      = $_POST['phone'] ?? '';
	$address    = $_POST['address'] ?? '';
	$status     = $_POST['status'] ?? 'inactive';

	$stmt = $db->prepare("UPDATE users SET first_name=?, last_name=?, email=?, phone=?, address=?, status=? WHERE id=?");
	$stmt->execute([$first_name, $last_name, $email, $phone, $address, $status, $id]);

	header("Location: index.php?page=users&updated=1");
exit;

}

require_once __DIR__ . "./layouts/header.php";
?>

<div class="navbar-nav pl-2">
    <ol class="breadcrumb p-0 m-0 bg-white">
        <li class="breadcrumb-item"><a href="users.php">Users</a></li>
        <li class="breadcrumb-item active">Edit</li>
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
            <img src="img/avatar5.png" class="img-circle elevation-2" width="40" height="40" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
            <h4 class="h4 mb-0"><strong>Admin User</strong></h4>
            <div class="mb-3">admin@example.com</div>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-user-cog mr-2"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-lock mr-2"></i> Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="index.php?page=logout_controller" class="dropdown-item text-danger">
								<i class="fas fa-sign-out-alt mr-2"></i> Logout							
							</a>
        </div>
    </li>
</ul>
</nav>

<?php require_once __DIR__."./layouts/nav.php"; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
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
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        value="<?= htmlspecialchars($user['first_name']) ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control"
                                        value="<?= htmlspecialchars($user['last_name']) ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="<?= htmlspecialchars($user['email']) ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="<?= htmlspecialchars($user['phone']) ?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" class="form-control" cols="30"
                                        rows="5"><?= htmlspecialchars($user['address']) ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active" <?= $user['status'] === 'active' ? 'selected' : '' ?>>
                                            Active</option>
                                        <option value="inactive"
                                            <?= $user['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="pb-5 pt-3">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="index.php?page=users" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once __DIR__."./layouts/footer.php"; ?>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/demo.js"></script>
</body>

</html>