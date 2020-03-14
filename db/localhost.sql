-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2020 at 04:28 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12781738_ringtone`
--
CREATE DATABASE IF NOT EXISTS `id12781738_ringtone` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id12781738_ringtone`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin', 'viaviwebtech@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `category_name`, `category_image`, `status`) VALUES
(1, 'Marvel', '35409_maxresdefault (3).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_banner`
--

CREATE TABLE `tbl_home_banner` (
  `id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `dt_rate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `post_id`, `user_id`, `ip`, `rate`, `dt_rate`) VALUES
(1, 97, '6bddb3c924330304', '6bddb3c924330304', 5, '2020-03-08 11:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating_gif`
--

CREATE TABLE `tbl_rating_gif` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `dt_rate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ringtone`
--

CREATE TABLE `tbl_ringtone` (
  `id` int(11) NOT NULL,
  `ringtone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ringtone_tag` text CHARACTER SET utf8 DEFAULT NULL,
  `total_rate` int(11) DEFAULT NULL,
  `total_views` int(11) DEFAULT NULL,
  `rate_avg` decimal(11,2) DEFAULT NULL,
  `total_download` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ringtone`
--

INSERT INTO `tbl_ringtone` (`id`, `ringtone`, `ringtone_tag`, `total_rate`, `total_views`, `rate_avg`, `total_download`) VALUES
(3, '1666_cradles-49331.mp3', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `onesignal_app_id` text NOT NULL,
  `onesignal_rest_key` text NOT NULL,
  `app_api_key` varchar(255) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_version` varchar(255) NOT NULL,
  `app_author` varchar(255) NOT NULL,
  `app_contact` varchar(255) NOT NULL,
  `app_website` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_developed_by` varchar(255) NOT NULL,
  `app_privacy_policy` text NOT NULL,
  `home_latest_limit` int(2) NOT NULL DEFAULT 10,
  `home_most_viewed_limit` int(2) NOT NULL DEFAULT 10,
  `home_most_rated_limit` int(2) NOT NULL DEFAULT 10,
  `api_latest_limit` int(3) NOT NULL DEFAULT 15,
  `api_cat_order_by` varchar(255) NOT NULL DEFAULT 'category_name',
  `api_cat_post_order_by` varchar(255) NOT NULL DEFAULT 'DESC',
  `api_gif_post_order_by` varchar(255) NOT NULL DEFAULT 'DESC',
  `publisher_id` text NOT NULL,
  `interstital_ad` varchar(255) NOT NULL,
  `interstital_ad_id` varchar(255) NOT NULL,
  `interstital_ad_click` varchar(255) NOT NULL,
  `banner_ad` varchar(255) NOT NULL,
  `banner_ad_id` varchar(255) NOT NULL,
  `publisher_id_ios` varchar(500) DEFAULT NULL,
  `app_id_ios` varchar(500) DEFAULT NULL,
  `interstital_ad_ios` varchar(500) DEFAULT NULL,
  `interstital_ad_id_ios` varchar(500) DEFAULT NULL,
  `interstital_ad_click_ios` varchar(500) DEFAULT NULL,
  `banner_ad_ios` varchar(500) DEFAULT NULL,
  `banner_ad_id_ios` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `onesignal_app_id`, `onesignal_rest_key`, `app_api_key`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `home_latest_limit`, `home_most_viewed_limit`, `home_most_rated_limit`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `api_gif_post_order_by`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`, `publisher_id_ios`, `app_id_ios`, `interstital_ad_ios`, `interstital_ad_id_ios`, `interstital_ad_click_ios`, `banner_ad_ios`, `banner_ad_id_ios`) VALUES
(1, '54fdcb59-c790-48b3-bd24-d466759bba2a', 'OWYzYjNkNjMtYmUzNS00Y2MwLTk3YzEtNjVmNTk0ZmNkZjY5ff', 'YtmpgwcUzCbeh1JlsK0gRff0njtXm9g9lAUt4pzsPZhsH8a', 'Ringtone', 'logo.jpg', 'info@viaviweb.com', '1.0.0', 'Viavi Webtech', '+91 9227777522', 'www.viaviweb.com', '<p><strong>&ldquo;HD Wallpaper&rdquo;</strong> is a cool new app that brings all the best HD wallpapers and backgrounds to your Android device.</p>\r\n\r\n<p>Each high resolution image has been perfectly formatted fit to the phone display and comes with a host of user friendly features. The stunning UI allows you easily tap and swipe your way through the multiple image galleries.<br />\r\n<br />\r\nTo develop similar app with your name you can contact us via skype or whatsapp.<br />\r\n<br />\r\n<strong>Skype:</strong> viaviwebtech<br />\r\n<strong>WhatsApp:</strong> +919227777522</p>\r\n', 'Viavi Webtech', '', 20, 20, 20, 20, 'category_name', 'DESC', 'ASC', 'ca-app-pub-3940256099942544~3347511713', 'false', 'ca-app-pub-3940256099942544/1033173712', '5', 'false', 'ca-app-pub-3940256099942544/6300978111', 'pub-8356404931736973', '123', 'false', 'ca-app-pub-8356404931736973/7100246157', '3', 'false', 'ca-app-pub-8356404931736973/9726409493');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallpaper`
--

CREATE TABLE `tbl_wallpaper` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `wall_tags` text NOT NULL,
  `total_rate` int(11) NOT NULL DEFAULT 0,
  `rate_avg` decimal(11,0) DEFAULT 0,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `total_download` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wallpaper`
--

INSERT INTO `tbl_wallpaper` (`id`, `cat_id`, `image_date`, `image`, `wall_tags`, `total_rate`, `rate_avg`, `total_views`, `total_download`) VALUES
(3, 1, '2020-03-03', '19783_a916993f-97f3-4f55-a5d5-759649fa585d.jpg', 'marvel', 0, 0, 1, 0),
(4, 1, '2020-03-03', '11485_Biophycist-Determines-\'Avengers_-Endgame\'-Theory-Of-Ant-Man-Killing-Thanos-By-Expanding-In-His-Butt-Is-Valid.jpg', 'marvel', 0, 0, 0, 0),
(5, 1, '2020-03-03', '69997_Everything-You-Need-To-Know-About-Marvel’s-Smallest-Hero-Ant-Man.jpg', 'marvel', 0, 0, 0, 0),
(6, 1, '2020-03-03', '56177_Movie,-Ant-man,-Paul-Rudd,-marvel-studio-Wallpaper.jpg', 'marvel', 0, 0, 2, 0),
(7, 1, '2020-03-03', '72180_The-Wasp---Hope-Van-Dyne-Wallpaper-Marvel.jpg', 'marvel', 0, 0, 1, 0),
(8, 1, '2020-03-03', '25550_3235aeb4c05a1aa8415bef992878d022.jpg', 'marvel', 0, 0, 2, 0),
(9, 1, '2020-03-03', '60868_ac69dc61a99d798dcc540cafc7fc0d2f.jpg', 'marvel', 0, 0, 2, 0),
(10, 1, '2020-03-03', '39141_9311caae8ca0783b6173889e8da61cab.jpg', 'marvel', 0, 0, 1, 0),
(11, 1, '2020-03-04', '1857_f7da4435812fb8f6b94352d6d6060bf5.jpg', 'marvel', 0, 0, 2, 0),
(12, 1, '2020-03-05', '91195_0bfc8f8107140ea50016ae4b11d80d7b.jpg', 'marvel', 0, 0, 3, 0),
(13, 1, '2020-03-05', '41825_ced166811dba0c86e69908c5921bcca9.jpg', 'marvel', 0, 0, 4, 0),
(14, 1, '2020-03-05', '83162_d6xysbO.jpg', 'Spider-Man', 0, 0, 2, 0),
(15, 1, '2020-03-05', '85088_Here\'s-Everything-You-Need-to-Know-Before-Spider-Man_-Far-From-Home-Swings-Into-Theaters.jpg', 'Spider-Man', 0, 0, 0, 0),
(16, 1, '2020-03-05', '13233_o1-(3).jpg', 'Spider-Man', 0, 0, 0, 0),
(17, 1, '2020-03-05', '23803_o1-(4).jpg', 'Spider-Man', 0, 0, 0, 0),
(18, 1, '2020-03-05', '61892_o1-(5).jpg', 'Spider-Man', 0, 0, 1, 0),
(19, 1, '2020-03-05', '67492_o1-(6).jpg', 'Spider-Man', 0, 0, 0, 0),
(20, 1, '2020-03-05', '18541_o1-(9).jpg', 'Spider-Man', 0, 0, 0, 0),
(21, 1, '2020-03-05', '81745_o1-(10).jpg', 'Spider-Man', 0, 0, 0, 0),
(22, 1, '2020-03-05', '9880_o1-(13).jpg', 'Spider-Man', 0, 0, 0, 0),
(23, 1, '2020-03-05', '75988_o1-(14).jpg', 'Spider-Man', 0, 0, 0, 0),
(24, 1, '2020-03-05', '76018_o1-(15).jpg', 'Spider-Man', 0, 0, 0, 0),
(25, 1, '2020-03-05', '33927_o1-(16).jpg', 'Spider-Man', 0, 0, 0, 0),
(26, 1, '2020-03-05', '79524_o1-(18).jpg', 'Spider-Man', 0, 0, 0, 0),
(27, 1, '2020-03-05', '60838_o1-(19).jpg', 'Spider-Man', 0, 0, 0, 0),
(28, 1, '2020-03-05', '93774_o1-(20).jpg', 'Spider-Man', 0, 0, 0, 0),
(29, 1, '2020-03-05', '68708_o1-(21).jpg', 'Spider-Man', 0, 0, 0, 0),
(30, 1, '2020-03-05', '95522_OKIzBlo.jpg', 'Spider-Man', 0, 0, 0, 0),
(31, 1, '2020-03-05', '69450_photo_2019-11-04_14-12-27.jpg', 'Spider-Man', 0, 0, 0, 0),
(34, 1, '2020-03-05', '50584_###########thumbline-(2).jpg', 'Deadpool', 0, 0, 0, 0),
(35, 1, '2020-03-05', '9930_5626.jpg', 'Deadpool', 0, 0, 0, 0),
(36, 1, '2020-03-05', '89766_12291.jpg', 'Deadpool', 0, 0, 0, 0),
(37, 1, '2020-03-05', '34515_16568.png', 'Deadpool', 0, 0, 0, 0),
(38, 1, '2020-03-05', '5592_21260.jpg', 'Deadpool', 0, 0, 0, 0),
(39, 1, '2020-03-05', '67562_144622.jpg', 'Deadpool', 0, 0, 0, 0),
(40, 1, '2020-03-05', '34762_crop-(1).jpg', 'Deadpool', 0, 0, 0, 0),
(41, 1, '2020-03-05', '98321_crop-(2).jpg', 'Deadpool', 0, 0, 0, 0),
(42, 1, '2020-03-05', '36679_crop.jpg', 'Deadpool', 0, 0, 0, 0),
(43, 1, '2020-03-05', '3608_Deadpool-1080x1920.jpg', 'Deadpool', 0, 0, 0, 0),
(44, 1, '2020-03-05', '88276_deadpool-android-wallpaper-16.jpg', 'Deadpool', 0, 0, 0, 0),
(45, 1, '2020-03-05', '99093_Deadpool-Red-Art-iPhone-Wallpaper.jpg', 'Deadpool', 0, 0, 0, 0),
(46, 1, '2020-03-05', '7947_deadpool-smoking-cigarette-1f-750x1334.jpg', 'Deadpool', 0, 0, 0, 0),
(47, 1, '2020-03-05', '38490_deadpool-vs-thanos-uhdpaper.com-4K-119.jpg', 'Deadpool', 0, 0, 0, 0),
(48, 1, '2020-03-05', '83175_good-deadpool-1054.jpg', 'Deadpool', 0, 0, 0, 0),
(49, 1, '2020-03-05', '7012_photo_2019-11-04_23-44-24.jpg', 'Deadpool', 0, 0, 0, 0),
(50, 1, '2020-03-05', '32335_photo_2019-11-04_23-54-53.jpg', 'Deadpool', 0, 0, 0, 0),
(51, 1, '2020-03-05', '78866_photo_2019-11-04_23-58-19.jpg', 'Deadpool', 0, 0, 0, 0),
(52, 1, '2020-03-05', '27656_photo_2019-11-05_00-00-47.jpg', 'Deadpool', 0, 0, 0, 0),
(53, 1, '2020-03-05', '99047_photo_2019-11-05_00-02-11.jpg', 'Deadpool', 0, 0, 0, 0),
(54, 1, '2020-03-05', '33537_######thumbline-(20).jpg', 'Dr Strange', 0, 0, 0, 0),
(55, 1, '2020-03-05', '51161_photo_2019-10-14_17-07-27.jpg', 'Dr Strange', 0, 0, 0, 0),
(56, 1, '2020-03-05', '55181_photo_2019-11-04_23-50-52.jpg', 'Dr Strange', 0, 0, 0, 0),
(57, 1, '2020-03-05', '19994_photo_2019-11-04_23-58-03.jpg', 'Dr Strange', 0, 0, 0, 0),
(58, 1, '2020-03-05', '57508_photo_2019-11-05_00-01-29.jpg', 'Dr Strange', 0, 0, 0, 0),
(59, 1, '2020-03-05', '5744_photo_2019-11-05_00-03-57.jpg', 'Dr Strange', 0, 0, 0, 0),
(60, 1, '2020-03-05', '19334_photo_2019-11-05_00-10-16.jpg', 'Dr Strange', 0, 0, 0, 0),
(61, 1, '2020-03-05', '55589_photo_2019-11-05_00-12-13.jpg', 'Dr Strange', 0, 0, 0, 0),
(62, 1, '2020-03-05', '22647_photo_2019-11-05_00-13-45.jpg', 'Dr Strange', 0, 0, 0, 0),
(63, 1, '2020-03-05', '17259_photo_2019-11-05_00-14-07.jpg', 'Dr Strange', 0, 0, 0, 0),
(64, 1, '2020-03-05', '4346_V0hIGeF.jpg', 'Dr Strange', 0, 0, 0, 0),
(65, 1, '2020-03-05', '9487_0000000001.jpg', 'Venom ', 0, 0, 0, 0),
(66, 1, '2020-03-05', '34939_1f466734bba904ac62f2012c8d859efa.jpg', 'Venom ', 0, 0, 1, 0),
(68, 1, '2020-03-05', '55072_46a0d5190d0d66bca1ea96615ce4bbd5.jpg', 'Venom ', 0, 0, 1, 0),
(69, 1, '2020-03-05', '43315_46e9ec0c63fb9507d77294b60a99bc5a.jpg', 'Venom ', 0, 0, 3, 0),
(70, 1, '2020-03-05', '46282_48fd7213ef5284d787dd4e091917a0ad.jpg', 'Venom ', 0, 0, 4, 0),
(71, 1, '2020-03-05', '92291_111.png.jpg', 'Venom ', 0, 0, 1, 0),
(72, 1, '2020-03-05', '86582_amazing-wallpaper-Web-of-venom-minimal-venom-art-10802160-wallpaper.jpg', 'Venom ', 0, 0, 1, 0),
(73, 1, '2020-03-05', '14093_Avenger-Endgame.png.jpg', 'Venom ', 0, 0, 1, 0),
(74, 1, '2020-03-05', '36857_Badass-Wallpapers-For-Android-32-0f-40-–-Venom-from-Marvel---HD-Wallpapers-_-Wallpapers-Download-_-High-Resolution-Wallpapers.jpg', 'Venom ', 0, 0, 1, 0),
(75, 1, '2020-03-05', '92121_Black-Panther-2-Art-iPhone-Wallpaper---iPhone-Wallpapers.jpg', 'Venom ', 0, 0, 1, 0),
(76, 1, '2020-03-05', '74301_###########thumbline-(3).jpg', 'Iron-Man', 0, 0, 1, 0),
(77, 1, '2020-03-05', '14477_#######01LOgo.jpg', 'Iron-Man', 0, 0, 0, 0),
(78, 1, '2020-03-05', '23209_0ac5ba61-2ea9-4cb6-92da-01e2f295963c.jpg', 'Iron-Man', 0, 0, 0, 0),
(79, 1, '2020-03-05', '56149_ArtStation---Avengers_-Infinity-War---Iron-Man-Mk-50-suit-up,-Phil-Saunders.jpg', 'Iron-Man', 0, 0, 0, 0),
(80, 1, '2020-03-05', '38712_Avengers-Infinity-War-Tony-Stark-Hoodie-_-RDJ-Jacket.jpg', 'Iron-Man', 0, 0, 0, 0),
(81, 1, '2020-03-05', '45757_Click-to-join-Iron-man-fandom-on-thefandome_com-#movie-#Ironman-#fandom-#thefandome.jpg', 'Iron-Man', 0, 0, 0, 0),
(82, 1, '2020-03-05', '54936_Film-Review_-Avengers_-Endgame-—-Strange-Harbors.jpg', 'Iron-Man', 0, 0, 1, 0),
(83, 1, '2020-03-05', '29495_Iron-Man-Arc-Reactor-Avengers-Endgame-iPhone-Wallpaper---iPhone-Wallpapers.jpg', 'Iron-Man', 0, 0, 1, 0),
(84, 1, '2020-03-05', '49725_Iron-man-lock-screen-wallpaper.jpg', 'Iron-Man', 0, 0, 1, 0),
(85, 1, '2020-03-05', '41307_jDtaHg7.jpg', 'Iron-Man', 0, 0, 1, 0),
(86, 1, '2020-03-05', '93532_mGgLmop.jpg', 'Iron-Man', 0, 0, 1, 0),
(87, 1, '2020-03-05', '75580_photo_2019-11-04_23-49-43.jpg', 'Iron-Man', 0, 0, 1, 0),
(88, 1, '2020-03-05', '57452_photo_2019-11-04_23-52-47.jpg', 'Iron-Man', 0, 0, 0, 0),
(89, 1, '2020-03-05', '72356_photo_2019-11-04_23-54-32.jpg', 'Iron-Man', 0, 0, 0, 0),
(90, 1, '2020-03-05', '37352_photo_2019-11-04_23-56-23.jpg', 'Iron-Man', 0, 0, 0, 0),
(91, 1, '2020-03-05', '75601_photo_2019-11-04_23-58-56.jpg', 'Iron-Man', 0, 0, 0, 0),
(92, 1, '2020-03-05', '14806_photo_2019-11-04_23-59-22.jpg', 'Iron-Man', 0, 0, 0, 0),
(93, 1, '2020-03-05', '96498_photo_2019-11-05_00-00-42.jpg', 'Iron-Man', 0, 0, 0, 0),
(94, 1, '2020-03-05', '32142_photo_2019-11-05_00-02-32.jpg', 'Iron-Man', 0, 0, 7, 0),
(95, 1, '2020-03-05', '48934_photo_2019-11-05_00-03-53.jpg', 'Iron-Man', 0, 0, 7, 0),
(96, 1, '2020-03-06', '88160_ced166811dba0c86e69908c5921bcca9.jpg', 'Spider-Man', 0, 0, 15, 1),
(97, 1, '2020-03-06', '33534_299173ed8930f958b94c0dfa98ec094b.jpg', 'Spider-Man', 1, 5, 19, 3),
(98, 1, '2020-03-09', '90254_d50ed4cf6d70b6d4220087304c26babd.jpg', 'Caption America', 0, 0, 7, 0),
(99, 1, '2020-03-11', '31867_2019_10_05_01_11_47.jpg', 'Iron-Man', 0, 0, 4, 0),
(102, 1, '2020-03-11', '18459_42415c1204dc0cab4f7aad0ea8052128.png', 'DC', 0, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallpaper_gif`
--

CREATE TABLE `tbl_wallpaper_gif` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gif_tags` text NOT NULL,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `total_rate` int(11) NOT NULL DEFAULT 0,
  `rate_avg` decimal(11,2) NOT NULL DEFAULT 0.00,
  `total_download` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wallpaper_gif`
--

INSERT INTO `tbl_wallpaper_gif` (`id`, `image`, `gif_tags`, `total_views`, `total_rate`, `rate_avg`, `total_download`) VALUES
(1, '48376_giphy.gif', 'zombis', 17, 0, 0.00, 0),
(6, '90632_f66e500c2c74b8f1b34aa5bbaf59cf52-(1).gif', 'iron Man', 20, 0, 0.00, 0),
(7, '94179_f796b84435373279b6e0c890e994fc76.gif', 'capt', 19, 0, 0.00, 0),
(11, '20096_c7d4b02583202c384e37fd9b85421d67.gif', 'NEW', 2, 0, 0.00, 0),
(12, '848_tenor-(1).gif', 'marvel', 7, 0, 0.00, 0),
(13, '71773_tenor-(2).gif', 'marvel', 9, 0, 0.00, 0),
(14, '65721_tenor-(3).gif', 'marvel', 14, 0, 0.00, 0),
(15, '60591_tenor-(4).gif', 'marvel', 12, 0, 0.00, 0),
(16, '83057_original.gif', 'DC', 6, 0, 0.00, 0),
(17, '43697_giphy.gif', 'DC', 7, 0, 0.00, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_home_banner`
--
ALTER TABLE `tbl_home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating_gif`
--
ALTER TABLE `tbl_rating_gif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ringtone`
--
ALTER TABLE `tbl_ringtone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wallpaper`
--
ALTER TABLE `tbl_wallpaper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wallpaper_gif`
--
ALTER TABLE `tbl_wallpaper_gif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_home_banner`
--
ALTER TABLE `tbl_home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rating_gif`
--
ALTER TABLE `tbl_rating_gif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ringtone`
--
ALTER TABLE `tbl_ringtone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wallpaper`
--
ALTER TABLE `tbl_wallpaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_wallpaper_gif`
--
ALTER TABLE `tbl_wallpaper_gif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
