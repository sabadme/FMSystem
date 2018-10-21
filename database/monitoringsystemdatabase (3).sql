-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 07:34 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringsystemdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equipment_code` varchar(255) NOT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `equipment_start` varchar(255) NOT NULL,
  `equipment_end` varchar(255) NOT NULL,
  `equipment_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment_code`, `equipment_name`, `equipment_start`, `equipment_end`, `equipment_filename`) VALUES
(1, 's', 's', '2018-01-02', '2018-01-05', '145592017.jpg'),
(2, 'test-01', 'test', '2018-01-11', '2018-01-10', 'd.jpg'),
(3, 'hotel-01', 'Hotel', '2018-01-24', '2018-01-17', 'image2.jpg'),
(4, 'hotel-01', 'Hotel', '2018-01-24', '2018-01-17', 'image2.jpg'),
(5, 'layout-01', 'layout', '2018-01-03', '2018-01-03', 'layout.jpg'),
(6, 'layout-01', 'layout', '2018-01-03', '2018-01-03', 'layout.jpg'),
(7, 'layout-01', 'layout', '2018-01-03', '2018-01-03', 'layout.jpg'),
(8, 'dsdsd', 'dsds', '2018-01-03', '2018-01-24', 'IMAG0362.jpg'),
(9, 'dsdsd', 'dsds', '2018-01-03', '2018-01-24', 'IMAG0362.jpg'),
(10, 'ssss', 'ssss', '2018-01-02', '2018-01-03', 'IMAG0223.jpg'),
(11, '3NJAFTzDvb', 'SMOKIE', '2018-02-01', '2018-02-02', 'IMAG0205.jpg'),
(12, 'C9V8ZoMHh2', 'rtyr', '2018-02-02', '2018-02-10', 'untitled.png'),
(13, 'aCttGAZg1U', 'da', '2018-02-02', '2018-02-17', '145592017.jpg'),
(14, 'aCttGAZg1U', 'da', '2018-02-02', '2018-02-17', '145592017.jpg'),
(15, 'iP52WCqRvw', 'test', '2018-02-02', '2018-02-16', '145592017.jpg'),
(16, 'iP52WCqRvw', 'test', '2018-02-02', '2018-02-16', '145592017.jpg'),
(17, 'iP52WCqRvw', 'test', '2018-02-02', '2018-02-16', '145592017.jpg'),
(18, 'zYskOyGkzq', 'test2', '2018-02-09', '2018-02-24', '145592017.jpg'),
(19, 'CKCFzNtszK', 'ea', '2018-02-01', '2018-02-15', 'a.jpg'),
(20, '', 'HEY', '2018-02-02', '2018-02-16', 'a2.jpg'),
(21, 'QQ6QCHuWNC', 'equip', '2018-02-09', '2018-02-24', '145592017.jpg'),
(22, 'QQ6QCHuWNC', 'equip', '2018-02-09', '2018-02-24', '145592017.jpg'),
(23, 'bBl2sui5Od', 'test3', '2018-02-09', '2018-02-23', 'd.jpg'),
(24, 'vc7u23tAk8', 'kent', '2018-02-01', '2018-02-02', 'IMAG0213.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_picture`
--

CREATE TABLE `equipment_picture` (
  `id` int(11) NOT NULL,
  `Equipment_name` varchar(255) NOT NULL,
  `Equipment_picture_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `account`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'null', 'null'),
(2, 'Office', 'Office', 'Office', 'null', 'null'),
(3, 'PPGS', 'PPGS', 'PPGS', 'null', 'null'),
(4, 'kenn', 'kenn', 'kenn', 'kenn', 'lastname'),
(5, 'kenn', 'kenn', 'ali', 'kenn', 'lastname'),
(6, 'smokie', 'smokie', 'smokie', 'smokie', 'palingi n'),
(7, 'smokie', 'smokie', 'smokie', 'smokie', 'palingi n'),
(8, 'smokie', 'smokie', 'smokie', 'smokie', 'palingi n'),
(9, 'asd', 'asd', 'asd', 'asd', 'asd'),
(10, 'asd', 'asd', 'asd', 'asd', 'asd'),
(11, 'try', 'try', 'rey', 'try', 'try'),
(12, 'test', 'test', 'test', 'test', 'test'),
(13, 'test', 'test', 'test', 'test', 'test'),
(14, 'test', 'test', 'test', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_picture`
--
ALTER TABLE `equipment_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `equipment_picture`
--
ALTER TABLE `equipment_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
