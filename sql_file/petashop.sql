-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2020 at 02:47 PM
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
-- Database: `petashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Staff'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `avatar` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Muhammad Kuswari', 'muh.kuswari10@gmail.com', 'default.jpg', '$2y$10$LeAFClAKNMhgVpY5m.Xwa.Sc0H69b1BIgo32/I0qvVndwpdbcxWya', 1, 1, 1603352147),
(5, 'Jevi Wardani', 'jevi.wardani10@gmail.com', 'default.jpg', '$2y$10$kjmeP4ZmBn8CItv4UsyJSeEVFjwgKUJJxlIkE0ALvJ5BT7vRQ9Q4u', 3, 1, 1603352162),
(6, 'Mia Mubiatna', 'mubiatnamia@gmail.com', 'default.jpg', '$2y$10$tP3c4QAc/MCnMgxCl0gut.ycRo7J2nSaT6/Fi7qMxyH/.NN.OU7CC', 2, 1, 1603352190),
(10, 'Hana Ramdhani', 'hanaramdhani@gmail.com', 'worker.png', '$2y$10$G73QQUDdcQd0ru4JFZWkw.evggj5fIm4itHa9zyKeBPnwtdZEhB2O', 2, 1, 1604409843),
(11, 'Muhammad Kuswari', 'muhammad.kuswari10@gmail.com', 'top-15-advantages-of-internet-marketing-for-your-business-1.jpg', '$2y$10$r4fOW9FwvkSyip6T8pMGwe3ZDtdR17n0pFWyIXUGXODFmrzNRmzAm', 3, 1, 1604410331);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
