-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 10:22 PM
-- Server version: 10.4.10-MariaDB
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
-- Database: `society-management-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Details of complaints logged';

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user`, `description`, `title`, `status`, `date`) VALUES
(1, 23, 'DESC', 'title2', 0, '2019-12-16'),
(2, 23, 'SECOND', 'SECOND', 1, '2019-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL COMMENT 'in sq. ft.',
  `rented` tinyint(1) DEFAULT NULL,
  `parking` int(11) NOT NULL,
  `society` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Data about houses in a society';

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `size`, `rented`, `parking`, `society`, `type`) VALUES
(18, 2, 1, 12331, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hometypes`
--

CREATE TABLE `hometypes` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'Residential'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hometypes`
--

INSERT INTO `hometypes` (`id`, `type`) VALUES
(3, 'Residential'),
(4, 'Commercial');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `societyId` int(11) NOT NULL,
  `houseId` int(11) NOT NULL,
  `isOwner` tinyint(1) NOT NULL,
  `onCommitte` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Data about members in societies';

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `societyId`, `houseId`, `isOwner`, `onCommitte`) VALUES
(23, 'name', 10, 18, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `society_list`
--

CREATE TABLE `society_list` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(150) NOT NULL,
  `chairman` varchar(45) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Data of societies under the organization';

--
-- Dumping data for table `society_list`
--

INSERT INTO `society_list` (`id`, `name`, `address`, `chairman`, `phone`) VALUES
(10, 'Society 1', 'add,', 'chairman', 1234567890),
(11, 'Society 1', 'add, add, add, add', 'chairman12', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `society` (`society`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `hometypes`
--
ALTER TABLE `hometypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `societyId` (`societyId`),
  ADD KEY `houseId` (`houseId`);

--
-- Indexes for table `society_list`
--
ALTER TABLE `society_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hometypes`
--
ALTER TABLE `hometypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `society_list`
--
ALTER TABLE `society_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `homes_ibfk_1` FOREIGN KEY (`society`) REFERENCES `society_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `homes_ibfk_2` FOREIGN KEY (`type`) REFERENCES `hometypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`houseId`) REFERENCES `homes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`societyId`) REFERENCES `society_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
