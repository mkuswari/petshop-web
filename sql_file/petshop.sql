-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 10:27 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Staff') NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `avatar`, `email`, `password`, `role`, `is_active`, `created_at`) VALUES
(3, 'Site Administrator', '1608357080619.png', 'admin@mail.com', '$2y$10$DsJvLX1WH3TzONzf9xYYz.JXJnY/WXwhqEbHgIuZdbD0uPphzLgqe', 'Admin', 1, '2020-12-19 05:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `slug`, `image`) VALUES
(37, 'Makanan', 'makanan', '1605481281645.jpg'),
(38, 'Kandang', 'kandang', '1605481292032.jpg'),
(40, 'Peliharaan', 'peliharaan', '1605483254673.jpg'),
(42, 'Aksesoris', 'aksesoris', '1606404043004.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone` char(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `avatar`, `phone`, `address`, `email`, `password`, `is_active`, `created_at`) VALUES
(6, 'Site Customer', '1608357453866.png', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 'customer@mail.com', '$2y$10$heyAPdEKex5I3SPZ5RA92OCP8cNqpapPFRWkuF/LPFqLZeuPOVC0m', 1, '2020-12-20 10:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `groomings`
--

CREATE TABLE `groomings` (
  `grooming_id` int(11) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_phone` char(15) NOT NULL,
  `customer_address` text NOT NULL,
  `pet_type` enum('Kucing','Anjing') NOT NULL,
  `grooming_status` enum('Didaftarkan','Diterima','Dikerjakan','Selesai') NOT NULL,
  `package_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_finished` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groomings`
--

INSERT INTO `groomings` (`grooming_id`, `customer_name`, `customer_phone`, `customer_address`, `pet_type`, `grooming_status`, `package_id`, `customer_id`, `notes`, `date_created`, `date_finished`) VALUES
(15, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 'Kucing', 'Diterima', 12, 6, '', '2020-12-19 05:56:46', NULL),
(16, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 'Kucing', 'Didaftarkan', 12, 6, '', '2021-02-21 01:27:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `images` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `slug`, `images`, `stock`, `price`, `description`, `category_id`, `created_at`) VALUES
(3, 'Kandang Kucing model minimalis', 'kandang-kucing-model-minimalis', '1605519450652.jpeg', 4, 150000, 'Langsung dari pengrajin ????, Menggunakan kayu solid buka serbuk kayu sehingga tidak mudah lapuk dan awet ????, ✅ Seluruh foto di sini ASLI milik kami', 38, '2021-02-22 02:02:10'),
(4, 'Kandang Kucing 80cm Tingkat 2', 'kandang-kucing-80cm-tingkat-2', '1605519640184.jpeg', 2, 325000, 'Kandang kucing 80 cm 2 tingkat, dimensi 80x50x50, pintu atas bawah dan samping untuk litter box, warna hitam ready, Cat powder coating anti karat,', 38, '2021-02-21 01:25:43'),
(5, 'Jual Kucing persia anakan umur 2 bulan', 'jual-kucing-persia-anakan-umur-2-bulan', '1605519915190.jpg', 0, 750000, 'kucing persia anakang umur 2 bulan. kucing persia anakang umur 2 bulan order sepasang harga 800rb', 40, '2020-12-21 06:04:59'),
(6, 'Bolt 1Kg Tuna Ikan - Makanan Kucing Murah', 'bolt-1kg-tuna-ikan---makanan-kucing-murah', '1605520083844.jpg', 98, 19700, 'Jual Bolt 1Kg Tuna Ikan - Makanan Kucing Murah - Repack - Cat Food dengan harga Rp19.700 dari toko online', 37, '2020-12-19 05:56:03'),
(7, 'Tokopedia Jual Pakan Kucing Me-o Meo Tuna 1.2 Kg', 'tokopedia-jual-pakan-kucing-me-o-meo-tuna-1.2-kg', '1605520258517.jpg', 80, 54000, 'Jual Pakan Kucing Me-o Meo Tuna 1.2 Kg dengan harga Rp54.000 . termurah', 37, '0000-00-00 00:00:00'),
(12, 'Felibite makanan kucing bentuk ikan kemasan 1 kg', 'felibite-makanan-kucing-bentuk-ikan-kemasan-1-kg', '1605565403891.jpeg', 88, 67000, 'Belanja Felibite Bentuk IKAN Makanan Kucing Kemasan 1kg indonesia Murah - Belanja Makanan Kering di Lazada. FREE ONGKIR &amp; Bisa COD', 37, '0000-00-00 00:00:00'),
(13, 'Jual kucing bar bar', 'jual-kucing-bar-bar', '1605565534933.jpg', 0, 290000, 'Jual kucing bar bar, sangat lincah. alasan jual karena mukanya ngeselin, pengen ngajak gelud tiap liat mukanya', 40, '2020-12-19 05:56:03'),
(16, 'Kalung Kucing Murah meriah', 'kalung-kucing-murah-meriah', '1608357774815.jpg', 52, 35000, '&lt;p&gt;Kalung kucing dengan harga murah dan terjangkau&lt;/p&gt;', 42, '2020-12-21 01:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `receipent_name` varchar(128) NOT NULL,
  `receipent_phone` char(15) NOT NULL,
  `receipent_address` text NOT NULL,
  `total_payment` float NOT NULL,
  `order_status` enum('Masuk','Diproses','Diantar','Diterima') NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `receipent_name`, `receipent_phone`, `receipent_address`, `total_payment`, `order_status`, `order_date`) VALUES
(51, 6, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 309700, 'Diproses', '2020-12-19 05:56:37'),
(52, 6, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 35000, 'Diproses', '2020-12-20 10:30:51'),
(53, 6, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 35000, 'Masuk', '2020-12-21 01:28:14'),
(54, 6, 'Muhammad Kuswari', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 2150000, 'Masuk', '2020-12-21 05:43:41'),
(55, 6, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 325000, 'Diterima', '2021-02-21 01:27:41'),
(56, 6, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 150000, 'Masuk', '2021-02-22 02:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `oder_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `total_price` float NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`oder_details_id`, `order_id`, `item_id`, `qty`, `total_price`, `date_order`) VALUES
(27, 51, 6, 1, 19700, '2020-12-19 05:56:03'),
(28, 51, 13, 1, 290000, '2020-12-19 05:56:03'),
(29, 52, 16, 1, 35000, '2020-12-19 06:03:46'),
(30, 53, 16, 1, 35000, '2020-12-21 01:28:14'),
(31, 54, 4, 2, 650000, '2020-12-21 05:43:41'),
(32, 54, 5, 2, 1500000, '2020-12-21 05:43:41'),
(33, 55, 4, 1, 325000, '2021-02-21 01:25:43'),
(34, 56, 3, 1, 150000, '2021-02-22 02:02:10');

--
-- Triggers `order_details`
--
DELIMITER $$
CREATE TRIGGER `trigger_qty` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
	UPDATE items SET stock = stock-NEW.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `cost_for_cat` float NOT NULL,
  `cost_for_dog` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `name`, `slug`, `description`, `cost_for_cat`, `cost_for_dog`, `created_at`) VALUES
(12, 'Mandi Lengkap', 'mandi-lengkap', '', 50000, 80000, '2020-12-19 05:33:05'),
(13, 'Mandi Hewan Berjamur', 'mandi-hewan-berjamur', '', 60000, 85000, '2020-12-19 05:33:27'),
(14, 'Mandi Biasa', 'mandi-biasa', '', 40000, 60000, '2020-12-19 05:33:45'),
(15, 'Mandi Hewan berkutu', 'mandi-hewan-berkutu', '', 65000, 70000, '2020-12-19 05:35:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `groomings`
--
ALTER TABLE `groomings`
  ADD PRIMARY KEY (`grooming_id`),
  ADD KEY `type_id` (`package_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`oder_details_id`),
  ADD KEY `oder_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groomings`
--
ALTER TABLE `groomings`
  MODIFY `grooming_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `oder_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groomings`
--
ALTER TABLE `groomings`
  ADD CONSTRAINT `groomings_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groomings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
