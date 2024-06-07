-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-06-07 16:28:54
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
-- 資料庫： `phpfinalproject`
--

-- --------------------------------------------------------

--
-- 資料表結構 `food`
--

CREATE TABLE `food` (
  `foodName` varchar(20) NOT NULL,
  `store` varchar(10) NOT NULL,
  `categoty` varchar(10) NOT NULL,
  `foodImage` varchar(255) NOT NULL,
  `foodPrice` int(5) NOT NULL,
  `storeLogo` varchar(255) NOT NULL,
  `nutritionLabel` varchar(255) NOT NULL,
  `ingredientList` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `food`
--

INSERT INTO `food` (`foodName`, `store`, `categoty`, `foodImage`, `foodPrice`, `storeLogo`, `nutritionLabel`, `ingredientList`) VALUES
('烤蔬菜番茄筆尖麵', '全家', '主食', 'uploads/烤蔬菜番茄筆尖麵.jpg', 79, 'uploads/familymart.jpg', '', ''),
('鐵觀音黑岩泡芙', '全家', '甜點', 'uploads/鐵觀音黑岩泡芙.jpg', 49, 'uploads/FM_Logo.png', '', '');

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

--
-- 傾印資料表的資料 `food_avgscore`
--

INSERT INTO `food_avgscore` (`foodName`, `uEmail`, `reviewTime`, `satietyAvg`, `preferAvg`, `priceAvg`) VALUES
('烤蔬菜番茄筆尖麵', 'dazhuang@gmail.com', '2024-05-30 17:02:24', 4.2, 7.5, 6.4);

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

--
-- 傾印資料表的資料 `review`
--

INSERT INTO `review` (`uEmail`, `foodName`, `reviewTime`, `reviewText`, `satietyReview`, `preferReview`, `priceReview`, `likeCount`, `dislike`, `uploadedPhoto`) VALUES
('dazhuang@gmail.com', '烤蔬菜番茄筆尖麵', '2024-05-30 11:08:35', '味道很不錯，但分量有點少，食量大的人不推薦', 4.0, 7.8, 6.5, 4, 1, 'uploads/很好吃可以吃三碗.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `uName` varchar(10) NOT NULL,
  `uEmail` varchar(80) NOT NULL,
  `uPass` varchar(255) NOT NULL,
  `uPhone` varchar(10) NOT NULL,
  `uPhoto` varchar(255) NOT NULL,
  `uAge` tinyint(4) NOT NULL,
  `uHeight` decimal(4,1) NOT NULL,
  `uWeight` decimal(4,1) NOT NULL,
  `uIdentify` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`uName`, `uEmail`, `uPass`, `uPhone`, `uPhoto`, `uAge`, `uHeight`, `uWeight`, `uIdentify`) VALUES
('大壯', 'dazhuang@gmail.com', 'dazhuang123', '0910080080', 'uploads/bihan.jpg', 21, 175.0, 65.0, 'admin'),
('wen', 'wen@gmail.com', 'wen123456', '', '', 20, 178.0, 67.0, ''),
('小帥', 'xiaoshuai@gmail.com', 'xiaoshuai123', '', '', 0, 0.0, 0.0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `users_consump`
--

CREATE TABLE `users_consump` (
  `uEmail` varchar(80) NOT NULL,
  `userConsump` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users_consump`
--

INSERT INTO `users_consump` (`uEmail`, `userConsump`) VALUES
('dazhuang@gmail.com', 4);

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
  `dietaryPrefer` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user_dietary`
--

INSERT INTO `user_dietary` (`uEmail`, `saltyPrefer`, `sourPrefer`, `sweetPrefer`, `bitterPrefer`, `spicyPrefer`, `dietaryPrefer`) VALUES
('dazhuang@gmail.com', 3, 2, 5, 1, 4, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `user_dislike_food`
--

CREATE TABLE `user_dislike_food` (
  `uEmail` varchar(80) NOT NULL,
  `foodName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user_dislike_food`
--

INSERT INTO `user_dislike_food` (`uEmail`, `foodName`) VALUES
('dazhuang@gmail.com', '烤蔬菜番茄筆尖麵');

-- --------------------------------------------------------

--
-- 資料表結構 `user_like_food`
--

CREATE TABLE `user_like_food` (
  `uEmail` varchar(80) NOT NULL,
  `foodName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user_like_food`
--

INSERT INTO `user_like_food` (`uEmail`, `foodName`) VALUES
('dazhuang@gmail.com', '烤蔬菜番茄筆尖麵');

-- --------------------------------------------------------

--
-- 資料表結構 `user_prefer`
--

CREATE TABLE `user_prefer` (
  `uEmail` varchar(80) NOT NULL,
  `prohibitFood` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user_prefer`
--

INSERT INTO `user_prefer` (`uEmail`, `prohibitFood`) VALUES
('dazhuang@gmail.com', '堅果（如：花生、杏仁等）');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodName`),
  ADD UNIQUE KEY `foodImage` (`foodImage`);

--
-- 資料表索引 `food_avgscore`
--
ALTER TABLE `food_avgscore`
  ADD PRIMARY KEY (`reviewTime`),
  ADD KEY `uEmail` (`uEmail`),
  ADD KEY `foodName` (`foodName`);

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
  ADD PRIMARY KEY (`uEmail`,`dietaryPrefer`);

--
-- 資料表索引 `user_dislike_food`
--
ALTER TABLE `user_dislike_food`
  ADD KEY `uEmail` (`uEmail`),
  ADD KEY `foodName` (`foodName`);

--
-- 資料表索引 `user_like_food`
--
ALTER TABLE `user_like_food`
  ADD KEY `uEmail` (`uEmail`),
  ADD KEY `foodName` (`foodName`);

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
  ADD CONSTRAINT `food_avgscore_ibfk_1` FOREIGN KEY (`uEmail`) REFERENCES `users` (`uEmail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_avgscore_ibfk_2` FOREIGN KEY (`foodName`) REFERENCES `food` (`foodName`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- 資料表的限制式 `user_dislike_food`
--
ALTER TABLE `user_dislike_food`
  ADD CONSTRAINT `user_dislike_food_ibfk_1` FOREIGN KEY (`uEmail`) REFERENCES `users` (`uEmail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_dislike_food_ibfk_2` FOREIGN KEY (`foodName`) REFERENCES `food` (`foodName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `user_like_food`
--
ALTER TABLE `user_like_food`
  ADD CONSTRAINT `user_like_food_ibfk_1` FOREIGN KEY (`uEmail`) REFERENCES `users` (`uEmail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_like_food_ibfk_2` FOREIGN KEY (`foodName`) REFERENCES `food` (`foodName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `user_prefer`
--
ALTER TABLE `user_prefer`
  ADD CONSTRAINT `user_prefer_ibfk_1` FOREIGN KEY (`uEmail`) REFERENCES `users` (`uEmail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
