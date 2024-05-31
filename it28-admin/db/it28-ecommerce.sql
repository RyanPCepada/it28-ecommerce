-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 06:06 PM
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
(1, 'Jordan Spizike Low', 'Red Wolf Grey Anthracite', 8895, 8895, 50, 'https://parkaccess.com.ph/cdn/shop/files/AURORA_FQ1759-104_PHSLH000-2000.png?v=1710237075', '2024-05-08 00:00:00'),
(2, 'Air Max 270', 'White & Metallic Silver', 7645, 7645, 30, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/92602c29-51d2-4f77-6c3d-2214e53a5100/products', '2024-05-08 00:00:00'),
(3, 'Air Jordan 9 G', 'Black & White Golf Shoes', 11795, 11795, 40, 'https://www.nike.ae/dw/image/v2/BDVB_PRD/on/demandware.static/-/Sites-akeneo-master-catalog/default/dwd4215496/nk/33a/7/f/3/1/9/33a7f319_0774_48b1_94fa_0379fd6dd51c.png?sw=520&sh=520&sm=fit', '2024-05-08 00:00:00'),
(4, 'Nike Free Metcon 5', 'Plushed foam collar', 6120, 6120, 60, 'https://static.nike.com/a/images/t_default/fa4f0b28-7812-4929-a0cb-23f4ca491da7/free-metcon-5-workout-shoes-tskT5j.png', '2024-05-08 00:00:00'),
(5, 'Air Jordan 1 Low SE', 'White & Beige Rocky', 6895, 6895, 20, 'https://www.footlocker.ph/media/catalog/product/0/8/0803-NIKDZ413020170010H-2.jpg', '2024-05-08 00:00:00'),
(6, 'Nike Go FLyEase', 'Quick & Easy Get Into', 6375, 6375, 1, 'https://static.nike.com/a/images/t_default/da5de735-2044-4621-8d30-ba5d49c910a4/go-flyease-shoes-3svRCL.png', '2024-05-13 19:35:55'),
(7, 'Air Jordan 3 Retro', 'Premium & Synthetic Leather', 10200, 10200, 1, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/b7c0c542-3a79-4bb9-dce4-39be6f6b6800/product', '2024-05-13 19:39:14'),
(8, 'Nike React Phantom Run Flyknit 2', 'Black & White Carbon', 7650, 7650, 1, 'https://i.ebayimg.com/images/g/4l4AAOSwzmBi42Kv/s-l1200.webp', '2024-05-13 19:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
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
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Air Max 270', 'White & Metallic Silver', 7645, 0, 1, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/92602c29-51d2-4f77-6c3d-2214e53a5100/products', '2024-05-31 15:58:54'),
(2, 'Air Jordan 1 Low SE', 'White & Beige Rocky', 6895, 0, 1, 'https://www.footlocker.ph/media/catalog/product/0/8/0803-NIKDZ413020170010H-2.jpg', '2024-05-31 16:00:10'),
(3, 'Air Max 270', 'White & Metallic Silver', 7645, 0, 2, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/92602c29-51d2-4f77-6c3d-2214e53a5100/products', '2024-05-31 16:00:27'),
(4, 'Air Max 270', 'White & Metallic Silver', 7645, 0, 1, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/92602c29-51d2-4f77-6c3d-2214e53a5100/products', '2024-05-31 16:52:05'),
(5, 'Nike React Phantom Run Flyknit 2', 'Black & White Carbon', 7650, 0, 1, 'https://i.ebayimg.com/images/g/4l4AAOSwzmBi42Kv/s-l1200.webp', '2024-05-31 16:52:22'),
(6, 'Air Max 270', 'White & Metallic Silver', 7645, 0, 2, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/92602c29-51d2-4f77-6c3d-2214e53a5100/products', '2024-05-31 17:34:24'),
(7, 'Nike Free Metcon 5', 'Plushed foam collar', 6120, 0, 2, 'https://static.nike.com/a/images/t_default/fa4f0b28-7812-4929-a0cb-23f4ca491da7/free-metcon-5-workout-shoes-tskT5j.png', '2024-05-31 17:34:24'),
(8, 'Jordan Spizike Low', 'Red Wolf Grey Anthracite', 8895, 0, 2, 'https://parkaccess.com.ph/cdn/shop/files/AURORA_FQ1759-104_PHSLH000-2000.png?v=1710237075', '2024-05-31 17:40:03'),
(9, 'Air Jordan 9 G', 'Black & White Golf Shoes', 11795, 0, 1, 'https://www.nike.ae/dw/image/v2/BDVB_PRD/on/demandware.static/-/Sites-akeneo-master-catalog/default/dwd4215496/nk/33a/7/f/3/1/9/33a7f319_0774_48b1_94fa_0379fd6dd51c.png?sw=520&sh=520&sm=fit', '2024-05-31 17:40:03'),
(10, 'Nike Go FLyEase', 'Quick & Easy Get Into', 6375, 0, 2, 'https://static.nike.com/a/images/t_default/da5de735-2044-4621-8d30-ba5d49c910a4/go-flyease-shoes-3svRCL.png', '2024-05-31 17:40:03'),
(11, 'Air Jordan 3 Retro', 'Premium & Synthetic Leather', 10200, 0, 1, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/b7c0c542-3a79-4bb9-dce4-39be6f6b6800/product', '2024-05-31 17:41:51'),
(12, 'Air Jordan 3 Retro', 'Premium & Synthetic Leather', 10200, 0, 1, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/b7c0c542-3a79-4bb9-dce4-39be6f6b6800/product', '2024-05-31 17:46:28'),
(13, 'Nike Free Metcon 5', 'Plushed foam collar', 6120, 0, 2, 'https://static.nike.com/a/images/t_default/fa4f0b28-7812-4929-a0cb-23f4ca491da7/free-metcon-5-workout-shoes-tskT5j.png', '2024-05-31 17:47:31'),
(14, 'Air Jordan 1 Low SE', 'White & Beige Rocky', 6895, 0, 1, 'https://www.footlocker.ph/media/catalog/product/0/8/0803-NIKDZ413020170010H-2.jpg', '2024-05-31 17:47:31'),
(15, 'Nike React Phantom Run Flyknit 2', 'Black & White Carbon', 7650, 0, 2, 'https://i.ebayimg.com/images/g/4l4AAOSwzmBi42Kv/s-l1200.webp', '2024-05-31 17:47:31'),
(16, 'Nike React Phantom Run Flyknit 2', 'Black & White Carbon', 7650, 0, 1, 'https://i.ebayimg.com/images/g/4l4AAOSwzmBi42Kv/s-l1200.webp', '2024-05-31 17:50:11'),
(17, 'Air Jordan 3 Retro', 'Premium & Synthetic Leather', 10200, 0, 1, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/b7c0c542-3a79-4bb9-dce4-39be6f6b6800/product', '2024-05-31 17:55:10'),
(18, 'Nike React Phantom Run Flyknit 2', 'Black & White Carbon', 7650, 0, 1, 'https://i.ebayimg.com/images/g/4l4AAOSwzmBi42Kv/s-l1200.webp', '2024-05-31 17:55:10'),
(19, 'Air Max 270', 'White & Metallic Silver', 7645, 0, 1, 'https://imagedelivery.net/2DfovxNet9Syc-4xYpcsGg/92602c29-51d2-4f77-6c3d-2214e53a5100/products', '2024-05-31 17:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'ArsyArts', 'MyP@ssw0rd!', '2024-04-29 18:11:30'),
(2, 'RyanPCepada', '$2y$10$4h2lDjrNP6OY3ZGe0Mq0l.Mt2hRTZfB2WgOKc5jTJ8EggQzVK16pK', '2024-04-29 18:48:18'),
(3, 'Admin', '$2y$10$F34upkSNZAC2k6Lejv5Zuu1fKGvgPnRC7XE/sent2XWIy/rkvxJie', '2024-04-29 18:49:25'),
(4, 'Mark', '$2y$10$imZlw4QLmE2WmfLhYg.QQ.AowFniFRsj26766e.DXLB1/K50I4sEW', '2024-04-29 18:52:31'),
(5, 'RCngBayan', '$2y$10$3Rbf6ilR/ohbMULMQZ33w.Db9FVnvfavhQvi4Jn3a76NHST4WHT2u', '2024-05-01 22:19:28'),
(6, 'Ryan', '$2y$10$vX7Eb7LUWULfmjjFmN08O.6pA89m.v3anF//n27iO9VC3F9OHf21e', '2024-05-31 21:04:46'),
(7, 'sample', '$2y$10$cLkcu.oVYNoy..IMYBfZk.KgT7joIn8v9mJwRmthI79rpb3CYKYQC', '2024-05-31 21:07:10'),
(8, 'sample2', '$2y$10$jCYrnVWSDWksVL1ocN2Ue.aJ7T.yWPkptb33HIfNLxZB/wzUSeiYK', '2024-05-31 21:07:34'),
(9, 'sample3', '$2y$10$4oo3zG5/tcbX0ZDf/u9gserjIuPcyCFvPZmLj5PZhQZ.G7D2U76O2', '2024-05-31 21:07:56'),
(10, 'sample4', '$2y$10$eVZ/H2DxmaXnPVcXj1UMAOWXeahCcEtkvmqYl93iCRF1fozv2baa2', '2024-05-31 21:08:11'),
(11, 'sample5', '$2y$10$Lf0FsNtR9s/9SlIJ7HzUouXX9gl2kKHLe8q5b48yLwJmzCybwdYI6', '2024-05-31 21:08:27'),
(12, 'sample6', '$2y$10$YsRynryQjfrzcs4aGqGtku0z/JhLrBWQPfVarPrLOd5YZ99hOLLfW', '2024-05-31 21:08:50'),
(13, 'sample7', '$2y$10$8KrJ2O8QUJqnhzS7.rIS4.UBUYsP1BCOx5qhIdGqU/nWivU2FMmEG', '2024-05-31 21:09:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
