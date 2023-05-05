-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 02:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabulation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE `contestants` (
  `id` int(11) NOT NULL,
  `contestant_number` text NOT NULL,
  `contestant_name` text NOT NULL,
  `contestant_description` text DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `is_show` text NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `contestant_number`, `contestant_name`, `contestant_description`, `event_id`, `is_show`) VALUES
(15, '1', 'June Sarol', 'Awihao', 32, 'false'),
(16, '2', 'James Algarme', 'Bagakay', 32, 'false'),
(17, '3', 'Dominique Librea', 'Poblacion', 32, 'false'),
(18, '4', 'Josephus Nillas', 'Sagay', 32, 'false'),
(19, '5', 'Jim Cris Aroba', 'Canlumampao', 32, 'false'),
(20, '6', 'Daryll Barabat', 'Talavera', 32, 'false'),
(21, '7', 'Sherwin Cabunillas', 'Sangi', 32, 'false'),
(22, '8', 'Louie Jay Elimino', 'Magdugo', 32, 'false'),
(28, '1', 'Angi Reyes', 'Waragud', 37, 'false'),
(30, '3', 'Yardley Kirkland', 'Ullam ut qui deserun', 37, 'false'),
(31, '2', 'Iona Avery', 'Saepe proident at s', 37, 'false'),
(32, '4', 'Heather Grant', 'In praesentium aut v', 37, 'false'),
(33, '5', 'Rama Ramos', 'Ut do ducimus aut s', 37, 'false'),
(34, '6', 'Robin Small', 'Ex dignissimos nesci', 37, 'false'),
(35, '7', 'Solomon Bryan', 'Nemo placeat lorem ', 37, 'false'),
(36, '8', 'Quin Holloway', 'Commodo nihil incidi', 37, 'false'),
(37, '9', 'Bertha Battle', 'Odio quibusdam ex as', 37, 'false'),
(38, '10', 'Ezra Briggs', 'Earum voluptatem et ', 37, 'false'),
(39, '11', 'Ria Rhodes', 'Eum aut quia quia ut', 37, 'false'),
(40, '12', 'Ginger Blair', 'Mollitia quam ullam ', 37, 'false'),
(41, '13', 'Phelan Rocha', 'Sed sint eos dolor ', 37, 'false'),
(42, '14', 'Craig King', 'Est quis debitis id ', 37, 'false'),
(43, '15', 'Seth Neal', 'Fugit quasi necessi', 37, 'false'),
(44, '16', 'Hyatt Sosa', 'Similique dicta duis', 37, 'false'),
(45, '17', 'Susan Reese', 'Aspernatur in verita', 37, 'false'),
(46, '18', 'Ann Davis', 'Autem ipsam est quis', 37, 'false'),
(47, '19', 'Rigel Gates', 'Error impedit natus', 37, 'false'),
(48, '19', 'September Hampton', 'Ipsa porro mollitia', 37, 'false'),
(49, '20', 'Jennifer Odom', 'Tempora maxime quis ', 37, 'false'),
(50, '21', 'Geoffrey Case', 'Vel aut fugiat cons', 37, 'false'),
(51, '22', 'Skyler Hancock', 'Quia exercitation at', 37, 'false'),
(52, '23', 'Trevor Glenn', 'Aut ut magna aut dol', 37, 'false'),
(53, '24', 'Marshall Golden', 'Quos non esse cillu', 37, 'false'),
(54, '25', 'Xyla Burgess', 'Voluptas aut rerum q', 37, 'false'),
(55, '26', 'Hyatt Carver', 'Eos corrupti fugit', 37, 'false'),
(58, '29', 'Wing Kerr', 'Nisi molestiae assum', 37, 'false'),
(59, '30', 'Marcia Hahn', 'Qui hic sint eiusmo', 37, 'false'),
(60, '31', 'Doris Hancock', 'Eu et laborum Qui c', 37, 'false'),
(61, '32', 'Phyllis Henson', 'Aut aliquip reprehen', 37, 'false'),
(62, '33', 'Giselle Zamora', 'Enim quisquam repell', 37, 'false'),
(63, '34', 'Yuri Suarez', 'Soluta in facilis ut', 37, 'false'),
(64, '35', 'Cullen Good', 'Omnis consequatur u', 37, 'false'),
(65, '36', 'Riley Payne', 'Impedit rerum repud', 37, 'false'),
(66, '37', 'Christian Velazquez', 'Pariatur Tenetur de', 37, 'false'),
(67, '38', 'Delilah Bailey', 'Animi libero quidem', 37, 'false'),
(68, '27', 'Demetrius Boyle', 'Amet distinctio Re', 37, 'false'),
(69, '28', 'Aimee Sharpe', 'Corrupti dolore ad ', 37, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `criteria_name` text NOT NULL,
  `criteria_percentage` text NOT NULL,
  `event_id` int(11) NOT NULL,
  `is_show` text NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `criteria_name`, `criteria_percentage`, `event_id`, `is_show`) VALUES
(30, 'Introduction and Casual Wear', '100', 32, 'false'),
(31, 'Costume', '100', 32, 'true'),
(32, 'Talent', '100', 32, 'false'),
(36, 'Question and Answer', '100', 32, 'false'),
(43, 'Magee Dyer', '31', 37, 'false'),
(44, 'Shannon Nicholson', '95', 37, 'false'),
(45, 'Barbara Salinas', '70', 37, 'false'),
(46, 'Sydney Maldonado', '2', 37, 'false'),
(47, 'Neil Sharpe', '99', 37, 'false'),
(48, 'Elmo Shelton', '53', 37, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` text NOT NULL,
  `event_description` text DEFAULT NULL,
  `event_date` text NOT NULL,
  `event_time` text NOT NULL,
  `event_venue` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_start` text NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_description`, `event_date`, `event_time`, `event_venue`, `created_at`, `is_start`) VALUES
(32, 'Binibining Toledo 2023', 'Toledo Fiesta Event - Binibining Toledo 2023', '2023-04-18', '13:00', 'Megadome', '2023-03-24 19:06:58', 'true'),
(37, 'SAMPLE 38', 'WATDAHEKKLL', '2023-06-16', '06:05', 'TOLEDO', '2023-05-05 19:45:24', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `judge_name` text NOT NULL,
  `judge_gender` text NOT NULL,
  `judge_username` text NOT NULL,
  `judge_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `event_id`, `judge_name`, `judge_gender`, `judge_username`, `judge_password`) VALUES
(1, 32, 'Moana Warner', 'Male', 'anggi1', 'asd'),
(2, 32, 'Amir Rutledge', 'Female', 'anggi2', 'asd'),
(3, 32, 'Troy Estrada', 'Male', 'anggi3', 'asd'),
(4, 32, 'Robin Craig', 'Female', 'anggi4', 'asd'),
(5, 32, 'Ainsley Mckenzie', 'Female', 'anggi5', 'asd'),
(21, 37, 'Kadeem Boone', '', 'wetusyvi', 'Pa$$w0rd!'),
(22, 37, 'Teegan Farrell', '', 'wacohe', 'Pa$$w0rd!'),
(23, 37, 'Daria Small', '', 'zihyz', 'Pa$$w0rd!');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL,
  `score` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `event_id`, `judge_id`, `criteria_id`, `contestant_id`, `score`) VALUES
(244, 32, 1, 30, 15, '6'),
(245, 32, 1, 30, 16, '8'),
(246, 32, 1, 30, 18, '8'),
(247, 32, 1, 30, 17, '5'),
(248, 32, 1, 30, 20, '7'),
(249, 32, 1, 30, 19, '7'),
(250, 32, 1, 30, 21, '7'),
(251, 32, 1, 30, 22, '8'),
(252, 32, 2, 30, 15, '5'),
(253, 32, 2, 30, 16, '6'),
(254, 32, 2, 30, 17, '2'),
(255, 32, 2, 30, 18, '9'),
(256, 32, 2, 30, 20, '5'),
(257, 32, 2, 30, 19, '4'),
(258, 32, 2, 30, 21, '3'),
(259, 32, 2, 30, 22, '8'),
(260, 32, 1, 36, 16, '7'),
(261, 32, 1, 36, 17, '5'),
(262, 32, 1, 36, 20, '8'),
(263, 32, 1, 36, 18, '7'),
(264, 32, 1, 36, 15, '6'),
(265, 32, 1, 36, 19, '8'),
(266, 32, 1, 36, 21, '8'),
(267, 32, 1, 36, 22, '6'),
(268, 32, 2, 36, 15, '5'),
(269, 32, 2, 36, 16, '6'),
(270, 32, 2, 36, 20, '8'),
(271, 32, 2, 36, 19, '9'),
(272, 32, 2, 36, 18, '4'),
(273, 32, 2, 36, 17, '2'),
(274, 32, 2, 36, 21, '7'),
(275, 32, 2, 36, 22, '3'),
(276, 32, 2, 32, 15, '5'),
(277, 32, 2, 32, 16, '4'),
(278, 32, 2, 32, 18, '7'),
(279, 32, 2, 32, 17, '8'),
(280, 32, 2, 32, 21, '9'),
(281, 32, 2, 32, 20, '2'),
(282, 32, 2, 32, 19, '6'),
(283, 32, 2, 32, 22, '4'),
(284, 32, 1, 32, 15, '6'),
(285, 32, 1, 32, 16, '7'),
(286, 32, 1, 32, 17, '8'),
(287, 32, 1, 32, 20, '8'),
(288, 32, 1, 32, 18, '6'),
(289, 32, 1, 32, 19, '8'),
(290, 32, 1, 32, 21, '7'),
(291, 32, 1, 32, 22, '8'),
(292, 32, 2, 31, 15, '5'),
(293, 32, 2, 31, 16, '6'),
(294, 32, 2, 31, 19, '8'),
(295, 32, 2, 31, 18, '2'),
(296, 32, 2, 31, 17, '4'),
(297, 32, 2, 31, 21, '7'),
(298, 32, 2, 31, 20, '6'),
(299, 32, 2, 31, 22, '3'),
(300, 32, 1, 31, 15, '7'),
(301, 32, 1, 31, 16, '6'),
(302, 32, 1, 31, 18, '6'),
(303, 32, 1, 31, 19, '8'),
(304, 32, 1, 31, 17, '7'),
(305, 32, 1, 31, 20, '7'),
(306, 32, 1, 31, 21, '8'),
(307, 32, 1, 31, 22, '8');

-- --------------------------------------------------------

--
-- Table structure for table `sub_criteria`
--

CREATE TABLE `sub_criteria` (
  `id` int(11) NOT NULL,
  `subcriteria_name` text NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_criteria`
--

INSERT INTO `sub_criteria` (`id`, `subcriteria_name`, `criteria_id`, `event_id`) VALUES
(2, 'Fleur Goodman', 26, 34),
(3, '123123', 26, 34),
(6, 'Suitability of the costume', 31, 32),
(7, 'Wearability', 31, 32),
(8, 'Craftsmanship', 31, 32),
(9, 'Stage Deportment (Pose, Projection, Bearing)', 31, 32),
(11, 'Singing', 32, 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`) VALUES
(1, 'John', 'Doe', 'Smith', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_criteria`
--
ALTER TABLE `sub_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `sub_criteria`
--
ALTER TABLE `sub_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
