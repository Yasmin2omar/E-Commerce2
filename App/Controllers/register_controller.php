<?php
session_start();
use App\Contact;
use App\User;
use App\Validation;

$user = new User($db);
$validate = new Validation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'first_name' => $_POST['first_name'] ?? '',
        'last_name'  => $_POST['last_name'] ?? '',
        'email'      => $_POST['email'] ?? '',
        'password'   => $_POST['password'] ?? '',
        'phone'      => $_POST['phone'] ?? '',
        'address'    => $_POST['address'] ?? ''
    ];

    // Validation
    foreach ($data as $key => $value) {
        $validate->required($key, $value);
    }

    $validate->email($data['email']);
    $validate->minLength('password', $data['password'], 6);

    if (empty($_POST['robot_check'])) {
        $validate->addError('robot_check', 'Please confirm you are not a robot.');
    }

    if ($user->emailExists($data['email'])) {
        $validate->addError('email', 'Email already registered.');
    }

    if ($validate->passed()) {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        if ($user->register($data)) {
            header("Location:./index.php?page=login");
            exit;
        } else {
            $_SESSION['errors'] = ['general' => 'Something went wrong while registering.'];
            header("Location: ./index.php?page=login");
            exit;
        }
    } else {
        $_SESSION['errors'] = $validate->errors();
        header("Location: ./index.php?page=login");
        exit;
    }
}