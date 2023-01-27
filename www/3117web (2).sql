-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-02-11 18:08:29
-- 伺服器版本: 10.1.30-MariaDB
-- PHP 版本： 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `3117web`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(5) NOT NULL,
  `AdminUserName` varchar(30) NOT NULL,
  `AdminPW` varchar(10) NOT NULL,
  `AdminName` varchar(40) NOT NULL,
  `AdminEmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminUserName`, `AdminPW`, `AdminName`, `AdminEmail`) VALUES
(10001, 'admin_A', 'admin', 'A Restaurant', 'admin_A@admin.com'),
(10002, 'admin_B', 'admin', 'B Restaurant', 'admin_B@admin.com'),
(10003, 'admin_C', 'admin', 'C Restaurant', 'admin_C@admin.com'),
(10004, 'admin_D', 'admin', 'D Restaurant', 'admin_D@admin.com'),
(10005, 'admin_E', 'admin', 'E Restaurant', 'admin_E@admin.com');

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(5) NOT NULL,
  `CustomerUserName` varchar(40) NOT NULL,
  `CustomerPW` varchar(10) NOT NULL,
  `CustomerName` varchar(40) NOT NULL,
  `CustomerEmail` varchar(40) NOT NULL,
  `CustomerPhone` varchar(10) NOT NULL,
  `CustomerAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerUserName`, `CustomerPW`, `CustomerName`, `CustomerEmail`, `CustomerPhone`, `CustomerAddress`) VALUES
(100000, 'C1', 'member', 'First', 'email@email.com', '11111111', 'hong kong C1'),
(100001, 'C2', 'member2', 'Second', 'email2@email.com', '22222222', 'hong kong C2'),
(100002, 'C3', 'member3', 'third', 'email3@email.com', '33333333', 'hong kong C3'),
(100003, 'C4', 'member4', 'fourth', 'email4@email.com', '44444444', 'hong kong C4'),
(100004, 'C5', 'member5', 'fifth', 'email5@email.com', '55555555', 'hong kong C5');

-- --------------------------------------------------------

--
-- 資料表結構 `dish`
--

CREATE TABLE `dish` (
  `dishName` varchar(40) NOT NULL,
  `dishPrice` int(5) NOT NULL,
  `dishID` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `RestaurantID` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- 資料表的匯出資料 `dish`
--

INSERT INTO `dish` (`dishName`, `dishPrice`, `dishID`, `description`, `RestaurantID`) VALUES
('Fries', 20, 1, 'Hamburger and french fries', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `dishorder`
--

CREATE TABLE `dishorder` (
  `dishID` int(10) NOT NULL,
  `RestaurantID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `orderID` int(10) NOT NULL,
  `transportation` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant`
--

CREATE TABLE `restaurant` (
  `RestaurantID` int(4) NOT NULL,
  `RestaurantName` varchar(40) NOT NULL,
  `RestaurantEmail` varchar(60) NOT NULL,
  `RestaurantPhone` varchar(10) NOT NULL,
  `FoodType` varchar(40) NOT NULL,
  `District` varchar(40) NOT NULL,
  `RestaurantAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `restaurant`
--

INSERT INTO `restaurant` (`RestaurantID`, `RestaurantName`, `RestaurantEmail`, `RestaurantPhone`, `FoodType`, `District`, `RestaurantAddress`) VALUES
(1, 'A Restaurant', 'A_Restaurant@email.com', '21111111', 'Fast food', 'Yau Tsim Mong', 'Yau Tsim Mong, hong kong'),
(2, 'B Restaurant', 'B_Restaurant@email.com', '22222222', 'Fine Dining', 'Central and Western', 'Central and Western, hong kong'),
(3, 'C Restaurant', 'C_Restaurant@email.com', '23333333', 'Family Style', 'Kwun Tong', 'Kwun Tong, hong kong'),
(4, 'D Restaurant', 'D_Restaurant@email.com', '24444444', 'Cafe', 'Sai Kung', 'Sai Kung, hong kong'),
(5, 'E Restaurant', 'E_Restaurant@email.com', '25555555', 'Buffet', 'Yau Tsim Mong', 'Yau Tsim Mong, hong kong');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- 資料表索引 `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dishID`);

--
-- 資料表索引 `dishorder`
--
ALTER TABLE `dishorder`
  ADD PRIMARY KEY (`orderID`);

--
-- 資料表索引 `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestaurantID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;

--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100005;

--
-- 使用資料表 AUTO_INCREMENT `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestaurantID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
