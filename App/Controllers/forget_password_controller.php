<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use App\Database;
use App\User;
use App\Validation;

$user = new User($db);
$validate = new Validation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    // Validation
    $validate->required('email', $email);
    $validate->email($email);

    if ($validate->passed()) {
        $userData = $user->getUserByEmail($email);
        //var_dump($userData);
//exit;


        if ($userData) {
            $_SESSION['reset_user_id'] = $userData['id'];
            $_SESSION['success'] = "Email verified. Please set your new password.";
            
            header("Location: ./index.php?page=reset-password");
            exit;
        } else {
            $_SESSION['errors'] = ["No user found with this email."];
            header("Location: ./index.php?page=forget-password");
            exit;
        }
    } else {
        $_SESSION['errors'] = $validate->errors();
        header("Location: ./index.php?page=forget-password");
        exit;
    }
}