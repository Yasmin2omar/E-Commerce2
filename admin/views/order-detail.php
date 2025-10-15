<?php

use App\Addresses;
use App\Customer;
use App\Order;
use App\OrderItems;
use App\Product;

require_once __DIR__."./layouts/header.php";
$orderID=$_GET['id'];
$orderStatus=$_GET['status'];
$orderCustomerId=$_GET['customer_id'];
$orderAddress=Addresses::getAdressByCustomerId($db,$orderCustomerId);
$customerPhone=Customer::getCustomerPhoneById($db,$orderCustomerId);
$customerEmail=Customer::getCustomerEmailById($db,$orderCustomerId);
$order_details=OrderItems::getOrderById($db,$orderID);
$total=OrderItems::getTotalById($db,$orderID);
$products=Product::getAll($db);

?>
				<div class="navbar-nav pl-2">
					<ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
						<li class="breadcrumb-item active">Order Detail</li>
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
							<h4 class="h4 mb-0"><strong>Mohit Singh</strong></h4>
							<div class="mb-3">example@example.com</div>
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
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
						<?php require_once __DIR__."./layouts/nav.php"; ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Order: <?=$orderID?></h1>
							</div>
							<div class="col-sm-6 text-right">
                                <a href="index.php?page=orders" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header pt-3">
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                            <h1 class="h5 mb-3">Shipping Address</h1>
                                            <address>
                                                <strong><?=$orderAddress['country']?></strong><br>
                                                <?=$orderAddress['state']?>, <?=$orderAddress['city']?><br>
                                                <?=$orderAddress['street1']?><?=$orderAddress['street2']?><br>
                                                Type: <?=$orderAddress['type']?><br>
                                                Phone: <?=$customerPhone?><br>
                                                Email: <?=$customerEmail?>
                                            </address>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-sm-4 invoice-col">
                                                <b>Invoice #007612</b><br>
                                                <br>
                                                <b>Order ID:</b>  <?=$orderID?><br>
                                                <b>Total:</b>$<?=$total['total_with_Shipping']?><br>
                                                <b>Status:</b> <span class="text-success"><?=$orderStatus?></span>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-3">	
                                        						
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th width="100">Price</th>
                                                    <th width="100">Qty</th>                                        
                                                    <th width="100">Total</th>
                                                </tr>
                                            </thead>
                                                <?php $subtotal=0; ?>
                                            
                                    <?php foreach($order_details as $item): ?>	
                                            <tbody>
                                                
                                                <tr><?php $productID=$item->getProductId()?>
                                                <?php $product=Product::findNameByID($db,$productID);?>
                                                    <td><?=$product?></td>
                                                    <td>$<?=$item->getProductPrice()?></td>                                        
                                                    <td><?=$item->getQty()?></td>
                                                    <td>$<?=$item->getQty() * $item->getProductPrice() ?></td>
                                                </tr>
                                                <?php $subtotal+= $item->getQty() * $item->getProductPrice(); ?>
                                                <?php endforeach;?> 
                                                <tr>
                                                    <th colspan="3" class="text-right">Subtotal:</th>
                                                    <td>$<?=$subtotal?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th colspan="3" class="text-right">Shipping:</th>
                                                    <td>$50.00</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="3" class="text-right">Grand Total:</th>
                                                    <td>$<?=$item->getTotalWithShipping()?></td>
                                                </tr>
                                            </tbody>  
                                        </table>								
                                    </div> 
                                                            
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <form method="post" action="../admin/index.php?page=update_controller&id=<?=$orderID?>">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Order Status</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="Pendding">Pendding</option>
                                                <option value="Shipping">Shipping</option>
                                                <option value="Delivered">Delivered</option>
                                                <option value="Cancelled">Cancelled</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<?php require_once __DIR__."./layouts/footer.php"; ?>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="js/demo.js"></script>
	</body>
</html>