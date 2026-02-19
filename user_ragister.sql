-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2025 at 08:39 AM
-- Server version: 10.4.32-MariaDB
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
-- Table structure for table `boat_products`
--

CREATE TABLE `boat_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Boat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boat_products`
--

INSERT INTO `boat_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(2, 'boAt New Launch Rockerz 650', 'boAt New Launch Rockerz 650 Pro, Touch/Swipe Controls, Dolby Audio, 80Hrs Battery, 2Mics ENx, Fast Charge, App Support, Dual Pair, Bluetooth Headphones, Wireless Headphone with Mic (Iris Black)', 899.00, 8999.00, 'b1.webp', 'Boat'),
(3, 'boAt Rockerz 550', 'boAt Rockerz 550 Bluetooth Wireless Over Ear Headphones with Upto 20 Hours Playback, 50MM Drivers, Soft Padded Ear Cushions and Physical Noise Isolation with Mic (Black Symphony)', 499.00, 4999.00, 'b2.webp', 'Boat'),
(4, 'boAt Rockerz 450', 'boAt Rockerz 450, 15 HRS Battery, 40mm Drivers, Padded Ear Cushions, Integrated Controls, Dual Modes, On Ear Bluetooth Headphones, Wireless Headphone with Mic (Hazel Beige)', 499.00, 3999.00, 'b3.webp', 'Boat'),
(5, 'boAt Bassheads 900 Pro', 'boAt Bassheads 900 Pro Wired Headphones with 40Mm Drivers, Lightweight Foldable Design, Over Ear, Remote Control, Unidirectional Retractable Mic, Adjustable Headband & USB Type-A Compatibility(Black)', 499.00, 3999.00, 'b4.webp', 'Boat'),
(6, 'boAt Rockerz 255 Pro+', 'boAt Rockerz 255 Pro+, 60HRS Battery, Fast Charge, IPX7, Dual Pairing, Low Latency, Magnetic Earbuds, in Ear Bluetooth Neckband, Wireless with Mic Earphones (Teal Green)', 599.00, 3999.00, 'b5.webp', 'Boat'),
(7, 'boAt Rockerz 255', 'boAt Rockerz 255 Touch Neckband with Full Touch Controls,Spatial Audio,Up to 30H Playtime,ASAP Charge,Beast Mode,Enx Technology(Deep Blue),in-Ear,Bluetooth', 399.00, 4999.00, 'b6.webp', 'Boat'),
(8, 'boAt Airdopes 311 Pro', 'boAt Airdopes 311 Pro, 50HRS Battery, Fast Charge, Dual Mics ENx Tech, Transparent LID, Low Latency, IPX4, IWP Tech, v5.3 Bluetooth Earbuds, TWS Ear Buds Wireless Earphones with mic (Active Black)', 599.00, 4999.00, 'b7.webp', 'Boat');

-- --------------------------------------------------------

--
-- Table structure for table `boult_products`
--

CREATE TABLE `boult_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Boult'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boult_products`
--

INSERT INTO `boult_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(2, 'Boult Newly Launched Z20', 'Boult Newly Launched Z20 Truly Wireless Bluetooth Ear Buds with 51H Playtime, Zen™ Calling ENC Mic, Made in India, Low Latency Gaming, Rich Bass Drivers, TWS Earbuds', 399.00, 4999.00, 'u1.webp', 'Boult'),
(3, 'Boult Audio K40', 'Boult Audio K40 True Wireless in Ear Earbuds with 48H Playtime, Clear Calling 4 Mics, 45ms Low Latency Gaming, Premium Grip, 13mm Bass Drivers, Type-C Fast Charging', 699.00, 5999.00, 'u2.webp', 'Boult'),
(4, 'Boult X Mustang', 'Boult X Mustang Newly Launched Torq TWS Earbuds with 60H Playtime, App Support, 4 Mics ENC, 45ms Low Latency, 13mm Driver, Breathing LEDs, Touch Control, Made', 999.00, 5999.00, 'u3.webp', 'Boult'),
(5, 'Boult Audio W20', 'Boult Audio W20 Truly Wireless in Ear Earbuds with 35H Playtime, Zen™ ENC Mic, 45ms Low Latency, 13mm Bass Drivers, Type-C Fast Charging, Made in India,Touch Controls', 399.00, 4999.00, 'u4.webp', 'Boult'),
(6, 'Boult Audio Z40', 'Boult Audio Z40 True Wireless in Ear Earbuds with 60H Playtime, Zen™ ENC Mic, Low Latency Gaming, Type-C Fast Charging, Made in India, 10mm Rich Bass Drivers', 359.00, 4999.00, 'u5.webp', 'Boult'),
(7, 'Boult Newly Launched Z20', 'Boult Newly Launched Z20 Truly Wireless Bluetooth Ear Buds with 51H Playtime, Zen™ Calling ENC Mic, Made in India, Low Latency Gaming, Rich Bass Drivers, TWS Earbuds', 499.00, 5999.00, 'u6.webp', 'Boult'),
(8, 'Boult Audio Z40 Ultra', 'Boult Audio Z40 Ultra Truly Wireless in Ear Earbuds with 32dB Active Noise Cancellation, 100H Playtime, Dual Device Pairing, Quad Mic ENC, 45ms Low Latency, Metallic Finish', 499.00, 6999.00, 'u7.webp', 'Boult');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Deepak kumar', 'deepakkumar897986@gmail.com', 'good products', 'good products and nice products', '2025-06-27 04:53:02'),
(2, 'Deepak kumar', 'deepakkumar897986@gmail.com', 'good products', 'dddd', '2025-06-28 05:19:56'),
(3, 'Deepak kumar', 'deepakkumar897986@gmail.com', 'good products', 'dfff', '2025-06-28 05:50:52'),
(4, 'kahsdha', 'lasijdiauojli@gmail.com', 'apouipoarjwepr', 'nkljdoeiqw983horiwe98rywohiuweyrwelrhowei', '2025-06-28 12:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `dell_products`
--

CREATE TABLE `dell_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Dell'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dell_products`
--

INSERT INTO `dell_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(2, 'Dell Inspiron 3530 Laptop', 'Dell Inspiron 3530 Laptop, 13th Generation Intel Core i7-1355U Processor, 16GB, 512GB, 15.6\" (39.62cm) FHD 120Hz Display, Backlit KB, Windows 11 + MSO\'21, 15 Month McAfee, Silver, Thin & Light-1.62kg', 23999.00, 67999.00, 'd1.webp', 'Dell'),
(3, 'Dell 15 Thin & Light Laptop', 'Dell 15 Thin & Light Laptop, Intel Core i5-1235U Processor/16GB DDR4 + 512GB SSD/Intel UHD Graphics/15.6\" (39.62cm) FHD Display/Win 11 + MSO\'21/15 Month McAfee/Carbon Black/Spill Resistant KB/1.69kg', 28999.00, 68999.00, 'd2.webp', 'Dell'),
(4, 'Dell Latitude 3440', 'Dell Latitude 3440 Intel Core I3 12Th Gen 1215U - (8GB/512 GB SSD/Intel UHD Graphics) Thin and Light Business DOS Laptop/14 HD Display/Grey/1.5 Kg', 19999.00, 65999.00, 'd3.webp', 'Dell'),
(5, 'Dell Inspiron 5440 Laptop', 'Dell Inspiron 5440 Laptop, i5-1334U Processor, 16GB DDR5 + 1TB SSD, 14\" FHD+AG NonTouch 250nits WVA Display w/Comfortview Support, Backlit KB + FPR, Win11 + MSO\'21 + 15 Month McAfee, Ice Blue, 1.54kg', 23999.00, 85999.00, 'd4.webp', 'Dell'),
(6, 'Dell 15 Thin & Light Laptop', 'Dell 15 Thin & Light Laptop, Windows 11 Home, Intel Core i5-1235U Processor, 8GB RAM + 512GB SSD, 15.6\" FHD Window 11 + Mso \'21, 15 Month Mcafee, Spill-Resistant Keyboard, Black, 1.66Kg', 23999.00, 62999.00, 'd5.webp', 'Dell'),
(7, 'Dell {Smartchoice} G15-5530', 'Dell {Smartchoice} G15-5530 Core i5-13450HX| NVIDIA RTX 3050, 6GB (16GB RAM|1TB SSD, FHD|Window 11|MS Office\' 21|15.6\")(39.62cm)|Dark Shadow Grey|2.65Kg|Gaming Laptop', 25999.00, 106999.00, 'd6.webp', 'Dell'),
(8, 'Dell Inspiron 7441 Plus Laptop', 'Dell Inspiron 7441 Plus Laptop, Built-in AI Snapdragon X Plus X1P-64-100 10 Core, 16GB LPDDR5X + 512GB SSD, Qualcomm GPU, 14\"(35.56cm) 16:10 QHD+ Touch 400 nits, Backlit KB + FPR, Ice Blue, 1.4 kg', 35999.00, 153999.00, 'd7.webp', 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `home_products`
--

CREATE TABLE `home_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Home'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_products`
--

INSERT INTO `home_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(1, 'Apple iPhone 15', 'Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 12MP 2x Telephoto,2x optical zoom in, 2x opticalzoom out; 4x optical zoom range Digital zoom up to 10x, Smart HDR 5', 23000.00, 79999.00, 'a1.webp', 'Home'),
(2, 'iPhone 16 128 GB: 5G', 'iPhone 16 128 GB: 5G Mobile Phone with Camera Control, A18 Chip and a Big Boost in Battery Life. Works with AirPods; Teal', 25999.00, 78999.00, 'a2.webp', 'Home'),
(3, 'iPhone 16 Pro Max 256 GB: 5G', 'iPhone 16 Pro Max 256 GB: 5G Mobile Phone with Camera Control, 4K 120 fps Dolby Vision and a Huge Leap in Battery Life. Works with AirPods; Black Titanium', 33999.00, 164999.00, 'a3.webp', 'Home'),
(4, 'Apple iPhone 15', 'Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 12MP 2x Telephoto (enabled by quad-pixel sensor), 2x optical zoom in, 2x optical zoom out; 4x optical zoom range Digital zoom up to 10x', 23459.00, 88999.00, 'a4.webp', 'Home'),
(5, 'iQOO Z10 5G', 'iQOO Z10 5G (Silver, 8GB RAM, 128GB Stroage) | India\'s Biggest Ever 7300 mAh Battery | Snapdragon 7s Gen 3 Processor | Brightest Quad Curved AMOLED Display in The Segment', 13999.00, 25999.00, '1751118674_20.jpg', 'Home'),
(6, 'Lava Storm Play 5G', 'Lava Storm Play 5G (Dune Titanium, 6+6*GB RAM, 128GB Storage) | World\'s First MTK D7060 Processor | 500k+ Antutu | LPDDR5 RAM | UFS 3.1 Storage | 50MP AI Camera | 120Hz Refresh Rate | IP64 Protection', 4999.00, 15999.00, '1751118674_21.jpg', 'Home'),
(7, 'iQOO Z9s 5G', 'iQOO Z9s 5G (Titanium Matte, 8GB RAM, 128GB Storage) | 120 Hz 3D Curved AMOLED Display | 5500 mAh Ultra-Thin Battery | Dimesity 7300 5G Processor | Sony IMX882 OIS Camera with Aura Light', 8999.00, 34999.00, '1751118674_22.jpg', 'Home'),
(8, 'Samsung Galaxy A35 5G', 'Samsung Galaxy A35 5G (Awesome Lilac, 8GB RAM, 128GB Storage) | Premium Glass Back | 50 MP Main Camera (OIS) | Nightography | IP67 | Corning Gorilla Glass Victus+ | sAMOLED with Vision Booster', 12999.00, 34999.00, '1751118674_23.jpg', 'Home'),
(9, 'Motorola Edge 5G', 'Motorola Edge 50 Fusion 5G (Hot Pink, 8GB RAM, 128GB Storage)', 8999.00, 23999.00, '1751118674_24.jpg', 'Home'),
(10, 'Samsung Galaxy F15 5G', '16.39 Centimeters (6.5\"Inch) Super AMOLED Display , FHD+ Resolution with 2340 x 1080 Pixels , 16M Colors and 90Hz Refresh Rate', 11999.00, 18999.00, 's1.webp', 'Home'),
(11, 'Samsung Galaxy S25 Ultra 5G', 'Samsung Galaxy S25 Ultra 5G AI Smartphone (Titanium Whitesilver, 12GB RAM, 256GB Storage), 200MP Camera, S Pen Included, Long Battery Life', 10999.00, 79999.00, 'p2.webp', 'Home'),
(12, 'Samsung Galaxy S24 Ultra 5G', 'Samsung Galaxy S24 Ultra 5G AI Smartphone (Titanium Gray, 12GB, 256GB Storage) Galaxy S24 Ultra, the ultimate form of Galaxy Ultra with a new titanium exterior and a 17.25cm (6.8\") flat display. It\'s an absolute marvel of design.', 27999.00, 94999.00, 's2.webp', 'Home'),
(13, 'Samsung Galaxy S24 FE', 'The Samsung Galaxy S24 FE is a premium mid-range phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP triple-camera system, and IP68 water resistance..', 4599.00, 2199.00, 'p4.webp', 'Home'),
(14, 'Samsung Galaxy A35 5G', 'Samsung Galaxy A35 5G (Awesome Iceblue, 8GB RAM, 128GB Storage) with Other OffersBATTERY - Get a massive 5000mAh Lithium-ion Battery (Non-Removable) with C-Type Super Fast Charging (25W Charging Support)', 1399.00, 34999.00, 's3.webp', 'Home'),
(15, 'Samsung Galaxy M35 5G', 'Samsung Galaxy M35 5G (Moonlight Blue,6GB RAM,128GB Storage)| Corning Gorilla Glass Victus+| AnTuTu Score 595K+ | Vapour Cooling Chamber | 6000mAh Battery | 120Hz Super AMOLED Display| Without Charger', 5999.00, 19999.00, 's4.webp', 'Home'),
(16, 'Samsung Galaxy Z Flip3 5G', 'Samsung Galaxy Z Flip3 5G (Cream, 8GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offers Corning Gorilla Glass Victus+| AnTuTu Score 595K+ | Vapour Cooling Chamber | 6000mAh Battery | 120Hz Super AMOLED Display| Without Charger', 13999.00, 54999.00, 's5.webp', 'Home'),
(17, 'Xiaomi 15', 'Xiaomi 15 (Black, 12GB RAM, 512GB Storage) 6.36\" 1.5K 120Hz AMOLED display with Ultra slim bexels and 3200nits of peak brightness', 23999.00, 65999.00, 'x5.webp', 'Home'),
(18, 'Redmi Note 14 5G', 'Redmi Note 14 5G (Mystique White, 6GB RAM 128GB Storage) | Global Debut MTK Dimensity 7025 Ultra | 2100 nits Segment Brightest 120Hz AMOLED | 50MP Sony LYT 600 OIS+EIS Triple Camera', 5999.00, 14999.00, 'x2.webp', 'Home'),
(19, 'Xiaomi 14 CIVI', 'Xiaomi 14 CIVI (Cruise Blue, 8GB RAM, 256GB Storage) Xiaomi 14 CIVI boots with Xiaomi\'s HyperOS out of the box. HyperOS is based on Android 14', 8999.00, 34999.00, 'x3.webp', 'Home'),
(20, 'Xiaomi 12 Pro', 'Xiaomi 12 Pro | 5G (Couture Blue, 8GB RAM, 256GB Storage) | Snapdragon 8 Gen 1 | 50+50+50MP Flagship Cameras (OIS) | 10bit 2K+ Curved AMOLED Display | Sound by Harman Kardon', 14999.00, 44999.00, 'x4.webp', 'Home'),
(21, 'Xiaomi 15 Ultra', 'Xiaomi 15 Ultra (Silver Chrome, 16GB RAM, 512GB Storage) 6.73\" WQHD+ 3200 nits ultra-bright AMOLED display Large 5410mAh High density battery with 90W Hypercharge support IP68 rated and protected by Xiaomi Shield Glass 2.0', 14999.00, 84999.00, 'x5.webp', 'Home'),
(22, 'Redmi Note 14', 'The Redmi Note 14 is a mid-range smartphone with a 6.67-inch 120Hz AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery with 33W fast charging.', 8999.00, 21999.00, 'p6.webp', 'Home'),
(23, 'Redmi 14C', 'The Redmi 14C is a budget smartphone with a 6.88-inch 120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera setup, and a 5160mAh battery with 18W fast charging.', 4999.00, 14999.00, 'p7.webp', 'Home'),
(24, 'OnePlus Nord CE4 Lite 5G', 'OnePlus Nord CE4 Lite 5G (Super Silver, 8GB RAM, 128GB Storage) (Raging Blue, 8GB RAM, 256GB Storage) | Snapdragon 8s Gen 3 Processor 6400mAh Battery Smartphone | Segment\'s Most Stable 90FPS for 5 Hours', 6999.00, 14999.00, 'o2.webp', 'Home'),
(25, 'OnePlus 13R', 'OnePlus 13R | Smarter with OnePlus AI (12GB RAM, 256GB Storage Nebula Noir) Titanium Whitesilver, 200MP Camera, S Pen Included, Long Battery Life', 4999.00, 14999.00, 'o3.webp', 'Home'),
(26, 'OnePlus Nord 4 5G', 'OnePlus Nord 4 5G (Obsidian Midnight, 8GB RAM, 256GB Storage) 5G smartphone with a high-refresh-rate display, a powerful processor, and a long-lasting battery for smooth performance.', 12999.00, 24999.00, 'o4.webp', 'Home'),
(27, 'OnePlus Nord CE4', 'OnePlus Nord CE4 (Dark Chrome, 8GB RAM, 128GB Storage) premium mid-range phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP triple-camera system, and IP68 water resistance..', 13999.00, 24999.00, 'o5.webp', 'Home'),
(28, 'OnePlus Nord 4 5G', 'OnePlus Nord 4 5G (Oasis Green, 8GB RAM, 256GB Storage) high-performance smartphone featuring a 144Hz AMOLED display, Qualcomm Snapdragon 8 Gen 2 processor, a 50MP dual-camera system, and a 5160mAh battery with 120W fast charging.', 16999.00, 41999.00, 'o6.webp', 'Home'),
(29, 'OnePlus 13', 'OnePlus 13 | Smarter with OnePlus AI (16GB RAM, 512GB Storage Midnight Ocean) 6.67-inch 120Hz AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery with 33W fast charging.', 18999.00, 44999.00, 'o7.webp', 'Home'),
(30, 'OnePlus 11 5G', 'OnePlus 11 5G (Eternal Green, 8GB RAM, 128GB Storage) a 6.88-inch 120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera setup, and a 5160mAh battery with 18W fast charging.', 19999.00, 44999.00, 'o8.webp', 'Home'),
(31, 'HP 15, 13th Gen Intel Core i3-1315U', 'HP 15, 13th Gen Intel Core i3-1315U, 8GB DDR4, 512GB SSD, (Win 11, Office 21, Grey, 1.59kg), Anti-Glare, Micro-Edge,15.6-inch(39.6cm), FHD Laptop, Intel UHD Graphics, 1080p FHD Camera, fd0006TU', 18999.00, 44999.00, 'h1.webp', 'Home'),
(32, 'HP 15, 13th Gen Intel Core i5-1334U', 'HP 15, 13th Gen Intel Core i5-1334U, 16GB DDR4, 512GB SSD, (Win 11, Office 21, Silver, 1.59kg), Anti-Glare, 15.6-inch(39.6cm) FHD Laptop, Iris Xe Graphics, FHD Camera, Backlit KB, fd0316TU/fd0315TU', 23999.00, 74999.00, 'h2.webp', 'Home'),
(33, 'HP 15s,12th Gen Intel Core i3-1215U', 'HP 15s,12th Gen Intel Core i3-1215U, 8GB DDR4, 512 GB SSD(Win 11, Office 21, Silver, 1.69kg), Anti-Glare, 15.6inch(39.6Cm), FHD Laptop, Intel UHD Graphics, Dual Speakers, HD Camera, fy5006tu', 23999.00, 44999.00, 'h3.webp', 'Home'),
(34, 'HP 255 Notebook', 'HP 255 Notebook, AMD Athlon Silver 7120U,8GB DDR4, 256GB SSD, 15.6-inch(39.6cm),Anti-Glare, HD Laptop, Radeon Graphics, (Win 11, Silver,1.52kg) G10', 16999.00, 44999.00, 'h4.webp', 'Home'),
(35, 'HP Laptop 15s, 12th Gen', 'HP Laptop 15s, 12th Gen Intel Core i3-1215U, 15.6-inch (39.6 cm), FHD, 16GB DDR4, 512GB SSD, Intel UHD Graphics, 720p HD Camera, Anti-Glare Screen, Thin & Light (Win 11, Silver, 1.69 kg), fy5004TU', 21999.00, 44999.00, 'h5.webp', 'Home'),
(36, 'HP Laptop 245 G9 AMD', 'HP Laptop 245 G9 AMD Ryzen 3 3250U Dual Core - (8GB/512GB SSD/AMD Radeon Graphics) Thin and Light Business Laptop/14 (35.56cm)/Silver/1.47 kg', 18999.00, 42999.00, 'h6.webp', 'Home'),
(37, 'HP 14 AI Laptop', 'HP 14 AI Laptop, Intel Core Ultra 5 125H,12 Tops,16GB DDR5, 512GB SSD, (Win 11, Silver, 1.4 kg) Anti-Glare,14-inch (35.6 cm), FHD, Intel Arc Graphics, FHD Camera, Backlit KB, gr1022TU', 25999.00, 80999.00, 'h7.webp', 'Home'),
(38, 'Dell Inspiron 3530 Laptop', 'Dell Inspiron 3530 Laptop, 13th Generation Intel Core i7-1355U Processor, 16GB, 512GB, 15.6\" (39.62cm) FHD 120Hz Display, Backlit KB, Windows 11 + MSO\'21, 15 Month McAfee, Silver, Thin & Light-1.62kg', 23999.00, 67999.00, 'd1.webp', 'Home'),
(39, 'Dell 15 Thin & Light Laptop', 'Dell 15 Thin & Light Laptop, Intel Core i5-1235U Processor/16GB DDR4 + 512GB SSD/Intel UHD Graphics/15.6\" (39.62cm) FHD Display/Win 11 + MSO\'21/15 Month McAfee/Carbon Black/Spill Resistant KB/1.69kg', 28999.00, 68999.00, 'd2.webp', 'Home'),
(40, 'Dell Latitude 3440', 'Dell Latitude 3440 Intel Core I3 12Th Gen 1215U - (8GB/512 GB SSD/Intel UHD Graphics) Thin and Light Business DOS Laptop/14 HD Display/Grey/1.5 Kg', 19999.00, 65999.00, 'd3.webp', 'Home'),
(41, 'Dell Inspiron 5440 Laptop', 'Dell Inspiron 5440 Laptop, i5-1334U Processor, 16GB DDR5 + 1TB SSD, 14\" FHD+AG NonTouch 250nits WVA Display w/Comfortview Support, Backlit KB + FPR, Win11 + MSO\'21 + 15 Month McAfee, Ice Blue, 1.54kg', 23999.00, 85999.00, 'd4.webp', 'Home'),
(42, 'Dell 15 Thin & Light Laptop', 'Dell 15 Thin & Light Laptop, Windows 11 Home, Intel Core i5-1235U Processor, 8GB RAM + 512GB SSD, 15.6\" FHD Window 11 + Mso \'21, 15 Month Mcafee, Spill-Resistant Keyboard, Black, 1.66Kg', 23999.00, 62999.00, 'd5.webp', 'Home'),
(43, 'Dell {Smartchoice} G15-5530', 'Dell {Smartchoice} G15-5530 Core i5-13450HX| NVIDIA RTX 3050, 6GB (16GB RAM|1TB SSD, FHD|Window 11|MS Office\' 21|15.6\")(39.62cm)|Dark Shadow Grey|2.65Kg|Gaming Laptop', 25999.00, 106999.00, 'd6.webp', 'Home'),
(44, 'Dell Inspiron 7441 Plus Laptop', 'Dell Inspiron 7441 Plus Laptop, Built-in AI Snapdragon X Plus X1P-64-100 10 Core, 16GB LPDDR5X + 512GB SSD, Qualcomm GPU, 14\"(35.56cm) 16:10 QHD+ Touch 400 nits, Backlit KB + FPR, Ice Blue, 1.4 kg', 35999.00, 153999.00, 'd7.webp', 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `hp_products`
--

CREATE TABLE `hp_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Hp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hp_products`
--

INSERT INTO `hp_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(2, 'HP 15, 13th Gen Intel Core i3-1315U', 'HP 15, 13th Gen Intel Core i3-1315U, 8GB DDR4, 512GB SSD, (Win 11, Office 21, Grey, 1.59kg), Anti-Glare, Micro-Edge,15.6-inch(39.6cm), FHD Laptop, Intel UHD Graphics, 1080p FHD Camera, fd0006TU', 18999.00, 44999.00, 'h1.webp', 'Hp'),
(3, 'HP 15, 13th Gen Intel Core i5-1334U', 'HP 15, 13th Gen Intel Core i5-1334U, 16GB DDR4, 512GB SSD, (Win 11, Office 21, Silver, 1.59kg), Anti-Glare, 15.6-inch(39.6cm) FHD Laptop, Iris Xe Graphics, FHD Camera, Backlit KB, fd0316TU/fd0315TU', 23999.00, 74999.00, 'h2.webp', 'Hp'),
(4, 'HP 15s,12th Gen Intel Core i3-1215U', 'HP 15s,12th Gen Intel Core i3-1215U, 8GB DDR4, 512 GB SSD(Win 11, Office 21, Silver, 1.69kg), Anti-Glare, 15.6inch(39.6Cm), FHD Laptop, Intel UHD Graphics, Dual Speakers, HD Camera, fy5006tu', 23999.00, 44999.00, 'h3.webp', 'Hp'),
(5, 'HP 255 Notebook', 'HP 255 Notebook, AMD Athlon Silver 7120U,8GB DDR4, 256GB SSD, 15.6-inch(39.6cm),Anti-Glare, HD Laptop, Radeon Graphics, (Win 11, Silver,1.52kg) G10', 16999.00, 44999.00, 'h4.webp', 'Hp'),
(6, 'HP Laptop 15s, 12th Gen', 'HP Laptop 15s, 12th Gen Intel Core i3-1215U, 15.6-inch (39.6 cm), FHD, 16GB DDR4, 512GB SSD, Intel UHD Graphics, 720p HD Camera, Anti-Glare Screen, Thin & Light (Win 11, Silver, 1.69 kg), fy5004TU', 21999.00, 44999.00, 'h5.webp', 'Hp'),
(7, 'HP Laptop 245 G9 AMD', 'HP Laptop 245 G9 AMD Ryzen 3 3250U Dual Core - (8GB/512GB SSD/AMD Radeon Graphics) Thin and Light Business Laptop/14 (35.56cm)/Silver/1.47 kg', 18999.00, 42999.00, 'h6.webp', 'Hp'),
(8, 'HP 14 AI Laptop', 'HP 14 AI Laptop, Intel Core Ultra 5 125H,12 Tops,16GB DDR5, 512GB SSD, (Win 11, Silver, 1.4 kg) Anti-Glare,14-inch (35.6 cm), FHD, Intel Arc Graphics, FHD Camera, Backlit KB, gr1022TU', 25999.00, 80999.00, 'h7.webp', 'Hp');

-- --------------------------------------------------------

--
-- Table structure for table `macbook_products`
--

CREATE TABLE `macbook_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Macbook'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `macbook_products`
--

INSERT INTO `macbook_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(2, 'Apple 2024 MacBook Pro', 'Apple 2024 MacBook Pro Laptop with M4 Pro chip with 14‑core CPU and 20‑core GPU: Built for Apple Intelligence, (16.2″) Liquid Retina XDR Display, 24GB Unified Memory, 512GB SSD Storage; Space Black', 35399.00, 253999.00, 'm1.webp', 'Macbook'),
(3, 'Apple 2025 MacBook Air', 'Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core CPU and 10-core GPU, 16GB Unified Memory, 512GB) - Midnight', 53999.00, 119999.00, 'm2.webp', 'Macbook'),
(4, '2022 Apple MacBook Air Laptop', '2022 Apple MacBook Air Laptop with M2 chip: 13.6-inch Liquid Retina Display, 16GB RAM, 256GB SSD Storage, Backlit Keyboard, 1080p FaceTime HD Camera. Works with iPhone and iPad; Space Gray', 29999.00, 99999.00, 'm3.webp', 'Macbook'),
(5, 'Apple 2024 MacBook Air', 'Apple 2024 MacBook Air (13-inch, Apple M3 chip with 8‑core CPU and 10‑core GPU, 24GB Unified Memory, 512GB) - Space Gray', 43999.00, 153999.00, 'm4.webp', 'Macbook'),
(6, 'Apple 2025 MacBook Air', 'Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core CPU and 8-core GPU, 16GB Unified Memory, 256GB) - Midnight', 33999.00, 153999.00, 'm5.webp', 'Macbook'),
(7, 'Apple 2025 MacBook Air', 'Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core CPU and 8-core GPU, 16GB Unified Memory, 256GB) - skyblue', 35999.00, 153999.00, 'm6.webp', 'Macbook'),
(8, 'Apple 2025 MacBook Air', 'Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core CPU and 8-core GPU, 16GB Unified Memory, 256GB) - Starlight', 42999.00, 149999.00, 'm7.webp', 'Macbook');

-- --------------------------------------------------------

--
-- Table structure for table `oneplusbud_products`
--

CREATE TABLE `oneplusbud_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Oneplusbud'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oneplusbud_products`
--

INSERT INTO `oneplusbud_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(2, 'OnePlus Buds 3', 'OnePlus Buds 3 in Ear TWS Bluetooth Earbuds with Upto 49dB Smart Adaptive Noise Cancellation,Hi-Res Sound Quality,Sliding Volume Control,10mins for 7Hours Fast', 1399.00, 6999.00, 'n1.webp', 'Oneplusbud'),
(3, 'OnePlus Nord Buds 2r', 'OnePlus Nord Buds 2r True Wireless in Ear Earbuds with Mic, 12.4mm Drivers, Playback:Upto 38hr case,4-Mic Design, IP55 Rating [Deep Grey]', 999.00, 2999.00, 'n2.webp', 'Oneplusbud'),
(4, 'OnePlus Nord Buds 3', 'OnePlus Nord Buds 3 Pro Truly Wireless Bluetooth in Ear Earbuds with Upto 49Db Active Noise Cancellation,12.4Mm Dynamic Drivers,10Mins for 11Hrs Fast Charging', 999.00, 3999.00, 'n3.webp', 'Oneplusbud'),
(5, 'OnePlus Buds 3', 'OnePlus Buds 3 TWS in Ear Earbuds with Upto 49dB Smart Adaptive Noise Cancellation,Hi-Res Sound Quality,Sliding Volume Control,10mins for 7Hours', 799.00, 5999.00, 'n4.webp', 'Oneplusbud'),
(6, 'OnePlus Nord Buds', 'OnePlus Nord Buds 2r True Wireless in Ear Earbuds with Mic, 12.4mm Drivers, Playback:Upto 38hr case,4-Mic Design, IP55 Rating [ Misty Grey ]', 299.00, 9999.00, 'n5.webp', 'Oneplusbud'),
(7, 'OnePlus Nord Buds 3', 'OnePlus Nord Buds 3 Truly Wireless Bluetooth in Ear Earbuds with up to 32dB Active Noise Cancellation, 10mins for 11Hours Fast Charging with Up to 43h Music Playback', 399.00, 4999.00, 'n6.webp', 'Oneplusbud'),
(8, 'OnePlus Nord Buds 3', 'OnePlus Nord Buds 3 Pro Truly Wireless Bluetooth in Ear Earbuds with Upto 49Db Active Noise Cancellation,12.4Mm Dynamic Drivers,10Mins for 11Hr Fast Charging', 999.00, 4999.00, 'n7.webp', 'Oneplusbud'),
(9, 'OnePlus Buds 3', 'OnePlus Buds 3 Truly Wireless Bluetooth Earbuds with Upto 49Db Smart ANC,Hi-Res Sound Quality,in Ear,Sliding Volume Control,10Mins for 7Hours Fast Charging', 799.00, 4999.00, 'n8.webp', 'Oneplusbud'),
(10, 'boAt Airdopes Loop Bluetooth', 'boAt Airdopes Loop Bluetooth in Ear Earbuds W/Clip-On Fit, Air Conduction Tech, 50HRS Battery, 4Mics Enx, Dual EQ Modes, 12Mm Drivers, 40Ms Latency,ASAP Charge,OWS Ear Buds Earphones(Lavender Mist)', 199.00, 7999.00, 'a88.webp', 'Oneplusbud');

-- --------------------------------------------------------

--
-- Table structure for table `oneplus_products`
--

CREATE TABLE `oneplus_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Oneplus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oneplus_products`
--

INSERT INTO `oneplus_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(2, 'OnePlus Nord CE4 Lite 5G', 'OnePlus Nord CE4 Lite 5G (Super Silver, 8GB RAM, 128GB Storage) (Raging Blue, 8GB RAM, 256GB Storage) | Snapdragon 8s Gen 3 Processor 6400mAh Battery Smartphone | Segment\'s Most Stable 90FPS for 5 Hours', 6999.00, 14999.00, 'o2.webp', 'Oneplus'),
(3, 'OnePlus 13R', 'OnePlus 13R | Smarter with OnePlus AI (12GB RAM, 256GB Storage Nebula Noir) Titanium Whitesilver, 200MP Camera, S Pen Included, Long Battery Life', 4999.00, 14999.00, 'o3.webp', 'Oneplus'),
(4, 'OnePlus Nord 4 5G', 'OnePlus Nord 4 5G (Obsidian Midnight, 8GB RAM, 256GB Storage) 5G smartphone with a high-refresh-rate display, a powerful processor, and a long-lasting battery for smooth performance.', 12999.00, 24999.00, 'o4.webp', 'Oneplus'),
(5, 'OnePlus Nord CE4', 'OnePlus Nord CE4 (Dark Chrome, 8GB RAM, 128GB Storage) premium mid-range phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP triple-camera system, and IP68 water resistance..', 13999.00, 24999.00, 'o5.webp', 'Oneplus'),
(6, 'OnePlus Nord 4 5G', 'OnePlus Nord 4 5G (Oasis Green, 8GB RAM, 256GB Storage) high-performance smartphone featuring a 144Hz AMOLED display, Qualcomm Snapdragon 8 Gen 2 processor, a 50MP dual-camera system, and a 5160mAh battery with 120W fast charging.', 16999.00, 41999.00, 'o6.webp', 'Oneplus'),
(7, 'OnePlus 13', 'OnePlus 13 | Smarter with OnePlus AI (16GB RAM, 512GB Storage Midnight Ocean) 6.67-inch 120Hz AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery with 33W fast charging.', 18999.00, 44999.00, 'o7.webp', 'Oneplus'),
(8, 'OnePlus 11 5G', 'OnePlus 11 5G (Eternal Green, 8GB RAM, 128GB Storage) a 6.88-inch 120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera setup, and a 5160mAh battery with 18W fast charging.', 19999.00, 44999.00, 'o8.webp', 'Oneplus');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL
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
(13, 'iPhone 16e 128 GB', 'iPhone 16e 128 GB: Built for Apple Intelligence, A18 Chip, Supersized Battery Life, 48MP Fusion. Camera, 15.40 cm (6.1″) Super Retina XDR Display; Black', 17999.00, 64999.00, 'a7.webp', 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `sum_products`
--

CREATE TABLE `sum_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Samsung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sum_products`
--

INSERT INTO `sum_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(5, 'Samsung Galaxy F15 5G', '16.39 Centimeters (6.5\"Inch) Super AMOLED Display , FHD+ Resolution with 2340 x 1080 Pixels , 16M Colors and 90Hz Refresh Rate', 11999.00, 18999.00, 's1.webp', 'samsung'),
(6, 'Samsung Galaxy S25 Ultra 5G', 'Samsung Galaxy S25 Ultra 5G AI Smartphone (Titanium Whitesilver, 12GB RAM, 256GB Storage), 200MP Camera, S Pen Included, Long Battery Life', 10999.00, 79999.00, 'p2.webp', 'samsung'),
(7, 'Samsung Galaxy S24 Ultra 5G', 'Samsung Galaxy S24 Ultra 5G AI Smartphone (Titanium Gray, 12GB, 256GB Storage) Galaxy S24 Ultra, the ultimate form of Galaxy Ultra with a new titanium exterior and a 17.25cm (6.8\") flat display. It\'s an absolute marvel of design.', 27999.00, 94999.00, 's2.webp', 'samsung'),
(8, 'Samsung Galaxy S24 FE', 'The Samsung Galaxy S24 FE is a premium mid-range phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP triple-camera system, and IP68 water resistance..', 4599.00, 2199.00, 'p4.webp', 'samsung'),
(9, 'Samsung Galaxy A35 5G', 'Samsung Galaxy A35 5G (Awesome Iceblue, 8GB RAM, 128GB Storage) with Other OffersBATTERY - Get a massive 5000mAh Lithium-ion Battery (Non-Removable) with C-Type Super Fast Charging (25W Charging Support)', 1399.00, 34999.00, 's3.webp', 'samsung'),
(10, 'Samsung Galaxy M35 5G', 'Samsung Galaxy M35 5G (Moonlight Blue,6GB RAM,128GB Storage)| Corning Gorilla Glass Victus+| AnTuTu Score 595K+ | Vapour Cooling Chamber | 6000mAh Battery | 120Hz Super AMOLED Display| Without Charger', 5999.00, 19999.00, 's4.webp', 'samsung'),
(11, 'Samsung Galaxy Z Flip3 5G', 'Samsung Galaxy Z Flip3 5G (Cream, 8GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offers Corning Gorilla Glass Victus+| AnTuTu Score 595K+ | Vapour Cooling Chamber | 6000mAh Battery | 120Hz Super AMOLED Display| Without Charger', 13999.00, 54999.00, 's5.webp', 'samsung');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(27, 'Deepak', 'kumar', 'deepak@gmail.com', '$2y$10$RmMkmV565b9vPpPu0zey4ee5hXH5fF53zyjSvDxDlW2fQ7fPmB1FG');

-- --------------------------------------------------------

--
-- Table structure for table `xiaomi_products`
--

CREATE TABLE `xiaomi_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT 'Xiaomi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xiaomi_products`
--

INSERT INTO `xiaomi_products` (`id`, `name`, `description`, `price`, `mrp`, `image`, `brand`) VALUES
(5, 'Xiaomi 15', 'Xiaomi 15 (Black, 12GB RAM, 512GB Storage) 6.36\" 1.5K 120Hz AMOLED display with Ultra slim bexels and 3200nits of peak brightness', 23999.00, 65999.00, 'x5.webp', 'Xiaomi'),
(6, 'Redmi Note 14 5G', 'Redmi Note 14 5G (Mystique White, 6GB RAM 128GB Storage) | Global Debut MTK Dimensity 7025 Ultra | 2100 nits Segment Brightest 120Hz AMOLED | 50MP Sony LYT 600 OIS+EIS Triple Camera', 5999.00, 14999.00, 'x2.webp', 'Xiaomi'),
(7, 'Xiaomi 14 CIVI', 'Xiaomi 14 CIVI (Cruise Blue, 8GB RAM, 256GB Storage) Xiaomi 14 CIVI boots with Xiaomi\'s HyperOS out of the box. HyperOS is based on Android 14', 8999.00, 34999.00, 'x3.webp', 'Xiaomi'),
(8, 'Xiaomi 12 Pro', 'Xiaomi 12 Pro | 5G (Couture Blue, 8GB RAM, 256GB Storage) | Snapdragon 8 Gen 1 | 50+50+50MP Flagship Cameras (OIS) | 10bit 2K+ Curved AMOLED Display | Sound by Harman Kardon', 14999.00, 44999.00, 'x4.webp', 'Xiaomi'),
(9, 'Xiaomi 15 Ultra', 'Xiaomi 15 Ultra (Silver Chrome, 16GB RAM, 512GB Storage) 6.73\" WQHD+ 3200 nits ultra-bright AMOLED display Large 5410mAh High density battery with 90W Hypercharge support IP68 rated and protected by Xiaomi Shield Glass 2.0', 14999.00, 84999.00, 'x5.webp', 'Xiaomi'),
(10, 'Redmi Note 14', 'The Redmi Note 14 is a mid-range smartphone with a 6.67-inch 120Hz AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery with 33W fast charging.', 8999.00, 21999.00, 'p6.webp', 'Xiaomi'),
(11, 'Redmi 14C', 'The Redmi 14C is a budget smartphone with a 6.88-inch 120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera setup, and a 5160mAh battery with 18W fast charging.', 4999.00, 14999.00, 'p7.webp', 'Xiaomi');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `xiaomi_products`
--
ALTER TABLE `xiaomi_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boat_products`
--
ALTER TABLE `boat_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `boult_products`
--
ALTER TABLE `boult_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dell_products`
--
ALTER TABLE `dell_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home_products`
--
ALTER TABLE `home_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `hp_products`
--
ALTER TABLE `hp_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `macbook_products`
--
ALTER TABLE `macbook_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oneplusbud_products`
--
ALTER TABLE `oneplusbud_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oneplus_products`
--
ALTER TABLE `oneplus_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sum_products`
--
ALTER TABLE `sum_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `xiaomi_products`
--
ALTER TABLE `xiaomi_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
