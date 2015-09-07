-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2015 at 12:22 PM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_usrname` varchar(16) NOT NULL,
  `Admin_pswrd` varchar(20) NOT NULL,
  `Admin_contact` int(11) NOT NULL,
  `Admin_IC` int(16) NOT NULL,
  `Post` int(11) NOT NULL,
  `Admin_Access` int(11) NOT NULL,
  PRIMARY KEY (`Admin_ID`),
  UNIQUE KEY `Admin_usrname` (`Admin_usrname`),
  UNIQUE KEY `Admin_IC` (`Admin_IC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Order_ID` int(11) NOT NULL,
  `Game_name` varchar(20) NOT NULL,
  `Game_price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `User_ID` int(11) NOT NULL,
  `Dev_ID` int(11) NOT NULL,
  KEY `User_ID` (`User_ID`),
  KEY `Dev_ID` (`Dev_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `Game_Register_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dev_Group_Name` varchar(20) NOT NULL,
  `Game_name` varchar(20) NOT NULL,
  `Game_prequel` varchar(20) NOT NULL,
  `Expansion` varchar(20) NOT NULL,
  `Game_style` varchar(20) NOT NULL,
  `Game_theme` varchar(20) NOT NULL,
  `Game_type` varchar(20) NOT NULL,
  `Release_date` date NOT NULL,
  `Game_homepage` varchar(50) NOT NULL,
  `Articles` int(11) NOT NULL,
  `Media` int(11) NOT NULL,
  `Mods` int(11) NOT NULL,
  `Game_price` float NOT NULL,
  `Game_image` varchar(60) NOT NULL,
  `Game_icon` varchar(50) NOT NULL,
  `Game_boxshot` varchar(50) NOT NULL,
  `Game_previewImg` varchar(50) NOT NULL,
  `Game_headerImg` varchar(50) NOT NULL,
  PRIMARY KEY (`Game_Register_ID`),
  UNIQUE KEY `Game_name` (`Game_name`),
  KEY `Dev_Group_Name` (`Dev_Group_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`Game_Register_ID`, `Dev_Group_Name`, `Game_name`, `Game_prequel`, `Expansion`, `Game_style`, `Game_theme`, `Game_type`, `Release_date`, `Game_homepage`, `Articles`, `Media`, `Mods`, `Game_price`, `Game_image`, `Game_icon`, `Game_boxshot`, `Game_previewImg`, `Game_headerImg`) VALUES
(1, 'Group 2', 'Dota2', 'Warcraft3', '', 'RP', 'War', 'SP&MP', '2013-07-09', 'http://localhost/phppages/d2.php', 0, 1, 0, 48.99, 'dota-2.jpg', '', '', '', ''),
(2, 'Group 2', 'BattleField4', 'BattleField', '', 'FPS', 'War', 'SP&MP', '2013-10-29', 'http://www.battlefield.com/battlefield-4', 1, 0, 0, 117.99, 'b4box.jpg', '', '', '', ''),
(3, 'Group 3', 'SDO Season 3', 'SDO', '', 'Alternative', 'Anime', 'MP', '2013-06-07', 'http://www.sdox.cibmall.net/', 1, 0, 0, 90, 'sdo-3.png', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `game_register`
--

CREATE TABLE IF NOT EXISTS `game_register` (
  `Game_register_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_ID` int(11) NOT NULL,
  `Dev_ID` int(11) NOT NULL,
  `Game_approval` int(11) NOT NULL,
  PRIMARY KEY (`Game_register_ID`),
  KEY `Admin_ID` (`Admin_ID`),
  KEY `Dev_ID` (`Dev_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_approve`
--

CREATE TABLE IF NOT EXISTS `group_approve` (
  `Admin_ID` int(11) NOT NULL,
  `Dev_ID` int(11) NOT NULL,
  `Register_approve` int(11) NOT NULL,
  KEY `Admin_ID` (`Admin_ID`),
  KEY `Dev_ID` (`Dev_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `Order_ID` int(11) NOT NULL,
  `Order_date` int(11) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `Payment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Payment_date` date NOT NULL,
  `Price` decimal(3,2) NOT NULL,
  `Method_of_payment` int(11) NOT NULL,
  PRIMARY KEY (`Payment_ID`),
  KEY `Order_ID` (`Order_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `image` longblob NOT NULL,
  `User_usrname` varchar(16) NOT NULL,
  `User_pswrd` varchar(20) NOT NULL,
  `User_email` varchar(35) NOT NULL,
  `User_contact` int(11) NOT NULL,
  `User_secQ` int(1) NOT NULL,
  `User_secA` varchar(10) NOT NULL,
  `Dev_grouptag` int(11) DEFAULT NULL,
  `User_Fname` varchar(20) NOT NULL,
  `User_Lname` varchar(20) NOT NULL,
  `User_address` varchar(50) NOT NULL,
  `User_state` varchar(20) NOT NULL,
  `User_postcode` int(10) NOT NULL,
  `User_country` varchar(20) NOT NULL,
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `User_usrname` (`User_usrname`),
  UNIQUE KEY `User_email` (`User_email`),
  FULLTEXT KEY `User_pswrd` (`User_pswrd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `image`, `User_usrname`, `User_pswrd`, `User_email`, `User_contact`, `User_secQ`, `User_secA`, `Dev_grouptag`, `User_Fname`, `User_Lname`, `User_address`, `User_state`, `User_postcode`, `User_country`) VALUES
(1, '', 'qwqe', 'pop123', 'zzz123@gmail.com', 987654321, 5, 'acer', NULL, 'hello', 'qwe1234', '123bc', '', 43300, ''),
(2, 0x75706c6f6164732f2f7a68696e666f6e676d6f772e6a706567, '123444', '12345678', 'xiao.mow1994@gmail.com', 1234444444, 5, 'hp', NULL, 'Mow', 'Zhin Fong', 'No 35, Jalan BS 10/4, Taman Bukit Serdang', 'Selangor', 63300, 'Malaysia'),
(3, 0x75706c6f6164732f2f7a68696e666f6e676d6f772e6a706567, 'lol1234', 'qwe123', 'qwe@hotmail.com', 1213131, 0, 'newbee', NULL, 'mow', 'zhinfong', '1122334455', 'Selangor', 43300, 'Malaysia');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`Dev_ID`) REFERENCES `developer_group` (`Dev_ID`);

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`Dev_Group_Name`) REFERENCES `developer_group` (`Dev_Group_Name`);

--
-- Constraints for table `game_register`
--
ALTER TABLE `game_register`
  ADD CONSTRAINT `game_register_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `game_register_ibfk_2` FOREIGN KEY (`Dev_ID`) REFERENCES `developer_group` (`Dev_ID`);

--
-- Constraints for table `group_approve`
--
ALTER TABLE `group_approve`
  ADD CONSTRAINT `group_approve_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `group_approve_ibfk_2` FOREIGN KEY (`Dev_ID`) REFERENCES `developer_group` (`Dev_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
