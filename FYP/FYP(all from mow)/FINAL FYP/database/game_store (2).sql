-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2015 at 10:43 PM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_usrname` varchar(16) NOT NULL,
  `Admin_pswrd` varchar(20) NOT NULL,
  `Admin_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `Order_ID` int(11) NOT NULL,
  `Game_name` varchar(20) NOT NULL,
  `Game_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Order_ID`, `Game_name`, `Game_price`) VALUES
(1, 'Dota2', 48.99),
(1, 'SDO Season 3', 90),
(1, 'BattleField4', 117.99),
(2, 'Dota2', 48.99),
(2, 'BattleField4', 117.99),
(2, 'SDO Season 3', 90),
(3, 'Dota2', 48.99),
(4, 'Dota2', 48.99),
(4, 'BattleField4', 117.99),
(4, 'SDO Season 3', 90),
(5, 'Dota2', 48.99),
(5, 'BattleField4', 117.99),
(5, 'SDO Season 3', 90),
(6, 'Dota2', 48.99),
(7, 'Dota2', 48.99),
(8, 'Dota2', 48.99),
(9, 'Dota2', 48.99),
(10, 'Dota2', 48.99),
(11, 'Dota2', 48.99),
(12, 'Dota2', 48.99),
(12, 'BattleField4', 117.99),
(13, 'Dota2', 48.99),
(13, 'SDO Season 3', 90),
(13, 'CS-GO', 75),
(13, 'BattleField4', 117.99),
(14, 'CS-GO', 75),
(15, 'CS-GO', 75),
(16, 'SDO Season 3', 90),
(16, 'BattleField4', 117.99),
(17, 'SDO Season 3', 90),
(17, 'BattleField4', 117.99),
(17, 'CS-GO', 75),
(18, 'BattleField4', 117.99),
(18, 'SDO Season 3', 90);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `Comment_ID` int(11) NOT NULL,
  `Comment_text` varchar(100) NOT NULL,
  `Game_name` varchar(20) NOT NULL,
  `User_ursname` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Comment_ID`, `Comment_text`, `Game_name`, `User_ursname`) VALUES
(27, 'adfadfs', 'Dota2', '123444'),
(28, 'haha', 'Dota2', 'lol1234'),
(29, 'how are u?', 'Dota2', 'lol1234'),
(30, 'fine, thank you.', 'Dota2', '123444'),
(31, 'hello!!', 'BattleField4', '123444'),
(32, 'I love it.', 'SDO Season 3', '123444'),
(33, 'hi', 'Dota2', '123444'),
(34, 'hi', 'Dota2', '123444'),
(35, 'haha', 'Dota2', '123444'),
(36, 'haha', 'Dota2', '123444'),
(37, 'Good Game', 'BattleField4', '123444'),
(38, 'Good game!!', 'SDO Season 3', 'lol1234'),
(39, 'I love it', 'League of Legend', 'lol1234'),
(40, 'wow!!', 'CS-GO', '123444'),
(41, 'Well Game!', 'SDO Season 3', 'lol1234'),
(42, 'Nice Game!!', 'Call of Duty', '123444');

-- --------------------------------------------------------

--
-- Table structure for table `developer_group`
--

CREATE TABLE IF NOT EXISTS `developer_group` (
  `Dev_ID` int(11) NOT NULL,
  `Dev_Group_Name` varchar(20) NOT NULL,
  `Register_approve` int(11) NOT NULL DEFAULT '0',
  `Privacy` int(11) NOT NULL,
  `Company` varchar(20) DEFAULT NULL,
  `Com_name` varchar(30) DEFAULT NULL,
  `Com_addr` varchar(50) DEFAULT NULL,
  `Com_state` varchar(20) DEFAULT NULL,
  `Com_postcode` varchar(10) DEFAULT NULL,
  `Com_country` varchar(20) DEFAULT NULL,
  `Com_phone` int(12) DEFAULT NULL,
  `Com_fax` int(12) DEFAULT NULL,
  `Group_email` varchar(35) NOT NULL,
  `Homepage` varchar(255) DEFAULT NULL,
  `Articles` int(11) DEFAULT NULL,
  `Media` int(11) DEFAULT NULL,
  `Games` int(11) DEFAULT NULL,
  `Modes` int(11) DEFAULT NULL,
  `Summary` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `headerIMG` longblob,
  `previewIMG` longblob
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer_group`
--

INSERT INTO `developer_group` (`Dev_ID`, `Dev_Group_Name`, `Register_approve`, `Privacy`, `Company`, `Com_name`, `Com_addr`, `Com_state`, `Com_postcode`, `Com_country`, `Com_phone`, `Com_fax`, `Group_email`, `Homepage`, `Articles`, `Media`, `Games`, `Modes`, `Summary`, `Date`, `headerIMG`, `previewIMG`) VALUES
(1, 'Group 2', 1, 2, 'No', '', '', '', '', '', 0, 0, '', '', 1, 0, 2, 0, '<pre><pre>Hello there, we are group 2 which always hiring people for game testing</pre></pre>', '2015-09-11 15:42:08', 0x6465765f6772705f7069632f686561642f2f47726f757020322e6a706567, 0x6465765f6772705f7069632f707265766965772f2f47726f757020322e6a706567),
(2, 'Group 3', 1, 1, 'No', NULL, '', '', '', '', 0, 0, 'xaxa@hotmail.com', NULL, 1, 0, 2, 0, '', '2015-09-11 15:42:08', '', ''),
(3, 'asd', 1, 1, 'No', 'a', '', '', '', '', 0, 0, 'asd', NULL, 1, 0, NULL, NULL, 'asd asd', '2015-09-11 15:42:08', NULL, NULL),
(5, 'abc123', 1, 1, 'Yes', 'abc123 company', 'ab', '', '', '', 0, 0, 'abc123@gmail.com', NULL, 1, 1, NULL, NULL, 'abc abc', '2015-09-11 15:42:08', NULL, NULL),
(22, 'xyz', 1, 1, 'No', '', '', '', '', '', 0, 0, 'xyz@gmail.com', 'xyz.com.my', 1, 1, NULL, NULL, '<pre>xyz \r\nxyz</pre>', '2015-09-11 15:42:08', 0x6465765f6772705f7069632f686561642f2f78797a2e6a706567, 0x6465765f6772705f7069632f707265766965772f2f78797a2e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `developer_join_request`
--

CREATE TABLE IF NOT EXISTS `developer_join_request` (
  `User_ID` int(11) NOT NULL,
  `Dev_ID` int(11) NOT NULL,
  `Request` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer_join_request`
--

INSERT INTO `developer_join_request` (`User_ID`, `Dev_ID`, `Request`) VALUES
(4, 3, 1),
(2, 5, 1),
(2, 22, 1),
(3, 1, 1),
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dev_comment`
--

CREATE TABLE IF NOT EXISTS `dev_comment` (
  `Comment_ID` int(11) NOT NULL,
  `Comment_text` varchar(100) NOT NULL,
  `Dev_Group_Name` varchar(25) NOT NULL,
  `User_usrname` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev_comment`
--

INSERT INTO `dev_comment` (`Comment_ID`, `Comment_text`, `Dev_Group_Name`, `User_usrname`) VALUES
(1, 'xyz', 'xyz', 'PhantomQZ'),
(2, 'test', 'xyz', 'PhantomQZ'),
(3, 'lol', 'xyz', 'PhantomQZ'),
(4, 'hallo', 'xyz', 'PhantomQZ'),
(5, 'lol', 'xyz', 'PhantomQZ'),
(6, 'lol', 'xyz', 'PhantomQZ'),
(7, 'try', 'xyz', 'PhantomQZ'),
(8, 'try', 'xyz', 'PhantomQZ');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `User_ID` int(11) NOT NULL,
  `Dev_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `game_register`
--

CREATE TABLE IF NOT EXISTS `game_register` (
  `Game_register_ID` int(11) NOT NULL,
  `Admin_ID` int(11) NOT NULL,
  `Dev_ID` int(11) NOT NULL,
  `Game_approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_approve`
--

CREATE TABLE IF NOT EXISTS `group_approve` (
  `Admin_ID` int(11) NOT NULL,
  `Dev_ID` int(11) NOT NULL,
  `Register_approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `Order_ID` int(11) NOT NULL,
  `Order_date` datetime NOT NULL,
  `total_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `Payment_ID` int(11) NOT NULL,
  `Order_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Payment_date` date DEFAULT NULL,
  `Price` float(5,2) DEFAULT NULL,
  `Receipt` longblob,
  `Submit_Date` date DEFAULT NULL,
  `Approve` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `Order_ID`, `User_ID`, `Payment_date`, `Price`, `Receipt`, `Submit_Date`, `Approve`) VALUES
(1, 1, 2, '2015-09-12', 9.99, NULL, NULL, 0),
(2, 2, 2, '2015-09-12', 9.99, NULL, NULL, 0),
(3, 3, 2, '2015-09-12', 48.99, NULL, NULL, 0),
(4, 4, 2, '2015-09-12', 256.98, NULL, NULL, 0),
(5, 5, 2, '2015-09-13', 256.98, NULL, NULL, 0),
(6, 6, 2, '2015-09-13', 48.99, NULL, NULL, 0),
(7, 7, 2, '2015-09-13', 48.99, NULL, NULL, 0),
(8, 8, 2, '2015-09-13', 48.99, NULL, NULL, 0),
(9, 9, 2, '2015-09-13', 48.99, NULL, NULL, 0),
(10, 10, 2, '2015-09-13', 48.99, NULL, NULL, 0),
(11, 11, 2, '2015-09-13', 48.99, 0x726563656970742f2f5061796d656e7420494431312e6a706567, '2015-09-13', 0),
(12, 12, 2, '2015-09-13', 166.98, 0x726563656970742f2f5061796d656e7420494431322e6a706567, '2015-09-14', 0),
(13, 13, 2, '2015-09-13', 331.98, 0x726563656970742f2f5061796d656e7420494431332e6a706567, '2015-09-13', 0),
(14, 14, 3, '2015-09-14', 75.00, NULL, NULL, 0),
(15, 15, 6, '2015-09-14', 75.00, NULL, NULL, 0),
(16, 16, 2, '2015-09-14', 207.99, 0x726563656970742f2f5061796d656e7420494431362e6a706567, '2015-09-14', 0),
(17, 17, 2, '2015-09-14', 282.99, 0x726563656970742f2f5061796d656e7420494431372e6a706567, '2015-09-14', 0),
(18, 18, 2, '2015-09-14', 209.49, 0x726563656970742f2f5061796d656e7420494431382e6a706567, '2015-09-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `Pic_ID` int(11) NOT NULL,
  `Game_Register_ID` int(11) NOT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`Pic_ID`, `Game_Register_ID`, `Link`) VALUES
(1, 2, 'http://img.techiesparks.com/2013/11/bf4-multiplayer.jpg'),
(2, 2, 'https://mattbrett.com/wp-content/uploads/2013/12/battlefield4-mp-11.jpg'),
(3, 2, 'http://images.bit-tech.net/content_images/2013/11/battlefield-4-review/bf4-2013-11-11-09-53-04-44-copy-1920x1080.jpg'),
(4, 2, 'http://static.gamespot.com/uploads/original/542/5424362/2358863-2358789-%2523%2523%252300001.jpg'),
(5, 2, 'http://images.bit-tech.net/content_images/2013/11/battlefield-4-review/bf4-2013-11-11-09-54-38-03-copy-1920x1080.jpg'),
(6, 2, 'http://vnfa8y5n3zndutm1.zippykid.netdna-cdn.com/wp-content/gallery/battlefield-4-review/bf4-2013-11-14-14-39-23-911.jpg'),
(7, 1, ''),
(8, 1, 'http://i.ytimg.com/vi/krHujKemMXs/maxresdefault.jpg'),
(9, 1, 'http://cdn.arstechnica.net/wp-content/uploads/2013/07/secret-shop.jpg'),
(10, 1, 'http://i.ytimg.com/vi/O7om6GZfsmY/maxresdefault.jpg'),
(11, 1, 'http://i.ytimg.com/vi/wAgAJjkitd8/maxresdefault.jpg'),
(12, 1, 'http://venturebeat.com/wp-content/uploads/2015/07/dota-2.jpg'),
(13, 1, 'http://www.top-game-master.com/wp-content/uploads/2015/01/Dota-2-Review3.jpg'),
(14, 3, 'http://orig13.deviantart.net/fa6c/f/2009/041/8/f/sdo_season2_by_ferentje.jpg'),
(15, 3, 'http://i.ytimg.com/vi/9h1TJBrLsVY/maxresdefault.jpg'),
(16, 3, 'http://images.mmosite.com/news/2009/10/28/sdox/sdoxs02.jpg'),
(17, 3, 'http://i.ytimg.com/vi/sG58qMcL1Y4/maxresdefault.jpg'),
(18, 3, 'http://orig04.deviantart.net/ee2f/f/2013/321/c/7/sdo_x_season_3_dream_couple_by_dragon0514-d6uoqbl.jpg'),
(19, 3, 'http://i.ytimg.com/vi/8PZY2D74TSo/hqdefault.jpg'),
(20, 6, 'http://i.ytimg.com/vi/MV2rRcskn4Y/maxresdefault.jpg'),
(21, 6, 'http://i.ytimg.com/vi/3BQ1ETP-G4U/maxresdefault.jpg'),
(22, 6, 'http://s3.vidimg02.popscreen.com/original/44/NTM1OTI5ODUz_o_league-of-legends-drunk-gragas-w-redmercy-lol-.jpg'),
(23, 6, 'http://venturebeat.com/wp-content/uploads/2012/11/league_of_legends_pc_39-e1354033996192.jpg'),
(24, 6, 'http://www.dingit.tv/blog/wp-content/uploads/2015/01/League-of-Legends-Dominion-gameplay-1.jpg'),
(25, 6, 'http://www.mmoknight.com/wp-content/uploads/2013/08/wmplayer-2013-08-06-05-48-03-75.jpg'),
(26, 5, 'http://i.ytimg.com/vi/ljUByjCvKT0/maxresdefault.jpg'),
(27, 5, 'http://i.ytimg.com/vi/n6PjRnE1tCU/maxresdefault.jpg'),
(28, 5, 'http://i.ytimg.com/vi/2RTnf7lZO6k/maxresdefault.jpg'),
(29, 5, 'http://i.ytimg.com/vi/eYjAwDSORyw/maxresdefault.jpg'),
(30, 5, 'http://static1.gamespot.com/uploads/screen_kubrick/mig/6/3/0/0/2126300-gsm_169_modcast_chivalry_gp_040413_320.jpg'),
(31, 5, 'http://i.ytimg.com/vi/vwxc59gDJDY/maxresdefault.jpg'),
(32, 7, 'http://i.ytimg.com/vi/FPl65QGMb9w/maxresdefault.jpg'),
(33, 7, 'http://i.ytimg.com/vi/jNjCv9OIF-M/maxresdefault.jpg'),
(34, 7, 'http://static1.gamespot.com/uploads/screen_kubrick/mig/9/5/8/5/2109585-169_cod_mw2_the_pit_training_mode_ps3_082511.jpg'),
(35, 7, 'http://i.ytimg.com/vi/4MJJoSv2hFQ/maxresdefault.jpg'),
(36, 7, 'http://i.ytimg.com/vi/bEyG5jislUY/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `id2`, `title`, `user1`, `user2`, `message`, `timestamp`, `user1read`, `user2read`) VALUES
(1, 1, 'hello', 2, 3, 'fk u<br />\r\no0o', 0, 'yes', 'yes'),
(1, 2, '', 3, 0, 'o0o <br />\r\nfk u 2', 1442237518, '', ''),
(1, 3, '', 2, 0, '==', 1442241182, '', ''),
(4, 1, 'kk', 2, 3, 'hello', 0, 'yes', 'yes'),
(5, 1, 'haha', 2, 3, 'lol', 0, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `Game_Register_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `rate`, `user_id`, `Game_Register_ID`) VALUES
(1, 3, '123444', 1),
(2, 3, 'lol1234', 3),
(3, 4, '123444', 7),
(4, 5, '123444', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `image` longblob NOT NULL,
  `User_usrname` varchar(16) NOT NULL,
  `User_pswrd` varchar(20) NOT NULL,
  `User_email` varchar(35) NOT NULL,
  `User_contact` int(11) NOT NULL,
  `User_secQ` int(1) NOT NULL,
  `User_secA` varchar(10) NOT NULL,
  `Dev_grouptag` int(11) DEFAULT NULL,
  `Dev_admin` int(11) DEFAULT '0',
  `User_Fname` varchar(20) NOT NULL,
  `User_Lname` varchar(20) NOT NULL,
  `User_address` varchar(50) NOT NULL,
  `User_state` varchar(20) NOT NULL,
  `User_postcode` int(10) NOT NULL,
  `User_country` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Status`, `image`, `User_usrname`, `User_pswrd`, `User_email`, `User_contact`, `User_secQ`, `User_secA`, `Dev_grouptag`, `Dev_admin`, `User_Fname`, `User_Lname`, `User_address`, `User_state`, `User_postcode`, `User_country`) VALUES
(1, 0, '', 'qwqe', 'pop123', 'zzz123@gmail.com', 987654321, 5, 'acer', 1, 0, 'hello', 'qwe1234', '123bc', '', 43300, ''),
(2, 0, 0x75706c6f6164732f2f5a68696e20466f6e674d6f772e6a706567, '123444', '12345678', 'xiao.mow1994@gmail.com', 12342345, 5, 'hp', 1, 1, 'Mow', 'Zhin Fong', 'No 35, Jalan BS 10/4, Taman Bukit Serdang', 'Selangor', 63300, 'Malaysia'),
(3, 0, 0x75706c6f6164732f2f7a68696e666f6e676d6f772e6a706567, 'lol1234', 'qwe123', 'qwe@hotmail.com', 1213131, 0, 'newbee', 1, 0, 'mow', 'zhinfong', '1122334455', 'Selangor', 43300, 'Malaysia'),
(4, 0, 0x64656661756c742e706e67, 'erer123', 'erer123', 'huhuhu@hotmail.com', 188738738, 2, 'c9', NULL, 0, 'erer', 'erer', 'qwqwqwqwqw', 'Kelantan', 4343434, 'MYS'),
(5, 0, 0x64656661756c742e706e67, 'qwqw', 'qwqw123', 'qwqw@gmail.com', 12234567, 3, 'qwq', NULL, 0, 'qwqwqw', 'qwqwqwq', 'qwqwqwqw', 'Kedah', 23232, 'MYS'),
(6, 0, 0x75706c6f6164732f2f6368756174657272612e6a706567, 'terrachua', 'terra123', 'terra_5103@hotmail.com', 169709133, 1, 'mmu', NULL, 0, 'terra', 'chua', 'no.8 jln impian 1 taman impian indah ', 'Selangor', 47000, 'MYS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD UNIQUE KEY `Admin_usrname` (`Admin_usrname`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `developer_group`
--
ALTER TABLE `developer_group`
  ADD PRIMARY KEY (`Dev_ID`),
  ADD UNIQUE KEY `Dev_Group_Name` (`Dev_Group_Name`),
  ADD UNIQUE KEY `Group_email` (`Group_email`);

--
-- Indexes for table `developer_join_request`
--
ALTER TABLE `developer_join_request`
  ADD KEY `User_ID` (`User_ID`) USING BTREE,
  ADD KEY `Dev_ID` (`Dev_ID`) USING BTREE;

--
-- Indexes for table `dev_comment`
--
ALTER TABLE `dev_comment`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Dev_ID` (`Dev_ID`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`Game_Register_ID`),
  ADD UNIQUE KEY `Game_name` (`Game_name`),
  ADD KEY `Dev_Group_Name` (`Dev_Group_Name`);

--
-- Indexes for table `game_register`
--
ALTER TABLE `game_register`
  ADD PRIMARY KEY (`Game_register_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `Dev_ID` (`Dev_ID`);

--
-- Indexes for table `group_approve`
--
ALTER TABLE `group_approve`
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `Dev_ID` (`Dev_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`Pic_ID`),
  ADD KEY `id` (`Game_Register_ID`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `User_usrname` (`User_usrname`),
  ADD UNIQUE KEY `User_email` (`User_email`),
  ADD FULLTEXT KEY `User_pswrd` (`User_pswrd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `developer_group`
--
ALTER TABLE `developer_group`
  MODIFY `Dev_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dev_comment`
--
ALTER TABLE `dev_comment`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `Game_Register_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `game_register`
--
ALTER TABLE `game_register`
  MODIFY `Game_register_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `Pic_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `developer_join_request`
--
ALTER TABLE `developer_join_request`
  ADD CONSTRAINT `Dev_ID` FOREIGN KEY (`Dev_ID`) REFERENCES `developer_group` (`Dev_ID`),
  ADD CONSTRAINT `User_ID` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

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
  ADD CONSTRAINT `group_approve_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`Game_Register_ID`) REFERENCES `game` (`Game_Register_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
