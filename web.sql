-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2024 年 05 月 23 日 03:01
-- 伺服器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `web`
--
CREATE DATABASE IF NOT EXISTS `web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web`;

-- --------------------------------------------------------

--
-- 表的結構 `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `Nickname` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 轉存資料表中的資料 `accounts`
--

INSERT INTO `accounts` (`UserID`, `Nickname`, `Email`, `Password`) VALUES
(1, 'StarGazer', 'stargazer748392106@gmail.com', 'sg4839210'),
(2, 'DreamChaser', 'dreamchaser920384715@gmail.com', 'dg920384'),
(3, 'CodeMaster', 'codemaster137849205@gmail.com', 'cm137849'),
(4, 'Lotus', 'lotus56014376@gmail.com', 'lt3651987'),
(5, 'Gouki', 'gouki56431789@gmail.com', 'gk09364312'),
(6, 'niiiick', 'nickk@gmail.com', 'nick2033');

-- --------------------------------------------------------

--
-- 表的結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(10) NOT NULL AUTO_INCREMENT,
  `ProductImage` blob NOT NULL,
  `StoreLogo` blob NOT NULL,
  `ProductName` varchar(20) NOT NULL,
  `ProductPrice` varchar(5) NOT NULL,
  `PreferReview` float NOT NULL,
  `PriceReview` float NOT NULL,
  `SatietyReview` float NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
