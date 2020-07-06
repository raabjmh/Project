-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 04:21 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymguider`
--

-- --------------------------------------------------------

--
-- Table structure for table `favouritegyms`
--

CREATE TABLE `favouritegyms` (
  `id` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `favouritegyms_vw`
-- (See below for the actual view)
--
CREATE TABLE `favouritegyms_vw` (
`fav_id` int(11)
,`gym_id` int(11)
,`customer_id` varchar(100)
,`gym_name` varchar(300)
,`country` varchar(100)
,`city` varchar(100)
,`image` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `feedback_vw`
-- (See below for the actual view)
--
CREATE TABLE `feedback_vw` (
`customer` varchar(100)
,`allrate` tinyint(4)
,`description` varchar(500)
,`isvalid` tinyint(4)
,`id` int(11)
,`name` varchar(300)
);

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `country` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `district` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `petfriendly` tinyint(4) NOT NULL,
  `latitude` float NOT NULL,
  `logitude` float NOT NULL,
  `owner` varchar(100) NOT NULL,
  `services` varchar(500) NOT NULL,
  `facilities` varchar(500) NOT NULL,
  `working_days` varchar(500) NOT NULL,
  `wstart_at` time NOT NULL,
  `wend_at` time NOT NULL,
  `special_days` varchar(500) NOT NULL,
  `sstart_at` time NOT NULL,
  `send_at` time NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `petfriendly` tinyint(4) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `owner` varchar(100) NOT NULL,
  `swimsuit` tinyint(4) NOT NULL,
  `changeroom` tinyint(4) NOT NULL,
  `wifi` tinyint(4) NOT NULL,
  `lockers` tinyint(4) NOT NULL,
  `carparking` tinyint(4) NOT NULL,
  `swimpool` tinyint(4) NOT NULL,
  `basketball` tinyint(4) NOT NULL,
  `saunapath` tinyint(4) NOT NULL,
  `football` tinyint(4) NOT NULL,
  `cardiomachine` tinyint(4) NOT NULL,
  `weightmachine` tinyint(4) NOT NULL,
  `classes` tinyint(4) NOT NULL,
  `tabletenis` tinyint(4) NOT NULL,
  `volleyball` tinyint(4) NOT NULL,
  `working_days` varchar(500) NOT NULL,
  `wstart_at` time NOT NULL,
  `wend_at` time NOT NULL,
  `special_days` varchar(500) NOT NULL,
  `sstart_at` time NOT NULL,
  `send_at` time NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL DEFAULT 'noimage',
  `image3` varchar(200) NOT NULL DEFAULT 'noimage',
  `image4` varchar(200) NOT NULL DEFAULT 'noimage',
  `image5` varchar(200) NOT NULL DEFAULT 'noimage',
  `no_rates` int(11) NOT NULL DEFAULT '0',
  `rate` tinyint(4) NOT NULL,
  `c1` tinyint(4) NOT NULL,
  `c2` tinyint(4) NOT NULL,
  `c3` tinyint(4) NOT NULL,
  `c4` tinyint(4) NOT NULL,
  `c5` tinyint(4) NOT NULL,
  `c6` tinyint(4) NOT NULL,
  `c7` tinyint(4) NOT NULL,
  `c8` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gym_rate`
--

CREATE TABLE `gym_rate` (
  `id` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `c1` tinyint(4) NOT NULL,
  `c2` tinyint(4) NOT NULL,
  `c3` tinyint(4) NOT NULL,
  `c4` tinyint(4) NOT NULL,
  `c5` tinyint(4) NOT NULL,
  `c6` tinyint(4) NOT NULL,
  `c7` tinyint(4) NOT NULL,
  `c8` tinyint(4) NOT NULL,
  `allrate` tinyint(4) NOT NULL,
  `description` varchar(500) NOT NULL,
  `no_like` int(11) NOT NULL DEFAULT '0',
  `no_dislike` int(11) NOT NULL DEFAULT '0',
  `isvalid` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reportreview`
--

CREATE TABLE `reportreview` (
  `id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `searchhistory`
--

CREATE TABLE `searchhistory` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `query` varchar(100) NOT NULL,
  `search_by` varchar(20) NOT NULL,
  `no_results` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `favouritegyms_vw`
--
DROP TABLE IF EXISTS `favouritegyms_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `favouritegyms_vw`  AS  select `favouritegyms`.`id` AS `fav_id`,`favouritegyms`.`gym_id` AS `gym_id`,`favouritegyms`.`customer` AS `customer_id`,`gyms`.`name` AS `gym_name`,`gyms`.`country` AS `country`,`gyms`.`city` AS `city`,`gyms`.`image` AS `image` from (`favouritegyms` join `gyms`) where (`favouritegyms`.`gym_id` = `gyms`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `feedback_vw`
--
DROP TABLE IF EXISTS `feedback_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `feedback_vw`  AS  select `gym_rate`.`customer` AS `customer`,`gym_rate`.`allrate` AS `allrate`,`gym_rate`.`description` AS `description`,`gym_rate`.`isvalid` AS `isvalid`,`gym_rate`.`id` AS `id`,`gyms`.`name` AS `name` from (`gym_rate` join `gyms`) where (`gym_rate`.`gym_id` = `gyms`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favouritegyms`
--
ALTER TABLE `favouritegyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_rate`
--
ALTER TABLE `gym_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportreview`
--
ALTER TABLE `reportreview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchhistory`
--
ALTER TABLE `searchhistory`
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
-- AUTO_INCREMENT for table `favouritegyms`
--
ALTER TABLE `favouritegyms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym_rate`
--
ALTER TABLE `gym_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportreview`
--
ALTER TABLE `reportreview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `searchhistory`
--
ALTER TABLE `searchhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
