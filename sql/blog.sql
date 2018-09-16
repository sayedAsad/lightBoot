-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2018 at 07:12 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(150) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `slug`, `status`) VALUES
(4, 'Technology', 'Tech', 1),
(5, 'Programming', 'Programming', 1),
(6, 'Web Design', 'Wb', 1),
(7, 'News', 'news', 1),
(8, 'new category', 'tech', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`con_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `user_id`, `message`, `date`) VALUES
(1, 2, 'and this is the message of the user', '2018 - 8 - 1 / 17 : 32 : 39'),
(2, 2, 'This is the message from the user by contact form.', '2018 - 8 - 2 / 10 : 19 : 26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `p_content` varchar(255) DEFAULT NULL,
  `pic` varchar(200) NOT NULL,
  `p_category` int(11) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`page_id`),
  KEY `p_category` (`p_category`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `p_title`, `status`, `p_content`, `pic`, `p_category`, `date`) VALUES
(1, 'Home', 1, 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your\r\n', 'images/a.png\r\n', 6, '2018 - 8 - 1 / 17 : 32 : 39'),
(2, '10 Tips to create a beautiful party', 1, 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your\r\n', 'images/b.jpg', 5, '2018 - 8 - 1 / 17 : 32 : 39');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publish_date` varchar(64) DEFAULT NULL,
  `pStatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `category` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `image`, `category`, `user_id`, `publish_date`, `pStatus`) VALUES
(20, 'Tips for success', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your', 'images/arid-clouds-daylight-1352196.jpg', 4, 1, '2018 - 8 - 3 / 19 : 4 : 48', 0),
(19, 'Better web development', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your', 'images/a.jpg', 6, 2, '2018 - 08 - 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

DROP TABLE IF EXISTS `usertable`;
CREATE TABLE IF NOT EXISTS `usertable` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `job_title` varchar(32) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `re_pass` varchar(120) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `profile_pic` varchar(40) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `login_type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`user_id`, `name`, `last_name`, `job_title`, `username`, `password`, `re_pass`, `email`, `profile_pic`, `status`, `login_type`) VALUES
(1, 'jalal', 'Ahmadi', 'Web developer', 'ahmad123', '123', '', 'ahmad@gmail.com', 'images/cx.jpg', 1, 1),
(2, 'Mohammad', 'Ahmadi', 'Andorid developer', 'mohammad123', '123', '', 'mahmood@gmail.com', 'images/a.jpg', 0, 0),
(21, 'asad', 'hossieny', 'web developer', 'sayed@gmail.com', 'images/cx.jpg', 'sayed123', '123', '123', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
