-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2014 at 11:52 AM
-- Server version: 5.6.15
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unic`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(45) DEFAULT NULL,
  `c_school` int(10) NOT NULL,
  `c_estimated_effort` varchar(15) NOT NULL,
  `c_length` varchar(20) NOT NULL,
  `c_code` varchar(10) DEFAULT NULL,
  `c_rating` int(5) DEFAULT NULL,
  `c_comments_id` int(10) DEFAULT NULL,
  `c_owner` int(10) DEFAULT NULL,
  `c_page_id` int(10) DEFAULT NULL,
  `c_price` int(10) DEFAULT NULL,
  `c_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  KEY `fk_course_user_id_idx` (`c_owner`),
  KEY `c_uid` (`c_owner`),
  KEY `c_school` (`c_school`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_has_videos`
--

CREATE TABLE IF NOT EXISTS `course_has_videos` (
  `course_id` int(10) NOT NULL DEFAULT '0',
  `video_id` int(10) NOT NULL,
  PRIMARY KEY (`course_id`,`video_id`),
  KEY `fk_course_has_videos_1` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_page`
--

CREATE TABLE IF NOT EXISTS `course_page` (
  `cp_id` int(10) NOT NULL DEFAULT '0',
  `cp_description` text,
  `cp_about` text,
  `cp_instructors` text,
  PRIMARY KEY (`cp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_confirmations`
--

CREATE TABLE IF NOT EXISTS `email_confirmations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `code` char(32) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  `modifiedAt` int(10) unsigned DEFAULT NULL,
  `confirmed` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

CREATE TABLE IF NOT EXISTS `failed_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned DEFAULT NULL,
  `ipAddress` char(15) NOT NULL,
  `attempted` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_changes`
--

CREATE TABLE IF NOT EXISTS `password_changes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `ipAddress` char(15) NOT NULL,
  `userAgent` varchar(48) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profilesId` int(10) unsigned NOT NULL,
  `resource` varchar(16) NOT NULL,
  `action` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profilesId` (`profilesId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `active` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `active` (`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `remember_tokens`
--

CREATE TABLE IF NOT EXISTS `remember_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `token` char(32) NOT NULL,
  `userAgent` varchar(120) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reset_passwords`
--

CREATE TABLE IF NOT EXISTS `reset_passwords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `code` varchar(48) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  `modifiedAt` int(10) unsigned DEFAULT NULL,
  `reset` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `school_id` int(10) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(40) DEFAULT NULL,
  `school_cover_image` varchar(255) DEFAULT NULL,
  `school_about` text,
  `school_owner` int(10) DEFAULT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `success_logins`
--

CREATE TABLE IF NOT EXISTS `success_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usersId` int(10) unsigned NOT NULL,
  `ipAddress` char(15) NOT NULL,
  `userAgent` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`usersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(100) NOT NULL,
  `u_username` varchar(255) DEFAULT NULL,
  `u_password` text,
  `mustChangePassword` varchar(1) NOT NULL,
  `profilesId` int(10) NOT NULL,
  `u_secret_key` varchar(255) DEFAULT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'N',
  `banned` varchar(1) NOT NULL DEFAULT 'N',
  `suspended` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`u_id`),
  KEY `profilesId` (`profilesId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_enrolled`
--

CREATE TABLE IF NOT EXISTS `user_enrolled` (
  `enroll_id` int(10) NOT NULL AUTO_INCREMENT,
  `enroll_uid` int(10) DEFAULT NULL,
  `enroll_cid` int(10) DEFAULT NULL,
  `enroll_date` datetime DEFAULT NULL,
  `enroll_school_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`enroll_id`),
  KEY `enroll_uid` (`enroll_uid`),
  KEY `enroll_cid` (`enroll_cid`),
  KEY `enroll_school_id` (`enroll_school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `video_id` int(10) NOT NULL DEFAULT '0',
  `video_uploader` int(10) DEFAULT NULL,
  `video_length` varchar(10) DEFAULT NULL,
  `video_thumb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_course_page` FOREIGN KEY (`c_id`) REFERENCES `course_page` (`cp_id`),
  ADD CONSTRAINT `fk_course_school` FOREIGN KEY (`c_school`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_has_videos`
--
ALTER TABLE `course_has_videos`
  ADD CONSTRAINT `fk_course_has_videos` FOREIGN KEY (`course_id`) REFERENCES `course` (`c_id`),
  ADD CONSTRAINT `fk_course_has_videos_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_profileID` FOREIGN KEY (`profilesId`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_enrolled`
--
ALTER TABLE `user_enrolled`
  ADD CONSTRAINT `dsfs` FOREIGN KEY (`enroll_school_id`) REFERENCES `school` (`school_id`),
  ADD CONSTRAINT `fk_enroll_course_id` FOREIGN KEY (`enroll_cid`) REFERENCES `course` (`c_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
