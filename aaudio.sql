-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 12:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aaudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `upload_date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `audio_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `title`, `description`, `upload_date`, `user_id`, `cover_image`, `audio_url`) VALUES
(1, 'title', 'Write a little about this podcast...', '2023-06-12 01:41:03', 7, NULL, 'audio_uploads/audio_64865b8f696a8.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `profile_picture`, `password`) VALUES
(1, 'jo', 'ja', 'jojo', 'jo@gmail.com', 'https://github.com/ye-we/image', 'password'),
(2, 'jojo', 'l', 'jo', 'jo@gmail.co', NULL, 'p'),
(3, 'JONES', 'daniel', 'danjo', 'dan@gmail.com', NULL, '$2y$10$0YfZY6TgOZ7/X0qy/m4VnOc4AKFWqwAryApo1t4ToerQUsySNeinS'),
(4, 'JONES', 'daniel', 'sdnd', 'dd@gmail.com', NULL, '$2y$10$l4Pf3sULAkePHV2I3dHXSuJUhJJhJqdrW6LG9w2iva8dNXW2S335m'),
(5, 'JONES', 'daniel', 'sdnds', 'sdd@gmail.com', NULL, '$2y$10$0036lTwRPPm7hmYLU7AjaOjkV7pVOp.PpGsxmEsaa6zhDC6oL3H0q'),
(6, 'abel', 'leul', 'ablex', 'ablex@gmail.com', NULL, '$2y$10$BT4aTuxEwH4eqolGxw6pCeUx4Dpxo5hXbc6xU7Z1kq.k9HX9uSH1S'),
(7, 'jan', 'scott', 'jancot', 'jan@gmail.com', NULL, '$2y$10$/FjLzteJdWd210sChBV5xeUOjH55DUm6WarVdCbf9/lj8a1DX5bNq'),
(8, 'jan', 'scott', 'jancots', 'sjan@gmail.com', NULL, '$2y$10$M5tdspDxR17LmiZDT7XNzOPOj4ZtrcDoK.xKDuJTK.LEm2sAiI.rO'),
(9, 'jan', 'scott', 'jancotsd', 'sjan@gmail.coms', NULL, '$2y$10$TGgBM7SMMDiNy/mQ9OMhhOPnf2HfQ9H9HMQLJF7wzo64ojA.tmzJO'),
(10, 'jan', 'scott', 'jancotsdd', 'sjan@gmail.comsd', NULL, '$2y$10$eXd9GsEJlh0EB8LCtlNRS.XrEDw3aKe4TpGcXZTqXSgspYR7LJJq2'),
(11, 'jan', 'scott', 'jancotsddd', 'sjan@gmail.comsds', NULL, '$2y$10$H8Zf4A8mYTOK62cQJwZPcOy/tV4EXbK.Qanue7cAjQjinzJzoMYR2'),
(12, 'new', 'las', 'sldf', 'sdfg@g', NULL, '$2y$10$wGNPn3ky5xKqOYZ7wPuPZ.2klW6pvPEG1xig4/dvjiilU02Tex.J6'),
(13, 'fname', 'lname', 'u', 'u@g', NULL, '$2y$10$jN9U.2w4b8sIca5nrX3.bOwreyZl80nYGlKw5dq3tiHlc8zduMri6'),
(14, 'rugy', 'yew', 'sdf', 'rugy@gmail.com', NULL, '$2y$10$.J/ETKBLf3tfV1054G8K9u5UajS.G4pZ8TXT9V29t6UuZpfXUPNHy'),
(15, 'fname', 'lname', 'fname', 'jojo@gmail.com', NULL, '$2y$10$FFoIHBdmPy/XIAnJVgVMbu6yW9GVZPoKmK30nc3HDAitoCASn5sfy');

-- --------------------------------------------------------

--
-- Table structure for table `user_relationship`
--

CREATE TABLE `user_relationship` (
  `follower_id` int(11) DEFAULT NULL,
  `following_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_relationship`
--
ALTER TABLE `user_relationship`
  ADD UNIQUE KEY `follower_id` (`follower_id`,`following_id`),
  ADD KEY `following_id` (`following_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `audio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_relationship`
--
ALTER TABLE `user_relationship`
  ADD CONSTRAINT `user_relationship_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_relationship_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
