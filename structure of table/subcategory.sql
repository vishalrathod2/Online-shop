-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 06:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(2, 4, 'Led Television', '2024-01-20 16:24:52', NULL),
(3, 4, 'Television', '2024-01-20 16:24:52', ''),
(4, 4, 'Mobiles', '2024-01-20 16:24:52', ''),
(5, 4, 'Mobile Accessories', '2024-01-20 16:24:52', ''),
(6, 4, 'Laptops', '2024-01-20 16:24:52', ''),
(7, 4, 'Computers', '2024-01-20 16:24:52', ''),
(8, 3, 'Comics', '2024-01-20 16:24:52', ''),
(9, 5, 'Beds', '2024-01-20 16:24:52', ''),
(10, 5, 'Sofas', '2024-01-20 16:24:52', ''),
(11, 5, 'Dining Tables', '2024-01-20 16:24:52', ''),
(12, 6, 'Men Footwears', '2024-01-20 16:24:52', ''),
(14, 4, 'Refrigerator', '2024-06-05 01:07:31', NULL),
(15, 8, 'PUMA', '2024-09-11 11:11:07', NULL),
(16, 9, 'NIKE', '2024-09-11 11:11:15', NULL),
(17, 10, 'ADIDAIS', '2024-09-11 11:11:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
