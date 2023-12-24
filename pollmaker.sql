-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2023 at 09:25 AM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pollmaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_text`, `poll_id`) VALUES
(1, 'Yes, I have watched many', 1),
(2, 'Yes, only a few', 1),
(3, 'Yes, only one', 1),
(4, 'No I haven&#039;t', 1),
(9, 'Yes', 3),
(10, 'No', 3),
(11, 'Maybe', 3),
(12, 'I am not sure', 3),
(13, 'Yes', 4),
(14, 'No', 4),
(15, 'London', 5),
(16, 'Paris', 5),
(17, 'New York', 5),
(18, 'Leonel Messi', 6),
(19, 'Cristiano ronaldo', 6),
(20, 'Karim Benzema ', 6),
(21, 'Yes', 7),
(22, 'No', 7),
(23, 'Partially', 7),
(24, 'Not sure', 7),
(25, 'Qatar ', 8),
(26, 'Egypt ', 8),
(27, 'Italy', 8),
(28, 'Spain', 8),
(29, 'Yes', 9),
(30, 'No', 9),
(31, 'To some extent', 9),
(32, 'Not sure', 9),
(33, 'Cognitive Psychology', 10),
(34, 'Social Psychology', 10),
(35, 'Behavioral Psychology', 10),
(36, 'Clinical Psychology', 10),
(37, 'Yes', 11),
(38, 'No', 11),
(39, 'Never used the method', 11),
(40, 'League of Legends', 12),
(41, 'Dota 2', 12),
(42, 'Counter-Strike: Global Offensive', 12),
(43, 'Overwatch', 12),
(47, 'Micheal John', 14),
(48, 'Harold mark', 14);

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `end_date`, `user_id`, `category`, `time_created`, `time_updated`) VALUES
(1, 'Have you ever watched an Esports tournament or match?', NULL, 2, 'Esports', '2023-12-23 09:09:50', '2023-12-23 09:09:50'),
(3, 'Is sadness the same as depression?', '2023-12-31 14:29:00', 4, 'Human Science', '2023-12-23 11:31:31', '2023-12-23 11:31:31'),
(4, 'Is race a social construct?', '2024-01-23 20:27:00', 5, 'Human Science', '2023-12-23 17:28:34', '2023-12-23 17:28:34'),
(5, 'What is your favorite travel destination', '2023-12-29 20:34:00', 6, 'Travel', '2023-12-23 17:34:48', '2023-12-23 17:34:48'),
(6, 'Who is your favorite football player ', '2023-12-24 11:14:58', 8, 'Esports', '2023-12-23 17:37:03', '2023-12-24 08:14:58'),
(7, 'Do you think AI will take over the jobs of software engineers?', NULL, 7, 'Science and Technology', '2023-12-23 17:39:45', '2023-12-23 17:39:45'),
(8, 'Which country is best to travel to?', NULL, 9, 'Travel', '2023-12-23 18:11:32', '2023-12-23 18:11:32'),
(9, 'Should universities allow the use of AI academically?', NULL, 7, 'Science and Technology', '2023-12-23 18:21:42', '2023-12-23 18:21:42'),
(10, 'What aspect of psychology interests you the most?', NULL, 10, 'Human Science', '2023-12-23 18:25:17', '2023-12-23 18:25:17'),
(11, 'Is the Pomodoro method an effective way to study?', '2023-12-28 21:32:00', 13, 'Human Science', '2023-12-23 18:32:51', '2023-12-23 18:32:51'),
(12, 'Which esports game is your favorite?', NULL, 12, 'Esports', '2023-12-23 18:33:51', '2023-12-23 18:33:51'),
(14, 'Who is your favorite Basket player ', NULL, 8, 'Esports', '2023-12-24 08:19:14', '2023-12-24 08:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `time_created`, `time_updated`) VALUES
(1, 'Admin', 'Admin@Poll.com', '$2y$10$cKHMhYhYRn1vh0m/ISk.P.wz5JMtfVq54OJSx.Dv2ppK.YoEqfDX6', 1, '2023-12-22 19:15:04', '2023-12-23 08:47:23'),
(2, 'Abdulrahman Mahaini', 'abdulrahmanmahainy@gmail.com', '$2y$10$kgyMlPhgY998znPsdhzYT.8uln20FRVDjta3fIImSpZgm5atp9GQ2', NULL, '2023-12-23 09:07:41', '2023-12-23 09:07:41'),
(3, 'John Micheal', 'bombaclat123@gmail.com', '$2y$10$yLNWkeE0S7zCB2Mr.JwcNeqk5alKIPuvUkshcaLRJOinedoVWP43.', NULL, '2023-12-23 11:27:40', '2023-12-23 11:33:25'),
(4, 'AR', 'lol@gmail.com', '$2y$10$B0IpMSlatVL6tXDrcR.wPuO4LofWZhCzQtCkFDFhvi2Uf3EYE7McW', NULL, '2023-12-23 11:28:24', '2023-12-23 11:28:24'),
(5, 'Seld Aniga', 'maher3f@hotmail.com', '$2y$10$yr9lsuA1V66GF/ZArSdTg.aARRIx0mFCjSVwhdLaZMnFvOyCq.dpa', NULL, '2023-12-23 12:00:14', '2023-12-23 12:00:14'),
(6, 'Ali sami', 'Ali@poll.com', '$2y$10$xqrPmaI.zjQSIoq.Te5lbeBBG2QqNoA1qLi/qwhc8snXOhDyx3J7e', NULL, '2023-12-23 17:30:58', '2023-12-23 17:30:58'),
(7, 'Ayoub Fouad', 'Ayoub@Poll.com', '$2y$10$udm3D/jh2Z555VGWQeFKe..MbaJeVhyuDJYqdE9nINiIP4wdtIEBi', NULL, '2023-12-23 17:33:23', '2023-12-23 17:33:23'),
(8, 'Hussain sami', 'Hussain@poll.com', '$2y$10$FDS4I4HR/ybPl/lxLOj85OuGDNVpn/dQdH0BuVEFrkANgKpzj3YlO', NULL, '2023-12-23 17:35:28', '2023-12-23 17:35:28'),
(9, 'Abdulla Ali', 'Abdulla@poll.com', '$2y$10$p/8zqrpmR3sekv1u2f3kWuEGTeAPyut0KGceYt9.ATGHk.NpgKvfu', NULL, '2023-12-23 18:08:29', '2023-12-23 18:08:29'),
(10, 'James Barnes', 'James@poll.com', '$2y$10$oRI7U71aqkZOaiOAn559s..lwqjTgvmahrbNt/XP3y9JuZzOvlFNm', NULL, '2023-12-23 18:20:45', '2023-12-23 18:20:45'),
(11, 'Nasser', 'Nasser@Poll.com', '$2y$10$k88D5Iz5YKHaeg29J5ZTKuXFGBcac6Bkwfh6rAakMnODFE3NK26L6', NULL, '2023-12-23 18:25:47', '2023-12-23 18:25:47'),
(12, 'Micheal Jackson', 'Micheal@poll.com', '$2y$10$cOW6LvdS706M4SrDSHG8He9o3zHg04HeUZqZamr9rblmbIlKfjrNe', NULL, '2023-12-23 18:29:25', '2023-12-23 18:29:25'),
(13, 'Yassen', 'Yassen@Poll.com', '$2y$10$jr540X.raxXG8RkVc1lnHeMiwYn4mMcH.Et5OKbLGd1Llz4zQHR1y', NULL, '2023-12-23 18:31:21', '2023-12-23 18:31:21'),
(14, 'Jaffar Ali', 'fchgvjbkh@gmail.com', '$2y$10$zpeYhX9SO0yRgfPJ7hLNf.3jwOdIfaGvF0qKIme6p03zeS6mFtOxK', NULL, '2023-12-23 18:35:41', '2023-12-23 18:35:41'),
(15, 'Peter Griffin ', 'Peter@poll.com', '$2y$10$b4o/MCwSnYw5UX2cD2FbcO4OK1M/c0Z95ctZTP7JVHYY2Ueim/q3K', NULL, '2023-12-23 18:38:34', '2023-12-23 18:38:34'),
(16, 'Emily Johnson', 'Emily@poll.com', '$2y$10$.NCGoW62a1PDIwHKb47O2uiLrelcxcrESdI.aDM6Nb.BrWC/eSqJy', NULL, '2023-12-23 18:43:52', '2023-12-23 18:43:52'),
(17, 'Jasmine Clark', 'Jasmine@poll.com', '$2y$10$XgGrZWHgKHKOss/CHg305O0MSLkDDvkVHq4YPXiFe9/HxjyCKYjSa', NULL, '2023-12-23 18:47:52', '2023-12-23 18:47:52'),
(18, 'Ethan Williams', 'Ethan@poll.com', '$2y$10$XYKGAI/zbUKkySdN0Agceu3655AXGw1enNaE1RSVjcxBEqcCWpN9O', NULL, '2023-12-23 18:50:58', '2023-12-23 18:50:58'),
(19, 'Chloe Anderson', 'Chloe@poll.com', '$2y$10$5VM1vhNal6C8GUGq/mHBqO9vLRGE6ZPPLXWhk0dE0YAzO.DEJqArW', NULL, '2023-12-23 18:53:48', '2023-12-23 18:53:48'),
(20, 'Rashid Khalaf', 'Rashid@poll.com', '$2y$10$4Dh9K4qK0FJb52QqlcoMAe07mc9bAn03cwpahlZgbTxWPe6eGajiW', NULL, '2023-12-23 19:50:03', '2023-12-23 19:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `vote_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `poll_id`, `option_id`, `vote_date`) VALUES
(1, 1, 1, 2, '2023-12-23 09:10:19'),
(2, 4, 1, 3, '2023-12-23 11:31:53'),
(3, 5, 1, 2, '2023-12-23 12:00:55'),
(4, 5, 3, 10, '2023-12-23 12:01:52'),
(5, 1, 4, 13, '2023-12-23 17:29:03'),
(6, 6, 1, 4, '2023-12-23 17:31:14'),
(7, 6, 3, 10, '2023-12-23 17:31:28'),
(8, 6, 4, 13, '2023-12-23 17:31:35'),
(9, 8, 4, 14, '2023-12-23 17:35:35'),
(10, 8, 1, 3, '2023-12-23 17:35:42'),
(11, 7, 3, 12, '2023-12-23 17:35:48'),
(12, 8, 5, 17, '2023-12-23 17:37:11'),
(13, 5, 4, 14, '2023-12-23 17:37:26'),
(14, 1, 6, 19, '2023-12-23 17:46:06'),
(15, 1, 7, 23, '2023-12-23 17:46:28'),
(16, 9, 1, 2, '2023-12-23 18:14:12'),
(17, 9, 3, 11, '2023-12-23 18:14:45'),
(18, 9, 4, 13, '2023-12-23 18:14:59'),
(19, 9, 5, 17, '2023-12-23 18:15:17'),
(20, 9, 6, 20, '2023-12-23 18:15:28'),
(21, 9, 7, 22, '2023-12-23 18:15:41'),
(22, 9, 8, 25, '2023-12-23 18:15:57'),
(23, 10, 1, 1, '2023-12-23 18:20:52'),
(24, 10, 3, 9, '2023-12-23 18:21:02'),
(25, 10, 4, 13, '2023-12-23 18:21:11'),
(26, 10, 5, 15, '2023-12-23 18:21:17'),
(27, 10, 6, 18, '2023-12-23 18:21:31'),
(28, 10, 7, 21, '2023-12-23 18:21:39'),
(29, 10, 8, 28, '2023-12-23 18:21:46'),
(30, 7, 8, 26, '2023-12-23 18:22:51'),
(31, 10, 10, 34, '2023-12-23 18:25:24'),
(32, 10, 9, 31, '2023-12-23 18:25:46'),
(33, 11, 3, 11, '2023-12-23 18:25:55'),
(34, 11, 5, 17, '2023-12-23 18:26:05'),
(35, 9, 9, 29, '2023-12-23 18:26:34'),
(36, 11, 10, 33, '2023-12-23 18:26:36'),
(37, 9, 10, 34, '2023-12-23 18:26:52'),
(38, 11, 8, 25, '2023-12-23 18:26:55'),
(39, 11, 9, 31, '2023-12-23 18:28:41'),
(40, 12, 1, 2, '2023-12-23 18:30:45'),
(41, 12, 3, 10, '2023-12-23 18:30:54'),
(42, 12, 4, 13, '2023-12-23 18:31:01'),
(43, 12, 5, 16, '2023-12-23 18:31:13'),
(44, 12, 6, 19, '2023-12-23 18:31:21'),
(45, 12, 7, 22, '2023-12-23 18:31:30'),
(46, 12, 8, 25, '2023-12-23 18:31:38'),
(47, 12, 9, 32, '2023-12-23 18:31:50'),
(48, 12, 10, 35, '2023-12-23 18:31:58'),
(49, 13, 9, 31, '2023-12-23 18:33:03'),
(50, 13, 6, 18, '2023-12-23 18:33:12'),
(51, 13, 10, 34, '2023-12-23 18:33:26'),
(52, 12, 11, 37, '2023-12-23 18:34:00'),
(53, 12, 12, 42, '2023-12-23 18:34:12'),
(54, 9, 12, 43, '2023-12-23 18:34:39'),
(55, 9, 11, 37, '2023-12-23 18:34:46'),
(56, 10, 12, 42, '2023-12-23 18:35:14'),
(57, 10, 11, 37, '2023-12-23 18:35:21'),
(58, 14, 1, 2, '2023-12-23 18:36:38'),
(59, 14, 3, 10, '2023-12-23 18:36:59'),
(60, 14, 4, 13, '2023-12-23 18:37:15'),
(61, 14, 5, 15, '2023-12-23 18:37:35'),
(62, 14, 6, 19, '2023-12-23 18:37:49'),
(63, 14, 7, 23, '2023-12-23 18:38:00'),
(64, 14, 8, 27, '2023-12-23 18:38:12'),
(65, 14, 9, 31, '2023-12-23 18:38:23'),
(66, 14, 10, 36, '2023-12-23 18:38:38'),
(67, 15, 1, 1, '2023-12-23 18:38:43'),
(68, 14, 11, 39, '2023-12-23 18:38:49'),
(69, 14, 12, 41, '2023-12-23 18:39:03'),
(70, 15, 3, 11, '2023-12-23 18:41:03'),
(71, 15, 4, 14, '2023-12-23 18:41:09'),
(72, 15, 5, 15, '2023-12-23 18:41:14'),
(73, 15, 6, 19, '2023-12-23 18:41:19'),
(74, 15, 7, 23, '2023-12-23 18:41:29'),
(75, 15, 8, 25, '2023-12-23 18:41:36'),
(76, 15, 9, 30, '2023-12-23 18:41:56'),
(77, 15, 10, 34, '2023-12-23 18:42:03'),
(78, 15, 11, 37, '2023-12-23 18:42:12'),
(79, 15, 12, 42, '2023-12-23 18:42:24'),
(80, 16, 1, 2, '2023-12-23 18:44:51'),
(81, 16, 3, 12, '2023-12-23 18:44:55'),
(82, 16, 4, 13, '2023-12-23 18:45:00'),
(83, 16, 5, 15, '2023-12-23 18:45:06'),
(84, 16, 6, 19, '2023-12-23 18:45:12'),
(85, 16, 7, 24, '2023-12-23 18:45:20'),
(86, 16, 8, 28, '2023-12-23 18:45:30'),
(87, 16, 9, 29, '2023-12-23 18:45:44'),
(88, 16, 10, 35, '2023-12-23 18:45:55'),
(89, 16, 11, 39, '2023-12-23 18:46:07'),
(90, 16, 12, 40, '2023-12-23 18:46:15'),
(91, 17, 1, 2, '2023-12-23 18:47:57'),
(92, 17, 3, 10, '2023-12-23 18:48:08'),
(93, 17, 4, 13, '2023-12-23 18:48:15'),
(94, 17, 5, 17, '2023-12-23 18:48:24'),
(95, 17, 6, 20, '2023-12-23 18:48:32'),
(96, 17, 7, 23, '2023-12-23 18:48:41'),
(97, 17, 8, 27, '2023-12-23 18:48:51'),
(98, 17, 9, 31, '2023-12-23 18:49:09'),
(99, 17, 10, 34, '2023-12-23 18:49:20'),
(100, 17, 11, 37, '2023-12-23 18:49:27'),
(101, 17, 12, 43, '2023-12-23 18:49:36'),
(102, 18, 1, 4, '2023-12-23 18:51:11'),
(103, 18, 3, 10, '2023-12-23 18:51:17'),
(104, 18, 4, 14, '2023-12-23 18:51:24'),
(105, 18, 5, 16, '2023-12-23 18:51:30'),
(106, 18, 6, 19, '2023-12-23 18:51:35'),
(107, 18, 7, 22, '2023-12-23 18:51:46'),
(108, 18, 8, 25, '2023-12-23 18:51:55'),
(109, 18, 9, 30, '2023-12-23 18:52:05'),
(110, 18, 10, 33, '2023-12-23 18:52:15'),
(111, 18, 11, 38, '2023-12-23 18:52:22'),
(112, 18, 12, 42, '2023-12-23 18:52:29'),
(113, 19, 1, 4, '2023-12-23 18:53:58'),
(114, 19, 3, 11, '2023-12-23 18:54:07'),
(115, 19, 4, 13, '2023-12-23 18:54:14'),
(116, 19, 5, 15, '2023-12-23 18:54:20'),
(117, 19, 6, 18, '2023-12-23 18:54:28'),
(118, 19, 7, 22, '2023-12-23 18:54:42'),
(119, 19, 8, 25, '2023-12-23 18:54:49'),
(120, 19, 9, 31, '2023-12-23 18:54:58'),
(121, 19, 10, 34, '2023-12-23 18:55:08'),
(122, 19, 11, 37, '2023-12-23 18:55:18'),
(123, 19, 12, 40, '2023-12-23 18:55:29'),
(124, 20, 1, 1, '2023-12-23 19:51:52'),
(125, 20, 3, 10, '2023-12-23 19:52:32'),
(126, 20, 6, 19, '2023-12-23 19:52:50'),
(127, 20, 12, 40, '2023-12-23 19:53:07'),
(128, 6, 5, 16, '2023-12-24 08:15:46'),
(129, 6, 12, 43, '2023-12-24 08:16:00'),
(131, 8, 14, 47, '2023-12-24 08:19:52'),
(133, 1, 14, 48, '2023-12-24 09:20:33'),
(134, 1, 8, 28, '2023-12-24 09:20:46'),
(135, 1, 12, 43, '2023-12-24 09:21:36'),
(136, 1, 9, 31, '2023-12-24 09:22:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_id` (`poll_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `poll_id` (`poll_id`),
  ADD KEY `option_id` (`option_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
