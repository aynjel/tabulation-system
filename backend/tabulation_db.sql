-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 12:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
(69, '1', 'Clavel Saransan', 'Awihao', 38, 'false'),
(70, '2', 'Samantha C. Resuelo', 'Bagakay', 38, 'false'),
(71, '3', 'Maria Fahmela Lasco', 'Bato', 38, 'false'),
(72, '4', 'Maria Cendy B. Bolo', 'Biga', 38, 'false'),
(73, '5', 'Angyl Mae Villahermosa', 'Bulongan', 38, 'false'),
(74, '6', 'Kathleen Echavez', 'Bunga', 38, 'false'),
(75, '7', 'Karryl A. Sevilla', 'Cabitoonan', 38, 'false'),
(76, '8', 'Ayezah B. Resurreccion', 'Calong-calong', 38, 'false'),
(77, '9', 'Adhe Lorly J. Igot', 'Cambang-Ug', 38, 'false'),
(78, '10', 'Julia Aliganga', 'Campo 8', 38, 'false'),
(79, '11', 'Shaira Marish Nacua', 'Canlumampao', 38, 'false'),
(80, '12', 'Kizzyl Claire Mamugay', 'Cantabaco', 38, 'false'),
(81, '13', 'Theffany D. De Gracia', 'Captain Claudio', 38, 'false'),
(82, '14', 'Angellene Grace B. Repollo', 'Carmen', 38, 'false'),
(83, '15', 'Kim Irish Placibe', 'Daanlungsod', 38, 'false'),
(84, '16', 'Rio B. Calonia', 'Don Andres Soriano', 38, 'false'),
(85, '17', 'Marie Jhuls T. Codino', 'Dumlog', 38, 'false'),
(86, '18', 'Lorraine L. Tan', 'Gen. Climaco', 38, 'false'),
(87, '19', 'Mikaela Marie M. Caparida', 'Ibo', 38, 'false'),
(88, '20', 'Chirique Ramos', 'Ilihan', 38, 'false'),
(89, '21', 'Mariel Anne Jestre', 'Juan Climaco Sr.', 38, 'false'),
(90, '22', 'Sarah Jean T. Caliguid', 'Landahan', 38, 'false'),
(91, '23', 'Lyca Mae A. Reston', 'Loay', 38, 'false'),
(92, '24', 'Sarah Jane O. Calope', 'Luray II', 38, 'false'),
(93, '25', 'Irish Mae Nicole P. Erediano', 'Matab-ang', 38, 'false'),
(94, '26', 'Lady Ann Hilaria Manulat', 'Media Once', 38, 'false'),
(95, '27', 'Chen Maturan', 'Pangamihan', 38, 'false'),
(96, '28', 'Rikka R. Alcomendras', 'Poblacion', 38, 'false'),
(97, '29', 'Lara Faith Longakit', 'Poog', 38, 'false'),
(98, '30', 'Lady Rose Brazona', 'Puting Bato', 38, 'false'),
(99, '31', 'Bernadette Ortega', 'Sagay', 38, 'false'),
(100, '32', 'Mary An E. Mendrez', 'Sam-ang', 38, 'false'),
(101, '33', 'Krystle Delasa', 'Sangi', 38, 'false'),
(102, '34', 'Lyca Marchellin D. Diang', 'Santo Niño', 38, 'false'),
(103, '35', 'Honey Faith C. Diaz', 'Subayon', 38, 'false'),
(104, '36', 'Axel E. Purisima', 'Talavera', 38, 'false'),
(105, '37', 'Cherry Ann Mahilum', 'Tubod', 38, 'false'),
(106, '38', 'Ida B. Panday', 'Tungkay', 38, 'false'),
(108, '1', 'Clavel Saransan', 'Awihao', 39, 'false'),
(109, '2', 'Samantha C. Resuelo', 'Bagakay', 39, 'false'),
(110, '3', 'Maria Fahmela Lasco', 'Bato', 39, 'false'),
(111, '4', 'Maria Cendy B. Bolo', 'Biga', 39, 'false'),
(112, '5', 'Angyl Mae Villahermosa', 'Bulongan', 39, 'false'),
(113, '6', 'Kathleen Echavez', 'Bunga', 39, 'false'),
(114, '7', 'Karryl A. Sevilla', 'Cabitoonan', 39, 'false'),
(115, '8', 'Ayezah B. Resurreccion', 'Calong-calong', 39, 'false'),
(116, '9', 'Adhe Lorly J. Igot', 'Cambang-Ug', 39, 'false'),
(117, '10', 'Julia Aliganga', 'Campo 8', 39, 'false'),
(118, '11', 'Shaira Marish Nacua', 'Canlumampao', 39, 'false'),
(119, '12', 'Kizzyl Claire Mamugay', 'Cantabaco', 39, 'false'),
(120, '13', 'Theffany D. De Gracia', 'Captain Claudio', 39, 'false'),
(121, '14', 'Angellene Grace B. Repollo', 'Carmen', 39, 'false'),
(122, '15', 'Kim Irish Placibe', 'Daanlungsod', 39, 'false'),
(123, '16', 'Rio B. Calonia', 'Don Andres Soriano', 39, 'false'),
(124, '17', 'Marie Jhuls T. Codino', 'Dumlog', 39, 'false'),
(125, '18', 'Lorraine L. Tan', 'Gen. Climaco', 39, 'false'),
(126, '19', 'Mikaela Marie M. Caparida', 'Ibo', 39, 'false'),
(127, '20', 'Chirique Ramos', 'Ilihan', 39, 'false'),
(128, '21', 'Mariel Anne Jestre', 'Juan Climaco Sr.', 39, 'false'),
(129, '22', 'Sarah Jean T. Caliguid', 'Landahan', 39, 'false'),
(130, '23', 'Lyca Mae A. Reston', 'Loay', 39, 'false'),
(131, '24', 'Sarah Jane O. Calope', 'Luray II', 39, 'false'),
(132, '25', 'Irish Mae Nicole P. Erediano', 'Matab-ang', 39, 'false'),
(133, '26', 'Lady Ann Hilaria Manulat', 'Media Once', 39, 'false'),
(134, '27', 'Chen Maturan', 'Pangamihan', 39, 'false'),
(135, '28', 'Rikka R. Alcomendras', 'Poblacion', 39, 'false'),
(136, '29', 'Lara Faith Longakit', 'Poog', 39, 'false'),
(137, '30', 'Lady Rose Brazona', 'Puting Bato', 39, 'false'),
(138, '31', 'Bernadette Ortega', 'Sagay', 39, 'false'),
(139, '32', 'Mary An E. Mendrez', 'Sam-ang', 39, 'false'),
(140, '33', 'Krystle Delasa', 'Sangi', 39, 'false'),
(141, '34', 'Lyca Marchellin D. Diang', 'Santo Niño', 39, 'false'),
(142, '35', 'Honey Faith C. Diaz', 'Subayon', 39, 'false'),
(143, '36', 'Axel E. Purisima', 'Talavera', 39, 'false'),
(144, '37', 'Cherry Ann Mahilum', 'Tubod', 39, 'false'),
(145, '39', 'Ida B. Panday', 'Tungkay', 39, 'false');

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
(1, 'Localized Costume', '100', 38, 'false'),
(3, 'Talent', '100', 38, 'false'),
(4, 'Casual Attire', '100', 38, 'false'),
(6, 'Evening Gown', '100', 38, 'false'),
(7, 'Q and A', '100', 38, 'true'),
(8, 'Costume Designer', '100', 39, 'false'),
(58, 'Swimsuit', '100', 38, 'false');

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
(38, 'Binibining Toledo 2023', 'Preliminary Competition', '2023-05-06', '07:00', 'Toledo City Megadome', '2023-05-06 03:43:25', 'true'),
(39, 'Binibining Toledo 2023 - Costume Designer', 'Costume Designer Competition', '2023-05-06', '08:00', 'Toledo City Megadome', '2023-05-06 06:51:19', 'false');

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
(24, 38, 'Meng Ronquillo', '', 'judge1', 'password'),
(25, 38, 'Karla Supersoft', '', 'judge3', 'password'),
(26, 38, 'Ray John Lim', '', 'judge2', 'password'),
(27, 39, 'Ray John Lim', '', 'judge2-c', 'password'),
(28, 39, 'Karla Supersoft', '', 'judge3-c', 'password'),
(29, 39, 'Meng Ronquillo', '', 'judge1-c', 'password'),
(30, 38, 'Swimsuit - Judge 1', '', 'judge4', 'password'),
(31, 38, 'Swimsuit - Judge 2', '', 'judge5', 'password');

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
(312, 38, 24, 1, 69, '9'),
(313, 38, 24, 1, 70, '7'),
(314, 38, 24, 1, 71, '7'),
(315, 38, 24, 1, 72, '9'),
(316, 38, 24, 1, 73, '7'),
(317, 38, 24, 1, 74, '7'),
(318, 38, 24, 1, 75, '7'),
(319, 38, 24, 1, 76, '8'),
(320, 38, 24, 1, 77, '8'),
(321, 38, 24, 1, 78, '10'),
(322, 38, 24, 1, 79, '7'),
(323, 38, 24, 1, 80, '9'),
(324, 38, 24, 1, 81, '8'),
(325, 38, 24, 1, 82, '10'),
(326, 38, 24, 1, 83, '8'),
(327, 38, 24, 1, 84, '7'),
(328, 38, 24, 1, 85, '7'),
(329, 38, 24, 1, 86, '7'),
(330, 38, 24, 1, 87, '7'),
(331, 38, 24, 1, 88, '10'),
(332, 38, 24, 1, 89, '10'),
(333, 38, 24, 1, 90, '8'),
(334, 38, 24, 1, 91, '7'),
(335, 38, 24, 1, 92, '8'),
(336, 38, 24, 1, 93, '8'),
(337, 38, 24, 1, 94, '8'),
(338, 38, 24, 1, 95, '8'),
(339, 38, 24, 1, 96, '10'),
(340, 38, 24, 1, 97, '7'),
(341, 38, 24, 1, 98, '9'),
(342, 38, 24, 1, 99, '9'),
(343, 38, 24, 1, 100, '8'),
(344, 38, 24, 1, 101, '9'),
(345, 38, 24, 1, 102, '8'),
(346, 38, 24, 1, 103, '9'),
(347, 38, 24, 1, 104, '10'),
(348, 38, 24, 1, 105, '8'),
(349, 38, 24, 1, 106, '10'),
(350, 38, 26, 1, 69, '8.0'),
(351, 38, 26, 1, 70, '8.5'),
(352, 38, 26, 1, 71, '9.0'),
(353, 38, 26, 1, 72, '7.5'),
(354, 38, 26, 1, 73, '7.0'),
(355, 38, 26, 1, 74, '6.9'),
(356, 38, 26, 1, 75, '8.3'),
(357, 38, 26, 1, 76, '8.2'),
(358, 38, 26, 1, 77, '8.0'),
(359, 38, 26, 1, 78, '8.1'),
(360, 38, 26, 1, 79, '8.0'),
(361, 38, 26, 1, 80, '7.8'),
(362, 38, 26, 1, 81, '9.0'),
(363, 38, 26, 1, 82, '9.7'),
(364, 38, 26, 1, 83, '9.2'),
(365, 38, 26, 1, 84, '9.3'),
(366, 38, 26, 1, 85, '8.5'),
(367, 38, 26, 1, 86, '9.0'),
(368, 38, 26, 1, 87, '7.5'),
(369, 38, 26, 1, 88, '8.0'),
(370, 38, 26, 1, 89, '8.5'),
(371, 38, 26, 1, 90, '8.0'),
(372, 38, 26, 1, 91, '8.3'),
(373, 38, 26, 1, 92, '7.8'),
(374, 38, 26, 1, 93, '8.2'),
(375, 38, 26, 1, 94, '9.2'),
(376, 38, 26, 1, 95, '8.2'),
(377, 38, 26, 1, 96, '9.5'),
(378, 38, 26, 1, 97, '8.7'),
(379, 38, 26, 1, 98, '8.5'),
(380, 38, 26, 1, 99, '8.2'),
(381, 38, 26, 1, 100, '8.2'),
(382, 38, 26, 1, 101, '9.5'),
(383, 38, 26, 1, 102, '8.5'),
(384, 38, 26, 1, 103, '9.3'),
(385, 38, 26, 1, 104, '9.4'),
(386, 38, 26, 1, 105, '8.8'),
(387, 38, 26, 1, 106, '8.5'),
(388, 38, 25, 1, 69, '7.8'),
(389, 38, 25, 1, 71, '7.2'),
(390, 38, 25, 1, 70, '8.7'),
(391, 38, 25, 1, 72, '6.8'),
(392, 38, 25, 1, 73, '6.9'),
(393, 38, 25, 1, 74, '7.2'),
(394, 38, 25, 1, 75, '8'),
(395, 38, 25, 1, 76, '8.8'),
(396, 38, 25, 1, 77, '6.8'),
(397, 38, 25, 1, 78, '8.8'),
(398, 38, 25, 1, 79, '6.5'),
(399, 38, 25, 1, 80, '7.5'),
(400, 38, 25, 1, 81, '8.4'),
(401, 38, 25, 1, 82, '9.5'),
(402, 38, 25, 1, 83, '8.5'),
(403, 38, 25, 1, 84, '9.2'),
(404, 38, 25, 1, 85, '7.9'),
(405, 38, 25, 1, 86, '9.1'),
(406, 38, 25, 1, 87, '8.6'),
(407, 38, 25, 1, 88, '8.9'),
(408, 38, 25, 1, 89, '9.3'),
(409, 38, 25, 1, 90, '8.9'),
(410, 38, 25, 1, 91, '7.9'),
(411, 38, 25, 1, 92, '6.5'),
(412, 38, 25, 1, 93, '8.5'),
(413, 38, 25, 1, 94, '7.7'),
(414, 38, 25, 1, 95, '6.5'),
(415, 38, 25, 1, 96, '9.7'),
(416, 38, 25, 1, 97, '9.1'),
(417, 38, 25, 1, 98, '7.3'),
(418, 38, 25, 1, 99, '7.6'),
(419, 38, 25, 1, 100, '8.9'),
(420, 38, 25, 1, 101, '9.5'),
(421, 38, 25, 1, 102, '6.5'),
(422, 38, 25, 1, 103, '9.1'),
(423, 38, 25, 1, 104, '9.3'),
(424, 38, 25, 1, 105, '8.8'),
(425, 38, 25, 1, 106, '7.9'),
(426, 39, 29, 8, 108, '10'),
(427, 39, 29, 8, 109, '9'),
(428, 39, 29, 8, 110, '8'),
(429, 39, 29, 8, 111, '10'),
(430, 39, 29, 8, 112, '8'),
(431, 39, 29, 8, 113, '8'),
(432, 39, 29, 8, 114, '8'),
(433, 39, 29, 8, 115, '8'),
(434, 39, 29, 8, 116, '10'),
(435, 39, 29, 8, 117, '10'),
(436, 39, 29, 8, 118, '7'),
(437, 39, 29, 8, 119, '9'),
(438, 39, 29, 8, 120, '9'),
(439, 39, 29, 8, 121, '9'),
(440, 39, 29, 8, 122, '9'),
(441, 39, 29, 8, 123, '8'),
(442, 39, 29, 8, 124, '8'),
(443, 39, 29, 8, 125, '9'),
(444, 39, 29, 8, 126, '7'),
(445, 39, 29, 8, 127, '10'),
(446, 39, 29, 8, 128, '10'),
(447, 39, 29, 8, 129, '7'),
(448, 39, 29, 8, 130, '8'),
(449, 39, 29, 8, 131, '9'),
(450, 39, 29, 8, 132, '8'),
(451, 39, 29, 8, 133, '9'),
(452, 39, 29, 8, 134, '9'),
(453, 39, 29, 8, 135, '10'),
(454, 39, 29, 8, 136, '8'),
(455, 39, 29, 8, 137, '8'),
(456, 39, 29, 8, 138, '10'),
(457, 39, 29, 8, 139, '9'),
(458, 39, 29, 8, 140, '9'),
(459, 39, 29, 8, 141, '8'),
(460, 39, 29, 8, 142, '8'),
(461, 39, 29, 8, 143, '10'),
(462, 39, 29, 8, 144, '8'),
(463, 39, 29, 8, 145, '9'),
(464, 39, 27, 8, 108, '8.7'),
(465, 39, 27, 8, 109, '9.7'),
(466, 39, 27, 8, 110, '9.7'),
(467, 39, 27, 8, 111, '8.5'),
(468, 39, 27, 8, 112, '8.2'),
(469, 39, 27, 8, 113, '8.5'),
(470, 39, 27, 8, 114, '8.7'),
(471, 39, 27, 8, 115, '9.5'),
(472, 39, 27, 8, 116, '8.2'),
(473, 39, 27, 8, 117, '8.7'),
(474, 39, 27, 8, 118, '8.5'),
(475, 39, 27, 8, 119, '8.7'),
(476, 39, 27, 8, 120, '8.5'),
(477, 39, 27, 8, 121, '9.7'),
(478, 39, 27, 8, 122, '9.7'),
(479, 39, 27, 8, 123, '9.9'),
(480, 39, 27, 8, 124, '9.5'),
(481, 39, 27, 8, 125, '9.5'),
(482, 39, 27, 8, 126, '8.5'),
(483, 39, 27, 8, 127, '8.7'),
(484, 39, 27, 8, 128, '9.5'),
(485, 39, 27, 8, 129, '8.2'),
(486, 39, 27, 8, 130, '8.7'),
(487, 39, 27, 8, 131, '8.2'),
(488, 39, 27, 8, 132, '8.7'),
(489, 39, 27, 8, 133, '9.5'),
(490, 39, 27, 8, 135, '9.8'),
(491, 39, 27, 8, 136, '8.5'),
(492, 39, 27, 8, 134, '8.5'),
(493, 39, 27, 8, 137, '8.5'),
(494, 39, 27, 8, 138, '8.5'),
(495, 39, 27, 8, 139, '8.2'),
(496, 39, 27, 8, 140, '10.0'),
(497, 39, 27, 8, 141, '9.0'),
(498, 39, 27, 8, 142, '9.7'),
(499, 39, 27, 8, 143, '9.5'),
(500, 39, 27, 8, 144, '8.3'),
(501, 39, 27, 8, 145, '8.0'),
(502, 39, 28, 8, 108, '8.8'),
(503, 39, 28, 8, 110, '7'),
(504, 39, 28, 8, 109, '9.5'),
(505, 39, 28, 8, 111, '6.7'),
(506, 39, 28, 8, 113, '7.4'),
(507, 39, 28, 8, 112, '7.1'),
(508, 39, 28, 8, 114, '8.1'),
(509, 39, 28, 8, 115, '9'),
(510, 39, 28, 8, 117, '9.2'),
(511, 39, 28, 8, 116, '7.3'),
(512, 39, 28, 8, 118, '6.8'),
(513, 39, 28, 8, 119, '7.1'),
(514, 39, 28, 8, 120, '8.6'),
(515, 39, 28, 8, 121, '9.5'),
(516, 39, 28, 8, 122, '9.3'),
(517, 39, 28, 8, 123, '9'),
(518, 39, 28, 8, 124, '8.1'),
(519, 39, 28, 8, 125, '8.8'),
(520, 39, 28, 8, 126, '7.3'),
(521, 39, 28, 8, 127, '9'),
(522, 39, 28, 8, 128, '9.4'),
(523, 39, 28, 8, 129, '8.7'),
(524, 39, 28, 8, 130, '8.4'),
(525, 39, 28, 8, 131, '6.8'),
(526, 39, 28, 8, 132, '9.1'),
(527, 39, 28, 8, 133, '7.2'),
(528, 39, 28, 8, 134, '6.8'),
(529, 39, 28, 8, 135, '9.3'),
(530, 39, 28, 8, 136, '8.9'),
(531, 39, 28, 8, 137, '7.2'),
(532, 39, 28, 8, 138, '7.8'),
(533, 39, 28, 8, 139, '8.3'),
(534, 39, 28, 8, 140, '9.5'),
(535, 39, 28, 8, 141, '6.5'),
(536, 39, 28, 8, 142, '9.1'),
(537, 39, 28, 8, 143, '9.3'),
(538, 39, 28, 8, 144, '8.7'),
(539, 39, 28, 8, 145, '8.6'),
(540, 38, 24, 4, 69, '10'),
(541, 38, 24, 4, 71, '8'),
(542, 38, 24, 4, 70, '8'),
(543, 38, 24, 4, 73, '9'),
(544, 38, 24, 4, 72, '8'),
(545, 38, 24, 4, 74, '8'),
(546, 38, 24, 4, 75, '8'),
(547, 38, 24, 4, 77, '8'),
(548, 38, 24, 4, 76, '8'),
(549, 38, 24, 4, 78, '10'),
(550, 38, 24, 4, 79, '10'),
(551, 38, 24, 4, 80, '8'),
(552, 38, 24, 4, 81, '10'),
(553, 38, 24, 4, 82, '8'),
(554, 38, 24, 4, 83, '9'),
(555, 38, 24, 4, 84, '8'),
(556, 38, 24, 4, 85, '10'),
(557, 38, 24, 4, 86, '9'),
(558, 38, 24, 4, 87, '10'),
(559, 38, 24, 4, 88, '8'),
(560, 38, 24, 4, 89, '9'),
(561, 38, 24, 4, 90, '10'),
(562, 38, 24, 4, 91, '10'),
(563, 38, 24, 4, 92, '8'),
(564, 38, 24, 4, 93, '8'),
(565, 38, 24, 4, 94, '9'),
(566, 38, 24, 4, 95, '8'),
(567, 38, 24, 4, 96, '8'),
(568, 38, 24, 4, 97, '10'),
(569, 38, 24, 4, 98, '8'),
(570, 38, 24, 4, 99, '9'),
(571, 38, 24, 4, 100, '8'),
(572, 38, 24, 4, 101, '10'),
(573, 38, 24, 4, 102, '10'),
(574, 38, 24, 4, 103, '9'),
(575, 38, 24, 4, 104, '10'),
(576, 38, 24, 4, 105, '8'),
(577, 38, 24, 4, 106, '8'),
(578, 38, 26, 4, 69, '8.5'),
(579, 38, 26, 4, 70, '8.7'),
(580, 38, 26, 4, 74, '8.7'),
(581, 38, 26, 4, 71, '8.9'),
(582, 38, 26, 4, 72, '8.5'),
(583, 38, 26, 4, 73, '8.3'),
(584, 38, 26, 4, 75, '9.2'),
(585, 38, 26, 4, 76, '8.7'),
(586, 38, 26, 4, 77, '8.5'),
(587, 38, 26, 4, 78, '8.7'),
(588, 38, 26, 4, 79, '8.7'),
(589, 38, 26, 4, 80, '9.2'),
(590, 38, 26, 4, 81, '8.5'),
(591, 38, 26, 4, 82, '9.0'),
(592, 38, 26, 4, 83, '9.3'),
(593, 38, 26, 4, 84, '9.1'),
(594, 38, 26, 4, 85, '9.3'),
(595, 38, 26, 4, 86, '9.0'),
(596, 38, 26, 4, 87, '9.3'),
(597, 38, 26, 4, 88, '9.0'),
(598, 38, 26, 4, 89, '9.2'),
(599, 38, 26, 4, 90, '9.1'),
(600, 38, 26, 4, 91, '9.1'),
(601, 38, 26, 4, 92, '9.0'),
(602, 38, 26, 4, 93, '9.1'),
(603, 38, 26, 4, 94, '8.9'),
(604, 38, 26, 4, 95, '8.9'),
(605, 38, 26, 4, 96, '9.3'),
(606, 38, 26, 4, 97, '8.9'),
(607, 38, 26, 4, 98, '8.8'),
(608, 38, 26, 4, 100, '8.7'),
(609, 38, 26, 4, 99, '8.7'),
(610, 38, 26, 4, 101, '9.2'),
(611, 38, 26, 4, 102, '9.0'),
(612, 38, 26, 4, 103, '9.1'),
(613, 38, 26, 4, 104, '9.1'),
(614, 38, 26, 4, 105, '8.8'),
(615, 38, 26, 4, 106, '8.5'),
(616, 38, 25, 4, 69, '7.1'),
(617, 38, 25, 4, 70, '7.2'),
(618, 38, 25, 4, 71, '6.3'),
(619, 38, 25, 4, 74, '6.9'),
(620, 38, 25, 4, 72, '6.3'),
(621, 38, 25, 4, 73, '6.5'),
(622, 38, 25, 4, 75, '7.1'),
(623, 38, 25, 4, 76, '6.9'),
(624, 38, 25, 4, 77, '6.7'),
(625, 38, 25, 4, 78, '6.8'),
(626, 38, 25, 4, 79, '6.2'),
(627, 38, 25, 4, 81, '7.1'),
(628, 38, 25, 4, 80, '7.8'),
(629, 38, 25, 4, 82, '7.9'),
(630, 38, 25, 4, 83, '6.8'),
(631, 38, 25, 4, 84, '6.9'),
(632, 38, 25, 4, 85, '7.4'),
(633, 38, 25, 4, 86, '6.5'),
(634, 38, 25, 4, 87, '7.8'),
(635, 38, 25, 4, 88, '7.2'),
(636, 38, 25, 4, 89, '8'),
(637, 38, 25, 4, 90, '7.4'),
(638, 38, 25, 4, 91, '7.3'),
(639, 38, 25, 4, 92, '8'),
(640, 38, 25, 4, 93, '8.1'),
(641, 38, 25, 4, 94, '7.6'),
(642, 38, 25, 4, 95, '7.3'),
(643, 38, 25, 4, 96, '7.8'),
(644, 38, 25, 4, 97, '7.7'),
(645, 38, 25, 4, 98, '7.8'),
(646, 38, 25, 4, 99, '6.9'),
(647, 38, 25, 4, 100, '6.7'),
(648, 38, 25, 4, 101, '8.4'),
(649, 38, 25, 4, 102, '8.2'),
(650, 38, 25, 4, 103, '8.1'),
(651, 38, 25, 4, 104, '8.7'),
(652, 38, 25, 4, 105, '7.8'),
(653, 38, 25, 4, 106, '6.4'),
(654, 38, 24, 3, 70, '9'),
(655, 38, 24, 3, 69, '9'),
(656, 38, 24, 3, 71, '10'),
(657, 38, 24, 3, 74, '7'),
(658, 38, 24, 3, 75, '7'),
(659, 38, 24, 3, 72, '7'),
(660, 38, 24, 3, 76, '7'),
(661, 38, 24, 3, 73, '8'),
(662, 38, 24, 3, 77, '9'),
(663, 38, 24, 3, 78, '7'),
(664, 38, 24, 3, 79, '8'),
(665, 38, 24, 3, 81, '10'),
(666, 38, 24, 3, 82, '8'),
(667, 38, 24, 3, 80, '10'),
(668, 38, 24, 3, 83, '10'),
(669, 38, 24, 3, 84, '9'),
(670, 38, 24, 3, 85, '8'),
(671, 38, 24, 3, 86, '10'),
(672, 38, 24, 3, 87, '10'),
(673, 38, 24, 3, 88, '9'),
(674, 38, 24, 3, 89, '9'),
(675, 38, 24, 3, 90, '10'),
(676, 38, 24, 3, 91, '9'),
(677, 38, 24, 3, 92, '8'),
(678, 38, 24, 3, 93, '7'),
(679, 38, 24, 3, 94, '7'),
(680, 38, 24, 3, 95, '7'),
(681, 38, 24, 3, 97, '9'),
(682, 38, 24, 3, 96, '7'),
(683, 38, 24, 3, 98, '9'),
(684, 38, 24, 3, 99, '9'),
(685, 38, 24, 3, 100, '8'),
(686, 38, 24, 3, 101, '7'),
(687, 38, 24, 3, 102, '8'),
(688, 38, 24, 3, 103, '8'),
(689, 38, 24, 3, 104, '8'),
(690, 38, 24, 3, 105, '7'),
(691, 38, 24, 3, 106, '7'),
(692, 38, 26, 3, 69, '8.5'),
(693, 38, 26, 3, 70, '8.7'),
(694, 38, 26, 3, 71, '9.0'),
(695, 38, 26, 3, 73, '8.5'),
(696, 38, 26, 3, 74, '8.2'),
(697, 38, 26, 3, 72, '8.9'),
(698, 38, 26, 3, 75, '8.9'),
(699, 38, 26, 3, 76, '8.7'),
(700, 38, 26, 3, 77, '9.0'),
(701, 38, 26, 3, 79, '8.5'),
(702, 38, 26, 3, 78, '9.0'),
(703, 38, 26, 3, 80, '9.1'),
(704, 38, 26, 3, 81, '9.0'),
(705, 38, 26, 3, 82, '9.6'),
(706, 38, 26, 3, 83, '8.3'),
(707, 38, 26, 3, 84, '8.2'),
(708, 38, 26, 3, 85, '8.5'),
(709, 38, 26, 3, 86, '9.0'),
(710, 38, 26, 3, 87, '9.7'),
(711, 38, 26, 3, 88, '8.5'),
(712, 38, 26, 3, 89, '9.0'),
(713, 38, 26, 3, 90, '9.5'),
(714, 38, 26, 3, 91, '8.9'),
(715, 38, 26, 3, 92, '8.3'),
(716, 38, 26, 3, 93, '8.3'),
(717, 38, 26, 3, 94, '8.3'),
(718, 38, 26, 3, 95, '7.5'),
(719, 38, 26, 3, 96, '8.3'),
(720, 38, 26, 3, 97, '8.5'),
(721, 38, 26, 3, 98, '9.8'),
(722, 38, 26, 3, 99, '8.7'),
(723, 38, 26, 3, 100, '8.0'),
(724, 38, 26, 3, 101, '8.3'),
(725, 38, 26, 3, 102, '8.5'),
(726, 38, 26, 3, 103, '8.3'),
(727, 38, 26, 3, 104, '9.7'),
(728, 38, 26, 3, 105, '8.3'),
(729, 38, 26, 3, 106, '8.3'),
(730, 38, 25, 3, 69, '7.4'),
(731, 38, 25, 3, 70, '8.2'),
(732, 38, 25, 3, 73, '8.5'),
(733, 38, 25, 3, 72, '7.8'),
(734, 38, 25, 3, 71, '9.5'),
(735, 38, 25, 3, 74, '7'),
(736, 38, 25, 3, 75, '7.9'),
(737, 38, 25, 3, 76, '8.1'),
(738, 38, 25, 3, 77, '7.3'),
(739, 38, 25, 3, 78, '8.9'),
(740, 38, 25, 3, 80, '9.6'),
(741, 38, 25, 3, 79, '7.1'),
(742, 38, 25, 3, 81, '9.3'),
(743, 38, 25, 3, 82, '9.5'),
(744, 38, 25, 3, 83, '8.8'),
(745, 38, 25, 3, 84, '8.9'),
(746, 38, 25, 3, 85, '7.5'),
(747, 38, 25, 3, 86, '9.6'),
(748, 38, 25, 3, 87, '10'),
(749, 38, 25, 3, 88, '8.3'),
(750, 38, 25, 3, 89, '8.8'),
(751, 38, 25, 3, 90, '9.6'),
(752, 38, 25, 3, 91, '8.4'),
(753, 38, 25, 3, 92, '8'),
(754, 38, 25, 3, 93, '8.5'),
(755, 38, 25, 3, 94, '8.3'),
(756, 38, 25, 3, 95, '7'),
(757, 38, 25, 3, 96, '8.1'),
(758, 38, 25, 3, 97, '8.9'),
(759, 38, 25, 3, 98, '9'),
(760, 38, 25, 3, 99, '8.5'),
(761, 38, 25, 3, 100, '6.5'),
(762, 38, 25, 3, 101, '8.4'),
(763, 38, 25, 3, 102, '7.5'),
(764, 38, 25, 3, 103, '7.9'),
(765, 38, 25, 3, 104, '9.3'),
(766, 38, 25, 3, 105, '8.3'),
(767, 38, 25, 3, 106, '7.7'),
(768, 38, 24, 6, 69, '8'),
(769, 38, 24, 6, 70, '10'),
(770, 38, 24, 6, 72, '7'),
(771, 38, 24, 6, 71, '8'),
(772, 38, 24, 6, 74, '8'),
(773, 38, 24, 6, 73, '7'),
(774, 38, 24, 6, 75, '7'),
(775, 38, 24, 6, 76, '8'),
(776, 38, 24, 6, 77, '8'),
(777, 38, 24, 6, 78, '10'),
(778, 38, 24, 6, 79, '7'),
(779, 38, 24, 6, 80, '8'),
(780, 38, 24, 6, 81, '8'),
(781, 38, 24, 6, 82, '8'),
(782, 38, 24, 6, 83, '10'),
(783, 38, 24, 6, 84, '8'),
(784, 38, 24, 6, 85, '9'),
(785, 38, 24, 6, 86, '8'),
(786, 38, 24, 6, 87, '10'),
(787, 38, 24, 6, 88, '9'),
(788, 38, 24, 6, 89, '10'),
(789, 38, 24, 6, 90, '7'),
(790, 38, 24, 6, 91, '8'),
(791, 38, 24, 6, 92, '10'),
(792, 38, 24, 6, 93, '8'),
(793, 38, 24, 6, 94, '8'),
(794, 38, 24, 6, 95, '8'),
(795, 38, 24, 6, 96, '9'),
(796, 38, 24, 6, 97, '8'),
(797, 38, 24, 6, 98, '8'),
(798, 38, 24, 6, 99, '9'),
(799, 38, 24, 6, 100, '7'),
(800, 38, 24, 6, 101, '9'),
(801, 38, 24, 6, 102, '7'),
(802, 38, 24, 6, 103, '8'),
(803, 38, 24, 6, 104, '9'),
(804, 38, 24, 6, 105, '8'),
(805, 38, 24, 6, 106, '8'),
(806, 38, 26, 6, 69, '9.0'),
(807, 38, 26, 6, 70, '9.1'),
(808, 38, 26, 6, 71, '8.9'),
(809, 38, 26, 6, 73, '8.5'),
(810, 38, 26, 6, 74, '9.0'),
(811, 38, 26, 6, 72, '8.7'),
(812, 38, 26, 6, 75, '9.3'),
(813, 38, 26, 6, 76, '9.0'),
(814, 38, 26, 6, 78, '9.4'),
(815, 38, 26, 6, 77, '9.0'),
(816, 38, 26, 6, 79, '8.7'),
(817, 38, 26, 6, 80, '8.9'),
(818, 38, 26, 6, 81, '8.7'),
(819, 38, 26, 6, 82, '9.2'),
(820, 38, 26, 6, 83, '9.8'),
(821, 38, 26, 6, 84, '9.9'),
(822, 38, 26, 6, 85, '9.2'),
(823, 38, 26, 6, 86, '8.7'),
(824, 38, 26, 6, 87, '9.0'),
(825, 38, 26, 6, 89, '9.1'),
(826, 38, 26, 6, 88, '8.9'),
(827, 38, 26, 6, 90, '8.4'),
(828, 38, 26, 6, 91, '8.5'),
(829, 38, 26, 6, 92, '8.5'),
(830, 38, 26, 6, 93, '8.7'),
(831, 38, 26, 6, 94, '8.9'),
(832, 38, 26, 6, 95, '8.5'),
(833, 38, 26, 6, 96, '9.5'),
(834, 38, 26, 6, 97, '8.9'),
(835, 38, 26, 6, 98, '8.5'),
(836, 38, 26, 6, 99, '8.4'),
(837, 38, 26, 6, 100, '8.3'),
(838, 38, 26, 6, 101, '8.5'),
(839, 38, 26, 6, 102, '9.0'),
(840, 38, 26, 6, 103, '8.5'),
(841, 38, 26, 6, 104, '9.0'),
(842, 38, 26, 6, 105, '8.5'),
(843, 38, 26, 6, 106, '8.0'),
(844, 38, 25, 6, 69, '8.2'),
(845, 38, 25, 6, 71, '7.5'),
(846, 38, 25, 6, 70, '8.8'),
(847, 38, 25, 6, 72, '8.3'),
(848, 38, 25, 6, 73, '7.9'),
(849, 38, 25, 6, 74, '8.1'),
(850, 38, 25, 6, 75, '8.2'),
(851, 38, 25, 6, 76, '7.8'),
(852, 38, 25, 6, 77, '8.2'),
(853, 38, 25, 6, 78, '9.2'),
(854, 38, 25, 6, 79, '7.7'),
(855, 38, 25, 6, 80, '9.6'),
(856, 38, 25, 6, 81, '7.6'),
(857, 38, 25, 6, 82, '8.5'),
(858, 38, 25, 6, 83, '9.7'),
(859, 38, 25, 6, 84, '10'),
(860, 38, 25, 6, 85, '8.8'),
(861, 38, 25, 6, 86, '9.2'),
(862, 38, 25, 6, 87, '8.9'),
(863, 38, 25, 6, 88, '8.6'),
(864, 38, 25, 6, 89, '9.4'),
(865, 38, 25, 6, 90, '7.9'),
(866, 38, 25, 6, 91, '8.5'),
(867, 38, 25, 6, 92, '9.2'),
(868, 38, 25, 6, 93, '8.9'),
(869, 38, 25, 6, 94, '8.3'),
(870, 38, 25, 6, 95, '7.8'),
(871, 38, 25, 6, 96, '9'),
(872, 38, 25, 6, 97, '8.7'),
(873, 38, 25, 6, 98, '8.9'),
(874, 38, 25, 6, 99, '9'),
(875, 38, 25, 6, 100, '7.7'),
(876, 38, 25, 6, 101, '9.8'),
(877, 38, 25, 6, 102, '8.9'),
(878, 38, 25, 6, 103, '8.2'),
(879, 38, 25, 6, 104, '9.8'),
(880, 38, 25, 6, 105, '8.7'),
(881, 38, 25, 6, 106, '7.9'),
(920, 38, 30, 58, 69, '6.3'),
(921, 38, 30, 58, 70, '6.5'),
(922, 38, 30, 58, 71, '6.5'),
(923, 38, 30, 58, 72, '6.6'),
(924, 38, 30, 58, 73, '6.6'),
(925, 38, 30, 58, 74, '7'),
(926, 38, 30, 58, 75, '8'),
(927, 38, 30, 58, 76, '8.3'),
(928, 38, 30, 58, 77, '6.4'),
(929, 38, 30, 58, 78, '7.3'),
(930, 38, 30, 58, 79, '6'),
(931, 38, 30, 58, 80, '6'),
(932, 38, 30, 58, 81, '6.1'),
(933, 38, 30, 58, 82, '7'),
(934, 38, 30, 58, 83, '8.4'),
(935, 38, 30, 58, 84, '9.1'),
(936, 38, 30, 58, 85, '9'),
(937, 38, 30, 58, 86, '6.7'),
(938, 38, 30, 58, 87, '7.3'),
(939, 38, 30, 58, 88, '6.2'),
(940, 38, 30, 58, 89, '6.1'),
(941, 38, 30, 58, 90, '6'),
(942, 38, 30, 58, 91, '6'),
(943, 38, 30, 58, 92, '7.1'),
(944, 38, 30, 58, 93, '8'),
(945, 38, 30, 58, 94, '6'),
(946, 38, 30, 58, 95, '8'),
(947, 38, 30, 58, 96, '8.5'),
(948, 38, 30, 58, 97, '7'),
(949, 38, 30, 58, 98, '6.9'),
(950, 38, 30, 58, 99, '1'),
(951, 38, 30, 58, 100, '6'),
(952, 38, 30, 58, 101, '8.9'),
(953, 38, 30, 58, 102, '6.7'),
(954, 38, 30, 58, 103, '8.3'),
(955, 38, 30, 58, 104, '8.9'),
(956, 38, 30, 58, 105, '7'),
(957, 38, 30, 58, 106, '6'),
(958, 38, 31, 58, 69, '7.1'),
(959, 38, 31, 58, 70, '9.3'),
(960, 38, 31, 58, 71, '7.7'),
(961, 38, 31, 58, 72, '6.9'),
(962, 38, 31, 58, 73, '6.7'),
(963, 38, 31, 58, 74, '7.4'),
(964, 38, 31, 58, 75, '9.2'),
(965, 38, 31, 58, 76, '9.4'),
(966, 38, 31, 58, 77, '7'),
(967, 38, 31, 58, 78, '7.3'),
(968, 38, 31, 58, 79, '8.1'),
(969, 38, 31, 58, 80, '8.5'),
(970, 38, 31, 58, 81, '8.5'),
(971, 38, 31, 58, 82, '9.3'),
(972, 38, 31, 58, 83, '9.5'),
(973, 38, 31, 58, 84, '7.6'),
(974, 38, 31, 58, 85, '7.8'),
(975, 38, 31, 58, 86, '6.8'),
(976, 38, 31, 58, 87, '8.9'),
(977, 38, 31, 58, 88, '7.8'),
(978, 38, 31, 58, 89, '8.3'),
(979, 38, 31, 58, 90, '6.8'),
(980, 38, 31, 58, 91, '9.3'),
(981, 38, 31, 58, 92, '6.9'),
(982, 38, 31, 58, 93, '7.7'),
(983, 38, 31, 58, 94, '6.8'),
(984, 38, 31, 58, 95, '7.5'),
(985, 38, 31, 58, 96, '9.2'),
(986, 38, 31, 58, 97, '8.7'),
(987, 38, 31, 58, 98, '8.3'),
(988, 38, 31, 58, 99, '1'),
(989, 38, 31, 58, 100, '6.5'),
(990, 38, 31, 58, 101, '9'),
(991, 38, 31, 58, 102, '7.9'),
(992, 38, 31, 58, 103, '8.7'),
(993, 38, 31, 58, 104, '8.2'),
(994, 38, 31, 58, 105, '7.3'),
(995, 38, 31, 58, 106, '6.1'),
(996, 38, 24, 7, 69, '10'),
(997, 38, 24, 7, 70, '8'),
(998, 38, 24, 7, 71, '8'),
(999, 38, 24, 7, 73, '6'),
(1000, 38, 24, 7, 72, '6'),
(1001, 38, 24, 7, 74, '9'),
(1002, 38, 24, 7, 75, '7'),
(1003, 38, 24, 7, 76, '9'),
(1004, 38, 24, 7, 77, '9'),
(1005, 38, 24, 7, 78, '10'),
(1006, 38, 24, 7, 79, '8'),
(1007, 38, 24, 7, 80, '8'),
(1008, 38, 24, 7, 81, '8'),
(1009, 38, 24, 7, 82, '8'),
(1010, 38, 24, 7, 83, '10'),
(1011, 38, 24, 7, 84, '9'),
(1012, 38, 24, 7, 85, '10'),
(1013, 38, 24, 7, 86, '8'),
(1014, 38, 24, 7, 87, '10'),
(1015, 38, 24, 7, 88, '8'),
(1016, 38, 24, 7, 89, '9'),
(1017, 38, 24, 7, 90, '8'),
(1018, 38, 24, 7, 91, '9'),
(1019, 38, 24, 7, 92, '9'),
(1020, 38, 24, 7, 93, '7'),
(1021, 38, 24, 7, 94, '7'),
(1022, 38, 24, 7, 95, '9'),
(1023, 38, 24, 7, 96, '10'),
(1024, 38, 24, 7, 97, '10'),
(1025, 38, 24, 7, 98, '7'),
(1026, 38, 24, 7, 99, '8'),
(1027, 38, 24, 7, 100, '6'),
(1028, 38, 24, 7, 101, '10'),
(1029, 38, 24, 7, 102, '8'),
(1030, 38, 24, 7, 103, '8'),
(1031, 38, 24, 7, 104, '9'),
(1032, 38, 24, 7, 105, '8'),
(1033, 38, 24, 7, 106, '10'),
(1034, 38, 26, 7, 69, '9.2'),
(1035, 38, 26, 7, 72, '9.0'),
(1036, 38, 26, 7, 71, '9.2'),
(1037, 38, 26, 7, 70, '9.5'),
(1038, 38, 26, 7, 73, '8.9'),
(1039, 38, 26, 7, 74, '9.2'),
(1040, 38, 26, 7, 75, '9.2'),
(1041, 38, 26, 7, 76, '9.7'),
(1042, 38, 26, 7, 77, '9.2'),
(1043, 38, 26, 7, 78, '9.5'),
(1044, 38, 26, 7, 79, '9.1'),
(1045, 38, 26, 7, 80, '9.0'),
(1046, 38, 26, 7, 81, '9.3'),
(1047, 38, 26, 7, 82, '9.5'),
(1048, 38, 26, 7, 83, '9.7'),
(1049, 38, 26, 7, 84, '9.5'),
(1050, 38, 26, 7, 85, '9.7'),
(1051, 38, 26, 7, 86, '9.3'),
(1052, 38, 26, 7, 87, '9.5'),
(1053, 38, 26, 7, 88, '9.2'),
(1054, 38, 26, 7, 89, '9.0'),
(1055, 38, 26, 7, 90, '9.0'),
(1056, 38, 26, 7, 91, '9.0'),
(1057, 38, 26, 7, 92, '9.0'),
(1058, 38, 26, 7, 93, '9.1'),
(1059, 38, 26, 7, 94, '9.0'),
(1060, 38, 26, 7, 95, '9.0'),
(1061, 38, 26, 7, 96, '9.5'),
(1062, 38, 26, 7, 97, '9.7'),
(1063, 38, 26, 7, 98, '9.0'),
(1064, 38, 26, 7, 99, '9.0'),
(1065, 38, 26, 7, 100, '9.0'),
(1066, 38, 26, 7, 101, '10.0'),
(1067, 38, 26, 7, 102, '9.0'),
(1068, 38, 26, 7, 103, '9.2'),
(1069, 38, 26, 7, 104, '9.7'),
(1070, 38, 26, 7, 105, '9.3'),
(1071, 38, 26, 7, 106, '9.2'),
(1072, 38, 25, 7, 69, '8'),
(1073, 38, 25, 7, 70, '8.4'),
(1074, 38, 25, 7, 71, '8'),
(1075, 38, 25, 7, 72, '8'),
(1076, 38, 25, 7, 73, '8'),
(1077, 38, 25, 7, 74, '8.4'),
(1078, 38, 25, 7, 75, '8'),
(1079, 38, 25, 7, 76, '8.6'),
(1080, 38, 25, 7, 77, '8.7'),
(1081, 38, 25, 7, 78, '9.1'),
(1082, 38, 25, 7, 79, '8'),
(1083, 38, 25, 7, 80, '8'),
(1084, 38, 25, 7, 81, '8.6'),
(1085, 38, 25, 7, 82, '9.2'),
(1086, 38, 25, 7, 83, '9.3'),
(1087, 38, 25, 7, 84, '8.8'),
(1088, 38, 25, 7, 85, '9.3'),
(1089, 38, 25, 7, 86, '8.8'),
(1090, 38, 25, 7, 87, '9.5'),
(1091, 38, 25, 7, 88, '9'),
(1092, 38, 25, 7, 89, '9.4'),
(1093, 38, 25, 7, 90, '8.3'),
(1094, 38, 25, 7, 91, '8.4'),
(1095, 38, 25, 7, 92, '8.3'),
(1096, 38, 25, 7, 93, '8.2'),
(1097, 38, 25, 7, 94, '8.4'),
(1098, 38, 25, 7, 95, '8'),
(1099, 38, 25, 7, 96, '9.5'),
(1100, 38, 25, 7, 97, '9.1'),
(1101, 38, 25, 7, 98, '8'),
(1102, 38, 25, 7, 99, '8.5'),
(1103, 38, 25, 7, 100, '8'),
(1104, 38, 25, 7, 101, '10'),
(1105, 38, 25, 7, 102, '8'),
(1106, 38, 25, 7, 103, '8.4'),
(1107, 38, 25, 7, 104, '8.7'),
(1108, 38, 25, 7, 105, '8.8'),
(1109, 38, 25, 7, 106, '8.7');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;

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
