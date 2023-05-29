-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 09:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betacast2009`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `fromuser` varchar(255) NOT NULL,
  `touser` varchar(255) NOT NULL,
  `text` varchar(600) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(520) NOT NULL,
  `icon` varchar(100) NOT NULL DEFAULT 'groupdefault',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `touser` varchar(255) NOT NULL,
  `fromuser` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `content` varchar(500) NOT NULL,
  `deleted` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mcn`
--

CREATE TABLE `mcn` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fromu` varchar(512) NOT NULL,
  `tou` varchar(512) NOT NULL,
  `content` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` mediumint(8) NOT NULL,
  `threadid` mediumint(8) NOT NULL,
  `date` bigint(15) NOT NULL,
  `text` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `ip` varchar(256) NOT NULL,
  `groupid` int(11) NOT NULL DEFAULT 2,
  `noPosting` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilecomments`
--

CREATE TABLE `profilecomments` (
  `id` int(11) NOT NULL,
  `fromuser` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `touser` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `text` varchar(500) NOT NULL,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `id` int(11) NOT NULL,
  `fromwho` varchar(512) NOT NULL,
  `towho` varchar(512) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` mediumint(8) NOT NULL,
  `date` bigint(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `ip` varchar(256) NOT NULL,
  `no_Posting` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `lastlogin` varchar(512) DEFAULT '-1',
  `bio` varchar(255) DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `channelicon` varchar(100) NOT NULL DEFAULT 'novideo',
  `subs` int(11) NOT NULL DEFAULT 0,
  `hidden` int(25) NOT NULL DEFAULT 0,
  `banned` int(11) NOT NULL DEFAULT 0,
  `partner` varchar(255) NOT NULL DEFAULT '0',
  `connect` varchar(120) DEFAULT NULL,
  `featuredvid` varchar(255) DEFAULT NULL,
  `mcn` varchar(255) DEFAULT NULL,
  `redirect` varchar(255) DEFAULT NULL,
  `ownsmcn` varchar(255) DEFAULT NULL,
  `unreadmsg` int(11) NOT NULL DEFAULT 0,
  `vanity` varchar(255) DEFAULT NULL,
  `chcolor` varchar(100) NOT NULL DEFAULT '666666',
  `profile` varchar(25) NOT NULL DEFAULT 'l',
  `recent` varchar(25) NOT NULL DEFAULT 'l',
  `subscriptions` varchar(25) NOT NULL DEFAULT 'l',
  `subsbox` varchar(25) NOT NULL DEFAULT 'r',
  `comments` varchar(25) NOT NULL DEFAULT 'r',
  `fvid` varchar(20) NOT NULL DEFAULT 'r',
  `temp_redir` varchar(255) DEFAULT NULL,
  `super_admin` int(11) NOT NULL DEFAULT 0,
  `vidswatched` int(11) NOT NULL DEFAULT 0,
  `suffix` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `views` int(255) NOT NULL DEFAULT 0,
  `author` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `featured` int(15) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `mp4` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `description`, `views`, `author`, `featured`, `date`, `mp4`, `thumb`, `deleted`) VALUES
(1, '', '', 0, '', 1, '2023-05-29 15:34:42', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcn`
--
ALTER TABLE `mcn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilecomments`
--
ALTER TABLE `profilecomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcn`
--
ALTER TABLE `mcn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilecomments`
--
ALTER TABLE `profilecomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
