-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-06-05 22:10
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
-- 데이터베이스: `b_storeid`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `storeid`
--

CREATE TABLE `storeid` (
  `id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `storeid`
--

INSERT INTO `storeid` (`id`) VALUES
('testCode'),
('testCode2'),
('testCode3'),
('testCode4'),
('testCode5');

-- --------------------------------------------------------

--
-- 테이블 구조 `store_interest`
--

CREATE TABLE `store_interest` (
  `storeid` varchar(45) NOT NULL,
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
-- 테이블의 인덱스 `storeid`
--
ALTER TABLE `storeid`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `store_interest`
--
ALTER TABLE `store_interest`
  ADD PRIMARY KEY (`storeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
