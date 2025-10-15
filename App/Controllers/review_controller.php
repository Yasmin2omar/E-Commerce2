<?php

use App\Review;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? null;
    $rating     = $_POST['rating'] ?? null;
    $comment    = $_POST['comment'] ?? null;
    $name       = $_POST['name'] ?? null;
    $email      = $_POST['email'] ?? null;
    $user_id = $_SESSION['user']['id'] ?? null;
    if ($user_id && isset($_SESSION['user'])) {
$name = $_SESSION['user']['name'] ?? ($_POST['name'] ?? 'Guest');
        $email = $_SESSION['user']['email'];
    }

    if ($product_id && $rating && $comment && $name && $email) {
        $review = new Review($db);

        if ($review->addReview($product_id, $user_id, $name, $email, $rating, $comment)) {
            $_SESSION['success'] = "Review added successfully!";
        } else {
            $_SESSION['error'] = "Failed to add your review.";
        }
    } else {
        $_SESSION['error'] = "Please fill all required fields.";
    }

    header("Location: ./index.php?page=product-details&id=$product_id");
    exit;
}