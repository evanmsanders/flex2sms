-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.safirefighter.com
-- Generation Time: Oct 22, 2012 at 01:16 PM
-- Server version: 5.1.53
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flex2sms_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `brigades`
--

CREATE TABLE IF NOT EXISTS `brigades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `capcodes`
--

CREATE TABLE IF NOT EXISTS `capcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brigade_id` int(11) DEFAULT NULL,
  `number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modem_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_not_before` time DEFAULT '00:00:00',
  `default_not_after` time DEFAULT '23:59:59',
  `approved_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'All contact information.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `smsdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `insertdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text COLLATE utf8_unicode_ci,
  `phone` tinyint(4) DEFAULT NULL,
  `processed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modems`
--

CREATE TABLE IF NOT EXISTS `modems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `multipartinbox`
--

CREATE TABLE IF NOT EXISTS `multipartinbox` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `smsdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `insertdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text COLLATE utf8_unicode_ci,
  `phone` tinyint(4) DEFAULT NULL,
  `processed` tinyint(4) NOT NULL DEFAULT '0',
  `refnum` int(8) DEFAULT NULL,
  `maxnum` int(8) DEFAULT NULL,
  `curnum` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `processed_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `insertdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(480) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` tinyint(4) DEFAULT NULL,
  `processed` tinyint(4) NOT NULL DEFAULT '0',
  `error` tinyint(4) NOT NULL DEFAULT '-1',
  `dreport` tinyint(4) NOT NULL DEFAULT '0',
  `not_before` time NOT NULL DEFAULT '00:00:00',
  `not_after` time NOT NULL DEFAULT '23:59:59',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capcode_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `type` VARCHAR(45) NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `active` INT NULL DEFAULT 1  AFTER `comment` 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE  TABLE IF NOT EXISTS `keywords` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `word` VARCHAR(100) NOT NULL COMMENT 'Key words' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) );
-- --------------------------------------------------------

--
-- Table structure for table `keywords_services`
--
CREATE  TABLE IF NOT EXISTS `keywords_services` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `keyword_id` INT NOT NULL ,
  `service_id` INT NOT NULL COMMENT 'Services and keyword join table' ,
  PRIMARY KEY (`id`) );
