<?php

use App\Customer;

if($_SERVER['REQUEST_METHOD']=="GET"){
    $id=$_GET['id'];
    $remove=Customer::removeCustomer($db,$id);
    header("location: ./index.php?page=customers");
    exit;

   

}