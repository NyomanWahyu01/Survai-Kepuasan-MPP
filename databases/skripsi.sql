-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2025 at 11:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin', 'Admin123!');

-- --------------------------------------------------------

--
-- Table structure for table `data_instansi`
--

CREATE TABLE `data_instansi` (
  `id_instansi` int NOT NULL,
  `nama_instansi` text NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_instansi`
--

INSERT INTO `data_instansi` (`id_instansi`, `nama_instansi`, `id_admin`) VALUES
(1, 'DPMPTSP', 1),
(2, 'DISDUKCAPIL', 1),
(4, 'DINSOS', 1),
(5, 'BAPENDA', 1),
(6, 'Polres Pangkep', 1),
(8, 'SAMSAT', 1),
(9, 'ATR/BPN', 1),
(10, 'BPJS Kesehatan', 1),
(11, 'BPJS Ketenagakerjaan', 1),
(13, 'PTSP Kemenag', 1),
(15, 'PDAM', 1),
(16, 'PT. TASPEN', 1),
(17, 'UKPBJ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_jawaban`
--

CREATE TABLE `data_jawaban` (
  `id_jawaban` int NOT NULL,
  `id_responden` int NOT NULL,
  `id_pertanyaan` int NOT NULL,
  `point_jawaban` int NOT NULL,
  `status` enum('mulai','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jawaban`
--

INSERT INTO `data_jawaban` (`id_jawaban`, `id_responden`, `id_pertanyaan`, `point_jawaban`, `status`) VALUES
(127, 19, 1, 4, 'selesai'),
(128, 19, 2, 4, 'selesai'),
(129, 19, 4, 4, 'selesai'),
(130, 19, 5, 4, 'selesai'),
(131, 19, 6, 4, 'selesai'),
(132, 19, 7, 3, 'selesai'),
(133, 19, 8, 3, 'selesai'),
(134, 19, 9, 3, 'selesai'),
(135, 19, 10, 4, 'selesai'),
(145, 20, 1, 3, 'selesai'),
(146, 20, 2, 4, 'selesai'),
(147, 20, 4, 3, 'selesai'),
(148, 20, 5, 4, 'selesai'),
(149, 20, 6, 3, 'selesai'),
(150, 20, 7, 4, 'selesai'),
(151, 20, 8, 3, 'selesai'),
(152, 20, 9, 4, 'selesai'),
(153, 20, 10, 3, 'selesai'),
(163, 21, 1, 3, 'selesai'),
(164, 21, 2, 3, 'selesai'),
(165, 21, 4, 3, 'selesai'),
(166, 21, 5, 4, 'selesai'),
(167, 21, 6, 4, 'selesai'),
(168, 21, 7, 3, 'selesai'),
(169, 21, 8, 3, 'selesai'),
(170, 21, 9, 3, 'selesai'),
(171, 21, 10, 4, 'selesai'),
(181, 22, 1, 4, 'selesai'),
(182, 22, 2, 4, 'selesai'),
(183, 22, 4, 4, 'selesai'),
(184, 22, 5, 4, 'selesai'),
(185, 22, 6, 4, 'selesai'),
(186, 22, 7, 4, 'selesai'),
(187, 22, 8, 4, 'selesai'),
(188, 22, 9, 4, 'selesai'),
(189, 22, 10, 4, 'selesai'),
(199, 23, 1, 4, 'selesai'),
(200, 23, 2, 4, 'selesai'),
(201, 23, 4, 4, 'selesai'),
(202, 23, 5, 4, 'selesai'),
(203, 23, 6, 4, 'selesai'),
(204, 23, 7, 4, 'selesai'),
(205, 23, 8, 4, 'selesai'),
(206, 23, 9, 4, 'selesai'),
(207, 23, 10, 4, 'selesai'),
(217, 24, 1, 4, 'selesai'),
(218, 24, 2, 4, 'selesai'),
(219, 24, 4, 4, 'selesai'),
(220, 24, 5, 4, 'selesai'),
(221, 24, 6, 4, 'selesai'),
(222, 24, 7, 4, 'selesai'),
(223, 24, 8, 4, 'selesai'),
(224, 24, 9, 4, 'selesai'),
(225, 24, 10, 4, 'selesai'),
(235, 25, 1, 4, 'selesai'),
(236, 25, 2, 4, 'selesai'),
(237, 25, 4, 4, 'selesai'),
(238, 25, 5, 4, 'selesai'),
(239, 25, 6, 4, 'selesai'),
(240, 25, 7, 4, 'selesai'),
(241, 25, 8, 4, 'selesai'),
(242, 25, 9, 4, 'selesai'),
(243, 25, 10, 4, 'selesai'),
(253, 26, 1, 4, 'selesai'),
(254, 26, 2, 4, 'selesai'),
(255, 26, 4, 4, 'selesai'),
(256, 26, 5, 4, 'selesai'),
(257, 26, 6, 4, 'selesai'),
(258, 26, 7, 4, 'selesai'),
(259, 26, 8, 4, 'selesai'),
(260, 26, 9, 4, 'selesai'),
(261, 26, 10, 4, 'selesai'),
(271, 27, 1, 4, 'selesai'),
(272, 27, 2, 4, 'selesai'),
(273, 27, 4, 4, 'selesai'),
(274, 27, 5, 4, 'selesai'),
(275, 27, 6, 4, 'selesai'),
(276, 27, 7, 4, 'selesai'),
(277, 27, 8, 4, 'selesai'),
(278, 27, 9, 4, 'selesai'),
(279, 27, 10, 4, 'selesai'),
(289, 28, 1, 4, 'selesai'),
(290, 28, 2, 4, 'selesai'),
(291, 28, 4, 4, 'selesai'),
(292, 28, 5, 4, 'selesai'),
(293, 28, 6, 4, 'selesai'),
(294, 28, 7, 4, 'selesai'),
(295, 28, 8, 4, 'selesai'),
(296, 28, 9, 4, 'selesai'),
(297, 28, 10, 4, 'selesai'),
(307, 29, 1, 4, 'selesai'),
(308, 29, 2, 4, 'selesai'),
(309, 29, 4, 3, 'selesai'),
(310, 29, 5, 3, 'selesai'),
(311, 29, 6, 4, 'selesai'),
(312, 29, 7, 3, 'selesai'),
(313, 29, 8, 4, 'selesai'),
(314, 29, 9, 4, 'selesai'),
(315, 29, 10, 4, 'selesai'),
(325, 30, 1, 4, 'selesai'),
(326, 30, 2, 4, 'selesai'),
(327, 30, 4, 4, 'selesai'),
(328, 30, 5, 4, 'selesai'),
(329, 30, 6, 3, 'selesai'),
(330, 30, 7, 4, 'selesai'),
(331, 30, 8, 4, 'selesai'),
(332, 30, 9, 4, 'selesai'),
(333, 30, 10, 3, 'selesai'),
(341, 30, 1, 4, 'selesai'),
(342, 30, 2, 4, 'selesai'),
(343, 30, 4, 4, 'selesai'),
(344, 30, 5, 4, 'selesai'),
(345, 30, 6, 4, 'selesai'),
(346, 30, 7, 4, 'selesai'),
(347, 30, 8, 4, 'selesai'),
(348, 30, 9, 4, 'selesai'),
(349, 30, 10, 4, 'selesai'),
(359, 31, 1, 4, 'selesai'),
(360, 31, 2, 4, 'selesai'),
(361, 31, 4, 3, 'selesai'),
(362, 31, 5, 4, 'selesai'),
(363, 31, 6, 4, 'selesai'),
(364, 31, 7, 3, 'selesai'),
(365, 31, 8, 3, 'selesai'),
(366, 31, 9, 4, 'selesai'),
(367, 31, 10, 4, 'selesai'),
(377, 32, 1, 4, 'selesai'),
(378, 32, 2, 4, 'selesai'),
(379, 32, 4, 4, 'selesai'),
(380, 32, 5, 3, 'selesai'),
(381, 32, 6, 4, 'selesai'),
(382, 32, 7, 4, 'selesai'),
(383, 32, 8, 3, 'selesai'),
(384, 32, 9, 4, 'selesai'),
(385, 32, 10, 3, 'selesai'),
(395, 33, 1, 4, 'selesai'),
(396, 33, 2, 4, 'selesai'),
(397, 33, 4, 4, 'selesai'),
(398, 33, 5, 4, 'selesai'),
(399, 33, 6, 4, 'selesai'),
(400, 33, 7, 4, 'selesai'),
(401, 33, 8, 4, 'selesai'),
(402, 33, 9, 4, 'selesai'),
(403, 33, 10, 3, 'selesai'),
(413, 34, 1, 4, 'selesai'),
(414, 34, 2, 4, 'selesai'),
(415, 34, 4, 4, 'selesai'),
(416, 34, 5, 4, 'selesai'),
(417, 34, 6, 4, 'selesai'),
(418, 34, 7, 4, 'selesai'),
(419, 34, 8, 4, 'selesai'),
(420, 34, 9, 4, 'selesai'),
(421, 34, 10, 4, 'selesai'),
(431, 35, 1, 4, 'selesai'),
(432, 35, 2, 4, 'selesai'),
(433, 35, 4, 3, 'selesai'),
(434, 35, 5, 4, 'selesai'),
(435, 35, 6, 4, 'selesai'),
(436, 35, 7, 4, 'selesai'),
(437, 35, 8, 4, 'selesai'),
(438, 35, 9, 4, 'selesai'),
(439, 35, 10, 3, 'selesai'),
(449, 36, 1, 4, 'selesai'),
(450, 36, 2, 4, 'selesai'),
(451, 36, 4, 4, 'selesai'),
(452, 36, 5, 4, 'selesai'),
(453, 36, 6, 4, 'selesai'),
(454, 36, 7, 4, 'selesai'),
(455, 36, 8, 3, 'selesai'),
(456, 36, 9, 3, 'selesai'),
(457, 36, 10, 4, 'selesai'),
(467, 37, 1, 4, 'selesai'),
(468, 37, 2, 3, 'selesai'),
(469, 37, 4, 3, 'selesai'),
(470, 37, 5, 4, 'selesai'),
(471, 37, 6, 3, 'selesai'),
(472, 37, 7, 3, 'selesai'),
(473, 37, 8, 4, 'selesai'),
(474, 37, 9, 4, 'selesai'),
(475, 37, 10, 4, 'selesai'),
(485, 38, 1, 4, 'selesai'),
(486, 38, 2, 4, 'selesai'),
(487, 38, 4, 4, 'selesai'),
(488, 38, 5, 4, 'selesai'),
(489, 38, 6, 3, 'selesai'),
(490, 38, 7, 3, 'selesai'),
(491, 38, 8, 4, 'selesai'),
(492, 38, 9, 3, 'selesai'),
(493, 38, 10, 3, 'selesai'),
(503, 39, 1, 4, 'selesai'),
(504, 39, 2, 4, 'selesai'),
(505, 39, 4, 4, 'selesai'),
(506, 39, 5, 4, 'selesai'),
(507, 39, 6, 4, 'selesai'),
(508, 39, 7, 4, 'selesai'),
(509, 39, 8, 4, 'selesai'),
(510, 39, 9, 4, 'selesai'),
(511, 39, 10, 4, 'selesai'),
(521, 40, 1, 4, 'selesai'),
(522, 40, 2, 4, 'selesai'),
(523, 40, 4, 4, 'selesai'),
(524, 40, 5, 4, 'selesai'),
(525, 40, 6, 3, 'selesai'),
(526, 40, 7, 3, 'selesai'),
(527, 40, 8, 3, 'selesai'),
(528, 40, 9, 4, 'selesai'),
(529, 40, 10, 4, 'selesai'),
(539, 41, 1, 4, 'selesai'),
(540, 41, 2, 4, 'selesai'),
(541, 41, 4, 4, 'selesai'),
(542, 41, 5, 3, 'selesai'),
(543, 41, 6, 4, 'selesai'),
(544, 41, 7, 4, 'selesai'),
(545, 41, 8, 4, 'selesai'),
(546, 41, 9, 4, 'selesai'),
(547, 41, 10, 3, 'selesai'),
(557, 42, 1, 3, 'selesai'),
(558, 42, 2, 3, 'selesai'),
(559, 42, 4, 3, 'selesai'),
(560, 42, 5, 3, 'selesai'),
(561, 42, 6, 4, 'selesai'),
(562, 42, 7, 4, 'selesai'),
(563, 42, 8, 4, 'selesai'),
(564, 42, 9, 4, 'selesai'),
(565, 42, 10, 3, 'selesai'),
(575, 43, 1, 4, 'selesai'),
(576, 43, 2, 4, 'selesai'),
(577, 43, 4, 4, 'selesai'),
(578, 43, 5, 4, 'selesai'),
(579, 43, 6, 4, 'selesai'),
(580, 43, 7, 4, 'selesai'),
(581, 43, 8, 4, 'selesai'),
(582, 43, 9, 4, 'selesai'),
(583, 43, 10, 3, 'selesai'),
(593, 44, 1, 4, 'selesai'),
(594, 44, 2, 4, 'selesai'),
(595, 44, 4, 4, 'selesai'),
(596, 44, 5, 4, 'selesai'),
(597, 44, 6, 4, 'selesai'),
(598, 44, 7, 3, 'selesai'),
(599, 44, 8, 3, 'selesai'),
(600, 44, 9, 4, 'selesai'),
(601, 44, 10, 3, 'selesai'),
(611, 45, 1, 4, 'selesai'),
(612, 45, 2, 3, 'selesai'),
(613, 45, 4, 4, 'selesai'),
(614, 45, 5, 4, 'selesai'),
(615, 45, 6, 4, 'selesai'),
(616, 45, 7, 3, 'selesai'),
(617, 45, 8, 4, 'selesai'),
(618, 45, 9, 3, 'selesai'),
(619, 45, 10, 4, 'selesai'),
(629, 46, 1, 4, 'selesai'),
(630, 46, 2, 4, 'selesai'),
(631, 46, 4, 4, 'selesai'),
(632, 46, 5, 4, 'selesai'),
(633, 46, 6, 4, 'selesai'),
(634, 46, 7, 3, 'selesai'),
(635, 46, 8, 4, 'selesai'),
(636, 46, 9, 4, 'selesai'),
(637, 46, 10, 4, 'selesai'),
(647, 47, 1, 3, 'selesai'),
(648, 47, 2, 3, 'selesai'),
(649, 47, 4, 3, 'selesai'),
(650, 47, 5, 3, 'selesai'),
(651, 47, 6, 3, 'selesai'),
(652, 47, 7, 3, 'selesai'),
(653, 47, 8, 3, 'selesai'),
(654, 47, 9, 3, 'selesai'),
(655, 47, 10, 3, 'selesai'),
(665, 48, 1, 4, 'selesai'),
(666, 48, 2, 4, 'selesai'),
(667, 48, 4, 4, 'selesai'),
(668, 48, 5, 4, 'selesai'),
(669, 48, 6, 4, 'selesai'),
(670, 48, 7, 4, 'selesai'),
(671, 48, 8, 4, 'selesai'),
(672, 48, 9, 4, 'selesai'),
(673, 48, 10, 4, 'selesai'),
(683, 49, 1, 4, 'selesai'),
(684, 49, 2, 4, 'selesai'),
(685, 49, 4, 4, 'selesai'),
(686, 49, 5, 4, 'selesai'),
(687, 49, 6, 4, 'selesai'),
(688, 49, 7, 3, 'selesai'),
(689, 49, 8, 3, 'selesai'),
(690, 49, 9, 3, 'selesai'),
(691, 49, 10, 4, 'selesai'),
(701, 50, 1, 4, 'selesai'),
(702, 50, 2, 4, 'selesai'),
(703, 50, 4, 3, 'selesai'),
(704, 50, 5, 3, 'selesai'),
(705, 50, 6, 3, 'selesai'),
(706, 50, 7, 3, 'selesai'),
(707, 50, 8, 4, 'selesai'),
(708, 50, 9, 4, 'selesai'),
(709, 50, 10, 4, 'selesai'),
(719, 51, 1, 4, 'selesai'),
(720, 51, 2, 4, 'selesai'),
(721, 51, 4, 4, 'selesai'),
(722, 51, 5, 4, 'selesai'),
(723, 51, 6, 4, 'selesai'),
(724, 51, 7, 4, 'selesai'),
(725, 51, 8, 4, 'selesai'),
(726, 51, 9, 4, 'selesai'),
(727, 51, 10, 3, 'selesai'),
(737, 52, 1, 4, 'selesai'),
(738, 52, 2, 4, 'selesai'),
(739, 52, 4, 4, 'selesai'),
(740, 52, 5, 3, 'selesai'),
(741, 52, 6, 3, 'selesai'),
(742, 52, 7, 4, 'selesai'),
(743, 52, 8, 4, 'selesai'),
(744, 52, 9, 4, 'selesai'),
(745, 52, 10, 3, 'selesai'),
(755, 53, 1, 3, 'selesai'),
(756, 53, 2, 3, 'selesai'),
(757, 53, 4, 3, 'selesai'),
(758, 53, 5, 4, 'selesai'),
(759, 53, 6, 3, 'selesai'),
(760, 53, 7, 3, 'selesai'),
(761, 53, 8, 3, 'selesai'),
(762, 53, 9, 4, 'selesai'),
(763, 53, 10, 4, 'selesai'),
(773, 54, 1, 4, 'selesai'),
(774, 54, 2, 3, 'selesai'),
(775, 54, 4, 4, 'selesai'),
(776, 54, 5, 4, 'selesai'),
(777, 54, 6, 4, 'selesai'),
(778, 54, 7, 4, 'selesai'),
(779, 54, 8, 4, 'selesai'),
(780, 54, 9, 4, 'selesai'),
(781, 54, 10, 4, 'selesai'),
(791, 55, 1, 4, 'selesai'),
(792, 55, 2, 4, 'selesai'),
(793, 55, 4, 4, 'selesai'),
(794, 55, 5, 3, 'selesai'),
(795, 55, 6, 3, 'selesai'),
(796, 55, 7, 3, 'selesai'),
(797, 55, 8, 4, 'selesai'),
(798, 55, 9, 4, 'selesai'),
(799, 55, 10, 3, 'selesai'),
(809, 56, 1, 4, 'selesai'),
(810, 56, 2, 4, 'selesai'),
(811, 56, 4, 3, 'selesai'),
(812, 56, 5, 3, 'selesai'),
(813, 56, 6, 4, 'selesai'),
(814, 56, 7, 4, 'selesai'),
(815, 56, 8, 3, 'selesai'),
(816, 56, 9, 4, 'selesai'),
(817, 56, 10, 3, 'selesai'),
(827, 57, 1, 4, 'selesai'),
(828, 57, 2, 4, 'selesai'),
(829, 57, 4, 4, 'selesai'),
(830, 57, 5, 4, 'selesai'),
(831, 57, 6, 4, 'selesai'),
(832, 57, 7, 4, 'selesai'),
(833, 57, 8, 4, 'selesai'),
(834, 57, 9, 4, 'selesai'),
(835, 57, 10, 4, 'selesai'),
(845, 58, 1, 4, 'selesai'),
(846, 58, 2, 4, 'selesai'),
(847, 58, 4, 4, 'selesai'),
(848, 58, 5, 4, 'selesai'),
(849, 58, 6, 4, 'selesai'),
(850, 58, 7, 4, 'selesai'),
(851, 58, 8, 4, 'selesai'),
(852, 58, 9, 4, 'selesai'),
(853, 58, 10, 4, 'selesai'),
(863, 59, 1, 4, 'selesai'),
(864, 59, 2, 4, 'selesai'),
(865, 59, 4, 4, 'selesai'),
(866, 59, 5, 4, 'selesai'),
(867, 59, 6, 4, 'selesai'),
(868, 59, 7, 4, 'selesai'),
(869, 59, 8, 4, 'selesai'),
(870, 59, 9, 4, 'selesai'),
(871, 59, 10, 4, 'selesai'),
(881, 60, 1, 4, 'selesai'),
(882, 60, 2, 4, 'selesai'),
(883, 60, 4, 4, 'selesai'),
(884, 60, 5, 3, 'selesai'),
(885, 60, 6, 3, 'selesai'),
(886, 60, 7, 3, 'selesai'),
(887, 60, 8, 3, 'selesai'),
(888, 60, 9, 4, 'selesai'),
(889, 60, 10, 4, 'selesai'),
(899, 61, 1, 4, 'selesai'),
(900, 61, 2, 4, 'selesai'),
(901, 61, 4, 4, 'selesai'),
(902, 61, 5, 4, 'selesai'),
(903, 61, 6, 3, 'selesai'),
(904, 61, 7, 4, 'selesai'),
(905, 61, 8, 4, 'selesai'),
(906, 61, 9, 4, 'selesai'),
(907, 61, 10, 4, 'selesai'),
(917, 62, 1, 4, 'selesai'),
(918, 62, 2, 4, 'selesai'),
(919, 62, 4, 4, 'selesai'),
(920, 62, 5, 4, 'selesai'),
(921, 62, 6, 4, 'selesai'),
(922, 62, 7, 4, 'selesai'),
(923, 62, 8, 4, 'selesai'),
(924, 62, 9, 4, 'selesai'),
(925, 62, 10, 4, 'selesai'),
(935, 63, 1, 4, 'selesai'),
(936, 63, 2, 4, 'selesai'),
(937, 63, 4, 4, 'selesai'),
(938, 63, 5, 4, 'selesai'),
(939, 63, 6, 4, 'selesai'),
(940, 63, 7, 3, 'selesai'),
(941, 63, 8, 4, 'selesai'),
(942, 63, 9, 4, 'selesai'),
(943, 63, 10, 3, 'selesai'),
(953, 64, 1, 4, 'selesai'),
(954, 64, 2, 4, 'selesai'),
(955, 64, 4, 4, 'selesai'),
(956, 64, 5, 4, 'selesai'),
(957, 64, 6, 4, 'selesai'),
(958, 64, 7, 4, 'selesai'),
(959, 64, 8, 4, 'selesai'),
(960, 64, 9, 4, 'selesai'),
(961, 64, 10, 4, 'selesai'),
(971, 65, 1, 4, 'selesai'),
(972, 65, 2, 3, 'selesai'),
(973, 65, 4, 4, 'selesai'),
(974, 65, 5, 3, 'selesai'),
(975, 65, 6, 3, 'selesai'),
(976, 65, 7, 3, 'selesai'),
(977, 65, 8, 4, 'selesai'),
(978, 65, 9, 4, 'selesai'),
(979, 65, 10, 4, 'selesai'),
(989, 66, 1, 4, 'selesai'),
(990, 66, 2, 4, 'selesai'),
(991, 66, 4, 4, 'selesai'),
(992, 66, 5, 4, 'selesai'),
(993, 66, 6, 4, 'selesai'),
(994, 66, 7, 4, 'selesai'),
(995, 66, 8, 4, 'selesai'),
(996, 66, 9, 4, 'selesai'),
(997, 66, 10, 4, 'selesai'),
(1007, 67, 1, 4, 'selesai'),
(1008, 67, 2, 4, 'selesai'),
(1009, 67, 4, 3, 'selesai'),
(1010, 67, 5, 3, 'selesai'),
(1011, 67, 6, 3, 'selesai'),
(1012, 67, 7, 3, 'selesai'),
(1013, 67, 8, 3, 'selesai'),
(1014, 67, 9, 3, 'selesai'),
(1015, 67, 10, 3, 'selesai'),
(1025, 68, 1, 4, 'selesai'),
(1026, 68, 2, 4, 'selesai'),
(1027, 68, 4, 4, 'selesai'),
(1028, 68, 5, 4, 'selesai'),
(1029, 68, 6, 4, 'selesai'),
(1030, 68, 7, 4, 'selesai'),
(1031, 68, 8, 4, 'selesai'),
(1032, 68, 9, 4, 'selesai'),
(1033, 68, 10, 4, 'selesai'),
(1043, 69, 1, 4, 'selesai'),
(1044, 69, 2, 4, 'selesai'),
(1045, 69, 4, 4, 'selesai'),
(1046, 69, 5, 4, 'selesai'),
(1047, 69, 6, 4, 'selesai'),
(1048, 69, 7, 4, 'selesai'),
(1049, 69, 8, 4, 'selesai'),
(1050, 69, 9, 4, 'selesai'),
(1051, 69, 10, 4, 'selesai'),
(1061, 70, 1, 4, 'selesai'),
(1062, 70, 2, 4, 'selesai'),
(1063, 70, 4, 4, 'selesai'),
(1064, 70, 5, 3, 'selesai'),
(1065, 70, 6, 3, 'selesai'),
(1066, 70, 7, 3, 'selesai'),
(1067, 70, 8, 3, 'selesai'),
(1068, 70, 9, 3, 'selesai'),
(1069, 70, 10, 4, 'selesai'),
(1097, 77, 1, 4, 'selesai'),
(1098, 77, 2, 3, 'selesai'),
(1099, 77, 4, 4, 'selesai'),
(1100, 77, 5, 3, 'selesai'),
(1101, 77, 6, 4, 'selesai'),
(1102, 77, 7, 3, 'selesai'),
(1103, 77, 8, 4, 'selesai'),
(1104, 77, 9, 4, 'selesai'),
(1105, 77, 10, 4, 'selesai'),
(1133, 80, 1, 4, 'selesai'),
(1134, 80, 2, 3, 'selesai'),
(1135, 80, 4, 3, 'selesai'),
(1136, 80, 5, 3, 'selesai'),
(1137, 80, 6, 4, 'selesai'),
(1138, 80, 7, 4, 'selesai'),
(1139, 80, 8, 3, 'selesai'),
(1140, 80, 9, 3, 'selesai'),
(1141, 80, 10, 3, 'selesai'),
(1151, 81, 1, 4, 'selesai'),
(1152, 81, 2, 3, 'selesai'),
(1153, 81, 4, 4, 'selesai'),
(1154, 81, 5, 4, 'selesai'),
(1155, 81, 6, 3, 'selesai'),
(1156, 81, 7, 4, 'selesai'),
(1157, 81, 8, 4, 'selesai'),
(1158, 81, 9, 3, 'selesai'),
(1159, 81, 10, 4, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `data_pertanyaan`
--

CREATE TABLE `data_pertanyaan` (
  `id_pertanyaan` int NOT NULL,
  `kategori` text NOT NULL,
  `pertanyaan` text NOT NULL,
  `opsi1` varchar(50) NOT NULL,
  `opsi2` varchar(50) NOT NULL,
  `opsi3` varchar(50) NOT NULL,
  `opsi4` varchar(50) NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pertanyaan`
--

INSERT INTO `data_pertanyaan` (`id_pertanyaan`, `kategori`, `pertanyaan`, `opsi1`, `opsi2`, `opsi3`, `opsi4`, `id_admin`) VALUES
(1, ' PERSYARATAN PELAYANAN', 'Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan pelayanan dengan jenis pelayanan', 'Tidak Sesuai', 'Kurang Sesuai', 'Sesuai', 'Sangat Sesuai', 1),
(2, ' PROSEDUR PELAYANAN', 'Bagaimana pemahaman saudara tentang tentang kemudahan prosedur pelayanan pelayanan di unit ini', 'Tidak Mudah ', 'Kurang Mudah ', 'Mudah ', 'Sangat Mudah', 1),
(4, ' WAKTU PELAYANAN', 'Bagaimana pendapat saudara tentang kecepatan pelayanan di unit ini', 'Tidak Tepat Waktu', 'Kadang Tepat Waktu', 'Banyak Tepat Waktu', 'Selalu Tepat Waktu', 1),
(5, ' BIAYA PELAYANAN', 'Bagaimana pendapat saudara tentang kewajaran biaya/tarif dalam pelayanan', 'Sangat Mahal', 'Cukup  Mahal', 'Murah', 'Gratis', 1),
(6, ' PRODUK SPESIFIKASI JENIS PELAYANAN', 'Bagaimana pendapat saudara tentang kesusaian hasil pelayanan yang diberikan dan diteriman dengan waktu yang ditetapkan', 'Tidak Sesuai', 'Kadang Sesuai', 'Sesuai', 'Sangat Sesuai', 1),
(7, ' KOMPETENSI PELAKSANA', 'Bagaimana pendapat saudara tentang kemampuan petugas dalam memberi pelayanan', 'Tidak Mampu', 'Kurang Mampu ', 'Mampu ', 'Sangat Mampu ', 1),
(8, ' PERILAKU PELAKSANA', 'Bagaimana pendapat saudara tentang perilaku petugas dalam pelayanan terkait kesopanan dan keramahan', 'Tidak Baik', 'Kurang baik', 'Baik', 'Sangat Baik ', 1),
(9, ' MATLUMAN PELAYANAN', 'Bagaimana pendapat saudara tentang sarana dan prasana yang digunakan dalam pelayanan', 'Buruk ', 'Cukup', 'Baik', 'Sangat Baik ', 1),
(10, ' PENANGANAN PENGADUAN, SARAN, DAN MASUKAN', 'Bagaimana pendapat saudara tentang penanganan pengaduan penggunaan pelayanan', 'Tidak Sesuai', 'Kurang Sesuai', 'Sesuai', 'Sangat Setuju', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_responden`
--

CREATE TABLE `data_responden` (
  `id_responden` int NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `id_instansi` int NOT NULL,
  `nama_responden` varchar(50) NOT NULL,
  `jkel` enum('Laki-laki','Perempuan') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `saran` text NOT NULL,
  `status_responden` enum('belum','selesai','tanggapi') NOT NULL,
  `tgl_responden` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_responden`
--

INSERT INTO `data_responden` (`id_responden`, `no_wa`, `id_instansi`, `nama_responden`, `jkel`, `pekerjaan`, `pendidikan`, `saran`, `status_responden`, `tgl_responden`) VALUES
(19, '081234567890  ', 1, 'Agus Permana', 'Laki-laki', 'PNS/TNI/POLRI', 'SMA', 'Website sering lambat saat diakses, terutama pada jam sibuk  ', 'selesai', '2024-11-09 03:06:42'),
(20, '085789432106  ', 2, 'Aisyah Ramadhani', 'Perempuan', 'Pegawai Swasta', 'S1', 'Website sudah membantu saya mendapatkan informasi dasar layanan  ', 'selesai', '2024-12-09 03:09:50'),
(21, '081356781234  ', 4, 'Ahmad Sulaiman', 'Laki-laki', 'Wiraswasta', 'SD Kebawah', 'Tampilan website kurang menarik dan membingungkan untuk orang ', 'selesai', '2024-12-09 03:13:49'),
(22, '082167894321  ', 5, 'Andi Muchtar', 'Laki-laki', 'Pelajar/Mahasiswa', 'SMP', 'Tampilan website cukup sederhana dan mudah dipahami  ', 'selesai', '2024-12-09 03:16:03'),
(23, '085223456789', 6, 'Anita Safitri', 'Perempuan', 'Lainnya', 'S2 Keatas', 'Adanya fitur SKM memudahkan kami menyampaikan kritik dan ', 'selesai', '2024-12-09 03:29:37'),
(24, '083876543210 ', 8, 'Andi Iqbal Rahman', 'Laki-laki', 'PNS/TNI/POLRI', 'S1', 'Website cukup cepat diakses, terutama di luar jam sibuk  ', 'selesai', '2024-12-09 12:26:42'),
(25, '081987654321', 5, 'Sitti Nurhaliza', 'Perempuan', 'Pegawai Swasta', 'S2 Keatas', 'Website sudah membantu saya mendapatkan informasi dasar layanan dengan baik  ', 'selesai', '2024-12-09 12:40:52'),
(26, '087712345678  ', 9, 'Muh. Arfan Hidayat', 'Laki-laki', 'Pelajar/Mahasiswa', 'SMP', 'Tampilan website memiliki potensi untuk lebih menarik dan intuitif  ', 'selesai', '2024-12-09 12:44:01'),
(27, '082345678901 ', 10, 'Ria Anggraeni', 'Perempuan', 'Lainnya', 'SD Kebawah', 'Tampilan website cukup sederhana dan mudah dipahami  ', 'selesai', '2024-12-09 12:48:30'),
(28, '085890123456  ', 11, 'Syahrul Ramadhan', 'Laki-laki', 'Pegawai Swasta', 'S1', 'Menu navigasi di website bisa semakin user-friendly jika terus dikembangkan  ', 'selesai', '2024-12-09 13:00:48'),
(29, '081834567890 ', 13, 'Nurdin Baso Amir', 'Laki-laki', 'PNS/TNI/POLRI', 'SMA', 'Menu navigasi di website bisa semakin user-friendly jika terus dikembangkan  ', 'selesai', '2024-12-09 13:31:34'),
(30, '081834567890 ', 15, 'Fitriani Nurjannah', 'Perempuan', 'Lainnya', 'SD Kebawah', 'Adanya fitur SKM memudahkan kami menyampaikan kritik dan saran dengan praktis', 'selesai', '2024-12-09 13:46:20'),
(31, '082267890123', 16, 'Irfan Abdullah', 'Laki-laki', 'PNS/TNI/POLRI', 'S2 Keatas', 'Informasi di website membantu memahami sebagian besar prosedur layanan  ', 'selesai', '2024-12-09 13:48:17'),
(32, '083756789101 ', 17, 'Jumardi Hasan', 'Laki-laki', 'Pegawai Swasta', 'S1', 'Navigasi cukup jelas, terutama untuk layanan yang sering digunakan oleh masyarakat  \r\n', 'selesai', '2024-12-09 13:51:01'),
(33, ' 085923456789  ', 1, 'Nurhidayah Andini', 'Perempuan', 'Wiraswasta', 'SD Kebawah', 'Website terus diperbaiki agar link selalu berfungsi dengan baik  ', 'selesai', '2024-12-09 13:54:05'),
(34, '081378901234 ', 2, 'Hasrullah Makkasau', 'Laki-laki', 'Pelajar/Mahasiswa', 'SD Kebawah', 'Informasi kontak layanan cukup lengkap dan sangat membantu masyarakat  ', 'selesai', '2024-12-09 13:58:33'),
(35, '083189012345  ', 4, 'Sitti Aisyah Rahmawati', 'Perempuan', 'Pegawai Swasta', 'SMP', 'Informasi di website membantu pelayanan di kantor menjadi lebih baik  ', 'selesai', '2024-12-09 14:14:47'),
(36, '081156789012  ', 5, 'Riswan Akbar', 'Laki-laki', 'Wiraswasta', 'SMA', 'Pelayanan di kantor sudah sesuai dengan informasi yang tersedia di website  \r\n', 'selesai', '2024-12-09 14:16:40'),
(37, '085643210987 ', 6, 'Marlina Andi Baso', 'Perempuan', 'Pelajar/Mahasiswa', 'S1', 'Respon dari pihak MPP melalui website terus meningkat dari segi kecepatan  ', 'selesai', '2024-12-09 14:19:48'),
(38, '081934567890 ', 8, 'Muh. Fauzan Zulfikar', 'Laki-laki', 'PNS/TNI/POLRI', 'S1', 'Pengisian survei SKM sangat mudah dan cepat melalui website ini  ', 'selesai', '2024-12-09 14:22:50'),
(39, '082212345678 ', 9, 'Sitti Farhana Nur', 'Perempuan', 'Pelajar/Mahasiswa', 'S2 Keatas', 'Formulir SKM dapat diisi dengan praktis, dan kendala teknis jarang terjadi  ', 'selesai', '2024-12-09 14:28:23'),
(40, '083745678901 ', 10, 'Irwansyah Satria', 'Laki-laki', 'Lainnya', 'SD Kebawah', 'Fitur download formulir layanan sangat berguna dan memudahkan masyarakat  ', 'selesai', '2024-12-09 14:30:52'),
(41, '088756781234  ', 11, 'Indriani Tamrin', 'Perempuan', 'Wiraswasta', 'S2 Keatas', 'Website berpotensi lebih baik jika dilengkapi fitur live chat untuk kebutuhan mendesak  ', 'selesai', '2024-12-09 14:33:16'),
(42, '085290123456', 13, 'Rahmatullah Basri', 'Perempuan', 'PNS/TNI/POLRI', 'S2 Keatas', 'Website sangat membantu dalam mengetahui alur layanan publik secara transparan  ', 'selesai', '2024-12-09 14:35:27'),
(43, '085723456789', 15, 'Hasnah Dewi', 'Perempuan', 'Lainnya', 'SD Kebawah', 'Tata letak tulisan cukup jelas dan dapat diperbesar untuk kenyamanan pengguna  ', 'selesai', '2024-12-09 14:37:59'),
(44, ' 081267891234  ', 16, 'Ahmad Fauzi', 'Laki-laki', 'PNS/TNI/POLRI', 'S1', 'Fitur tracking layanan sangat membantu mengetahui progres pengajuan', 'selesai', '2024-12-09 14:40:01'),
(45, '083145678901', 17, 'Rahmawati Nurhalimah', 'Perempuan', 'Pegawai Swasta', 'S2 Keatas', 'Fitur download dokumen semakin stabil dan jarang mengalami gangguan  ', 'selesai', '2024-12-09 14:41:54'),
(46, ' 081989012345  ', 1, 'Syamsul Arifin', 'Laki-laki', 'PNS/TNI/POLRI', 'S2 Keatas', 'Pelayanan customer service melalui website cukup responsif dan membantu \r\n', 'selesai', '2024-12-09 14:44:27'),
(47, '081989012345  ', 2, 'Asriani Nurhayati', 'Perempuan', 'Pelajar/Mahasiswa', 'SMP', 'Website cukup baik saat diakses melalui ponsel dan terus ditingkatkan ke depannya  ', 'selesai', '2024-12-09 14:48:23'),
(48, '082234567890 ', 4, 'Hamzah Amri', 'Laki-laki', 'Lainnya', 'SMA', 'Penggunaan warna di website ramah di mata, sehingga nyaman untuk dibaca  ', 'selesai', '2024-12-09 14:53:07'),
(49, '082234567890 ', 5, 'Nurhalim Muhajir', 'Perempuan', 'Pegawai Swasta', 'S1', 'Informasi layanan terus diperbarui dengan lebih berkala dan akurat  ', 'selesai', '2024-12-09 14:57:13'),
(50, '085967890123  ', 6, 'Irmawati Basri', 'Perempuan', 'Pelajar/Mahasiswa', 'S1', 'Update informasi layanan cukup cepat, terutama jadwal operasional kantor  ', 'selesai', '2024-12-09 15:06:45'),
(51, '085656781234  ', 8, 'Zulkifli Amirullah', 'Laki-laki', 'Pelajar/Mahasiswa', 'SMA', 'Website berpotensi lebih baik jika dilengkapi notifikasi layanan yang sudah diproses  ', 'selesai', '2024-12-09 15:18:27'),
(52, '085812345678', 11, 'Aminah Safitri', 'Perempuan', 'Pegawai Swasta', 'S2 Keatas', 'Informasi pelayanan Instansi pada kantor MPP sangat membantu sekali untuk masyarakat\r\n', 'selesai', '2024-12-10 01:39:55'),
(53, '083178901234  ', 13, 'Muh. Ridwan Hidayat', 'Laki-laki', 'Lainnya', 'S1', 'Informasi kontak pegawai tersedia dengan baik dan cukup membantu  ', 'selesai', '2024-12-10 01:57:01'),
(54, '081945678901  ', 15, 'Nurjannah Rahmat', 'Perempuan', 'Lainnya', 'SD Kebawah', 'Informasi syarat dan prosedur layanan cukup jelas, mudah dimengerti, dan lengkap  ', 'selesai', '2024-12-10 01:59:33'),
(55, '085267890123', 16, 'Faisal Rahim', 'Laki-laki', 'PNS/TNI/POLRI', 'SMA', 'Website terus ditingkatkan untuk mendukung akses bagi penyandang disabilitas  ', 'selesai', '2024-12-10 02:01:31'),
(56, '082290123456  ', 17, 'Winda Fitriani', 'Perempuan', 'Pelajar/Mahasiswa', 'SMP', 'Panduan di website cukup jelas untuk memahami setiap layanan  ', 'selesai', '2024-12-10 02:04:10'),
(57, '081112345678  ', 1, 'Rudiansyah Baso', 'Laki-laki', 'Wiraswasta', 'SMA', 'Penggunaan bahasa di website sudah baik, dan bisa semakin disederhanakan untuk semua kalangan  ', 'selesai', '2024-12-10 02:12:51'),
(58, '085689012345  ', 2, 'Amriani Tamrin', 'Perempuan', 'Pegawai Swasta', 'S1', 'Adanya SKM online sangat praktis dan mengurangi hambatan administrasi manual  ', 'selesai', '2024-12-10 02:14:52'),
(59, '081934567890  ', 4, 'Andi Putra Pratama', 'Laki-laki', 'PNS/TNI/POLRI', 'S1', 'Pemeliharaan website dilakukan secara berkala untuk peningkatan performa  ', 'selesai', '2024-12-10 02:16:53'),
(60, '083156781234', 5, 'Hasnah Dewi', 'Perempuan', 'PNS/TNI/POLRI', 'S1', 'Website mendukung transparansi pelayanan publik dengan baik  ', 'selesai', '2024-12-10 02:27:03'),
(61, '085843210987  ', 6, 'Muhammad Syarifuddin', 'Laki-laki', 'Lainnya', 'SMA', 'Fitur pencarian layanan cukup akurat dan membantu menemukan informasi cepat  ', 'selesai', '2024-12-10 02:29:31'),
(62, '083790123456  ', 8, 'Andi Fitrah Ramadhani', 'Laki-laki', 'Lainnya', 'SMA', 'Responsivitas website di perangkat mobile sudah baik dan lancar  ', 'selesai', '2024-12-10 02:32:18'),
(63, '081212345678 ', 9, 'Riswandi Nurdin', 'Laki-laki', 'PNS/TNI/POLRI', 'S2 Keatas', 'Formulir pengisian SKM praktis, sederhana, dan mudah diisi  ', 'selesai', '2024-12-10 02:35:40'),
(64, '083167890123 ', 10, 'Nurul Jannah', 'Perempuan', 'PNS/TNI/POLRI', 'S1', 'Fitur pengaduan online cukup efektif dalam menampung keluhan dan saran masyarakat  ', 'selesai', '2024-12-10 02:42:46'),
(65, '085989012345', 11, 'Abdullah Tamrin', 'Laki-laki', 'Pegawai Swasta', 'S1', 'Beberapa layanan dapat diakses online, sehingga mengurangi keharusan datang langsung ke kantor  ', 'selesai', '2024-12-10 02:46:07'),
(66, '082156789012  ', 13, 'Syarifah Nuraini', 'Perempuan', 'Wiraswasta', 'S1', 'Adanya kolom FAQ membantu menjawab pertanyaan mendasar dari masyarakat  ', 'selesai', '2024-12-10 02:48:03'),
(67, '088834567890 ', 15, 'Muh. Aldi bosar', 'Laki-laki', 'Wiraswasta', 'SMA', 'Website terus diperbarui agar tampil lebih modern dengan fitur-fitur menarik  ', 'selesai', '2024-12-10 02:50:28'),
(68, '083712345678  ', 16, 'Febrianti Hasan', 'Perempuan', 'PNS/TNI/POLRI', 'S2 Keatas', 'Website membantu menghemat waktu dalam mencari informasi layanan  ', 'selesai', '2024-12-10 02:52:09'),
(69, '082345623343', 1, 'Andi Ridwan Saputra', 'Laki-laki', 'Wiraswasta', 'S1', 'Panduan dan tutorial penggunaan website sudah cukup informatif dan membantu pengguna baru  ', 'selesai', '2024-12-11 09:50:22'),
(70, '085688987763', 6, 'Fitrah Dauliah', 'Perempuan', 'Pelajar/Mahasiswa', 'S2 Keatas', 'petugas pelayanan sangat ramah dan cepat \r\n', 'selesai', '2024-12-13 18:51:33'),
(77, '085166763345', 8, 'I ketut Indra', 'Laki-laki', 'Pelajar/Mahasiswa', 'S1', 'pelayanan sangat cepat \r\n', 'selesai', '2024-12-15 07:04:41'),
(80, '085396979642', 2, 'Daeng Akbar', 'Laki-laki', 'Lainnya', 'SMA', 'internet wifi sangat bagus dan cepat\r\n', 'selesai', '2024-12-15 10:16:17'),
(81, '085699104432', 5, 'alip ', 'Laki-laki', 'PNS/TNI/POLRI', 'S1', 'bagus sekali\r\n', 'selesai', '2024-12-19 07:02:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_instansi`
--
ALTER TABLE `data_instansi`
  ADD PRIMARY KEY (`id_instansi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `data_jawaban`
--
ALTER TABLE `data_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `id_responden` (`id_responden`);

--
-- Indexes for table `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `data_responden`
--
ALTER TABLE `data_responden`
  ADD PRIMARY KEY (`id_responden`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_instansi`
--
ALTER TABLE `data_instansi`
  MODIFY `id_instansi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `data_jawaban`
--
ALTER TABLE `data_jawaban`
  MODIFY `id_jawaban` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1322;

--
-- AUTO_INCREMENT for table `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  MODIFY `id_pertanyaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `data_responden`
--
ALTER TABLE `data_responden`
  MODIFY `id_responden` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_instansi`
--
ALTER TABLE `data_instansi`
  ADD CONSTRAINT `data_instansi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `data_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_jawaban`
--
ALTER TABLE `data_jawaban`
  ADD CONSTRAINT `data_jawaban_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `data_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_jawaban_ibfk_2` FOREIGN KEY (`id_responden`) REFERENCES `data_responden` (`id_responden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  ADD CONSTRAINT `data_pertanyaan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `data_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_responden`
--
ALTER TABLE `data_responden`
  ADD CONSTRAINT `data_responden_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `data_instansi` (`id_instansi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
