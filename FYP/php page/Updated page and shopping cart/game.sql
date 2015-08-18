-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2015 at 05:35 AM
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

INSERT INTO `game` (`Game_Register_ID`, `Dev_Group_Name`, `Game_name`, `Game_prequel`, `Expansion`, `Game_style`, `Game_theme`, `Game_type`, `Release_date`, `Game_homepage`, `Articles`, `Media`, `Mods`, `Game_price`, `Game_icon`, `Game_boxshot`, `Game_previewImg`, `Game_headerImg`) VALUES
(1, 'Group 2', 'Dota2', 'Warcraft3', '', 'RP', 'War', 'SP&MP', '2013-07-09', 'http://localhost/phppages/d2.php', 0, 1, 0, 48.99, '', '', '', ''),
(2, 'Group 2', 'BattleField4', 'BattleField', '', 'FPS', 'War', 'SP&MP', '2013-10-29', 'http://www.battlefield.com/battlefield-4', 1, 0, 0, 117.99, '', '', '', ''),
(3, 'Group 3', 'SDO Season 3', 'SDO', '', 'Alternative', 'Anime', 'MP', '2013-06-07', 'http://www.sdox.cibmall.net/', 1, 0, 0, 90, '', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`Dev_Group_Name`) REFERENCES `developer_group` (`Dev_Group_Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
