<?php

use App\Blog;

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['remove'])){
    $id=$_GET['id'];
    $remove=Blog::deleteBlogById($db,$id);
    header("location: ./index.php?page=blogs");
    exit;

    }

}