-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2016 at 02:45 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `floraldiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `address`, `phone`, `email`) VALUES
(2, '123', '123', '', 0, ''),
(3, 'Alina', '12345', '', 0, ''),
(4, '12345', '56789', '', 0, ''),
(5, '123', '123', '', 0, ''),
(6, '123', '123', '', 0, ''),
(7, '12345', '12345', '', 0, ''),
(8, '111', '222', '', 0, ''),
(12, 'celinebong', '123', '', 0, ''),
(13, 'zi', 'zi', '', 0, ''),
(14, 'mimi', 'mimi', 'mimi', 234, 'mimi@mi.com'),
(15, 'cat', 'cat', 'cat', 234, 'celinebong@hotmail.com'),
(16, 'fifi', 'fifi', 'fifi', 13, 'fifi@fifi.com'),
(17, 'mumuu', 'mumuu', 'muuu', 67567, 'mu@mi.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;