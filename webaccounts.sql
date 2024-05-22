-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-22 18:22:35
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `webaccounts`
--

-- --------------------------------------------------------

--
-- 資料表結構 `accounts`
--

CREATE TABLE `accounts` (
  `userID` bigint(10) NOT NULL,
  `Nickname` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `accounts`
--

INSERT INTO `accounts` (`userID`, `Nickname`, `Email`, `Password`) VALUES
(137849205, 'CodeMaster', 'codemaster182@gmail.com', 'cm849205'),
(748392106, 'StarGazer', 'stargazer731@gmail.com', 'sg392106'),
(920384715, 'DreamChaser', 'dreamchaser937@gmail.com', 'dc384715');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `ProductID` bigint(10) NOT NULL,
  `ProductName` varchar(15) NOT NULL,
  `ProductCategory` varchar(10) NOT NULL,
  `Store` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductCategory`, `Store`) VALUES
(1092837465, '烤蔬菜番茄筆尖麵', '主食', '全家'),
(3748291046, '日式豬排佐咖哩歐姆蛋燴飯', '主食', '全家'),
(4856729345, '鐵觀音黑岩泡芙', '甜品', '全家'),
(7568493021, '打拋風植蔬餐盒', '主食', '全家'),
(9283746510, '三重起司貝果', '麵包', '全家');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
