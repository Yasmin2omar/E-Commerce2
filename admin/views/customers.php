<?php

use App\Customer;

require_once __DIR__ . "/layouts/header.php";
$customers=Customer::getAll($db);
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
                                    value="">
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
                                <th>Country</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Street1</th>
                                <th>Street2</th>
                                <th>Payment Method</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($customers as $customer):?>
                            <tr>
                                <td><?=$customer->getId()?></td>
                                <td><img src="img/avatar5.png" class="img-thumbnail" width="50"></td>
                                <td><?=$customer->getFirstName()." ".$customer->getLastName()?></td>
                                <td><?=$customer->getEmail()?></td>
                                <td><?=$customer->getPhone()?></td>
                                <td><?=$customer->getCountry()?></td>
                                <td><?=$customer->getCity()?></td>
                                <td><?=$customer->getState()?></td>
                                <td><?=$customer->getStreet1()?></td>
                                <td><?=$customer->getStreet2()?></td>
                                <td><?=$customer->getMethod()?></td>
                                <td>
                                    
                                    <a href="index.php?page=remove_customer_controller&id=<?=$customer->getId()?>"class="text-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach;?>
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


