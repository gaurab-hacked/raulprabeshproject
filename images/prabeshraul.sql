-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 08:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prabeshraul`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `date`) VALUES
(9, 'Home', '2023-11-30 13:18:46'),
(10, 'About us', '2023-11-30 13:18:50'),
(11, 'Contact us', '2023-11-30 13:18:59'),
(12, 'Services', '2023-11-30 13:19:09'),
(15, 'Add Product', '2023-12-02 07:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` varchar(511) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `title`, `description`, `date`, `userId`) VALUES
(1, 'gaurab sunar', 'gaurab@gmail.com', 'this is title', 'this is desctiption', '2023-12-01 10:57:49', 2);

-- --------------------------------------------------------

--
-- Table structure for table `producttable`
--

CREATE TABLE `producttable` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategoryid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(1023) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `userid` int(11) DEFAULT NULL,
  `phnumber` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttable`
--

INSERT INTO `producttable` (`id`, `categoryid`, `subcategoryid`, `name`, `description`, `image`, `date`, `userid`, `phnumber`, `address`) VALUES
(1, 12, 6, 'this is test', 'this is description', 'uploads/395992025_1053970132409247_8736230378439669133_n.jpg', '2023-11-30 14:01:45', 1, NULL, NULL),
(2, 12, 7, 'this is test', 'this is desctiption ', 'uploads/371173630_751630440361230_5317283737524149616_n.png', '2023-11-30 14:04:27', 1, NULL, NULL),
(3, 12, 8, 'Guarab photo update', 'Gaurab photo update', 'uploads/395992025_1053970132409247_8736230378439669133_n.jpg', '2023-11-30 14:05:23', 1, NULL, NULL),
(4, 9, 6, 'test', 'test me', 'uploads/371173630_751630440361230_5317283737524149616_n.png', '2023-11-30 14:35:16', 1, NULL, NULL),
(9, 10, 0, 'test', 'this is test', 'uploads/prabesh.jpg', '2023-12-01 11:09:09', 1, NULL, NULL),
(10, 9, 0, 'test this', 'this is good product', 'uploads/Homeservice.jpg', '2023-12-01 17:17:18', 1, '9810325922', 'dhading '),
(14, 9, 0, 'fdsafds', 'jhsankfjh fdshjfdshakfjdsh akfjdsh akdfjsh kjfsah fksdjah', 'uploads/EmergencyService.jpg', '2023-12-02 06:39:31', 1, '9810325922', 'gaurb'),
(15, 9, 10, 'this is test', 'this is another test from user', 'uploads/officeService.jpg', '2023-12-02 07:41:00', 1, '9810325922', 'Dhading nepal'),
(17, 9, 0, 'gaurab', 'this is me gaurab sunar\r\nUpdate', 'uploads/prabesh.jpg', '2023-12-02 07:46:44', 2, '9810325922', 'gaurabsunar');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryId`, `subcategory`, `date`) VALUES
(6, 12, 'Home services', '2023-11-30 13:19:22'),
(7, 12, 'Personal services', '2023-11-30 13:19:31'),
(8, 12, 'Rent services', '2023-11-30 13:19:39'),
(10, 9, 'Hello', '2023-12-01 11:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `privilege` int(11) DEFAULT 0,
  `date` datetime DEFAULT current_timestamp(),
  `phNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `privilege`, `date`, `phNumber`) VALUES
(2, 'gaurab sunar', 'gaurabsunar@gmail.com', '1234', 0, '2023-11-29 18:41:49', '9810324222'),
(4, 'admin', 'admin@gmail.com', 'admin', 0, '2023-12-01 16:07:59', '9810325926');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `producttable`
--
ALTER TABLE `producttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoryId` (`categoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producttable`
--
ALTER TABLE `producttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `fk_categoryId` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
