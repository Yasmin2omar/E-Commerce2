<?php

session_start();
use App\Contact;
use App\User;
use App\Validation;

$user = new User($db);
$validate = new Validation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // validation
    $validate->required('email', $email);
    $validate->required('password', $password);
    $validate->email($email);

    if ($validate->passed()) {
        // check if user exists
        $userData = $user->getUserByEmail($email);
       // var_dump($userData);
//exit;


       if ($userData && password_verify($password, $userData['password'])) {
            $_SESSION['user'] = [
                'id' => $userData['ID'],

                'name' => $userData['first_name'] . ' ' . $userData['last_name'],
                'email' => $userData['email']
            ];
           // $_SESSION['success'] = 'login success';
           header("Location: ./index.php?page=home&login=1");
exit;
        } else {
            $_SESSION['errors'] = ["Invalid email or password."];
            header("Location: ./index.php?page=login");
            exit;
        }
    } else {
        $_SESSION['errors'] = $validate->errors();
        header("Location: ./index.php?page=login");
        exit;
    }
}