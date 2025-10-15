<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use App\User;
use App\Validation;

$user = new User($db);
$validate = new Validation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    $validate->required('password', $password);
    $validate->required('confirm_password', $confirm_password);
     $validate->minLength('password', $password, 8); 

    if ($password !== $confirm_password) {
          $validate->addError('confirm_password', "Passwords do not match.");
    }

   if ($validate->passed()) {
    $user_id = $_SESSION['reset_user_id'] ?? null;

    if ($user_id) {
        $user->updatePassword($user_id, $password);
        unset($_SESSION['reset_user_id']); 
        $_SESSION['success'] = "Password updated successfully! You can now log in.";
header("Location: ./index.php?page=login");
exit;
    } else {
        $_SESSION['errors'] = ["You must be logged in or have a reset token."];
        header("Location: ./index.php?page=reset-password");
        exit;
    }
} else {
    $_SESSION['errors'] = $validate->errors();
    header("Location:./index.php?page=reset-password");
    exit;
}
}