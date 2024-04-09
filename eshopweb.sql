-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 12:04 AM
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
  `items` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `totalprice`, `date`, `status`, `items`) VALUES
(5, 'a a', '1429', '2024-04-09 05:06:12', 'Approved', '{\"test\":3,\"3wa9\":2,\"smayer\":1}'),
(6, 'ahmed limam', '1770', '2024-04-09 22:54:04', 'Rejected', '{\"Desktop pc\":1,\"Coffee Machiine\":1,\"TV\":1,\"Wii\":1,\"Blender\":2}');

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
(44, 'Laptooop', 'pc', 50, 'another one ', 'image1.jpg', 10),
(45, 'Coffee Machiine', 'electromenager', 60, 'capucin', 'image2.jpg', 15),
(46, 'TV beatiful', 'tv', 70, 'i like it', 'image3.jpg', 20),
(47, 'PS4', 'console', 55, 'Playstation 4', 'image4.jpg', 12),
(48, 'laptop idk', 'pc', 65, 'good or idk', 'image5.jpg', 18),
(49, '3DS', 'console', 75, '3DDDD', 'image6.jpg', 22),
(50, 'WOOWW pc ', 'pc', 45, 'very good', 'image7.jpg', 14),
(51, 'vacuum', 'electromenager', 60, 'fwoosh', 'image8.jpg', 17),
(52, 'XBOX 360', 'console', 70, 'microsoft', 'image9.jpg', 25),
(53, 'RGB PC', 'pc', 80, 'RGB', 'image10.jpg', 30),
(54, 'Atari', 'console', 90, 'very nice', 'image11.jpg', 35),
(55, 'Washing Machine', 'electromenager', 100, 'cleans', 'image12.jpg', 40),
(56, 'MSI Laptop', 'pc', 110, 'gaming', 'image13.jpg', 45),
(57, 'DS', 'console', 120, 'DSSSS', 'image14.jpg', 50),
(58, 'PS1', 'console', 130, 'first one', 'image15.jpg', 55),
(59, 'PSP ', 'console', 140, 'good one ', 'image16.jpg', 60),
(60, 'Wii', 'console', 150, 'blue Wii', 'image17.jpg', 65),
(61, 'TV plasma', 'tv', 160, 'big', 'image18.jpg', 70),
(62, 'wow laptop', 'pc', 170, 'wow', 'image19.jpg', 75),
(63, 'Blender', 'electromenager', 180, 'good blender', 'image20.jpg', 80),
(64, 'Gaming PC', 'pc', 190, 'wow', 'image21.jpg', 85),
(65, 'Smart TV', 'tv', 200, 'so smart', 'image22.jpg', 90),
(66, 'Air fryer', 'electromenager', 210, 'good quality', 'image23.jpg', 95),
(67, 'Nature TV ', 'tv', 220, 'nice', 'image24.jpg', 100),
(68, 'Laptop w', 'pc', 230, 'Laptop good', 'image25.jpg', 105),
(69, 'TV lol', 'tv', 240, 'TVVV', 'image26.jpg', 110),
(70, 'WOW TV', 'tv', 250, 'tv', 'image27.jpg', 115),
(71, 'more PS5', 'console', 260, 'Another one', 'image28.jpg', 120),
(72, 'PS5', 'pc', 270, 'Playstation 5', 'image29.jpg', 125),
(73, 'GameCube', 'console', 280, 'Nintendo Gamecube', 'image30.jpg', 130),
(74, 'PS3', 'console', 290, 'Playstation 3', 'image31.jpg', 135),
(75, 'Dreamcast', 'console', 300, 'Dreamcast Console', 'image32.jpg', 140),
(76, 'Gaming PC ', 'pc', 310, 'Purple', 'image33.jpg', 145),
(77, 'TV color', 'tv', 320, 'Colorful TV', 'image34.jpg', 150),
(78, 'TV again', 'tv', 330, 'More TV', 'image35.jpg', 155),
(79, 'Oven', 'electromenager', 340, 'Oven', 'image36.jpg', 160),
(80, 'Microwave', 'electromenager', 350, 'New Microwave', 'image37.jpg', 165),
(81, 'Laptop', 'pc', 360, 'Grey Laptop', 'image38.jpg', 170),
(82, 'TV', 'tv', 370, 'OLED TV', 'image39.jpg', 175),
(83, 'Heater', 'electromenager', 380, 'Good Heater', 'image40.jpg', 0),
(84, 'Red Blender', 'electromenager', 390, 'Red Blender', 'image41.jpg', 0),
(85, 'PS2', 'console', 400, 'Playstation 2', 'image42.jpg', 190),
(86, 'Desktop pc', 'pc', 410, 'Modern computer\r\n', 'image43.jpg', 195),
(87, 'Nintendo Switch', 'console', 420, 'Nintendo switch', 'image44.jpg', 200),
(88, 'TV1', 'tv', 430, 'Old TV', 'image45.jpg', 205);

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
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
