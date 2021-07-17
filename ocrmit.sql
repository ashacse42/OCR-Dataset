-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 07:27 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocrmit`
--

-- --------------------------------------------------------

--
-- Table structure for table `character_base`
--

CREATE TABLE `character_base` (
  `id` int(11) NOT NULL,
  `char_val` varchar(100) CHARACTER SET utf8 NOT NULL,
  `char_txt` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `character_base`
--

INSERT INTO `character_base` (`id`, `char_val`, `char_txt`) VALUES
(0, '000', 'SKIP'),
(101, '101', 'অ'),
(102, '102', 'আ'),
(103, '103', 'ই'),
(104, '104', 'ঈ'),
(105, '105', 'উ'),
(106, '106', 'ঊ'),
(107, '107', 'ঋ'),
(108, '108', 'এ'),
(109, '109', 'ঐ'),
(110, '110', 'ও'),
(111, '111', 'ঔ'),
(112, '112', 'া'),
(113, '113', 'ি'),
(114, '114', 'ী'),
(115, '115', 'ু'),
(116, '116', 'ূ'),
(117, '117', 'ৃ'),
(118, '118', 'ৄ'),
(119, '119', 'ে'),
(120, '120', 'ৈ'),
(121, '121', 'ো'),
(122, '122', 'ৌ'),
(123, '123', 'ৢ'),
(124, '124', '-'),
(125, '125', 'ৢ'),
(201, '201', 'ক'),
(202, '202', 'খ'),
(203, '203', 'গ'),
(204, '204', 'ঘ'),
(205, '205', 'ঙ'),
(206, '206', 'চ'),
(207, '207', 'ছ'),
(208, '208', 'জ'),
(209, '209', 'ঝ'),
(210, '210', 'ঞ'),
(211, '211', 'ট'),
(212, '212', 'ঠ'),
(213, '213', 'ড'),
(214, '214', 'ঢ'),
(215, '215', 'ণ'),
(216, '216', 'ত'),
(217, '217', 'থ'),
(218, '218', 'দ'),
(219, '219', 'ধ'),
(220, '220', 'ন'),
(221, '221', 'প'),
(222, '222', 'ফ'),
(223, '223', 'ব'),
(224, '224', 'ভ'),
(225, '225', 'ম'),
(226, '226', 'য	'),
(227, '227', 'র'),
(228, '228', 'ল'),
(229, '229', 'শ'),
(230, '230', 'ষ'),
(231, '231', 'স'),
(232, '232', 'হ'),
(233, '233', 'ড়'),
(234, '234', 'ঢ়'),
(235, '235', 'য়'),
(236, '236', 'ৎ'),
(237, '237', 'ং'),
(238, '238', 'ঃ'),
(239, '239', '‍ঁ'),
(240, '240', 'ক্ষ'),
(241, '241', '‍্'),
(242, '242', '‍্য'),
(301, '301', '০'),
(302, '302', '১'),
(303, '303', '২'),
(304, '304', '৩'),
(305, '305', '৪'),
(306, '306', '৫'),
(307, '307', '৬'),
(308, '308', '৭'),
(309, '309', '৮'),
(310, '310', '৯');

-- --------------------------------------------------------

--
-- Table structure for table `final_result`
--

CREATE TABLE `final_result` (
  `id` int(11) NOT NULL,
  `character_id` varchar(100) NOT NULL,
  `character_value` varchar(50) NOT NULL,
  `decision` varchar(100) NOT NULL,
  `flag_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_result`
--

INSERT INTO `final_result` (`id`, `character_id`, `character_value`, `decision`, `flag_status`) VALUES
(15, '90', '206', '1', '1'),
(16, '90', '206', '1', '1'),
(17, '98', '208', '0', '2'),
(18, '98', '201', '0', '2'),
(19, '98', '208', '0', '2'),
(20, '98', '232', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `image_info`
--

CREATE TABLE `image_info` (
  `img_serial` int(11) NOT NULL,
  `image_name` text NOT NULL,
  `character_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_info`
--

INSERT INTO `image_info` (`img_serial`, `image_name`, `character_value`) VALUES
(88, '563image_1_1.png', '220'),
(89, '334image_1_2.png', '223'),
(90, '171image_1_3.png', '206'),
(91, '472image_1_4.png', '222'),
(92, '775image_1_5.png', '110'),
(93, '765image_1_6.png', '201'),
(94, '115image_1_7.png', '113'),
(95, '412image_1_8.png', '108'),
(96, '943image_1_9.png', '201'),
(97, '928image_1_10.png', '223'),
(98, '17image_1_11.png', '232'),
(99, '766image_1_12.png', '204'),
(100, '890image_1_12.png', '204');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `char_id` varchar(200) NOT NULL,
  `char_value` varchar(200) CHARACTER SET utf8 NOT NULL,
  `decision` varchar(200) NOT NULL DEFAULT '',
  `flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `char_id`, `char_value`, `decision`, `flag`) VALUES
(31, '97', '223', '1', 0),
(33, '93', '201', '1', 0),
(35, '100', '226', '0', 0),
(40, '97', '214', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `email`, `flag`) VALUES
(1, 'Limon', '827ccb0eea8a706c4c34a16891f84e7b', 'miahaburayhan@gmail.com', 1),
(3, 'rayhan.ecs@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'rayhan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `character_base`
--
ALTER TABLE `character_base`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_result`
--
ALTER TABLE `final_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_info`
--
ALTER TABLE `image_info`
  ADD PRIMARY KEY (`img_serial`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `character_base`
--
ALTER TABLE `character_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `final_result`
--
ALTER TABLE `final_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `image_info`
--
ALTER TABLE `image_info`
  MODIFY `img_serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
