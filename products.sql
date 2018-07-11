-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 03:04 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(50) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_dp` decimal(18,2) NOT NULL,
  `product_tp` decimal(18,2) NOT NULL,
  `product_qty` varchar(50) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_dp`, `product_tp`, `product_qty`, `product_desc`) VALUES
(1, 'Hepa Strips', '100.00', '100.00', 'pcs.', '123'),
(8, 'Preg Test', '78.89', '100.88', '', 'hahahhah'),
(9, 'Clover', '15000.00', '18000.00', '', 'This is a product to measure your blood pressure'),
(11, 'Piatos', '9.00', '13.00', 'Box', 'Cheese'),
(12, 'Nova', '8.00', '13.00', '', 'Cheese'),
(13, 'Biogesic', '1000.00', '1200.00', '', 'Gamot sa Lagnat'),
(14, 'HIV Test', '123.00', '1451.00', 'pcs.', 'ppap'),
(15, 'HBsAg Strips', '1200.00', '2000.00', 'Box', 'aawadawd'),
(16, 'Drew Pack', '1231.00', '4222.00', 'pcs.', 'kakakakakaka'),
(17, 'Malaria p.f/p.v', '123.00', '413.00', 'Box', 'awfawf'),
(18, 'DOA', '1231.00', '241.00', 'pcs.', 'hahahaha'),
(19, 'G3', '90.00', '150.00', 'Box', 'kakakaka'),
(20, 'Capilets', '800.00', '1200.00', 'Box', 'awdawdawd'),
(23, 'gaga', '12312.00', '12312.00', '', 'hahaha'),
(24, 'ElectroLine 100 ', '10000.00', '15000.00', 'Box', 'Pampalakas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
