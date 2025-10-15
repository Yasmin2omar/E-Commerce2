-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2025 at 08:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `street1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('billing & shipping','shipping') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'billing & shipping'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `customer_id`, `street1`, `street2`, `city`, `state`, `country`, `type`) VALUES
(42, 71, 'sohag', 'sohag', 'sohag', 'sohag', '2', 'billing & shipping');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` char(10) COLLATE utf8mb4_unicode_ci DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `Title`, `short_description`, `long_description`, `creator`, `created_at`, `image`) VALUES
(1, '👕 Streetwear Essentials: The Rise of Oversized Tees', 'Oversized T-shirts are no longer just a casual choice—they’re a modern fashion statement.', 'Oversized T-shirts have evolved from being simple loungewear to becoming a core part of today’s streetwear movement. \r\n  Their relaxed fit not only offers comfort but also allows for creative layering. Pair an oversized tee with slim jeans, \r\n  cargo pants, or even a skirt for an effortlessly cool look. \r\n  The secret lies in balancing proportions—mixing loose and fitted pieces. \r\n  Brands are now experimenting with bold prints, embroidery, and premium cotton fabrics, \r\n  making tees a versatile piece for both men and women.', 'Admin', '2025-10-09 05:35:14', 'assets/img/blog/1-sh-sport-red.jpg'),
(2, '👖 The Perfect Fit: Finding Your Ideal Pair of Chinos', 'Chinos strike the perfect balance between smart and casual, making them a wardrobe essential.', 'A well-fitted pair of chinos can take you from a business meeting to a weekend outing with ease. \r\n  Available in multiple colors, chinos offer a polished yet relaxed vibe that works with nearly everything—shirts, polos, or T-shirts. \r\n  Modern chinos are crafted with stretchable fabric for maximum comfort. \r\n  Whether you prefer slim fit, straight cut, or cropped style, the key is finding a pair that complements your body shape. \r\n  For a trendy look, try rolling up the cuffs and pairing them with sneakers or loafers.', 'Admin', '2025-10-09 05:21:14', 'assets/img/blog/1-sport-blue.jpg'),
(3, '👟 Step Up Your Style: Must-Have Shoes for Every Occasion', 'Shoes define your outfit—get them right, and everything else follows.', 'From minimalist white sneakers to classic leather boots, shoes play a powerful role in expressing personality and confidence. \r\n  Investing in quality footwear not only enhances comfort but also elevates your overall look. \r\n  For men, loafers and Chelsea boots are timeless picks. \r\n  For women, ankle boots and block heels offer both style and support. \r\n  Remember, your shoes tell a story—make sure it’s one that fits your style.', 'Admin', '2025-10-09 05:21:14', 'assets/img/blog/1-hi-blue.jpg'),
(4, '🕶️ Shades of Confidence: Choosing the Right Sunglasses', 'Sunglasses are more than just eye protection—they’re a reflection of your attitude.', 'The right pair of sunglasses can transform your entire look. \r\n  Whether you go for retro aviators, oversized frames, or sharp cat-eyes, \r\n  your shades should match your face shape and personal style. \r\n  Neutral tones like black and brown remain timeless, \r\n  while mirrored and tinted lenses are perfect for adding a bold, fashion-forward edge. \r\n  Don’t forget—quality UV protection is just as important as style.', 'Admin', '2025-10-09 05:21:14', 'assets/img/blog/1-white.webp'),
(6, '🕶️ Shades of Confidence: Choosing the Right Sunglasses', 'Sunglasses are more than just eye protection—they’re a reflection of your attitude.', 'The right pair of sunglasses can transform your entire look. \r\n  Whether you go for retro aviators, oversized frames, or sharp cat-eyes, \r\n  your shades should match your face shape and personal style. \r\n  Neutral tones like black and brown remain timeless, \r\n  while mirrored and tinted lenses are perfect for adding a bold, fashion-forward edge. \r\n  Don’t forget—quality UV protection is just as important as style.', 'Admin', '2025-10-09 05:21:14', 'assets/img/blog/1-white.webp');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int NOT NULL,
  `blog_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `comment`, `created_at`) VALUES
(1, 1, '‪Yasmeen Omar‬‏', 'yasmeenomar631@gmail.com', 'Amazing', '2025-10-14 19:38:18'),
(2, 1, '‪Yasmeen Omar‬‏', 'yasmeenomar81@gmail.com', 'WoW', '2025-10-15 05:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'T-Shirts / Classic'),
(2, 'T-Shirts / Sport'),
(3, 'T-Shirts / Casual Smart'),
(4, 'T-Shirts / Graphic'),
(5, 'T-Shirts / Oversized'),
(6, 'Pants / Casual'),
(7, 'Pants / Jeans'),
(8, 'Pants / Cargo'),
(9, 'Pants / Formal'),
(10, 'Pants / Sport'),
(11, 'Shoes / Casual'),
(12, 'Shoes / Running'),
(13, 'Shoes / High Top'),
(14, 'Shoes / Slip-On'),
(15, 'Shoes / Outdoor'),
(16, 'Sunglasses / Classic'),
(17, 'Sunglasses / Aviator'),
(18, 'Sunglasses / Round'),
(19, 'Sunglasses / Sport'),
(20, 'Sunglasses / Fashion'),
(21, 'Test555');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int NOT NULL,
  `name` enum('black','red','blue','white') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'black'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'black'),
(2, 'white'),
(3, 'blue'),
(4, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messege` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `company_name`, `country`, `city`, `state`, `email`, `phone`, `password`, `payment_method`, `street1`, `street2`) VALUES
(71, 'Ahmed', 'Omar‬‏', '', 'Egypt', 'sohag', 'sohag', 'ahmedomsar63331@gmail.com', '01018789092', '$2y$10$QFi6tYyRoWg8ZnLqg6HaduoWZTh7Xjb0/xj9B6jVEm4OQHNjZQ7h.', 'Bank', 'sohag', 'sohag'),
(74, 'Yasmin', 'Omar‬‏', '', 'Egypt', 'sohag', 'sohag', 'yasmin64@gmail.com', '01018789092', '$2y$10$QFi6tYyRoWg8ZnLqg6HaduoWZTh7Xjb0/xj9B6jVEm4OQHNjZQ7h.', 'Bank', 'sohag', 'sohag');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_lists`
--

CREATE TABLE `favorite_lists` (
  `product_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messeges`
--

CREATE TABLE `messeges` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messege` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messeges`
--

INSERT INTO `messeges` (`id`, `user_id`, `name`, `email`, `messege`) VALUES
(3, NULL, 'Haidy', 'Haidy@gmail.com', 'Thanks For This Amazing Website'),
(5, NULL, 'Haidy', 'Haidy@gmail.com', 'Thanks For This Amazing Website');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` enum('Paypal','Bank') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pendding','Delivered','Shipping','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Pendding',
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `payment_method`, `status`, `order_date`, `note`) VALUES
(28, 71, '769.97', 'Bank', 'Pendding', '2025-10-14 22:26:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` float NOT NULL,
  `total_with_Shipping` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`, `total_with_Shipping`) VALUES
(22, 28, 5, 1, '259.99', 259.99, 769.97),
(23, 28, 3, 2, '229.99', 459.98, 769.97);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `stock`, `category_id`, `discount`, `image`) VALUES
(1, 'Classic Tee', 199.99, 'A soft cotton classic tee for everyday wear. Breathable, comfortable and easy to pair with jeans or shorts.', 0, 1, 20, 'assets/img/product/1-classic-black.jpg'),
(2, 'Sporty Crew', 249.99, 'Lightweight sport tee with ventilation panels. Ideal for gym sessions and active days.', 1, 2, 20, 'assets/img/product/1-sh-sport-blue.jpg\r\n'),
(3, 'V-Neck Elegance', 229.99, 'V-neck tee with a refined cut — great for casual smart outfits and layered looks.', 1, 3, 20, 'assets/img/product/1-casualSmart-red.jpg\r\n'),
(4, 'Graphic Print Tee', 279.99, 'Trendy graphic tee with bold print. Standout casual piece for weekend outfits.', 1, 4, 20, 'assets/img/product/1-graphic-white.jpg\r\n'),
(5, 'Oversized Tee', 259.99, 'Comfortable oversized tee with relaxed fit — perfect for an on-trend streetwear look.', 1, 5, 20, 'assets/img/product/1-oversized-blue.jpg\r\n'),
(6, 'Slim Fit Chino', 349.99, 'Slim cut chino with a neat silhouette — smart-casual essential that pairs well with sneakers or loafers.', 1, 6, 20, 'assets/img/product/1-casual-red.jpg'),
(7, 'Denim Stretch', 379.99, 'Stretch denim for comfort and shape retention — everyday jeans with modern fit.', 1, 7, 20, 'assets/img/product/1-jeans-white.jpg'),
(8, 'Cargo Relax', 329.99, 'Utility cargo pants with roomy pockets for hands-free storage — durable and casual.', 1, 8, 20, 'assets/img/product/1-cargo-black.jpg'),
(9, 'Formal Trousers', 399.99, 'Lightweight formal trousers with a clean crease — office-ready and elegant.', 1, 9, 20, 'assets/img/product/1-formal-blue.jpg'),
(10, 'Jogger Pants', 319.99, 'Comfortable joggers with elastic waistband and cuffed ankles — perfect for athleisure.', 1, 10, 20, 'assets/img/product/1-sport-red.jpg'),
(11, 'Classic Sneaker', 499.99, 'Classic low-top sneaker with a clean silhouette — comfortable for everyday wear.', 1, 11, 20, 'assets/img/product/1-ach-white.jpg'),
(12, 'Running Pro', 549.99, 'Lightweight running shoe with responsive sole and breathable upper for training.', 1, 12, 20, 'assets/img/product/1-run-black.jpg\r\n'),
(13, 'High Top', 579.99, 'High-top sneaker for style and ankle support — urban look with durable build.', 1, 13, 20, 'assets/img/product/1-hi-blue.jpg'),
(14, 'Slip-On Casual', 459.99, 'Easy slip-on shoe for quick outings — minimal design and comfortable sole.', 1, 14, 20, 'assets/img/product/2-sh-red.jpg'),
(15, 'Trail Boot', 599.99, 'Rugged trail boot with water-resistant upper and aggressive outsole for rough terrain.', 1, 15, 20, 'assets/img/product/1-sh-white.jpg'),
(16, 'Classic Wayfarer', 299.99, 'Timeless Wayfarer sunglasses with UV-protective lenses and a flattering frame.', 1, 16, 20, 'assets/img/product/5-black.webp'),
(17, 'Aviator', 339.99, 'Aviator sunglasses with metal frames and large lenses for classic pilot styling.', 1, 17, 20, 'assets/img/product/4-blue.jpeg'),
(18, 'Round Frame', 319.99, 'Round-frame sunglasses for a vintage-modern look — lightweight and stylish.', 1, 18, 20, 'assets/img/product/3-red.jpg'),
(19, 'Sport Wrap', 359.99, 'Sport wrap sunglasses offering side coverage and optical stability for running and cycling.', 1, 19, 20, 'assets/img/product/2-white.png'),
(20, 'Cat Eye', 329.99, 'Cat-eye frame sunglasses — feminine and bold, ideal for fashion-forward outfits.', 1, 20, 20, 'assets/img/product/1-black.jpg'),
(28, 'Cat Eye', 329.99, 'Cat-eye frame sunglasses — feminine and bold, ideal for fashion-forward outfits.', 1, 20, 20, 'assets/img/product/1-black.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `color_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `image`, `product_id`, `color_id`) VALUES
(21, 'assets/img/product/1-ach-black.jpg\r\n', 11, 1),
(22, 'assets/img/product/1-ach-blue.jpg\r\n', 11, 3),
(23, 'assets/img/product/1-ach-red.jpg\r\n', 11, 4),
(24, 'assets/img/product/1-ach-white.jpg\r\n', 11, 2),
(25, 'assets/img/product/1-hi-black.jpg\r\n', 13, 1),
(26, 'assets/img/product/1-hi-blue.jpg\r\n', 13, 3),
(27, 'assets/img/product/1-hi-red.jpg\r\n', 13, 4),
(28, 'assets/img/product/1-ach-white.jpg\r\n', 13, 2),
(29, 'assets/img/product/1-run-black.jpg\r\n', 12, 4),
(30, 'assets/img/product/1-run-blue.jpg\r\n', 12, 3),
(31, 'assets/img/product/1-run-red.jpg\r\n', 12, 4),
(32, 'assets/img/product/1-run-white.jpg\r\n', 12, 2),
(33, 'assets/img/product/2-sh-black.jpg\r\n', 14, 1),
(34, 'assets/img/product/2-sh-blue.jpg\r\n', 14, 3),
(35, 'assets/img/product/2-sh-red.jpg\r\n', 14, 4),
(36, 'assets/img/product/2-sh-white.jpg\r\n', 14, 2),
(37, 'assets/img/product/1-sh-black.jpg\r\n', 15, 1),
(38, 'assets/img/product/1-sh-blue.jpg\r\n', 15, 3),
(39, 'assets/img/product/1-sh-red.jpg\r\n', 15, 4),
(40, 'assets/img/product/1-sh-white.jpg', 15, 2),
(41, 'assets/img/product/1-casualSmart-black.jpg', 3, 1),
(42, 'assets/img/product/1-casualSmart-blue.jpg', 3, 2),
(43, 'assets/img/product/1-casualSmart-red.jpg', 3, 4),
(44, 'assets/img/product/1-casualSmart-white.jpg', 3, 2),
(45, 'assets/img/product/1-classic-black.jpg', 1, 1),
(46, 'assets/img/product/1-classic-blue.jpg', 1, 3),
(47, 'assets/img/product/1-classic-red.jpg', 1, 4),
(48, 'assets/img/product/1-classic-white.jpg', 1, 2),
(49, 'assets/img/product/1-graphic-black.jpg', 4, 1),
(50, 'assets/img/product/1-graphic-blue.jpg', 4, 3),
(51, 'assets/img/product/1-graphic-red.jpg', 4, 4),
(52, 'assets/img/product/1-graphic-white.jpg', 4, 2),
(53, 'assets/img/product/1-oversized-black.jpg', 5, 1),
(54, 'assets/img/product/1-oversized-blue.jpg', 5, 3),
(55, 'assets/img/product/1-oversized-red.jpg', 5, 4),
(56, 'assets/img/product/1-oversized-white.jpg', 5, 2),
(57, 'assets/img/product/1-sh-sport-black.jpg', 2, 1),
(58, 'assets/img/product/1-sh-sport-blue.jpg', 2, 3),
(59, 'assets/img/product/1-sh-sport-red.jpg', 2, 4),
(60, 'assets/img/product/1-sh-sport-white.jpg', 2, 2),
(61, 'assets/img/product/1-cargo-black.jpg', 8, 1),
(62, 'assets/img/product/1-cargo-blue.jpg', 8, 3),
(63, 'assets/img/product/1-cargo-red.jpg', 8, 4),
(64, 'assets/img/product/1-cargo-white.jpg', 8, 2),
(65, 'assets/img/product/1-casual-black.jpg', 6, 1),
(66, 'assets/img/product/1-casual-blue.jpg', 6, 3),
(67, 'assets/img/product/1-casual-white.jpg', 6, 2),
(68, 'assets/img/product/1-casual-red.jpg', 6, 4),
(69, 'assets/img/product/1-formal-black.jpg', 9, 1),
(70, 'assets/img/product/1-formal-blue.jpg', 9, 3),
(71, 'assets/img/product/1-formal-red.jpg', 9, 4),
(72, 'assets/img/product/1-formal-white.jpg', 9, 2),
(73, 'assets/img/product/1-jeans-black.jpg', 7, 1),
(74, 'assets/img/product/1-jeans-blue.jpg', 7, 3),
(75, 'assets/img/product/1-jeans-red.jpg', 7, 4),
(76, 'assets/img/product/1-jeans-white.jpg', 7, 2),
(77, 'assets/img/product/1-sport-black.jpg', 10, 1),
(78, 'assets/img/product/1-sport-blue.jpg', 10, 3),
(79, 'assets/img/product/1-sport-red.jpg', 10, 4),
(80, 'assets/img/product/1-sport-white.jpg', 10, 2),
(81, 'assets/img/product/3-black.jpg', 18, 1),
(82, 'assets/img/product/3-blue.png', 18, 3),
(83, 'assets/img/product/3-red.jpg', 18, 4),
(84, 'assets/img/product/3-white.jpg', 18, 2),
(85, 'assets/img/product/1-white.webp', 20, 2),
(86, 'assets/img/product/1-black.jpg', 20, 1),
(87, 'assets/img/product/1-blue.jpeg', 20, 3),
(88, 'assets/img/product/1-red.png', 20, 4),
(89, 'assets/img/product/5-black.webp', 16, 1),
(90, 'assets/img/product/5-blue.jpg', 16, 3),
(91, 'assets/img/product/5-red.jpg', 16, 4),
(92, 'assets/img/product/5-white.jpg', 16, 2),
(93, 'assets/img/product/2-white.png', 19, 2),
(94, 'assets/img/product/2-red.png', 19, 4),
(95, 'assets/img/product/2-blue.jpg', 19, 3),
(96, 'assets/img/product/2-black.png', 19, 1),
(97, 'assets/img/product/4-red.png', 17, 4),
(98, 'assets/img/product/4-white.webp', 17, 2),
(99, 'assets/img/product/4-blue.jpeg', 17, 3),
(100, 'assets/img/product/4-black.png', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `comment`, `product_id`, `user_id`, `name`, `email`, `rating`, `created_at`) VALUES
(1, 'Good', 6, NULL, '‪Yasmeen Omar‬‏', 'yasmeenomar631@gmail.com', '5', '2025-10-14 19:54:59'),
(2, 'Cool', 4, NULL, 'Ali', 'ali@gmail.com', '5', '2025-10-15 06:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `status`) VALUES
(1, '‪Yasmeen', 'Omar‬‏', 'yasmeenomar631@gmail.com', '$2y$10$bdVs6SMkWsyQXGjC6KOO1.dU.Blzl9YKwAdOHqnO3vTJlRxFL.bc6', '01018789092', 'sohag', ''),
(2, 'Haidy', 'Haidy‬‏', 'Haidy@gmail.com', '$2y$10$OXVWf63MkxyGPaBuNl3ti.kFMg5wP9oZApvY7IVsFd4QHFR2OQG9a', '01014557862', 'Alex', 'active'),
(4, '‪Yasmeen', 'Omar‬‏', 'yasmeenomar81@gmail.com', '$2y$10$vNH3cxC7DRtRtSrVhtHiSe7.g2B/xOo3.NU4r/Y39orH1.1NojyRe', '01018789092', '8776', ''),
(5, '‪Yasmeen', 'Omar‬‏', 'yasmeenome11@gmail.com', '$2y$10$.R1hQ.vbVVIOO7MdneZACOPxKN1g656qPTDgoG7EQ1IDHX3lsRcA6', '01018789092', 'sohag', ''),
(6, 'Ahmed', 'Ail', 'ahmedali@gmail.com', '$2y$10$7T96h6X3AG0U2uughug6dueI7bgi.tsmZOfatHblDdMpBdh8VAI7e', '01018789092', '8776', ''),
(7, 'Admin', 'Admin', 'Admin@gmail.com', 'Admin123456789', '01018785555', 'Egypt', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_fk` (`customer_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog_comment` (`blog_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk3` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `favorite_lists`
--
ALTER TABLE `favorite_lists`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `messeges`
--
ALTER TABLE `messeges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_order_fk` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_fk` (`order_id`),
  ADD KEY `order_items_product_fk` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_fk` (`category_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk5` (`product_id`),
  ADD KEY `color_fk` (`color_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk2` (`product_id`),
  ADD KEY `user_fk2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `messeges`
--
ALTER TABLE `messeges`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `fk_blog_comment` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `user_fk3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorite_lists`
--
ALTER TABLE `favorite_lists`
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messeges`
--
ALTER TABLE `messeges`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_product_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `color_fk` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_fk5` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `product_fk2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
