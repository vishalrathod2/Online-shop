-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 11:08 AM
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
-- Database: `footwear`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`) VALUES
(1, 'MAN', 'Mans Footwear and Brand Available'),
(2, 'WOMEN', 'Womens Footwear and Brand Available'),
(3, 'KIDS', 'Kids Footwear and Brand Available');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ranjit', 'bca2022ranjit1742@tnraocollege.org', 'item', 'This item is wrong');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`) VALUES
(1, 1, 1, 'White Flyer', 'Puma', 399, 500, 'This s=is the white flyer shoese', 'm2.png'),
(2, 1, 1, 'Tap Walking Shoes', 'Tap Walking Shoes', 799, 1000, '<span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 18px;\">Tap Walking Shoes for mans</span><br>', '0af74157-7ac6-4859-906c-092a09bd59021699605661833PumaBadmintonSmashSprintUnisexIndoorShoes4.jpg'),
(3, 1, 2, 'Men ZapCore Running Shoes', 'Men ZapCore Running Shoes', 799, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Men ZapCore Running Shoes thsi branded shoes</h1>', '47421752-6a2a-429b-a16f-7b2a20af66ed1714389977817-ADIDAS-Men-ZapCore-Running-Shoes-4791714389977512-2.jpg'),
(4, 1, 2, 'Men Woven Design Wisefoma Running Shoes', 'Men Woven Design Wisefoma Running Shoes', 799, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Men Woven Design Wisefoma Running Shoes</h1><div style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif; font-size: medium;\"><div class=\"index-overallRatingContainer\" style=\"box-sizing: inherit; width: auto; border-bottom: 1px solid rgb(212, 213, 217);\"><div class=\"index-overallRating\" style=\"box-sizing: inherit; margin-bottom: 12px; display: flex; -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; width: fit-content; height: 29px; padding: 8px; border: 1px solid rgb(234, 234, 236); border-radius: 2px; cursor: pointer; font-size: 16px; font-weight: 700; color: rgb(40, 44, 63);\"></div></div></div>', '753d6065-ba24-4028-bf77-51a40a4c93b81722237591113-ADIDAS-Men-Sports-Shoes-3251722237590706-2.jpg'),
(6, 2, 4, 'Textured', 'Women Textured Slip-On Sneakers', 299, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Women Textured Slip-On Sneakers</h1>', '66a2039b-30c0-4b43-be77-b9f7c04c5ae41714389288289BataWomenWovenDesignSlip-OnSneakers3.jpg'),
(8, 2, 4, 'White Printed ', 'Women White Printed ', 399, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Women White Printed Slip-On Sneakers</h1>', '27d0e607-7a5e-4467-8273-01e40c41f50f1652766868213BataWomenWhitePrintedSlip-OnSneakers2.jpg'),
(9, 2, 3, 'Revolution 7 Women\'', 'Nike', 799, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Revolution 7 Women\'s Road Running Shoes</h1>', '9b691a94-f948-4d78-8a57-d7e0851b6bd51718443895056NikeRevolution7WomensRoadRunningShoes4 (1).jpg'),
(10, 2, 3, 'Zoom Vomero ', 'Zoom Vomero 5 Women', 500, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Zoom Vomero 5 Women\'s Shoes</h1>', 'b57f71f0-bfd3-4980-8bdb-88549620dff31718187124721NikeZoomVomero5WomensShoes2.jpg'),
(11, 3, 5, ' BIRDE', 'Unisex LightWeight ', 399, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Unisex LightWeight Walking Shoes</h1>', '4a43bf54-e270-4777-8979-cd063fc15b921713607645775SportsShoes3.jpg'),
(12, 3, 5, 'Campus', 'Kids Tom & Jerry ', 399, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Kids Tom &amp; Jerry Printed Running Shoes</h1>', '31218aa6-ed83-4103-8b1b-2b2ca830bce01703661772486CampusNT-562VBlueKidsSportsShoes3.jpg'),
(13, 3, 6, 'Pantaloons Baby', 'Girls Woven Design Everyday Slip-On Sneakers', 299, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Girls Woven Design Everyday Slip-On Sneakers</h1>', 'x4vaMZgA_b99ec0963b7a4f4092c29e58753aabef (1).jpg'),
(14, 3, 6, ' MINI KLUB', 'Gold-Toned ', 899, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Girls Gold-Toned Woven Design PU Slip-On Sneakers</h1><div style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif; font-size: medium;\"><div class=\"index-overallRatingContainer\" style=\"box-sizing: inherit; width: auto; border-bottom: 1px solid rgb(212, 213, 217);\"><div class=\"index-overallRating\" style=\"box-sizing: inherit; margin-bottom: 12px; display: flex; -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; width: fit-content; height: 29px; padding: 8px; border: 1px solid rgb(234, 234, 236); border-radius: 2px; cursor: pointer; font-size: 16px; font-weight: 700; color: rgb(40, 44, 63);\"></div></div></div>', '9f2fec4a-0621-45d8-b19e-39a39462b36f1651919710095MINIKLUBGirlsGold-TonedWovenDesignPUSlip-OnSneakers3.jpg'),
(15, 1, 1, 'White Flyer', 'Puma', 799, 1000, 'This is no rson i add it', 'm8.jpg');

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
(1, 1, 'Puma ', '2024-09-13 06:16:39', NULL),
(2, 1, 'Adidas', '2024-09-13 06:17:05', NULL),
(3, 2, 'Nike', '2024-09-13 06:17:19', NULL),
(4, 2, 'Bata', '2024-09-13 06:17:29', '13-09-2024 12:43:11 PM'),
(5, 3, 'Sports', '2024-09-13 06:17:40', NULL),
(6, 3, 'Babyoye', '2024-09-13 06:19:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`) VALUES
(1, 'bca2022vishal1742@tnraocollege.org', 0x3a3a3100000000000000000000000000),
(2, 'bca2022ranjit1742@tnraocollege.org', 0x3a3a3100000000000000000000000000),
(3, 'bca2022ranjit1742@tnraocollege.org', 0x3a3a3100000000000000000000000000),
(4, 'bca2022ranjit1742@tnraocollege.org', 0x3a3a3100000000000000000000000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`) VALUES
(1, 'ranjit', 'saliyaranjit04@gmail.com', 8780709463, 'a01610228fe998f515a72dd730294d87'),
(2, 'vishal', 'vr8654829@gmail.com', 8780709463, '202cb962ac59075b964b07152d234b70'),
(3, 'sahil', 'vr86154829@gmail.com', 8780709463, 'c20ad4d76fe97759aa27a0c99bff6710'),
(4, 'sahil', 'vr8654829@gmail.com', 8780709463, '202cb962ac59075b964b07152d234b70'),
(5, 'sahil', 'vr86154829@gmail.com', 1223415135, '202cb962ac59075b964b07152d234b70'),
(6, 'ashis', 'ashishmalviya@gmail.com', 1223415135, '4297f44b13955235245b2497399d7a93'),
(7, 'vishal', 'bca2022vishal1742@tnraocollege.org', 8780709463, '202cb962ac59075b964b07152d234b70'),
(8, 'Ranjit', 'bca2022ranjit1742@tnraocollege.org', 7567370180, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`) VALUES
(3, 2, 1),
(4, 4, 1);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
