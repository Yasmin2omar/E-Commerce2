<?php

use App\Product;

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['remove'])){
    $id=$_GET['id'];
    $remove=Product::removeProduct($db,$id);
    header("location: ./index.php?page=products");
    exit;

    }

}