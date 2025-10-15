<?php

use App\Contact;
use App\Validation;

$validate = new Validation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

$contact = new Contact($db);
    //  Validation
    $validate->required('name', $name);
    $validate->required('email', $email);
    $validate->email($email);
    $validate->required('message', $message);

    if ($validate->passed()) {
        $user_id = $_SESSION['user']['id'] ?? null;

        if ($contact->store($user_id, $name, $email, $message)) {
            $_SESSION['success'] = "Your message has been sent successfully!";
        } else {
            $_SESSION['errors'] = ["An error occurred while saving the message. Please try again."];
        }
    } else {
        $_SESSION['errors'] = $validate->errors();
    }

    header("Location: ./index.php?page=contact");
    exit;
}