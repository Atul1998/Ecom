-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql208.epizy.com
-- Generation Time: Sep 08, 2020 at 03:04 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25807295_ecomphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Atul', 'Kumar', 'atul@gmail.com', '94ea3fb888604714f2a166b457e8b277');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'chola'),
(12, 'Mobile'),
(13, 'Kurties'),
(15, 'wifi'),
(17, 'Dal'),
(19, 'Cold');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(4, 26, '1', 4, '500'),
(5, 31, '1', 5, '50'),
(6, 31, '1', 6, '50'),
(7, 26, '1', 7, '500'),
(8, 26, '1', 8, '500'),
(9, 31, '10', 9, '50'),
(10, 25, '1', 10, '7000'),
(11, 31, '1', 11, '50'),
(12, 31, '1', 12, '50'),
(13, 26, '1', 12, '500'),
(14, 25, '1', 12, '7000'),
(15, 25, '1', 13, '7000'),
(16, 26, '1', 14, '500'),
(17, 26, '1', 16, '500'),
(18, 25, '1', 17, '7000'),
(19, 34, '1', 18, '7000');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(4, 1, '500', 'Cancelled', 'Cash On Delivery', '2020-05-17 23:46:59'),
(5, 1, '50', 'Cancelled', 'Cash On Delivery', '2020-05-18 00:01:19'),
(6, 1, '50', 'Order Placed', 'Cash On Delivery', '2020-05-18 01:59:13'),
(7, 1, '500', 'Order Placed', 'Cash On Delivery', '2020-05-18 02:46:46'),
(8, 1, '500', 'Order Placed', 'Cash On Delivery', '2020-05-18 02:47:35'),
(9, 1, '500', 'In Progress', 'Cash On Delivery', '2020-05-18 16:29:36'),
(10, 2, '7000', 'Order Placed', 'Cash On Delivery', '2020-05-18 18:36:10'),
(11, 2, '50', 'In Progress', 'Cash On Delivery', '2020-05-18 18:50:24'),
(12, 2, '7550', 'Order Placed', 'Cash On Delivery', '2020-05-18 21:07:15'),
(13, 1, '7000', 'Order Placed', 'Cash On Delivery', '2020-05-19 11:55:07'),
(14, 1, '500', 'Order Placed', 'Cash On Delivery', '2020-05-23 20:52:10'),
(15, 3, '0', 'Cancelled', 'Cash On Delivery', '2020-05-23 22:38:58'),
(16, 3, '500', 'Order Placed', 'Cash On Delivery', '2020-05-23 22:56:49'),
(17, 3, '7000', 'Order Placed', 'Cash On Delivery', '2020-05-27 12:22:38'),
(18, 3, '7000', 'Order Placed', 'Cash On Delivery', '2020-06-09 12:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `ordertracking`
--

CREATE TABLE `ordertracking` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertracking`
--

INSERT INTO `ordertracking` (`id`, `orderid`, `status`, `message`, `timestamp`) VALUES
(1, 4, 'Cancelled', ' ', '2020-05-18 02:29:47'),
(2, 5, 'Cancelled', ' No reasion', '2020-05-18 16:32:08'),
(3, 9, 'In Progress', ' In Progress', '2020-05-18 16:57:20'),
(4, 11, 'In Progress', ' It is in progress\r\n', '2020-05-18 18:52:40'),
(5, 15, 'Cancelled', ' no order', '2020-05-23 22:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `catid`, `price`, `thumb`, `description`) VALUES
(25, 'Realme 5i (Forest Green, 64 GB)', 12, '7000', 'uploads/realme-5i-rmx2030-original-imafnsx5bj4yqhas.jpeg', 'nice phone'),
(26, 'Kurti With full shleves', 13, '500', 'uploads/Kurties-For-Casual-Wear-SDL021961708-1-cfed4.jpg', 'Long Kurti in red color made with cotton '),
(34, 'mobile', 12, '7000', 'uploads/realme-c3-rmx2027-original-imafzkzhaehetxhh.jpeg', 'mobile'),
(36, 'All', 4, '1000', 'uploads/The-future-of-restaurant-delivery.jpg', 'All'),
(37, 'kaju', 4, '500', 'uploads/The-future-of-restaurant-delivery.jpg', 'kaju');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `pid`, `uid`, `review`, `timestamp`) VALUES
(1, 26, 1, 'Nice one', '2020-05-19 03:49:44'),
(2, 25, 1, 'Good phone with best', '2020-05-19 17:01:27'),
(3, 25, 1, 'Good phone with best quality', '2020-05-19 17:02:26'),
(4, 25, 1, 'Good phone with best quality', '2020-05-19 17:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `thumb`) VALUES
(1, 'Best products at low prices', 'image/Banner2.jpg'),
(2, 'Best products at low prices', 'image/Main-Banner2.jpg'),
(3, 'Best products at low prices', 'image/Main-Banner3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `timestamp`) VALUES
(1, 'kumar@gmail.com', '$2y$10$1H0ynQaBHGRE6hEBg.CjveSOZw8QTaOOOBkNfw9H8yuqtM3ERFsLm', '2020-05-17 02:43:30'),
(2, 'test@gmail.com', '$2y$10$rr2XxMB.fsV33Ta5AR1fXe9hZcL7HvZEZcBp10JjUTZJyK.6Y9ftm', '2020-05-18 18:32:56'),
(3, 'Atul@gmail.com', '$2y$10$ga/DWiTiSWojNOGX4fcgY.orGfBSRjhhg9BiGKx/d/AeAxDxjpby6', '2020-05-23 22:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `usersmeta`
--

CREATE TABLE `usersmeta` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersmeta`
--

INSERT INTO `usersmeta` (`id`, `uid`, `firstname`, `lastname`, `company`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `mobile`) VALUES
(1, 1, 'Atul', 'Kumar', 'KIET', 'ghaziabad u.p', 'Ghaziabad', 'ghaziabad', 'Uttar Pradesh', 'AX', '201206', '08543834268'),
(2, 2, '1234', 'Kumar', 'KIET', 'BASTI', 'Block road', 'Basti', 'U.P', 'AX', '201206', '08543834268'),
(3, 3, 'Atul', 'Kumar', 'KIET Group of Institutions', 'ghaziabad u.p', 'Block road', 'ghaziabad', 'Uttar Pradesh', '', '201206', '08543834268');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `uid`, `timestamp`) VALUES
(1, 26, 1, '2020-05-20 02:37:18'),
(3, 25, 1, '2020-05-20 19:46:52'),
(4, 25, 3, '2020-05-24 03:47:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertracking`
--
ALTER TABLE `ordertracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersmeta`
--
ALTER TABLE `usersmeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ordertracking`
--
ALTER TABLE `ordertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usersmeta`
--
ALTER TABLE `usersmeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
