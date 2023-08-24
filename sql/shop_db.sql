-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 07:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header_icon`
--

CREATE TABLE `header_icon` (
  `id` int(20) NOT NULL,
  `icon_name` varchar(30) NOT NULL,
  `icon_url` varchar(200) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_icon`
--

INSERT INTO `header_icon` (`id`, `icon_name`, `icon_url`, `class_name`) VALUES
(1, 'twitter', 'twitter.com', 'twitter'),
(2, 'whatsapp', 'whatsapp.com', 'whatsapp'),
(3, 'facebook', 'facebook.com', 'facebook'),
(4, 'linkedin', 'linkedin.com', 'linkedin'),
(5, 'instagram', 'instagram.com', 'instagram');

-- --------------------------------------------------------

--
-- Table structure for table `header_menu`
--

CREATE TABLE `header_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `url` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_menu`
--

INSERT INTO `header_menu` (`id`, `menu_name`, `url`, `status`) VALUES
(1, 'home', 'home.php', 1),
(2, 'about', 'about.php', 1),
(3, 'shop', 'shop.php', 1),
(4, 'contact', 'contact.php', 1),
(5, 'orders', 'orders.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 1, 'tusty', 'tusty@gmail.com', '0183737331', 'have  a nice day.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 0, 'Tusty datta', '0183737331', 'tustydatta9@gmail.com', 'cash on delivery', 'Dhaka, Bangladesh', 'ghost(2), night(3)', 50, '14 June, 2023', 'completed'),
(3, 1, 'ratry', '21520', 'ratry@gmail.com', 'cash on delivery', 'Dhaka, Bangladesh', 'ghost(2), horror(5)', 46, '4 June, 2023', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(19, 'six', 882, 'six of crows.jpg'),
(20, 'water', 750, 'water seeker.jpg'),
(21, 'dark', 677, 'dark ghost.jpg'),
(22, 'woods', 777, 'woods.jpg'),
(23, 'spell rowans', 677, 'spell rowans.jpg'),
(24, 'no place', 566, 'no place like here.jpg'),
(25, 'motherhood', 777, 'motherhood.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'tusty datta', 'tustydatta9@gmail.com', '202', 'user'),
(8, 'admin', 'admin@gamil.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(9, 'ratry', 'ratry@gmail.com', '7d04bbbe5494ae9d2f5a76aa1c00fa2f', 'user'),
(10, 'admin01', 'admin01@gamil.com', 'c6f057b86584942e415435ffb1fa93d4', 'admin'),
(11, 'user01', 'user01@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', 'user'),
(12, 'Apou Datto', 'apoudatto6@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(13, 'Apou Datto', 'apoudatta6@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(14, 'Apou Datto', 'apoudatto@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(15, 'Apou Datto', 'apoudatto6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(16, 'Apou Datto', 'apdatto6@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_icon`
--
ALTER TABLE `header_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_menu`
--
ALTER TABLE `header_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_icon`
--
ALTER TABLE `header_icon`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `header_menu`
--
ALTER TABLE `header_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
