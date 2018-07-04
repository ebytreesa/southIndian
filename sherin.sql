-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 08:30 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sherin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `kitchen_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `quantity`, `price`, `kitchen_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 6, 66, 1, '2018-05-30 20:57:03', '0000-00-00 00:00:00'),
(3, 0, 1, 4, 50, 0, '2018-05-31 09:48:23', '0000-00-00 00:00:00'),
(4, 0, 2, 9, 10, 0, '2018-05-31 09:48:24', '0000-00-00 00:00:00'),
(5, 0, 1, 1, 50, 2, '2018-05-31 10:05:54', '2018-05-31 10:05:54'),
(6, 0, 2, 1, 10, 2, '2018-05-31 10:05:54', '2018-05-31 10:05:54'),
(7, 0, 1, 2, 50, 2, '2018-05-31 10:08:05', '2018-05-31 10:08:05'),
(8, 0, 2, 1, 10, 2, '2018-05-31 10:09:10', '2018-05-31 10:09:10'),
(9, 0, 2, 1, 10, 2, '2018-05-31 10:11:33', '2018-05-31 10:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(4, '2018-03-05 11:16:02', '2018-03-05 10:16:02', 'Deserts'),
(5, '2018-03-05 11:15:25', '2018-03-05 10:15:25', 'Non-Veg'),
(6, '2018-03-05 12:27:51', '2018-03-05 10:15:38', 'Veg');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Aarhus', '2018-03-05 10:37:55', '2018-03-05 09:37:55'),
(3, 'Viborg', '2018-03-05 10:44:14', '2018-03-05 09:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ciry_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `created_at`, `updated_at`, `name`, `user_id`, `ciry_id`, `cat_id`, `description`, `price`, `image`, `votes`) VALUES
(1, '2018-05-23 12:23:58', '2018-03-26 13:30:03', 'Pancake', 2, 0, 4, 'gdfgdfhghhf', '50', 'e183be217d72de6b4c596905a68dfbf5', 2),
(2, '2018-03-26 16:10:16', '2018-03-26 14:10:16', 'vanilla cake', 2, 0, 4, 'fgegt', '10', 'fc6b2ec7c6c9a91e764feca7258e1080', 0),
(32, '2017-11-08 14:02:19', '2017-11-08 13:02:19', 'chilli chicken', 3, 0, 6, 'chicken chilli recipe bgh<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\nadded chilli- 50g', '0', '8b8f7a8ede6b431a96b7bb2a1330d7ba', 1),
(33, '2018-03-05 12:28:53', '2017-04-27 07:13:33', 'egg roll', 4, 0, 5, 'egg roll recipe bgh', '0', 'f42d16f73cfead4a206a1029bdde35ff', 0),
(39, '2018-03-05 12:28:58', '2017-04-27 07:14:07', 'fruit salad', 4, 0, 6, 'fbygvrhtkhjsklghjgfh', '0', '9ccceb101c026e6faba00960b1ee4875', 0),
(42, '2017-04-27 09:29:29', '2017-04-27 09:29:29', 'brown bread', 6, 0, 4, 'gfdrhdurdytyikd', '0', 'e6d645c310b9d3aaf48d570bb2d60d94', 0),
(48, '2018-03-26 16:11:47', '2018-03-26 14:11:47', 'ghghjhhh', 2, 0, 6, 'gykgh', '888', 'a1f2a44c7fc997393cc81c2cc8ca53e7', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `kitchen_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` int(11) NOT NULL,
  `order_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `created_at`, `updated_at`, `image`) VALUES
(4, '2018-03-08 20:06:54', '2018-03-08 19:06:54', 'd56aa1f5ac20d0c09c59771c612604ad'),
(5, '2018-03-08 20:06:38', '2018-03-08 19:06:38', 'eee832ccab6bc1406e672e5e0aaee3e8'),
(6, '2018-03-08 20:07:06', '2018-03-08 19:07:06', 'd660fdb05d25e5e7b6666896798cac2f');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `username`, `password`, `email`, `remember_token`, `role`, `image`, `address`, `city`) VALUES
(2, '2018-04-20 10:23:56', '2018-04-20 08:23:56', 'eby', '$2y$10$P9dbizJc394NWRBWwGWsGOVLZHaSg40NdaknZLS6TPJvlV2pzdD/C', 'sanmohan24@gmail.com', 'l3n8tlTZqm3zSDU6kroElC93EDHhOVDL9wET5D4DX58VGhujsSU1tem5xLeG', 0, '48f47eb8c39039e54550630d09abb82e', '', 'viborg'),
(3, '2018-04-16 09:54:18', '2017-11-16 11:56:20', 'mads', '$2y$10$.yHJ9cdeuVEJvzr.vrEoleMTlvKmBt0YfKzqguGbhM672TXJWl5dS', 'mads@m.dk', 'RukI2zVUwVcLGP1Aaa5kSVvomXLH3ACLoPIXLEcEOVTJY0i2VwK0CO1ya6BO', 0, '', '', 'viborg'),
(4, '2018-04-16 09:54:32', '2017-09-22 05:12:05', 'kasper', '$2y$10$nfz28ZqSu14hZTGq0mrkbeOKxTdPIJz15ldJZUu46iukoEGxvyslW', 'k@k.dk', '3KdaxLC9e0ISQ4iXUCxFfsjz4opFWH8g1QLNFBi36jjZBg3N91mix84SlSb5', 0, '', '', 'aarhus'),
(5, '2018-03-05 09:47:44', '2017-04-27 07:17:29', 'dennis', '$2y$10$NqFwop6vePP.phlrORlcX.OGSWRbBtNkjFMxlXaeogCe/JqEEjCOG', 'd@d.dk', '6rqOxEqHs9zKcHR6BsWnXPL9k4vYpoZ1HX7f2R30WCF7o6TheRSRAK5lCgMz', 0, '', '', ''),
(33, '2018-04-01 19:40:57', '2018-04-01 17:40:57', 'admin', '$2y$10$SC3KdtpxEmxT7iqQY.tUd..pVLnu3faECx4oR0GfhDh46d6F4ng/.', 'sanmohan24@gmail.com', 'VnkaGzUL4rY1d4h5PHFQAQnD5UnddP67bPWFtTdB25UQxWoa8zcpY4EstyrV', 1, '', '', ''),
(35, '2017-11-16 13:43:02', '2017-11-16 12:43:02', 'Sherin', '$2y$10$3H99.IjoBQ6bs7tCBAmAnu1epWezzlQpMGh8Umm89Ba.3J5OAfA1q', 'sherin@email.com', '', 1, '', '', 'Copenhangen'),
(36, '2018-03-08 21:36:16', '2018-03-08 20:36:16', 'apple', '$2y$10$50zMOzklG/4UmFJytqd5MO2k3s7EDyv3n8lscEax2L.v9shYPCGr.', 'sanmohan24@gmail.com', 'swCdXU7ZwrkqTfKyfUNbwrTwBC8ObzuhtSqCwiDPGkN6Rolo9fq9t4AT1TMq', 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
