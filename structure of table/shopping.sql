-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 10:58 AM
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
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2024-04-02 16:21:18', '03-05-2024 08:27:55 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'MAN', 'Mans Footwear and Brand Available', '2024-09-13 06:14:49', NULL),
(2, 'WOMEN', 'Womens Footwear and Brand Available', '2024-09-13 06:15:42', '13-09-2024 11:46:16 AM'),
(3, 'KIDS', 'Kids Footwear and Brand Available', '2024-09-13 06:16:01', NULL);

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
(1, 'Rathod Vishal', 'vr8654829@gmail.com', 'dfbnz', 'z,dnhIEGFIgwefWY');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 4, '1', 1, '2024-09-13 07:53:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'in Process', 'Item is packed. Ready for dispatched.', '2024-05-22 06:32:29'),
(2, 1, 'Delivered', 'Product is delivered to the customer.', '2024-05-22 06:32:53'),
(3, 3, 'in Process', 'Product is packed. Dispactched soon', '2024-05-23 13:50:53'),
(4, 3, 'in Process', 'Product is in transit.\r\n', '2024-05-23 13:51:13'),
(5, 4, 'in Process', 'Item is packed', '2024-06-05 01:05:26'),
(6, 4, 'in Process', 'In Transit', '2024-06-05 01:05:34'),
(7, 4, 'Delivered', 'Delivered to the customer', '2024-06-05 01:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `productImage1` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `postingDate`, `updationDate`) VALUES
(1, 1, 1, 'White Flyer', 'Puma', 399, 500, 'This s=is the white flyer shoese', 'm2.png', '2024-09-13 06:34:04', NULL),
(2, 1, 1, 'Tap Walking Shoes', 'Tap Walking Shoes', 799, 1000, '<span style=\"color: rgb(33, 33, 33); font-family: Inter, -apple-system, Helvetica, Arial, sans-serif; font-size: 18px;\">Tap Walking Shoes for mans</span><br>', '0af74157-7ac6-4859-906c-092a09bd59021699605661833PumaBadmintonSmashSprintUnisexIndoorShoes4.jpg', '2024-09-13 06:36:50', NULL),
(3, 1, 2, 'Men ZapCore Running Shoes', 'Men ZapCore Running Shoes', 799, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Men ZapCore Running Shoes thsi branded shoes</h1>', '47421752-6a2a-429b-a16f-7b2a20af66ed1714389977817-ADIDAS-Men-ZapCore-Running-Shoes-4791714389977512-2.jpg', '2024-09-13 06:51:03', NULL),
(4, 1, 2, 'Men Woven Design Wisefoma Running Shoes', 'Men Woven Design Wisefoma Running Shoes', 799, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Men Woven Design Wisefoma Running Shoes</h1><div style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif; font-size: medium;\"><div class=\"index-overallRatingContainer\" style=\"box-sizing: inherit; width: auto; border-bottom: 1px solid rgb(212, 213, 217);\"><div class=\"index-overallRating\" style=\"box-sizing: inherit; margin-bottom: 12px; display: flex; -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; width: fit-content; height: 29px; padding: 8px; border: 1px solid rgb(234, 234, 236); border-radius: 2px; cursor: pointer; font-size: 16px; font-weight: 700; color: rgb(40, 44, 63);\"></div></div></div>', '753d6065-ba24-4028-bf77-51a40a4c93b81722237591113-ADIDAS-Men-Sports-Shoes-3251722237590706-2.jpg', '2024-09-13 06:52:44', NULL),
(6, 2, 4, 'Textured', 'Women Textured Slip-On Sneakers', 299, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Women Textured Slip-On Sneakers</h1>', '66a2039b-30c0-4b43-be77-b9f7c04c5ae41714389288289BataWomenWovenDesignSlip-OnSneakers3.jpg', '2024-09-13 07:14:18', NULL),
(8, 2, 4, 'White Printed ', 'Women White Printed ', 399, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Women White Printed Slip-On Sneakers</h1>', '27d0e607-7a5e-4467-8273-01e40c41f50f1652766868213BataWomenWhitePrintedSlip-OnSneakers2.jpg', '2024-09-13 07:17:13', NULL),
(9, 2, 3, 'Revolution 7 Women\'', 'Nike', 799, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Revolution 7 Women\'s Road Running Shoes</h1>', '9b691a94-f948-4d78-8a57-d7e0851b6bd51718443895056NikeRevolution7WomensRoadRunningShoes4 (1).jpg', '2024-09-13 07:29:01', NULL),
(10, 2, 3, 'Zoom Vomero ', 'Zoom Vomero 5 Women', 500, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Zoom Vomero 5 Women\'s Shoes</h1>', 'b57f71f0-bfd3-4980-8bdb-88549620dff31718187124721NikeZoomVomero5WomensShoes2.jpg', '2024-09-13 07:30:37', NULL),
(11, 3, 5, ' BIRDE', 'Unisex LightWeight ', 399, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Unisex LightWeight Walking Shoes</h1>', '4a43bf54-e270-4777-8979-cd063fc15b921713607645775SportsShoes3.jpg', '2024-09-13 07:35:05', NULL),
(12, 3, 5, 'Campus', 'Kids Tom & Jerry ', 399, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Kids Tom &amp; Jerry Printed Running Shoes</h1>', '31218aa6-ed83-4103-8b1b-2b2ca830bce01703661772486CampusNT-562VBlueKidsSportsShoes3.jpg', '2024-09-13 07:37:49', NULL),
(13, 3, 6, 'Pantaloons Baby', 'Girls Woven Design Everyday Slip-On Sneakers', 299, 500, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Girls Woven Design Everyday Slip-On Sneakers</h1>', 'x4vaMZgA_b99ec0963b7a4f4092c29e58753aabef (1).jpg', '2024-09-13 07:40:26', NULL),
(14, 3, 6, ' MINI KLUB', 'Gold-Toned ', 899, 1000, '<h1 class=\"pdp-name\" style=\"box-sizing: inherit; font-size: 20px; margin-bottom: 0px; color: rgb(83, 86, 101); padding: 5px 20px 14px 0px; opacity: 0.8; font-weight: 400; font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">Girls Gold-Toned Woven Design PU Slip-On Sneakers</h1><div style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Assistant, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif; font-size: medium;\"><div class=\"index-overallRatingContainer\" style=\"box-sizing: inherit; width: auto; border-bottom: 1px solid rgb(212, 213, 217);\"><div class=\"index-overallRating\" style=\"box-sizing: inherit; margin-bottom: 12px; display: flex; -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; width: fit-content; height: 29px; padding: 8px; border: 1px solid rgb(234, 234, 236); border-radius: 2px; cursor: pointer; font-size: 16px; font-weight: 700; color: rgb(40, 44, 63);\"></div></div></div>', '9f2fec4a-0621-45d8-b19e-39a39462b36f1651919710095MINIKLUBGirlsGold-TonedWovenDesignPUSlip-OnSneakers3.jpg', '2024-09-13 07:41:53', NULL),
(15, 1, 1, 'White Flyer', 'Puma', 799, 1000, 'This is no rson i add it', 'm8.jpg', '2024-09-13 07:49:25', NULL);

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
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'anuj.k@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-22 00:31:21', '22-05-2024 11:34:34 AM', 1),
(2, 'johndeo@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-23 08:00:40', NULL, 1),
(3, 'amit12@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-04 19:33:33', '05-06-2024 06:39:31 AM', 1),
(0, 'vr8654829@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-12 18:18:26', NULL, 0),
(0, 'vr8654829@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-12 18:19:00', NULL, 0),
(0, 'vr8654829@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-12 18:19:10', NULL, 0),
(0, 'bca2022vishal@tnraocollege.org', 0x3a3a3100000000000000000000000000, '2024-09-12 18:21:20', '13-09-2024 12:27:47 AM', 1),
(0, 'bca2022vishal@tnraocollege.org', 0x3a3a3100000000000000000000000000, '2024-09-13 07:01:32', NULL, 0),
(0, 'bca2022vishal@tnraocollege.org', 0x3a3a3100000000000000000000000000, '2024-09-13 07:01:41', NULL, 1),
(0, 'bhagirathbhai.baraiya123766@marwadiuniversity.ac.in', 0x3a3a3100000000000000000000000000, '2024-09-25 10:52:23', '25-09-2024 04:38:06 PM', 1),
(0, 'bhagirathbhai.baraiya123766@marwadiuniversity.ac.in', 0x3a3a3100000000000000000000000000, '2024-09-25 10:54:33', NULL, 1),
(0, 'bhagutneth@wwvqg', 0x3a3a3100000000000000000000000000, '2024-09-25 10:56:25', NULL, 0),
(0, 'bhagirathbhai.baraiya123766@marwadiuniversity.ac.in', 0x3a3a3100000000000000000000000000, '2024-09-25 11:18:10', NULL, 1),
(0, 't@gmail.com', 0x3a3a3100000000000000000000000000, '2024-09-26 08:42:30', NULL, 0);

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
(1, 'BHAGIRATH', 'bhagirathbhai.baraiya123766@marwadiuniversity.ac.in', 9979181890, '48a4d4064afc1fe4625bec30a94ccf41');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
