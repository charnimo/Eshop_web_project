-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 07:13 AM
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
-- Database: `eshopweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(99) NOT NULL,
  `customer` varchar(99) NOT NULL,
  `totalprice` varchar(99) NOT NULL,
  `date` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL,
  `items` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `totalprice`, `date`, `status`, `items`) VALUES
(5, 'a a', '1429', '2024-04-09 05:06:12', 'Approved', '{\"test\":3,\"3wa9\":2,\"smayer\":1}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(99) NOT NULL,
  `name` varchar(99) NOT NULL,
  `category` varchar(99) NOT NULL,
  `price` int(99) NOT NULL,
  `description` varchar(99) NOT NULL,
  `image` varchar(99) NOT NULL,
  `quantite` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `image`, `quantite`) VALUES
(36, 'smayer', 'pc', 999, 'test\r\n', 'IMGBN60140samir.jpg', 998),
(41, 'obama', 'pc', 20, '20', 'samir (5).jpg', 0),
(42, '3wa9yo', 'pc', 200, 'test wg gggg', 'el3oou9.jpg', 48);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(0, 'admin', 'admin@admin.admin', '$2y$10$PCjCUXkblXH1IiZJ5g3tCu058cmm1IOuzr6LPZDdrjb6USOzbC2pm'),
(13, 'testo', 'testo@gg.gg', '$2y$10$XrQE8iSU1.vFbeLp6Xta0OEadMl1iuQ4TTiIEraQitLcIzQYL5s1i'),
(14, 'gg', 'nitesi6922@klanze.com', '$2y$10$RgHWLvgqOkXT5R8olhJ4euAhFuh0a1FfPRIWq.gmkbbfZCiCkMeS2'),
(15, 'momo', 'test@test', '$2y$10$I3XUWOhtQ7ytnxLg71ZnYuRqxmHrblH6M8QzhsSLCL.Z4osh3eEia'),
(16, 'obame', 'obame@gg.gg', '$2y$10$MJ1j6JkC80FFiRCCMrZoOOg4slVySzuCdLpIwljrKCNqN.rt4J6Fy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
