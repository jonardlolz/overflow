-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 11:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baringcodeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `notebook`
--

CREATE TABLE `notebook` (
  `notebookid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `is_delete` int(11) DEFAULT 0,
  `usersid` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notebook`
--

INSERT INTO `notebook` (`notebookid`, `title`, `is_delete`, `usersid`, `date_added`, `date_updated`) VALUES
(58, 'test', 0, 18, '2022-09-12 15:52:24', '2022-09-12 15:52:24'),
(59, 'xxx', 0, 18, '2022-09-12 16:07:18', '2022-09-12 16:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notesid` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `is_delete` int(11) DEFAULT 0,
  `notebookid` int(11) NOT NULL,
  `usersid` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notesid`, `content`, `is_delete`, `notebookid`, `usersid`, `date_added`, `date_updated`) VALUES
(3, 'notes1', 1, 59, 18, '2022-09-12', '2022-09-12'),
(4, 'Notes2', 1, 59, 18, '2022-09-12', '2022-09-12'),
(5, 'Notes3', 1, 59, 18, '2022-09-12', '2022-09-12'),
(6, 'asdasd', 1, 59, 18, '2022-09-12', '2022-09-12'),
(7, 'f', 1, 59, 18, '2022-09-12', '2022-09-12'),
(8, 'ff', 1, 59, 18, '2022-09-12', '2022-09-12'),
(9, 'ttttt', 1, 59, 18, '2022-09-12', '2022-09-12'),
(10, 'ttt', 1, 59, 18, '2022-09-12', '2022-09-12'),
(11, 'tts', 1, 59, 18, '2022-09-12', '2022-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `todoid` int(11) NOT NULL,
  `todotask` varchar(50) DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'To Do',
  `is_delete` int(11) DEFAULT 0,
  `usersid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`todoid`, `todotask`, `duedate`, `startdate`, `status`, `is_delete`, `usersid`) VALUES
(55, 'zxzxc', '2022-08-23', '2022-08-22', 'In-progress', 0, 18),
(58, 'asfafasf', '2022-08-22', '2022-08-22', 'Done', 0, 21),
(60, '5454545', '2022-08-24', '2022-08-22', 'To Do', 0, 18),
(61, 'test', '2022-08-23', '2022-08-22', 'To Do', 1, 18),
(63, 'gvfgf', '2022-08-23', '2022-08-22', 'To Do', 1, 18),
(64, 'hgdfhgdhfgs', '2022-08-23', '2022-08-22', 'Done', 1, 18),
(65, 'sdfasdasd', '2022-09-07', '2022-08-22', 'To Do', 0, 18),
(66, 'qwrqwr', '2022-08-23', '2022-08-23', 'To Do', 0, 18),
(69, 'Test222', '2022-09-06', '2022-08-22', 'To Do', 0, 18),
(70, 'asdasdasd', '2022-08-23', '2022-08-23', 'To Do', 0, 18),
(71, 'asdasd', '2022-08-23', '2022-08-23', 'To Do', 1, 18),
(72, 'asdasds', '2022-08-23', '2022-08-23', 'To Do', 0, 18),
(73, 'qwrqrqwr', '2022-08-24', '2022-08-24', 'To Do', 0, 18),
(74, 'test', '2022-08-23', '2022-08-24', 'To Do', 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersid` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersid`, `email`, `password`, `firstname`, `lastname`) VALUES
(18, 'qweqwe@gmail.com', '$2y$10$.biu/OyVBdVMkjkmkxQMQOxApUXS.ZWMl6ZZRbsN9IhWZh2mpSZO2', 'qweqwe', 'qweqweq'),
(19, 'test@gmail.com', '$2y$10$0g3TXf0WtdnXT1dTa2O4GevaP1ZIXu1CS7W4V1wWfGDfT5d2z6YFu', 'test', 'test'),
(20, 'qwdqw@gmail.com', '$2y$10$04UlEhKoHS1QFyY588rJBueFfSC57wNGFVnHQkQynKQ/iFR4JJeBq', 'qweqwe', 'qweqasd'),
(21, 'craigejonard@gmail.com', '$2y$10$mW17lsEZe10Nbnqq9915XeHR/4umi/jQ5B/YOCDk.4d7HXtmnC5gm', 'Craige Jonard', 'Baring');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notebook`
--
ALTER TABLE `notebook`
  ADD PRIMARY KEY (`notebookid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notesid`),
  ADD KEY `notes_ibfk_1` (`notebookid`),
  ADD KEY `notes_ibfk_2` (`usersid`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`todoid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notebook`
--
ALTER TABLE `notebook`
  MODIFY `notebookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `todoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notebook`
--
ALTER TABLE `notebook`
  ADD CONSTRAINT `notebook_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`usersid`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`notebookid`) REFERENCES `notebook` (`notebookid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`usersid`) REFERENCES `users` (`usersid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`usersid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
