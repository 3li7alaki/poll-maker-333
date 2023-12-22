-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 12:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(4, 'Option 1', 7),
(5, 'Option 2', 7),
(6, 'Option 3', 7),
(7, 'Option 1', 8),
(8, 'Option 12', 8),
(9, '333', 8),
(10, 'Option1', 9),
(11, 'option2', 9),
(12, 'Option3', 9),
(13, 'Bread', 10),
(14, 'Toast', 10),
(15, 'cristiano ronaldo', 11),
(16, 'leo messi', 11),
(17, 'neymar jr', 11),
(18, 'Action', 12),
(19, 'Comedy', 12),
(20, 'Drama', 12),
(21, 'Sci-Fi', 12),
(22, 'Horror', 12),
(23, 'Spring', 13),
(24, 'Summer', 13),
(25, 'Autumn/Fall', 13),
(26, 'Winter', 13),
(27, 'Black', 14),
(28, 'With cream', 14),
(29, 'With sugar', 14),
(30, 'Latte', 14),
(31, 'I don&#039;t drink coffee', 14),
(32, 'Facebook', 15),
(33, 'Instagram', 15),
(34, 'Twitter', 15),
(35, 'TikTok', 15),
(36, 'Chips', 16),
(37, 'Fruit', 16),
(38, 'Chocolate', 16),
(39, 'Nuts', 16),
(40, 'Popcorn', 16),
(41, 'Fiction', 17),
(42, 'Non-fiction', 17),
(43, 'Mystery/Thriller', 17),
(44, 'Fantasy', 17),
(45, 'Romance', 17),
(46, 'Italian', 18),
(47, 'Asian', 18),
(48, 'Mexican', 18),
(49, 'Mediterranean', 18),
(50, 'PC', 19),
(51, 'Xbox', 19),
(52, 'PlayStation', 19),
(53, 'Nintendo', 19),
(54, 'Mobile gaming', 19);

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
(7, 'What is your favorite bread????', '2024-01-06 12:00:00', 1, 'helloo', '2023-12-13 09:05:14', '2023-12-13 13:58:05'),
(8, 'Test Title', NULL, 1, 'test2', '2023-12-13 12:50:52', '2023-12-13 14:02:26'),
(9, 'Title 123', '2023-12-26 16:01:00', 1, 'Category123', '2023-12-13 13:02:02', '2023-12-13 13:02:02'),
(10, 'What is toast?', NULL, 1, 'Bread', '2023-12-13 14:03:44', '2023-12-13 14:03:44'),
(11, 'who&#039;s your favorite football player?', NULL, 1, 'sports', '2023-12-21 22:38:01', '2023-12-21 22:38:01'),
(12, 'Which genre of movies do you enjoy the most?', '2023-12-28 01:43:00', 2, 'entertainment', '2023-12-21 22:44:02', '2023-12-21 22:44:02'),
(13, 'What&#039;s your favorite season?', NULL, 2, 'personal', '2023-12-21 22:45:11', '2023-12-21 22:45:11'),
(14, 'How do you like your coffee?', NULL, 4, 'personal', '2023-12-21 22:57:47', '2023-12-21 22:57:47'),
(15, 'Which social media platform do you use the most?', '2023-12-30 01:58:00', 4, 'entertainment', '2023-12-21 22:58:32', '2023-12-21 22:58:32'),
(16, 'What&#039;s your go-to snack?', '2024-02-22 02:01:00', 5, 'food', '2023-12-21 23:02:07', '2023-12-21 23:02:07'),
(17, 'Which type of books do you enjoy reading?', NULL, 5, 'educational', '2023-12-21 23:04:27', '2023-12-21 23:04:27'),
(18, 'What&#039;s your favorite type of cuisine?', '2024-02-07 02:13:00', 6, 'food', '2023-12-21 23:13:21', '2023-12-21 23:13:21'),
(19, 'Which gaming platform do you prefer?', NULL, 7, 'entertainment', '2023-12-21 23:17:31', '2023-12-21 23:17:31');

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
(1, 'Ali AlHalaki', 'Ali@outlook.com', '$2y$10$iMerBNsOnlIQkeq9Nm14t.tE35KS4uC2kRgTuZy7YevSRPDlUaYRC', NULL, '2023-12-11 10:42:22', '2023-12-13 12:54:56'),
(2, 'Abdullah', 'Abdullah@email.com', '$2y$10$XMqYMw0yP02NTrZeNx0ufOmJAlfIxOO5saY300LoENnGPCmWiks0u', NULL, '2023-12-11 15:39:03', '2023-12-11 15:39:03'),
(3, 'Ayoub', 'Ayoub@weed.com', '$2y$10$wuZFXiFYmym5.zTchLbXZekZiVHPMZ0ai0VFc5o9ohF6z6PVHNAWu', NULL, '2023-12-11 16:21:08', '2023-12-11 16:21:08'),
(4, 'mohammed', 'mohammed@gmail.com', '$2y$10$.zE91ZNiWEKpMlvHqRa1PeNOZ5DRRQ7dE8DUXrNO1cpRbOikFVmE2', NULL, '2023-12-21 22:56:00', '2023-12-21 22:56:00'),
(5, 'hasan', 'hasan@yahoo.com', '$2y$10$0j9pv9xogT2TZth/xmPnyucnv5zbtWhgGEMgWRaxQcO81HY2lpokK', NULL, '2023-12-21 23:00:11', '2023-12-21 23:00:11'),
(6, 'yaseen', 'yaseen@stu.uob.edu.bh', '$2y$10$YWquA5qDJCfk5hlZCJip8e/g40fQ3N9hvrdF7reSvtwOI6xLtmoRm', NULL, '2023-12-21 23:11:47', '2023-12-21 23:14:35'),
(7, 'nasser', 'nasser@hotmail.com', '$2y$10$di6EMlzla2SBhM9FNvTJveiCfoChkrEzv/li0hrote485IuHYJnhS', NULL, '2023-12-21 23:16:05', '2023-12-21 23:16:05');

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
(1, 2, 7, 4, '2023-12-13 13:39:26'),
(2, 3, 7, 5, '2023-12-13 13:39:51'),
(3, 3, 7, 4, '2023-12-13 13:42:38');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
