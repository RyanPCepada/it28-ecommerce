-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 08:15 AM
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
-- Database: `u593341949_db_cepada`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'ArsyArts', 'ArsyArts@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Rhayeancepada@yahoo.com', 'Rhayean', '$2y$10$EfKN8vKVHTk7hfPTyrQLhuALqXdiNbJrxzpuDVyhmayUGnUBDSOnm', '2024-06-04 13:33:27'),
(2, 'RCngBayan@gmail.com', 'RCngBayan@gmail.com', '$2y$10$pGo3JO6DKewns0LFEX7pze/DI6JTBaZEhCrx4Re.QFOgGc1qJ/pL2', '2024-06-04 13:36:53'),
(3, 'sample', 'sample@gmail.com', '$2y$10$zWLWQtSF7R.ugocBhur8b.vS0HXzjrbvDDi7OPm6GVokKOwUbsVBO', '2024-06-04 13:41:35'),
(4, 'sample2', 'sample2@gmail.com', '$2y$10$kUBBsNMMSDaQD45EGoaKKeqZtZjYbLUsugKDfoJDfM.6jPcVm6rT6', '2024-06-04 13:48:22'),
(5, 'sample3', 'sample3@gmail.com', '$2y$10$Zahl3r.EBI2VMbSb9SWUCengmfi8Kh75OdoXqBsPieabOBFq6BlIK', '2024-06-04 14:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Semi-hyperrealistic', 'Black & White', 5000, 5000, 1, 'icons/SHR_KENJU.jpg', '2024-05-08 00:00:00'),
(2, 'Semi-hyperrealistic', 'Black & White', 5000, 5000, 1, 'icons/SHR_1.jpg', '2024-05-08 00:00:00'),
(3, 'Semi-hyperrealistic', 'Black & White', 5000, 5000, 1, 'icons/SHR_2.jpg', '2024-05-08 00:00:00'),
(4, 'Semi-hyperrealistic', 'Black & White', 5000, 5000, 1, 'icons/SHR_3.jpg', '2024-05-08 00:00:00'),
(5, 'Semi-hyperrealistic', 'Black & White', 5000, 5000, 1, 'icons/SHR_4.jpg', '2024-05-08 00:00:00'),
(15, 'sample1', 'sample1', 1, 1, 1, 'sample1', '2024-06-05 12:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`, `customer_id`, `product_id`) VALUES
(1, 'Air Max 270', 'White & Metallic Silver', 7645, 0, 1, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/92602c29-51d2-4f77-6c3d-2214e53a5100/products', '2024-06-03 18:56:32', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `realistic`
--

CREATE TABLE `realistic` (
  `r_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `realistic`
--

INSERT INTO `realistic` (`r_id`, `title`, `description`, `price`, `img`, `date_added`) VALUES
(1, 'Realistic', 'A realism portrait quality your loved ones will surely love!', 3500, 'icons/R_JAMPAX.jpg', '2024-06-05 13:07:21'),
(3, 'Realistic', 'A realism portrait quality your loved ones will surely love!', 3500, 'icons/R_GRAD.jpg', '2024-06-05 13:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `semi_hyperrealistic`
--

CREATE TABLE `semi_hyperrealistic` (
  `shr_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `semi_hyperrealistic`
--

INSERT INTO `semi_hyperrealistic` (`shr_id`, `title`, `description`, `price`, `img`, `date_added`) VALUES
(1, 'Semi-hyperrealistic', 'A semi-hyperrealism portrait quality your loved ones will surely love!', 5000, 'icons/SHR_KENJU.jpg', '2024-05-08 00:00:00'),
(2, 'Semi-hyperrealistic', 'A semi-hyperrealism portrait quality your loved ones will surely love!', 5000, 'icons/SHR_1.jpg', '2024-05-08 00:00:00'),
(3, 'Semi-hyperrealistic', 'A semi-hyperrealism portrait quality your loved ones will surely love!', 5000, 'icons/SHR_2.jpg', '2024-05-08 00:00:00'),
(4, 'Semi-hyperrealistic', 'A semi-hyperrealism portrait quality your loved ones will surely love!', 5000, 'icons/SHR_3.jpg', '2024-05-08 00:00:00'),
(5, 'Semi-hyperrealistic', 'A semi-hyperrealism portrait quality your loved ones will surely love!', 5000, 'icons/SHR_4.jpg', '2024-05-08 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `realistic`
--
ALTER TABLE `realistic`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `semi_hyperrealistic`
--
ALTER TABLE `semi_hyperrealistic`
  ADD PRIMARY KEY (`shr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `realistic`
--
ALTER TABLE `realistic`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semi_hyperrealistic`
--
ALTER TABLE `semi_hyperrealistic`
  MODIFY `shr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
