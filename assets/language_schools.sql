-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 04:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `language_schools`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id_Crs` int(11) NOT NULL COMMENT ' ',
  `Course_Name` text NOT NULL COMMENT 'نام دوره',
  `Day_of_Hold` text NOT NULL COMMENT 'روز و تشکیل کلاس',
  `Cost` text NOT NULL COMMENT 'هزینه دوره',
  `Count_of_Week` text NOT NULL COMMENT 'تعداد جلسات در هفته',
  `Course_of_Length` text NOT NULL COMMENT 'طول دوره'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id_Crs`, `Course_Name`, `Day_of_Hold`, `Cost`, `Count_of_Week`, `Course_of_Length`) VALUES
(1, 'انگلیسی', 'یکشنبه ساعت 17:30 الی 19:00', '250000 هزارتومان', 'دو جلسه', 'دوازده جلسه'),
(2, 'زبان انگلیسی ویژه اولیا', 'سه شنبه ساعت 20:00 الی 9:15', '320000 هزارتومان', 'دو جلسه', 'دوازده جلسه'),
(3, 'بحث آزاد انگلیسی کودک و نوجوان', 'چهارشنبه ساعت 17:00 الی 18:30', '220000 هزارتومان', 'دو جلسه', 'هشت جلسه'),
(4, 'زبان فرانسه', ' پنج شنبه ساعت 17:00 الی 18:30', '270000 هزارتومان', 'دو جلسه', 'دوازده جلسه'),
(5, 'زبان آلمانی', ' شنبه شنبه ساعت 17:00 الی 18:30', '290000 هزارتومان', 'دو جلسه', 'دوازده جلسه'),
(6, ' مترجمی زبان آلمانی ', ' چهارشنبه ساعت 19:00 الی 20:30', '290000 هزارتومان', 'دو جلسه', 'دوازده جلسه'),
(7, 'مکالمه زبان فرانسه', ' پنج شنبه ساعت 20:00 الی 21:30', '270000 هزارتومان', 'دو جلسه', 'دوازده جلسه');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id_Reg` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_Crs` int(11) NOT NULL,
  `Remark` text NOT NULL COMMENT 'توضیحات',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id_Reg`, `id`, `id_Crs`, `Remark`, `date`) VALUES
(66, 4, 1, '', '2023-01-02 14:56:44'),
(67, 4, 2, '', '2023-01-02 14:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id_tch` int(11) NOT NULL,
  `Teacher_Name` text NOT NULL COMMENT 'نام استاد',
  `Degree` text NOT NULL COMMENT 'مدرک',
  `Phone` text NOT NULL COMMENT 'تلفن همراه',
  `Email` varchar(20) NOT NULL COMMENT 'پست الکترونیکی'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id_tch`, `Teacher_Name`, `Degree`, `Phone`, `Email`) VALUES
(1, 'علی رحیمی', 'کارشناسی ارشد مترجمی زبان انگلیسی', '09134214126', 'alirahimi1234@gmail.'),
(2, 'مریم باقری', 'کارشناسی ارشد زبان فرانسه', '09351423058', 'maryambagheri@yahoo.'),
(3, 'محمد سلیمی', 'کارشناسی ارشد مترجمی زبان آلمانی', '09134212128', 'moh_salimi2022@gmail'),
(4, 'هانیه محمدی', 'کارشناسی ارشد زبان فرانسه و کارشناسی زبان آلمانی', '09912435620', 'haniyeh_mohammdi@gma');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL COMMENT 'نام کاربری',
  `email` varchar(255) NOT NULL,
  `pass` varchar(8) NOT NULL COMMENT 'رمزعبور',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_of_birth` text NOT NULL,
  `education` varchar(255) NOT NULL,
  `national_code` int(10) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `email`, `pass`, `date`, `date_of_birth`, `education`, `national_code`, `image`) VALUES
(1, 2147483647, 'haniyeh', 'hani@gmail.com', '1111', '2023-01-01 20:49:57', '1380/2/7', 'مهندسی کامپیوتر', 1234567890, 'haniyeh-2023-01-01-07.42.58pm.jpg'),
(4, 1, 'sajad saeedi', 'sajadsaeediazad0007@gmail.com', '1234', '2023-01-01 22:01:03', '1367/06/20', 'مهندسی برق الکترونیک', 1841931934, 'sajad saeedi-2023-01-01-09.58.46pm.jpg'),
(6, 6, 'farhad', 'hani@gmail.com', '321', '2023-01-01 22:36:35', '67/6/20', 'مهندسی برق الکترونیکی', 1234567890, 'farhad-2023-01-01-10.09.00pm.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_Crs`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id_Reg`),
  ADD UNIQUE KEY `user_crs` (`id`,`id_Crs`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_tch`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `username` (`username`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `username_3` (`username`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `username_4` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_Crs` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id_Reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_tch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `reg_crs` FOREIGN KEY (`id`) REFERENCES `courses` (`id_Crs`),
  ADD CONSTRAINT `reg_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
