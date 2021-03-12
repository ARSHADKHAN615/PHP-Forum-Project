-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 07:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(10) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` varchar(2000) NOT NULL,
  `thread_cat_id` int(10) NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `thread_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_time`) VALUES
(21, 'who is Ertuğrul Gazi', 'tech about ertuğrul \r\n', 2, 5, '2020-12-07 21:30:59'),
(22, 'who son of Suleyman Shah ?', 'is  leader of the Kayı tribe ?', 2, 5, '2020-12-07 21:32:01'),
(26, 'he was the son of Suleyman Shah', 'It uses utility classes for typography and spacing to space content out within the larger container.', 2, 6, '2020-12-07 21:45:04'),
(29, '&ltscript&gtalert(\"hello\")&lt/script&gt', '&ltscript&gtalert(\"hello\")&lt/script&gt', 2, 6, '2020-12-07 22:34:21'),
(30, 'It uses utility ', 'classes for typography and spacing to space content out within the larger container.', 2, 5, '2020-12-09 09:39:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
