-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 09:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `BIO` text NOT NULL,
  `PHOTO` longtext NOT NULL,
  `DATE_ENTERED` date NOT NULL DEFAULT current_timestamp(),
  `GENDER` varchar(6) NOT NULL,
  `PHONE` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ID`, `EMAIL`, `FIRST_NAME`, `LAST_NAME`, `BIO`, `PHOTO`, `DATE_ENTERED`, `GENDER`, `PHONE`) VALUES
(1, 'deh@gmail.com', 'ABD', 'SAADUDDIN', 'MY NAME IS DEH', 'uploads/inv.jpg', '2022-02-02', 'MALE', '09296691060'),
(19, 'dehgel@gmail.com', 'DANIA', 'SAADUDDIN', 'xcv\r\n', 'uploads/DELTA CAT online videos.png', '2022-02-07', 'Female', '+639978729636'),
(22, 'asdf@fas.com', 'zxcv', 'zxcv', 'asdf\r\n\r\n\r\n', 'uploads/', '2022-02-07', 'Female', 'zxcv'),
(23, 'poona.punod@gmail.com', 'xcv', 'xcv', 'xcv\r\n', 'uploads/', '2022-02-07', 'Female', '+639978729636'),
(51, 'asdf', 'asdf', 'asdf', 'asdf\r\n\r\n\r\n\r\n\r\n\r\n', 'uploads/', '2022-02-07', 'Male', 'asdf'),
(63, '', '', '', '', 'ASDF', '2022-02-07', 'MALE', ''),
(64, '', '', '', '', 'ASDF', '2022-02-07', 'MALE', ''),
(65, '', '', '', '', 'ASDF', '2022-02-07', 'MALE', ''),
(69, '', '', '', '', 'ASDF', '2022-02-07', 'MALE', ''),
(70, '', '', '', '', 'ASDF', '2022-02-07', 'MALE', ''),
(71, 'pics@gmail.com', 'asdf', 'asdf', 'asdf', '', '2022-02-07', 'MALE', ''),
(72, 'asdf@fas.com', 'asdf', '', '', 'uploads/', '2022-02-07', 'MALE', ''),
(73, 'ASDF@GMAIL.COM', 'asdf', '', '', '/content/uploads/', '2022-02-07', 'MALE', ''),
(74, 'ASDF@GMAIL.COM', 'asdf', '', '', '/content/uploads/', '2022-02-07', 'MALE', ''),
(75, 'dehgel@gmail.com', 'zxcv', 'zxcv', 'zxcv', 'D:xampphtdocsadmin/content/uploads/', '2022-02-07', 'MALE', '+639978729636'),
(76, 'dehgel@gmail.com', 'zxcv', 'zxcv', 'zxcv', 'D:xampphtdocs/content/uploads', '2022-02-07', 'MALE', '+639978729636'),
(77, 'poona.punod@gmail.com', 'xcv', 'xcv', '', 'D:xampphtdocs/content/uploads', '2022-02-07', 'MALE', '+639978729636'),
(78, 'poona.punod@gmail.com', 'xcv', 'xcv', '', 'D:xampphtdocs/content/uploads', '2022-02-07', 'MALE', '+639978729636'),
(79, 'poona.punod@gmail.com', 'xcv', 'xcv', '', 'D:xampphtdocs/content/uploads', '2022-02-07', 'MALE', '+639978729636'),
(80, 'poona.punod@gmail.com', 'xcv', 'xcv', '', 'D:xampphtdocs/content/uploads', '2022-02-07', 'MALE', '+639978729636'),
(81, 'poona.punod@gmail.com', 'zxcv', 'zxcv', '', '/uploads', '2022-02-07', 'MALE', '+639978729636'),
(82, 'poona.punod@gmail.com', 'zxcv', 'zxcv', '', 'D:xampphtdocs//uploads', '2022-02-07', 'MALE', '+639978729636'),
(83, 'dddehgel@gmail.com', 'Yusoph', 'Andrada', 'xcv', 'D:xampphtdocs//uploads', '2022-02-07', 'MALE', 'xcv'),
(84, 'dehgel@gmail.com', 'xcv', '', '', '', '2022-02-07', 'MALE', '+639978729636'),
(85, 'poona.punod@gmail.com', 'xcv', 'xcv', '', '/uploadsCCF02052022 (2).jpg', '2022-02-07', 'MALE', '+639978729636'),
(86, 'poona.punod@gmail.com', 'xcv', 'xcv', 'xcv', '/uploads/CCF02052022.jpg', '2022-02-07', 'MALE', '+639978729636'),
(87, 'poona.punod@gmail.com', 'xcv', 'xcv', 'xcv', '/uploads/CCF02052022.jpg', '2022-02-07', 'MALE', '+639978729636'),
(89, 'poona.punod@gmail.com', 'zxcv', 'xcv', 'xcv', '/content/uploads/download.jpg', '2022-02-07', 'MALE', '+639978729636'),
(90, 'dehgel@gmail.com', 'sdf', 'sdf', 'sdf', 'uploads/KOMS.png', '2022-02-07', 'MALE', '+639978729636'),
(91, 'poona.punod@gmail.com', 'zxcv', 'zxcv', 'zxcv', 'uploads/download.jpg', '2022-02-08', 'Female', '+639978729636'),
(92, 'dehgel@gmail.com', 'asdf', 'asdf', 'asdf', 'uploads/download.jpg', '2022-02-08', 'Female', '+639978729636'),
(93, 'ASDF@GMAIL.COM', 'fffffffffffff', 'ffffffffff', 'fffffffffffff\r\n\r\n\r\n', 'uploads/', '2022-02-08', 'Male', 'fffff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
