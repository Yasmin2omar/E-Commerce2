<?php

use App\Category;

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['create'])){

    $name=$_POST['name'];
    $create=Category::createCategory($db,$name);
    header("location: ./index.php?page=categories");
    exit;
    }

}