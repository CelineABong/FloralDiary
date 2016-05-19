-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2016 at 06:12 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `floraldiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `userid` int(11) NOT NULL,
  `imageid` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`userid`, `imageid`, `text`) VALUES
(16, 33, 'Very cool! I wanna buy!'),
(16, 35, 'Very nice photo');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `title`, `description`, `price`, `path`, `userid`) VALUES
(32, 'asf', 'asdfasdf', 0, './model/image/celinebong/1463354052.jpg', 12),
(33, 'Screenshot', 'Print screen', 0, './model/image/mumu/1463355964.jpg', 17),
(34, 'Hey', 'asfdasfasf', 0, './model/image/mumuu/1463358874.jpg', 17),
(35, 'sdafasdf', 'asdfasf', 0, './model/image/fifi/1463543692.jpg', 16),
(36, 'weqr', 'qwer', 12, './model/image/fifi/1463630250.jpg', 16),
(37, 'ree', 'ree', 11, './model/image/fifi/1463630267.jpg', 16),
(38, 'heyy', 'yheyy', 33, './model/image/fifi/1463630485.jpg', 16),
(39, 'test', 'test', 335, './model/image/fifi/1463630734.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`user_id`, `image_id`) VALUES
(16, 32),
(16, 34),
(16, 35),
(16, 38);

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD KEY `userid` (`userid`),
  ADD KEY `imageid` (`imageid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`imageid`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
