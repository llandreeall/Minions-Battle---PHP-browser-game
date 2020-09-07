-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 11:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minionsbattle`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `Id` int(11) NOT NULL,
  `Winner` varchar(11) NOT NULL,
  `Loser` varchar(11) NOT NULL,
  `No_of_rounds` int(11) NOT NULL,
  `Winner_health` int(11) NOT NULL,
  `Loser_health` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`Id`, `Winner`, `Loser`, `No_of_rounds`, `Winner_health`, `Loser_health`) VALUES
(6, 'THE EVIL', 'TIM', 9, 46, 0),
(7, 'TIM', 'THE EVIL', 5, 63, 0),
(8, 'TIM', 'THE EVIL', 9, 21, 0),
(9, 'THE EVIL', 'TIM', 7, 40, 0),
(10, 'THE EVIL', 'TIM', 9, 31, 0),
(11, 'THE EVIL', 'TIM', 5, 28, 0),
(12, 'THE EVIL', 'TIM', 5, 15, 0),
(13, 'THE EVIL', 'TIM', 18, 10, 0),
(14, 'TIM', 'THE EVIL', 16, 34, 0),
(15, 'THE EVIL', 'TIM', 6, 39, 0),
(16, 'TIM', 'THE EVIL', 5, 49, 0),
(17, 'TIM', 'THE EVIL', 10, 47, 0),
(18, 'THE EVIL', 'TIM', 8, 5, 0),
(19, 'TIM', 'THE EVIL', 5, 56, 0),
(20, 'THE EVIL', 'TIM', 8, 18, 0),
(21, 'THE EVIL', 'TIM', 5, 19, 0),
(22, 'THE EVIL', 'TIM', 10, 39, 0),
(23, 'TIM', 'THE EVIL', 7, 19, 0),
(24, 'TIM', 'THE EVIL', 11, 4, 0),
(25, 'THE EVIL', 'TIM', 13, 13, 0),
(26, 'THE EVIL', 'TIM', 5, 43, 0),
(28, 'TIM', 'THE EVIL', 5, 60, 0),
(29, 'TIM', 'THE EVIL', 7, 6, 0),
(30, 'TIM', 'THE EVIL', 7, 50, 0),
(31, 'THE EVIL', 'TIM', 5, 62, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
