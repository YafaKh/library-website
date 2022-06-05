-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2022 at 12:58 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `Bid` int(11) NOT NULL,
  `Bname` varchar(30) NOT NULL,
  `section_id` int(11) NOT NULL,
  `shelf_num` int(11) NOT NULL,
  `Book_status` varchar(20) NOT NULL,
  PRIMARY KEY (`Bid`),
  KEY `section_id` (`section_id`),
  KEY `Book_status` (`Book_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Bid`, `Bname`, `section_id`, `shelf_num`, `Book_status`) VALUES
(100, 'c++', 1, 100236, 'available'),
(101, 'network', 1, 100237, 'reserved'),
(102, 'Palestinian Studies ', 2, 100134, 'borrowed'),
(103, 'physics', 3, 100437, 'reserved');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(30) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`) VALUES
(1, 'cs'),
(2, 'history'),
(3, 'science');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`) VALUES
('available'),
('borrowed'),
('reserved');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `spass` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `semail` (`semail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `semail`, `spass`) VALUES
(20191, 'yafa khateeb', 'y.khateeb@student.edu', '12345'),
(20192, 'rahaf hakam', 'r.hakam@student.edu', '12345'),
(20193, 'sabaa assaf', 's.assaf@student.edu', '12345');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`Book_status`) REFERENCES `status` (`status`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
