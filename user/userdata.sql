-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-05-17 09:40:02
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `userdata`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cardlog`
--

CREATE TABLE `cardlog` (
  `m_carduid` varchar(32) NOT NULL,
  `m_uid` varchar(32) CHARACTER SET utf8 NOT NULL,
  `m_total` varchar(32) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cardlog`
--

INSERT INTO `cardlog` (`m_carduid`, `m_uid`, `m_total`) VALUES
('52785278', '', '1000'),
('555555', '85e23ff4', '100'),
('850327', '', '1000'),
('987654321', '5b2ea8c5', '50000');

-- --------------------------------------------------------

--
-- 資料表結構 `sensordata3`
--

CREATE TABLE `sensordata3` (
  `TransactionNo` varchar(32) CHARACTER SET utf8 NOT NULL,
  `m_cardid` varchar(32) CHARACTER SET utf8 NOT NULL,
  `addmoney` varchar(32) CHARACTER SET utf8 NOT NULL,
  `reading_time` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `sensordata3`
--

INSERT INTO `sensordata3` (`TransactionNo`, `m_cardid`, `addmoney`, `reading_time`) VALUES
('56464', '987654321', '100', '20220101'),
('6165113', '6516512', '0169846523', '51631651'),
('641654', '987654321', '500', '20220901'),
('6513264', '555555', '100', '20220101'),
('65186', '49684165', '4641685', '9684162'),
('68465', '987654321', '465', '20220301'),
('986532.', '987654321', '684', '20210506');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `m_uid` varchar(32) CHARACTER SET utf8 NOT NULL,
  `m_account` varchar(32) CHARACTER SET utf8 NOT NULL,
  `m_password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `m_name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `m_carduid` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`m_uid`, `m_account`, `m_password`, `m_name`, `m_carduid`) VALUES
('5b2ea8c5', '0000', '0000', '0000', '987654321'),
('6890d678', 'j4562694', 'k4562694', 'ff', ''),
('85e23ff4', 'raymond', 'raymond', 'raymond', '555555'),
('9bfb9665', '00', '00', '00', ''),
('bddcd880', '12345', '12345', 'raymond', ''),
('bf8df28a', '000', '000', '000', ''),
('e29955b8', '666', '666', 'jjjj', '');

-- --------------------------------------------------------

--
-- 資料表結構 `user_data`
--

CREATE TABLE `user_data` (
  `m_dataid` varchar(8) CHARACTER SET utf8 NOT NULL,
  `m_address` varchar(32) CHARACTER SET utf8 NOT NULL,
  `m_phone` varchar(10) CHARACTER SET utf8 NOT NULL,
  `m_identity` varchar(10) CHARACTER SET utf8 NOT NULL,
  `m_name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `m_carduid` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_data`
--

INSERT INTO `user_data` (`m_dataid`, `m_address`, `m_phone`, `m_identity`, `m_name`, `m_carduid`) VALUES
('5b2ea8c5', '高雄市左營區新莊仔路', '0987654321', 'E123456789', '陳建錞', '987654321'),
('6890d678', '55554', '596', '66', '', ''),
('85e23ff4', '高雄市左營區不告訴你', '097569999', 'e122567996', 'raymond', '555555'),
('9bfb9665', '46543', '646545', '0005465', '', ''),
('bddcd880', '', '', '', '', ''),
('bf8df28a', '', '', '', '', ''),
('ce22d3b8', '', '', '', '', ''),
('e29955b8', '465321', '6513', '6516', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cardlog`
--
ALTER TABLE `cardlog`
  ADD PRIMARY KEY (`m_carduid`);

--
-- 資料表索引 `sensordata3`
--
ALTER TABLE `sensordata3`
  ADD PRIMARY KEY (`TransactionNo`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`m_uid`);

--
-- 資料表索引 `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`m_dataid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
