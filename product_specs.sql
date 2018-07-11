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
-- Table structure for table `product_specs`
--

CREATE TABLE `product_specs` (
  `specs_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_specs`
--

INSERT INTO `product_specs` (`specs_id`, `title`, `description`, `product_id`) VALUES
(47, 'qweq', 'ewqehaa', 13),
(52, 'POST', 'ME', 13),
(53, 'haha', 'haha', 13),
(56, 'vghj haha', 'vf', 15),
(57, 'ghahhahahkhk', 'ahaha', 15),
(58, 'hahaha', 'haha', 15),
(59, 'hah', 'ahahaha', 15),
(61, '1', '1', 20),
(64, 'Principle', '\n\n\n\n\n\n\n\n\n\n\n\n\n\n<!--\n /* Font Definitions */\n@font-face\n	{font-family:\"Cambria Math\";\n	panose-1:2 4 5 3 5 4 6 3 2 4;\n	mso-font-charset:0;\n	mso-generic-font-family:auto;\n	mso-font-pitch:variable;\n	mso-font-signature:-536870145 1107305727 0 0 415 0;}\n@font-face\n	{font-family:Cambria;\n	panose-1:2 4 5 3 5 4 6 3 2 4;\n	mso-font-charset:0;\n	mso-generic-font-family:auto;\n	mso-font-pitch:variable;\n	mso-font-signature:-536870145 1073743103 0 0 415 0;}\n@font-face\n	{font-family:\"Arial Narrow\";\n	panose-1:2 11 5 6 2 2 2 3 2 4;\n	mso-font-charset:0;\n	mso-generic-font-family:auto;\n	mso-font-pitch:variable;\n	mso-font-signature:647 2048 0 0 159 0;}\n@font-face\n	{font-family:Batang;\n	mso-font-alt:ë°”íƒ•;\n	mso-font-charset:129;\n	mso-generic-font-family:roman;\n	mso-font-pitch:variable;\n	mso-font-signature:-1342176593 1775729915 48 0 524447 0;}\n@font-face\n	{font-family:HelveticaNeue-Bold;\n	panose-1:0 0 0 0 0 0 0 0 0 0;\n	mso-font-charset:0;\n	mso-generic-font-family:swiss;\n	mso-font-format:other;\n	mso-font-pitch:auto;\n	mso-font-signature:3 0 0 0 1 0;}\n /* Style Definitions */\np.MsoNormal, li.MsoNormal, div.MsoNormal\n	{mso-style-unhide:no;\n	mso-style-qformat:yes;\n	mso-style-parent:\"\";\n	margin-top:0cm;\n	margin-right:0cm;\n	margin-bottom:10.0pt;\n	margin-left:0cm;\n	mso-pagination:widow-orphan;\n	font-size:12.0pt;\n	font-family:Cambria;\n	mso-fareast-font-family:Cambria;\n	mso-bidi-font-family:\"Times New Roman\";}\n.MsoChpDefault\n	{mso-style-type:export-only;\n	mso-default-props:yes;\n	font-size:10.0pt;\n	mso-ansi-font-size:10.0pt;\n	mso-bidi-font-size:10.0pt;\n	font-family:Cambria;\n	mso-ascii-font-family:Cambria;\n	mso-fareast-font-family:Cambria;\n	mso-hansi-font-family:Cambria;}\n@page WordSection1\n	{size:612.0pt 792.0pt;\n	margin:72.0pt 90.0pt 72.0pt 90.0pt;\n	mso-header-margin:36.0pt;\n	mso-footer-margin:36.0pt;\n	mso-paper-source:0;}\ndiv.WordSection1\n	{page:WordSection1;}\n-->\n\n\n\n\n\nIon Selective Electrode method\n\n\n\n', 24),
(66, 'Sample Volume', '\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n100 â€“ 150 Âµl per\ntest\n\n\n\n\n\n', 24),
(67, 'Throughput', '\n\n\n\n\n\n\n\n\n\n\n\n\n\n<!--\n /* Font Definitions */\n@font-face\n	{font-family:\"Cambria Math\";\n	panose-1:2 4 5 3 5 4 6 3 2 4;\n	mso-font-charset:0;\n	mso-generic-font-family:auto;\n	mso-font-pitch:variable;\n	mso-font-signature:-536870145 1107305727 0 0 415 0;}\n@font-face\n	{font-family:Cambria;\n	panose-1:2 4 5 3 5 4 6 3 2 4;\n	mso-font-charset:0;\n	mso-generic-font-family:auto;\n	mso-font-pitch:variable;\n	mso-font-signature:-536870145 1073743103 0 0 415 0;}\n@font-face\n	{font-family:\"Arial Narrow\";\n	panose-1:2 11 5 6 2 2 2 3 2 4;\n	mso-font-charset:0;\n	mso-generic-font-family:auto;\n	mso-font-pitch:variable;\n	mso-font-signature:647 2048 0 0 159 0;}\n@font-face\n	{font-family:Batang;\n	mso-font-alt:ë°”íƒ•;\n	mso-font-charset:129;\n	mso-generic-font-family:roman;\n	mso-font-pitch:variable;\n	mso-font-signature:-1342176593 1775729915 48 0 524447 0;}\n@font-face\n	{font-family:HelveticaNeue-Bold;\n	panose-1:0 0 0 0 0 0 0 0 0 0;\n	mso-font-charset:0;\n	mso-generic-font-family:swiss;\n	mso-font-format:other;\n	mso-font-pitch:auto;\n	mso-font-signature:3 0 0 0 1 0;}\n /* Style Definitions */\np.MsoNormal, li.MsoNormal, div.MsoNormal\n	{mso-style-unhide:no;\n	mso-style-qformat:yes;\n	mso-style-parent:\"\";\n	margin-top:0cm;\n	margin-right:0cm;\n	margin-bottom:10.0pt;\n	margin-left:0cm;\n	mso-pagination:widow-orphan;\n	font-size:12.0pt;\n	font-family:Cambria;\n	mso-fareast-font-family:Cambria;\n	mso-bidi-font-family:\"Times New Roman\";}\n.MsoChpDefault\n	{mso-style-type:export-only;\n	mso-default-props:yes;\n	font-size:10.0pt;\n	mso-ansi-font-size:10.0pt;\n	mso-bidi-font-size:10.0pt;\n	font-family:Cambria;\n	mso-ascii-font-family:Cambria;\n	mso-fareast-font-family:Cambria;\n	mso-hansi-font-family:Cambria;}\n@page WordSection1\n	{size:612.0pt 792.0pt;\n	margin:72.0pt 90.0pt 72.0pt 90.0pt;\n	mso-header-margin:36.0pt;\n	mso-footer-margin:36.0pt;\n	mso-paper-source:0;}\ndiv.WordSection1\n	{page:WordSection1;}\n-->\n\n\n\n\n\nResults in less than 60 seconds\n\n\n\n', 24),
(68, 'hah', 'haha', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_specs`
--
ALTER TABLE `product_specs`
  ADD PRIMARY KEY (`specs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_specs`
--
ALTER TABLE `product_specs`
  MODIFY `specs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
