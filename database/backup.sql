-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2026 at 12:39 AM
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
-- Database: `managers-lounge`
--

-- --------------------------------------------------------

--
-- Table structure for table `discussion_board`
--

CREATE TABLE `discussion_board` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `picture` blob NOT NULL,
  `content` text NOT NULL,
  `username` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion_board`
--

INSERT INTO `discussion_board` (`id`, `title`, `description`, `picture`, `content`, `username`, `time_created`, `comments`) VALUES
(1, 'Why is FM26 so bad ', 'I think FM26 is awful!!!', 0x75706c6f6164732f4f49502e6a7067, 'The game is bad this year , really bad ', '', '2026-02-14 23:36:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `date_written` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `username`, `email`, `subject`, `date_written`) VALUES
(1, 'Euan', 'Parry', 'Euan123', '123@gmail.com', 'I hate this website', '2025-05-08 09:21:31'),
(2, 'euan', 'parry', 'Enrol123', 'euan@gmail.com', 'I don&#039;t like the about club page as it is empty!!!!!!!!!!!!!!!!!!!!!!!!!!!', '2025-05-22 10:49:11'),
(3, 'Alexander', 'Parry', 'Enrol123', 'Egrparry28@gmail.com', 'This website is insane ! The PHP master strikes again. ', '2025-05-22 19:43:17'),
(4, 'Alexander', 'Parry', 'Enrol123', 'Egrparry28@gmail.com', 'This website is insane ! The PHP master strikes again. ', '2025-05-22 19:44:50'),
(5, 'Alexander', 'Parry', 'Enrol123', 'Egrparry28@gmail.com', 'This website is insane ! The PHP master strikes again. ', '2025-05-22 19:45:06'),
(6, 'Alexander', 'Parry', 'Enrol123', 'Egrparry28@gmail.com', 'This website is insane ! The PHP master strikes again. ', '2025-05-22 19:45:50'),
(7, 'Frazee', 'Harbess', 'FrazerGTFC', 'test@gmail.com', 'This website is awful ', '2025-05-23 12:23:57'),
(8, 'Greg', 'Richard', 'thegreatone', 'greg@fishandchips.co.uk', 'This website design is cool ', '2026-02-09 14:57:48'),
(9, 'Greg', 'Richard', 'thegreatone', 'greg@fishandchips.co.uk', 'This website design is cool ', '2026-02-09 15:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `picture` blob NOT NULL,
  `content` text NOT NULL,
  `username` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`id`, `title`, `description`, `picture`, `content`, `username`, `time_created`, `comments`) VALUES
(1, 'How to sell a player', 'Selling players is key for FM success!', 0x75706c6f6164732f53637265656e73686f7420323032362d30322d3134203233323733392e706e67, 'You sell players by pressing the accept transfer button. ', '', '2026-02-14 23:27:55', ''),
(2, 'Wonderkids update is unreal', 'SHOCKING NEW UPDATE CHANGES EVERYTHING', 0x75706c6f6164732f53637265656e73686f7420323032362d30322d3134203233323434312e706e67, 'WONDERKIDS ARE EVERYWHERE ', '', '2026-02-14 23:26:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `guides_comments`
--

CREATE TABLE `guides_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guides_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guides_comments`
--

INSERT INTO `guides_comments` (`id`, `user_id`, `guides_id`, `text`, `date_created`) VALUES
(1, 12, 2, 'De Rebot Le Paeri is the best wonderkid in the game no joke.', '2026-02-09 14:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `picture` blob NOT NULL,
  `content` text NOT NULL,
  `username` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `picture`, `content`, `username`, `time_created`, `comments`) VALUES
(33, 'How FM26 is So Great', 'An Article on why Football Manager is so good ', 0x75706c6f6164732f464d32362e77656270, 'Football Manager continues to stay busy they&#039;re plenty of discussion across the community about updates, gameplay changes, and what fans want to see next. Recent patches have focused mainly on improving match realism,\r\n\r\nOne of the biggest talking points has been the match engine, with many players enjoying it because it is fresh and new , something different to previous editions.While it&rsquo;s not perfect, most fans agree that the game now feels more realistic.\r\n\r\nOne Negative is the fans are angry about the UI overall and miss the old FM24 style , its like marmite people either love or hate it. \r\n\r\nthe FM community remains as active as ever. From custom databases and face packs to tactical guides on YouTube, players are still finding new ways to keep the game fresh. \r\n\r\nOverall, Football Manager is in a solid place right now. While there are still improvements to be made, the ongoing updates and strong community support show why the series continues to be one of the most popular football simulation games out there.', '', '2026-02-10 20:43:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE `news_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_comments`
--

INSERT INTO `news_comments` (`id`, `user_id`, `news_id`, `text`, `date_created`) VALUES
(1, 1, 17, 'I think Euan is great ', '2025-05-22 20:34:15'),
(3, 8, 1, 'Hume willl stay ', '2025-05-23 12:15:34'),
(4, 9, 1, 'I LIKE THE THE TEAM!!!!', '2025-06-02 13:05:44'),
(5, 3, 27, 'Euan thinks he is shocking\r\n\r\n\r\n', '2025-06-03 13:48:23'),
(6, 3, 31, 'I Think hes really bad. My mate dave , top bloke from Alty , we go way back. He laughed his head of when he heard he was going to football league i shouted for god sake knowing we are signing another cheap player!!!\r\n', '2025-06-10 12:18:00'),
(7, 12, 32, 'This website is poor ', '2026-02-09 14:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `ml_thread_replies`
--

CREATE TABLE `ml_thread_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ml_thread_replies`
--

INSERT INTO `ml_thread_replies` (`id`, `user_id`, `thread_id`, `text`, `date_created`) VALUES
(1, 12, 1, 'This is way worse than FM24. ', '2026-02-09 13:42:19'),
(2, 12, 2, 'i think that frazer michael harness is the true adam \r\n', '2026-02-09 13:52:42'),
(3, 12, 2, 'you idiot frazer is a 5\'9 ltn narrow clavicle manlet ', '2026-02-09 13:53:22'),
(4, 12, 2, 'harry and jacob are true htn ', '2026-02-09 13:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `ml_users`
--

CREATE TABLE `ml_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `bio` text NOT NULL,
  `profile_pic` blob NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `birthdate` text NOT NULL,
  `role` enum('user','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ml_users`
--

INSERT INTO `ml_users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `bio`, `profile_pic`, `status`, `birthdate`, `role`) VALUES
(1, 'FrazerGTFC', '$2y$10$EwvAmv/0GzWsB86V5ffUTecwJp3ehOCYM8nCSIJenXjPcBDaOHfMO', 'Frazer   ', 'Harness   ', 'frazergtfc9@outlook.com', 'Hello Euan Parry This is my blogsite', 0x636f6c652070616c6d65722e6a7067, 'active', '2008-06-07', 'admin'),
(3, 'EuanParry123', '$2y$10$n3SxG/5GD1EkA0xw.KanxeMMBZBDL6aYifWk6X/IH1GGTDLWk9jdG', 'Euan      ', 'Pazza      ', 'euan@gmail.com', 'I hate Frazer and Harry', 0x70616c6d65722e6a7067, 'active', '2020-01-07', 'user'),
(4, 'harold1234', '$2y$10$76PrL2sPvomrdLcM4ROCY.O4Hvp7pHd38QS/gTZlFJOn63q77fBNe', 'harry', 'barker', 'HAROLd123@gmail.com', '', '', 'active', '2007-08-13', 'user'),
(5, 'thegreatone', '$2y$10$qs0Df8w2wAwTVdXJ8Ceg7ek/s8qM0Wjb5/hv62.pVzMq1wxeh.F1O', 'euan ', 'glyn', 'euanismydadd@yahoo.com', '', '', 'active', '12121-02-12', 'admin'),
(6, 'Enrol123', '$2y$10$4kxZa1hwdH5QR3STzJUYRu5N1nMIOmBmjF7iyH.bcUFxHdEuFdqdK', 'Euan ', 'Parry ', 'Egrparry28@gmail.com', 'Euan is grate', 0x53637265656e73686f7420323032342d31302d3134203134313530322e706e67, 'active', '2007-09-28', 'user'),
(7, 'EuanSmells', '$2y$10$xzFzSyqM/cOxiOuSxMrHfeWtFr0MiNUFRARMMhWAOfAIX/gtJzMBW', 'Alex', 'Parry', 'alexparry@gmail.com', '', '', 'active', '2004-03-28', 'user'),
(8, 'MrTest123', '$2y$10$gsruPByhpzqk48vrhwEd9.K7Ww3YiSbVe9cIyEIcLf2O6Ll1gJto2', 'Test ', 'Testing ', 'test@gmail.com', 'This is a test bio ', 0x4a757374696e20416d616c757a6f722e77656270, 'active', '2003-02-03', 'user'),
(9, 'Euan123', '$2y$10$mUbp3WPvQsZkHFVzMiGgo.0066L0lJFvCfQoPzhEx9zO9g2jTDdDS', 'Euan ', 'Parry', 'Enrol123@gmail.com', '', '', 'active', '2007-09-28', 'user'),
(10, 'ITKNEWS', '$2y$10$bNVzP3rShm/7lx30jHTjgunHDntXFlk6MTVq9K0jcHl13ZsGnXlKq', 'Mr', 'Reliable', 'reliablenews@yahoo.com', '', '', 'active', '1878-02-03', 'user'),
(11, 'TheBatter', '$2y$10$Z1R2FPx.nZ8YqOxVCHcPseUR9cB7BiAAQXGQYNnuHLTdlWsPaXtyK', 'Greg', 'Richard', 'greg@fishandchips.co.uk', '', '', 'active', '1998-09-16', 'user'),
(12, 'haroldluvschads', '$2y$10$pkBIgqs9JoEHMEk3p5kPFOlUFoykeVxdCmQIe3W4lNWW4rS9E994O', 'Harold', 'barker', 'harold123@parry.com', '', '', 'active', '2007-08-13', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discussion_board`
--
ALTER TABLE `discussion_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guides_comments`
--
ALTER TABLE `guides_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ml_thread_replies`
--
ALTER TABLE `ml_thread_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ml_users`
--
ALTER TABLE `ml_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discussion_board`
--
ALTER TABLE `discussion_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guides_comments`
--
ALTER TABLE `guides_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `news_comments`
--
ALTER TABLE `news_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ml_thread_replies`
--
ALTER TABLE `ml_thread_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ml_users`
--
ALTER TABLE `ml_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
