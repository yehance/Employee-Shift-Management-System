-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2020 at 03:51 AM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_no`, `call_name`, `full_name`, `designation`, `sservice`, `llevel`, `category`, `join_date`, `nic_num`, `vehicle_num`, `aaddress`, `home_tpn`, `close_police`, `t_size`, `mobile_num`, `email`, `sstatus`) VALUES
(1, '10', 'Kushan', 'Kushan Lakmal Silva', 'Technical Officer', 'Mobitel', 'Transmission', 'Mobize', '2020-03-25', '932256487V', 'AAB-4616', 'ukwaththage mawatha, dambara, meewanapanalana, horana.', '0716984032', 'Horana', 'XL', '0716985421', 'kushan93@gmail.com', 'Suspend'),
(3, '11', 'yehan ', 'yehan chandika ukwaththage', 'engineer', '5', '4', 'Mobitel', '2020-08-07', '952202383V', 'KD-2582', '89/3,pannipitiya,colombo 04', '0942255087', 'Diulapitiya', 'M', '0761115150', 'uychandika95@gmail.com', 'active'),
(4, '12', 'lakmal', 'lakmal suranga bandara', 'technical officer', '3', '4', 'Mobitel', '2020-04-12', '958746321V', 'ABB-4616', '98/7,windsor ave, colombo 04', '0345876214', 'Narahenpita', 'S', '0715846237', 'lakmal@gmail.com', 'active'),
(5, '13', 'sanath', 'sanath zoysa', 'technical officer', '1', '4', 'Mobitel', '2020-08-07', '965436573V', 'KD-2582', '\"Samitha\",Ukwaththage Mawatha,Dambara,Meewanapalana', '0716984032', 'panadura', 'L', '0716984032', 'yehanrulzs@gmail.com', 'Suspend');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
CREATE TABLE IF NOT EXISTS `shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `date`, `shift`, `team_leader`, `core`, `transmission`, `report`, `huawei_1`, `huawei_2`, `zte_1`, `zte_2`, `extra_work`) VALUES
(1, '2020-03-09', 'Day', 'Rasun', 'Savinda', 'Mahesh', 'Chamini', 'Nandana', 'Bihan', 'Udaka', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
