<?php


require_once __DIR__ . '/vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/config/database.php";
use App\Cart;
use App\Controllers\Cart_controller;
use App\Controllers\ProductDetails_controller;
use App\Database;
$db = Database::getInstance($config)->getConnection();

$page = $_GET['page'] ?? "home";


switch ($page) {
    case "home":
        include "./views/home.php";
        break;
    case "cart":
        include "./views/cart.php";
        break;
    case "tracking":
        include "./views/tracking.php";
        break;
    case "product-details":
        include "./views/product-details.php";
        break;
    case "cart-action":
        include "./App/Controllers/cart_controller.php";
        break;
    case "check-out":
        include "./views/checkout.php";
        break;;
    case "reset-password":
        include "./views/reset-password.php";
        break;
    case "blog":
        include "./views/blog.php";
        break;
    case "login":
        include "./views/auth/login.php";
        break;
    case "forget-password":
        include "./views/forget-password.php";
        break;
    case "save_data":
        include "./App/Controllers/check_out_controller.php";
        break;
    case "reset_password_controller":
        include "./App/Controllers/reset_password_controller.php";
        break;
    case "blog_comment_controller":
        include "./App/Controllers/blog_comment_controller.php";
        break;
    case "review_controller":
        include "./App/Controllers/review_controller.php";
        break;
    case "search_controller":
        include "./App/Controllers/search_controller.php";
        break;
    case "search_results":
        include "./views/search_results.php";
        break;
    case "404":
        include "./views/404.php";
        break;
    case "register":
        include "./views/auth/register.php";
        break;
    case "privacy":
        include "./views/privacy-policy.php";
        break;
    case "faq":
        include "./views/faq.php";
        break;
    case "wishlist":
        include "./views/wishlist.php";
        break;
    case "contact":
        include "./views/contact.php";
        break;
    case "contact_controller":
        include "./App/Controllers/contact_controller.php";
        break;
    case "register_controller":
        include "./App/Controllers/register_controller.php";
        break;
    case "login_controller":
        include "./App/Controllers/login_controller.php";
        break;
    case "logout_controller":
        include "./App/Controllers/logout_controller.php";
        break;
    case "forget_password_controller":
        include "./App/Controllers/forget_password_controller.php";
        break;
    case "my-account":
        include "./views/my-account.php";
        break;
    case "about":
        include "./views/about.php";
        break;
    case "blog-details":
        include "./views/blog-details.php";
        break;
    case "send-data":
        include "./App/Controllers/ProductDetails_controller.php";
        ProductDetails_controller::sendId($db);
        break;


}