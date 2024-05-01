-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2024 at 09:21 AM
-- Server version: 10.5.22-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m457g965`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordno` int(11) NOT NULL,
  `month` varchar(32) DEFAULT NULL,
  `cid` varchar(32) DEFAULT NULL,
  `aid` varchar(32) DEFAULT NULL,
  `pid` varchar(32) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `dollars` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordno`, `month`, `cid`, `aid`, `pid`, `qty`, `dollars`) VALUES
(1011, 'jan', 'c001', 'a01', 'p01', 1000, 450),
(1012, 'jan', 'c001', 'a01', 'p01', 1000, 450),
(1013, 'jan', 'c002', 'a03', 'p03', 1000, 880),
(1014, 'jan', 'c003', 'a03', 'p05', 1200, 1104),
(1015, 'jan', 'c003', 'a03', 'p05', 1200, 1104),
(1016, 'jan', 'c006', 'a01', 'p01', 1000, 500),
(1017, 'feb', 'c001', 'a06', 'p03', 600, 540),
(1018, 'feb', 'c001', 'a03', 'p04', 600, 540),
(1019, 'feb', 'c001', 'a02', 'p02', 400, 180),
(1020, 'feb', 'c006', 'a03', 'p07', 600, 600),
(1021, 'feb', 'c004', 'a06', 'p01', 1000, 460),
(1022, 'mar', 'c001', 'a05', 'p06', 400, 720),
(1023, 'mar', 'c001', 'a04', 'p05', 500, 450),
(1024, 'mar', 'c006', 'a06', 'p01', 800, 400),
(1025, 'apr', 'c001', 'a05', 'p07', 800, 720),
(1026, 'may', 'c002', 'a05', 'p03', 800, 704);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordno`),
  ADD KEY `cid` (`cid`),
  ADD KEY `aid` (`aid`),
  ADD KEY `pid` (`pid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customers` (`cid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `agents` (`aid`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
