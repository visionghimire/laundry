-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 09:17 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `service_type` varchar(200) NOT NULL,
  `unit` float NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `trackingcode` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pickupdate` date NOT NULL,
  `timeslot` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `type`, `service_type`, `unit`, `price`, `total`, `trackingcode`, `fullname`, `email`, `phone`, `pickupdate`, `timeslot`, `address`, `city`, `status`, `created_at`) VALUES
(2, 1, 'Wash and Fold', 2, 30, 60, '16373926111', 'khagendra niroula', 'admin@admin.com', '9842789482', '2021-11-23', '9AM-12PM', 'anamnagar', 'ktm', 4, '2021-11-20 13:01:51'),
(3, 3, 'Wash and Fold', 2, 25, 50, '16373926742', 'khagendra niroula', 'admin@admin.com', '9842789482', '2021-11-25', '9AM-12PM', 'anamnagar', 'ktm', 2, '2021-11-20 13:02:54'),
(4, 1, 'Wash and Fold', 2, 30, 60, '16373927633', 'khagendra niroula', 'admin@admin.com', '9842789482', '2021-11-27', '9AM-12PM', 'anamnagar', 'ktm', 3, '2021-11-20 13:04:23'),
(5, 4, 'Wash and Iron', 5, 100, 500, '16373928454', 'vision ghimire', 'admin@admin.com', '15181615', '2021-11-20', '12PM-3PM', 'hvhgcg', 'ktm', 4, '2021-11-20 13:05:45'),
(6, 3, 'Wash and Fold', 2.6, 25, 65, '16374051555', 'asdfasd', 'admin@admin.com', '54345', '2021-11-26', '9AM-12PM', 'dfgdfg', 'dfhdfh', 0, '2021-11-20 16:30:55'),
(7, 4, 'Wash and Fold', 10.3, 100, 1030, '16374093496', 'asfasdf', 'admin@admin.com', '343333', '2021-11-24', '9AM-12PM', 'sdfsdf', 'sdfsd', 1, '2021-11-20 17:40:49'),
(8, 3, 'Wash and Fold', 5, 25, 125, '16375547307', 'Mel Pinto', 'admin@admin.com', '9668563256', '2021-11-23', '12PM-3PM', 'philippines', 'manila', 4, '2021-11-22 10:03:50'),
(9, 1, 'Wash and Fold', 2, 30, 60, '16375557358', 'Lance Asturis', 'admin@admin.com', '9865475632', '2021-11-30', '3PM-6PM', 'Pearl Manila', 'Manila', 4, '2021-11-22 10:20:35'),
(10, 3, 'Wash and Iron', 6, 25, 150, '16376023549', 'Kalson Karki', 'admin@admin.com', '9845632154', '2021-11-22', '12PM-3PM', 'kapan', 'kathmandu', 3, '2021-11-22 23:17:36'),
(11, 4, 'Wash and Fold', 5, 100, 500, '16417909729', 'Lucky Trevor', 'trevor@gmail.com', '112233445566', '2022-01-11', '3PM-6PM', '268 Manila', 'Manila', 4, '2022-01-10 10:47:53'),
(12, 3, 'Wash and Fold', 7, 25, 175, '164223122210', 'Hello', 'hello@gmail.com', '546558569', '2022-01-15', '3PM-6PM', 'santa cruize', 'manila', 4, '2022-01-15 13:05:23'),
(13, 1, 'Wash and Fold', 5, 30, 150, '164545070611', 'Vision', 'vision@gmail.com', '98545522145', '2022-02-22', '12PM-3PM', 'Pearl Manila', 'Manila', 1, '2022-02-21 19:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `clock_in` varchar(50) NOT NULL,
  `clock_out` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `supply_id` int(30) NOT NULL,
  `in_qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `used_qty` int(10) DEFAULT NULL,
  `remaining_qty` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `supply_id`, `in_qty`, `price`, `used_qty`, `remaining_qty`, `date_created`) VALUES
(5, 1, 20, 1200, 15, 5, '2022-01-04 19:46:32'),
(6, 2, 25, 3500, NULL, 25, '2022-01-04 19:47:16'),
(7, 3, 12, 1200, NULL, 12, '2022-01-04 20:01:53'),
(8, 4, 50, 100, 5, 45, '2022-01-09 18:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_categories`
--

CREATE TABLE `laundry_categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry_categories`
--

INSERT INTO `laundry_categories` (`id`, `name`, `price`) VALUES
(1, 'Bed Sheets', 30),
(3, 'Clothes', 25),
(4, 'Blanket', 100),
(5, 'Linen', 100);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_items`
--

CREATE TABLE `laundry_items` (
  `id` int(30) NOT NULL,
  `laundry_category_id` int(30) NOT NULL,
  `weight` double NOT NULL,
  `laundry_id` int(30) NOT NULL,
  `unit_price` double NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry_items`
--

INSERT INTO `laundry_items` (`id`, `laundry_category_id`, `weight`, `laundry_id`, `unit_price`, `amount`) VALUES
(4, 3, 10, 4, 25, 250);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_list`
--

CREATE TABLE `laundry_list` (
  `id` int(30) NOT NULL,
  `customer_name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1 = ongoing,2= ready,3= claimed',
  `queue` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `pay_status` tinyint(1) DEFAULT '0',
  `amount_tendered` double NOT NULL,
  `amount_change` double NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry_list`
--

INSERT INTO `laundry_list` (`id`, `customer_name`, `status`, `queue`, `total_amount`, `pay_status`, `amount_tendered`, `amount_change`, `remarks`, `date_created`) VALUES
(2, 'James Smith', 3, 1, 555, 1, 555, 0, 'None', '2020-09-23 11:54:47'),
(4, 'Claire Blake', 3, 1, 250, 1, 500, 250, 'None', '2020-09-23 13:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `stock_list`
--

CREATE TABLE `stock_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_list`
--

INSERT INTO `stock_list` (`id`, `name`, `price`) VALUES
(1, 'Fabric Detergent', '2.5'),
(2, 'Fabric Conditioner', '3'),
(3, 'Baking Soda', '1.2'),
(4, 'Downy', '2');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(10) NOT NULL,
  `slot` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `slot`, `status`) VALUES
(1, '8AM-9AM', 0),
(2, '9AM-11AM', 1),
(3, '12PM-3PM', 1),
(4, '5PM-7PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$6/IrrHRkp2wLOtb27U83buleIaoARafZxqbXL44tin.n7wPt36NV2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_categories`
--
ALTER TABLE `laundry_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_items`
--
ALTER TABLE `laundry_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_list`
--
ALTER TABLE `laundry_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laundry_categories`
--
ALTER TABLE `laundry_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laundry_items`
--
ALTER TABLE `laundry_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laundry_list`
--
ALTER TABLE `laundry_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_list`
--
ALTER TABLE `stock_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
