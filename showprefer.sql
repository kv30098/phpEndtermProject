-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-29 18:55:22
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
-- 資料庫： `showprefer`
--

-- --------------------------------------------------------

--
-- 資料表結構 `food`
--

CREATE TABLE `food` (
  `foodName` varchar(20) NOT NULL,
  `foodImage` varchar(255) NOT NULL,
  `foodPrice` int(5) NOT NULL,
  `storeLogo` varchar(255) NOT NULL,
  `nutritionLabel` varchar(255) NOT NULL,
  `ingredientList` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `food_avgscore`
--

CREATE TABLE `food_avgscore` (
  `foodName` varchar(20) NOT NULL,
  `uEmail` varchar(80) NOT NULL,
  `reviewTime` datetime NOT NULL,
  `satietyAvg` decimal(2,1) NOT NULL,
  `preferAvg` decimal(2,1) NOT NULL,
  `priceAvg` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `review`
--

CREATE TABLE `review` (
  `uEmail` varchar(80) NOT NULL,
  `foodName` varchar(20) NOT NULL,
  `reviewTime` datetime NOT NULL,
  `reviewText` text DEFAULT NULL,
  `satietyReview` decimal(2,1) NOT NULL,
  `preferReview` decimal(2,1) NOT NULL,
  `priceReview` decimal(2,1) NOT NULL,
  `likeCount` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `uploadedPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `uEmail` varchar(50) NOT NULL,
  `uName` varchar(10) NOT NULL,
  `uPhoto` varchar(255) NOT NULL,
  `uPass` varchar(255) NOT NULL,
  `uAge` tinyint(4) NOT NULL,
  `uHeight` decimal(4,1) NOT NULL,
  `uWeight` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `users_consump`
--

CREATE TABLE `users_consump` (
  `uEmail` varchar(80) NOT NULL,
  `userConsump` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user_dietary`
--

CREATE TABLE `user_dietary` (
  `uEmail` varchar(80) NOT NULL,
  `saltyPrefer` tinyint(4) DEFAULT NULL,
  `sourPrefer` tinyint(4) DEFAULT NULL,
  `sweetPrefer` tinyint(4) DEFAULT NULL,
  `bitterPrefer` tinyint(4) DEFAULT NULL,
  `spicyPrefer` tinyint(4) DEFAULT NULL,
  `dietaryPrefer` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user_prefer`
--

CREATE TABLE `user_prefer` (
  `uEmail` varchar(80) NOT NULL,
  `prohibitFood` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodName`);

--
-- 資料表索引 `food_avgscore`
--
ALTER TABLE `food_avgscore`
  ADD KEY `uEmail` (`uEmail`,`foodName`,`reviewTime`);

--
-- 資料表索引 `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`uEmail`,`foodName`,`reviewTime`),
  ADD KEY `foodName` (`foodName`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uEmail`);

--
-- 資料表索引 `users_consump`
--
ALTER TABLE `users_consump`
  ADD PRIMARY KEY (`userConsump`),
  ADD KEY `uEmail` (`uEmail`);

--
-- 資料表索引 `user_dietary`
--
ALTER TABLE `user_dietary`
  ADD KEY `uEmail` (`uEmail`);

--
-- 資料表索引 `user_prefer`
--
ALTER TABLE `user_prefer`
  ADD PRIMARY KEY (`uEmail`,`prohibitFood`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `food_avgscore`
--
ALTER TABLE `food_avgscore`
  ADD CONSTRAINT `food_avgscore_ibfk_1` FOREIGN KEY (`uEmail`,`foodName`,`reviewTime`) REFERENCES `review` (`uEmail`, `foodName`, `reviewTime`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`uEmail`) REFERENCES `users` (`uEmail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`foodName`) REFERENCES `food` (`foodName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `users_consump`
--
ALTER TABLE `users_consump`
  ADD CONSTRAINT `users_consump_ibfk_1` FOREIGN KEY (`uEmail`) REFERENCES `users` (`uEmail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `user_dietary`
--
ALTER TABLE `user_dietary`
  ADD CONSTRAINT `user_dietary_ibfk_1` FOREIGN KEY (`uEmail`) REFERENCES `users` (`uEmail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `user_prefer`
--
ALTER TABLE `user_prefer`
  ADD CONSTRAINT `user_prefer_ibfk_1` FOREIGN KEY (`uEmail`) REFERENCES `users` (`uEmail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
