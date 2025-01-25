-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2025 at 06:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `max_capacity` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `date`, `max_capacity`, `image`, `created_by`, `created_at`) VALUES
(1, 'On Campus ML Session', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchange', '2025-01-16', 150, 'Screenshot (77).png', 1, '2025-01-24 13:03:26'),
(2, 'test 2', '<?php\r\ninclude \'../includes/db.php\';\r\nsession_start();\r\n?>\r\n', '2024-12-31', 50, '473725567_549055394777814_3665005504729583472_n.jpg', 1, '2025-01-24 13:05:10'),
(3, 'On Campus ML Session', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchange', '2025-01-16', 150, 'Screenshot (77).png', 1, '2025-01-24 13:05:51'),
(4, 'Concert By Atif Aslam', 'Concerts in Dhaka 2025\r\nLine ups, schedules, tickets and concert events in Dhaka\r\nMusic to ears is like a soul to life. Escape the monotonous life and find pieces of you by attending live music events, festivals and concerts in Dhaka. From classical music to jazz to pop to heavy metal to EDM to rock concerts in Dhaka, it is a much complex classification lineup, yet a religion that unites all. Love to groove on the thrilling number of your favorite artists?\r\n\r\nEmbark on a musical journey with your dear ones. Explore music events in Dhaka.', '2025-01-31', NULL, NULL, NULL, '2025-01-24 15:58:34'),
(5, 'test event', 'Concerts in Dhaka 2025\r\nLine ups, schedules, tickets and concert events in Dhaka\r\nMusic to ears is like a soul to life. Escape the monotonous life and find pieces of you by attending live music events, festivals and concerts in Dhaka. From classical music to jazz to pop to heavy metal to EDM to rock concerts in Dhaka, it is a much complex classification lineup, yet a religion that unites all. Love to groove on the thrilling number of your favorite artists?\r\n\r\nEmbark on a musical journey with your dear ones. Explore music events in Dhaka.', '2025-01-06', NULL, NULL, NULL, '2025-01-24 16:17:16'),
(6, 'Concert By Atif Aslam', 'Concerts in Dhaka 2025\r\nLine ups, schedules, tickets and concert events in Dhaka\r\nMusic to ears is like a soul to life. Escape the monotonous life and find pieces of you by attending live music events, festivals and concerts in Dhaka. From classical music to jazz to pop to heavy metal to EDM to rock concerts in Dhaka, it is a much complex classification lineup, yet a religion that unites all. Love to groove on the thrilling number of your favorite artists?\r\n\r\nEmbark on a musical j', '2025-01-30', NULL, 'download (11).jpeg', NULL, '2025-01-24 18:21:23'),
(7, 'test3', 'hhhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjkkkkkkkkkkkkkkkkkkkk', '2025-01-17', NULL, 'ezgif-3-1fc38e287f.jpg', NULL, '2025-01-24 20:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_registrations`
--

INSERT INTO `event_registrations` (`id`, `user_id`, `event_id`, `registration_date`) VALUES
(1, 3, 2, '2025-01-25 04:22:02'),
(2, 3, 6, '2025-01-25 04:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, '', 'test1', 'test@example.com', '$2y$10$4TtccaqghSsASZkbZKk/yegsR7UZ1uxI095P17zF4mghgzDNX1Q6K', 'user', '2025-01-24 12:58:03'),
(2, 'admin1 ', NULL, NULL, '$2y$10$3mnyfqoaYcYizz0NxUd1ees0KCsKvWhFQ0XLWuVC0cBVO9evy1N5a', 'admin', '2025-01-24 13:40:40'),
(3, '', 'User1 ', 'user1@gmail.com', '$2y$10$aTk.zqzgK6vhE07oZlLicOqU7nGCJcXXMytjeceeoigD.SoWdGar2', 'user', '2025-01-24 16:19:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_registrations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
