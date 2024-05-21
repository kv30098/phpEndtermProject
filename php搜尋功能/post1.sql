-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-10 12:07:01
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
-- 資料庫： `search`
--

-- --------------------------------------------------------

--
-- 資料表結構 `post1`
--

CREATE TABLE `post1` (
  `No` mediumint(255) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Store` varchar(5) NOT NULL,
  `Tag` varchar(100) NOT NULL,
  `Genre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `post1`
--

INSERT INTO `post1` (`No`, `Title`, `Description`, `Store`, `Tag`, `Genre`) VALUES
(1, '好吃的麵包', '真的很好吃', '全家', '#全家', '麵包'),
(2, '好吃的飯糰', '真的很好吃', '711', '#飯糰', '飯糰'),
(3, '好喝的飲料', '真的很好喝', '全家', '#飲料', '飲料'),
(4, '難吃的甜點', '真的很難吃', '711', '#甜點', '甜點'),
(5, '難吃的便當', '真的很難吃', '全家', '#主食', '主食'),
(6, '難吃的蘋果', '真的不會甜', '711', '#蔬果', '蔬果'),
(7, '普通的三明治', '吃起來很普通', '全家', '#三明治', '三明治');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `post1`
--
ALTER TABLE `post1`
  ADD PRIMARY KEY (`No`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `post1`
--
ALTER TABLE `post1`
  MODIFY `No` mediumint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
