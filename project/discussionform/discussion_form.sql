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
-- Table structure for table `discussion_form`
--

CREATE TABLE `discussion_form` (
  `Q_id` int(8) NOT NULL,
  `C_id` int(2) DEFAULT NULL,
  `Id` varchar(20) DEFAULT NULL,
  `type` varchar(90) DEFAULT NULL,
  `q_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_form`
--

INSERT INTO `discussion_form` (`Q_id`, `C_id`, `Id`, `type`, `q_date`, `Comment`) VALUES
(3, 2, 'khannajeeb362@gmail.', 'student', '2017-04-28 11:12:36', 'I like Programming'),
(4, 2, 'mehroz', 'student', '2017-04-30 10:55:58', 'why we do inheritance in C++');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discussion_form`
--
ALTER TABLE `discussion_form`
  ADD PRIMARY KEY (`Q_id`),
  ADD KEY `d_f_c` (`C_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discussion_form`
--
ALTER TABLE `discussion_form`
  MODIFY `Q_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `discussion_form`
--
ALTER TABLE `discussion_form`
  ADD CONSTRAINT `d_f_c` FOREIGN KEY (`C_id`) REFERENCES `courses` (`c_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
