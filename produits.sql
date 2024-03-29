-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 03:26 PM
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
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(99) NOT NULL,
  `name` varchar(99) NOT NULL,
  `category` varchar(99) NOT NULL,
  `price` int(99) NOT NULL,
  `description` varchar(99) NOT NULL,
  `image` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `name`, `category`, `price`, `description`, `image`) VALUES
(19, 'TV 1', 'TV', 3000, 'nice tv', 'uploads/TV 1_2024-03-29_143129.png'),
(20, 'TV 2', 'TV', 200, 'old tv', 'uploads/TV 2_2024-03-29_143150.png'),
(21, 'TV 3', 'TV', 5000, 'smart tv', 'uploads/TV 3_2024-03-29_143237.png'),
(22, 'PC 1', 'PC', 1000, 'modern pc', 'uploads/PC 1_2024-03-29_143327.png'),
(23, 'PC 2', 'PC', 3000, 'gaming pc', 'uploads/PC 2_2024-03-29_143347.png'),
(24, 'PC 3', 'PC', 9999, 'expensive pc', 'uploads/PC 3_2024-03-29_143454.png'),
(25, 'Headphones 1 ', 'Electronics', 200, 'black headphones', 'uploads/Headphones 1 _2024-03-29_143538.png'),
(26, 'Airpods 1', 'Electronics', 500, 'white airpoods', 'uploads/Airpods 1_2024-03-29_143618.png'),
(27, 'Charger 1', 'Electronics', 300, 'phone charger', 'uploads/Charger 1_2024-03-29_143709.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
