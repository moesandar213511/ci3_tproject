-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Jul 22, 2021 at 06:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3_tproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `backenduser`
--

CREATE TABLE `backenduser` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active 0=>Blocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='login/register users';

--
-- Dumping data for table `backenduser`
--

INSERT INTO `backenduser` (`uid`, `username`, `email`, `password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '1234567', 1),
(2, 'moe lay', 'moe@gmail.com', '1234567', 1),
(3, 'mon lay', 'monlay@gmail.com', '12345678', 1),
(4, 'mya pwint', 'myapwint@gmail.com', '12345678', 1),
(5, 'mm', 'mm@gmail.com', '12345678', 1),
(6, 'apyonelay', 'apyonelay@gmail.com', '1234567', 1),
(7, 'Aung Thu', 'aungthu@gmail.com', '1234567', 1),
(8, 'aa', 'aa@gmail.com', '123456789', 1),
(9, 'bb', 'bb@gmail.com', '12345678', 1),
(10, 'ngu war', 'nguwar@gmail.com', '12345678', 1),
(11, 'pp', 'pp@gmail.com', '12345678', 1),
(12, 'cc', 'cc@gmail.com', '12345678', 1),
(13, 'uu', 'uu@gmail.com', '12345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(11) NOT NULL,
  `blogname` varchar(255) DEFAULT NULL,
  `blogdesc` text,
  `blogimg` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backenduser`
--
ALTER TABLE `backenduser`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backenduser`
--
ALTER TABLE `backenduser`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
