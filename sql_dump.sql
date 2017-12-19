-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2017 at 09:24 AM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printfulapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed_tests`
--

CREATE TABLE `completed_tests` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_key` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_amount` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `completed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `completed_tests`
--

INSERT INTO `completed_tests` (`id`, `test_id`, `test_key`, `name`, `question_amount`, `correct_answers`, `completed_at`) VALUES
(57, 1, 'Kristaps_164', 'Kristaps', 4, 3, '2017-12-19 08:02:12'),
(58, 1, 'Kristaps_880', 'Kristaps', 4, 4, '2017-12-19 08:11:56'),
(59, 1, 'Kristaps_448', 'Kristaps', 4, 4, '2017-12-19 08:24:02'),
(60, 1, 'Kristaps_379', 'Kristaps', 4, 4, '2017-12-19 08:44:56'),
(61, 2, 'Jānis_31', 'Jānis', 3, 3, '2017-12-19 09:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `correct_answer`
--

CREATE TABLE `correct_answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `correct_answer`
--

INSERT INTO `correct_answer` (`id`, `question_id`, `answer_id`) VALUES
(1, 1, 1),
(2, 3, 12),
(3, 2, 5),
(4, 4, 14),
(5, 5, 20),
(6, 6, 28),
(7, 7, 26);

-- --------------------------------------------------------

--
-- Table structure for table `test_answers`
--

CREATE TABLE `test_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_answers`
--

INSERT INTO `test_answers` (`id`, `question_id`, `answer`) VALUES
(1, 1, 'Kristaps'),
(2, 1, 'Jānis'),
(3, 1, 'Pēteris'),
(4, 1, 'Dāvis'),
(5, 2, 'Rīga'),
(6, 2, 'Cēsis'),
(7, 2, 'Valmiera'),
(8, 2, 'Jelgava'),
(9, 2, 'Daugavpils'),
(10, 3, 'Jānis Vītols'),
(11, 3, 'Kaspars Bērziņš'),
(12, 3, 'Raimonds Vējonis'),
(13, 4, '15'),
(14, 4, '20'),
(15, 4, '25'),
(16, 4, '35'),
(17, 4, '77'),
(18, 5, 'Dzeltena'),
(19, 5, 'Zila'),
(20, 5, 'Zaļa'),
(21, 5, 'Sarkana'),
(22, 5, 'Melna'),
(23, 6, '15'),
(24, 6, '20'),
(25, 6, '342'),
(26, 7, 'Visu'),
(27, 7, 'Neko'),
(28, 6, '10');

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `question`, `test_id`) VALUES
(1, 'Kā mani sauc?', 1),
(2, 'Kura ir Latvijas galvaspilsēta?', 1),
(3, 'Kurš ir Latvijas prezidents?', 2),
(4, 'Cik ir 10 + 10?', 1),
(5, 'Kāda ir mana krāsa?', 1),
(6, 'Cik ir 20 - 10?', 2),
(7, 'Visu vai neko?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `test_titles`
--

CREATE TABLE `test_titles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_titles`
--

INSERT INTO `test_titles` (`id`, `name`, `created_at`) VALUES
(1, 'Pirmais tests', '2017-12-17 12:06:58'),
(2, 'Otrais tests', '2017-12-17 12:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_entries`
--

CREATE TABLE `user_entries` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `test_key` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_entries`
--

INSERT INTO `user_entries` (`id`, `name`, `test_id`, `question_id`, `answer`, `test_key`) VALUES
(273, 'Kristaps', 1, 1, 1, 'Kristaps_164'),
(274, 'Kristaps', 1, 2, 5, 'Kristaps_164'),
(275, 'Kristaps', 1, 4, 14, 'Kristaps_164'),
(276, 'Kristaps', 1, 5, 21, 'Kristaps_164'),
(277, 'Kristaps', 1, 1, 1, 'Kristaps_880'),
(278, 'Kristaps', 1, 2, 5, 'Kristaps_880'),
(279, 'Kristaps', 1, 4, 14, 'Kristaps_880'),
(280, 'Kristaps', 1, 5, 20, 'Kristaps_880'),
(281, 'Kristaps', 1, 1, 1, 'Kristaps_448'),
(282, 'Kristaps', 1, 2, 5, 'Kristaps_448'),
(283, 'Kristaps', 1, 4, 14, 'Kristaps_448'),
(284, 'Kristaps', 1, 5, 20, 'Kristaps_448'),
(285, 'Kristaps', 1, 1, 1, 'Kristaps_379'),
(286, 'Kristaps', 1, 2, 5, 'Kristaps_379'),
(287, 'Kristaps', 1, 4, 14, 'Kristaps_379'),
(288, 'Kristaps', 1, 5, 20, 'Kristaps_379'),
(289, 'Kristaps', 2, 3, 12, 'Kristaps_522'),
(290, 'Kristaps', 2, 6, 25, 'Kristaps_522'),
(291, 'Jānis', 2, 3, 12, 'Jānis_31'),
(292, 'Jānis', 2, 6, 28, 'Jānis_31'),
(293, 'Jānis', 2, 7, 26, 'Jānis_31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completed_tests`
--
ALTER TABLE `completed_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `correct_answer`
--
ALTER TABLE `correct_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_answers`
--
ALTER TABLE `test_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_titles`
--
ALTER TABLE `test_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_entries`
--
ALTER TABLE `user_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `completed_tests`
--
ALTER TABLE `completed_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `correct_answer`
--
ALTER TABLE `correct_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `test_answers`
--
ALTER TABLE `test_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `test_titles`
--
ALTER TABLE `test_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_entries`
--
ALTER TABLE `user_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
