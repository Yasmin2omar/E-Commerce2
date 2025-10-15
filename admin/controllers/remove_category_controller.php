<?php

use App\Category;

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['remove'])){
    $id=$_GET['id'];
    $remove=Category::removeCategory($db,$id);
    header("location: ./index.php?page=categories");
    exit;

    }

}