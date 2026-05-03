-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2026 at 05:53 AM
-- Server version: 8.0.44
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_ragister`
--

-- --------------------------------------------------------

--
-- Table structure for table `apple_products`
--

CREATE TABLE `apple_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Apple',
  `deleted_by_admin` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apple_products`
--

INSERT INTO `apple_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`, `deleted_at`) VALUES
(1, 'Apple iPhone 15', 'Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 12MP 2x Telephoto,2x optical zoom in, 2x opticalzoom out; 4x optical zoom range Digital zoom up to 10x, Smart HDR 5', 23999.00, 79999.00, 'a1.webp', 'Apple', 0, NULL),
(2, 'iPhone 16 128 GB: 5G', 'iPhone 16 128 GB: 5G Mobile Phone with Camera Control, A18 Chip and a Big Boost in Battery Life. Works with AirPods; Teal', 24999.00, 78999.00, 'a2.webp', 'Apple', 0, NULL),
(3, 'iPhone 16 Pro Max 256 GB: 5G', 'iPhone 16 Pro Max 256 GB: 5G Mobile Phone with Camera Control, 4K 120 fps Dolby Vision and a Huge Leap in Battery Life. Works with AirPods; Black Titaniumry life', 45999.00, 164999.00, 'a3.webp', 'Apple', 0, NULL),
(4, 'Apple iPhone 14', 'Dual-camera system: 12MP Main, 12MP Ultrawide with Portrait mode, Depth Control, Portrait Lighting, Smart HDR 4, and 4K Dolby Vision HDR video up to 60 fps', 33999.00, 84999.00, 'a5.webp', 'Apple', 0, NULL),
(5, 'Apple iPhone 13 (128GB)', '12MP Wide and Ultra Wide cameras, Night mode, and 4K Dolby Vision recording', 13999.00, 54999.00, 'a6.webp', 'Apple', 0, NULL),
(6, 'Apple iPhone 15', 'Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 12MP 2x Telephoto,2x optical zoom in, 2x opticalzoom out; Smart HDR 5', 23999.00, 79999.00, 'a1.webp', 'Apple', 0, NULL),
(7, 'iPhone 16 128 GB: 5G', 'iPhone 16 128 GB: 5G Mobile Phone with Camera Control, A18 Chip and a Big Boost in Battery Life', 24999.00, 78999.00, 'a2.webp', 'Apple', 0, NULL),
(8, 'iPhone 16 Pro Max 256 GB: 5G', 'iPhone 16 Pro Max 256 GB: 5G Mobile Phone with Camera Control, 4K 120 fps Dolby Vision', 45999.00, 164999.00, 'a3.webp', 'Apple', 0, NULL),
(9, 'Apple iPhone 15', 'Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 12MP 2x Telephoto enabled by quad-pixel sensor', 34999.00, 88999.00, 'a4.webp', 'Apple', 0, NULL),
(10, 'Apple iPhone 14', 'Dual-camera system: 12MP Main, 12MP Ultrawide with Portrait mode, Smart HDR 4', 33999.00, 84999.00, 'a5.webp', 'Apple', 0, NULL),
(11, 'Apple iPhone 13 (128GB)', 'Advanced dual-camera system with 12MP Wide and Ultra Wide cameras, Night mode', 13999.00, 54999.00, 'a6.webp', 'Apple', 0, NULL),
(12, 'iPhone 16e 128 GB', 'iPhone 16e 128 GB with A18 Chip, Supersized Battery Life, 48MP Fusion Camera', 17999.00, 64999.00, 'a7.webp', 'Apple', 0, NULL),
(13, 'iPhone 17 Pro Max 256 ', 'iPhone 17 Pro Max 256 GB: 17.42 cm (6.9″) Display with Promotion, A19 Pro Chip, Best Battery Life in Any iPhone Ever, Pro Fusion Camera System, Center Stage Front Camera; Silver', 49999.00, 149900.00, '616-Eh2FbPL._AC_UY327_FMwebp_QL65_.webp', 'Apple', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `boat_products`
--

CREATE TABLE `boat_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Boat',
  `deleted_by_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boat_products`
--

INSERT INTO `boat_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`) VALUES
(2, 'boAt New Launch Rockerz 650', 'boAt New Launch Rockerz 650 Pro, Touch/Swipe Controls, Dolby Audio, 80Hrs Battery, 2Mics ENx, Fast Charge, App Support, Dual Pair, Bluetooth Headphones, Wireless Headphone with Mic (Iris Black)', 899.00, 8999.00, 'b1.webp', 'Boat', 0),
(3, 'boAt Rockerz 550', 'boAt Rockerz 550 Bluetooth Wireless Over Ear Headphones with Upto 20 Hours Playback, 50MM Drivers, Soft Padded Ear Cushions and Physical Noise Isolation with Mic (Black Symphony)', 499.00, 4999.00, 'b2.webp', 'Boat', 0),
(4, 'boAt Rockerz 450', 'boAt Rockerz 450, 15 HRS Battery, 40mm Drivers, Padded Ear Cushions, Integrated Controls, Dual Modes, On Ear Bluetooth Headphones, Wireless Headphone with Mic (Hazel Beige)', 499.00, 3999.00, 'b3.webp', 'Boat', 0),
(5, 'boAt Bassheads 900 Pro', 'boAt Bassheads 900 Pro Wired Headphones with 40Mm Drivers, Lightweight Foldable Design, Over Ear, Remote Control, Unidirectional Retractable Mic, Adjustable Headband & USB Type-A Compatibility(Black)', 499.00, 3999.00, 'b4.webp', 'Boat', 0),
(6, 'boAt Rockerz 255 Pro+', 'boAt Rockerz 255 Pro+, 60HRS Battery, Fast Charge, IPX7, Dual Pairing, Low Latency, Magnetic Earbuds, in Ear Bluetooth Neckband, Wireless with Mic Earphones (Teal Green)', 599.00, 3999.00, 'b5.webp', 'Boat', 0),
(7, 'boAt Rockerz 255', 'boAt Rockerz 255 Touch Neckband with Full Touch Controls,Spatial Audio,Up to 30H Playtime,ASAP Charge,Beast Mode,Enx Technology(Deep Blue),in-Ear,Bluetooth', 399.00, 4999.00, 'b6.webp', 'Boat', 0),
(8, 'boAt Airdopes 311 Pro', 'boAt Airdopes 311 Pro, 50HRS Battery, Fast Charge, Dual Mics ENx Tech, Transparent LID, Low Latency, IPX4, IWP Tech, v5.3 Bluetooth Earbuds, TWS Ear Buds Wireless Earphones with mic (Active Black)', 599.00, 4999.00, 'b7.webp', 'Boat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `boult_products`
--

CREATE TABLE `boult_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Boult',
  `deleted_by_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boult_products`
--

INSERT INTO `boult_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`) VALUES
(2, 'Boult Newly Launched Z20', 'Boult Newly Launched Z20 Truly Wireless Bluetooth Ear Buds with 51H Playtime, Zen™ Calling ENC Mic, Made in India, Low Latency Gaming, Rich Bass Drivers, TWS Earbuds', 399.00, 4999.00, 'u1.webp', 'Boult', 0),
(3, 'Boult Audio K40', 'Boult Audio K40 True Wireless in Ear Earbuds with 48H Playtime, Clear Calling 4 Mics, 45ms Low Latency Gaming, Premium Grip, 13mm Bass Drivers, Type-C Fast Charging', 699.00, 5999.00, 'u2.webp', 'Boult', 0),
(4, 'Boult X Mustang', 'Boult X Mustang Newly Launched Torq TWS Earbuds with 60H Playtime, App Support, 4 Mics ENC, 45ms Low Latency, 13mm Driver, Breathing LEDs, Touch Control, Made', 999.00, 5999.00, 'u3.webp', 'Boult', 0),
(5, 'Boult Audio W20', 'Boult Audio W20 Truly Wireless in Ear Earbuds with 35H Playtime, Zen™ ENC Mic, 45ms Low Latency, 13mm Bass Drivers, Type-C Fast Charging, Made in India,Touch Controls', 399.00, 4999.00, 'u4.webp', 'Boult', 0),
(6, 'Boult Audio Z40', 'Boult Audio Z40 True Wireless in Ear Earbuds with 60H Playtime, Zen™ ENC Mic, Low Latency Gaming, Type-C Fast Charging, Made in India, 10mm Rich Bass Drivers', 359.00, 4999.00, 'u5.webp', 'Boult', 0),
(7, 'Boult Newly Launched Z20', 'Boult Newly Launched Z20 Truly Wireless Bluetooth Ear Buds with 51H Playtime, Zen™ Calling ENC Mic, Made in India, Low Latency Gaming, Rich Bass Drivers, TWS Earbuds', 499.00, 5999.00, 'u6.webp', 'Boult', 0),
(8, 'Boult Audio Z40 Ultra', 'Boult Audio Z40 Ultra Truly Wireless in Ear Earbuds with 32dB Active Noise Cancellation, 100H Playtime, Dual Device Pairing, Quad Mic ENC, 45ms Low Latency, Metallic Finish', 499.00, 6999.00, 'u7.webp', 'Boult', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_by_user` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `created_at`, `deleted_by_user`, `deleted_at`) VALUES
(1, NULL, 'Deepak kumar', 'deepakkumar897986@gmail.com', 'good products', 'good products and nice products', '2025-06-27 04:53:02', 0, NULL),
(2, NULL, 'Deepak kumar', 'deepakkumar897986@gmail.com', 'good products', 'dddd', '2025-06-28 05:19:56', 0, NULL),
(3, NULL, 'Deepak kumar', 'deepakkumar897986@gmail.com', 'good products', 'dfff', '2025-06-28 05:50:52', 0, NULL),
(4, NULL, 'kahsdha', 'lasijdiauojli@gmail.com', 'apouipoarjwepr', 'nkljdoeiqw983horiwe98rywohiuweyrwelrhowei', '2025-06-28 12:29:32', 0, NULL),
(9, 39, 'user-2', 'user-2@gmail.com', 'this is user-2', 'this is user-2', '2026-03-02 05:22:22', 0, NULL),
(11, NULL, 'het', 'user1@gmail.com', 'kahoia', 'i akllove tooyuo', '2026-03-06 17:59:15', 1, '2026-03-07 23:37:37'),
(12, 40, 'user-3', 'user-3@gmail.com', 'this is user-3 testing', 'helllo user-3', '2026-03-14 07:30:59', 0, NULL),
(14, 40, 'user-3', 'user-3@gmail.com', 'hello', 'dhhe;dsaf', '2026-03-19 09:30:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dell_products`
--

CREATE TABLE `dell_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Dell',
  `deleted_by_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dell_products`
--

INSERT INTO `dell_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`) VALUES
(2, 'Dell Inspiron 3530 Laptop', 'Dell Inspiron 3530 Laptop, 13th Generation Intel Core i7-1355U Processor, 16GB, 512GB, 15.6\" (39.62cm) FHD 120Hz Display, Backlit KB, Windows 11 + MSO\'21, 15 Month McAfee, Silver, Thin & Light-1.62kg', 23999.00, 67999.00, 'd1.webp', 'Dell', 0),
(3, 'Dell 15 Thin & Light Laptop', 'Dell 15 Thin & Light Laptop, Intel Core i5-1235U Processor/16GB DDR4 + 512GB SSD/Intel UHD Graphics/15.6\" (39.62cm) FHD Display/Win 11 + MSO\'21/15 Month McAfee/Carbon Black/Spill Resistant KB/1.69kg', 28999.00, 68999.00, 'd2.webp', 'Dell', 0),
(4, 'Dell Latitude 3440', 'Dell Latitude 3440 Intel Core I3 12Th Gen 1215U - (8GB/512 GB SSD/Intel UHD Graphics) Thin and Light Business DOS Laptop/14 HD Display/Grey/1.5 Kg', 19999.00, 65999.00, 'd3.webp', 'Dell', 0),
(5, 'Dell Inspiron 5440 Laptop', 'Dell Inspiron 5440 Laptop, i5-1334U Processor, 16GB DDR5 + 1TB SSD, 14\" FHD+AG NonTouch 250nits WVA Display w/Comfortview Support, Backlit KB + FPR, Win11 + MSO\'21 + 15 Month McAfee, Ice Blue, 1.54kg', 23999.00, 85999.00, 'd4.webp', 'Dell', 0),
(6, 'Dell 15 Thin & Light Laptop', 'Dell 15 Thin & Light Laptop, Windows 11 Home, Intel Core i5-1235U Processor, 8GB RAM + 512GB SSD, 15.6\" FHD Window 11 + Mso \'21, 15 Month Mcafee, Spill-Resistant Keyboard, Black, 1.66Kg', 23999.00, 62999.00, 'd5.webp', 'Dell', 0),
(7, 'Dell {Smartchoice} G15-5530', 'Dell {Smartchoice} G15-5530 Core i5-13450HX| NVIDIA RTX 3050, 6GB (16GB RAM|1TB SSD, FHD|Window 11|MS Office\' 21|15.6\")(39.62cm)|Dark Shadow Grey|2.65Kg|Gaming Laptop', 25999.00, 106999.00, 'd6.webp', 'Dell', 0),
(8, 'Dell Inspiron 7441 Plus Laptop', 'Dell Inspiron 7441 Plus Laptop, Built-in AI Snapdragon X Plus X1P-64-100 10 Core, 16GB LPDDR5X + 512GB SSD, Qualcomm GPU, 14\"(35.56cm) 16:10 QHD+ Touch 400 nits, Backlit KB + FPR, Ice Blue, 1.4 kg', 35999.00, 153999.00, 'd7.webp', 'Dell', 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_products`
--

CREATE TABLE `home_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Home',
  `deleted_by_admin` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_products`
--

INSERT INTO `home_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`, `deleted_at`) VALUES
(2, 'iPhone 16 128 GB: 5G', 'iPhone 16 128 GB: 5G Mobile Phone with Camera Control, A18 Chip and a Big Boost in Battery Life. Works with AirPods; Teal', 25999.00, 78999.00, 'a2.webp', 'Home', 1, NULL),
(3, 'iPhone 16 Pro Max 256 GB: 5G', 'iPhone 16 Pro Max 256 GB: 5G Mobile Phone with Camera Control, 4K 120 fps Dolby Vision and a Huge Leap in Battery Life. Works with AirPods; Black Titanium', 33999.00, 164999.00, 'a3.webp', 'Home', 1, NULL),
(5, 'iQOO Z10 5G', 'iQOO Z10 5G (Silver, 8GB RAM, 128GB Stroage) | India\'s Biggest Ever 7300 mAh Battery | Snapdragon 7s Gen 3 Processor | Brightest Quad Curved AMOLED Display in The Segment', 13999.00, 25999.00, '1751118674_20.jpg', 'Home', 1, NULL),
(6, 'Lava Storm Play 5G', 'Lava Storm Play 5G (Dune Titanium, 6+6*GB RAM, 128GB Storage) | World\'s First MTK D7060 Processor | 500k+ Antutu | LPDDR5 RAM | UFS 3.1 Storage | 50MP AI Camera | 120Hz Refresh Rate | IP64 Protection', 4999.00, 15999.00, '1751118674_21.jpg', 'Home', 0, NULL),
(7, 'iQOO Z9s 5G', 'iQOO Z9s 5G (Titanium Matte, 8GB RAM, 128GB Storage) | 120 Hz 3D Curved AMOLED Display | 5500 mAh Ultra-Thin Battery | Dimesity 7300 5G Processor | Sony IMX882 OIS Camera with Aura Light', 8999.00, 34999.00, '1751118674_22.jpg', 'Home', 0, NULL),
(8, 'Samsung Galaxy A35 5G', 'Samsung Galaxy A35 5G (Awesome Lilac, 8GB RAM, 128GB Storage) | Premium Glass Back | 50 MP Main Camera (OIS) | Nightography | IP67 | Corning Gorilla Glass Victus+ | sAMOLED with Vision Booster', 12999.00, 34999.00, '1751118674_23.jpg', 'Home', 0, NULL),
(9, 'Motorola Edge 5G', 'Motorola Edge 50 Fusion 5G (Hot Pink, 8GB RAM, 128GB Storage)', 8999.00, 23999.00, '1751118674_24.jpg', 'Home', 0, '2026-03-13 21:13:20'),
(10, 'Samsung Galaxy F15 5G', '16.39 Centimeters (6.5\"Inch) Super AMOLED Display , FHD+ Resolution with 2340 x 1080 Pixels , 16M Colors and 90Hz Refresh Rate', 11999.00, 18999.00, 's1.webp', 'Home', 0, NULL),
(11, 'Samsung Galaxy S25 Ultra 5G', 'Samsung Galaxy S25 Ultra 5G AI Smartphone (Titanium Whitesilver, 12GB RAM, 256GB Storage), 200MP Camera, S Pen Included, Long Battery Life', 10999.00, 79999.00, 'p2.webp', 'Home', 0, NULL),
(12, 'Samsung Galaxy S24 Ultra 5G', 'Samsung Galaxy S24 Ultra 5G AI Smartphone (Titanium Gray, 12GB, 256GB Storage) Galaxy S24 Ultra, the ultimate form of Galaxy Ultra with a new titanium exterior and a 17.25cm (6.8\") flat display. It\'s an absolute marvel of design.', 27999.00, 94999.00, 's2.webp', 'Home', 0, NULL),
(13, 'Samsung Galaxy S24 FE', 'The Samsung Galaxy S24 FE is a premium mid-range phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP triple-camera system, and IP68 water resistance..', 4599.00, 2199.00, 'p4.webp', 'Home', 0, NULL),
(14, 'Samsung Galaxy A35 5G', 'Samsung Galaxy A35 5G (Awesome Iceblue, 8GB RAM, 128GB Storage) with Other OffersBATTERY - Get a massive 5000mAh Lithium-ion Battery (Non-Removable) with C-Type Super Fast Charging (25W Charging Support)', 1399.00, 34999.00, 's3.webp', 'Home', 0, NULL),
(16, 'Samsung Galaxy Z Flip3 5G', 'Samsung Galaxy Z Flip3 5G (Cream, 8GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offers Corning Gorilla Glass Victus+| AnTuTu Score 595K+ | Vapour Cooling Chamber | 6000mAh Battery | 120Hz Super AMOLED Display| Without Charger', 13999.00, 54999.00, 's5.webp', 'Home', 0, NULL),
(17, 'Xiaomi 15', 'Xiaomi 15 (Black, 12GB RAM, 512GB Storage) 6.36\" 1.5K 120Hz AMOLED display with Ultra slim bexels and 3200nits of peak brightness', 23999.00, 65999.00, 'x5.webp', 'Home', 0, NULL),
(18, 'Redmi Note 14 5G', 'Redmi Note 14 5G (Mystique White, 6GB RAM 128GB Storage) | Global Debut MTK Dimensity 7025 Ultra | 2100 nits Segment Brightest 120Hz AMOLED | 50MP Sony LYT 600 OIS+EIS Triple Camera', 5999.00, 14999.00, 'x2.webp', 'Home', 0, NULL),
(19, 'Xiaomi 14 CIVI', 'Xiaomi 14 CIVI (Cruise Blue, 8GB RAM, 256GB Storage) Xiaomi 14 CIVI boots with Xiaomi\'s HyperOS out of the box. HyperOS is based on Android 14', 8999.00, 34999.00, 'x3.webp', 'Home', 0, NULL),
(20, 'Xiaomi 12 Pro', 'Xiaomi 12 Pro | 5G (Couture Blue, 8GB RAM, 256GB Storage) | Snapdragon 8 Gen 1 | 50+50+50MP Flagship Cameras (OIS) | 10bit 2K+ Curved AMOLED Display | Sound by Harman Kardon', 14999.00, 44999.00, 'x4.webp', 'Home', 0, NULL),
(21, 'Xiaomi 15 Ultra', 'Xiaomi 15 Ultra (Silver Chrome, 16GB RAM, 512GB Storage) 6.73\" WQHD+ 3200 nits ultra-bright AMOLED display Large 5410mAh High density battery with 90W Hypercharge support IP68 rated and protected by Xiaomi Shield Glass 2.0', 14999.00, 84999.00, 'x5.webp', 'Home', 0, NULL),
(22, 'Redmi Note 14', 'The Redmi Note 14 is a mid-range smartphone with a 6.67-inch 120Hz AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery with 33W fast charging.', 8999.00, 21999.00, 'p6.webp', 'Home', 0, NULL),
(23, 'Redmi 14C', 'The Redmi 14C is a budget smartphone with a 6.88-inch 120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera setup, and a 5160mAh battery with 18W fast charging.', 4999.00, 14999.00, 'p7.webp', 'Home', 0, NULL),
(24, 'OnePlus Nord CE4 Lite 5G', 'OnePlus Nord CE4 Lite 5G (Super Silver, 8GB RAM, 128GB Storage) (Raging Blue, 8GB RAM, 256GB Storage) | Snapdragon 8s Gen 3 Processor 6400mAh Battery Smartphone | Segment\'s Most Stable 90FPS for 5 Hours', 6999.00, 14999.00, 'o2.webp', 'Home', 0, NULL),
(25, 'OnePlus 13R', 'OnePlus 13R | Smarter with OnePlus AI (12GB RAM, 256GB Storage Nebula Noir) Titanium Whitesilver, 200MP Camera, S Pen Included, Long Battery Life', 4999.00, 14999.00, 'o3.webp', 'Home', 0, NULL),
(26, 'OnePlus Nord 4 5G', 'OnePlus Nord 4 5G (Obsidian Midnight, 8GB RAM, 256GB Storage) 5G smartphone with a high-refresh-rate display, a powerful processor, and a long-lasting battery for smooth performance.', 12999.00, 24999.00, 'o4.webp', 'Home', 0, NULL),
(27, 'OnePlus Nord CE4', 'OnePlus Nord CE4 (Dark Chrome, 8GB RAM, 128GB Storage) premium mid-range phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP triple-camera system, and IP68 water resistance..', 13999.00, 24999.00, 'o5.webp', 'Home', 0, NULL),
(28, 'OnePlus Nord 4 5G', 'OnePlus Nord 4 5G (Oasis Green, 8GB RAM, 256GB Storage) high-performance smartphone featuring a 144Hz AMOLED display, Qualcomm Snapdragon 8 Gen 2 processor, a 50MP dual-camera system, and a 5160mAh battery with 120W fast charging.', 16999.00, 41999.00, 'o6.webp', 'Home', 0, NULL),
(29, 'OnePlus 13', 'OnePlus 13 | Smarter with OnePlus AI (16GB RAM, 512GB Storage Midnight Ocean) 6.67-inch 120Hz AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery with 33W fast charging.', 18999.00, 44999.00, 'o7.webp', 'Home', 0, NULL),
(30, 'OnePlus 11 5G', 'OnePlus 11 5G (Eternal Green, 8GB RAM, 128GB Storage) a 6.88-inch 120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera setup, and a 5160mAh battery with 18W fast charging.', 19999.00, 44999.00, 'o8.webp', 'Home', 0, NULL),
(31, 'HP 15, 13th Gen Intel Core i3-1315U', 'HP 15, 13th Gen Intel Core i3-1315U, 8GB DDR4, 512GB SSD, (Win 11, Office 21, Grey, 1.59kg), Anti-Glare, Micro-Edge,15.6-inch(39.6cm), FHD Laptop, Intel UHD Graphics, 1080p FHD Camera, fd0006TU', 18999.00, 44999.00, 'h1.webp', 'Home', 0, NULL),
(32, 'HP 15, 13th Gen Intel Core i5-1334U', 'HP 15, 13th Gen Intel Core i5-1334U, 16GB DDR4, 512GB SSD, (Win 11, Office 21, Silver, 1.59kg), Anti-Glare, 15.6-inch(39.6cm) FHD Laptop, Iris Xe Graphics, FHD Camera, Backlit KB, fd0316TU/fd0315TU', 23999.00, 74999.00, 'h2.webp', 'Home', 0, NULL),
(33, 'HP 15s,12th Gen Intel Core i3-1215U', 'HP 15s,12th Gen Intel Core i3-1215U, 8GB DDR4, 512 GB SSD(Win 11, Office 21, Silver, 1.69kg), Anti-Glare, 15.6inch(39.6Cm), FHD Laptop, Intel UHD Graphics, Dual Speakers, HD Camera, fy5006tu', 23999.00, 44999.00, 'h3.webp', 'Home', 0, NULL),
(34, 'HP 255 Notebook', 'HP 255 Notebook, AMD Athlon Silver 7120U,8GB DDR4, 256GB SSD, 15.6-inch(39.6cm),Anti-Glare, HD Laptop, Radeon Graphics, (Win 11, Silver,1.52kg) G10', 16999.00, 44999.00, 'h4.webp', 'Home', 0, NULL),
(35, 'HP Laptop 15s, 12th Gen', 'HP Laptop 15s, 12th Gen Intel Core i3-1215U, 15.6-inch (39.6 cm), FHD, 16GB DDR4, 512GB SSD, Intel UHD Graphics, 720p HD Camera, Anti-Glare Screen, Thin & Light (Win 11, Silver, 1.69 kg), fy5004TU', 21999.00, 44999.00, 'h5.webp', 'Home', 0, NULL),
(36, 'HP Laptop 245 G9 AMD', 'HP Laptop 245 G9 AMD Ryzen 3 3250U Dual Core - (8GB/512GB SSD/AMD Radeon Graphics) Thin and Light Business Laptop/14 (35.56cm)/Silver/1.47 kg', 18999.00, 42999.00, 'h6.webp', 'Home', 0, NULL),
(37, 'HP 14 AI Laptop', 'HP 14 AI Laptop, Intel Core Ultra 5 125H,12 Tops,16GB DDR5, 512GB SSD, (Win 11, Silver, 1.4 kg) Anti-Glare,14-inch (35.6 cm), FHD, Intel Arc Graphics, FHD Camera, Backlit KB, gr1022TU', 25999.00, 80999.00, 'h7.webp', 'Home', 0, NULL),
(38, 'Dell Inspiron 3530 Laptop', 'Dell Inspiron 3530 Laptop, 13th Generation Intel Core i7-1355U Processor, 16GB, 512GB, 15.6\" (39.62cm) FHD 120Hz Display, Backlit KB, Windows 11 + MSO\'21, 15 Month McAfee, Silver, Thin & Light-1.62kg', 23999.00, 67999.00, 'd1.webp', 'Home', 0, NULL),
(39, 'Dell 15 Thin & Light Laptop', 'Dell 15 Thin & Light Laptop, Intel Core i5-1235U Processor/16GB DDR4 + 512GB SSD/Intel UHD Graphics/15.6\" (39.62cm) FHD Display/Win 11 + MSO\'21/15 Month McAfee/Carbon Black/Spill Resistant KB/1.69kg', 28999.00, 68999.00, 'd2.webp', 'Home', 0, NULL),
(40, 'Dell Latitude 3440', 'Dell Latitude 3440 Intel Core I3 12Th Gen 1215U - (8GB/512 GB SSD/Intel UHD Graphics) Thin and Light Business DOS Laptop/14 HD Display/Grey/1.5 Kg', 19999.00, 65999.00, 'd3.webp', 'Home', 0, NULL),
(41, 'Dell Inspiron 5440 Laptop', 'Dell Inspiron 5440 Laptop, i5-1334U Processor, 16GB DDR5 + 1TB SSD, 14\" FHD+AG NonTouch 250nits WVA Display w/Comfortview Support, Backlit KB + FPR, Win11 + MSO\'21 + 15 Month McAfee, Ice Blue, 1.54kg', 23999.00, 85999.00, 'd4.webp', 'Home', 0, NULL),
(42, 'Dell 15 Thin & Light Laptop', 'Dell 15 Thin & Light Laptop, Windows 11 Home, Intel Core i5-1235U Processor, 8GB RAM + 512GB SSD, 15.6\" FHD Window 11 + Mso \'21, 15 Month Mcafee, Spill-Resistant Keyboard, Black, 1.66Kg', 23999.00, 62999.00, 'd5.webp', 'Home', 0, NULL),
(43, 'Dell {Smartchoice} G15-5530', 'Dell {Smartchoice} G15-5530 Core i5-13450HX| NVIDIA RTX 3050, 6GB (16GB RAM|1TB SSD, FHD|Window 11|MS Office\' 21|15.6\")(39.62cm)|Dark Shadow Grey|2.65Kg|Gaming Laptop', 25999.00, 106999.00, 'd6.webp', 'Home', 0, NULL),
(44, 'Dell Inspiron 7441 Plus Laptop', 'Dell Inspiron 7441 Plus Laptop, Built-in AI Snapdragon X Plus X1P-64-100 10 Core, 16GB LPDDR5X + 512GB SSD, Qualcomm GPU, 14\"(35.56cm) 16:10 QHD+ Touch 400 nits, Backlit KB + FPR, Ice Blue, 1.4 kg', 35999.00, 153999.00, 'd7.webp', 'Home', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hp_products`
--

CREATE TABLE `hp_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Hp',
  `deleted_by_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hp_products`
--

INSERT INTO `hp_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`) VALUES
(2, 'HP 15, 13th Gen Intel Core i3-1315U', 'HP 15, 13th Gen Intel Core i3-1315U, 8GB DDR4, 512GB SSD, (Win 11, Office 21, Grey, 1.59kg), Anti-Glare, Micro-Edge,15.6-inch(39.6cm), FHD Laptop, Intel UHD Graphics, 1080p FHD Camera, fd0006TU', 18999.00, 44999.00, 'h1.webp', 'Hp', 0),
(3, 'HP 15, 13th Gen Intel Core i5-1334U', 'HP 15, 13th Gen Intel Core i5-1334U, 16GB DDR4, 512GB SSD, (Win 11, Office 21, Silver, 1.59kg), Anti-Glare, 15.6-inch(39.6cm) FHD Laptop, Iris Xe Graphics, FHD Camera, Backlit KB, fd0316TU/fd0315TU', 23999.00, 74999.00, 'h2.webp', 'Hp', 0),
(4, 'HP 15s,12th Gen Intel Core i3-1215U', 'HP 15s,12th Gen Intel Core i3-1215U, 8GB DDR4, 512 GB SSD(Win 11, Office 21, Silver, 1.69kg), Anti-Glare, 15.6inch(39.6Cm), FHD Laptop, Intel UHD Graphics, Dual Speakers, HD Camera, fy5006tu', 23999.00, 44999.00, 'h3.webp', 'Hp', 0),
(5, 'HP 255 Notebook', 'HP 255 Notebook, AMD Athlon Silver 7120U,8GB DDR4, 256GB SSD, 15.6-inch(39.6cm),Anti-Glare, HD Laptop, Radeon Graphics, (Win 11, Silver,1.52kg) G10', 16999.00, 44999.00, 'h4.webp', 'Hp', 0),
(6, 'HP Laptop 15s, 12th Gen', 'HP Laptop 15s, 12th Gen Intel Core i3-1215U, 15.6-inch (39.6 cm), FHD, 16GB DDR4, 512GB SSD, Intel UHD Graphics, 720p HD Camera, Anti-Glare Screen, Thin & Light (Win 11, Silver, 1.69 kg), fy5004TU', 21999.00, 44999.00, 'h5.webp', 'Hp', 0),
(7, 'HP Laptop 245 G9 AMD', 'HP Laptop 245 G9 AMD Ryzen 3 3250U Dual Core - (8GB/512GB SSD/AMD Radeon Graphics) Thin and Light Business Laptop/14 (35.56cm)/Silver/1.47 kg', 18999.00, 42999.00, 'h6.webp', 'Hp', 0),
(8, 'HP 14 AI Laptop', 'HP 14 AI Laptop, Intel Core Ultra 5 125H,12 Tops,16GB DDR5, 512GB SSD, (Win 11, Silver, 1.4 kg) Anti-Glare,14-inch (35.6 cm), FHD, Intel Arc Graphics, FHD Camera, Backlit KB, gr1022TU', 25999.00, 80999.00, 'h7.webp', 'Hp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `macbook_products`
--

CREATE TABLE `macbook_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Macbook',
  `deleted_by_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `macbook_products`
--

INSERT INTO `macbook_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`) VALUES
(2, 'Apple 2024 MacBook Pro', 'Apple 2024 MacBook Pro Laptop with M4 Pro chip with 14‑core CPU and 20‑core GPU: Built for Apple Intelligence, (16.2″) Liquid Retina XDR Display, 24GB Unified Memory, 512GB SSD Storage; Space Black', 35399.00, 253999.00, 'm1.webp', 'Macbook', 0),
(3, 'Apple 2025 MacBook Air', 'Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core CPU and 10-core GPU, 16GB Unified Memory, 512GB) - Midnight', 53999.00, 119999.00, 'm2.webp', 'Macbook', 0),
(4, '2022 Apple MacBook Air Laptop', '2022 Apple MacBook Air Laptop with M2 chip: 13.6-inch Liquid Retina Display, 16GB RAM, 256GB SSD Storage, Backlit Keyboard, 1080p FaceTime HD Camera. Works with iPhone and iPad; Space Gray', 29999.00, 99999.00, 'm3.webp', 'Macbook', 0),
(5, 'Apple 2024 MacBook Air', 'Apple 2024 MacBook Air (13-inch, Apple M3 chip with 8‑core CPU and 10‑core GPU, 24GB Unified Memory, 512GB) - Space Gray', 43999.00, 153999.00, 'm4.webp', 'Macbook', 0),
(6, 'Apple 2025 MacBook Air', 'Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core CPU and 8-core GPU, 16GB Unified Memory, 256GB) - Midnight', 33999.00, 153999.00, 'm5.webp', 'Macbook', 0),
(7, 'Apple 2025 MacBook Air', 'Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core CPU and 8-core GPU, 16GB Unified Memory, 256GB) - skyblue', 35999.00, 153999.00, 'm6.webp', 'Macbook', 0),
(8, 'Apple 2025 MacBook Air', 'Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core CPU and 8-core GPU, 16GB Unified Memory, 256GB) - Starlight', 42999.00, 149999.00, 'm7.webp', 'Macbook', 0);

-- --------------------------------------------------------

--
-- Table structure for table `oneplusbud_products`
--

CREATE TABLE `oneplusbud_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Oneplusbud',
  `deleted_by_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oneplusbud_products`
--

INSERT INTO `oneplusbud_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`) VALUES
(2, 'OnePlus Buds 3', 'OnePlus Buds 3 in Ear TWS Bluetooth Earbuds with Upto 49dB Smart Adaptive Noise Cancellation,Hi-Res Sound Quality,Sliding Volume Control,10mins for 7Hours Fast', 1399.00, 6999.00, 'n1.webp', 'Oneplusbud', 0),
(3, 'OnePlus Nord Buds 2r', 'OnePlus Nord Buds 2r True Wireless in Ear Earbuds with Mic, 12.4mm Drivers, Playback:Upto 38hr case,4-Mic Design, IP55 Rating [Deep Grey]', 999.00, 2999.00, 'n2.webp', 'Oneplusbud', 0),
(4, 'OnePlus Nord Buds 3', 'OnePlus Nord Buds 3 Pro Truly Wireless Bluetooth in Ear Earbuds with Upto 49Db Active Noise Cancellation,12.4Mm Dynamic Drivers,10Mins for 11Hrs Fast Charging', 999.00, 3999.00, 'n3.webp', 'Oneplusbud', 0),
(5, 'OnePlus Buds 3', 'OnePlus Buds 3 TWS in Ear Earbuds with Upto 49dB Smart Adaptive Noise Cancellation,Hi-Res Sound Quality,Sliding Volume Control,10mins for 7Hours', 799.00, 5999.00, 'n4.webp', 'Oneplusbud', 0),
(6, 'OnePlus Nord Buds', 'OnePlus Nord Buds 2r True Wireless in Ear Earbuds with Mic, 12.4mm Drivers, Playback:Upto 38hr case,4-Mic Design, IP55 Rating [ Misty Grey ]', 299.00, 9999.00, 'n5.webp', 'Oneplusbud', 0),
(7, 'OnePlus Nord Buds 3', 'OnePlus Nord Buds 3 Truly Wireless Bluetooth in Ear Earbuds with up to 32dB Active Noise Cancellation, 10mins for 11Hours Fast Charging with Up to 43h Music Playback', 399.00, 4999.00, 'n6.webp', 'Oneplusbud', 0),
(8, 'OnePlus Nord Buds 3', 'OnePlus Nord Buds 3 Pro Truly Wireless Bluetooth in Ear Earbuds with Upto 49Db Active Noise Cancellation,12.4Mm Dynamic Drivers,10Mins for 11Hr Fast Charging', 999.00, 4999.00, 'n7.webp', 'Oneplusbud', 0),
(9, 'OnePlus Buds 3', 'OnePlus Buds 3 Truly Wireless Bluetooth Earbuds with Upto 49Db Smart ANC,Hi-Res Sound Quality,in Ear,Sliding Volume Control,10Mins for 7Hours Fast Charging', 799.00, 4999.00, 'n8.webp', 'Oneplusbud', 0),
(10, 'boAt Airdopes Loop Bluetooth', 'boAt Airdopes Loop Bluetooth in Ear Earbuds W/Clip-On Fit, Air Conduction Tech, 50HRS Battery, 4Mics Enx, Dual EQ Modes, 12Mm Drivers, 40Ms Latency,ASAP Charge,OWS Ear Buds Earphones(Lavender Mist)', 199.00, 7999.00, 'a88.webp', 'Oneplusbud', 0);

-- --------------------------------------------------------

--
-- Table structure for table `oneplus_products`
--

CREATE TABLE `oneplus_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Oneplus',
  `deleted_by_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oneplus_products`
--

INSERT INTO `oneplus_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`) VALUES
(2, 'OnePlus Nord CE4 Lite 5G', 'OnePlus Nord CE4 Lite 5G (Super Silver, 8GB RAM, 128GB Storage) (Raging Blue, 8GB RAM, 256GB Storage) | Snapdragon 8s Gen 3 Processor 6400mAh Battery Smartphone | Segment\'s Most Stable 90FPS for 5 Hours', 6999.00, 14999.00, 'o2.webp', 'Oneplus', 0),
(3, 'OnePlus 13R', 'OnePlus 13R | Smarter with OnePlus AI (12GB RAM, 256GB Storage Nebula Noir) Titanium Whitesilver, 200MP Camera, S Pen Included, Long Battery Life', 4999.00, 14999.00, 'o3.webp', 'Oneplus', 0),
(4, 'OnePlus Nord 4 5G', 'OnePlus Nord 4 5G (Obsidian Midnight, 8GB RAM, 256GB Storage) 5G smartphone with a high-refresh-rate display, a powerful processor, and a long-lasting battery for smooth performance.', 12999.00, 24999.00, 'o4.webp', 'Oneplus', 0),
(5, 'OnePlus Nord CE4', 'OnePlus Nord CE4 (Dark Chrome, 8GB RAM, 128GB Storage) premium mid-range phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP triple-camera system, and IP68 water resistance..', 13999.00, 24999.00, 'o5.webp', 'Oneplus', 0),
(6, 'OnePlus Nord 4 5G', 'OnePlus Nord 4 5G (Oasis Green, 8GB RAM, 256GB Storage) high-performance smartphone featuring a 144Hz AMOLED display, Qualcomm Snapdragon 8 Gen 2 processor, a 50MP dual-camera system, and a 5160mAh battery with 120W fast charging.', 16999.00, 41999.00, 'o6.webp', 'Oneplus', 0),
(7, 'OnePlus 13', 'OnePlus 13 | Smarter with OnePlus AI (16GB RAM, 512GB Storage Midnight Ocean) 6.67-inch 120Hz AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery with 33W fast charging.', 18999.00, 44999.00, 'o7.webp', 'Oneplus', 0),
(8, 'OnePlus 11 5G', 'OnePlus 11 5G (Eternal Green, 8GB RAM, 128GB Storage) a 6.88-inch 120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera setup, and a 5160mAh battery with 18W fast charging.', 19999.00, 44999.00, 'o8.webp', 'Oneplus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `payment` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_by_user` tinyint(1) DEFAULT '0',
  `status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `payment`, `total`, `created_at`, `deleted_by_user`, `status`, `deleted_at`) VALUES
(2, 32, 'lmslf', 'harprasadkumar6448@gmail.com', '9803`48249236`-4', 'kqwlkej', 'Cash on Delivery', 23075.00, '2026-03-01 18:28:02', 0, 'Pending', NULL),
(4, 39, 'Deepak kumar', 'deepakkumar897986@gmail.com', '08979866218', 'village barhana post kosi kalan teh-chhata mathura', 'Cash on Delivery', 80089.00, '2026-03-02 05:27:22', 0, 'Shipped', NULL),
(5, 34, 'Manoj Gola07', 'harprasadkumar6448@gmail.com', '1234456691', 'sakraya mathura', 'Cash on Delivery', 23050.00, '2026-03-02 07:04:46', 0, 'Pending', NULL),
(16, 34, 'manoj', 'harprasadkumar6448@gmail.com', '7505324053', 'sakraya', 'UPI', 34068.00, '2026-03-13 07:13:15', 0, 'Pending', NULL),
(19, 40, 'Deepak kumar', 'deepakkumar897986@gmail.com', '08979866218', 'village barhana post kosi kalan teh-chhata mathura', 'Cash on Delivery', 108874.00, '2026-03-14 07:31:42', 0, 'Pending', NULL),
(21, 34, 'Deepak kumar', 'deepakkumar897986@gmail.com', '08979866218', 'village barhana post kosi kalan teh-chhata mathura', 'Cash on Delivery', 24078.00, '2026-03-14 08:25:37', 0, 'Pending', NULL),
(22, 34, 'Deepak kumar', 'deepakkumar897986@gmail.com', '08979866218', 'village barhana post kosi kalan teh-chhata mathura', 'Cash on Delivery', 18703.00, '2026-03-14 08:26:13', 0, 'Pending', NULL),
(23, 34, 'Deepak kumar', 'deepakkumar897986@gmail.com', '08979866218', 'village barhana post kosi kalan teh-chhata mathura', 'Cash on Delivery', 44104.00, '2026-03-14 08:27:00', 0, 'Pending', NULL),
(24, 34, 'Manoj Gola07', 'harprasadkumar6448@gmail.com', '7505324053', 'sakraya', 'Cash on Delivery', 14030.00, '2026-03-14 08:48:09', 0, 'Pending', NULL),
(25, 34, 'Manoj Gola07', 'harprasadkumar6448@gmail.com', '7505324053', 'sakraya', 'Cash on Delivery', 44043.00, '2026-03-14 08:49:09', 0, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_key` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery` decimal(10,2) NOT NULL,
  `line_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_key`, `product_name`, `price`, `quantity`, `image`, `delivery`, `line_total`) VALUES
(2, 2, 'home_1', 'Apple iPhone 15', 23000.00, 1, 'a1.webp', 75.00, 23075.00),
(7, 4, 'home_4', 'Apple iPhone 15', 23459.00, 1, 'a4.webp', 50.00, 23509.00),
(8, 4, 'home_8', 'Samsung Galaxy A35 5G', 12999.00, 1, '1751118674_23.jpg', 13.00, 13012.00),
(9, 4, 'macbook_8', 'Apple 2025 MacBook Air', 42999.00, 1, 'm7.webp', 58.00, 43057.00),
(10, 4, 'boat_5', 'boAt Bassheads 900 Pro', 499.00, 1, 'b4.webp', 12.00, 511.00),
(11, 5, 'home_1', 'Apple iPhone 15', 23000.00, 1, 'a1.webp', 50.00, 23050.00),
(24, 16, 'home_3', 'iPhone 16 Pro Max 256 GB: 5G', 33999.00, 1, 'a3.webp', 69.00, 34068.00),
(28, 19, 'home_2', 'iPhone 16 128 GB: 5G', 25999.00, 1, 'a2.webp', 51.00, 26050.00),
(29, 19, 'apple_3', 'iPhone 16 Pro Max 256 GB: 5G', 45999.00, 1, 'a3.webp', 23.00, 46022.00),
(30, 19, 'oneplus_5', 'OnePlus Nord CE4', 13999.00, 1, 'o5.webp', 83.00, 14082.00),
(31, 19, 'hp_5', 'HP 255 Notebook', 16999.00, 1, 'h4.webp', 35.00, 17034.00),
(32, 19, 'boat_5', 'boAt Bassheads 900 Pro', 499.00, 1, 'b4.webp', 94.00, 593.00),
(33, 19, 'home_6', 'Lava Storm Play 5G', 4999.00, 1, '1751118674_21.jpg', 94.00, 5093.00),
(36, 21, 'dell_5', 'Dell Inspiron 5440 Laptop', 23999.00, 1, 'd4.webp', 79.00, 24078.00),
(37, 22, 'home_5', 'iQOO Z10 5G', 13999.00, 1, '1751118674_20.jpg', 78.00, 14077.00),
(38, 22, 'samsung_8', 'Samsung Galaxy S24 FE', 4599.00, 1, 'p4.webp', 27.00, 4626.00),
(39, 23, 'home_6', 'Lava Storm Play 5G', 4999.00, 2, '1751118674_21.jpg', 96.00, 10094.00),
(40, 23, 'home_3', 'iPhone 16 Pro Max 256 GB: 5G', 33999.00, 1, 'a3.webp', 11.00, 34010.00),
(41, 24, 'home_5', 'iQOO Z10 5G', 13999.00, 1, '1751118674_20.jpg', 31.00, 14030.00),
(42, 25, 'macbook_5', 'Apple 2024 MacBook Air', 43999.00, 1, 'm4.webp', 44.00, 44043.00);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `mobile`, `otp`, `expires_at`) VALUES
(67, '', '397031', '2026-05-03 04:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(7, 'Apple iPhone 15', 'Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 12MP 2x Telephoto,2x optical zoom in, 2x opticalzoom out; 4x optical zoom range Digital zoom up to 10x, Smart HDR 5', 23999.00, 79999.00, 'a1.webp', 'Apple'),
(8, 'iPhone 16 128 GB: 5G', 'iPhone 16 128 GB: 5G Mobile Phone with Camera Control, A18 Chip and a Big Boost in Battery Life. Works with AirPods; Teal', 24999.00, 78999.00, 'a2.webp', 'Apple'),
(9, 'iPhone 16 Pro Max 256 GB: 5G', 'iPhone 16 Pro Max 256 GB: 5G Mobile Phone with Camera Control, 4K 120 fps Dolby Vision and a Huge Leap in Battery Life. Works with AirPods; Black Titanium', 45999.00, 164999.00, 'a3.webp', 'Apple'),
(10, 'Apple iPhone 15', 'Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 12MP 2x Telephoto (enabled by quad-pixel sensor), 2x optical zoom in, 2x optical zoom out; 4x optical zoom range Digital zoom up to 10x', 34999.00, 88999.00, 'a4.webp', 'Apple'),
(11, 'Apple iPhone 14', 'Dual-camera system: 12MP Main, 12MP Ultrawide with Portrait mode, Depth Control, Portrait Lighting, Smart HDR 4, and 4K Dolby Vision HDR video up to 60 fps', 33999.00, 84999.00, 'a5.webp', 'Apple'),
(12, 'Apple iPhone 13 (128GB)', 'Advanced dual-camera system with 12MP Wide and Ultra Wide cameras; Photographic Styles, Smart HDR 4, Night mode, 4K Dolby Vision HDR recording', 13999.00, 54999.00, 'a6.webp', 'Apple'),
(13, 'iPhone 16e 128 GB', 'iPhone 16e 128 GB: Built for Apple Intelligence, A18 Chip, Supersized Battery Life, 48MP Fusion. Camera, 15.40 cm (6.1″) Super Retina XDR Display; Black', 17999.00, 64999.00, 'a7.webp', 'Apple'),
(14, 'iPhone 17 Pro Max 256 GB', 'iPhone 17 Pro Max 256 GB: 17.42 cm (6.9″) Display with Promotion, A19 Pro Chip, Best Battery Life in Any iPhone Ever, Pro Fusion Camera System, Center Stage Front Camera; Silver', 49000.00, 149900.00, '616-Eh2FbPL._AC_UY327_FMwebp_QL65_.webp', 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `sum_products`
--

CREATE TABLE `sum_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Samsung',
  `deleted_by_admin` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sum_products`
--

INSERT INTO `sum_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`, `deleted_at`) VALUES
(5, 'Samsung Galaxy F15 5G', '16.39 Centimeters (6.5\"Inch) Super AMOLED Display , FHD+ Resolution with 2340 x 1080 Pixels , 16M Colors and 90Hz Refresh Rate', 11999.00, 18999.00, 's1.webp', 'samsung', 0, NULL),
(6, 'Samsung Galaxy S25 Ultra 5G', 'Samsung Galaxy S25 Ultra 5G AI Smartphone (Titanium Whitesilver, 12GB RAM, 256GB Storage), 200MP Camera, S Pen Included, Long Battery Life', 10999.00, 79999.00, 'p2.webp', 'samsung', 0, NULL),
(7, 'Samsung Galaxy S24 Ultra 5G', 'Samsung Galaxy S24 Ultra 5G AI Smartphone (Titanium Gray, 12GB, 256GB Storage) Galaxy S24 Ultra, the ultimate form of Galaxy Ultra with a new titanium exterior and a 17.25cm (6.8\") flat display. It\'s an absolute marvel of design.', 27999.00, 94999.00, 's2.webp', 'samsung', 0, NULL),
(8, 'Samsung Galaxy S24 FE', 'The Samsung Galaxy S24 FE is a premium mid-range phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP triple-camera system, and IP68 water resistance..', 4599.00, 2199.00, 'p4.webp', 'samsung', 0, NULL),
(9, 'Samsung Galaxy A35 5G', 'Samsung Galaxy A35 5G (Awesome Iceblue, 8GB RAM, 128GB Storage) with Other OffersBATTERY - Get a massive 5000mAh Lithium-ion Battery (Non-Removable) with C-Type Super Fast Charging (25W Charging Support)', 1399.00, 34999.00, 's3.webp', 'samsung', 0, NULL),
(10, 'Samsung Galaxy M35 5G', 'Samsung Galaxy M35 5G (Moonlight Blue,6GB RAM,128GB Storage)| Corning Gorilla Glass Victus+| AnTuTu Score 595K+ | Vapour Cooling Chamber | 6000mAh Battery | 120Hz Super AMOLED Display| Without Charger', 5999.00, 19999.00, 's4.webp', 'samsung', 0, NULL),
(11, 'Samsung Galaxy Z Flip3 5G', 'Samsung Galaxy Z Flip3 5G (Cream, 8GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offers Corning Gorilla Glass Victus+| AnTuTu Score 595K+ | Vapour Cooling Chamber | 6000mAh Battery | 120Hz Super AMOLED Display| Without Charger', 13999.00, 54999.00, 's5.webp', 'samsung', 0, NULL),
(12, 'Galaxy S26 Ultra 5G', 'Samsung Galaxy S26 Ultra 5G (Cobalt Violet, 12GB RAM, 256GB Storage) with Built-in Privacy Display, AI Phone, Photo Assist, Creative Studio, 200MP Camera, 5000mAh Battery and Snapdragon 8 Elite Gen 5', 39999.00, 139999.00, '71xHws+eI5L._AC_UY327_FMwebp_QL65_.webp', 'samsung', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `profile_image`, `mobile`) VALUES
(27, 'Deepak', 'kumar', 'deepak@gmail.com', '$2y$10$RmMkmV565b9vPpPu0zey4ee5hXH5fF53zyjSvDxDlW2fQ7fPmB1FG', 'user', '2026-02-25 17:42:53', NULL, NULL),
(32, 'manoj', 'kumar', 'manojkumar@gmail.com', '$2y$10$BANCrlj490DhjsAfHx3tr.IwU6RWVmIu2uJiI7WCL1xz85dDGxj8i', 'user', '2026-02-25 17:42:53', NULL, NULL),
(33, 'Manoj', 'Gola07', 'harprasadkumar6448@gmail.com', '$2y$10$u8dc3RUn3tQJ2/HnPuQdHuUahN1gjto7jsRF2bpasrkEdY3CupNN2', 'user', '2026-02-25 17:42:53', NULL, NULL),
(34, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$X6QOF7w2JVVCxbGBw61OjewVX3gG8c/ieskS4/d3PC4RdNfQ3Y6pC', 'admin', '2026-02-25 17:49:21', 'user_34_1774443675.png', NULL),
(35, 'Manoj', 'Gola', 'manoj@gmail.com', '$2y$10$3xzZ1LpXyNAm1qfrRtb4T.k86W0g8bpGzrK0TK4fZX5dew0lS1u8u', 'user', '2026-02-26 11:22:39', NULL, NULL),
(39, 'user-2', 'kumar', 'user-2@gmail.com', '$2y$10$Bu3onMo7arBRE2d5MaXlreYdWEXH2fQo0JN9oTz8oCb5c1zajGujm', 'user', '2026-03-02 05:13:56', NULL, NULL),
(40, 'user-3', 'kumar', 'user-3@gmail.com', '$2y$10$tdR.n/CpdgT5SdIY5CTx2OE2vpIWPu0OpmZYm6Y0H0wm8VZK2CcFy', 'user', '2026-03-14 07:19:33', 'user_40_1774445567.png', NULL),
(43, 'user6', 'u6', 'user6@gmail.com', '$2y$10$LshHnAkLJ1iOpSEGr/ynm.tXsU4qvY5Mfx.763FIOdNTf7vATU8d2', 'user', '2026-03-14 09:56:32', NULL, NULL),
(45, 'Deepak', 'kumar', 'Deepak-admin@gmail.com', '$2y$10$myrxoih32vj5g27Edddk3uTla6pFXlDkNbVEwQhcTcil0AVv9BHEW', 'admin', '2026-05-02 14:53:05', NULL, '8979866218'),
(46, 'Manoj', 'gola', 'Manoj-admin@gmail.com', '$2y$10$zuTIBPClyGftPXsIh2AQIOvD8xzy2qCNIHVKwGZp9z5oA513E2UKq', 'admin', '2026-05-02 14:53:55', NULL, '7505324053');

-- --------------------------------------------------------

--
-- Table structure for table `xiaomi_products`
--

CREATE TABLE `xiaomi_products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Xiaomi',
  `deleted_by_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xiaomi_products`
--

INSERT INTO `xiaomi_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`, `deleted_by_admin`) VALUES
(5, 'Xiaomi 15', 'Xiaomi 15 (Black, 12GB RAM, 512GB Storage) 6.36\" 1.5K 120Hz AMOLED display with Ultra slim bexels and 3200nits of peak brightness', 23999.00, 65999.00, 'x5.webp', 'Xiaomi', 0),
(6, 'Redmi Note 14 5G', 'Redmi Note 14 5G (Mystique White, 6GB RAM 128GB Storage) | Global Debut MTK Dimensity 7025 Ultra | 2100 nits Segment Brightest 120Hz AMOLED | 50MP Sony LYT 600 OIS+EIS Triple Camera', 5999.00, 14999.00, 'x2.webp', 'Xiaomi', 0),
(7, 'Xiaomi 14 CIVI', 'Xiaomi 14 CIVI (Cruise Blue, 8GB RAM, 256GB Storage) Xiaomi 14 CIVI boots with Xiaomi\'s HyperOS out of the box. HyperOS is based on Android 14', 8999.00, 34999.00, 'x3.webp', 'Xiaomi', 0),
(8, 'Xiaomi 12 Pro', 'Xiaomi 12 Pro | 5G (Couture Blue, 8GB RAM, 256GB Storage) | Snapdragon 8 Gen 1 | 50+50+50MP Flagship Cameras (OIS) | 10bit 2K+ Curved AMOLED Display | Sound by Harman Kardon', 14999.00, 44999.00, 'x4.webp', 'Xiaomi', 0),
(9, 'Xiaomi 15 Ultra', 'Xiaomi 15 Ultra (Silver Chrome, 16GB RAM, 512GB Storage) 6.73\" WQHD+ 3200 nits ultra-bright AMOLED display Large 5410mAh High density battery with 90W Hypercharge support IP68 rated and protected by Xiaomi Shield Glass 2.0', 14999.00, 84999.00, 'x5.webp', 'Xiaomi', 0),
(10, 'Redmi Note 14', 'The Redmi Note 14 is a mid-range smartphone with a 6.67-inch 120Hz AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery with 33W fast charging.', 8999.00, 21999.00, 'p6.webp', 'Xiaomi', 0),
(11, 'Redmi 14C', 'The Redmi 14C is a budget smartphone with a 6.88-inch 120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera setup, and a 5160mAh battery with 18W fast charging.', 4999.00, 14999.00, 'p7.webp', 'Xiaomi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apple_products`
--
ALTER TABLE `apple_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boat_products`
--
ALTER TABLE `boat_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boult_products`
--
ALTER TABLE `boult_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_complaints_user` (`user_id`);

--
-- Indexes for table `dell_products`
--
ALTER TABLE `dell_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_products`
--
ALTER TABLE `home_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hp_products`
--
ALTER TABLE `hp_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `macbook_products`
--
ALTER TABLE `macbook_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oneplusbud_products`
--
ALTER TABLE `oneplusbud_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oneplus_products`
--
ALTER TABLE `oneplus_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_user` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_items_order` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sum_products`
--
ALTER TABLE `sum_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `xiaomi_products`
--
ALTER TABLE `xiaomi_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apple_products`
--
ALTER TABLE `apple_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `boat_products`
--
ALTER TABLE `boat_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `boult_products`
--
ALTER TABLE `boult_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dell_products`
--
ALTER TABLE `dell_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home_products`
--
ALTER TABLE `home_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `hp_products`
--
ALTER TABLE `hp_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `macbook_products`
--
ALTER TABLE `macbook_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oneplusbud_products`
--
ALTER TABLE `oneplusbud_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oneplus_products`
--
ALTER TABLE `oneplus_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sum_products`
--
ALTER TABLE `sum_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `xiaomi_products`
--
ALTER TABLE `xiaomi_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_complaints_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
