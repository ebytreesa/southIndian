-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 06:42 AM
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
  `cat_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `created_at`, `updated_at`, `name`, `user_id`, `cat_id`, `description`, `price`, `image`, `votes`) VALUES
(1, '2018-03-05 12:28:41', '2017-11-08 13:11:18', 'Pancake', 2, 4, 'gdfgdfhghhf', '0', '748d640a4c1208365887eed1eec5a25e', 2),
(2, '2018-03-05 12:28:48', '2017-04-25 06:51:31', 'vanilla cake', 2, 5, 'fgegt', '0', 'd3f89066e664a346711da48c63fea797', 0),
(32, '2017-11-08 14:02:19', '2017-11-08 13:02:19', 'chilli chicken', 3, 6, 'chicken chilli recipe bgh<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\nadded chilli- 50g', '0', '8b8f7a8ede6b431a96b7bb2a1330d7ba', 1),
(33, '2018-03-05 12:28:53', '2017-04-27 07:13:33', 'egg roll', 4, 5, 'egg roll recipe bgh', '0', 'f42d16f73cfead4a206a1029bdde35ff', 0),
(39, '2018-03-05 12:28:58', '2017-04-27 07:14:07', 'fruit salad', 4, 6, 'fbygvrhtkhjsklghjgfh', '0', '9ccceb101c026e6faba00960b1ee4875', 0),
(42, '2017-04-27 09:29:29', '2017-04-27 09:29:29', 'brown bread', 6, 4, 'gfdrhdurdytyikd', '0', 'e6d645c310b9d3aaf48d570bb2d60d94', 0),
(48, '2018-03-08 10:30:52', '2018-03-08 09:30:52', 'ghghjhhh', 2, 4, 'gykgh', '888', '5186971a0f79ddd3a8f8d27ab1375da3', 0);

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
  `city` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `username`, `password`, `email`, `remember_token`, `role`, `image`, `city`) VALUES
(2, '2018-03-08 20:12:53', '2018-03-08 19:12:53', 'eby', '$2y$10$P9dbizJc394NWRBWwGWsGOVLZHaSg40NdaknZLS6TPJvlV2pzdD/C', 'eby@eby.com', 'ZLMtHgVOQgZN6aCEsBHXvmqOqsnb3p6XswSIAuionCKPyPiQpcnZDa4MZBMB', 0, '', ''),
(3, '2018-03-05 09:47:59', '2017-11-16 11:56:20', 'mads', '$2y$10$.yHJ9cdeuVEJvzr.vrEoleMTlvKmBt0YfKzqguGbhM672TXJWl5dS', 'mads@m.dk', 'RukI2zVUwVcLGP1Aaa5kSVvomXLH3ACLoPIXLEcEOVTJY0i2VwK0CO1ya6BO', 0, '', ''),
(4, '2018-03-05 09:47:50', '2017-09-22 05:12:05', 'kasper', '$2y$10$nfz28ZqSu14hZTGq0mrkbeOKxTdPIJz15ldJZUu46iukoEGxvyslW', 'k@k.dk', '3KdaxLC9e0ISQ4iXUCxFfsjz4opFWH8g1QLNFBi36jjZBg3N91mix84SlSb5', 0, '', ''),
(5, '2018-03-05 09:47:44', '2017-04-27 07:17:29', 'dennis', '$2y$10$NqFwop6vePP.phlrORlcX.OGSWRbBtNkjFMxlXaeogCe/JqEEjCOG', 'd@d.dk', '6rqOxEqHs9zKcHR6BsWnXPL9k4vYpoZ1HX7f2R30WCF7o6TheRSRAK5lCgMz', 0, '', ''),
(33, '2018-03-08 20:07:38', '2018-03-08 19:07:38', 'admin', '$2y$10$SC3KdtpxEmxT7iqQY.tUd..pVLnu3faECx4oR0GfhDh46d6F4ng/.', 'sanmohan24@gmail.com', '6K5cC8kcaHxPiWG8u8d5JXur2JeqfwIyWeZs0B3mHXEaCVq2QHycAqNPRK7x', 1, '', ''),
(35, '2017-11-16 13:43:02', '2017-11-16 12:43:02', 'Sherin', '$2y$10$3H99.IjoBQ6bs7tCBAmAnu1epWezzlQpMGh8Umm89Ba.3J5OAfA1q', 'sherin@email.com', '', 1, '', 'Copenhangen'),
(36, '2018-03-08 21:36:16', '2018-03-08 20:36:16', 'apple', '$2y$10$50zMOzklG/4UmFJytqd5MO2k3s7EDyv3n8lscEax2L.v9shYPCGr.', 'sanmohan24@gmail.com', 'swCdXU7ZwrkqTfKyfUNbwrTwBC8ObzuhtSqCwiDPGkN6Rolo9fq9t4AT1TMq', 0, '', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
