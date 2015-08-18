-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2015 at 05:36 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `game_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer_group`
--

CREATE TABLE IF NOT EXISTS `developer_group` (
  `Dev_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dev_Group_Name` varchar(20) NOT NULL,
  `Privacy` int(11) NOT NULL,
  `Company` varchar(20) NOT NULL,
  `Com_addr` varchar(50) NOT NULL,
  `Com_state` varchar(20) NOT NULL,
  `Com_postcode` varchar(10) NOT NULL,
  `Com_country` varchar(20) NOT NULL,
  `Com_phone` int(12) NOT NULL,
  `Com_fax` int(12) NOT NULL,
  `Group_email` varchar(35) NOT NULL,
  `Homepage` varchar(50) NOT NULL,
  `Articles` int(11) NOT NULL,
  `Media` int(11) NOT NULL,
  `Games` int(11) NOT NULL,
  `Modes` int(11) NOT NULL,
  PRIMARY KEY (`Dev_ID`),
  UNIQUE KEY `Dev_Group_Name` (`Dev_Group_Name`),
  UNIQUE KEY `Group_email` (`Group_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `developer_group`
--

INSERT INTO `developer_group` (`Dev_ID`, `Dev_Group_Name`, `Privacy`, `Company`, `Com_addr`, `Com_state`, `Com_postcode`, `Com_country`, `Com_phone`, `Com_fax`, `Group_email`, `Homepage`, `Articles`, `Media`, `Games`, `Modes`) VALUES
(1, 'Group 2', 0, 'No', '', '', '', '', 0, 0, '', '', 0, 0, 2, 0),
(2, 'Group 3', 1, 'No', '', '', '', '', 0, 0, 'xaxa@hotmail.com', '', 1, 0, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
