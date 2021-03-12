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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created_time`) VALUES
(1, 'Sultan Babur', 'Babur, born Zahīr ud-Dīn Muhammad, was the founder of the Mughal Empire and first Emperor of the Mughal dynasty in the Indian subcontinent. He was a descendant of Timur and Genghis Khan through his father and mother respectively', '2020-11-30 22:21:13'),
(2, 'Ertuğrul Gazi ', 'Ertuğrul or Ertuğrul Gazi was the father of Osman I. Little is known about Ertuğrul\'s life. According to Ottoman tradition, he was the son of Suleyman Shah, the leader of the Kayı tribe of Oghuz Turks.', '2020-11-30 22:22:23'),
(3, 'Adolf Hitler', 'Adolf Hitler was a German politician and leader of the Nazi Party. He rose to power as the chancellor of Germany in 1933 and then as Führer in 1934. During his dictatorship from 1933 to 1945, he initiated World War II in Europe by invading Poland on 1 Sep', '2020-11-30 22:34:14'),
(4, 'Tipu Sultan', 'Tipu Sultan (born Sultan Fateh Ali Sahab Tipu, 20 November 1750 – 4 May 1799), also known as Tipu Sahab or the Tiger of Mysore, was the ruler of the Kingdom of Mysore based in South India and a pioneer of rocket artillery.', '2020-12-03 17:01:36'),
(5, 'Osman I', 'Osman I or Osman Ghazi (Ottoman Turkish: عثمان غازى‎, romanized: ʿOsmān Ġāzī; Turkish: Birinci Osman or Osman Gazi; died 1323/4), sometimes transliterated archaically as Othman, was the leader of the Ottoman Turks and the founder of the Ottoman dynasty.', '2020-12-03 17:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_by` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES
(15, 'hello 👋 ', 21, '2020-12-07 21:32:17', '5'),
(16, 'hello everyone 🧨🧨🧨🎊', 21, '2020-12-07 21:32:50', '5'),
(17, 'hyy my name is umran', 21, '2020-12-07 21:43:33', '6'),
(18, 'hello 👋 ', 21, '2020-12-07 21:43:54', '6'),
(19, 'hello 2', 26, '2020-12-07 22:05:36', '6'),
(20, '&ltscript&gtalert(\"hello\")&lt/script&gt', 21, '2020-12-07 22:27:45', '6'),
(21, '&ltscript&gtalert(\"hello\")&lt/script&gt', 29, '2020-12-07 22:34:36', '6'),
(22, 'hello\r\n', 21, '2020-12-09 09:38:03', '5');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `signup_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `email`, `user_pass`, `signup_time`) VALUES
(5, 'arshad khan', 'webkhansite23@gmail.com', '$2y$10$F7lpsUtjwS5eB7xQHOQi4ON79EupBlDUVmno//1zOD2TBLzcnRDTq', '2020-12-07 21:29:44'),
(6, 'umran rajput', 'umran203@gmail.com', '$2y$10$fbOE4JJlkUNLriJ6echhceZXsJ.pmvdJucMajMjpEJL0/k48LT.gW', '2020-12-07 21:33:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
