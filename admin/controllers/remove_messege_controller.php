<?php

use App\Messege;

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['remove'])){
    $id=$_GET['id'];
    $remove=Messege::removeMessege($db,$id);
    header("location: ./index.php?page=messeges");
    exit;

    }

}