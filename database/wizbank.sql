-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 10:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wizbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `acc` bigint(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `balance` bigint(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `acc`, `name`, `email`, `password`, `phone`, `balance`, `dt`) VALUES
(1, 1025210248, 'Hassan Samo', 'hassansamo609@gmail.com', '$2y$10$cAnUWcIN21WsDTZqleb3m.80W5lj33Rfkye1NpTEVjdeB.jtSma5W', '03153074620', 0, '2024-05-04 21:41:07'),
(2, 5254549754, 'Abdul Kabeer Mughal', 'kabeer.mughal@hotmail.com', '$2y$10$9nKS/LEnJj9HX7V8G5SIcOshFPiodpSoqwHYXglHltR7ptSHIr0EC', '03153074621', 40, '2024-05-04 21:41:50'),
(3, 7571005551, 'Saieen', 'saieen@sindh.com', '$2y$10$ldhmVso5/qJul/U4jZzIoeduAirLy8/LivlMPAD6WCw7i4nmB1aQi', '03153074622', 100, '2024-05-04 21:42:13'),
(4, 1975710154, 'Aamir Magsi', 'magsi@gmail.com', '$2y$10$S88vHXPdg9UzSe8UbVeOwevtIS6ktIGCRiOc.xJoyE3.eCadKgyne', '55555555555', 0, '2024-05-17 19:31:41'),
(5, 1555310198, 'new account', 'newemail@123.com', '$2y$10$vucNqCqauN/5sYzg3c3/6uZHjyiiXZ0adNvgwT8hQJcoWPxYUIc5C', '55555555555', 0, '2024-05-17 19:35:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
