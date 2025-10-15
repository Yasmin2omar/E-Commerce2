<?php

use App\Database;
use App\User;

$db = Database::getInstance($config)->getConnection();
$user = new User($db);

$search = $_GET['search'] ?? '';

if (!empty($search)) {
    $stmt = $db->prepare("
        SELECT * FROM users 
        WHERE first_name LIKE :search 
        OR last_name LIKE :search 
        OR email LIKE :search 
        OR phone LIKE :search
    ");
    $stmt->execute(['search' => "%$search%"]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $users = $db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
}


require_once __DIR__ . "/layouts/header.php";
?>

<!-- Navbar Breadcrumb -->
<div class="navbar-nav pl-2">
    <ol class="breadcrumb p-0 m-0 bg-white">
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active">List</li>
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

<!-- Sidebar -->
<?php require_once __DIR__ . "/layouts/nav.php"; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="index.php?page=create-user" class="btn btn-primary">New User</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header">
                    <div class="card-tools">
                        <form method="GET" action="index.php">
                            <input type="hidden" name="page" value="users">
                            <div class="input-group" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right"
                                    placeholder="Search by name, email, or phone"
                                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th width="80"></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th width="100">Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                            <?php foreach ($users as $u): ?>
                            <tr>
                                <td><?= htmlspecialchars($u['id'] ?? '') ?></td>
                                <td><img src="img/avatar5.png" class="img-thumbnail" width="50"></td>
                                <td><?= htmlspecialchars(($u['first_name'] ?? '') . ' ' . ($u['last_name'] ?? '')) ?>
                                </td>
                                <td><?= htmlspecialchars($u['email'] ?? '') ?></td>
                                <td><?= htmlspecialchars($u['phone'] ?? '') ?></td>
                                <td><?= htmlspecialchars($u['role'] ?? '') ?></td>
                                <td>
                                    <?php if (($u['status'] ?? '') === 'active'): ?>
                                    <svg class="text-success h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <?php else: ?>
                                    <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="index.php?page=edit-user&id=<?= htmlspecialchars($u['id'] ?? '') ?>"
                                        class="text-primary mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?page=delete-user&id=<?= htmlspecialchars($u['id'] ?? '') ?>"
                                        class="text-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted">No users found.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
</div>

<?php require_once __DIR__ . "/layouts/footer.php"; ?>

<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/demo.js"></script>
<script>
document.querySelectorAll('.text-danger').forEach(btn => {
    btn.addEventListener('click', function(e) {
        const confirmDelete = confirm("Are you sure,you want delet this user?");
        if (!confirmDelete) {
            e.preventDefault();
        }
    });
});
</script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
<?php if (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
Swal.fire({
    icon: 'success',
    title: 'User updated successfully!',
    showConfirmButton: false,
    timer: 2000
});
<?php endif; ?>

<?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
Swal.fire({
    icon: 'error',
    title: 'User deleted successfully!',
    showConfirmButton: false,
    timer: 2000
});
<?php endif; ?>

<?php if (isset($_GET['created']) && $_GET['created'] == 1): ?>
Swal.fire({
    icon: 'success',
    title: 'User created successfully!',
    showConfirmButton: false,
    timer: 2000
});
<?php endif; ?>
</script>

<script>
if (
    window.location.search.includes('updated=1') ||
    window.location.search.includes('deleted=1') ||
    window.location.search.includes('created=1')
) {
    const url = new URL(window.location);
    url.searchParams.delete('updated');
    url.searchParams.delete('deleted');
    url.searchParams.delete('created');
    window.history.replaceState({}, document.title, url.pathname + url.search);
}
</script>