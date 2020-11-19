-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2020 at 12:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

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
(36, 'Aksesoris', 'aksesoris', '1605481206523.jpg'),
(37, 'Makanan', 'makanan', '1605481281645.jpg'),
(38, 'Kandang', 'kandang', '1605481292032.jpg'),
(40, 'Hewan Peliharaan', 'hewan-peliharaan', '1605483254673.jpg');

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
  `date_created` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `slug`, `images`, `stock`, `price`, `description`, `category_id`, `date_created`, `date_updated`) VALUES
(2, 'Whiskas Junior 1,1 Kg makanan kucing', 'whiskas-junior-1,1-kg-makanan-kucing', '1605482081341.jpeg', 40, 65000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacinia, dui eu fermentum scelerisque, lectus enim sollicitudin urna, vel ultrices felis ipsum at velit. Cras hendrerit tellus et sodales venenatis. Sed ullamcorper dui id velit rutrum, at venenatis leo pretium. Aenean dictum nisi quis sem aliquet auctor.', 37, 1605482081, 0),
(3, 'Kandang Kucing Model minimalis', 'kandang-kucing-model-minimalis', '1605519450652.jpeg', 12, 150000, 'Langsung dari pengrajin ????, Menggunakan kayu solid buka serbuk kayu sehingga tidak mudah lapuk dan awet ????, ✅ Seluruh foto di sini ASLI milik kami', 38, 1605519450, 0),
(4, 'Kandang Kucing 80cm Tingkat 2', 'kandang-kucing-80cm-tingkat-2', '1605519640184.jpeg', 5, 325000, 'Kandang kucing 80 cm 2 tingkat, dimensi 80x50x50, pintu atas bawah dan samping untuk litter box, warna hitam ready, Cat powder coating anti karat,', 38, 1605519640, 0),
(5, 'Jual Kucing persia anakan umur 2 bulan', 'jual-kucing-persia-anakan-umur-2-bulan', '1605519915190.jpg', 1, 750000, 'kucing persia anakang umur 2 bulan. kucing persia anakang umur 2 bulan order sepasang harga 800rb', 40, 1605519915, 0),
(6, 'Bolt 1Kg Tuna Ikan - Makanan Kucing Murah', 'bolt-1kg-tuna-ikan---makanan-kucing-murah', '1605520083844.jpg', 99, 19700, 'Jual Bolt 1Kg Tuna Ikan - Makanan Kucing Murah - Repack - Cat Food dengan harga Rp19.700 dari toko online', 37, 1605520083, 0),
(7, 'Tokopedia Jual Pakan Kucing Me-o Meo Tuna 1.2 Kg', 'tokopedia-jual-pakan-kucing-me-o-meo-tuna-1.2-kg', '1605520258517.jpg', 80, 54000, 'Jual Pakan Kucing Me-o Meo Tuna 1.2 Kg dengan harga Rp54.000 . termurah', 37, 1605520258, 0),
(8, 'Aksesoris Kalung Kucing murah', 'aksesoris-kalung-kucing-murah', '1605520456066.jpeg', 100, 25000, 'Aksesoris Hewan: Kalung Kucing/Anjing Quick Release Bahan PU Tahan Lama', 36, 1605520456, 0),
(9, 'Baju kucing lucu', 'baju-kucing-lucu', '1605520589549.jpeg', 111, 87000, 'Jual baju kucing imut lucu untuk si kucing tampil iimut dan menggemaskan', 36, 1605520589, 0),
(10, 'Happy Cat 1.4 Kg Makanan kucing junior', 'happy-cat-1.4-kg-makanan-kucing-junior', '1605565201194.jpg', 500, 195000, 'Happy Cat Makanan Kucing merupakan makanan ideal untuk anak kucing yang terbuat dari bahan-bahan pilihan berkualitas.', 37, 1605565201, 0),
(11, 'Meo Seafood 1.2 Kg Makanan kucing dewasa', 'meo-seafood-1.2-kg-makanan-kucing-dewasa', '1605565295596.jpg', 99, 87000, 'Meo Seafood 1,2 kg/ Cat Food - Makanan Kucing Dewasa. Me-O Adult Seafood dengan kandungan nutrisi lengkapnya. Me-O Adult', 37, 1605565295, 0),
(12, 'Felibite makanan kucing bentuk ikan kemasan 1 kg', 'felibite-makanan-kucing-bentuk-ikan-kemasan-1-kg', '1605565403891.jpeg', 88, 67000, 'Belanja Felibite Bentuk IKAN Makanan Kucing Kemasan 1kg indonesia Murah - Belanja Makanan Kering di Lazada. FREE ONGKIR &amp; Bisa COD', 37, 1605565403, 0),
(13, 'Jual kucing bar bar', 'jual-kucing-bar-bar', '1605565534933.jpg', 1, 290000, 'Jual kucing bar bar, sangat lincah. alasan jual karena mukanya ngeselin, pengen ngajak gelud tiap liat mukanya', 40, 1605565534, 0),
(14, 'Jual kucing beban keluarga', 'jual-kucing-beban-keluarga', '1605565853011.jpg', 1, 605000, 'Jual cepat kucing beban keluarga, alasan jual ya liat aja mukanya, gak pernah senang, macam mau sekarat aja. Jual cepaat bos.. beli atau ku pecahkan ginjal kalian?', 40, 1605565853, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Staff'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone` char(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `nickname`, `avatar`, `phone`, `address`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Muhammad Kuswari', 'kuswari', 'default.jpg', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram.', 'muh.kuswari10@gmail.com', '$2y$10$RShFAbcAZ7rBD78TQHdc1uzQi09u3RtMf0xQWcHK1YIin/NQ1mIq.', 1, 1, 1605358045),
(14, 'Jevi Wardani', 'jevi', '1605509865893.jpeg', '081913526525', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram.', 'jeviwardani10@gmail.com', '$2y$10$aqzB/ILHwifMTzbG6xdJze7qJk7XO4lC/LIbsEapoI7EpbkJDXCGe', 2, 1, 1605480952),
(16, 'Siti Rohani', 'rohani', 'default.jpg', '082342871211', 'Karangayar, Mamben Lauk, Kecamatan, Wanasaba.', 'sitirohani10@gmail.com', '$2y$10$qiyXeE.mHQ56IuD/3CFr3OCLa024whDy83DiA5L46A.excwumyvy2', 3, 1, 1605566869),
(17, 'Ulul Azmi', 'azmi', 'default.jpg', '081929381721', 'Perampuan, Labuapi', 'ululazmi@gmail.com', '$2y$10$nPL35mkK28EFFD.l8sUDS.qIsnKJW.1W3iACEavbopT3gH/az7GPe', 3, 1, 1605600051);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `groomings`
--
ALTER TABLE `groomings`
  MODIFY `grooming_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
