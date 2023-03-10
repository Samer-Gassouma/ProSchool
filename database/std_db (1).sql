-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 01:13 PM
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
-- Database: `std_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `index_number`, `full_name`, `address`, `phone`, `email`, `image_name`, `reg_date`) VALUES
(1, 23, 'Mo7sin el kamil', 'Sri Lanka1', '111-111-1114', 'admin@gmail.com', 'uploads/8377.jpg', '2018-01-10'),
(2, 2, 'Si el ADMIN', 'MONASTIR', '69696969', 'sadmin@gmail.com', 'uploads/img.jpg', '2022-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `avertissement`
--

CREATE TABLE `avertissement` (
  `Title` varchar(50) NOT NULL,
  `Id_class` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `Id_type` int(11) NOT NULL,
  `Id_student` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `Id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avertissement`
--

INSERT INTO `avertissement` (`Title`, `Id_class`, `text`, `Id_type`, `Id_student`, `Id`, `date`, `Id_teacher`) VALUES
('dfsgds', 71, 'sdfg', 1, 51, 38, '2027-10-22 12:34:26', 36);

-- --------------------------------------------------------

--
-- Table structure for table `avertissement_type`
--

CREATE TABLE `avertissement_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avertissement_type`
--

INSERT INTO `avertissement_type` (`id`, `type`, `Id_School`) VALUES
(1, 'adsf', 1),
(2, 'exclu', 1),
(3, 'indhar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `backup_homework`
--

CREATE TABLE `backup_homework` (
  `Title` varchar(255) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `File_path` varchar(255) NOT NULL,
  `File_name` varchar(255) NOT NULL,
  `File_id` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `Date_Homewok` datetime NOT NULL,
  `id_Teacher` int(11) NOT NULL,
  `Id_school` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `backup_homework`
--

INSERT INTO `backup_homework` (`Title`, `Comment`, `Class`, `File_path`, `File_name`, `File_id`, `id_class`, `Date_Homewok`, `id_Teacher`, `Id_school`) VALUES
('test', 'Python Programme', 'df s', '../uploads/FILE62e613d13d3fb9.94324906.pdf', 'FILE62e613d13d3fb9.94324906.pdf', 17, 64, '2022-07-31 07:32:01', 35, 1),
('Php life ', 'e5dem i3ayach weldi', '4b7', '../uploads/FILE62e9c4c3bd49c7.22877721.png', 'FILE62e9c4c3bd49c7.22877721.png', 18, 68, '2022-08-03 02:43:47', 36, 1),
('Ez life ', 'page 440', '4b7', '', '', 19, 68, '2022-08-03 02:49:07', 36, 1),
('ez life', '34deeem', '4b7', '', '', 20, 68, '2022-08-03 13:11:40', 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `Id_School` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `Id_School`, `level`) VALUES
(67, '4si1', 2, 0),
(71, '4b3', 1, 4),
(72, '4b2', 1, 4),
(73, '4b5', 1, 4),
(74, '4b6', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `class_room`
--

CREATE TABLE `class_room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class_room`
--

INSERT INTO `class_room` (`id`, `name`, `Id_School`) VALUES
(31, 'Class A ', 1),
(32, 'Class  X', 1),
(34, 'Class 24', 1),
(35, 'Class 50', 1),
(36, 'Class Maker', 1),
(37, 'Maker', 1),
(38, 'my life is better', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `disription` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `name`, `disription`, `class_id`, `teacher_id`, `img_name`, `img_path`, `file_name`, `file_path`, `Id_School`) VALUES
(5, '', 'Programming', 64, 35, 'IMG62e6159dd782d4.29733972.jpg', '../Cours/IMG62e6159dd782d4.29733972.jpg', 'FILE62e6159dd78170.25684770.pdf', '../Cours/FILE62e6159dd78170.25684770.pdf', 1),
(6, '', 'sdf', 68, 36, 'IMG630816e91bcf89.51375668.jpg', '../Cours/IMG630816e91bcf89.51375668.jpg', 'FILE630816e91bcc50.13280058.jpg', '../Cours/FILE630816e91bcc50.13280058.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `level` varchar(150) NOT NULL,
  `total_amount` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `description`, `level`, `total_amount`, `date_created`) VALUES
(1, 'Course 2', 'Sample', '1', 4500, '2020-10-31 11:01:15'),
(2, 'hds', 'LOL🍻', 'A2', 5000, '2023-03-10 12:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `grade_id` varchar(255) NOT NULL,
  `create_by` bigint(11) NOT NULL,
  `creator_type` varchar(255) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `note`, `color`, `category_id`, `grade_id`, `create_by`, `creator_type`, `start_date_time`, `end_date_time`, `year`, `month`, `Id_School`) VALUES
(15, 'ASD', 'ASD', '#000000', 1, '', 1, 'Admin', '2022-08-01 00:00:00', '2022-08-03 00:00:00', 2022, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_category_type`
--

CREATE TABLE `event_category_type` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `Room` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `teacher_id`, `class_id`, `subject_id`, `Room`, `date`, `time`, `duration`, `description`, `Id_School`) VALUES
(56, 'test', 36, 68, 43, 35, 2022, 6, 2, '\r\n						das', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_timetable`
--

CREATE TABLE `exam_timetable` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `start_time` double(11,2) NOT NULL,
  `end_time` double(11,2) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `course_id`, `description`, `amount`) VALUES
(1, 1, 'Tuition', 3000),
(3, 1, 'sample', 1500),
(4, 2, 'KALI', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `Id_class` int(11) NOT NULL,
  `Id_teacher` int(11) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homework_upload`
--

CREATE TABLE `homework_upload` (
  `Title` varchar(255) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `File_path` varchar(255) NOT NULL,
  `File_name` varchar(255) NOT NULL,
  `File_id` int(11) NOT NULL,
  `Id_class` int(11) NOT NULL,
  `Date_homework` datetime NOT NULL,
  `id_Teacher` int(11) NOT NULL,
  `deadline` text DEFAULT NULL,
  `Id_school` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homework_upload`
--

INSERT INTO `homework_upload` (`Title`, `Comment`, `Class`, `File_path`, `File_name`, `File_id`, `Id_class`, `Date_homework`, `id_Teacher`, `deadline`, `Id_school`) VALUES
('test', 'Python Programme', 'df s', '../uploads/FILE62e613d13d3fb9.94324906.pdf', 'FILE62e613d13d3fb9.94324906.pdf', 49, 64, '2022-07-31 07:32:01', 35, '2022-08-05', 1),
('test', 'Python Programme', 'df s', '../uploads/FILE62e613d13d3fb9.94324906.pdf', 'FILE62e613d13d3fb9.94324906.pdf', 50, 64, '2022-07-31 07:32:01', 35, '2022-08-05', 1),
('Php life ', 'e5dem i3ayach weldi', '4b7', '../uploads/FILE62e9c4c3bd49c7.22877721.png', 'FILE62e9c4c3bd49c7.22877721.png', 51, 68, '2022-08-03 02:43:47', 36, '2022-08-11', 1),
('Php life ', 'e5dem i3ayach weldi', '4b7', '../uploads/FILE62e9c4c3bd49c7.22877721.png', 'FILE62e9c4c3bd49c7.22877721.png', 52, 68, '2022-08-03 02:43:47', 36, '2022-08-11', 1),
('Ez life ', 'page 440', '4b7', '', '', 53, 68, '2022-08-03 02:49:07', 36, '2022-08-10', 1),
('Ez life ', 'page 440', '4b7', '', '', 54, 68, '2022-08-03 02:49:07', 36, '2022-08-10', 1),
('ez life', '34deeem', '4b7', '', '', 55, 68, '2022-08-03 13:11:40', 36, '2022-08-03', 1),
('ez life', '34deeem', '4b7', '', '', 56, 68, '2022-08-03 13:11:40', 36, '2022-08-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ken wselet lahna contactini 3al numero ha4a`
--

CREATE TABLE `ken wselet lahna contactini 3al numero ha4a` (
  `99137937` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_notifications`
--

CREATE TABLE `main_notifications` (
  `notification_id` int(11) NOT NULL,
  `_status` int(11) NOT NULL,
  `_isread` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_notifications`
--

INSERT INTO `main_notifications` (`notification_id`, `_status`, `_isread`, `year`, `month`, `date`, `Id_School`) VALUES
(6, 0, 0, 2022, 0, 2022, 0),
(8, 0, 0, 2022, 0, 2022, 0),
(6, 0, 0, 2022, 0, 2022, 0),
(8, 0, 0, 2022, 0, 2022, 0),
(9, 0, 0, 2022, 0, 2022, 0),
(10, 0, 0, 2022, 0, 2022, 0),
(11, 0, 0, 2022, 0, 2022, 0),
(12, 0, 0, 2022, 0, 2022, 0),
(13, 0, 0, 2022, 0, 2022, 0),
(14, 0, 0, 2022, 0, 2022, 0),
(15, 0, 0, 2022, 0, 2022, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification_history`
--

CREATE TABLE `notification_history` (
  `notification_id` int(11) NOT NULL,
  `index_number` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `_isread` int(11) NOT NULL,
  `_status` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_history`
--

INSERT INTO `notification_history` (`notification_id`, `index_number`, `user_type`, `_isread`, `_status`, `year`, `month`, `date`) VALUES
(6, 1, 'Teacher', 0, '', 0, 0, 0),
(6, 2, 'Teacher', 0, '', 0, 0, 0),
(6, 3, 'Teacher', 0, '', 0, 0, 0),
(6, 4, 'Teacher', 0, '', 0, 0, 0),
(6, 5, 'Teacher', 0, '', 0, 0, 0),
(6, 6, 'Teacher', 0, '', 0, 0, 0),
(8, 2147483647, 'Student', 0, '', 0, 0, 0),
(8, 2147483647, 'Student', 0, '', 0, 0, 0),
(8, 2147483647, 'Teacher', 0, '', 0, 0, 0),
(8, 2147483647, 'Teacher', 0, '', 0, 0, 0),
(8, 2147483647, 'Teacher', 0, '', 0, 0, 0),
(6, 1, 'Teacher', 0, '', 0, 0, 0),
(6, 2, 'Teacher', 0, '', 0, 0, 0),
(6, 3, 'Teacher', 0, '', 0, 0, 0),
(6, 4, 'Teacher', 0, '', 0, 0, 0),
(6, 5, 'Teacher', 0, '', 0, 0, 0),
(6, 6, 'Teacher', 0, '', 0, 0, 0),
(8, 2147483647, 'Student', 0, '', 0, 0, 0),
(8, 2147483647, 'Student', 0, '', 0, 0, 0),
(8, 2147483647, 'Teacher', 0, '', 0, 0, 0),
(8, 2147483647, 'Teacher', 0, '', 0, 0, 0),
(8, 2147483647, 'Teacher', 0, '', 0, 0, 0),
(10, 2147483647, 'Student', 0, '', 0, 0, 0),
(10, 707525, 'Student', 0, '', 0, 0, 0),
(10, 2147483647, 'Student', 0, '', 0, 0, 0),
(10, 2147483647, 'Student', 0, '', 0, 0, 0),
(10, 2147483647, 'Student', 0, '', 0, 0, 0),
(11, 2147483647, 'Student', 0, '', 0, 0, 0),
(11, 707525, 'Student', 0, '', 0, 0, 0),
(11, 2147483647, 'Student', 0, '', 0, 0, 0),
(11, 2147483647, 'Student', 0, '', 0, 0, 0),
(11, 2147483647, 'Student', 0, '', 0, 0, 0),
(11, 2147483647, 'Student', 0, '', 0, 0, 0),
(11, 707, 'Teacher', 0, '', 0, 0, 0),
(11, 6200000, 'Teacher', 0, '', 0, 0, 0),
(12, 2147483647, 'Student', 0, '', 0, 0, 0),
(12, 707525, 'Student', 0, '', 0, 0, 0),
(12, 2147483647, 'Student', 0, '', 0, 0, 0),
(12, 2147483647, 'Student', 0, '', 0, 0, 0),
(12, 2147483647, 'Student', 0, '', 0, 0, 0),
(12, 2147483647, 'Student', 0, '', 0, 0, 0),
(12, 707, 'Teacher', 0, '', 0, 0, 0),
(12, 6200000, 'Teacher', 0, '', 0, 0, 0),
(13, 2147483647, 'Student', 0, '', 0, 0, 0),
(13, 707525, 'Student', 0, '', 0, 0, 0),
(13, 2147483647, 'Student', 0, '', 0, 0, 0),
(13, 2147483647, 'Student', 0, '', 0, 0, 0),
(13, 2147483647, 'Student', 0, '', 0, 0, 0),
(13, 2147483647, 'Student', 0, '', 0, 0, 0),
(13, 707, 'Teacher', 0, '', 0, 0, 0),
(13, 6200000, 'Teacher', 0, '', 0, 0, 0),
(14, 2147483647, 'Student', 0, '', 0, 0, 0),
(14, 707525, 'Student', 0, '', 0, 0, 0),
(14, 2147483647, 'Student', 0, '', 0, 0, 0),
(14, 2147483647, 'Student', 0, '', 0, 0, 0),
(14, 2147483647, 'Student', 0, '', 0, 0, 0),
(14, 2147483647, 'Student', 0, '', 0, 0, 0),
(14, 707, 'Teacher', 0, '', 0, 0, 0),
(14, 6200000, 'Teacher', 0, '', 0, 0, 0),
(15, 2147483647, 'Student', 0, '', 0, 0, 0),
(15, 707525, 'Student', 0, '', 0, 0, 0),
(15, 2147483647, 'Student', 0, '', 0, 0, 0),
(15, 2147483647, 'Student', 0, '', 0, 0, 0),
(15, 2147483647, 'Student', 0, '', 0, 0, 0),
(15, 2147483647, 'Student', 0, '', 0, 0, 0),
(15, 707, 'Teacher', 0, '', 0, 0, 0),
(15, 6200000, 'Teacher', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `ef_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ef_id`, `amount`, `remarks`, `date_created`) VALUES
(4, 4, 200, 'fork', '2023-03-10 12:51:07'),
(9, 2, 3500, '', '2023-03-10 12:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `index_number` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `b_date` date NOT NULL,
  `_status` varchar(255) NOT NULL,
  `reg_year` year(4) NOT NULL,
  `reg_month` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `index_number`, `full_name`, `gender`, `address`, `phone`, `email`, `image_name`, `b_date`, `_status`, `reg_year`, `reg_month`, `reg_date`, `class_id`, `color`, `Id_School`) VALUES
(45, '45', 'rayen bhouri', 'Female', 'GHFGH', '56465412', 'GHFGH@F.CHJ', 'uploads/20220729082505.jpg', '0056-05-04', '', 2022, 'July', '2022-07-29', 64, '', 1),
(46, '707525', 'omar salhi', 'Male', '?? ???????', '12345678', 'samer.samm12@gmail.com', 'uploads/20220730034356.jpg', '2022-07-13', '', 2022, 'July', '2022-07-30', 64, '', 1),
(47, '444', 'Ahmed hdida', 'Male', 'ads', '53249239', 'ahmed@gmail.com', 'uploads/20220730090336.jpg', '2022-07-06', '', 2022, 'July', '2022-07-30', 67, '', 1),
(48, '887', 'nigga stambouli', 'Male', 'monastir', '32145678', 'mokasdfj@gmail.com', 'uploads/20220730101501.jpg', '0005-12-12', '', 2022, 'July', '2022-07-30', 68, '', 1),
(49, '101', 'fathi harzalah', 'Male', 'khnisi', '87654312', 'khnisi@gmail.com', 'uploads/20220731020812.jpeg', '2022-07-22', '', 2022, 'July', '2022-07-31', 68, '', 1),
(50, '68', 'samer samri', 'Male', '152 wolkier', '26406108', 'samer@gmail.com', 'uploads/20220731042550.jpg', '2022-07-06', '', 2022, 'July', '2022-07-31', 68, 'red', 1),
(51, '20220923055558632dd70eb67743051', 'Mohamed Mokdad', 'Male', 'Monastir', '99137937', 'mokdadmohamed10@gmail.com', 'uploads/20220923055558.jpg', '2004-01-01', '', 2022, 'September', '2022-09-23', 71, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `index_number`, `date`, `month`, `year`, `time`, `status`, `Id_School`) VALUES
(30, 707525, '2022-07-30', 'July', 2022, '09:48:57', 'Absent', 1),
(31, 707525, '2022-07-12', 'July', 2022, '09:49:03', 'Absent', 1),
(35, 45, '2022-07-31', 'July', 2022, '07:20:31', 'Absent', 1),
(36, 46, '2022-07-31', 'July', 2022, '07:20:39', 'Absent', 1),
(48, 50, '2022-07-31', 'July', 2022, '07:47:13', 'Absent', 1),
(49, 50, '2022-08-01', 'August', 2022, '07:00:40', 'Absent', 1),
(50, 50, '2022-08-02', 'August', 2022, '01:24:25', 'Absent', 1),
(51, 50, '2022-08-02', 'August', 2022, '04:08:26', 'Absent', 1),
(52, 50, '2022-08-12', 'August', 2022, '03:20:20', 'Retard', 1),
(53, 48, '2022-08-12', 'August', 2022, '00:00:41', 'Retard', 1),
(54, 49, '2022-08-12', 'August', 2022, '03:41:45', 'Retard', 1),
(55, 50, '2022-08-13', 'August', 2022, '03:44:17', 'Retard', 1),
(56, 50, '2022-08-13', 'August', 2022, '03:55:11', 'Retard', 1),
(57, 48, '2022-08-13', 'August', 2022, '03:55:14', 'Retard', 1),
(58, 49, '2022-08-13', 'August', 2022, '03:55:16', 'Retard', 1),
(59, 50, '2022-08-13', 'August', 2022, '04:14:31', 'Retard', 1),
(60, 48, '2022-08-13', 'August', 2022, '04:14:34', 'Retard', 1),
(61, 49, '2022-08-13', 'August', 2022, '04:14:37', 'Retard', 1),
(62, 50, '2022-08-13', 'August', 2022, '04:17:07', 'Retard', 1),
(63, 48, '2022-08-13', 'August', 2022, '04:24:44', 'Retard', 1),
(64, 49, '2022-08-13', 'August', 2022, '04:24:48', 'Absent', 1),
(65, 50, '2022-08-13', 'August', 2022, '04:52:45', 'Retard', 1),
(66, 48, '2022-08-13', 'August', 2022, '04:52:49', 'Absent', 1),
(67, 49, '2022-08-13', 'August', 2022, '04:52:52', 'Retard', 1),
(70, 50, '2022-08-13', 'August', 2022, '04:55:22', 'Absent', 1),
(71, 48, '2022-08-13', 'August', 2022, '04:55:25', 'Retard', 1),
(72, 49, '2022-08-13', 'August', 2022, '04:55:29', 'Retard', 1),
(76, 50, '2022-08-13', 'August', 2022, '05:07:06', 'Retard', 1),
(77, 48, '2022-08-13', 'August', 2022, '05:07:08', 'Retard', 1),
(78, 49, '2022-08-13', 'August', 2022, '05:07:11', 'Retard', 1),
(82, 48, '2022-08-13', 'August', 2022, '05:11:02', 'Billet Retard', 1),
(83, 48, '2022-08-13', 'August', 2022, '05:11:14', 'Billet Retard', 1),
(84, 50, '2022-08-13', 'August', 2022, '05:47:11', 'Absent', 1),
(85, 50, '2022-08-13', 'August', 2022, '05:49:29', 'Billet', 1),
(86, 50, '2022-08-13', 'August', 2022, '05:50:46', 'Retard', 1),
(87, 48, '2022-08-13', 'August', 2022, '05:50:48', 'Absent', 1),
(88, 49, '2022-08-13', 'August', 2022, '05:50:51', 'Absent', 1),
(89, 49, '2022-08-13', 'August', 2022, '05:51:10', 'Billet', 1),
(90, 48, '2022-08-13', 'August', 2022, '05:51:25', 'Billet', 1),
(91, 48, '2022-08-13', 'August', 2022, '06:45:30', 'Retard', 1),
(92, 49, '2022-08-13', 'August', 2022, '06:45:33', 'Absent', 1),
(93, 45, '2022-08-13', 'August', 2022, '11:35:02', 'Retard', 1),
(94, 49, '2022-08-19', 'August', 2022, '06:08:01', 'Billet', 1),
(95, 50, '2022-08-19', 'August', 2022, '06:08:04', 'Billet Retard', 1),
(96, 45, '2022-08-19', 'August', 2022, '06:08:10', 'Billet Retard', 1),
(97, 50, '2022-08-19', 'August', 2022, '06:09:23', 'Retard', 1),
(98, 49, '2022-08-19', 'August', 2022, '06:09:28', 'Absent', 1),
(99, 49, '2022-08-24', 'August', 2022, '04:36:13', 'Billet', 1),
(100, 50, '2022-08-24', 'August', 2022, '04:36:16', 'Billet Retard', 1),
(101, 48, '2022-08-24', 'August', 2022, '04:36:19', 'Billet Retard', 1),
(102, 50, '2022-08-24', 'August', 2022, '04:37:04', 'Absent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_ef_list`
--

CREATE TABLE `student_ef_list` (
  `id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `ef_no` varchar(200) NOT NULL,
  `course_id` int(30) NOT NULL,
  `total_fee` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_ef_list`
--

INSERT INTO `student_ef_list` (`id`, `student_id`, `ef_no`, `course_id`, `total_fee`, `date_created`) VALUES
(2, 51, '2020-65427823', 1, 4500, '2020-10-31 13:12:13'),
(4, 49, '5222', 1, 4500, '2023-03-07 15:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_exam`
--

INSERT INTO `student_exam` (`id`, `index_number`, `class_id`, `exam_id`, `subject_id`, `marks`, `year`, `date`, `Id_School`) VALUES
(73, 45, 64, 56, 43, '20', 2022, '2022-08-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `sr_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `reg_month` varchar(255) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `Id_School`) VALUES
(41, 'Phy', 1),
(43, 'math', 1),
(44, 'Tic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_routing`
--

CREATE TABLE `subject_routing` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject_routing`
--

INSERT INTO `subject_routing` (`id`, `class_id`, `subject_id`, `teacher_id`, `Id_School`) VALUES
(100, 71, 43, 36, 1),
(101, 71, 43, 83, 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Pro School', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `reg_date` date NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `color` varchar(25) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `full_name`, `gender`, `address`, `phone`, `email`, `image_name`, `index_number`, `reg_date`, `Subject`, `color`, `Id_School`) VALUES
(26, 'nacer arbi', 'Female', '5nis', '12312', 'mokdad@gakjsdf.com', 'uploads/20220729074936.jpg', 707, '2022-07-29', 'algorithme', '', 1),
(36, 'Ilyes Miladi', 'Male', 'Sousse', '87456321', 'ilyes@gmail.com', 'uploads/2022081073731.png', 9223372036854775807, '2022-08-01', 'math', 'red', 1),
(37, 'Mohamed Mokdad', 'Male', 'dsad', '53249239', 'sa@gmail.com', 'uploads/2022083032930.jpg', 9223372036854775807, '2022-08-03', 'algorithme', '', 1),
(81, 'fathi sakly', 'Male', 'hoter', '55234789', '123@gmail.com', 'uploads/20220731040657.jpg', 6200000, '2022-07-31', 'algorithme', 'red', 1),
(82, 'kali root', 'Male', 'root@gmail.com', '532492239', 'root@gmail.com', 'uploads/2023036093435.jpg', 9223372036854775807, '2023-03-06', 'Phy', '', 1),
(83, 'test101', 'Female', 'sahd llpog', '532492239', 'test101@gmail.com', 'uploads/2023037013659.jpg', 202303701365964072, '2023-03-07', 'math', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `time` time NOT NULL,
  `_status2` varchar(255) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`id`, `index_number`, `date`, `month`, `year`, `time`, `_status2`, `Id_School`) VALUES
(119, 6200000, '2022-07-29', 'July', 2022, '07:35:02', 'Absent', 1),
(123, 6200000, '2022-07-29', 'July', 2022, '07:41:19', 'Absent', 1),
(124, 6200000, '2022-07-30', 'July', 2022, '03:44:33', 'Absent', 1),
(125, 6200000, '2022-07-31', 'July', 2022, '05:11:00', 'Absent', 1),
(126, 6200000, '2022-08-03', 'August', 2022, '12:45:36', 'Absent', 1),
(127, 9223372036854775807, '2022-08-03', 'August', 2022, '12:52:26', 'Absent', 1),
(128, 6200000, '2022-08-03', 'August', 2022, '01:02:45', 'Absent', 1),
(129, 6200000, '2022-08-03', 'August', 2022, '01:04:51', 'Absent', 1),
(130, 6200000, '2022-08-03', 'August', 2022, '01:04:54', 'Absent', 1),
(131, 9223372036854775807, '2022-08-03', 'August', 2022, '01:05:33', 'Absent', 1),
(132, 6200000, '2022-08-08', 'August', 2022, '11:03:50', 'Absent', 1),
(133, 9223372036854775807, '2022-08-09', 'August', 2022, '05:02:43', 'Absent', 1),
(134, 6200000, '2022-08-14', 'August', 2022, '02:34:30', 'Absent', 1),
(135, 9223372036854775807, '2022-08-14', 'August', 2022, '03:16:00', 'Absent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_aver`
--

CREATE TABLE `teacher_aver` (
  `Id_student` int(11) NOT NULL,
  `Id_teacher` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `text` text NOT NULL,
  `Title` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `start_time` double(11,2) NOT NULL,
  `end_time` double(11,2) NOT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `class_id`, `day`, `subject_id`, `teacher_id`, `classroom_id`, `start_time`, `end_time`, `Id_School`) VALUES
(167, 68, 'Tuesday', 0, 35, 32, 5.00, 6.00, 1),
(168, 68, 'Monday', 43, 36, 36, 8.00, 10.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `type`) VALUES
(23, 'admin@gmail.com', '12345', 'Admin'),
(107, 'ilyes@gmail.com', '12345', 'Teacher'),
(108, 'sa@gmail.com', '12345', 'Teacher'),
(109, 'mokdadmohamed10@gmail.com', '12345', 'Student'),
(110, 'root@gmail.com', '12345', 'Teacher'),
(111, 'test101@gmail.com', '12345', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_number` (`index_number`),
  ADD KEY `index_number_2` (`index_number`);

--
-- Indexes for table `avertissement`
--
ALTER TABLE `avertissement`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_class` (`Id_class`),
  ADD KEY `Id_type` (`Id_type`),
  ADD KEY `Id_student` (`Id_student`),
  ADD KEY `Id_teacher` (`Id_teacher`);

--
-- Indexes for table `avertissement_type`
--
ALTER TABLE `avertissement_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `backup_homework`
--
ALTER TABLE `backup_homework`
  ADD PRIMARY KEY (`File_id`),
  ADD KEY `Id_school` (`Id_school`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_class` (`Id_School`);

--
-- Indexes for table `class_room`
--
ALTER TABLE `class_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_class` (`Id_School`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `event_category_type`
--
ALTER TABLE `event_category_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`,`class_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`,`exam_id`,`subject_id`,`classroom_id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD KEY `Id_class` (`Id_class`),
  ADD KEY `Id_teacher` (`Id_teacher`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `homework_upload`
--
ALTER TABLE `homework_upload`
  ADD PRIMARY KEY (`File_id`),
  ADD KEY `Id_class` (`Id_class`),
  ADD KEY `Id_school` (`Id_school`);

--
-- Indexes for table `ken wselet lahna contactini 3al numero ha4a`
--
ALTER TABLE `ken wselet lahna contactini 3al numero ha4a`
  ADD PRIMARY KEY (`99137937`);

--
-- Indexes for table `main_notifications`
--
ALTER TABLE `main_notifications`
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `student_ef_list`
--
ALTER TABLE `student_ef_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `subject_routing`
--
ALTER TABLE `subject_routing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`,`subject_id`,`teacher_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `teacher_aver`
--
ALTER TABLE `teacher_aver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_student` (`Id_student`),
  ADD KEY `Id_teacher` (`Id_teacher`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_School` (`Id_School`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `avertissement`
--
ALTER TABLE `avertissement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `avertissement_type`
--
ALTER TABLE `avertissement_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `backup_homework`
--
ALTER TABLE `backup_homework`
  MODIFY `File_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `class_room`
--
ALTER TABLE `class_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_category_type`
--
ALTER TABLE `event_category_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `homework_upload`
--
ALTER TABLE `homework_upload`
  MODIFY `File_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `student_ef_list`
--
ALTER TABLE `student_ef_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_exam`
--
ALTER TABLE `student_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subject_routing`
--
ALTER TABLE `subject_routing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `teacher_aver`
--
ALTER TABLE `teacher_aver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avertissement`
--
ALTER TABLE `avertissement`
  ADD CONSTRAINT `avertissement_ibfk_1` FOREIGN KEY (`Id_class`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avertissement_ibfk_2` FOREIGN KEY (`Id_student`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avertissement_ibfk_3` FOREIGN KEY (`Id_type`) REFERENCES `avertissement_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avertissement_ibfk_4` FOREIGN KEY (`Id_teacher`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `avertissement_type`
--
ALTER TABLE `avertissement_type`
  ADD CONSTRAINT `avertissement_type_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_room`
--
ALTER TABLE `class_room`
  ADD CONSTRAINT `class_room_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_category`
--
ALTER TABLE `event_category`
  ADD CONSTRAINT `event_category_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_category_type`
--
ALTER TABLE `event_category_type`
  ADD CONSTRAINT `event_category_type_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`Id_teacher`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`Id_class`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_ibfk_3` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `homework_upload`
--
ALTER TABLE `homework_upload`
  ADD CONSTRAINT `homework_upload_ibfk_1` FOREIGN KEY (`Id_school`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_routing`
--
ALTER TABLE `subject_routing`
  ADD CONSTRAINT `subject_routing_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_routing_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_routing_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_routing_ibfk_4` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD CONSTRAINT `teacher_attendance_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_aver`
--
ALTER TABLE `teacher_aver`
  ADD CONSTRAINT `teacher_aver_ibfk_1` FOREIGN KEY (`Id_student`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_aver_ibfk_2` FOREIGN KEY (`Id_teacher`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
