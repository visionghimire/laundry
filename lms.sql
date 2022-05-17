-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 07:16 AM
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
(9, 1, 'Wash and Fold', 2, 30, 60, '16375557358', 'Lance Asturis', 'admin@admin.com', '9865475632', '2021-11-30', '3PM-6PM', 'Pearl Manila', 'Manila', 6, '2021-11-22 10:20:35'),
(10, 3, 'Wash and Iron', 6, 25, 150, '16376023549', 'Kalson Karki', 'admin@admin.com', '9845632154', '2021-11-22', '12PM-3PM', 'kapan', 'kathmandu', 3, '2021-11-22 23:17:36'),
(11, 4, 'Wash and Fold', 5, 100, 500, '16417909729', 'Lucky Trevor', 'trevor@gmail.com', '112233445566', '2022-01-11', '3PM-6PM', '268 Manila', 'Manila', 6, '2022-01-10 10:47:53'),
(12, 3, 'Wash and Fold', 7, 25, 175, '164223122210', 'Hello', 'hello@gmail.com', '546558569', '2022-01-15', '3PM-6PM', 'santa cruize', 'manila', 6, '2022-01-15 13:05:23'),
(13, 1, 'Wash and Fold', 5, 30, 150, '164545070611', 'Vision', 'vision@gmail.com', '98545522145', '2022-02-22', '12PM-3PM', 'Pearl Manila', 'Manila', 1, '2022-02-21 19:23:27'),
(14, 1, 'Wash and Fold', 2, 30, 60, '164727297412', 'khagendra niroula', 'admin@admin.com', '9842789482', '2022-03-14', '2', 'anamnagar', 'ktm', 6, '2022-03-14 21:34:34'),
(15, 1, 'Wash and Iron', 8, 30, 240, '164862619913', 'Pravin', 'admin@admin.com', '343333', '2022-03-30', '3', 'anamnagar', 'Manila', 6, '2022-03-30 13:28:20'),
(16, 1, 'Wash and Iron', 10, 30, 300, '165175997314', 'Vision GHimire', 'admin@admin.com', '9874563217', '2022-05-06', '3', 'balkhu', 'kathmandu', 6, '2022-05-05 19:57:54'),
(17, 3, 'Wash and Fold', 20, 25, 500, '165176159415', 'Lance', 'admin@admin.com', '9874563212', '2022-05-06', '3', 'manila', 'manila', 6, '2022-05-05 20:24:54'),
(18, 4, 'Wash and Fold', 15, 100, 1500, '165176173316', 'Mel', 'admin@admin.com', '9569852504', '2022-05-06', '3', 'dsadsad', 'sadasda', 6, '2022-05-05 20:27:13'),
(19, 3, 'Wash and Fold', 2, 25, 50, '165235968817', 'sdfsdf', 'admin@admin.com', '4', '2022-05-12', '2', 'sdfsdgf', 'sdgfsdf', 6, '2022-05-12 18:33:08'),
(20, 1, 'Wash and Fold', 10, 30, 300, '165236012418', 'dsfsdf', 'admin@admin.com', '3333', '2022-05-13', '2', 'sdfsdf', 'sdfsdf', 0, '2022-05-12 18:40:24'),
(21, 1, 'Wash and Fold', 10, 30, 300, '165236791019', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-12', '2', 'balkhu', 'asfsf', 0, '2022-05-12 20:50:11'),
(22, 1, 'Wash and Fold', 3, 30, 90, '165236805220', 'Vision GHimire', 'vision.ghimere96@gmail.com', '3333', '2022-05-13', '2', 'balkhu', 'fsdfsdf', 0, '2022-05-12 20:52:32'),
(23, 1, 'Wash and Fold', 2, 30, 60, '165236849621', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-18', '2', 'balkhu', '44444', 0, '2022-05-12 20:59:56'),
(24, 1, 'Wash and Fold', 2, 30, 60, '165236920322', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-13', '2', 'balkhu', 'sdsdgdfg', 0, '2022-05-12 21:11:43'),
(25, 1, 'Wash and Fold', 2, 30, 60, '165236935423', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-13', '2', 'balkhu', 'asfsf', 0, '2022-05-12 21:14:14'),
(26, 1, 'Wash and Fold', 2, 30, 60, '165237039124', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9977', '2022-05-13', '2', 'balkhu', 'asfsf', 0, '2022-05-12 21:31:31'),
(27, 1, 'Wash and Fold', 3, 30, 90, '165237136625', 'visu ghim', 'vision.ghimere96@gmail.com', '4646', '2022-05-13', '2', 'rfdgfgh', 'ftfhrty', 0, '2022-05-12 21:47:46'),
(28, 1, 'Wash and Fold', 3, 30, 90, '165237165926', 'visu ghim', 'vision.ghimere96@gmail.com', '4646', '2022-05-13', '2', 'rfdgfgh', 'ftfhrty', 0, '2022-05-12 21:52:39'),
(29, 1, 'Wash and Fold', 3, 30, 90, '165237302027', 'visu ghim', 'vision.ghimere96@gmail.com', '4646', '2022-05-13', '2', 'rfdgfgh', 'ftfhrty', 0, '2022-05-12 22:15:20'),
(30, 1, 'Wash and Iron', 2, 30, 60, '165237340428', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-13', '2', 'balkhu', 'asfsf', 0, '2022-05-12 22:21:44'),
(31, 1, 'Wash and Fold', 2, 30, 60, '165237352729', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-13', '2', 'balkhu', 'asfsf', 0, '2022-05-12 22:23:47'),
(32, 1, 'Wash and Fold', 2, 30, 60, '165241118830', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-19', '2', 'balkhu', 'fsdfsdf', 0, '2022-05-13 08:51:29'),
(33, 1, 'Wash and Fold', 2, 30, 60, '165241191331', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-15', '2', 'balkhu', 'fsdfsdf', 0, '2022-05-13 09:03:33'),
(34, 1, 'Wash and Fold', 2, 30, 60, '165241224632', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-14', '2', 'balkhu', 'asfsf', 0, '2022-05-13 09:09:06'),
(35, 1, 'Wash and Fold', 2, 30, 60, '165241271633', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-20', '2', 'balkhu', 'asfsf', 0, '2022-05-13 09:16:56'),
(36, 1, 'Wash and Fold', 2, 30, 60, '165241299034', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-13', '2', 'balkhu', 'asfsf', 0, '2022-05-13 09:21:30'),
(37, 1, 'Wash and Fold', 20, 120, 2400, '165241390635', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-14', '2', 'balkhu', 'asfsf', 6, '2022-05-13 09:36:46'),
(38, 1, 'Wash and Fold', 50, 120, 6000, '165241956936', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-15', '2', 'balkhu', 'asfsf', 6, '2022-05-13 11:11:09'),
(39, 3, 'Wash and Fold', 10, 100, 1000, '165241966737', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-19', '2', 'hahahhahah', 'ddd', 6, '2022-05-13 11:12:47'),
(40, 1, 'Wash and Fold', 8, 120, 960, '165241995738', 'visu ghim', 'vision.ghimere96@gmail.com', '4646', '2022-05-18', '2', 'rfdgfgh', 'ftfhrty', 6, '2022-05-13 11:17:37'),
(41, 1, 'Wash and Fold', 3, 30, 90, '165242014539', 'visu ghim', 'vision.ghimere96@gmail.com', '4646', '2022-05-19', '2', 'huhuhu', 'ftfhrty', 9, '2022-05-13 11:20:45'),
(42, 1, 'Wash and Fold', 2, 30, 60, '165243686940', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-19', '2', 'hahahhahah', '44444', 9, '2022-05-13 15:59:29'),
(43, 1, 'Wash and Iron', 2, 30, 60, '165250666541', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-15', '5', 'balkhu', 'asfsf', 9, '2022-05-14 11:22:45'),
(44, 1, 'Wash and Fold', 12, 50, 600, '165250672842', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-16', '4', 'balkhu', 'asfsf', 6, '2022-05-14 11:23:48'),
(45, 1, 'Wash and Fold', 2, 50, 100, '165259048643', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-15', '3', 'balkhu', 'asfsf', 6, '2022-05-15 10:39:47'),
(46, 1, 'Wash and Fold', 2, 50, 100, '165259050344', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-15', '3', 'balkhu', 'asfsf', 6, '2022-05-15 10:40:03'),
(47, 1, 'Wash and Fold', 10, 50, 500, '165259172645', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-15', '1', 'balkhu', 'asfsf', 6, '2022-05-15 11:00:26'),
(48, 3, 'Wash and Fold', 10, 30, 300, '165260026346', 'Vision GHimire', 'vision.ghimere96@gmail.com', '9874563217', '2022-05-16', '2', 'balkhu', 'asfsf', 6, '2022-05-15 13:22:43'),
(49, 3, 'Wash and Fold', 10, 30, 300, '165260054147', 'Hello', 'vision.ghimere96@gmail.com', '9845632145', '2022-05-15', '1', 'balkhu', 'asfsf', 6, '2022-05-15 13:27:21'),
(50, 3, 'Wash and Fold', 5, 30, 150, '165262306648', 'Mel Pinto', 'melpinto43@gmail.com', '98456321785', '2022-05-16', '1', 'Manila', 'quezon', 6, '2022-05-15 19:42:46'),
(51, 3, 'Wash and Fold', 15, 30, 450, '165267197849', 'Sir Gio', 'giofriginal26@gmail.com', '98456321456', '2022-05-17', '3', 'Paco', 'Manila', 6, '2022-05-16 09:17:59'),
(52, 1, 'Wash and Fold', 17, 50, 850, '165269724150', 'visionghemere', 'vision.ghimere96@gmail.com', '988', '2022-05-17', '1', 'esfsdff', 'dfsdf', 6, '2022-05-16 16:19:02'),
(53, 3, 'Wash and Fold', 9, 30, 270, '165270256351', 'visionghemere', 'vision.ghimere96@gmail.com', '9874563212', '2022-05-17', '1', 'sdasdada', 'dasdasdsa', 6, '2022-05-16 17:47:43'),
(54, 3, 'Wash and Fold', 8, 30, 240, '165270271452', 'sadsadad', 'vision.ghimere96@gmail.com', 'dsadsaasd', '2022-05-17', '1', 'sdasdad', 'sadasdasd', 6, '2022-05-16 17:50:14'),
(55, 1, 'Wash and Fold', 11, 50, 550, '165270299753', 'dsadasd', 'vision.ghimere96@gmail.com', '9874563212', '2022-05-17', '3', 'sdada', 'dsadasd', 6, '2022-05-16 17:54:57'),
(56, 1, 'Wash and Fold', 11, 50, 550, '165270340954', 'visionghemere', 'vision.ghimere96@gmail.com', '9874563212', '2022-05-18', '1', 'dsada', 'dsada', 9, '2022-05-16 18:01:49'),
(57, 1, 'Wash and Fold', 11, 50, 550, '165270347555', 'visionghemere', 'vision.ghimere96@gmail.com', '9874563212', '2022-05-17', '1', 'sdasdad', 'dsada', 9, '2022-05-16 18:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `clock`
--

CREATE TABLE `clock` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `timestmp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clock`
--

INSERT INTO `clock` (`id`, `emp_id`, `type`, `timestmp`) VALUES
(22, 1, 'in', '2022-05-13 13:48:52'),
(23, 2, 'in', '2022-05-13 13:49:00'),
(24, 1, 'out', '2022-05-13 15:07:56'),
(25, 2, 'in', '2022-05-14 11:18:51'),
(26, 2, 'out', '2022-05-14 11:19:09'),
(27, 1, 'in', '2022-05-14 11:20:10'),
(28, 1, 'out', '2022-05-14 11:20:24'),
(29, 3, 'in', '2022-05-15 19:49:40'),
(30, 3, 'out', '2022-05-15 19:49:54'),
(31, 4, 'in', '2022-05-16 09:41:44'),
(32, 4, 'out', '2022-05-16 09:42:10'),
(33, 1, 'in', '2022-05-16 09:42:40'),
(34, 1, 'out', '2022-05-16 09:42:45'),
(35, 2, 'in', '2022-05-16 18:07:06'),
(36, 2, 'out', '2022-05-16 18:07:10'),
(37, 3, 'in', '2022-05-16 18:17:52'),
(38, 3, 'out', '2022-05-16 18:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `address`, `contact_number`) VALUES
(1, 'Rinchin', 'Manila Paco', '9668989898'),
(2, 'vision', 'manila', '9874563212'),
(3, 'Lucky', 'Paco Manila', '0966895623'),
(4, 'Karlos', 'Manila', '89984819851');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) NOT NULL,
  `years` int(5) NOT NULL,
  `months` int(2) NOT NULL,
  `type` varchar(200) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `years`, `months`, `type`, `price`) VALUES
(1, 2022, 4, 'rent', 2500),
(2, 2022, 4, 'salary', 3000),
(3, 2022, 5, 'rent', 2500),
(4, 2022, 5, 'salary', 3000),
(5, 2022, 5, 'miscellaneous', 1000),
(6, 2022, 5, 'electrycity', 3000),
(7, 2022, 5, 'water', 1000),
(8, 2022, 5, 'miscellaneous', 500);

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
(5, 1, 1000, 2500, 25, 975, '2022-05-16 00:00:00'),
(6, 2, 1000, 3000, 40, 960, '2022-05-16 00:00:00'),
(7, 3, 1200, 1440, 8, 1192, '2022-05-16 00:00:00'),
(8, 4, 700, 1400, 30, 670, '2022-05-16 00:00:00'),
(9, 5, 1000, 3500, 500, 500, '2022-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_categories`
--

CREATE TABLE `laundry_categories` (
  `id` int(30) NOT NULL,
  `ltype` int(10) DEFAULT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry_categories`
--

INSERT INTO `laundry_categories` (`id`, `ltype`, `name`, `price`) VALUES
(1, NULL, 'Bed Sheets', 50),
(3, NULL, 'Clothes', 30),
(4, NULL, 'Blanket', 20),
(5, NULL, 'Linen', 40),
(6, NULL, 'Fabric', 60);

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
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(10) NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

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
(4, 'Downy', '2'),
(5, 'Surf', '3.5');

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
(1, '8AM-9AM', 1),
(2, '9AM-11AM', 1),
(3, '12PM-3PM', 1),
(4, '5PM-7PM', 1),
(5, '7pm - 8pm', 1);

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
(1, 'admin', '$2y$10$6/IrrHRkp2wLOtb27U83buleIaoARafZxqbXL44tin.n7wPt36NV2', 'admin'),
(2, 'admin2', 'admin@123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clock`
--
ALTER TABLE `clock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
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
-- Indexes for table `months`
--
ALTER TABLE `months`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `clock`
--
ALTER TABLE `clock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laundry_categories`
--
ALTER TABLE `laundry_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_list`
--
ALTER TABLE `stock_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
