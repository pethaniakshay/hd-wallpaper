-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 12:24 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hd_wallpaper_new`
--

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
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `dt_rate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `dt_rate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `home_latest_limit` int(2) NOT NULL DEFAULT '10',
  `home_most_viewed_limit` int(2) NOT NULL DEFAULT '10',
  `home_most_rated_limit` int(2) NOT NULL DEFAULT '10',
  `api_latest_limit` int(3) NOT NULL DEFAULT '15',
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
(1, '54fdcb59-c790-48b3-bd24-d466759bba2a', 'OWYzYjNkNjMtYmUzNS00Y2MwLTk3YzEtNjVmNTk0ZmNkZjY5ff', 'YtmpgwcUzCbeh1JlsK0gRff0njtXm9g9lAUt4pzsPZhsH8a', 'HD Wallpaper App', 'ic_launcher.png', 'info@viaviweb.com', '1.0.0', 'Viavi Webtech', '+91 9227777522', 'www.viaviweb.com', '<p><strong>&ldquo;HD Wallpaper&rdquo;</strong> is a cool new app that brings all the best HD wallpapers and backgrounds to your Android device.</p>\r\n\r\n<p>Each high resolution image has been perfectly formatted fit to the phone display and comes with a host of user friendly features. The stunning UI allows you easily tap and swipe your way through the multiple image galleries.<br />\r\n<br />\r\nTo develop similar app with your name you can contact us via skype or whatsapp.<br />\r\n<br />\r\n<strong>Skype:</strong> viaviwebtech<br />\r\n<strong>WhatsApp:</strong> +919227777522</p>\r\n', 'Viavi Webtech', '<h2>Privacy Policy</h2>\r\n\r\n<p>Provides this Privacy Policy to help you understand how we collect, use and disclose information, including what you may provide to us or that we obtain from our products and services. We treat your privacy very seriously.</p>\r\n\r\n<p><strong>Information Collection &amp; Usage</strong></p>\r\n\r\n<p>We collect the following information to provide you an enhanced user experience and better services as well as to improve our products.</p>\r\n\r\n<p><strong>I. Product Metrics</strong></p>\r\n\r\n<p>We collect data about how you and your device interact with our products. This includes (1) device information such as manufacturer, model, OS version, language settings, nation settings and applications installed, (2) data regarding our application such as version and installation source, and (3) your interaction data such as views, duration of stay at views, transition from view to view and how you enter and leave the view. The data collected helps us know which functions you like and which functions to improve. This information allows us to improve our products and provide you a better user experience. All data is encrypted before being stored locally or transferred to our servers for analysis. Only authorized personnel can access the summarized data with the original data regarding your interactions destroyed periodically.</p>\r\n\r\n<p><strong>II. Feedback Data</strong></p>\r\n\r\n<p>We use Zendesk as the feedback platform as we recognize your trust and suggestions make us better. This platform allows our well trained support team members to interact with you. We collect the content of messages you send to us, such as feedback, questions or information you provide for customer support. When you contact us for customer support, phone conversations or chat sessions with our representatives may be monitored and recorded.</p>\r\n\r\n<p><strong>III. Crash Data</strong></p>\r\n\r\n<p>We use Google Fabric to collect crash data from some users. This helps us improve our products and services for all users.</p>\r\n\r\n<p><strong>IV. The Installed App List</strong></p>\r\n\r\n<p>To avoid showing the same notification twice to you, we use the installed App list, locally, to check if there are the similar themes in the system. The information of installed themes might be encrypted and sent to the server.</p>\r\n\r\n<p><strong>Data Protection</strong></p>\r\n\r\n<p>All data stored in your device and transmitted to our cloud services from our application is encrypted with access restricted for the usage stated in this document.</p>\r\n\r\n<p><strong>Data Sharing</strong></p>\r\n\r\n<p>We do not sell any data to third parties. We may share data with third parties to improve your user experience.</p>\r\n\r\n<p><strong>Change of Control</strong></p>\r\n\r\n<p>If we sell or otherwise transfer our products or our assets to another organizations, data received from or about our users may be among the items sold or transferred. Any buyer or transferee will be required to honor the commitments made in this Privacy Policy.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>We may update this Privacy Policy to reflect changes to our information practices. If we make any material changes we will notify users by means of a notice on our website prior to the change becoming effective. We encourage you to periodically review this page for the latest information on our privacy practices.</p>\r\n', 20, 20, 20, 20, 'category_name', 'DESC', 'ASC', 'pub-8356404931736973', 'true', 'ca-app-pub-8356404931736973/7100246157', '5', 'true', 'ca-app-pub-8356404931736973/9726409493', 'pub-8356404931736973', '123', 'false', 'ca-app-pub-8356404931736973/7100246157', '3', 'false', 'ca-app-pub-8356404931736973/9726409493');

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
  `total_rate` int(11) NOT NULL DEFAULT '0',
  `rate_avg` decimal(11,0) DEFAULT '0',
  `total_views` int(11) NOT NULL DEFAULT '0',
  `total_download` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallpaper_gif`
--

CREATE TABLE `tbl_wallpaper_gif` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gif_tags` text NOT NULL,
  `total_views` int(11) NOT NULL DEFAULT '0',
  `total_rate` int(11) NOT NULL DEFAULT '0',
  `rate_avg` decimal(11,2) NOT NULL DEFAULT '0.00',
  `total_download` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_home_banner`
--
ALTER TABLE `tbl_home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rating_gif`
--
ALTER TABLE `tbl_rating_gif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wallpaper`
--
ALTER TABLE `tbl_wallpaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_wallpaper_gif`
--
ALTER TABLE `tbl_wallpaper_gif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
