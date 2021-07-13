-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2021 at 08:25 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_p`
--

INSERT INTO `admin_p` (`id`, `username`, `password`) VALUES
(1, 'inoc', '$2y$04$3jqkqsc0vUbV701BSdPU.eQ1YxKjcdA6ZAhUCkiUOiD1MnkGfBbC2'),
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_no`, `call_name`, `full_name`, `designation`, `sservice`, `llevel`, `category`, `join_date`, `nic_num`, `vehicle_num`, `aaddress`, `home_tpn`, `close_police`, `t_size`, `mobile_num`, `email`, `sstatus`) VALUES
(1, '12', 'chandima', '', 'engineer', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(2, '13', 'yehan', '', 'engineer', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(3, '', 'suranga', '', 'engineer', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(4, '', 'kushan', '', 'technician', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(5, '', 'Malith', '', 'eng', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(6, '', 'Sohan', '', 'eng', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(7, '', 'Yoshitha', '', 'eng', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(8, '', 'Namal', '', 'eng', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(9, '', 'Rohitha', '', 'eng', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(10, '', 'Hemantha', '', 'tec', '', '', '', '', '', '', '', '', '', '', '', '', 'Active'),
(11, '26', 'shaveen', 'shaveen de silva', 'tec', '2', '5', 'INOC', '02/10/2017', '6544213658v', '', 'ganaga, sadara lane, colombo 13', '', '', '', '', '', 'Active'),
(12, '52', 'Mahinda', 'Maginda yapa suraweera', 'eng', '3', '4', 'INOC', '12/10/2020', '952208383v', 'BBB-6542', 'hadala, mcqueen lane, weeraketiya', '', '', '', '', '', 'Active'),
(13, '78', 'Gotabaya', 'Athulathmudalige Gotabaya Singha', 'eng', '2', '5', 'INOC', '05/12/2018', '8566412395v', 'WE-6587', 'sisila, soorya uyana, hambantota', '0346662135', 'hambanthota', 'M', '0762225481', 'gotabaya@mobitel.lk', 'Suspend');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `up_date_time` datetime NOT NULL,
  `user` varchar(15) NOT NULL,
  `date_p` date NOT NULL,
  `shift` varchar(20) NOT NULL,
  `team_leader` varchar(15) NOT NULL,
  `station_1` varchar(15) NOT NULL,
  `station_2` varchar(15) NOT NULL,
  `station_3` varchar(15) NOT NULL,
  `station_4` varchar(15) NOT NULL,
  `station_5` varchar(15) NOT NULL,
  `station_6` varchar(15) NOT NULL,
  `station_7` varchar(15) NOT NULL,
  `station_8` varchar(20) NOT NULL,
  `station_9` varchar(20) NOT NULL,
  `extra_work` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `up_date_time`, `user`, `date_p`, `shift`, `team_leader`, `station_1`, `station_2`, `station_3`, `station_4`, `station_5`, `station_6`, `station_7`, `station_8`, `station_9`, `extra_work`) VALUES
(1, '2020-12-01 07:38:08', 'user', '2020-09-10', 'N/M', 'yehan', 'Gotabaya', 'Yoshitha', 'Sohan', 'Malith', 'kushan', 'suranga', 'yehan', 'chandima', 'Wasudewa', 'None'),
(2, '2020-12-01 07:40:16', 'kushan', '2020-09-10', 'N/M', 'chandima', 'Gotabaya', 'Yoshitha', 'Sohan', 'Malith', 'kushan', 'suranga', 'yehan', 'chandima', 'Wasudewa', 'None');

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
  `on_call1` varchar(20) NOT NULL,
  `on_call2` varchar(20) NOT NULL,
  `extra_work` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `date_s`, `shift`, `team_leader`, `core`, `transmission`, `report`, `huawei_1`, `huawei_2`, `zte_1`, `zte_2`, `on_call1`, `on_call2`, `extra_work`) VALUES
(2, '2020-09-11', 'Night', 'chandima', 'chandima', 'yehan', 'Mahinda', 'Sohan', 'Yoshitha', 'Rohitha', 'Malith', 'kushan', 'suranga', ''),
(3, '2020-09-12', 'Morning', 'Mahinda', 'Malith', 'kushan', 'suranga', 'yehan', 'chandima', 'shaveen', 'Namal', 'Rohitha', 'Hemantha', ''),
(4, '2020-09-12', 'Day', 'shaveen', 'Mahinda', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha'),
(5, '2020-09-12', 'Night', 'Hemantha', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'shaveen'),
(6, '2020-09-13', 'Day', 'Rohitha', 'Namal', 'Yoshitha', 'Sohan', 'Malith', 'Malith', 'kushan', 'suranga', 'yehan', 'chandima', 'Mahinda'),
(7, '2020-09-13', 'Night', 'Namal', 'yehan', 'chandima', 'kushan', 'Malith', 'Sohan', 'Mahinda', 'Rohitha', 'Hemantha', 'shaveen', 'Yoshitha'),
(8, '2020-09-14', 'Morning', 'Yoshitha', 'chandima', 'Mahinda', 'yehan', 'shaveen', 'suranga', 'Hemantha', 'Rohitha', 'Malith', 'kushan', 'Namal'),
(9, '2020-09-14', 'Day', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'shaveen', 'Mahinda', 'chandima', 'yehan', 'kushan', 'Malith'),
(10, '2020-09-14', 'Night', 'Malith', 'kushan', 'suranga', 'yehan', 'chandima', 'Mahinda', 'shaveen', 'Yoshitha', 'Rohitha', 'Hemantha', ''),
(20, '2020-09-15', 'Day', 'suranga', 'yehan', 'chandima', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'shaveen'),
(12, '2021-01-15', 'Morning', 'kushan', 'chandima', 'yehan', 'suranga', 'Malith', 'Sohan', 'Yoshitha', 'Mahinda', 'shaveen', 'Hemantha', 'Namal'),
(21, '2020-09-15', 'Night', 'yehan', 'chandima', 'Mahinda', 'shaveen', 'Hemantha', 'Rohitha', 'Namal', 'Hemantha', 'shaveen', 'Mahinda', 'None'),
(22, '2020-09-16', 'Morning', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'None'),
(23, '2020-09-16', 'Day', 'Mahinda', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha'),
(24, '2020-09-16', 'Night', 'shaveen', 'Mahinda', 'Hemantha', 'Rohitha', 'Namal', 'Yoshitha', 'Malith', 'Sohan', 'kushan', 'suranga', 'yehan'),
(25, '2020-09-17', 'Morning', 'Hemantha', 'Mahinda', 'shaveen', 'Rohitha', 'Namal', 'Yoshitha', 'Sohan', 'Malith', 'kushan', 'suranga', 'yehan'),
(26, '2020-09-17', 'Day', 'Rohitha', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Hemantha', 'Mahinda', 'shaveen'),
(27, '2020-09-17', 'Night', 'Namal', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Rohitha', 'Hemantha', 'None'),
(28, '2020-09-18', 'Morning', 'Yoshitha', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Namal', 'Rohitha', 'Hemantha', 'shaveen'),
(29, '2020-09-18', 'Day', 'Sohan', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'shaveen'),
(30, '2020-09-18', 'Night', 'Malith', 'chandima', 'yehan', 'suranga', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Rohitha', 'None'),
(31, '2020-09-19', 'Morning', 'kushan', 'chandima', 'yehan', 'suranga', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'shaveen'),
(32, '2020-09-19', 'Day', 'suranga', 'chandima', 'yehan', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'None'),
(33, '2020-09-19', 'Night', 'yehan', 'chandima', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'shaveen'),
(34, '2020-09-20', 'Morning', 'yehan', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'shaveen');

-- --------------------------------------------------------

--
-- Table structure for table `shift_plan`
--

DROP TABLE IF EXISTS `shift_plan`;
CREATE TABLE IF NOT EXISTS `shift_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_p` date NOT NULL,
  `shift` varchar(10) NOT NULL,
  `team_leader` varchar(15) NOT NULL,
  `station_1` varchar(15) NOT NULL,
  `station_2` varchar(15) NOT NULL,
  `station_3` varchar(15) NOT NULL,
  `station_4` varchar(15) NOT NULL,
  `station_5` varchar(15) NOT NULL,
  `station_6` varchar(15) NOT NULL,
  `station_7` varchar(15) NOT NULL,
  `station_8` varchar(20) NOT NULL,
  `station_9` varchar(20) NOT NULL,
  `extra_work` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift_plan`
--

INSERT INTO `shift_plan` (`id`, `date_p`, `shift`, `team_leader`, `station_1`, `station_2`, `station_3`, `station_4`, `station_5`, `station_6`, `station_7`, `station_8`, `station_9`, `extra_work`) VALUES
(1, '2020-09-09', 'D', 'chandima', 'yehan', 'suranga', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'Wasudewa'),
(2, '2020-09-10', 'N/M', 'chandima', 'Gotabaya', 'Yoshitha', 'Sohan', 'Malith', 'kushan', 'suranga', 'yehan', 'chandima', 'Wasudewa', 'None'),
(3, '2020-09-11', 'D', 'kushan', 'Malith', 'Sohan', 'Yoshitha', 'Namal', 'Rohitha', 'Hemantha', 'Wasudewa', 'Mahinda', 'Gotabaya', 'yehan');

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
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_p`
--

INSERT INTO `user_p` (`id`, `username`, `password`) VALUES
(1, 'kushan', '$2y$04$qjedz9RcAQ77hyqqzJTb0ueOtDeIGD..a6t6D5IBANDuIpn.zI0wS'),
(2, 'shavinda', '$2y$04$zdNkp2Rsv29dsz6qLDIa5ul7gEbWz8kAOD4odxS1zIzcBjB9WIQt.'),
(3, 'user', '$2y$04$l6NYLK.mo6jJyfIfDHzdle1DezTn1DTECn3Ww81B1Iv7kp.iI9T5S');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
