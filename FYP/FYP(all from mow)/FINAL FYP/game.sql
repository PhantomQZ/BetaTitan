-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2015 at 10:38 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `Game_Register_ID` int(11) NOT NULL,
  `Dev_Group_Name` varchar(20) NOT NULL,
  `Game_name` varchar(20) NOT NULL,
  `Approve` int(11) NOT NULL,
  `Game_prequel` varchar(20) NOT NULL,
  `Expansion` varchar(20) NOT NULL,
  `Game_style` varchar(20) NOT NULL,
  `Game_theme` varchar(20) NOT NULL,
  `Game_type` varchar(20) NOT NULL,
  `Release_date` date NOT NULL,
  `Game_homepage` varchar(50) NOT NULL,
  `Summary` text,
  `Requirement` text NOT NULL,
  `Articles` int(11) NOT NULL,
  `Media` int(11) NOT NULL,
  `Mods` int(11) NOT NULL,
  `Game_price` float DEFAULT NULL,
  `Game_image` varchar(255) DEFAULT NULL,
  `Game_icon` varchar(255) DEFAULT NULL,
  `Game_boxshot` varchar(255) DEFAULT NULL,
  `Vid_link` varchar(255) DEFAULT 'https://drive.google.com/uc?export=download&id='
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`Game_Register_ID`, `Dev_Group_Name`, `Game_name`, `Approve`, `Game_prequel`, `Expansion`, `Game_style`, `Game_theme`, `Game_type`, `Release_date`, `Game_homepage`, `Summary`, `Requirement`, `Articles`, `Media`, `Mods`, `Game_price`, `Game_image`, `Game_icon`, `Game_boxshot`, `Vid_link`) VALUES
(1, 'Group 2', 'Dota2', 1, 'Warcraft3', '', 'RP', 'War', 'SP&MP', '2013-07-09', 'http://localhost/phppages/gamepage2.php?gameid=1', '', '', 0, 1, 0, 48.99, 'http://cdn.wall88.com/51922032140eb12064.jpg', 'http://orig05.deviantart.net/97fe/f/2013/332/c/4/dota_2_icon_by_benashvili-d6w0695.png', 'http://img07.deviantart.net/5ec0/i/2012/305/b/c/dota_2_icon_by_eduardogd-d5johhq.png', 'https://drive.google.com/uc?export=download&id=0BxuV0GR0D1xGV0tSLUR5a0F3T0k'),
(2, 'Group 2', 'BattleField4', 1, 'BattleField', '', 'FPS', 'War', 'SP&MP', '2013-10-29', 'http://localhost/phppages/gamepage2.php?gameid=2', '', '', 1, 0, 0, 117.99, 'http://orig06.deviantart.net/42ab/f/2013/300/6/7/the_new_times___battlefield_4_wallpaper_by_xxplosions-d6s0cop.jpg', 'http://orig15.deviantart.net/0fdc/f/2013/361/5/d/battlefield4_icon1_by_rodrigog90-d6znvdr.png', 'http://i.ytimg.com/vi/bz6wETDkMEs/hqdefault.jpg', 'https://drive.google.com/uc?export=download&id=0BxuV0GR0D1xGLUhFTno0ZXFLd1k'),
(3, 'Group 3', 'SDO Season 3', 1, 'SDO', '', 'Alternative', 'Anime', 'MP', '2013-06-07', 'http://localhost/phppages/gamepage2.php?gameid=3', '', '', 1, 0, 0, 90, 'http://www.cibmall.net/public_html/images/wallpaper/sdo-x/xdo1.jpg', 'http://img.informer.com/icons/png/48/3051/3051954.png', 'http://images.cibmall.net//uploaded/images/p1898fq9qv1295mhu15qa1orj1ebn1.png', 'https://drive.google.com/uc?export=download&id='),
(5, 'Group 2', 'CS-GO', 1, 'counter strike', 'Steam', 'RTSS', 'War', 'SP&MP', '0000-00-00', 'http://localhost/phppages/gamepage.php?gameid=5', '', '', 1, 1, 0, 75, 'http://img2.goodfon.su/original/1280x800/4/e4/csgo-counter-strike-global-7343.jpg', 'http://www.arkega.co.za/img/icons/icon_csgo.png', 'https://lh3.ggpht.com/GdYVA_xi6IiqWEAmQjTAIRgK2cwzJaJi1diI8lpXMEZEfjma0S27D7TXjV_Uy20sSAY=w300', 'https://drive.google.com/uc?export=download&id='),
(6, 'Group 3', 'League of Legend', 1, '', 'Garena', 'RTS', 'War', 'SP&MP', '2015-09-14', 'http://localhost/phppages/gamepage.php?gameid=6', '', '', 1, 1, 0, 55, 'http://41.media.tumblr.com/tumblr_m6khohCucq1qgrdiqo2_1280.jpg', 'http://orig01.deviantart.net/907e/f/2015/025/5/5/league_of_legends__connected_fates__episode_2_by_lol_connectedfates-d8fgb24.jpg', 'http://img1.wikia.nocookie.net/__cb20150402234343/leagueoflegends/images/1/12/League_of_Legends_Icon.png', 'https://drive.google.com/uc?export=download&id='),
(7, 'Group 2', 'Call of Duty', 1, '', '', 'RTSS', 'War', 'SP&MP', '0000-00-00', 'http://localhost/phppages/gamepage.php?gameid=7', NULL, '', 1, 1, 0, 80, 'http://www.hdwallpaperbackgrounds.org/hd-wallpapers-backgrounds/Call-of-Duty-Black-Ops-2-Video-Game-wallpaper-1280x800.jpg', 'http://media.moddb.com/images/members/1/370/369766/CallofDuty.png', 'https://cdn.9cloud.us/images/16/piccit_cod_ghost_44s_25934481.640x0.jpg', 'https://drive.google.com/uc?export=download&id=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`Game_Register_ID`),
  ADD UNIQUE KEY `Game_name` (`Game_name`),
  ADD KEY `Dev_Group_Name` (`Dev_Group_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `Game_Register_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
