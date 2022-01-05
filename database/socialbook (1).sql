-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 02:57 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `postid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(500) NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `userid`, `content`, `images`, `has_image`, `comments`, `likes`, `date`) VALUES
(6, 7426328485956024472, 8853, '', '', 0, 0, 0, '2021-12-04 09:25:25'),
(7, 59464420, 8853, '', '', 0, 0, 0, '2021-12-04 09:25:44'),
(8, 7438329621, 8853, '', '', 0, 0, 0, '2021-12-04 09:26:24'),
(9, 2818659524, 8853, 'df', '', 0, 0, 0, '2021-12-04 09:27:33'),
(15, 49559966, 259, 'this test is to see if it would go into the database', '', 0, 0, 0, '2021-12-04 14:13:58'),
(16, 1968, 259, 'testing in index page', '', 0, 0, 0, '2021-12-04 14:18:06'),
(17, 248248175520359, 259, 'testing', '', 0, 0, 0, '2021-12-04 14:28:36'),
(18, 39618544632584155, 259, 'if refresh, pop up messages', '', 0, 0, 0, '2021-12-04 14:31:43'),
(19, 28165908, 259, 'if refresh, pop up messages', '', 0, 0, 0, '2021-12-04 14:31:53'),
(20, 457698293898, 259, 'would not pop up', '', 0, 0, 0, '2021-12-04 14:37:22'),
(21, 5900341360915, 8853, 'con meo', '', 0, 0, 0, '2021-12-04 15:27:42'),
(22, 638650255594971, 8853, 'at 10:37', '', 0, 0, 0, '2021-12-04 15:37:21'),
(23, 794377, 259, 'yes', '', 0, 0, 0, '2021-12-05 05:46:39'),
(24, 4375885822, 259, 'tea', '', 0, 0, 0, '2021-12-05 05:47:05'),
(25, 4849287816901384779, 173833, 'Okay', '', 0, 0, 0, '2021-12-06 05:12:16'),
(26, 371299595803, 173833, 'fjads', '', 0, 0, 0, '2021-12-08 05:35:11'),
(27, 4712904658609, 259, 'I like your dress', '', 0, 0, 0, '2021-12-10 17:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `url_address` varchar(200) NOT NULL,
  `feeldown` tinyint(4) DEFAULT NULL,
  `lackinterest` tinyint(4) DEFAULT NULL,
  `focus` tinyint(4) DEFAULT NULL,
  `energy` tinyint(4) DEFAULT NULL,
  `profile_image` varchar(500) NOT NULL,
  `cover_image` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `firstname`, `lastname`, `email`, `password`, `gender`, `url_address`, `feeldown`, `lackinterest`, `focus`, `energy`, `profile_image`, `cover_image`, `date`) VALUES
(18, 8853, 'Chau', 'Loan', 'notrealchauloan@gmail.com', 'conmeo', 'O', 'chau.loan.8853', NULL, NULL, NULL, NULL, 'uploads/8853/5bRe1Uoiacm8QsKNZ7fu', 'uploads/8853/ASTtcNObW0ixFQcxJim', '2021-12-11 05:45:10'),
(19, 35044183, 'Chau', 'Loan', 'notrealchauloan@gmail.com', '231fsd332', 'O', 'chau.loan.35044183', NULL, NULL, NULL, NULL, '', '', '2021-11-21 11:12:16'),
(20, 2147483647, 'Loan', 'Lich', 'conmeo@concho.com', 'conmeo', 'M', 'loan.lich.383100746697051680', NULL, NULL, NULL, NULL, '', '', '2021-11-21 17:20:07'),
(21, 2147483647, 'Loanfd', 'Akldsf', 'notrealchauloan@gmail.com', 'adfsda', 'F', 'loanfd.akldsf.529817194268090', NULL, NULL, NULL, NULL, '', '', '2021-11-22 05:47:00'),
(22, 342956669, 'Af', 'Sdfa', 'notrealchauloan@gmail.com', 'df', '', 'af.sdfa.342956669', NULL, NULL, NULL, NULL, '', '', '2021-11-26 15:32:20'),
(23, 259, 'Loan', 'Lich', 'notrealchauloan@gmail.com', 'meomeo02', 'M', 'loan.lich.0259', 0, 0, 0, 0, 'uploads/259/NKvjQbl0IkbNUTaQbyco.jpg', 'uploads/259/i8cciqR1OhVhZeXVrI.jpg', '2021-12-12 08:28:52'),
(24, 2147483647, 'Sg', 'Sf', 'notrealchauloan@gmail.com', 'sfdsg', '', 'sg.sf.245423617905', 0, 0, 0, 0, '', '', '2021-11-26 15:54:37'),
(25, 2147483647, 'Adf', 'Adf', '4135@erkl.com', '432', 'M', 'adf.adf.1261151168812813741', 0, 0, 0, 0, '', '', '2021-11-26 16:00:16'),
(26, 2147483647, 'Meo', 'Felix', 'conmeo@ratxinh.com', 'conmeo', '', 'meo.felix.576368486671713', 1, 3, 1, 2, '', '', '2021-11-26 16:00:53'),
(27, 2147483647, 'Test', 'Test', 'testing@test.com', '', 'O', 'test.test.08849361867916', 0, 0, 0, 0, '', '', '2021-11-26 16:14:25'),
(28, 1504084251, 'Testing', 'Testing', 'testing@test.com', '', 'O', 'testing.testing.1504084251', 0, 0, 0, 0, '', '', '2021-11-26 16:16:13'),
(29, 2147483647, 'Testing', 'Testing', 'testing@test.com', '', 'O', 'testing.testing.5009933739832', 0, 0, 0, 0, '', '', '2021-11-26 16:17:10'),
(30, 2147483647, 'Loan', 'E', 'testing@test.com', '', 'O', 'loan.e.3561934707944970', 0, 0, 0, 0, '', '', '2021-11-26 16:17:52'),
(31, 83009, 'Dgs', 'Sgdf', 'ieltscuameo@gmail.com', 'sgd', 'M', 'dgs.sgdf.83009', 0, 0, 2, 0, '', '', '2021-12-04 07:37:04'),
(32, 2147483647, 'Dsf', 'àd', 'ieltscuameo@gmail.com', '123', 'F', 'dsf.àd.459796557064790521', 0, 0, 0, 0, '', '', '2021-12-04 07:41:21'),
(33, 535528004684, 'Loan', 'Test', 'testing@loan.com', 'loanloan', 'M', 'loan.test.535528004684', 0, 1, 2, 3, '', '', '2021-12-04 07:51:36'),
(34, 3557109602971518, 'Databasetest', 'Testdb', 'test@db.com', 'db', 'M', 'databasetest.testdb.3557109602971518', 0, 0, 2, 2, '', '', '2021-12-04 07:53:06'),
(35, 6516697033295, 'Thiswouldbeuppercase', 'Firstletter', 'test1@test.com', 'test', 'O', 'thiswouldbeuppercase.firstletter.6516697033295', 2, 2, 3, 3, '', '', '2021-12-04 16:34:06'),
(36, 173833, 'Test', 'Ngay', 'test0612@test.com', 'test0612', 'M', 'test.ngay.173833', 0, 0, 1, 0, '', '', '2021-12-06 05:01:44'),
(37, 1701165, 'Lk', 'Lk', 'test@conmeo.com', 'conmeo', 'O', 'lk.lk.1701165', 0, 0, 0, 0, '', '', '2021-12-06 05:37:19'),
(38, 7483418973090856, 'Dsfg', 'Adg', 'conmeo@conmeo.om', 'conmeo', 'O', 'dsfg.adg.7483418973090856', 2, 1, 2, 1, 'uploads//5', 'uploads//r', '2021-12-11 05:30:57'),
(39, 229022192, 'Loan', 'Châu', 'testtencodau@gmail.com', 'testtencodau', 'M', 'loan.châu.229022192', 3, 1, 1, 0, '', '', '2021-12-11 03:48:35');

--
-- Table structure for table `chatbot`
--
CREATE TABLE `chatbot` (
    `id` bigint(20) NOT NULL,
    `queries` varchar(300),
    `replies` varchar(300),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, "hi|hello|hey|wassup|what's up", 'Hello there!'),
(2, "how are you|how old are you|what's your name", "I am just a bot... I don't have an answer for that"),
(3, "I am stressed|I am tired", "Tell me everything, I'm here for you~"),
(4, "tell me a joke", "You are a joke."),
(5, "can you help me arrange|meeting|psychiatrist", "Please click the 'Professional Helps' tab to schedule a meeting!"),
(6, "i need help", "You should talk to a psychiatrist for help."),
(7, "you are fun|funny", "I am programmed to be funny."),
(8, "can you tell me the time", "Look at the bottom right corner on your computer screen!"),
(9, "you are dumb|stupid", "Why are you so mean?"),
(10, "what is socialbook|social book|", "socialBook is a wonderful place where you are free to express your feelings, 
and you can contact a professional to help with your emotions anytime!");

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`),
  ADD KEY `comments` (`comments`),
  ADD KEY `has_index` (`has_image`);
ALTER TABLE `posts` ADD FULLTEXT KEY `content` (`content`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `reservations` (
  `res_id` int(11) NOT NULL,
  `res_date` date,
  `res_slot` varchar(32) DEFAULT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL,
  `res_tel` varchar(60) NOT NULL,
  `res_notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `res_date` (`res_date`),
  ADD KEY `res_slot` (`res_slot`),
  ADD KEY `res_name` (`res_name`),
  ADD KEY `res_email` (`res_email`),
  ADD KEY `res_tel` (`res_tel`);

ALTER TABLE `reservations`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;