-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 10:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(11) NOT NULL,
  `service_charge` decimal(10,2) DEFAULT NULL,
  `room_charge` decimal(10,2) DEFAULT NULL,
  `cleaning_charge` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `discount` decimal(10,2) DEFAULT NULL,
  `extras_total` decimal(10,2) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `service_charge`, `room_charge`, `cleaning_charge`, `total_amount`, `created_at`, `discount`, `extras_total`, `name`, `email`) VALUES
(1, 40.00, 80.00, 90.00, 210.00, '2024-09-12 03:12:15', NULL, NULL, NULL, NULL),
(2, 60.00, 100.00, 55.00, 215.00, '2024-09-12 03:21:15', NULL, NULL, NULL, NULL),
(3, 60.00, 80.00, 122.00, 262.00, '2024-09-12 03:23:54', NULL, NULL, NULL, NULL),
(4, 20.00, 50.00, 15.00, 0.00, '2024-09-12 03:43:49', NULL, NULL, NULL, NULL),
(5, 20.00, 50.00, 90.00, 160.00, '2024-09-12 03:46:32', NULL, NULL, NULL, NULL),
(6, 20.00, 80.00, 30.00, 0.00, '2024-09-12 03:48:40', NULL, NULL, NULL, NULL),
(7, 60.00, 100.00, 200.00, 360.00, '2024-09-12 03:49:53', NULL, NULL, NULL, NULL),
(8, 20.00, 50.00, 45.00, 115.00, '2024-09-12 03:52:39', NULL, NULL, NULL, NULL),
(9, 20.00, 100.00, 45.00, 165.00, '2024-09-12 04:15:44', NULL, NULL, NULL, NULL),
(37, 40.00, 80.00, 30.00, 0.00, '2024-09-14 04:55:09', 0.00, 0.00, 'Atif Hasan', 'mdsabbirhkhan192@gmail.com'),
(39, 40.00, 80.00, 30.00, 275.50, '2024-09-14 05:50:16', 14.50, 0.00, 'Atif Hasan', 'mdsabbirhkhan192@gmail.com'),
(40, 40.00, 80.00, 30.00, 275.50, '2024-09-14 05:51:05', 14.50, NULL, 'Atif Hasan', 'mdsabbirhkhan192@gmail.com'),
(41, 60.00, 100.00, 45.00, 327.75, '2024-09-14 05:51:57', 17.25, NULL, 'Atif Hasan', 'mdsabbirhkhan192@gmail.com'),
(42, 60.00, 50.00, 45.00, 250.75, '2024-09-14 05:59:17', 15.00, NULL, 'Atif Hasan', '121sksabbir@gmail.com'),
(43, 40.00, 100.00, 30.00, 263.50, '2024-09-14 06:05:41', 15.00, NULL, 'asif', '121sksabbir@gmail.com'),
(44, 40.00, 100.00, 30.00, 263.50, '2024-09-14 06:07:03', 15.00, NULL, 'Atif Hasan', '121sksabbir@gmail.com'),
(49, 40.00, 80.00, 30.00, 275.50, '2024-09-14 06:32:32', 5.00, NULL, 'asif', '121sksabbir@gmail.com'),
(50, 20.00, 80.00, 30.00, 243.00, '2024-09-14 06:57:34', 10.00, NULL, '', ''),
(51, 40.00, 100.00, 30.00, 279.00, '2024-09-14 07:02:54', 10.00, NULL, 'Atif Hasan', 'mdsabbirhkhan192@gmail.com'),
(52, 40.00, 100.00, 45.00, 292.50, '2024-09-14 07:10:14', 10.00, NULL, 'asif', '121sksabbir@gmail.com'),
(53, 40.00, 80.00, 30.00, 261.00, '2024-09-14 08:23:04', 10.00, NULL, 'Atif Hasan', 'mdsabbirhkhan192@gmail.com'),
(54, 40.00, 80.00, 30.00, 246.50, '2024-09-14 08:25:28', 15.00, NULL, 'Atif Hasan', 'mdsabbirhkhan192@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
