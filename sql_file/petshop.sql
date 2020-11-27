-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 06:07 AM
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
(1, 'Muhammad Kuswari', 'default.jpg', 'muh.kuswari10@gmail.com', '$2y$10$RShFAbcAZ7rBD78TQHdc1uzQi09u3RtMf0xQWcHK1YIin/NQ1mIq.', 'Admin', 1, '2020-11-25 05:58:14');

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
(1, 'Muhammad Kuswari', 'default.jpg', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram.', 'muhammad.kuswari10@gmail.com', '$2y$10$skkNuX9u8KOWRXRDiBWIbOKioPgPHfYQM3edkL1y0HmLizs.Wixq2', 1, '2020-11-26 01:06:57');

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
  `grooming_status` enum('Diterima','Diproses','Selesai') NOT NULL,
  `package_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_finished` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groomings`
--

INSERT INTO `groomings` (`grooming_id`, `customer_name`, `customer_phone`, `customer_address`, `pet_type`, `grooming_status`, `package_id`, `notes`, `date_created`, `date_finished`) VALUES
(3, 'Muhammad Kuswari', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram.', 'Kucing', 'Diterima', 3, 'Lakukan dengan hati-hati karena ini kucing kesayangan saya', 1605505945, 0);

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
(2, 'Whiskas Junior 1,1 Kg makanan kucing', 'whiskas-junior-1,1-kg-makanan-kucing', '1605482081341.jpeg', 12, 65000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacinia, dui eu fermentum scelerisque, lectus enim sollicitudin urna, vel ultrices felis ipsum at velit. Cras hendrerit tellus et sodales venenatis. Sed ullamcorper dui id velit rutrum, at venenatis leo pretium. Aenean dictum nisi quis sem aliquet auctor.', 37, '2020-11-26 22:44:45'),
(3, 'Kandang Kucing model minimalis', 'kandang-kucing-model-minimalis', '1605519450652.jpeg', 12, 150000, 'Langsung dari pengrajin ????, Menggunakan kayu solid buka serbuk kayu sehingga tidak mudah lapuk dan awet ????, ✅ Seluruh foto di sini ASLI milik kami', 38, '2020-11-26 22:46:56'),
(4, 'Kandang Kucing 80cm Tingkat 2', 'kandang-kucing-80cm-tingkat-2', '1605519640184.jpeg', 5, 325000, 'Kandang kucing 80 cm 2 tingkat, dimensi 80x50x50, pintu atas bawah dan samping untuk litter box, warna hitam ready, Cat powder coating anti karat,', 38, '0000-00-00 00:00:00'),
(5, 'Jual Kucing persia anakan umur 2 bulan', 'jual-kucing-persia-anakan-umur-2-bulan', '1605519915190.jpg', 1, 750000, 'kucing persia anakang umur 2 bulan. kucing persia anakang umur 2 bulan order sepasang harga 800rb', 40, '0000-00-00 00:00:00'),
(6, 'Bolt 1Kg Tuna Ikan - Makanan Kucing Murah', 'bolt-1kg-tuna-ikan---makanan-kucing-murah', '1605520083844.jpg', 99, 19700, 'Jual Bolt 1Kg Tuna Ikan - Makanan Kucing Murah - Repack - Cat Food dengan harga Rp19.700 dari toko online', 37, '0000-00-00 00:00:00'),
(7, 'Tokopedia Jual Pakan Kucing Me-o Meo Tuna 1.2 Kg', 'tokopedia-jual-pakan-kucing-me-o-meo-tuna-1.2-kg', '1605520258517.jpg', 80, 54000, 'Jual Pakan Kucing Me-o Meo Tuna 1.2 Kg dengan harga Rp54.000 . termurah', 37, '0000-00-00 00:00:00'),
(12, 'Felibite makanan kucing bentuk ikan kemasan 1 kg', 'felibite-makanan-kucing-bentuk-ikan-kemasan-1-kg', '1605565403891.jpeg', 88, 67000, 'Belanja Felibite Bentuk IKAN Makanan Kucing Kemasan 1kg indonesia Murah - Belanja Makanan Kering di Lazada. FREE ONGKIR &amp; Bisa COD', 37, '0000-00-00 00:00:00'),
(13, 'Jual kucing bar bar', 'jual-kucing-bar-bar', '1605565534933.jpg', 1, 290000, 'Jual kucing bar bar, sangat lincah. alasan jual karena mukanya ngeselin, pengen ngajak gelud tiap liat mukanya', 40, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(128) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `receipents_address` text NOT NULL,
  `order_status` enum('Masuk','Diproses','Diantar','Diterima') NOT NULL,
  `data_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `cost` float NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `name`, `slug`, `cost`, `date_created`) VALUES
(3, 'Mandi Biasa', 'mandi-biasa', 67000, 1605501559),
(4, 'Mandi Lengkap', 'mandi-lengkap', 80000, 1605501421);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
  ADD KEY `type_id` (`package_id`);

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
  ADD KEY `user_id` (`customer_id`),
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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groomings`
--
ALTER TABLE `groomings`
  MODIFY `grooming_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groomings`
--
ALTER TABLE `groomings`
  ADD CONSTRAINT `groomings_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
