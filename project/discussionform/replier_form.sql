-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 01:16 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `replier_form`
--

CREATE TABLE `replier_form` (
  `Q_id` int(8) DEFAULT NULL,
  `Id` varchar(20) DEFAULT NULL,
  `type` varchar(90) DEFAULT NULL,
  `replier_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Replier_Comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replier_form`
--

INSERT INTO `replier_form` (`Q_id`, `Id`, `type`, `replier_date`, `Replier_Comment`) VALUES
(4, 'khannajeeb362@gmail.', 'student', '2017-04-30 11:05:58', ' The base class is the more general and the derived is more specialised');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `replier_form`
--
ALTER TABLE `replier_form`
  ADD KEY `Q_id` (`Q_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `replier_form`
--
ALTER TABLE `replier_form`
  ADD CONSTRAINT `replier_form_ibfk_1` FOREIGN KEY (`Q_id`) REFERENCES `discussion_form` (`Q_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
