-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 06:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'password', 'admin'),
(2, 'customer1', 'password', 'customer'),
(3, 'customer2', 'password', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `company` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` float NOT NULL,
  `trackingid` varchar(255) NOT NULL,
  `shipment` varchar(255) NOT NULL,
  `shipmentsize` varchar(255) NOT NULL,
  `bcount` int(11) NOT NULL,
  `specification` varchar(255) NOT NULL,
  `cquantity` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `date`, `company`, `owner`, `items`, `quantity`, `weight`, `trackingid`, `shipment`, `shipmentsize`, `bcount`, `specification`, `cquantity`, `username`) VALUES
(1, '2023-07-05', 'AIT', 'fh', 'ffds', 44, 89, '4677', 'dfgfh', '57675', 64, 'dfh', 45, 'customer1'),
(2, '2023-07-02', 'AIT', 'fh', 'ffds', 12, 44.99, '35t5re6ty5', 'et', '234', 10, 'rhyeyy', 12, 'customer2'),
(3, '2023-07-02', 'fdhj', 'gjd', '67', 67, 789, '56438i8hj', 'hgfrjkl', '678', 78, 'ffdkl', 67, 'customer1'),
(4, '2023-07-02', 'ggj', 'rdhh', 'dghg', 57, 45, '4677', 'rh', '546', 43, 'fh', 23, 'customer2');

-- --------------------------------------------------------

--
-- Table structure for table `customerdata`
--

CREATE TABLE `customerdata` (
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `box_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdata`
--
ALTER TABLE `customerdata`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerdata`
--
ALTER TABLE `customerdata`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
