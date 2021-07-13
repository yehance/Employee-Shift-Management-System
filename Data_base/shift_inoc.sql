-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2020 at 11:22 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shift_inoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_p`
--

DROP TABLE IF EXISTS `admin_p`;
CREATE TABLE IF NOT EXISTS `admin_p` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_p`
--

INSERT INTO `admin_p` (`id`, `username`, `password`) VALUES
(1, 'inoc', '$2y$10$YdfyAQ0bJxycsdk3TZLnIOEXksNJs5pb3TS1JdwqOwzOgtFNMyPAW'),
(2, 'lanka', '$2y$04$l/cXEieJhcEOn7VQCUgauOuWC.leKajbf6U3ZEZcKeGRIMbKE7Xo.');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_no` varchar(4) NOT NULL,
  `call_name` varchar(15) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `sservice` varchar(50) NOT NULL,
  `llevel` varchar(50) NOT NULL,
  `category` varchar(12) NOT NULL,
  `join_date` varchar(12) NOT NULL,
  `nic_num` varchar(20) NOT NULL,
  `vehicle_num` varchar(10) NOT NULL,
  `aaddress` varchar(100) NOT NULL,
  `home_tpn` varchar(12) NOT NULL,
  `close_police` varchar(15) NOT NULL,
  `t_size` varchar(5) NOT NULL,
  `mobile_num` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sstatus` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
CREATE TABLE IF NOT EXISTS `shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_s` date NOT NULL,
  `shift` varchar(10) NOT NULL,
  `team_leader` varchar(15) NOT NULL,
  `core` varchar(15) NOT NULL,
  `transmission` varchar(15) NOT NULL,
  `report` varchar(15) NOT NULL,
  `huawei_1` varchar(15) NOT NULL,
  `huawei_2` varchar(15) NOT NULL,
  `zte_1` varchar(15) NOT NULL,
  `zte_2` varchar(15) NOT NULL,
  `extra_work` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_p`
--

DROP TABLE IF EXISTS `user_p`;
CREATE TABLE IF NOT EXISTS `user_p` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_p`
--

INSERT INTO `user_p` (`id`, `username`, `password`) VALUES
(1, 'kushan', '$2y$04$qjedz9RcAQ77hyqqzJTb0ueOtDeIGD..a6t6D5IBANDuIpn.zI0wS'),
(2, 'shavinda', '$2y$04$zdNkp2Rsv29dsz6qLDIa5ul7gEbWz8kAOD4odxS1zIzcBjB9WIQt.'),
(3, 'user', '$2y$10$YdfyAQ0bJxycsdk3TZLnIOEXksNJs5pb3TS1JdwqOwzOgtFNMyPAW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
