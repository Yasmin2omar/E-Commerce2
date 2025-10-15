<?php

use App\Order;

if($_SERVER['REQUEST_METHOD']=="POST"){
    $newStatus=$_POST['status'];
    $id=$_GET['id'];
    $update=Order::updateStatus($db,$newStatus,$id);
    header("location: ../admin/index.php?page=orders");
    exit;

}