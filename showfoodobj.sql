-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-28 04:15:55
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
-- 資料庫： `showfoodobj`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `ProductID` int(9) NOT NULL,
  `ProductName` varchar(20) DEFAULT NULL,
  `ProductPrice` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductPrice`) VALUES
(1, '三重起司貝果', 49),
(2, '烤蔬菜番茄筆尖麵', 79),
(3, '鐵觀音黑岩泡芙', 49);

-- --------------------------------------------------------

--
-- 資料表結構 `showfood`
--

CREATE TABLE `showfood` (
  `ProductID` int(9) NOT NULL,
  `imageSrc` varchar(255) DEFAULT NULL,
  `logoSrc` varchar(255) DEFAULT NULL,
  `foodName` varchar(50) DEFAULT NULL,
  `store` varchar(50) DEFAULT NULL,
  `satietyScore` decimal(2,1) DEFAULT NULL,
  `preferScore` decimal(2,1) DEFAULT NULL,
  `priceScore` decimal(2,1) DEFAULT NULL,
  `price` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `showfood`
--

INSERT INTO `showfood` (`ProductID`, `imageSrc`, `logoSrc`, `foodName`, `store`, `satietyScore`, `preferScore`, `priceScore`, `price`) VALUES
(2, 'uploads/烤蔬菜番茄筆尖麵.jpg', 'uploads/familymart.jpg', '烤蔬菜番茄筆尖麵', '全家', 5.5, 5.5, 6.3, 79),
(3, 'uploads/鐵觀音黑岩泡芙.jpg', 'uploads/familymart.jpg', '鐵觀音黑岩泡芙', '全家', 4.0, 6.2, 6.0, 49);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `UserID` int(10) NOT NULL,
  `Nickname` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `ProductID_2` (`ProductID`);

--
-- 資料表索引 `showfood`
--
ALTER TABLE `showfood`
  ADD PRIMARY KEY (`ProductID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `showfood`
--
ALTER TABLE `showfood`
  ADD CONSTRAINT `showfood_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
