<?php

use App\Database;

require_once __DIR__ . "./../vendor/autoload.php";
require_once __DIR__ . "./../config/database.php";

$db = Database::getInstance($config)->getConnection();

$page = $_GET['page'] ?? "orders";


switch ($page) {
    case "orders":
        include "./views/orders.php";
        break;
    case "categories":
        include "./views/categories.php";
        break;
    case "products":
        include "./views/products.php";
        break;
    case "delete-user":
        include "./views/delete-user.php";
        break;
    case "edit-user":
        include "./views/edit-user.php";
        break;
    case "users":
        include "./views/users.php";
        break;
    case "create-category":
        include "./views/create-category.php";
        break;
    case "create-product":
        include "./views/create-product.php";
        break;
    case "create-user":
        include "./views/create-user.php";
        break;
    case "blogs":
        include "./views/blogs.php";
        break;
    case "create-blog":
        include "./views/create-blog.php";
        break;
    case "messeges":
        include "./views/messeges.php";
        break;
    case "order-detail":
        include "./views/order-detail.php";
        break;
    case "update_category":
        include "./views/update_category.php";
        break;
    case "customers":
        include "./views/customers.php";
        break;
    case "login":
        include "./views/auth/login.php";
        break;
    case "update_controller":
        include "./controllers/update_controller.php";
        break;
    case "remove_messege_controller":
        include "./controllers/remove_messege_controller.php";
        break;
    case "remove_customer_controller":
        include "./controllers/remove_customer_controller.php";
        break;
    case "remove_category_controller":
        include "./controllers/remove_category_controller.php";
        break;
    case "remove_product_controller":
        include "./controllers/remove_product_controller.php";
        break;
    case "update_category_controller":
        include "./controllers/update_category_controller.php";
        break;
    case "remove_blog_controller":
        include "./controllers/remove_blog_controller.php";
        break;
    case "update_blog_controller":
        include "./controllers/update_blog_controller.php";
        break;
    case "update_product_controller":
        include "./controllers/update_product_controller.php";
        break;
    case "create_category_controller":
        include "./controllers/create_category_controller.php";
        break;
    case "logout_controller":
        include "./controllers/logout_controller.php";
        break;
}