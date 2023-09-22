-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 04:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `img` varchar(55) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `img`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '123', 'IMG_8437400.png', '1'),
(10, 'admin5', 'admin5@gmail.com', '123', 'IMG_4168249.jpg', '1'),
(15, 'abrar mustafa', 'abrarmustafa@gmail.com', '12345', 'IMG_804105.jpg', '1'),
(16, 'umar', 'umar@gmail.com', '1234', 'IMG_3489656.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `date`, `name`) VALUES
(1, '2023-03-20 15:30:47', 'Samsung'),
(2, '2023-03-20 15:31:57', 'Haier'),
(4, '2023-03-20 15:32:59', 'Sony'),
(5, '2023-03-20 15:33:02', 'LG'),
(6, '2023-03-20 15:34:00', 'Dawlance'),
(8, '2023-03-20 15:35:11', 'Apple'),
(10, '2023-03-20 15:35:50', 'hp'),
(11, '2023-03-20 15:35:54', 'Dell'),
(13, '2023-05-08 02:12:18', 'audionic'),
(36, '2023-08-03 23:55:45', 'xiaomi'),
(37, '2023-08-06 15:07:31', 'lenovo'),
(40, '2023-08-06 15:10:24', 'toshiba'),
(42, '2023-08-06 15:10:54', 'orient'),
(43, '2023-08-06 15:11:24', 'gree'),
(46, '2023-08-07 15:09:59', 'changhong ruba'),
(47, '2023-08-07 15:11:29', 'itel'),
(48, '2023-08-07 15:11:44', 'nokia'),
(49, '2023-08-07 15:11:49', 'oppo');

-- --------------------------------------------------------

--
-- Table structure for table `carousal`
--

CREATE TABLE `carousal` (
  `id` int(11) NOT NULL,
  `image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousal`
--

INSERT INTO `carousal` (`id`, `image`) VALUES
(8, 'CAROUSAL_802570347.jpg'),
(9, 'CAROUSAL_739115948.jpg'),
(10, 'CAROUSAL_760900689.jpg'),
(11, 'CAROUSAL_895600442.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `combo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `date`, `name`) VALUES
(1, '2023-03-20 22:35:33', 'LED TV'),
(2, '2023-03-20 22:36:30', 'Mobile'),
(4, '2023-03-20 22:38:39', 'Laptops'),
(7, '2023-05-08 02:12:42', 'speaker'),
(18, '2023-07-19 01:04:12', 'earbuds'),
(21, '2023-08-03 23:51:33', 'smart watch'),
(22, '2023-08-03 23:52:00', 'tv & home appliance '),
(23, '2023-08-03 23:52:13', 'power banks'),
(24, '2023-08-03 23:52:30', 'tablets '),
(25, '2023-08-03 23:53:50', 'mobiles accessories'),
(26, '2023-08-06 15:21:09', 'microwave oven'),
(27, '2023-08-06 15:22:11', 'washing machines'),
(28, '2023-08-06 15:22:22', 'air conditioners'),
(29, '2023-08-06 15:22:36', 'refrigerators'),
(30, '2023-08-06 15:23:43', 'printers'),
(33, '2023-08-06 15:25:43', 'monitors'),
(34, '2023-08-06 15:26:10', 'cameras');

-- --------------------------------------------------------

--
-- Table structure for table `color_attributes`
--

CREATE TABLE `color_attributes` (
  `id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color_attributes`
--

INSERT INTO `color_attributes` (`id`, `date_added`, `name`) VALUES
(4, '2023-07-12 02:57:08', 'purple'),
(6, '2023-07-12 03:55:16', 'yellow'),
(7, '2023-07-12 03:55:19', 'green'),
(9, '2023-07-12 03:55:25', 'indigo'),
(10, '2023-07-12 03:55:44', 'orange'),
(11, '2023-07-12 20:59:39', 'blue'),
(17, '2023-08-01 00:39:54', 'red'),
(18, '2023-08-03 23:57:18', 'black'),
(19, '2023-08-04 02:19:55', 'white'),
(20, '2023-08-04 02:20:28', 'lightpink'),
(21, '2023-08-06 15:33:28', 'brown'),
(25, '2023-08-06 15:35:41', 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ph` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `iframe` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `address`, `ph`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 'ABC, Lahore Cantt', '03000000000', 'mail@electronicgala.com', 'https://facebook.com', 'https://instagram.com', 'https://twitter.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108975.79696345492!2d74.06860484335938!3d31.400522400000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3918ffd992c2e98b%3A0xbc4f09333c677253!2sVirtual%20University%20of%20Pakistan%20Head%20Office!5e0!3m2!1sen!2s!4v1690751672884!5m2!1sen!2s');

-- --------------------------------------------------------

--
-- Table structure for table `frequent_bought`
--

CREATE TABLE `frequent_bought` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bought_with` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frequent_bought`
--

INSERT INTO `frequent_bought` (`id`, `product_id`, `bought_with`) VALUES
(34, 77, 79),
(35, 77, 77),
(36, 77, 78);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `variation` varchar(55) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `shipping_fee` int(11) DEFAULT NULL,
  `order_no` varchar(55) NOT NULL,
  `product_img` varchar(55) NOT NULL,
  `status` enum('0','1','2','3','4','5','6','7') NOT NULL DEFAULT '0',
  `payment_type` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date_added`, `product_id`, `user_id`, `variation_id`, `product_name`, `variation`, `qty`, `price`, `shipping_fee`, `order_no`, `product_img`, `status`, `payment_type`) VALUES
(29, '2023-08-04 01:49:33', 77, 33, 138, 'Apple iPhone 11', 'purple', 1, 1200, 25, '871298737398296', 'PRODUCT_211417869.jpg', '5', '0'),
(30, '2023-08-06 03:24:38', 79, 33, 142, 'Samsung Galaxy A04s', 'white', 4, 796, 100, '668637654630724', 'PRODUCT_562940059.jpg', '4', '0'),
(31, '2023-08-06 16:23:05', 81, 34, 148, 'HWM 90-826Y/Haier -09kg/Fully Automatic/Top Load Washin', 'black', 1, 55000, 500, '628239844074178', 'PRODUCT_934680156.png', '2', '0'),
(32, '2023-08-06 16:44:08', 79, 34, 140, 'Samsung Galaxy A04s', 'black', 5, 995, 125, '961248259124758', 'PRODUCT_562940059.jpg', '5', '0'),
(33, '2023-08-06 17:44:16', 79, 34, 141, 'Samsung Galaxy A04s', 'lightpink', 2, 398, 50, '830032681941648', 'PRODUCT_562940059.jpg', '0', '0'),
(34, '2023-08-06 17:59:07', 79, 34, 141, 'Samsung Galaxy A04s', 'lightpink', 4, 796, 100, '929051323704980', 'PRODUCT_562940059.jpg', '0', '0'),
(35, '2023-08-06 18:07:43', 77, 34, 138, 'Apple iPhone 11', 'purple', 3, 3600, 75, '465974325599937', 'PRODUCT_211417869.jpg', '5', '0'),
(36, '2023-08-06 19:28:02', 79, 34, 141, 'Samsung Galaxy A04s', 'lightpink', 2, 398, 50, '543017711629037', 'PRODUCT_562940059.jpg', '5', '0'),
(37, '2023-08-07 19:18:52', 147, 33, 249, 'Oppo A54 Display 6.51 RAM 4GB ROM 128 GB Fast Charging ', 'black', 1, 799, 99, '998672615707978', 'PRODUCT_699420365.jpg', '0', '0'),
(38, '2023-08-07 19:19:18', 131, 33, 226, 'Lenovo 22 inch borderless Gaming Lcd Monitor For PC IPS', 'black', 1, 699, 50, '299100526279513', 'PRODUCT_325653711.jpg', '1', '0'),
(39, '2023-08-07 19:20:45', 133, 33, 228, 'Lenovo Xiaoxin Plus Bluetooth Mouse Mute Button Light S', 'black', 2, 798, 200, '797361712675496', 'PRODUCT_535168720.jpg', '2', '1'),
(40, '2023-08-07 19:21:57', 129, 33, 223, 'Xiaomi Redmi Airdots 2 Bluetooth Wireless Earbuds', 'black', 5, 1995, 250, '919730568291201', 'PRODUCT_461464802.jpg', '3', '0'),
(41, '2023-08-07 19:22:22', 141, 33, 241, 'Changhong Ruba L32X6 - 32 inch LED - HD TV- Black', 'black', 1, 799, 99, '202340550092481', 'PRODUCT_861619850.jpg', '4', '0'),
(42, '2023-08-07 19:23:29', 112, 33, 197, 'iPad mini 6 (6th Generation) Wi-Fi 64GB (2021)', 'gold', 5, 3495, 495, '788173726529743', 'PRODUCT_548339121.jpg', '5', '0'),
(43, '2023-08-07 19:23:50', 121, 33, 213, 'Dell Keyboard Wired USB', 'black', 1, 199, 99, '464649835665670', 'PRODUCT_658962680.jpg', '6', '0'),
(44, '2023-08-07 19:30:05', 134, 35, 231, 'Lenovo Thinkpad T470 - Core i5 7th Generation - 8GB DDR', 'black', 4, 3196, 400, '519760549649881', 'PRODUCT_194533711.jpg', '6', '0'),
(45, '2023-08-07 19:30:33', 139, 35, 237, 'Gree Double Door Refrigerator Direct Cool Everest Serie', 'red', 2, 1998, 198, '451209731090271', 'PRODUCT_885084421.jpg', '7', '0'),
(46, '2023-08-07 19:31:00', 117, 35, 208, 'HP DeskJet 2710 All-in-One Printer - (Print Scan Wifi) ', 'white', 4, 2796, 396, '614249299993594', 'PRODUCT_595421714.jpg', '3', '0'),
(47, '2023-08-07 19:31:46', 90, 35, 165, 'Tookss Smart Wrist Watch for Android Samsung iPhone', 'blue', 2, 400, 50, '592292759945804', 'PRODUCT_504956616.jpg', '4', '0'),
(48, '2023-08-07 19:32:19', 87, 35, 161, '2021 Samsung AU7000 55\" 4K Crystal UHD Smart TV', 'black', 4, 220000, 800, '522329565061637', 'PRODUCT_692181721.jpg', '0', '0'),
(49, '2023-08-07 19:40:41', 109, 34, 192, 'Dawlance 10 KG Top Load Fully Automatic Washing Machine', 'white', 1, 999, 100, '479691869074262', 'PRODUCT_911213147.jpg', '6', '0'),
(50, '2023-08-07 19:41:17', 124, 34, 217, 'Audionic TESLA T-10 (10000 MAH) POWER BANK PD 22.5w Sup', 'black', 2, 598, 198, '192865887069209', 'PRODUCT_223918936.jpg', '3', '0'),
(51, '2023-08-07 19:42:20', 114, 34, 203, 'Series 7 Apple_Logo Smart Watch with Metal Chain Straps', 'gold', 4, 2396, 268, '371221387892559', 'PRODUCT_865232683.jpg', '2', '0'),
(52, '2023-08-07 19:43:14', 103, 34, 183, 'Sony RX100 Mark I 20.2 MP Premium Compact Digital Camer', 'black', 3, 2097, 150, '411828225370729', 'PRODUCT_593507715.jpg', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `delivery_charges` int(55) NOT NULL,
  `img` varchar(55) NOT NULL,
  `img1` varchar(55) DEFAULT NULL,
  `img2` varchar(55) DEFAULT NULL,
  `sales` int(11) NOT NULL DEFAULT 0,
  `recommended` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `date`, `name`, `description`, `delivery_charges`, `img`, `img1`, `img2`, `sales`, `recommended`) VALUES
(77, 2, 8, '2023-08-04 00:57:55', 'Apple iPhone 11', '<h4 style=\"box-sizing: inherit; color: #202020; line-height: 1.5; margin-top: 0px; margin-bottom: 1rem; font-size: 1.4rem; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">Apple iPhone 11 specs and Price in Pakistan</h4>\r\n<h4 style=\"box-sizing: inherit; color: #202020; line-height: 1.5; margin-top: 0px; margin-bottom: 1rem; font-size: 1.4rem; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">Dual Sim or Single Sim?</h4>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">Well technically, iPhone 11 is dual sim. It has a regular physical sim slot and eSim. eSim is an advanced SIM technology through which you can have multiple numbers activated on your phone without the hassle of a SIM. Both the SIMs are PTA approved which does not put your phone at the risk of being blocked by PTA, as is the case with many phones available in the market.</p>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">In Pakistan, you can get your eSim activated through JAZZ. You can follow the&nbsp;<a style=\"box-sizing: inherit; background-color: rgba(0, 0, 0, 0); color: #48afff; text-decoration-line: none;\" href=\"https://jazz.com.pk/explore/esim\">simple steps</a>&nbsp;given on their website or call us and we will help you through the activation process.</p>\r\n<h4 style=\"box-sizing: inherit; color: #202020; line-height: 1.5; margin-top: 0px; margin-bottom: 1rem; font-size: 1.4rem; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">Warranty</h4>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">Like all products that we sell on our website, iPhone 11 also has a 1-year&nbsp;<strong style=\"box-sizing: inherit;\">official brand warranty</strong>. We source our iPhones from the official distributor in Pakistan so that you can send all claims to the official service center in Pakistan.</p>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">When you are buying from PriceOye, there is nothing you have to worry about.</p>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">&nbsp;</p>\r\n<h4 style=\"box-sizing: inherit; color: #202020; line-height: 1.5; margin-top: 0px; margin-bottom: 1rem; font-size: 1.4rem; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">Tough, Terrific Beauty</h4>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">Sheathing remarkable machinery, iPhone 11\'s 194 grams weighing body, is a phenomenal fusion of delicacy &amp; durability. Its ultra-wide, 6.1-inch Liquid Retina LCD features the toughest glass. Apple has strengthened the glass at the back &amp; front using the dual-ion exchange process. Moreover, the aluminum-glass body of the iPhone 11 possesses water-resistant properties. Unlike iPhone XR, the new model has an IP68 rating and can survive for 30 minutes up to two meters of water.</p>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">With a higher level of pixels-per-inch, iPhone 11 delivers a sharper and clearer viewing experience. It offers a high resolution of 1792 by 828 pixels. Along with an all-screen, broad, and generous display, the iPhone 11 comes with a True Tone feature. Hence, it adjusts the white balance according to the color temperature of light that surrounds you.</p>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">Representing joyous colors of life, Apple has introduced this model in six different colors. It comes in pastel tones of purple, green, and yellow as well as striking red, black, and white.</p>\r\n<h4 style=\"box-sizing: inherit; color: #202020; line-height: 1.5; margin-top: 0px; margin-bottom: 1rem; font-size: 1.4rem; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">Dual Camera System&nbsp;</h4>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">Capturing crystal clear photos at night is a difficult task for most of us. Well, not anymore! The Apple iPhone 11 comes with an entirely new dual-camera system that allows you to capture images on a varying scale of wide to ultra-wide. The 12MP wide camera provides three times quicker autofocus in low light, thus has 100% focus pixels. The 12MP ultra-wide camera helps cover a larger area and is suitable for landscapes. Also, the portrait mode combines both the cameras to produce the most stunning pictures. You can even use the High-Key light mono effect to transform your images into studio-style monochromes. The Slo-Fie feature takes pictures at 120 fps, thus making the resultant images cooler than ever. The new camera system guarantees high-resolution, clear, and vividly colored pictures, which is worth the iPhone 11 price in Pakistan. Encapsulate your memories in the most beautiful way possible!</p>\r\n<h4 style=\"box-sizing: inherit; color: #202020; line-height: 1.5; margin-top: 0px; margin-bottom: 1rem; font-size: 1.4rem; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">4K Dynamic Video</h4>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">It takes only a swipe to the right, to begin filming with your iPhone 11. Apple realizes that the curvy road to the video recorder in our phones forms a terrible partner of our precious flying and worth-capturing moments. Thus, the company has equipped iPhone 11 with QuickTake function. While you\'re in the photo mode, hold the shutter and swipe to the right to start recording a video instantly.</p>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">Its quadrupled video quality and A13 Bionic enables automatic tracking of a moving subject with clarity and details. Giving incredible cinematic effects, it captures gradual changes with perfection and shifting shades and depth of colors. Furthermore, the Spatial Audio and Dolby Atmos of the iPhone 11 guarantees an immersive, enthralling experience.</p>\r\n<h4 style=\"box-sizing: inherit; color: #202020; line-height: 1.5; margin-top: 0px; margin-bottom: 1rem; font-size: 1.4rem; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">Fast &amp; Furious A13 Bionic&nbsp;</h4>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">The A13 Bionic is the newest and yet the fastest Apple chip to process even the most intensive task in seconds. You can play several video games, download applications, and do heavy multi-tasking without the risk of any disruption. It is due to the A13 Bionic chip that we can capture high-resolution images in mere seconds. Apart from faster processing, the A13 Bionic works in an extra energy-efficient way. Thus, the battery life lasts longer. Considering the iPhone price in Pakistan 2019 and its super-efficient processor, it&rsquo;s certainly an extraordinary deal!</p>\r\n<h4 style=\"box-sizing: inherit; color: #202020; line-height: 1.5; margin-top: 0px; margin-bottom: 1rem; font-size: 1.4rem; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">Conclusion&nbsp;</h4>\r\n<p style=\"box-sizing: inherit; margin-bottom: 30px; margin-top: 0px; color: rgba(7, 18, 27, 0.6); font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px;\">Indeed, the Apple iPhone 11 consists of remarkable features ranging from high-quality pictures to ultra-fast processing speed. The recent iPhone 11 price in Pakistan is Rs.180,000 that may seem hefty at a single glance. But, the price is quite nominal when compared to its outstanding features.</p>', 25, 'PRODUCT_211417869.jpg', 'PRODUCT_972830549.jpg', 'PRODUCT_241165685.jpg', 103, '1'),
(78, 18, 13, '2023-08-04 02:14:34', 'Audionic Airbud 325 Wireless Earbuds', '<table class=\"p-spec-table card\" style=\"box-sizing: inherit; margin-bottom: calc(15px); border-radius: 4px; border-spacing: 0px; width: 470px; padding: 10px; break-inside: avoid; color: #202020; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<thead style=\"box-sizing: inherit; border-bottom: 1px solid #48afff; color: #07121b;\">\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border-bottom: initial; padding: 5px 0px 10px; text-align: left;\" colspan=\"2\">General Features</th>\r\n</tr>\r\n</thead>\r\n<tbody style=\"box-sizing: inherit; margin-bottom: 30px;\">\r\n<tr style=\"box-sizing: inherit; padding: 10px 0px;\">\r\n<th style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Model</th>\r\n<td style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">325</td>\r\n</tr>\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Waterproof</th>\r\n<td style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">6MM</td>\r\n</tr>\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Wearing Type</th>\r\n<td style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">In Ear</td>\r\n</tr>\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border: none; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Volume Control</th>\r\n<td style=\"box-sizing: inherit; border: none; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">Yes</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"p-spec-table card\" style=\"box-sizing: inherit; margin-bottom: calc(15px); border-radius: 4px; border-spacing: 0px; width: 470px; padding: 10px; break-inside: avoid; color: #202020; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<thead style=\"box-sizing: inherit; border-bottom: 1px solid #48afff; color: #07121b;\">\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border-bottom: initial; padding: 5px 0px 10px; text-align: left;\" colspan=\"2\">Battery</th>\r\n</tr>\r\n</thead>\r\n<tbody style=\"box-sizing: inherit; margin-bottom: 30px;\">\r\n<tr style=\"box-sizing: inherit; padding: 10px 0px;\">\r\n<th style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Charging Time</th>\r\n<td style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">1.5 Hrs</td>\r\n</tr>\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Playtime</th>\r\n<td style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">6 HRS</td>\r\n</tr>\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Battery Capacity for Buds</th>\r\n<td style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">N/A</td>\r\n</tr>\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border: none; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Battery Capacity for Case</th>\r\n<td style=\"box-sizing: inherit; border: none; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">N/A</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"p-spec-table card\" style=\"box-sizing: inherit; margin-bottom: initial; border-radius: 4px; border-spacing: 0px; width: 470px; padding: 10px; break-inside: avoid; border-bottom: 1px solid rgba(0, 0, 0, 0); color: #202020; font-family: \'Open Sans\', \'Noto Nastaliq Urdu Draft\', Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<thead style=\"box-sizing: inherit; border-bottom: 1px solid #48afff; color: #07121b;\">\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border-bottom: initial; padding: 5px 0px 10px; text-align: left;\" colspan=\"2\">Connectivity</th>\r\n</tr>\r\n</thead>\r\n<tbody style=\"box-sizing: inherit; margin-bottom: 30px;\">\r\n<tr style=\"box-sizing: inherit; padding: 10px 0px;\">\r\n<th style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Bluetooth Version</th>\r\n<td style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">5.0</td>\r\n</tr>\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Bluetooth Range</th>\r\n<td style=\"box-sizing: inherit; border-bottom: 0.1rem solid #d7d9db; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">20Hz - 20,000Hz</td>\r\n</tr>\r\n<tr style=\"box-sizing: inherit;\">\r\n<th style=\"box-sizing: inherit; border: none; padding: 6px 0px; text-align: left; color: gray; vertical-align: top; width: 150px;\">Microphone</th>\r\n<td style=\"box-sizing: inherit; border: none; padding: 6px 0px; color: #07121b; vertical-align: top; line-height: 1.42; font-weight: 600;\">Dual</td>\r\n</tr>\r\n</tbody>\r\n</table>', 15, 'PRODUCT_707967928.jpg', 'PRODUCT_444580288.jpg', 'PRODUCT_219940296.jpg', 8, '0'),
(79, 2, 1, '2023-08-04 02:39:03', 'Samsung Galaxy A04s', '<h1 style=\"text-align: center;\"><u><strong>Maximize your view to the fullest</strong></u></h1>\r\n<p>Expand your view to the 6.5-inch Infinity-V Display on Galaxy A04s and see what you\'ve been missing. Thanks to HD+ technology, your everyday content looks its better&mdash;sharp, crisp and clear.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://priceoye-images.s3-accelerate.amazonaws.com/media/a04s/pk-feature-maximize-your-view-to-the-fullest-537051020.avif\" alt=\"\" width=\"487\" height=\"340\" /></p>\r\n<p><img src=\"https://priceoye-images.s3-accelerate.amazonaws.com/media/a04s/Screenshot%202023-06-21%20155025.png\" alt=\"\" width=\"100%\" height=\"auto\" /></p>\r\n<h1 style=\"text-align: center;\"><u><strong>Minimal look, quality design</strong></u></h1>\r\n<p>Behold the comfortable, sleek curves on Galaxy A04s seamless design.Galaxy A04s combines streamlined design aesthetics with classic colors. Choose from Black, Green, White and Copper colors.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://priceoye-images.s3-accelerate.amazonaws.com/media/a04s/pic.avif\" alt=\"\" width=\"720\" height=\"360\" /></p>\r\n<h1 style=\"text-align: center;\"><u><strong>Capture more moments with Triple Camera</strong></u></h1>\r\n<p>Turn your gallery into a treasure trove of photos taken with your creative touch. Snap memorable moments in clear detail with the 50MP Main Camera.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://priceoye-images.s3-accelerate.amazonaws.com/media/a04s/another%20pic.jpeg\" alt=\"\" width=\"720\" height=\"400\" /></p>\r\n<h1 style=\"text-align: center;\"><u><strong>Bring the focus to the front with Depth Camera</strong></u></h1>\r\n<p>The 2MP Depth Camera lets you adjust the depth of field in your photos. Adjust the background blur for high-quality portrait shots that make your subject truly stand out.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://priceoye-images.s3-accelerate.amazonaws.com/media/a04s/portrait.avif\" alt=\"\" width=\"720\" height=\"383\" /></p>\r\n<p>&nbsp;</p>', 25, 'PRODUCT_562940059.jpg', 'PRODUCT_276145862.jpg', 'PRODUCT_748998797.jpg', 83, '1'),
(81, 27, 2, '2023-08-06 16:20:58', 'HWM 90-826Y/Haier -09kg/Fully Automatic/Top Load Washing Machine/10 Years Brand Warranty.', '<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i1.295a20bd7Dm1GB\">Soaking-Washing-Rinsing-Spinning/Drying</li>\r\n<li class=\"\">Wash &amp; Spin Capacity: 9Kg</li>\r\n<li class=\"\">RPM: 1300</li>\r\n<li class=\"\">Pillow Drum</li>\r\n<li class=\"\">Dual Lint Filters</li>\r\n<li class=\"\">Quick Wash</li>\r\n<li class=\"\">Tinted Glass Lid</li>\r\n<li class=\"\">LED Display &amp; Digital Panel</li>\r\n<li class=\"\">Auto Restart Function</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i2.295a20bd7Dm1GB\">Memory Backup</li>\r\n<li class=\"\">Fuzzy Logic</li>\r\n<li class=\"\">Low Noise and Less Vibration</li>\r\n<li class=\"\">PCM Cabinet (Rust Free)</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i3.295a20bd7Dm1GB\">Dimensions: L550 x W570 x H940</li>\r\n<li class=\"\">Normal Motor</li>\r\n</ul>', 500, 'PRODUCT_934680156.png', 'PRODUCT_382996414.jpeg', 'PRODUCT_342368948.webp', 1, '1'),
(83, 2, 1, '2023-08-07 01:20:18', 'Samsung Galaxy Tab E - 1.5GB RAM - 16GB ROM - Android 8 - FREE TABLET COVER', '<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i0.eba93ca02M45PJ\">Licensed Android Certified TV 11.0</li>\r\n<li class=\"\">Dolby Digital Decoding</li>\r\n<li class=\"\">Resolution: 1366 x 768 with HDR</li>\r\n<li class=\"\">Processor: ARM CA55 Quad Core with TEE</li>\r\n<li class=\"\">WIFI and Ethernet Lan Connectivity</li>\r\n<li class=\"\">Google Chromecast (Screen Mirroring)</li>\r\n<li class=\"\">Google Play store (Certified)</li>\r\n<li class=\"\">Netflix &amp; Youtube</li>\r\n<li class=\"\">IOT HUB</li>\r\n<li class=\"\">High Resolution with 60Hz</li>\r\n<li class=\"\">Refresh Rate Response Time 08ms</li>\r\n<li class=\"\">RAM 1 GB DDR3, Storage 8 GB</li>\r\n<li class=\"\">USB, HDMI&amp; HeadPhone Jack</li>\r\n<li class=\"\">Multi Picture &amp; Audio Modes</li>\r\n<li class=\"\">Voltage: 100-240v</li>\r\n<li class=\"\">One Touch Netflix &amp; Youtube</li>\r\n<li class=\"\">Sound 2*10 Watts Output</li>\r\n<li class=\"\">Contrast Ratio: 1200:1</li>\r\n</ul>', 200, 'PRODUCT_765076933.jpg', 'PRODUCT_288332825.jpg', 'PRODUCT_596727687.jpg', 0, '1'),
(84, 1, 1, '2023-08-07 01:26:43', 'samsung LED 32 inch', '<div class=\"html-content detail-content\">Samsung Copy&nbsp;\r\n<div>32 inch&nbsp;</div>\r\n<div data-spm-anchor-id=\"a2a0e.pdp.product_detail.i1.61235646fzHr3e\">Smart Android&nbsp;</div>\r\n<div>Best quality panel&nbsp;</div>\r\n<div>Netflix&nbsp;</div>\r\n<div>YouTube&nbsp;</div>\r\n<div>And many other apps&nbsp;</div>\r\n</div>\r\n<div class=\"pdp-mod-specification\">\r\n<h2 class=\"pdp-mod-section-title \" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i3.61235646fzHr3e\">Specifications of Samsung China 32&rdquo; LED Tv Smart Android</h2>\r\n<div class=\"pdp-general-features\">\r\n<ul class=\"specification-keys\">\r\n<li class=\"key-li\"><span class=\"key-title\">Brand</span>\r\n<div class=\"html-content key-value\">No Brand</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">SKU</span>\r\n<div class=\"html-content key-value\">426686994_PK-2025447214</div>\r\n</li>\r\n<li class=\"key-li\"><span class=\"key-title\">Display Size (inches)</span>\r\n<div class=\"html-content key-value\">32 Inches</div>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class=\"box-content\"><span class=\"key-title\">What&rsquo;s in the box</span>\r\n<div class=\"html-content box-content-html\">LED Tv + Remote</div>\r\n</div>\r\n</div>', 150, 'PRODUCT_186635997.jpg', 'PRODUCT_310650996.webp', 'PRODUCT_792467178.jpeg', 0, '1'),
(87, 1, 1, '2023-08-07 15:17:23', '2021 Samsung AU7000 55\" 4K Crystal UHD Smart TV', '<p>Product details of Samsung 43\" T5300 FHD Smart TV<br />FHD<br />Smart<br />Screen Mirroring</p>', 200, 'PRODUCT_692181721.jpg', 'PRODUCT_311714406.webp', 'PRODUCT_103215894.jpg', 0, '1'),
(90, 21, 1, '2023-08-07 16:54:46', 'Tookss Smart Wrist Watch for Android Samsung iPhone', '<p>Product details of Tookss Smart Wrist Watch for Android Samsung iPhone<br />240 x 240 pixel HD display screen.<br />Make and receive phone calls, read and send text messages (android only).<br />380 mah battery provides 10 + hours of standby and 2 - 3 hours talk time.<br />Sedentary reminder to keep you active.<br />Pedometer, calculator, sleep monitor, information reminder.<br />Description:</p>\r\n<p>Item type:Smart Watch</p>\r\n<p>Frequency: 850/900/1800/1900 MHz ( card didn\'t included in package)</p>\r\n<p>RAM: 128 MB + 64 MB, Maximum Support 32GB TF Card</p>\r\n<p>Display Screen: 1.54 inch</p>\r\n<p>Resolution: 240*240 pixels</p>\r\n<p>Bluetooth Version 3.0</p>\r\n<p>Camera: 1.3 pixels</p>\r\n<p>Battery: 400 mAh lithium polymer</p>\r\n<p>Touch Screen: OGS capacitive touchscreen, full lamination technology</p>\r\n<p>Band Material: Silicone</p>\r\n<p>Case: Stainless Steel</p>\r\n<p>Calling Time: &gt;2 hours</p>\r\n<p>Compatible Models : For Android Phond IOS Phone</p>\r\n<p>Notes: For iOS system it cannot download the APP</p>\r\n<p>Languages: English, French, Spanish, Polish, Portuguese, Italian, Czech, Turkish, Deutsch, Persian, Russian, Arabic</p>\r\n<p>Package Include:</p>\r\n<p>1x Smart Watch With Box</p>\r\n<p>1x User Manual</p>\r\n<p>1x USB Cable</p>\r\n<p>Note:</p>\r\n<p>The colors deviation might differ due to different monitor settings.</p>\r\n<p>We provide you with the best product and service, if you have any problem, please let us know, and we will solve the problem ASAP. Thank you so much.</p>', 25, 'PRODUCT_504956616.jpg', 'PRODUCT_196715517.jpg', 'PRODUCT_853116819.jpg', 0, '1'),
(91, 1, 1, '2023-08-07 16:58:10', '2021 Samsung AU7000 55\" 4K Crystal UHD Smart TV', '<p>Product details of Samsung 43\" T5300 FHD Smart TV<br />FHD<br />Smart<br />Screen Mirroring</p>', 50, 'PRODUCT_770041578.jpg', 'PRODUCT_771742559.jpg', 'PRODUCT_995103445.jpg', 0, '1'),
(92, 2, 1, '2023-08-07 17:00:46', 'Samsung Galaxy A32 - RAM 6GB - ROM 128 GB - Display 6.4 - Multi Quad Camera system - Battery 5000 mAh 1 Year Official Warranty', '<p>Samsung Galaxy A32 -</p>\r\n<p>RAM 6GB - ROM 128 GB -</p>\r\n<p>Display 6.4 -</p>\r\n<p>Multi Quad Camera system -</p>\r\n<p>Battery 5000 mAh</p>\r\n<p>1 Year Official Warranty</p>', 50, 'PRODUCT_642124060.jpg', 'PRODUCT_897528550.jpg', 'PRODUCT_588688569.jpg', 0, '1'),
(93, 24, 1, '2023-08-07 17:02:52', 'Samsung Galaxy Tab A7 Lite 8 inches 3GB Ram, 32GB Rom WIFI Tablet (FREE BOOK COVER)', '<p>Samsung Galaxy Tab A7 Lite 8 inches 3GB Ram, 32GB Rom WIFI Tablet (FREE BOOK COVER)<br />6 Months Warranty (T&amp;C apply) Warranty Center Location: Karachi Daraz Like New products are in Good Condition. They look and feel like new. Very minimal to no scratches (but no discolouration) Fully functional A preinstalled operating system Product will be in Daraz Like New Original Packaging SAMSUNG Tab A7 Lite WIFI Tablet, 8.7\" Display. Size: 8.7\" ... Platform. Processor:Mediatek MT8768T Helio P22T (12 nm) Octa-core (4x2.3 GHz Cortex-A53 &amp; 4x1.8 GHz Cortex-A53) Memory. RAM: 3GB. ... Storage.ROM.32GB Camera. Main camera:8 MP, AF Connectivity. Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct Sensors Accelerometer, compass Battery Li-Po 5100 mAh, non-removable</p>', 25, 'PRODUCT_597698388.jpg', 'PRODUCT_821805607.jpg', 'PRODUCT_501059459.jpg', 0, '1'),
(94, 29, 2, '2023-08-07 17:05:29', 'Haier 16 Cu Ft/Digital Inverter/HRF-438IDBA (Digital Control Panel+Turbo Fan+4 Temperature Sensors+ABT Technology+Inverter Compressor+Glass Door) Black Colour Refrigerator/10 Years Warranty', '<p>Product details of Haier 16 Cu Ft/Digital Inverter/HRF-438IDBA (Digital Control Panel+Turbo Fan+4 Temperature Sensors+ABT Technology+Inverter Compressor+Glass Door) Black Colour Refrigerator/10 Years Warranty<br />Brand Warranty<br />10 Years Compressor Warranty<br />Less than 1 Unit a day<br />Antibacterial Technology<br />ABT Sterilization<br />FD Inverter<br />Blue Turbo Cooling<br />Digital Control System<br />4 Temperature Sensors<br />Fastest Freshness Cooling Antibacterial Technology<br />A+ Inverter Compressor<br />105V~260V Full Voltage Operation<br />1 Hour Icing Technology<br />One Touch Smart Control<br />Refrigerant R600<br />Turbo Cooling<br />100 Hours Cooling Retention<br />60% Energy Saving<br />2+1 LED Lighting<br />Color: Black<br />HxWxD(mm)=1775x660x610<br />Net Capacity: 408L</p>', 50, 'PRODUCT_162156857.jpg', 'PRODUCT_202455649.jpg', 'PRODUCT_348567679.jpg', 0, '1'),
(95, 28, 2, '2023-08-07 17:09:12', 'Haier (Flexis Inverter Series) 1.5 Ton DC Inverter UPS Enabled - Self Cleaning - Optional WiFi -3D AirFlow-White Colour AC - HSU-18HFCS/10 Years Warranty/Air Conditioner/Haier Free Installation', '<p>Product details of Haier (Flexis Inverter Series) 1.5 Ton DC Inverter UPS Enabled - Self Cleaning - Optional WiFi -3D AirFlow-White Colour AC - HSU-18HFCS/10 Years Warranty/Air Conditioner/Haier Free Installation<br />Appearance Color White Performance<br />Specifications Cooling Capacity (BTU) 19000 Current 2.3 ~8.7 Power 0.41 ~ 1.95 Heating Capacity (BTU) 19500 Current 2.4 ~8.5 Power 0.42 ~ 1.85 Other Parameters Input Power Supply (Ph, VAC, Hz) 1PH,220V ̴, 50Hz Air Flow Volume (m3/h) 850 Refrigerant Type R-32 Amount (g) 1000 Indoor Net Dimension (L*W*H) mm&sup3; 900*215*310 Packing Carton (L*W*H) mm&sup3; 982*396*302 Net Weight Kg 12.5 Gross Weight Kg 15.5 Outdoor Net Dimension (L*W*H) mm&sup3; 820*300*610 Packing Carton (L*W*H) mm&sup3; 955*418*670 Net Weight Kg 35 Gross Weight Kg 38 Features Modes Cooling Y Heating Y Dry Y Swing Options Vertical Flapper Auto Swing Y Horizontal Louvers Auto Swing Y Air Purification N Wifi Function Optional Solar &amp; Grid Auto Balance N UPS Operation Y Self Clean Y Anti Rust Product Y Eco mode Y Turbo Y Anti Rust Product Y</p>', 50, 'PRODUCT_802321713.jpg', 'PRODUCT_985693064.jpg', 'PRODUCT_344135908.jpg', 0, '1'),
(96, 27, 2, '2023-08-07 17:10:40', 'HWM 75-AS / 7.5kg/ TWIN TUB WASHING MACHINE / SEMI AUTOMATIC / 10 Years Brand Warranty.', '<p>Product details of HWM 75-AS / 7.5kg/ TWIN TUB WASHING MACHINE / SEMI AUTOMATIC / 10 Years Brand Warranty.<br />7.5 kg washing capacity<br />4.5 kg spinner capacity<br />Overheating Sensor<br />Copper Wiring Motor<br />Lint Filter<br />Virgin Plastic Body (Rust Free)<br />Trouble-Free Wash<br />Dimensions: L735 x W425 x H850<br />Wide Range Voltage Design<br />White Cabinet Color<br />Gear System Technology<br />Compact Design<br />Normal Motor</p>', 50, 'PRODUCT_456460699.jpg', 'PRODUCT_241420438.jpg', 'PRODUCT_905417160.jpg', 105, '1'),
(97, 26, 2, '2023-08-07 17:12:32', 'Haier 20L/Solo/HGL-20MXP8 (Internal Light+ Pull Handle Door) Microwave Oven/1 Year Brand Warranty', '<p>Product details of Haier 20L/Solo/HGL-20MXP8 (Internal Light+ Pull Handle Door) Microwave Oven/1 Year Brand Warranty<br />20 Litre Solo MWO Oven<br />Mechanical Control<br />700 Watts Output Power<br />6 Microwave Power Levels<br />Speed &amp; Weight Defrost<br />3 Cooking Guide<br />Alarm Signal<br />Internal Light</p>', 50, 'PRODUCT_911040694.jpg', 'PRODUCT_774099001.jpg', 'PRODUCT_947270389.jpg', 50, '1'),
(98, 1, 2, '2023-08-07 17:14:28', 'Candy by Haier 32 Android Smart LED TV, (C32K6G)-2 Years Brand Warranty', '<p>Product details of Candy by Haier 32 Android Smart LED TV, (C32K6G)-2 Years Brand Warranty<br />Licensed Android Certified TV 11.0<br />Dolby Digital Decoding<br />Resolution: 1366 x 768 with HDR<br />Processor: ARM CA55 Quad Core with TEE<br />WIFI and Ethernet Lan Connectivity<br />Google Chromecast (Screen Mirroring)<br />Google Play store (Certified)<br />Netflix &amp; Youtube<br />IOT HUB<br />High Resolution with 60Hz<br />Refresh Rate Response Time 08ms<br />RAM 1 GB DDR3, Storage 8 GB<br />USB, HDMI&amp; HeadPhone Jack<br />Multi Picture &amp; Audio Modes<br />Voltage: 100-240v<br />One Touch Netflix &amp; Youtube<br />Sound 2*10 Watts Output<br />Contrast Ratio: 1200:1</p>', 50, 'PRODUCT_692583333.jpg', 'PRODUCT_827665078.jpg', 'PRODUCT_609050510.jpg', 30, '1'),
(99, 1, 4, '2023-08-07 17:56:24', 'S G 75 inch Smart Android WiFi 4K Led TV', '<p>Product details of S G 75 inch Smart Android WiFi 4K Led TV<br />Screen Cast / Mobile Mirror.<br />Fully Android LED TV.<br />4K Resolution.<br />FHD Sound.<br />WiFi / LAN Supported.<br />YouTube and many more apps.<br />Made In Germany<br />4K Fulll HD Resolution with HD Sound.<br />WiFi / LAN supported.<br />USB Supported.<br />HDMI Supported.<br />AVI Supported.<br />YouTube and many other apps.<br />Made In Germany</p>', 50, 'PRODUCT_422716316.jpg', 'PRODUCT_268410515.jpg', 'PRODUCT_936581150.jpg', 0, '0'),
(100, 33, 4, '2023-08-07 17:58:08', 'Redragon Pearl 23.6 inch 165Hz Curved Gaming Monitor 4ms Full HD VA Panel GM24G3C', '<p>Product details of Redragon Pearl 23.6 inch 165Hz Curved Gaming Monitor 4ms Full HD VA Panel GM24G3C<br />Taille : 23.6\"<br />Frequency : 165 Hz<br />VA panel<br />Optimal resolution :1920*1080<br />Response Time : 4ms<br />FreeSync Premium<br />Extreme OD functionality<br />5 Modes : Standard, Movie, FPS Games, RTS, Eye Saver<br />5 colors Mode : DCI-P3, sRGB, Adobe RGB<br />Specifications of Redragon Pearl 23.6 inch 165Hz Curved Gaming Monitor 4ms Full HD VA Panel GM24G3C<br />BrandRedragonSKU391996005_PK-1915405596ModelGM24G3CGraphics MemoryN/A</p>', 50, 'PRODUCT_185605714.jpg', 'PRODUCT_502888463.jpg', 'PRODUCT_115580471.jpg', 0, '0'),
(101, 30, 4, '2023-08-07 18:00:28', 'Speedx 400UL Thermal Printer for Receipt (Raseed Printer)', '<p>Product details of Speedx 400UL Thermal Printer for Receipt (Raseed Printer)<br />80mm Printer With Auto Cutter Function,. High Efficiency Auto Cutter And The Fastest Printing Speed.Long Lasting Auto-Cutter Up To 3million Cuts.Print Width:79.5&plusmn;0.5mm; Paper Width:3 1/8\" (80mm). No Need For Ribbon/Ink.<br />Support Windows And Mac Software Based On ESC/POS Command.<br />Compatible With ESC/POS Instruction Set. Can Be Widely Used In Supermarket, Restaurant, Retail Store etc.<br />Support Download And Print Logo &amp; Graphics. Support 1D,2D Bar Code Printing. Beeping Sound Can Be Closed. Support Cash Drawer.<br />Support Win XP, Vista, 7, 8, And 10,Store LOGO Could Be Added On The Receipt.</p>', 50, 'PRODUCT_654373611.jpg', 'PRODUCT_516104671.jpg', 'PRODUCT_362883224.jpg', 0, '0'),
(102, 23, 4, '2023-08-07 18:01:58', 'Latest Ultra Slim Pocket Size Power Bank compatible with all Mobile Phones', '<p>Product details of Latest Ultra Slim Pocket Size Power Bank compatible with all Mobile Phones<br />100% original as shown in picture<br />Multi-Protection<br />Premium Microchip<br />1A Output<br />Easily charge your Qi-compatible phone by placing it on this pad<br />No need to connect any cable to the phone<br />Great to charge more devices via USB output<br />Dual USB output supports 1A and 2.1A<br />Battery Capacity 10,000 mAH<br />Input DC 5V - 2A (Max)<br />Built-in over-charge protection<br />Maximum ambient temperature 25 degrees Celsius</p>', 50, 'PRODUCT_253956075.jpg', 'PRODUCT_423382981.jpg', 'PRODUCT_217152088.jpg', 0, '0'),
(103, 34, 4, '2023-08-07 18:03:08', 'Sony RX100 Mark I 20.2 MP Premium Compact Digital Camera w/ 1-inch sensor, 28-100mm ZEISS zoom lens, 3” LCD', '<p>Product details of Sony RX100 Mark I 20.2 MP Premium Compact Digital Camera w/ 1-inch sensor, 28-100mm ZEISS zoom lens, 3&rdquo; LCD<br />20.2 Megapixel Sensor: The RX100 Mark I boasts a 1.0-inch Exmor CMOS sensor with 20.2 megapixels, enabling high-resolution image capture with exceptional detail and clarity.<br />Carl Zeiss Vario-Sonnar Lens: The camera features a high-quality Carl Zeiss Vario-Sonnar T* lens with a focal length range of 28-100mm (35mm equivalent). It delivers sharp and vibrant images across the zoom range, making it versatile for various photography genres.<br />Bright F1.8 Aperture: With a maximum aperture of F1.8, the RX100 Mark I excels in low-light situations, allowing you to capture well-exposed images with reduced noise and excellent bokeh effects.<br />Advanced Image Processor: The BIONZ image processor ensures fast performance and accurate image reproduction, resulting in stunning photos with vibrant colors and high dynamic range.<br />Full HD Video Recording: The RX100 Mark I supports Full HD 1080p video recording at 60 frames per second, providing smooth and high-quality videos with stereo sound. You can capture memorable moments in exceptional detail.<br />Manual Controls and RAW Support: Enjoy full control over your photography with manual settings, including aperture priority, shutter priority, and full manual mode. The camera also supports shooting in RAW format, allowing for greater flexibility and post-processing capabilities.<br />Pop-up Flash and Hot Shoe: The built-in pop-up flash provides additional lighting options for low-light conditions or creative lighting effects. The hot shoe allows you to attach external flashes or other accessories to expand your photography possibilities.<br />3.0-inch Tiltable LCD Screen: The RX100 Mark I features a 3.0-inch LCD screen that can be tilted up to 45 degrees downwards and 84 degrees upwards, allowing for easy framing and shooting from various angles.<br />Compact and Portable Design: Designed for portability, the RX100 Mark I is a pocket-sized camera that you can easily carry with you wherever you go. It is ideal for travel photography or capturing spontaneous moments.<br />Fast Autofocus and Continuous Shooting: The camera\'s Fast Intelligent AF system ensures quick and accurate autofocus, enabling you to capture fast-moving subjects with precision. It also offers continuous shooting at up to 10 frames per second, allowing you to capture multiple shots in rapid succession.</p>', 50, 'PRODUCT_593507715.jpg', 'PRODUCT_775538414.jpg', 'PRODUCT_760911083.jpg', 0, '1'),
(104, 29, 5, '2023-08-07 18:04:49', 'LG NAGINA REFRIGERATOR GN-B502PQGB INVERTER', '<p>Product details of LG NAGINA REFRIGERATOR GN-B502PQGB INVERTER<br />DoorCooling⁺&trade; for Even and Fast Cooling<br />Every Corner of the Fridge is Full of Fressness Thanks to Multi Air Flow<br />Smart Inverter Compressor for Energy Efficiency and Durability<br />Connect to LG Customer Support Directly with ThinQ&trade; Smart Diagnosis&trade;\\<br />Door Cooling<br />Multi Air Flow<br />Smart Inverter Compressor<br />Smart Diagnosis<br />DoorCooling⁺&trade; for Even and Fast Cooling<br />Every Corner of the Fridge is Full of Fressness Thanks to Multi Air Flow<br />Smart Inverter Compressor for Energy Efficiency and Durability<br />Connect to LG Customer Support Directly with ThinQ&trade; Smart Diagnosis&trade;</p>\r\n<p>Door Cooling<br />Multi Air Flow<br />Smart Inverter Compressor<br />Smart Diagnosis<br />Specifications of LG NAGINA REFRIGERATOR GN-B502PQGB INVERTER<br />BrandLGSKU422774238_PK-2000830988Refrigerator TypeDisplayNumber of doors2colorGREYCapacity351 to 450 LTRRefrigerator FeaturesAutomatic Ice-Maker</p>', 80, 'PRODUCT_394575448.jpg', 'PRODUCT_542489115.jpg', 'PRODUCT_269550826.jpg', 0, '0'),
(105, 22, 5, '2023-08-07 18:06:02', 'Remote Control Akb73575401 for Lg Sound Bar Nb2430A Nb4540 Nb5540A Nb5541', '<p>Product details of Remote Control Akb73575401 for Lg Sound Bar Nb2430A Nb4540 Nb5540A Nb5541<br />Use: Audio / Video Players<br />Wireless Communication: IR<br />Model Number: SD-AKB73575401<br />Frequency: 433 MHz<br />Use: Audio / Video Players<br />Wireless Communication: IR<br />Model Number: SD-AKB73575401<br />Frequency: 433 MHz<br />Support APP: No<br />Colour: Black<br />Material: ABS<br />Package Contents: 1* Remote Control</p>', 50, 'PRODUCT_962784194.jpg', 'PRODUCT_890496931.jpg', 'PRODUCT_889681440.jpg', 0, '0'),
(106, 2, 5, '2023-08-07 18:07:44', 'Lg V60 Thing original Official Pta approved 8/128 single sim only', '<p>Product details of Lg V60 Thing original Official Pta approved 8/128 single sim only<br />LG V60 ORIGINAL PRODUCT 10BY10 WATERPACK SINGLE SIM ONLY WE MAKE PTA APPROVED AFTER DELIVERY ON CNIC<br />DISPLAY<br />Type P-OLED, HDR10+<br />Size 6.8 inches, 109.8 cm2 (~83.6% screen-to-body ratio)<br />Resolution 1080 x 2460 pixels (~395 ppi density)<br />Protection Corning Gorilla Glass 5<br />Always-on displa</p>\r\n<p>MEMORY<br />Card slot microSDXC (uses shared SIM slot) - dual-SIM model<br />Internal 128GB 8GB RAM, 256GB 8GB RAM<br />UFS 2.1<br />MAIN CAMERA<br />Dual 64 MP, f/1.8, 27mm (standard), 1/1.72\", 0.8&micro;m, Dual pixel PDAF, OIS<br />13 MP, f/1.9, 12mm (ultrawide), 1/3.4\", 1.0&micro;m<br />0.3 MP, TOF 3D, f/1.4, (depth)<br />Features Dual-LED dual-tone flash, HDR, panorama<br />Video 8K@30fps, 4K@30/60fps, 1080p, HDR10+, 24-bit/192kHz stereo sound rec., gyro-EIS</p>\r\n<p>BATTERY<br />Type Li-Po 5000 mAh, non-removable<br />Charging Wired, PD2.0, QC4<br />Wireless</p>', 50, 'PRODUCT_179375311.jpg', 'PRODUCT_462077052.jpg', 'PRODUCT_291628987.jpg', 0, '0'),
(107, 28, 6, '2023-08-07 18:09:16', 'Dawlance Air Conditioner Mega T+ 10 DC Inverter 0.75 Ton / Split AC / Cool Only / 8000 BTU', '<p>Product details of Dawlance Air Conditioner Mega T+ 10 DC Inverter 0.75 Ton / Split AC / Cool Only / 8000 BTU<br />Inverter Technology: Cool Only<br />Auto Restart: Yes<br />Display: Hidden Display<br />Timer: Yes<br />Sleep Mode: Yes<br />Indoor Unit Cooling Operating Range (&Atilde;&Acirc;&deg; C): 17 ~ 32<br />Condenser Fin: Golden Fin<br />Cooler liquid: R32<br />Energy in Heating (W): 1100<br />Sleep mode: Yes<br />Removable/ Washable Panel: Yes<br />Self Diagnosis: Yes<br />Turbo Mode: Yes<br />Memory Function: Yes<br />Anti Rust Outdoor Casing: Yes<br />Cooling Capacity (Btu / h): 8000 BTU/h<br />Voltage Range: 220V-240V</p>', 99, 'PRODUCT_869283450.jpg', 'PRODUCT_384357193.jpg', 'PRODUCT_553722593.jpg', 0, '0'),
(108, 26, 6, '2023-08-07 18:10:38', 'Dawlance Electric Oven DWMO-4215 CR Convection / Baking / 42 Liters', '<p>Product details of Dawlance Electric Oven DWMO-4215 CR Convection / Baking / 42 Liters<br />42L Capacity<br />1500 W Grill<br />6 Functions<br />Pizza Size: 15&rdquo;<br />Bake, Grill, Broil, Warm<br />Convection<br />Rotisserie<br />Internal Lamp<br />Free Recipe book<br />European Quality Standard</p>', 99, 'PRODUCT_487693623.jpg', 'PRODUCT_893781872.jpg', 'PRODUCT_503206513.jpg', 0, '0'),
(109, 27, 6, '2023-08-07 18:11:58', 'Dawlance 10 KG Top Load Fully Automatic Washing Machine DWT 260 ES/ 10 Years Brand Warranty', '<p>Product details of Dawlance 10 KG Top Load Fully Automatic Washing Machine DWT 260 ES/ 10 Years Brand Warranty<br />Series: Energy Saver Series<br />Color: White<br />Type: Top Load<br />Lid Type: Glass Lid<br />Sound Level: 50 dB<br />Triple Waterfall: Yes<br />Pro Fabric Drum: Yes<br />Water Level Adjustment: Yes<br />Soft Closing Door: Yes<br />Child Lock: Yes<br />Recycle Water: Yes<br />Hand Wash: Yes<br />Unbalanced Load Control: Yes<br />Number of Programs: 10<br />Water Level: 10<br />Parts Warranty: 1 Year<br />Motor Warranty: 10 Years<br />PCB Warranty: 3 Years<br />Customer Service: 24 Hours Resolution</p>', 100, 'PRODUCT_911213147.jpg', 'PRODUCT_879555188.jpg', 'PRODUCT_912394347.jpg', 0, '1'),
(110, 1, 6, '2023-08-07 18:13:08', 'Dawlance 32\" inch 32E3A Simple HD LED With Official Warranty', '<p>Product details of Dawlance 32\" inch 32E3A Simple HD LED With Official Warranty<br />2 year brand warranty<br />Turbo sound<br />HD Ready<br />HDMI &amp; USB connectivity<br />Boarder less Screen</p>', 50, 'PRODUCT_178593438.jpg', 'PRODUCT_842264297.jpg', 'PRODUCT_346711400.jpg', 0, '0'),
(111, 29, 6, '2023-08-07 18:15:35', 'Dawlance Refrigerator 9173 Wide Body / M-Chrome Metallic Silver / 12 CFT / 12.12 Limited Edition / Fridge / Freezer', '<p>Product details of Dawlance Refrigerator 9173 Wide Body / M-Chrome Metallic Silver / 12 CFT / 12.12 Limited Edition / Fridge / Freezer<br />35% Energy Saving<br />Optimized Door Pockets<br />Top Led<br />12 Years Compressor Warranty</p>', 99, 'PRODUCT_668318265.jpg', 'PRODUCT_128589279.jpg', 'PRODUCT_218522902.jpg', 0, '0'),
(112, 24, 8, '2023-08-07 18:18:05', 'iPad mini 6 (6th Generation) Wi-Fi 64GB (2021)', '<p>Product details of iPad mini 6 (6th Generation) Wi-Fi 64GB (2021)<br />Dimensions195.4 x 134.8 x 6.3 mm (7.69 x 5.31 x 0.25 in)Weight293 g (Wi-Fi) / 297 g (Wi-Fi + Cellular) (10.34 oz)BuildGlass front, aluminum back, aluminum frameSIMNo SIM<br />DisplayLiquid Retina IPS LCD, 500 nits (typ)Size8.3 inches, 203.9 cm2 (~77.4% screen-to-body ratio)Resolution1488 x 2266 pixels, 3:2 ratio (~327 ppi density)ProtectionScratch-resistant glass, oleophobic coating<br />PlatformiPadOS 15ChipsetApple A15 Bionic (5 nm)CPUHexa-core (2&times;2.93 GHz + 4xX.X GHz)GPUApple GPU (5-core)<br />Internal Memory64GB, 256GB 4GB RAM<br />Single12 MP, f/1.8, (wide), AFFeaturesQuad-LED dual-tone flash, HDR, panoramaVideo4K@24/25/30/60fps, 1080p@25/30/60/120/240fps; gyro-EIS<br />Single12 MP, f/2.4, 122˚ (ultrawide)FeaturesHDRVideo1080p@25/30/60fps, gyro-EIS<br />LoudspeakerYes, with stereo speakers3.5mm jackNo<br />FeaturesFingerprint (side-mounted), accelerometer, gyro, compass, barometer<br />Siri natural language commands and dictation<br />TypeLi-Ion, non-removable (19.3 Wh)Talk timeUp to 10 h (multimedia)<br />ColorsSpace Gray, Pink, Purple, Starlight</p>', 99, 'PRODUCT_548339121.jpg', 'PRODUCT_770581689.jpg', 'PRODUCT_921981039.jpg', 5, '1'),
(113, 2, 8, '2023-08-07 18:19:54', 'Apple iPhone 14 Pro Max - 6.7 Inch Display - Physical Sim + ESim - PTA Approved - 1 Year Official Mercantile Warranty', '<p>Product details of Apple iPhone 14 Pro Max - 6.7\" Inch Display - Physical Sim + ESim - PTA Approved - 1 Year Official Mercantile Warranty<br />1 Year Official Warranty (Mercantile)<br />Display : 6.7\" Super Retina XDR display<br />OS : iOS 16<br />One Physical Sim Slot &amp; One ESim<br />Memory : 128GB, 256GB, 512GB, 1TB<br />Processor : 6‑core CPU with 2 performance and 4 efficiency cores<br />Apple A16 Bionic chip<br />Camera : 48MP Main 24 mm, 12MP Ultra Wide: 13 mm, 12MP 2x Telephoto<br />Front Camera : 12 MP, f/1.9, 23mm<br />Battery : 4323 mAh, non-removable<br />Fast charging, 50% in 30 min<br />PTA Approved<br />1 Year Official Warranty (Mercantile)<br />Display : 6.7\" Super Retina XDR display<br />OS : iOS 16<br />One Physical Sim Slot &amp; One ESim<br />Memory : 128GB, 256GB, 512GB, 1TB<br />Processor : 6‑core CPU with 2 performance and 4 efficiency cores<br />Apple A16 Bionic chip<br />Camera : 48MP Main 24 mm, 12MP Ultra Wide: 13 mm, 12MP 2x Telephoto<br />Front Camera : 12 MP, f/1.9, 23mm<br />Battery : 4323 mAh, non-removable<br />Fast charging, 50% in 30 min<br />PTA Approved</p>', 99, 'PRODUCT_945086735.jpg', 'PRODUCT_717662861.jpg', 'PRODUCT_875942833.jpg', 0, '0'),
(114, 21, 8, '2023-08-07 18:21:27', 'Series 7 Apple_Logo Smart Watch with Metal Chain Straps in Stainless Steel Gold Color | 1.92\" Bezel Less Display | Bluetooth Calling | All Sports Mode', '<p>Product details of Series 7 Apple_Logo Smart Watch with Metal Chain Straps in Stainless Steel Gold Color | 1.92\" Bezel Less Display | Bluetooth Calling | All Sports Mode<br />Brand: Wear Teck.<br />New Box Pack<br />100% Original<br />Checking Warranty<br />Water Resistant<br />IPS HD Touch Screen<br />Easy Bluetooth Connection<br />Android &amp; iOS Connectivity<br />Android 5.0 +, IOS 9.0 +<br />Battery Capacity: 280 MA<br />1 Day Battery Timing Connection<br />1 Week Battery Backup on Stand by<br />Call Receiving Option<br />Call Dialing Option<br />What&rsquo;s App &amp; Text Messaging<br />Music Controlling Option<br />10+ Display Wallpaper<br />Customized Wallpaper Option<br />5 Different Menu Style<br />Steel Matt Finish Body<br />Scratch less Glass Dial<br />Screen Size154 Inches (42mm)<br />Resolution: 280* 280<br />Rolex Stainless Steel Chain Straps<br />Chain Straps 6 Month Color Guarantee<br />Charging Cable<br />Manual Guide Book<br />5 Multiple Languages<br />All Fitness Activity Monetization<br />Heart Rate Monitor<br />Sleep Monitor, Stop Watch<br />Blood Pressure Monitor<br />Mobile Camera Monitor<br />Alarm Clock, Calendar</p>', 67, 'PRODUCT_865232683.jpg', 'PRODUCT_866534926.jpg', 'PRODUCT_414793006.jpg', 0, '0'),
(115, 4, 8, '2023-08-07 18:22:57', 'Apple MacBook Pro 2012 500GB Storage 4GB RAM 2.5GHz Dual-Core Core i5 Mid 2012 13.3-inch LED Display Dual Operating System MacOS & Windows 10 Silver', '<p>Product details of Apple MacBook Pro 2012 500GB Storage 4GB RAM 2.5GHz Dual-Core Core i5 Mid 2012 13.3-inch LED Display Dual Operating System MacOS &amp; Windows 10 Silver<br />13.3\" HD LED Display<br />Dual Core i5 Processor<br />4GB DDR3 RAM<br />500GB HDD 5400 RPM<br />HD Graphics<br />Apple system IOS 10.15 <br />Window&reg; 10(Activated)<br />All Most Used Software Install<br />Ms Office 2019 Google Chrome Typing Master Zoom Much More<br />Wi Fi Camera Bluetooth CD Room<br />3 Month Warranty<br />we deal in slightly Used imported Laptops which are fresh, directly Import from U S A, UK,Canada &amp; UAE They are 100% tested &amp; never used In Pakistan. LIMITED STOCK AVAILABLE<br />Condition 9/10</p>', 99, 'PRODUCT_745498012.jpg', 'PRODUCT_505963744.jpg', 'PRODUCT_365837955.jpg', 0, '1');
INSERT INTO `products` (`id`, `category_id`, `brand_id`, `date`, `name`, `description`, `delivery_charges`, `img`, `img1`, `img2`, `sales`, `recommended`) VALUES
(116, 22, 10, '2023-08-07 18:24:54', 'Intelligent Camera -WIFI Camera', '<p>Product details of Intelligent Camera -WIFI Camera<br />Specification: Support 1 way H.264 video stream and 1 way MJPEG video stream simultaneously. Adopt mega pixel CMOS sensor, support video resolution.SENSOR: 1/4 CMOS sensor. THE MINIMUM ILLUMINATION: 0.5Lux@550nmLENS TYPE: Glass LensAUDIO: Support two wayETHERNET: One 10/100Mbps RJ-45 SUPPORTED PROTOCLO:HTTP, FTP TCP/IP, UDP, SMTP, DHCP, PPPoE, DDNS, UPnPWireless Standard: IEEE 802.11b/g/nSupport WPS (wi-fi Protected Setup); WPS automatically configures the network name (SSID) and WPA security key for the access pointSUITABLE FOR Wall mount, table mount, ceiling mount, etc...<br />Product details of Intelligent Camera YY HD Wifi Audio The Mobile Phone Network Camera CCTV Jual Inteligent Camera Onvif -Yy &ndash; Hd Wifi Audio<br />Specification: Support 1 way H.264 video stream and 1 way MJPEG video stream simultaneously. Adopt mega pixel CMOS sensor, support video resolution.SENSOR: 1/4 CMOS sensor. THE MINIMUM ILLUMINATION: 0.5Lux@550nmLENS TYPE: Glass LensAUDIO: Support two wayETHERNET: One 10/100Mbps RJ-45 SUPPORTED PROTOCLO:HTTP, FTP TCP/IP, UDP, SMTP, DHCP, PPPoE, DDNS, UPnPWireless Standard: IEEE 802.11b/g/nSupport WPS (wi-fi Protected Setup); WPS automatically configures the network name (SSID) and WPA security key for the access pointSUITABLE FOR Wall mount, table mount, ceiling mount, etc...<br />2.Specification</p>\r\n<p>Resolution: 1280*720P/1920*1080P<br />Audio Input / Output:Build-in Audio / Microphone (Two Way Audio)<br />Lens size:Board Lens 3.6mm/F2.0<br />Minimum Illumination: 0.01LUX Low,0LUX/F1.2(Led on)<br />PTZ: Horizontal 350 Degree, Vertical 110 Degrees<br />Support TF Card: Max Up to 64GB TF Card (Don\'t included)<br />Power Supply: DC 5V 2A<br />Material: ABS Plastic, Indoor Use</p>', 99, 'PRODUCT_262320909.jpg', 'PRODUCT_484381871.jpg', 'PRODUCT_696028454.jpg', 0, '0'),
(117, 30, 10, '2023-08-07 18:27:03', 'HP DeskJet 2710 All-in-One Printer - (Print Scan Wifi) - New Box Packed With 1 Year Warranty', '<p>Product details of Speedx 400UL Thermal Printer for Receipt (Raseed Printer)<br />80mm Printer With Auto Cutter Function,. High Efficiency Auto Cutter And The Fastest Printing Speed.Long Lasting Auto-Cutter Up To 3million Cuts.Print Width:79.5&plusmn;0.5mm; Paper Width:3 1/8\" (80mm). No Need For Ribbon/Ink.<br />Support Windows And Mac Software Based On ESC/POS Command.<br />Compatible With ESC/POS Instruction Set. Can Be Widely Used In Supermarket, Restaurant, Retail Store etc.<br />Support Download And Print Logo &amp; Graphics. Support 1D,2D Bar Code Printing. Beeping Sound Can Be Closed. Support Cash Drawer.<br />Support Win XP, Vista, 7, 8, And 10,Store LOGO Could Be Added On The Receipt.</p>', 99, 'PRODUCT_595421714.jpg', 'PRODUCT_191028709.jpg', 'PRODUCT_548351738.jpg', 0, '0'),
(118, 33, 10, '2023-08-07 18:28:31', 'HP M32f 31.5\" LED Full HD AMD FreeSync 75 Hz Monitor', '<p>Product details of HP M32f 31.5\" LED Full HD AMD FreeSync 75 Hz Monitor<br />Lose yourself in the picture-perfect immersion of this massive canvas, designed to redefine comfort, wellness, and sustainability*. Play, work, or simply stare into the new definition of high definition.<br />The New Definition of High Definition<br />Looks Good, Feels Good, Does Good<br />Streamlined &amp; Seamless<br />On-screen controls; AMD FreeSync&trade;; Low blue light mode; Anti-glare</p>', 99, 'PRODUCT_902984792.jpg', 'PRODUCT_167128974.jpg', 'PRODUCT_270052109.jpg', 0, '0'),
(119, 4, 10, '2023-08-07 18:29:52', 'HP EliteBook 840 G3 Ultra Book Core i5 6th Gen 8GB RAM, 256GB SSD', '<p>Product details of Daraz Like New Laptops - HP EliteBook 840 G3 Ultra Book Core i5 6th Gen 8GB RAM, 256GB SSD<br />6 Months Warranty (T&amp;C apply)<br />Warranty Centre Location: Karachi<br />Daraz Like New products are in Good Condition. They feel like new.<br />Fully functional with all features working, with minimal scratches, minor usage but no damage.<br />A preinstalled Operating System<br />Product will be in Daraz Like New Original Packaging<br />Warranty is void in the event of improper use, negligence and forceful damage by the customer.<br />Warranty means repair or replacement warranty.<br />Any issues related to Operating systems and drivers must be claimed through warranty.<br />Proof of Purchase must be required for warranty claim.<br />Battery backup up to 1.5hours minimum backup committed.<br />Warranty does not cover burned, broken deformed, water damage, sound distortion.<br />No display / screen, Keyboard &amp; buttons warranty.<br />Warranty will be void if security sticker seals are removed.<br />Model: HP EliteBook 840 G3 Ultra Book<br />Processer: Intel core i5<br />Generation: 6th<br />Processor Type: Core i5-6th Generation<br />Ram: 8GB<br />Storage: 256GB SSD Drive<br />Graphics card: INTEL HD<br />Charger is also included with the laptop<br />Screen size: 14.1 inches Led Display<br />Graphics Card Details: Intel Integrated Graphics<br />WIFI: Yes<br />Bluetooth: Yes</p>', 99, 'PRODUCT_239135834.jpg', 'PRODUCT_445093809.jpg', 'PRODUCT_528381683.jpg', 0, '1'),
(120, 4, 11, '2023-08-07 18:31:11', 'Dell Latitude 5430, Core i5 3rd generation, 8GB Ram, 500GB Hard Drive, 14\" Led Display, (Windows 10 Registered) FREE LAPTOP BAG', '<p>Product details of Daraz Like New Laptops - Dell Latitude 5430, Core i5 3rd generation, 8GB Ram, 500GB Hard Drive, 14\" Led Display, (Windows 10 Registered) FREE LAPTOP BAG<br />6 Months Warranty (T&amp;C apply)<br />Warranty Center Location: Karachi<br />Daraz Like New products are in Good Condition. They look and feel like new.<br />Very minimal to no scratches (but no discolouration)<br />Fully functional<br />A preinstalled operating system<br />Product will be in Daraz Like New Original Packaging<br />Brand : DELL<br />Model : DELL LATITUDE E5430<br />Processor : Intel Core i5 3RD GEN<br />Generation : 3RDFrequency GHz : 2.3 GHz (max turbo frequency 2.9-GHz), 3 MB L3 Cache, 15WHard Drive : 500GB<br />RAM : 8GB<br />Battery Timing : 1.5-2 Hours<br />Condition : 10 by 10<br />Touchpad : YES<br />Camera : 2MP<br />WiFi + Bluetooth<br />Chipset : integrated with processor<br />Audio Speakers : HD Audio with DTS Studio Sound , 2 Integrated stereo speakers , Integrated dual-microphone array; located in the display , Function keys for microphone mute, volume up, volume down , Stereo headphone/line out , Stereo microphone/line in.<br />Graphics : Integrated Intel HD* Graphics 620 ,<br />Screen Size : 14.0\" diagonal LED-backlit HD+ anti-glare SVA flat (1600 x 900) with camera.<br />WARRANTY : 6 month<br />CHARGER INCLUDE<br />product can expected to have few or slight scratches</p>', 99, 'PRODUCT_935901925.jpg', 'PRODUCT_816894009.jpg', 'PRODUCT_797483167.jpg', 0, '0'),
(121, 33, 11, '2023-08-07 18:33:05', 'Dell Keyboard Wired USB', '<p>Product details of Dell Keyboard Wired USB<br />Affordable, corded keyboard featuring slim design and full numeric keypad<br />Low-profile, advanced tactile keys for quiet, comfortable typing<br />Adjustable tilt legs for added comfort<br />Simple, plug and play USB corded connection; Compatible with Windows, MacOS, Chrome OS, Linux Kernel 2.6 and higher<br />Looking for an affordable keyboard that still provides a better typing experience? Try Verbatim&rsquo;s Slimline Corded USB Keyboard &ndash; it&rsquo;s sleek, yet sturdy, with convenient plug and play USB connectivity. The Slimline Corded Keyboard features low-profile keys and adjustable tilt legs for quiet, comfortable typing. The layout features a full numeric keypad and full-size function keys, all within a slim, efficient design that frees up space on your desktop. Compatible with both Windows and Mac operating systems, the Slimline Corded USB Keyboard is a great addition to any corporate or home office workspace. Package Includes: Slimline Corded USB Keyboard</p>\r\n<p>Specifications of Dell Keyboard Wired USB<br />BrandDellSKU426747837_PK-2025661582Key TypeMechanical KeyGraphics Memory</p>', 99, 'PRODUCT_658962680.jpg', 'PRODUCT_849570296.jpg', 'PRODUCT_146500178.jpg', 0, '0'),
(122, 25, 11, '2023-08-07 18:35:15', 'Dell_USB Mouse For Computer or Laptop - Cursor Control - Scrolling Button - Premium Quality', '<p>Product details of Dell_USB Mouse For Computer or Laptop - Cursor Control - Scrolling Button - Premium Quality<br />High quality and Durable<br />High performance And Reliable<br />plug and play<br />Long Cord<br />Faster, more accurate response</p>', 99, 'PRODUCT_533114161.jpg', 'PRODUCT_511288319.jpg', 'PRODUCT_490086210.jpg', 0, '0'),
(123, 18, 13, '2023-08-07 18:37:46', 'Audionic Airbud 425 Wireless Earbuds TWS Earbud With Quad MIC, ENC Wireless Earphones & IPx4 Water Proof Bluetooth Ear buds And Headphones', '<p>Product details of Audionic Airbud 425 Wireless Earbuds TWS Earbud With Quad MIC, ENC Wireless Earphones &amp; IPx4 Water Proof Bluetooth Ear buds And Headphones<br />Audionic Airbud 425 Earbuds Specification:Playtime: upto 7 hours<br />Bluetooth version: BT 5.3<br />Case battery: 300 mAh<br />BT range: 10m<br />charging port: USB-C<br />Charging indicator<br />earbud battery: 40 mAh<br />Fully touch control<br />Quad MIC<br />Auto pairing<br />Fr.response: 20-20000Hz<br />Charging input: 5V.1A<br />Drive unit: 10mm<br />Impedance: 32 amp<br />Earbud charging time: 1.5 Hr max<br />Case charging time: 2Hr max<br />Note: Playtime is about 7 hours on playing on 60% volume.</p>', 50, 'PRODUCT_569496071.jpg', 'PRODUCT_626490864.jpg', 'PRODUCT_900085884.jpg', 0, '0'),
(124, 23, 13, '2023-08-07 18:39:40', 'Audionic TESLA T-10 (10000 MAH) POWER BANK PD 22.5w Super Fast Charging - Audionic Power Bank', '<p>Product details of Audionic TESLA T-10 (10000 MAH) POWER BANK PD 22.5w Super Fast Charging - Audionic Power Bank<br />Type: Power Bank<br />Brand: Audionic<br />Model: Tesla T-10<br />Color: Black<br />Connectivity: Micro+Type C<br />Compatibility: Universal<br />Input: USB + TYPE C<br />Features: Digital Display, 22.5W QC 3.0<br />Battery Capacity: 10000mAh<br />Audionic presents it&rsquo;s one of the top load powerful technology powered by TESLA high-density batteries (10,000 mAh) Power-bank.</p>\r\n<p><br />The T-10 TESLA power bank can charge two devices at a time with 22.5 Watt (V) &amp; Super-Fast Charging.<br />Tesla T-10 comes in a mini size that makes it travel-friendly and makes it easy to carry anywhere you want.<br />This high-density Tesla T-10 power-bank has an LED status indicator that makes it easy to see battery percentage anytime you want,<br />T-10 input allows the user to put Type-C charge, and output allows it to put USB and Type-C cable in it which make it a trendy device.<br />It is the first power bank that will provide ease in your life because of its compact size so that you can carry it freely even when you&rsquo;re outdoor and in emergencies as well.<br />Audionic presents its one of the top load powerful technology New TESLA Power Bank 10000mAh.<br />The new T-10 TESLA power bank charge 2 mobile devices at the same time with 22.5W Super Fast Charging.</p>', 99, 'PRODUCT_223918936.jpg', 'PRODUCT_611311293.jpg', 'PRODUCT_121338370.jpg', 0, '0'),
(125, 7, 13, '2023-08-07 18:40:59', 'AUDIONIC PACE-8 (5.1 SURROUND SOUND SPEAKER)/ 1 Year Brand Warranty', '<p>Product details of AUDIONIC PACE-8 (5.1 SURROUND SOUND SPEAKER)/ 1 Year Brand Warranty<br />USB Port: Yes<br />Bluetooth: Yes<br />FM Radio: Yes<br />AUX Input: Yes<br />LED Display: Yes<br />Remote: Yes<br />MicroSD Card: Yes<br />Bluetooth Range: 10 m<br />Drive Unit: Subwoofer: 8\"<br />Satellites: 3\" x 5<br />Frequency: 40 Hz<br />Power: 60W+15W x5<br />Swift Buttons<br />HD surrounded sound<br />Digital Display</p>', 99, 'PRODUCT_190052921.jpg', 'PRODUCT_582390160.jpg', 'PRODUCT_176866713.jpg', 0, '0'),
(126, 24, 36, '2023-08-07 18:42:54', 'Redmi Pad (6GB-128GB) With Official 1 Year Brand Warranty', '<p>Product details of Redmi Pad (6GB-128GB) With Official 1 Year Brand Warranty<br />Processor: MediaTek Helio G99 (6nm)<br />Size: 10.61&Prime; display<br />Resolution: 1200 x 2000, 400 nits<br />Refresh rate: 90Hz<br />Rear Camera: 8MP<br />Front Camera: 8MP<br />Battery &amp; Charging: 8000mAh (typ), 18W Fast Charging<br />Speakers: 4 Speakers, Dolby Atmos&reg; Supported<br />Connectivity: Bluetooth 5.3, Wi-Fi 5 2.4GHz/5.0GHz, USB-C<br />Dimensions: Height: 250.38mm, Width: 157.98mm, Thickness: 7.05mm, Weight: 445g<br />Package Contents: Redmi Pad / Adapter / USB Type-C Cable / SD Card Eject Tool / Quick Start Guide / Warranty Card</p>', 99, 'PRODUCT_689566410.jpg', 'PRODUCT_703919672.jpg', 'PRODUCT_802498558.jpg', 0, '0'),
(127, 21, 36, '2023-08-07 18:44:30', 'Redmi Watch 2 Lite', '<p>Product details of Redmi Watch 2 Lite<br />Display: 1.55\" square<br />Screen Type: Thin-film transistor (TFT) screen<br />Resolution: 320*360<br />Waterproof level: 5 ATM*<br />Sensors: Optical heart rate sensor, accelerometer, gyroscope, electronic compassGPS / GLONASS / Galileo / BeiDou<br />Wireless connection: Bluetooth 5.0 (Bluetooth Low Energy)<br />Supported systems: Android 6.0 or later, iOS 10.0 or later<br />Battery: 262 mAh<br />Charging Port: Magnetic charging<br />Battery Life: 10 days under typical usage mode - 5 days under heavy usage mode.<br />Supported Exercises: Outdoor Running, Treadmill, Outdoor Cycling, Indoor cycling, Freestyle, Walking, Trekking, Trail run, Pool swimming, Open water swimming, Elliptical, Rower, Jump Rope, HIIT, Yoga<br />Health &amp; Daily Life: Heart Rate Monitoring, Sleep Monitoring, Breathing, Notifications, Weather, Clock, Alarm, Music Control.<br />Watch Strap: Adjustable length: 140-210mm, Material: TPU<br />Dimensions: Height:41.2mm &ndash; Width:35.3mm &ndash; Thickness:10.7mm &ndash; Net weight: 35g (including strap)</p>', 50, 'PRODUCT_814423311.jpg', 'PRODUCT_603414598.jpg', 'PRODUCT_363926365.jpg', 0, '0'),
(128, 23, 36, '2023-08-07 18:45:36', 'MI Redmi Power 20000 Mah - MI Power Bank 20000 Mah - 20000 Mah Power Bank Fast Charging', '<p>Product details of MI Redmi Power 20000 Mah - MI Power Bank 20000 Mah - 20000 Mah Power Bank Fast Charging<br />The 20000mAh Power Bank Comes In An Environmentally Friendly ABS Plastic Housing With A Textured Pattern Aimed At Improving Grip. The Plastic Makes For A Far Better Finish, As It Doesn\'t Make The Surface Of The Power Bank Nearly As Slippery As The Aluminum Design. The Casing Is Also Scratch-Resistant, And Can Withstand Heat Up To 90 Degrees Celsius<br />MI Redmi Power 20000 Mah - MI Power Bank 20000 Mah - 20000 Mah Power Bank Fast Charging<br />Output Interface:5V/2A<br />Input Interface:Micro USB<br />Input Interface:USB Type C<br />Quality Certification:FCC<br />Battery Capacity:15001-20000mAh<br />Output Interface:Double USB<br />Battery Type:Li-polymer Battery<br />Type:Emergency / Portable</p>', 99, 'PRODUCT_778535972.jpg', 'PRODUCT_398803151.jpg', 'PRODUCT_205695070.jpg', 0, '0'),
(129, 18, 36, '2023-08-07 18:46:48', 'Xiaomi Redmi Airdots 2 Bluetooth Wireless Earbuds', '<p>Product details of Xiaomi Redmi Airdots 2 Bluetooth Wireless Earbuds<br />Wireless connections Bluetooth: 5.0<br />Communication distance: 10 meters (accessible open space)<br />Double headphones continuous listening time: About 4 hours<br />Battery time with case: About 10 to 12 hours<br />Single earphone battery capacity: 40 mAh<br />Charging box battery capacity: 300 mAh<br />Headphone charging time: About 1.5 hours<br />Charging case charging time: 2 hours<br />Single earbud weight: 4.1g<br />Net weight of the charging case: 35.4 g<br />Charging port: Micro</p>', 50, 'PRODUCT_461464802.jpg', 'PRODUCT_443443207.jpg', 'PRODUCT_146438403.jpg', 0, '1'),
(130, 2, 36, '2023-08-07 18:48:01', 'Redmi A1 Plus 6.52 Inch Display 2GB RAM 32GB ROM', '<p>Product details of Redmi A1 Plus 6.52 Inch Display 2GB RAM 32GB ROM<br />Xiaomi Redmi A1 Plus detailed specificationsBuildOSAndroid 12 Go edition UIMIUI 12 Dimensions164.9 x 76.75 x 9.09mm Weight192 g SIMDual Sim, Dual Standby (Nano-SIM) ColorsLight Green, Light Blue, Black Frequency2G BandSIM1: GSM 850 / 900 / 1800 / 1900<br />SIM2: GSM 850 / 900 / 1800 / 1900 3G BandHSDPA 850 / 900 / 1900 / 2100 4G BandLTE band 1(2100), 3(1800), 5(850), 7(2600), 8(900), 38(2600), 39(1900), 40(2300), 41(2500) ProcessorCPU2.0 Ghz Quad Core Cortex-A53 ChipsetMediatek MT6761 Helio A22 (12 nm) GPUPowerVR GE6300 DisplayTechnologyIPS LCD Capacitive Touchscreen, 16M Colors, Multitouch Size6.53 Inches Resolution720 x 1600 Pixels (~269 PPI) Extra Features400 nits (typ) MemoryBuilt-in32GB Built-in, 2GB RAM CardmicroSDXC (dedicated) CameraMainDual Camera: 8 MP, (wide) + 0.3 MP, Dual LED Flash FeaturesPhase detection, geo-tagging, touch focus, face detection, Video (1080p@30fps) Front5 MP, HDR, Video (1080p@30fps) ConnectivityWLANWi-Fi 802.11 a/b/g/n, hotspot Bluetoothv5.0 with A2DP, LE GPSYes + A-GPS support &amp; Glonass, BDS RadioFM radio (not yet confirmed) USBmicroUSB 2.0 NFCNo DataGPRS, EDGE, 3G (HSPA 42.2/5.76 Mbps), 4G LTE-A FeaturesSensorsAccelerometer, Fingerprint (rear-mounted) Audio3.5mm Audio Jack, 24-bit/192kHz audio, Speaker Phone BrowserHTML5 MessagingSMS(threaded view), MMS, Email, Push Mail, IM Gamesbuilt-in + downloadable TorchYes ExtraPhoto/video editor, Document viewer BatteryCapacity(Li-ion Non removable), 5000 mAh<br />- Battery charging 10W</p>', 50, 'PRODUCT_909434306.jpg', 'PRODUCT_100639891.jpg', 'PRODUCT_442225521.jpg', 0, '1'),
(131, 33, 37, '2023-08-07 18:50:28', 'Lenovo 22 inch borderless Gaming Lcd Monitor For PC IPS Panel', '<p>Product details of Lenovo 22 inch borderless Gaming Lcd Monitor For PC IPS Panel<br />The P2417H highlights:24-inch Full HD IPS display for vibrant visuals.<br />Multiple connectivity options for versatile usage.<br />Adjustable stand for personalized comfort.<br />Thin bezel design for seamless multi-monitor setups.<br />Energy-efficient features for reduced power consumption.<br />Eye-care technology to minimize eye strain.<br />Wide compatibility with various operating systems.<br />Reliable performance for a smooth user experience.<br />The P2417H is a 24-inch Full HD monitor that offers an impressive display quality and a range of features to enhance your viewing experience. With its IPS panel, the monitor delivers vibrant colors, sharp details, and wide viewing angles. The anti-glare coating ensures comfortable viewing even in brightly lit environments.</p>\r\n<p>Connectivity is made easy with multiple options including HDMI, DisplayPort, VGA, and USB 3.0 ports. Whether you want to connect your laptop, desktop, gaming console, or even smartphone, the P2417H has you covered.</p>\r\n<p>One of the standout features of this monitor is its adjustable stand. You can customize the height, tilt, swivel, and pivot angles to find the perfect viewing position, ensuring optimal comfort and ergonomics for long hours of use.</p>\r\n<p>The thin bezel design of the P2417H makes it an excellent choice for multi-monitor setups. The ultra-slim bezels minimize distractions and create a seamless visual experience when working with multiple screens.</p>\r\n<p>Dell has also integrated energy-saving features into the P2417H. PowerNap and Dynamic Dimming technologies help reduce power consumption without compromising performance, meeting environmental standards.</p>\r\n<p>To prioritize user comfort, the monitor includes eye-care features. ComfortView reduces blue light emissions to minimize eye strain, making it suitable for extended periods of use.</p>\r\n<p>The P2417H is compatible with various operating systems, including Windows, macOS, and Linux, ensuring seamless integration with different setups and devices.</p>\r\n<p>Overall, the Dell P2417H offers reliable performance, impressive visuals, and a range of features that enhance your productivity and comfort during extended usage.</p>\r\n<p>Specifications of Lenovo 22 inch borderless Gaming Lcd Monitor For PC IPS Panel<br />BrandLenovoSKU421784819_PK-1994828155ConditionVery GoodGraphics Memory1920x1080</p>', 50, 'PRODUCT_325653711.jpg', 'PRODUCT_399899725.jpg', 'PRODUCT_889376897.jpg', 0, '1'),
(132, 18, 37, '2023-08-07 18:52:09', 'Lenovo Mini Bluetooth Headset HiFi Stereo Sound In Ear Headphones Waterproof Wireless Earbuds with Mic Type-C Fast Charging Earphone 805 Ratings', '<p>Product details of Lenovo Mini Bluetooth Headset HiFi Stereo Sound In Ear Headphones Waterproof Wireless Earbuds with Mic Type-C Fast Charging Earphone<br />1.Welcome to our store, Follow us to get the latest product information and best prices, and get special fan coupons.<br />2.We will regularly draw fans to send beautiful gifts for our follower.<br />3.If you have any questions, you can contact us, our customer service will reply you during working hours.<br />4.After-sales protection, contact customer service, we will serve you wholeheartedly.<br />5.After you receive the package, if you are satisfied with the product, you can take a photo and give us a 5-star praise; if the product is not satisfactory to you, don\'t worry, contact our customer service.We will try our best to give you best serice.<br />Color: white, grey<br />Startup life: about 4H.<br />Wear: in the ear<br />Horn diameter: &phi; 13mm<br />Headphone battery capacity: 35mAh<br />Battery capacity: 250mAh<br />Plug Type: Type-c interface<br />Display light form: white light + green light<br />What\'s included: Earphone *1 charging cable *1 Instruction *1</p>', 50, 'PRODUCT_694283115.jpg', 'PRODUCT_706000407.jpg', 'PRODUCT_558576760.jpg', 0, '0'),
(133, 33, 37, '2023-08-07 18:54:10', 'Lenovo Xiaoxin Plus Bluetooth Mouse Mute Button Light Sound Portable Office Game Universal Charging Mouse', '<p>Product details of Lenovo Xiaoxin Plus Bluetooth Mouse Mute Button Light Sound Portable Office Game Universal Charging Mouse<br />Multiple Surface Treatments Outstanding Colors Values，IM\"Do Not Fade\" Process.Translucent scrub treatment left and right buttons,delicate skin-like treatment upper cover.The small mouse integrates a variety of surface treatment processes to bring a leapfrog look, the three color optional shell, the color layer is worn and scratch-hardened transparent,keep bright colors for a long time and don\'t fade easily.<br />78 g is light easy to move &amp; Ergonomics Holding Posture.Lightweight design of only 78g reduces the pressure of the mouse on the wrist and makes it easier to carry.Ergonomic design allows the mouse to fit the palm of the hand without hanging in the palm,reducing wrist soreness and pain,the fatigue of long-term use, optimized side skirt design.<br />Commonly Used Buttons are Light Tone, Use at Will without Disturbing People.The left and right main buttons, the middle buttons and the side buttons of the scroll wheel are all treated with light sound, there is no clear trigger sound when clicking, in dormitories, libraries offices and their late-night desks and other occasions that require quiet.<br />Plenty of Battery Life, Type-C &amp; Convenient Charging.Built-in 380mAh large-capacity lithium battery, which can be charged through the Type-C interface with intelligent sleep technology it will enter the standby state after stopping working for 5 seconds go to deep sleep after about 30 seconds it can be used continuously for about 45 hours on a single charge and the standby time can be as long as 158days.<br />Dual Version Bluetooth Connection &amp; Broad Compatibility.Support Bluetooth 3.0/5.0 dual version Bluetooth connection, bid farewell to cable bondage, bring better device connectivity.</p>', 50, 'PRODUCT_535168720.jpg', 'PRODUCT_386490946.jpg', 'PRODUCT_507872557.jpg', 0, '1'),
(134, 4, 37, '2023-08-07 18:55:26', 'Lenovo Thinkpad T470 - Core i5 7th Generation - 8GB DDR4 - 256GB SSD - 14inch Screen - FREE LAPTOP BAG', '<p>Product details of Lenovo Thinkpad T470 - Core i5 7th Generation - 8GB DDR4 - 256GB SSD - 14inch Screen - FREE LAPTOP BAG<br />Manufacturer Lenovo<br />Product Type Laptop<br />Model No.T470 (20HES44L00)<br />Operating SystemWindows 10 Pro (64-bit)<br />Processor &amp; Chipset<br />Intel Core i5-7200U 7th Gen 2.5 Ghz With Turbo Boost upto 3.1 Ghz<br />RAM Memory8 GB DDR4 RAM 2133 Mhz<br />Solid State Drive (SSD)<br />256GB SSD Solid State Drive<br />Built in Devices<br />Yes<br />Keyboard<br />Standard Keyboard<br />Pointing Device Type<br />Touchpad with Multi-touch Gestures support<br />Physical Dimension13.35 x 9.53 x 0.89 (WxDxH)Weight1.7 Kg<br />Color OptionsBlackMemory card reader4 in 1 Card Reader (SD, SDHC, SDXC, MMC)<br />DisplayScreen Size14 Inch<br />Resolution1366 x 768 PixelsScreen TypeHD LED Flat Glare Display<br />Touchscreen No<br />Backlight Technology No<br />Multi-touch Screen No<br />Graphics Intel HD Graphics<br />Network &amp; Communication Wireless LAN<br />IEEE 802.11<br />ac<br />Bluetooth v4.1<br />Ethernet Technology100/1000 Mbps<br />Battery &amp; PowerType &amp; Capacity Li-po 3 Cell BattryBattery TimingUpto 4 HoursPower Supply Wattage45 W AC Adapter WInterfaces/PortsUSB3 x USB 3.1HDMI1 x HDMI PortVGAYesAudio2 x 1.5 W Speakers, Dolby Audio<br />Manufacturer<br />Lenovo<br />Product Type<br />Laptop<br />Model No.<br />T470 (20HES44L00)<br />Operating System<br />Windows 10 Pro (64-bit)<br />Processor &amp; Chipset<br />Intel Core i5-7200U 7th Gen 2.5 Ghz With Turbo Boost upto 3.1 Ghz<br />RAM Memory<br />8 GB DDR4 RAM 2133 Mhz<br />Solid State Drive (SSD)<br />256GB SSD Solid State Drive<br />Built in Devices<br />Yes<br />Keyboard<br />Standard Keyboard<br />Pointing Device Type<br />Touchpad with Multi-touch Gestures support<br />Physical Dimension<br />13.35 x 9.53 x 0.89 (WxDxH)<br />Weight<br />1.7 Kg<br />Color Options<br />Black<br />Memory card reader<br />4 in 1 Card Reader (SD, SDHC, SDXC, MMC)<br />Display<br />Screen Size<br />14 Inch<br />Resolution<br />1366 x 768 Pixels<br />Screen Type<br />HD LED Flat Glare Display<br />Touchscreen No<br />Backlight Technology No<br />Multi-touch Screen No<br />Graphics<br />Intel HD Graphics<br />Network &amp; Communication<br />Wireless LAN<br />IEEE 802.11ac<br />Bluetooth<br />v4.1<br />Ethernet Technology<br />100/1000 Mbps<br />Battery &amp; Power<br />Type &amp; Capacity<br />Li-po 3 Cell Battry<br />Battery Timing<br />Upto 4 Hours<br />Power Supply Wattage<br />45 W AC Adapter W<br />Interfaces/Ports<br />USB<br />3 x USB 3.1<br />HDMI<br />1 x HDMI Port<br />VGA<br />Yes<br />Audio<br />2 x 1.5 W Speakers, Dolby Audio</p>', 100, 'PRODUCT_194533711.jpg', 'PRODUCT_723834021.jpg', 'PRODUCT_984585823.jpg', 0, '1'),
(135, 4, 40, '2023-08-07 18:57:17', 'Toshiba Intel Core i3-2nd Generation | 4GB RAM , 320GB Hard Drive |', '<p>Product details of Toshiba Intel Core i3-2nd Generation | 4GB RAM , 320GB Hard Drive |<br />Brand : Toshiba<br />Model :mixed<br />Processor : Intel Core i3<br />Generation : 2nd<br />RAM : 4GB ram<br />Hard Drive : 320GB<br />Battery Timing : 1 Hours+ Battery Backup<br />Charger is also included with the Laptop.<br />Condition of the Laptop 8 / 10<br />Screen Size : 13 to 15.6inches<br />WIFI : Yes<br />Processor speed :2350M 2.3GHz Upto 2.9GHz With Turbo Boost<br />Graphics Card : Intel HD<br />Operating System : Windows 8<br />WARRANTY : 7 DAYS</p>\r\n<p>Brand : Toshiba<br />Model :mixed<br />Processor : Intel Core i3<br />Generation : 2nd<br />RAM : 4GB ram<br />Hard Drive : 320GB<br />Battery Timing : 1 Hours+ Battery Backup<br />Charger is also included with the Laptop.<br />Condition of the Laptop is. 8/10<br />Screen Size : 13 to 15.6inches <br />WIFI : Yes<br />Processor speed :2350M 2.3GHz Upto 2.9GHz With Turbo Boost<br />Graphics Card : Intel HD<br />Operating System : Windows8<br />WARRANTY : 7 DAYS</p>', 99, 'PRODUCT_525123425.jpg', 'PRODUCT_741026158.jpg', 'PRODUCT_706218934.jpg', 0, '1'),
(136, 28, 42, '2023-08-07 18:59:21', 'Orient Hyper 18G Super White 1.5-Ton Air Conditioner DC Inverter Heat & Cool / Optimized Compressor Drive / Factory-installed Wi-Fi Kit / Life Time Warranty', '<p>Product details of Orient Hyper 18G Super White 1.5-Ton Air Conditioner DC Inverter Heat &amp; Cool / Optimized Compressor Drive / Factory-installed Wi-Fi Kit / Life Time Warranty<br />Biggest Indoor 0.85mm<br />30 Feet long 4D air throw<br />Factory-installed Wi-Fi Kit<br />Auto Clean Sterilization System<br />Electricity Consumption Management<br />T3 tropicalized inverter: 100% Pure copper<br />Low Voltage Operations (70v)<br />Optimized Compressor Drive (Cooling in 30 seconds)<br />Autopilot Up to 80% Energy Saving: Japanese PCB Module<br />Gold Fin &ndash; Anti Rust Coating: For All Weathers<br />Heat &amp; Cool<br />Low Noise Operations</p>', 99, 'PRODUCT_563315596.jpg', 'PRODUCT_408170229.jpg', 'PRODUCT_523722519.jpg', 0, '0'),
(137, 26, 42, '2023-08-07 19:00:38', 'Orient Microwave Oven Steak 62D Solo Black', '<p>Product details of Orient Microwave Oven Steak 62D Solo Black<br />Solo functionDigital Control PanelDefrost by Weight or Time5 Power levelsCooking end signalChild Safety Lock0% LeakageLatest Technology Magnetron<br />Elegantly Designed Orient Microwave Ovens are available in a wide range of elegant designs to compliment aesthetics of your kitchen space Built-in Recipes Orient Microwave Oven is equipped with Built-in Recipes function for a better cooking experience. 8 Auto menus for grill function to cook pizza, meat, vegetables, pasta, potato, fish, hot beverage and popcorn Child Safety Lock Orient Microwave Oven is equipped with Orient Microwave Oven is equipped with Child Safety Lock so that children are not harmed by operating it accidentally Express Cooking Orient Microwave Oven Express Cooking reheats food quickly and instantly Defrost by Weight or Time Orient Microwave Oven can defrost food by time or weight, keeping the freshness intact. Latest Technology Magnetron Orient Microwave Oven is fitted with the latest technology, Magnetron, which makes it long lasting and ensures best performance for decades. 0% Leakage Orient Microwave Oven ensures 0% leakage (NO LEAKAGE) due to the stringent quality tests and adherence to safety standards. Accurate and Efficient Heating Cooking-End Signal Orient Microwave Oven Cooking-End Signal lets you know when food is ready. Digital Control Panel Orient Microwave Oven with its Digital Control Panel ensures most advanced settings and 0% error in your microwave usage.</p>\r\n<p>Specifications of Orient Microwave Oven Steak 62D Solo Black<br />BrandOrientSKU365091850_PK-1917929887</p>', 99, 'PRODUCT_986845207.jpg', 'PRODUCT_878778379.jpg', 'PRODUCT_417841750.jpg', 0, '0'),
(138, 29, 42, '2023-08-07 19:02:04', 'ORIENT REFRIGERATOR FLARE 260 RADIANT LILAC 20 8 CUFT', '<p>Product details of ORIENT REFRIGERATOR FLARE 260 RADIANT LILAC 20 8 CUFT<br />18 Min Instant Freeze<br />Upto 35% Electricity Saving<br />ECM technology<br />Thickset Insulation<br />Roll Bond Evaporator<br />135 V Low voltage startup<br />Tougher Shelves<br />Solid Freeze<br />Humidity Control<br />Anti fungal detachable gasket<br />Food Grade ABS<br />Durable Door Pockets<br />Japanese technology compressor<br />18 Min Instant Freeze<br />Upto 35% Electricity Saving<br />ECM technology<br />Thickset Insulation<br />Roll Bond Evaporator<br />135 V Low voltage startup<br />Tougher Shelves<br />Solid Freeze<br />Humidity Control<br />Anti fungal detachable gasket<br />Food Grade ABS<br />Durable Door Pockets<br />Japanese technology compressor<br />Specifications of ORIENT REFRIGERATOR FLARE 260 RADIANT LILAC 20 8 CUFT<br />BrandOrientSKU378854024_PK-1869690382Refrigerator TypeTop Mount FreezerRefrigerator FeaturesDoor in DoorNumber of doors2colorFlare BrownCapacity0.5ModelFlare 200</p>', 99, 'PRODUCT_738626840.jpg', 'PRODUCT_747644809.jpg', 'PRODUCT_142860792.jpg', 0, '0'),
(139, 29, 43, '2023-08-07 19:03:42', 'Gree Double Door Refrigerator Direct Cool Everest Series 16 Cft 445 Ltr Brown/Red/Black', '<p>Product details of Gree Double Door Refrigerator Direct Cool Everest Series 16 Cft 445 Ltr Brown/Red/Black<br />Specifications16 Cubic FeetTop MountRed and black Color445 Liters Capacity FeaturesSuper Huge Freezer SpaceDeep Cooling -25C5 Way EvaporatorEnvironment FriendlyTurbo CoolingLow Voltage OperationMulti-Purpose Bottle Rack with Dual AdjustmentSpill Free Ice Cube TraysCrisper Box with WheelsLED Light in Freezer CompartmentDynamic AirflowIce Cube Tray Lid ProtectionAnti Bacterial GasketHumidity ControllerThick ABS Material<br />Honey Comb CrisperRight Door HingeConcealed HandleDoor LockAdjustable ShelvesBeverage Bottle RackIce ScratcherAdjustable ThermostatDynamic FanMini Compartment in CrisperRefrigerator Movement WheelsSpecifications16 Cubic FeetTop MountBrown ColorR600A Refrigerant Gas445 Liters CapacityDirect CoolGlass DoorNumber of Doors: 2No.of Crispers in Fridge: 1No. of Shelves in Fridge: 3Type of Shelves in Fridge: Wire ShelfTotal Shelves in Freezer: 3Racks in Fridge Door: 4No. of Racks in Freezer Door: 2No. of Ice Cube Trays: 2Type of Shelves in Freezer: WireAnti-Moisture Tube: Copper</p>', 99, 'PRODUCT_885084421.jpg', 'PRODUCT_832042797.jpg', 'PRODUCT_398187641.jpg', 0, '1'),
(140, 28, 43, '2023-08-07 19:05:20', 'Gree Heat and Cool 1 Ton Inverter AC - Latest Model - GS-12PITH14S - Pular Series with 10 Years Compressor Warranty', '<p>Product details of Gree Heat and Cool 1 Ton Inverter AC - Latest Model - GS-12PITH14S - Pular Series with 10 Years Compressor Warranty<br />Elegant White Finish<br />Seamless Design With Double Air Deflector<br />4-Way Air Flow<br />Auto Clean Function<br />Seven Fan Speed<br />Single Panel Easy Clean Filter<br />Health Filters<br />European Compliant Heat And Cool AC<br />Latest Powerful G-10 AC<br />Energy Efficient Class A+ (Up To 60% Energy Saving)<br />Low Voltage Startup &ndash; 150V<br />Ultra-Low Frequency Torque Control<br />State-Of-The-Art DSP Chip<br />Precise Temperature Control<br />Low Noise Operation<br />Big Indoor (1 Meter)<br />Hidden Led Display<br />Cold Plasma Generator<br />Fire Proof PCB<br />Intelligent Defrost<br />I-Feel<br />Ceiling Cooling And Floor Heating System<br />Power Factor Correction Technology Up To 99%<br />Turbo Mode<br />Sleep Mode<br />Timer<br />Auto Restart<br />Child Lock<br />Cold Plasma Generator<br />G10 Inverter<br />Heat &amp; Cool<br />A Class Energy Efficiency<br />European Standard<br />60% Energy Saving</p>', 99, 'PRODUCT_556327438.jpg', 'PRODUCT_247411400.jpg', 'PRODUCT_422829573.jpg', 0, '0'),
(141, 1, 46, '2023-08-07 19:06:51', 'Changhong Ruba L32X6 - 32 inch LED - HD TV- Black', '<p>Product details of Changhong Ruba L32X6 - 32 inch LED - HD TV- Black<br />2 Years Brand Warranty on LED TVBuilt-in Sound SystemHD TVLED TVA+ Grade PanelUltra Narrow Bezel (Four sides)USB Media Player (2 Ports) HDMI*2Triple Protector (light, surge, humidity)Double Crescent Shape StandUC-Pro Engine IIU-MAX 2.0+ sound technology<br />Important Note*** Technical Assistance: Changhong Ruba Official Service Center contact details - 042-111-672-247 - 7 day working (Mon - Sun; 9AM - 6PM. Warranty can be claimed from Changhong\'s authorized Service Centers nationwide by calling to above contact details. LED TV HD TV <br />Specifications of Changhong Ruba L32X6 - 32 inch LED - HD TV- Black<br />BrandChanghong RubaSKU100902873_PK-1246299624Display Size (inches)32 Inches</p>', 99, 'PRODUCT_861619850.jpg', 'PRODUCT_686301789.jpg', 'PRODUCT_370786573.jpg', 0, '0'),
(142, 28, 46, '2023-08-07 19:08:20', 'Changhong Ruba 18SW Pro 1.5 Ton (Japanese Compressor)/ DC Invertor Air Conditioner- Heat/Cool- Japanese PCB- 19000 BTUs-White', '<p>Product details of Changhong Ruba 18SW Pro 1.5 Ton (Japanese Compressor)/ DC Invertor Air Conditioner- Heat/Cool- Japanese PCB- 19000 BTUs-White<br />Capacity: 1.5 Ton / 19000 BTUs<br />Heat &amp; Cool AC<br />Japanese Compressor<br />Japanese PCB<br />I Smart Feature<br />10 Years Compressor Warranty<br />Indoor Dimensions 969*289*347<br />Outdoor Dimensions 889*612*359<br />Full DC Inverter Air Conditioner<br />R-410A Eco Friendly Safe Refrigerant Gas<br />Room Size: 160-220sq.ft.<br />Condenser: Golden Fins Evaporator<br />100% Full Copper Connecting Pipe<br />Energy-saving up to 75%<br />Official Brand Warranty</p>', 99, 'PRODUCT_843727671.jpg', 'PRODUCT_665884321.jpg', 'PRODUCT_794254440.jpg', 0, '0'),
(143, 29, 46, '2023-08-07 19:11:02', 'Changhong Ruba Refrigerator - CHR-DD339 Infinity - 12.5 cubic feet Fridge- Silver/ 10 Years Brand Warranty', '<p>Product details of Changhong Ruba Refrigerator - CHR-DD339 Infinity - 12.5 cubic feet Fridge- Silver/ 10 Years Brand Warranty<br />-32 Degree<br />3 Sided Condensor<br />72mm Thickness<br />R600a Gas<br />European Standard A++ Energy Rating<br />Super Wide Voltage Working (120V to 280V)<br />Fastest Cooling, more than your imagination<br />Open evaporator for 6 way cooling<br />Keeps Frozen Up To 137 Hours<br />LED Light</p>', 99, 'PRODUCT_300430929.jpg', 'PRODUCT_484771638.jpg', 'PRODUCT_339789402.jpg', 0, '1'),
(144, 2, 47, '2023-08-07 19:12:18', 'ITEL MUZIK 400 - Dual Sim - 2.4\" Inch Display - 3000mAh Battery - FlashLights', '<p>Product details of ITEL MUZIK 400 - Dual Sim - 2.4\" Inch Display - 3000mAh Battery - FlashLights<br />General FeaturesRelease Date2010-10-20SIM SupportDual Sim, Dual StandbyPhone DimensionsN/APhone WeightN/AOperating SystemFeatured OSDisplayScreen Size2.4 inchesScreen Resolution240 x 320 pixelsScreen TypeTFTScreen ProtectionNoMemoryInternal MemoryN/ARAMNoCard SlotYesPerformanceProcessorNoGPUNoBatteryType3000 mAh batteryCameraFront CameraNoFront Flash LightNoFront Video RecordingNoBack Flash LightYesBack CameraVGABack Video RecordingYesConnectivityBluetoothYes3GNo4G/LTENo5GNoRadioFM radioWiFiNoNFCNo<br />Specifications of ITEL MUZIK 400 - Dual Sim - 2.4\" Inch Display - 3000mAh Battery - FlashLights<br />BranditelSKU416002982_PK-1976511047<br />What&rsquo;s in the box 1xPhone 1xCharger 1xWarrantyCard</p>', 99, 'PRODUCT_593312316.jpg', 'PRODUCT_228180809.jpg', 'PRODUCT_157837501.jpg', 0, '1'),
(145, 1, 47, '2023-08-07 19:13:31', 'ITEL 32″ Satellite & iCast LED TV S322 Frameless Design With 2 Year Brand Warranty', '<p>Product details of ITEL 32&Prime; Satellite &amp; iCast LED TV S322 Frameless Design With 2 Year Brand Warranty<br />TV Signal: Analog TV/DVB-T2/S2<br />Panel Size: 32\"<br />Speaker: 2 x 10W (Stereo Speaker)<br />Power \"Consumption: 48W<br />Resolution: HD Ready<br />View Angle: 170/170<br />Brightness(cd/m2): 180<br />Tuner 2 x HDMI / 2 x Mini AV / 1 x USB<br />Headphone x 1 / Coaxial x 1<br />Frameless Design<br />Overvoltage Protection<br />Super Bright<br />i-Cast<br />Introducing the ITEL LED 32S322, a cutting-edge LED television available exclusively on Daraz. This sleek and stylish TV is packed with features that will elevate your viewing experience to new heights. Let\'s delve into its standout features:</p>\r\n<p>iCast Technology: The ITEL LED 32S322 comes with iCast, a revolutionary feature that allows you to seamlessly cast and stream content from your mobile devices directly onto the TV screen. Whether it\'s your favorite videos, photos, or even games, iCast enables you to enjoy them on the larger and more immersive display of your TV.</p>\r\n<p>Digital TV Tuner: Say goodbye to external set-top boxes or additional devices! The ITEL LED 32S322 is equipped with a built-in digital TV tuner, which means you can access and enjoy digital TV channels without the need for any external devices. This feature provides a hassle-free and convenient way to watch your favorite TV programs and enjoy high-quality digital broadcasts.</p>\r\n<p>High-Definition Visuals: Immerse yourself in stunning high-definition visuals with the ITEL LED 32S322. Its 32-inch display delivers vibrant colors, sharp details, and excellent contrast, ensuring a visually captivating experience. Whether you\'re watching movies, sports, or playing games, the high-definition quality of this TV will enhance every moment.</p>\r\n<p>Sleek Design: The ITEL LED 32S322 boasts a sleek and modern design that will complement any living space. With its slim bezels and compact size, it maximizes the screen-to-body ratio, providing you with a more immersive and edge-to-edge viewing experience. This TV is not just a visual treat; it also adds a touch of elegance to your home decor.</p>\r\n<p>Multiple Connectivity Options: Connect your favorite devices to the ITEL LED 32S322 effortlessly. It offers a range of connectivity options, including HDMI and USB ports, allowing you to connect gaming consoles, media players, external storage devices, and more. This versatility enables you to access and enjoy your multimedia content directly on the big screen.</p>\r\n<p>User-Friendly Interface: Navigating through channels, adjusting settings, and accessing your favorite content is a breeze with the user-friendly interface of the ITEL LED 32S322. The TV\'s intuitive controls and remote make it easy to customize your viewing experience and enjoy your entertainment without any complexity or confusion.</p>\r\n<p>Upgrade your home entertainment setup with the ITEL LED 32S322 and unlock a world of immersive visuals and seamless casting capabilities. With iCast technology and a built-in digital TV tuner, this TV delivers convenience, versatility, and stunning picture quality, all packaged in a sleek and stylish design. Experience the future of television with the ITEL LED 32S322.</p>', 99, 'PRODUCT_117896481.jpg', 'PRODUCT_765769002.jpg', 'PRODUCT_102117272.jpg', 0, '1'),
(146, 2, 48, '2023-08-07 19:15:13', 'Nokia C31 Smartphone with 6.75\" HD+ Display and 5050 mAh non-removable battery, 4GB RAM / 128GB ROM, Android 12 OS, 2 years quarterly security updates, 13MP triple rear and selfie cameras - PTA approved', '<p>Product details of Nokia C31 Smartphone with 6.75\" HD+ Display and 5050 mAh non-removable battery, 4GB RAM / 128GB ROM, Android 12 OS, 2 years quarterly security updates, 13MP triple rear and selfie cameras - PTA approved<br />6.7&rdquo; HD+ display: Bigger view of the things you love. Wherever, whenever.Triple-rear and selfie cameras powered by Camera from Google: Capture breath-taking scenic views, beautiful portrait images and stellar night shots.Comes with Android 12: More personal, secure and intuitive than ever before.Durable, reliable and efficient: Nokia phone build-quality with IP52 ingress protection and streamlined software.Be yourself for longer: Nokia C31 gives you the freedom to keep going from just a single charge, so you can stream, scroll, surf &ndash; you name it &ndash; for longer. It&rsquo;s all thanks to 3-day battery life and AI-powered battery-saving features<br />6.7&rdquo; HD+ display: Bigger view of the things you love. Wherever, whenever.Triple-rear and selfie cameras powered by Camera from Google: Capture breath-taking scenic views, beautiful portrait images and stellar night shots.Comes with Android 12: More personal, secure and intuitive than ever before.Durable, reliable and efficient: Nokia phone build-quality with IP52 ingress protection and streamlined software.Be yourself for longer: Nokia C31 gives you the freedom to keep going from just a single charge, so you can stream, scroll, surf &ndash; you name it &ndash; for longer. It&rsquo;s all thanks to 3-day battery life and AI-powered battery-saving features<br />Specifications of Nokia C31 Smartphone with 6.75\" HD+ Display and 5050 mAh non-removable battery, 4GB RAM / 128GB ROM, Android 12 OS, 2 years quarterly security updates, 13MP triple rear and selfie cameras - PTA approved<br />BrandNokiaSKU397265770_PK-1923400826ProtectionNot SpecifiedYearNot SpecifiedNumber Of Cameras4<br />What&rsquo;s in the box 1 x Charger, 1 x Headset, 1 x Jelly Case, 1 x Quick Start Guide, 1 x Safety Booklet, 1 x Micro USB C</p>', 99, 'PRODUCT_375676928.jpg', 'PRODUCT_637179022.jpg', 'PRODUCT_216040252.jpg', 0, '0'),
(147, 2, 49, '2023-08-07 19:17:06', 'Oppo A54 Display 6.51 RAM 4GB ROM 128 GB Fast Charging 18W', '<p>Product details of Oppo A54 Display 6.51 RAM 4GB ROM 128 GB Fast Charging 18W<br />Oppo A54 Display 6.51 RAM 4GB ROM 128 GB Fast Charging 18W<br />Processor Octa-core (4 x 2.35 GHz Cortex-A53 + 4 x 1.8 GHz Cortex-A53)<br />Mediatek MT6765 Helio P35 (12nm)<br />PowerVR GE8320<br />Display IPS LCD Capacitive Touchscreen, 16M Colors, Multitouch<br />6.51 Inches<br />720 x 1600 Pixels (~270 PPI)<br />Corning Gorilla Glass<br />60Hz refresh rate<br />Memory 128GBBuilt-in,4GB RAM<br />microSD Card, (supports up to 256GB)<br />Camera Triple Camera: 13 MP, f/2.2, 25mm (wide), 1/3.06\", PDAF + 2 MP, f/2.4, (macro) + 2 MP, f/2.4, (depth), LED Flash<br />Geo-tagging, touch focus, face detection, HDR, panorama, Video (1080p@30fps)<br />16 MP, f/2.0, (wide), 1/3.06\", HDR, Video (1080p@30fps)</p>', 99, 'PRODUCT_699420365.jpg', 'PRODUCT_151065488.jpg', 'PRODUCT_956725526.jpg', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(55) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `product_id`, `color`, `price`, `stock`) VALUES
(138, 77, 'purple', 1200, 3),
(139, 78, 'black', 40, 100),
(140, 79, 'black', 199, 0),
(141, 79, 'lightpink', 199, -1),
(142, 79, 'white', 199, 5),
(148, 81, 'black', 55000, 332),
(149, 81, 'gold', 57000, 23),
(150, 81, 'orange', 58000, 22),
(153, 83, 'black', 22000, 22),
(154, 83, 'gold', 25000, 19),
(155, 83, 'purple', 24000, 21),
(156, 84, 'blue', 55000, 20),
(157, 84, 'green', 57000, 18),
(158, 84, 'gold', 56000, 22),
(161, 87, 'black', 55000, 23),
(162, 87, 'white', 56000, 23),
(165, 90, 'blue', 200, 50),
(166, 90, 'red', 210, 50),
(167, 90, 'white', 190, 50),
(168, 91, 'black', 600, 22),
(169, 92, 'white', 500, 22),
(170, 92, 'black', 500, 0),
(171, 92, 'blue', 499, 21),
(172, 93, 'black', 500, 33),
(173, 94, 'white', 999, 26),
(174, 95, 'white', 999, 30),
(175, 96, 'white', 899, 23),
(176, 97, 'black', 700, 20),
(177, 98, 'black', 699, 44),
(178, 99, 'black', 799, 54),
(179, 100, 'black', 999, 56),
(180, 101, 'black', 399, 43),
(181, 102, 'black', 399, 55),
(182, 102, 'white', 399, 53),
(183, 103, 'black', 699, 67),
(184, 104, 'white', 999, 55),
(185, 104, 'black', 999, 45),
(186, 105, 'black', 199, 55),
(187, 106, 'white', 699, 67),
(188, 106, 'black', 699, 76),
(189, 107, 'white', 999, 78),
(190, 108, 'black', 499, 67),
(191, 108, 'white', 499, 77),
(192, 109, 'white', 999, 78),
(193, 109, 'black', 999, 55),
(194, 110, 'black', 799, 45),
(195, 111, 'lightpink', 999, 77),
(196, 111, 'black', 999, 45),
(197, 112, 'gold', 699, 61),
(198, 112, 'black', 699, 78),
(199, 112, 'white', 699, 99),
(200, 113, 'gold', 999, 78),
(201, 113, 'black', 999, 88),
(202, 113, 'purple', 999, 67),
(203, 114, 'gold', 599, 55),
(204, 114, 'black', 599, 65),
(205, 115, 'black', 1100, 34),
(206, 115, 'white', 1100, 43),
(207, 116, 'white', 499, 67),
(208, 117, 'white', 699, 88),
(209, 118, 'black', 999, 88),
(210, 118, 'white', 999, 76),
(211, 119, 'white', 999, 56),
(212, 120, 'black', 1299, 88),
(213, 121, 'black', 199, 66),
(214, 122, 'black', 150, 55),
(215, 123, 'white', 99, 33),
(216, 123, 'black', 99, 76),
(217, 124, 'black', 299, 65),
(218, 125, 'black', 999, 66),
(219, 126, 'black', 899, 87),
(220, 126, 'white', 899, 65),
(221, 127, 'black', 699, 65),
(222, 128, 'black', 399, 46),
(223, 129, 'black', 399, 76),
(224, 130, 'black', 599, 67),
(225, 130, 'green', 599, 76),
(226, 131, 'black', 699, 23),
(227, 132, 'black', 300, 55),
(228, 133, 'black', 399, 34),
(229, 133, 'purple', 399, 33),
(230, 133, 'white', 399, 34),
(231, 134, 'black', 799, 55),
(232, 135, 'white', 899, 67),
(233, 135, 'black', 899, 56),
(234, 136, 'white', 999, 67),
(235, 137, 'black', 699, 57),
(236, 138, 'red', 899, 50),
(237, 139, 'red', 999, 56),
(238, 139, 'black', 999, 86),
(239, 140, 'black', 899, 98),
(240, 140, 'white', 899, 57),
(241, 141, 'black', 799, 78),
(242, 142, 'white', 999, 67),
(243, 143, 'black', 899, 97),
(244, 144, 'gold', 199, 56),
(245, 144, 'gold', 199, 23),
(246, 145, 'black', 899, 78),
(247, 146, 'green', 699, 67),
(248, 146, 'blue', 699, 98),
(249, 147, 'black', 799, 99),
(250, 147, 'blue', 677, 77);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL DEFAULT '5',
  `feedback` varchar(555) DEFAULT NULL,
  `img_one` varchar(55) DEFAULT NULL,
  `img_two` varchar(55) DEFAULT NULL,
  `img_three` varchar(55) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `date`, `product_id`, `user_id`, `rating`, `feedback`, `img_one`, `img_two`, `img_three`, `status`) VALUES
(40, '2023-08-04 02:04:36', 77, 33, '5', 'Best ever product I have seen in my life. thank you', 'REVIEW_842294834.jpg', '', '', '1'),
(41, '2023-08-06 19:30:04', 79, 34, '3', 'vhjvjhv', 'REVIEW_248358178.jpeg', 'REVIEW_461869196.jpeg', 'REVIEW_792502779.jpeg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(55) NOT NULL,
  `site_tagline` varchar(55) NOT NULL,
  `site_about` varchar(55) NOT NULL,
  `about_us` mediumtext NOT NULL,
  `terms_condition` mediumtext NOT NULL,
  `site_maintenance` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_tagline`, `site_about`, `about_us`, `terms_condition`, `site_maintenance`) VALUES
(1, 'Electronic Gala', 'we sell best things', 'we are here to serve you with best service', '<h2>About Us</h2>\r\n<p>Welcome to Electronic Gala, your one-stop destination for all things electronic! We are an ambitious and passionate team of tech enthusiasts, committed to bringing you the latest and most innovative electronic gadgets and devices.</p>\r\n<h5>Our Vision:</h5>\r\n<p>At Electronic Gala, our vision is to become the go-to platform for electronics shopping, where customers can find a vast selection of high-quality products at competitive prices. We aim to foster a community of tech-savvy individuals who can explore, discover, and experience the wonders of cutting-edge technology.</p>\r\n<h5>Our Mission:</h5>\r\n<p>Our mission is to provide an unparalleled online shopping experience, catering to the needs and preferences of tech lovers worldwide. We strive to curate a diverse range of products from renowned brands and emerging tech companies, ensuring that our customers have access to the best and most reliable electronics on the market.</p>', '<h2>Terms and Conditions</h2>\r\n<p>By using&nbsp;<strong>Electronic Gala</strong>&nbsp;you agree to these terms and conditions, privacy policy, returns and refund policy of the Site. Please read the Terms and Conditions carefully before using&nbsp;<strong>Electronic Gala</strong>.</p>\r\n<h5>Acceptance of Terms</h5>\r\n<p>By accessing or using our website, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions. If you do not agree with any part of these terms, you must not use our website.</p>\r\n<h5>User Accounts</h5>\r\n<p>To access certain features of our website, you may need to create an account. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.You must provide accurate and up-to-date information during the registration process. You agree not to impersonate any other person or entity and to notify us promptly of any unauthorized use of your account.</p>\r\n<h5>Product Information</h5>\r\n<p>We strive to provide accurate and up-to-date information about the products listed on our website. However, we do not guarantee the accuracy, completeness, or reliability of any product information, including prices, descriptions, images, and availability.We reserve the right to modify or discontinue any product at any time without notice.</p>\r\n<h5>Ordering and Payment</h5>\r\n<p>By placing an order on our website, you are making an offer to purchase the products or services at the prices listed, subject to these Terms and Conditions.We reserve the right to refuse or cancel any order for any reason, including but not limited to product availability, errors in product information, or suspicious activity. Payment for orders must be made through the available payment methods. You agree to provide accurate payment information and authorize us to charge the applicable amount for your order.</p>\r\n<h5>Shipping and Delivery</h5>\r\n<p>We will make reasonable efforts to deliver the products within the specified timeframe. However, we are not responsible for delays beyond our control, such as shipping carrier delays or force majeure events.The risk of loss and title for products purchased from our website pass to you upon delivery of the products to the shipping carrier.</p>\r\n<h5>Returns and Refunds</h5>\r\n<p>Our returns and refunds policy is outlined separately on our website. By making a purchase, you agree to abide by our return policy. We reserve the right to refuse or limit returns and refunds in cases of abuse or violation of our policies.</p>\r\n<h5>Privacy Policy</h5>\r\n<p>Our Privacy Policy governs the collection, use, and disclosure of your personal information. By using our website, you consent to our Privacy Policy.</p>', '0');

-- --------------------------------------------------------

--
-- Table structure for table `track_order`
--

CREATE TABLE `track_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `title` text NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `track_order`
--

INSERT INTO `track_order` (`id`, `user_id`, `order_no`, `date`, `title`, `description`) VALUES
(129, 33, '871298737398296', '2023-08-04 01:49:33', 'pending', 'order has been placed and pending approval'),
(130, 33, '871298737398296', '2023-08-04 01:50:00', 'processing', 'the order has been received and is being processed.'),
(131, 33, '871298737398296', '2023-08-04 01:50:30', 'in-transit', 'the order is on its way to its final destination.'),
(132, 33, '871298737398296', '2023-08-04 01:50:40', 'shipped', 'the order has been shipped and is on its way to the customer.'),
(133, 33, '871298737398296', '2023-08-04 01:51:10', 'out for delivery', 'be ready, your order will be delivered today.'),
(134, 33, '871298737398296', '2023-08-04 01:56:35', 'delivered', 'the order has been delivered to the customer.'),
(135, 33, '668637654630724', '2023-08-06 03:24:38', 'pending', 'order has been placed and pending approval'),
(136, 33, '668637654630724', '2023-08-06 03:25:47', 'out for delivery', 'be ready, your order will be delivered today.'),
(137, 34, '628239844074178', '2023-08-06 16:23:05', 'pending', 'order has been placed and pending approval'),
(138, 34, '628239844074178', '2023-08-06 16:25:07', 'processing', 'the order has been received and is being processed.'),
(139, 34, '628239844074178', '2023-08-06 16:26:12', 'delivered', 'the order has been delivered to the customer.'),
(142, 34, '961248259124758', '2023-08-06 16:44:08', 'pending', 'order has been placed and pending approval'),
(143, 34, '961248259124758', '2023-08-06 16:44:31', 'processing', 'the order has been received and is being processed.'),
(144, 34, '961248259124758', '2023-08-06 16:44:43', 'in-transit', 'the order is on its way to its final destination.'),
(145, 34, '961248259124758', '2023-08-06 16:44:53', 'shipped', 'the order has been shipped and is on its way to the customer.'),
(146, 34, '961248259124758', '2023-08-06 16:45:02', 'out for delivery', 'be ready, your order will be delivered today.'),
(147, 34, '961248259124758', '2023-08-06 16:45:11', 'delivered', 'the order has been delivered to the customer.'),
(148, 34, '830032681941648', '2023-08-06 17:44:16', 'pending', 'order has been placed and pending approval'),
(149, 34, '929051323704980', '2023-08-06 17:59:07', 'pending', 'order has been placed and pending approval'),
(150, 34, '830032681941648', '2023-08-06 18:03:46', 'canceled', 'the order has been cancelled by the customer.'),
(151, 34, '929051323704980', '2023-08-06 18:04:00', 'canceled', 'the order has been cancelled by the customer.'),
(152, 34, '465974325599937', '2023-08-06 18:07:43', 'pending', 'order has been placed and pending approval'),
(153, 34, '465974325599937', '2023-08-06 18:08:25', 'processing', 'the order has been received and is being processed.'),
(154, 34, '465974325599937', '2023-08-06 18:08:48', 'delivered', 'the order has been delivered to the customer.'),
(155, 34, '543017711629037', '2023-08-06 19:28:02', 'pending', 'order has been placed and pending approval'),
(156, 34, '543017711629037', '2023-08-06 19:28:30', 'processing', 'the order has been received and is being processed.'),
(157, 34, '543017711629037', '2023-08-06 19:28:38', 'in-transit', 'the order is on its way to its final destination.'),
(158, 34, '543017711629037', '2023-08-06 19:28:45', 'shipped', 'the order has been shipped and is on its way to the customer.'),
(159, 34, '543017711629037', '2023-08-06 19:28:50', 'out for delivery', 'be ready, your order will be delivered today.'),
(160, 34, '543017711629037', '2023-08-06 19:28:55', 'delivered', 'the order has been delivered to the customer.'),
(161, 33, '998672615707978', '2023-08-07 19:18:52', 'pending', 'order has been placed and pending approval'),
(162, 33, '299100526279513', '2023-08-07 19:19:18', 'pending', 'order has been placed and pending approval'),
(163, 33, '797361712675496', '2023-08-07 19:20:45', 'pending', 'order has been placed and pending approval'),
(164, 33, '919730568291201', '2023-08-07 19:21:57', 'pending', 'order has been placed and pending approval'),
(165, 33, '202340550092481', '2023-08-07 19:22:22', 'pending', 'order has been placed and pending approval'),
(166, 33, '788173726529743', '2023-08-07 19:23:29', 'pending', 'order has been placed and pending approval'),
(167, 33, '464649835665670', '2023-08-07 19:23:50', 'pending', 'order has been placed and pending approval'),
(168, 33, '299100526279513', '2023-08-07 19:24:11', 'processing', 'the order has been received and is being processed.'),
(169, 33, '797361712675496', '2023-08-07 19:24:22', 'in-transit', 'the order is on its way to its final destination.'),
(170, 33, '919730568291201', '2023-08-07 19:24:39', 'shipped', 'the order has been shipped and is on its way to the customer.'),
(171, 33, '202340550092481', '2023-08-07 19:24:50', 'out for delivery', 'be ready, your order will be delivered today.'),
(172, 33, '788173726529743', '2023-08-07 19:25:03', 'delivered', 'the order has been delivered to the customer.'),
(173, 33, '464649835665670', '2023-08-07 19:25:14', 'canceled', 'the order has been cancelled by the merchant.'),
(174, 35, '519760549649881', '2023-08-07 19:30:05', 'pending', 'order has been placed and pending approval'),
(175, 35, '451209731090271', '2023-08-07 19:30:33', 'pending', 'order has been placed and pending approval'),
(176, 35, '614249299993594', '2023-08-07 19:31:00', 'pending', 'order has been placed and pending approval'),
(177, 35, '592292759945804', '2023-08-07 19:31:46', 'pending', 'order has been placed and pending approval'),
(178, 35, '522329565061637', '2023-08-07 19:32:19', 'pending', 'order has been placed and pending approval'),
(179, 35, '519760549649881', '2023-08-07 19:32:40', 'canceled', 'the order has been cancelled by the merchant.'),
(180, 35, '451209731090271', '2023-08-07 19:32:51', 'failed', 'the order has failed for some reason.'),
(181, 35, '614249299993594', '2023-08-07 19:33:01', 'shipped', 'the order has been shipped and is on its way to the customer.'),
(182, 35, '592292759945804', '2023-08-07 19:33:10', 'out for delivery', 'be ready, your order will be delivered today.'),
(183, 34, '479691869074262', '2023-08-07 19:40:41', 'pending', 'order has been placed and pending approval'),
(184, 34, '192865887069209', '2023-08-07 19:41:17', 'pending', 'order has been placed and pending approval'),
(185, 34, '371221387892559', '2023-08-07 19:42:20', 'pending', 'order has been placed and pending approval'),
(186, 34, '411828225370729', '2023-08-07 19:43:15', 'pending', 'order has been placed and pending approval'),
(187, 34, '479691869074262', '2023-08-07 19:43:36', 'canceled', 'the order has been cancelled by the merchant.'),
(188, 34, '192865887069209', '2023-08-07 19:43:59', 'shipped', 'the order has been shipped and is on its way to the customer.'),
(189, 34, '371221387892559', '2023-08-07 19:44:20', 'in-transit', 'the order is on its way to its final destination.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `name` text NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `img` varchar(55) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date_added`, `name`, `email`, `password`, `img`, `status`) VALUES
(33, '2023-08-03 23:40:49', 'abc', 'user@gmail.com', '123', 'IMG_138863.png', '1'),
(34, '2023-08-06 14:44:24', 'Abrar Mustafa', 'abrarmustafa@gmail.com', '1234', 'IMG_5977238.jpg', '1'),
(35, '2023-08-07 19:29:02', 'umar', 'umar@gmail.com', '1234', 'IMG_7294808.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ph_no` varchar(25) NOT NULL,
  `province` text NOT NULL,
  `city` text NOT NULL,
  `postal_code` int(11) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `ph_no`, `province`, `city`, `postal_code`, `address`) VALUES
(7, 33, '03000000000', 'Punjab', 'lahreo', 123456, 'lahore'),
(8, 34, '03348997843', 'Punjab', 'Lahore', 54000, 'Lahore'),
(9, 35, '030040000005', 'punjab', 'lahore', 55000, 'walton lahore');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` text NOT NULL,
  `subject` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `message` varchar(1500) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`id`, `date`, `name`, `subject`, `email`, `message`, `status`) VALUES
(8, '2023-07-15 15:55:54', 'kabeer', 'asfsdfsdf', 'superadmin@gmail.com', 'sfasdf', '1'),
(10, '2023-07-15 15:55:54', 'kabeer', 'asfsdfsdf', 'superadmin@gmail.com', 'sfasdf', '1'),
(11, '2023-07-15 22:18:08', 'Ali Irtza', 'asfsdfsdf', 'test@gmail.com', 'safsdfsd', '1'),
(12, '2023-08-06 14:40:12', 'abrar', 'hello', 'abrarmustafa111@gmail.com', 'as', '1'),
(13, '2023-08-06 18:36:58', 'abrar mustafa', 'hello', 'abrarmustafa111@gmail.com', 'helloasdasd', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousal`
--
ALTER TABLE `carousal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `varition_id` (`variation_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_attributes`
--
ALTER TABLE `color_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequent_bought`
--
ALTER TABLE `frequent_bought`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `bought_with` (`bought_with`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_2` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_order`
--
ALTER TABLE `track_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `carousal`
--
ALTER TABLE `carousal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `color_attributes`
--
ALTER TABLE `color_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frequent_bought`
--
ALTER TABLE `frequent_bought`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `track_order`
--
ALTER TABLE `track_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_variations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frequent_bought`
--
ALTER TABLE `frequent_bought`
  ADD CONSTRAINT `frequent_bought_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `frequent_bought_ibfk_2` FOREIGN KEY (`bought_with`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `product_variations_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `track_order`
--
ALTER TABLE `track_order`
  ADD CONSTRAINT `track_order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
