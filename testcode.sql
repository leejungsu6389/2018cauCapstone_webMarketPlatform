-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-06-05 22:07
-- 서버 버전: 10.1.32-MariaDB
-- PHP 버전: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `testcode`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admin`
--

CREATE TABLE `admin` (
  `name` varchar(45) NOT NULL,
  `pswd` varchar(45) NOT NULL,
  `bigdreamCode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `admin`
--

INSERT INTO `admin` (`name`, `pswd`, `bigdreamCode`) VALUES
('testAdmin', '1234', 'testCode');

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `userID` varchar(45) NOT NULL,
  `itemID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `categorylist`
--

CREATE TABLE `categorylist` (
  `orderNumber` int(11) NOT NULL,
  `cName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `categorylist`
--

INSERT INTO `categorylist` (`orderNumber`, `cName`) VALUES
(0, '상의');

-- --------------------------------------------------------

--
-- 테이블 구조 `item`
--

CREATE TABLE `item` (
  `itemID` int(45) NOT NULL,
  `itemName` varchar(45) NOT NULL,
  `price` int(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `description2` varchar(45) NOT NULL,
  `description3` varchar(45) NOT NULL,
  `company` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `soldout` int(45) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `purchase`
--

CREATE TABLE `purchase` (
  `orderID` varchar(45) NOT NULL,
  `userID` varchar(45) NOT NULL,
  `itemID` int(45) NOT NULL,
  `date` date NOT NULL,
  `recvName` varchar(45) NOT NULL,
  `recvZip` varchar(45) NOT NULL,
  `recvAddr` varchar(45) NOT NULL,
  `recvTel` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `userID` varchar(45) NOT NULL,
  `pswd` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `joined_date` date NOT NULL,
  `zipCode` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telNum` varchar(45) NOT NULL,
  `mileage` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`userID`, `pswd`, `name`, `joined_date`, `zipCode`, `address`, `email`, `telNum`, `mileage`) VALUES
('test', '1234', 'a', '2018-06-05', 'b', 'c', 'd', 'e', 1000);

-- --------------------------------------------------------

--
-- 테이블 구조 `user_interest`
--

CREATE TABLE `user_interest` (
  `userID` varchar(45) NOT NULL,
  `m1` varchar(45) NOT NULL,
  `m2` varchar(45) NOT NULL,
  `m3` varchar(45) NOT NULL,
  `m4` varchar(45) NOT NULL,
  `m5` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`bigdreamCode`);

--
-- 테이블의 인덱스 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userID`,`itemID`) USING BTREE,
  ADD KEY `cart_ibfk_1` (`itemID`);

--
-- 테이블의 인덱스 `categorylist`
--
ALTER TABLE `categorylist`
  ADD PRIMARY KEY (`orderNumber`);

--
-- 테이블의 인덱스 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- 테이블의 인덱스 `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`orderID`,`userID`,`itemID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `userID` (`userID`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 테이블의 인덱스 `user_interest`
--
ALTER TABLE `user_interest`
  ADD PRIMARY KEY (`userID`);

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- 테이블의 제약사항 `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
