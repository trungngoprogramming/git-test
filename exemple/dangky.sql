-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2017 at 08:20 AM
-- Server version: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dangky`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'thuan', '123456', 'thuan', 'thuan@gmail.com'),
(2, 'thuan', '123456', 'thuan', 'thuan@gmail.com'),
(3, 'thuan', '123456', 'thuan', 'thuan@gmail.com'),
(4, 'thuan', '123456', 'thuan', 'thuan@gmail.com'),
(5, 'thuan', '123456', 'thuan', 'thuan@gmail.com'),
(6, 'dtu', '123456', 'thuan', 'thuan@gmail.com'),
(7, 'dtu', '123456', 'thuan', 'thuan@gmail.com'),
(8, 'abc', '123bac', 'thuan', 'thuan@gmail.com'),
(9, 'abc', 'b2fd763bf203793944178c1d7f8fa5', 'thuan', 'thuan@gmail.com'),
(10, 'aa', '827ccb0eea8a706c4c34a16891f84e', 'aa', 'aa@gmail.com'),
(11, 'abc', 'b2fd763bf203793944178c1d7f8fa5', 'thuan', 'thuan@gmail.com'),
(12, 'abc', 'b2fd763bf203793944178c1d7f8fa5', 'thuan', 'thuan@gmail.com'),
(13, 'dtu', 'e10adc3949ba59abbe56e057f20f88', 'thuan', 'thuan@gmail.com'),
(14, 'dtu', 'e10adc3949ba59abbe56e057f20f88', 'thuan', 'thuan@gmail.com'),
(15, 'dtu', 'e10adc3949ba59abbe56e057f20f88', 'thuan', 'thuan@gmail.com'),
(16, 'dtu', 'e10adc3949ba59abbe56e057f20f88', 'thuan', 'thuan@gmail.com'),
(17, 'dtu', 'e10adc3949ba59abbe56e057f20f88', 'thuan', 'thuan@gmail.com'),
(18, 'abc', 'b2fd763bf203793944178c1d7f8fa5', 'thuan', 'thuan@gmail.com'),
(19, 'abc', 'b2fd763bf203793944178c1d7f8fa5', 'thuan', 'thuan@gmail.com'),
(20, 'dd', '827ccb0eea8a706c4c34a16891f84e', 'thuan', 'thuan@gmail.com'),
(21, 'a', 'a906449d5769fa7361d7ecc6aa3f6d', 'thuan', 'thuan@gmail.com'),
(22, 'a', 'a906449d5769fa7361d7ecc6aa3f6d', 'thuan', 'thuan@gmail.com'),
(23, 'BaoHuy', '96e79218965eb72c92a549dd5a3301', 'baonguyen', 'nguyentrungthuan@gmail.com'),
(24, 'aaa', '96e79218965eb72c92a549dd5a3301', 'teo', 'teo@gmail.com'),
(25, 'teo', '202cb962ac59075b964b07152d234b', 'teo', 'teo@gmail.com'),
(26, 'huy', '202cb962ac59075b964b07152d234b', 'huy', 'huy@gmail.com'),
(27, 'tien', '827ccb0eea8a706c4c34a16891f84e', 'le van tien', 'tien@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
