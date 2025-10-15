<?php

use App\BlogComment;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = new BlogComment($db);

    $blog_id = $_POST['blog_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['comment'];

    if ($comment->addComment($blog_id, $name, $email, $text)) {
        $_SESSION['success'] = "Comment added successfully!";
    } else {
        $_SESSION['error'] = "Failed to add comment!";
    }

    header("Location: index.php?page=blog-details&id=" . $blog_id);
    exit;
}
?>