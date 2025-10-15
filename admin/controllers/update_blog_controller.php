<?php

use App\Category;

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['update'])){

    $newName=$_POST['new_name'];
    $id=$_GET['id'];
    $update=Category::updateCategory($db,$id,$newName);
    header("location: ./index.php?page=categories");
    exit;
    }

}