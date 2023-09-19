-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 08:27 AM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `notifications_Posted` int(11) NOT NULL DEFAULT 0,
  `adminDetailId` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `batchId` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `userId`, `notifications_Posted`, `adminDetailId`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(1, 48, 0, 29, 1, 1, '2023-09-15 09:12:12', '2023-09-15 09:12:12'),
(2, 46, 0, 28, 0, 1, '2023-09-15 09:18:17', '2023-09-15 09:18:17'),
(3, 58, 0, 35, 1, 1, '2023-09-17 21:37:28', '2023-09-17 21:37:28'),
(4, 59, 0, 36, 1, 1, '2023-09-17 21:56:56', '2023-09-17 21:56:56'),
(5, 61, 0, 37, 1, 1, '2023-09-17 21:57:45', '2023-09-17 21:57:45'),
(6, 63, 0, 38, 1, 1, '2023-09-17 21:59:57', '2023-09-17 21:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `attendanceDataId` bigint(20) UNSIGNED NOT NULL,
  `yes_or_no` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userRole` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`attendanceDataId`, `yes_or_no`, `userId`, `userRole`, `todaysDate`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(1, 10, 5, 3, '2023-09-12', 1, 1, NULL, '2023-09-17 07:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batchId` bigint(20) UNSIGNED NOT NULL,
  `batchName` varchar(255) NOT NULL,
  `batchStartingYear` varchar(255) NOT NULL,
  `batchEndingYear` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batchId`, `batchName`, `batchStartingYear`, `batchEndingYear`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Batch 2023-2024', '2023', '2024', '1', NULL, '2023-09-17 21:52:58'),
(18, 'a', '2121', '2222', '0', '2023-09-16 07:04:39', '2023-09-17 21:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `classroomDetailId` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(255) NOT NULL,
  `roomNo` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL DEFAULT '0',
  `departmentId` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `classTeacher` varchar(255) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 0,
  `classTimeTableId` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_rooms`
--

INSERT INTO `class_rooms` (`classroomDetailId`, `grade`, `roomNo`, `section`, `departmentId`, `semester`, `classTeacher`, `description`, `capacity`, `classTimeTableId`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(3, '$graded->gradeId', '3', '$section->sectionId', 0, 0, '$teacher->teacherId', 'was', 12, 0, 0, 1, '2023-09-15 09:51:11', '2023-09-15 09:51:11'),
(4, '$graded->gradeId', '44', '$section->sectionId', 0, 0, '$teacher->teacherId', 'es', 2, 0, 0, 1, '2023-09-18 22:46:41', '2023-09-18 22:46:41'),
(5, '$graded->gradeId', '3', '$section->sectionId', 0, 0, '$teacher->teacherId', '1', 3, 0, 0, 1, '2023-09-18 22:48:02', '2023-09-18 22:48:02'),
(6, '1', '4', '14', 0, 0, '1', '4', 44, 0, 0, 1, '2023-09-18 22:52:44', '2023-09-18 22:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `constant_controllers`
--

CREATE TABLE `constant_controllers` (
  `constantId` bigint(20) UNSIGNED NOT NULL,
  `constantName` varchar(255) NOT NULL,
  `constantValue` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constant_controllers`
--

INSERT INTO `constant_controllers` (`constantId`, `constantName`, `constantValue`, `created_at`, `updated_at`) VALUES
(1, 'defaultPassword', 'abcd1234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daily_teacher_allocation`
--

CREATE TABLE `daily_teacher_allocation` (
  `daily_Teacher_AllocationId` bigint(20) UNSIGNED NOT NULL,
  `classRoomId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `dayId` int(20) NOT NULL,
  `hourId` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `subjectForSectionId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_teacher_allocation`
--

INSERT INTO `daily_teacher_allocation` (`daily_Teacher_AllocationId`, `classRoomId`, `teacherId`, `subjectId`, `dayId`, `hourId`, `date`, `status`, `batchId`, `subjectForSectionId`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 0, 1, '2023-09-08', 2, NULL, 2, NULL, '2023-09-06 02:17:05'),
(107, 2, 1, 1, 24, 1, '2023-09-28', 1, 1, 4, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(108, 2, 1, 1, 24, 2, '2023-09-28', 1, 1, 4, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(109, 2, 1, 1, 24, 3, '2023-09-28', 1, 1, 4, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(110, 2, 1, 1, 24, 4, '2023-09-28', 1, 1, 4, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(111, 2, 1, 1, 24, 5, '2023-09-28', 1, 1, 4, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(112, 2, 2, 1, 24, 1, '2023-09-28', 1, 1, 5, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(113, 2, 2, 1, 24, 2, '2023-09-28', 1, 1, 5, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(114, 2, 2, 1, 24, 3, '2023-09-28', 1, 1, 5, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(115, 2, 2, 1, 24, 4, '2023-09-28', 1, 1, 5, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(116, 2, 2, 1, 24, 5, '2023-09-28', 1, 1, 5, '2023-09-15 02:02:05', '2023-09-15 02:02:05'),
(117, 2, 1, 1, 24, 1, '2023-09-15', 1, 1, 4, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(118, 2, 1, 1, 24, 2, '2023-09-15', 1, 1, 4, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(119, 2, 1, 1, 24, 3, '2023-09-15', 1, 1, 4, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(120, 2, 1, 1, 24, 4, '2023-09-15', 1, 1, 4, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(121, 2, 1, 1, 24, 5, '2023-09-15', 1, 1, 4, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(122, 2, 2, 1, 24, 1, '2023-09-15', 1, 1, 5, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(123, 2, 2, 1, 24, 2, '2023-09-15', 1, 1, 5, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(124, 2, 2, 1, 24, 3, '2023-09-15', 1, 1, 5, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(125, 2, 2, 1, 24, 4, '2023-09-15', 1, 1, 5, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(126, 2, 2, 1, 24, 5, '2023-09-15', 1, 1, 5, '2023-09-15 08:18:06', '2023-09-15 08:18:06'),
(127, 2, 1, 1, 24, 1, '2023-09-15', 1, 1, 4, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(128, 2, 1, 1, 24, 2, '2023-09-15', 1, 1, 4, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(129, 2, 1, 1, 24, 3, '2023-09-15', 1, 1, 4, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(130, 2, 1, 1, 24, 4, '2023-09-15', 1, 1, 4, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(131, 2, 1, 1, 24, 5, '2023-09-15', 1, 1, 4, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(132, 2, 2, 1, 24, 1, '2023-09-15', 1, 1, 5, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(133, 2, 2, 1, 24, 2, '2023-09-15', 1, 1, 5, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(134, 2, 2, 1, 24, 3, '2023-09-15', 1, 1, 5, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(135, 2, 2, 1, 24, 4, '2023-09-15', 1, 1, 5, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(136, 2, 2, 1, 24, 5, '2023-09-15', 1, 1, 5, '2023-09-15 08:21:18', '2023-09-15 08:21:18'),
(137, 2, 1, 1, 24, 1, '2023-09-16', 1, 1, 4, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(138, 2, 1, 1, 24, 2, '2023-09-16', 1, 1, 4, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(139, 2, 1, 1, 24, 3, '2023-09-16', 1, 1, 4, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(140, 2, 1, 1, 24, 4, '2023-09-16', 1, 1, 4, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(141, 2, 1, 1, 24, 5, '2023-09-16', 1, 1, 4, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(142, 2, 2, 1, 24, 1, '2023-09-16', 1, 1, 5, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(143, 2, 2, 1, 24, 2, '2023-09-16', 1, 1, 5, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(144, 2, 2, 1, 24, 3, '2023-09-16', 1, 1, 5, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(145, 2, 2, 1, 24, 4, '2023-09-16', 1, 1, 5, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(146, 2, 2, 1, 24, 5, '2023-09-16', 1, 1, 5, '2023-09-15 08:23:24', '2023-09-15 08:23:24'),
(147, 2, 1, 1, 24, 1, '2023-09-23', 1, 1, 4, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(148, 2, 1, 1, 24, 2, '2023-09-23', 1, 1, 4, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(149, 2, 1, 1, 24, 3, '2023-09-23', 1, 1, 4, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(150, 2, 1, 1, 24, 4, '2023-09-23', 1, 1, 4, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(151, 2, 1, 1, 24, 5, '2023-09-23', 1, 1, 4, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(152, 2, 2, 1, 24, 1, '2023-09-23', 1, 1, 5, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(153, 2, 2, 1, 24, 2, '2023-09-23', 1, 1, 5, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(154, 2, 2, 1, 24, 3, '2023-09-23', 1, 1, 5, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(155, 2, 2, 1, 24, 4, '2023-09-23', 1, 1, 5, '2023-09-15 08:29:04', '2023-09-15 08:29:04'),
(156, 2, 2, 1, 24, 5, '2023-09-23', 1, 1, 5, '2023-09-15 08:29:04', '2023-09-15 08:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `dayId` bigint(20) UNSIGNED NOT NULL,
  `dayName` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`dayId`, `dayName`, `status`, `created_at`, `updated_at`) VALUES
(23, 'Monday', 1, NULL, NULL),
(24, 'Friday', 1, '2023-09-08 05:42:20', '2023-09-16 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentId` bigint(20) UNSIGNED NOT NULL,
  `departmentName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentId`, `departmentName`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(1, 'Mechanical Engineering', 1, NULL, NULL, NULL),
(3, 'vvv', 0, 0, '2023-09-09 01:40:43', '2023-09-09 01:40:43'),
(9, 'Ad', 1, 1, '2023-09-13 05:02:08', '2023-09-16 07:02:19'),
(10, 'a', 1, 17, '2023-09-16 07:04:56', '2023-09-16 07:04:56'),
(11, 'a', 1, 17, '2023-09-16 07:05:03', '2023-09-16 07:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `detailId` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `contactNumber` int(11) NOT NULL DEFAULT 0,
  `alternateContactNumber` int(11) NOT NULL DEFAULT 0,
  `roleId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '0',
  `bloodGroup` varchar(255) NOT NULL DEFAULT '0',
  `identificationMark` varchar(255) NOT NULL,
  `parentNumber` int(11) NOT NULL,
  `homePhoneNumber` int(11) NOT NULL DEFAULT 0,
  `fatherSpouseName` varchar(255) NOT NULL DEFAULT '0',
  `motherName` varchar(255) NOT NULL,
  `guardianName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`detailId`, `firstname`, `lastname`, `age`, `dob`, `contactNumber`, `alternateContactNumber`, `roleId`, `userId`, `address`, `bloodGroup`, `identificationMark`, `parentNumber`, `homePhoneNumber`, `fatherSpouseName`, `motherName`, `guardianName`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(2, 'Sean', 'M', 1, '2023-09-04', 1, 1, 4, 8, 'A', 'A', 'A', 1, 1, 'A', 'A', 'A', 1, 1, NULL, NULL),
(4, '', '', 1, '2023-08-31', 1, 1, 2, 9, 'a', 'a', 'a', 1, 1, 'ar', 'at', 'ay', 1, 1, '2023-09-07 01:04:27', '2023-09-15 03:07:04'),
(5, 'Sean', 'M', 1, '2023-09-21', 1, 1, 4, 5, 'A', 'A', 'A', 1, 1, 'A', 'A', 'A', 1, 1, NULL, '2023-09-07 22:00:55'),
(30, 'g', 'n', 4, '2023-09-14', 8, 6, 4, 54, 'f', 'f', 'f', 0, 0, 'd', 'd', 'd', 1, 17, '2023-09-16 07:27:04', '2023-09-16 07:27:04'),
(31, 'A', 'd', 4, '2023-09-28', 5, 5, 2, 55, 'h', 'h', 'h', 8, 8, 'l', 'l', 'l', 1, 17, '2023-09-17 20:58:27', '2023-09-17 20:58:27'),
(32, 'A', 'd', 4, '2023-09-28', 5, 5, 2, 57, 'h', 'h', 'h', 8, 8, 'l', 'l', 'l', 1, 17, '2023-09-17 20:59:19', '2023-09-17 20:59:19'),
(33, 'Sharma', 'S', 12, '2023-09-21', 12, 12, 4, 8, 'g', 'g', 'g', 12, 12, 'g', 'g', 'g', 0, 1, '2023-09-17 21:28:05', '2023-09-17 21:28:05'),
(34, 'w', 'w', 1, '2023-09-21', 1, 1, 3, 58, 'www', 'ww', 'ww', 11, 11, 'wwww', 'wwwwwww', 'wwwwwwwwww', 0, 1, '2023-09-17 21:37:09', '2023-09-17 21:37:09'),
(35, 'w', 'w', 1, '2023-09-21', 1, 1, 3, 58, 'www', 'ww', 'ww', 11, 11, 'wwww', 'wwwwwww', 'wwwwwwwwww', 0, 1, '2023-09-17 21:37:28', '2023-09-17 21:37:28'),
(36, 'SSS', 'dd', 1, '2023-09-14', 5, 5, 3, 59, 'h', 'h', 'h', 4, 4, 'l', 'fged', 'e', 1, 1, '2023-09-17 21:56:56', '2023-09-17 21:56:56'),
(37, 'SSS', 'dd', 1, '2023-09-14', 5, 5, 3, 61, 'h', 'h', 'h', 4, 4, 'l', 'fged', 'e', 1, 1, '2023-09-17 21:57:45', '2023-09-17 21:57:45'),
(38, 'SSS', 'dd', 1, '2023-09-14', 5, 5, 3, 63, 'h', 'h', 'h', 4, 4, 'l', 'fged', 'e', 1, 1, '2023-09-17 21:59:57', '2023-09-17 21:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeId` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gradeId`, `grade`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(1, '12', 1, 1, NULL, '2023-09-16 06:55:04'),
(4, 'k', 0, 0, '2023-09-17 21:52:50', '2023-09-17 21:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `hourId` bigint(20) UNSIGNED NOT NULL,
  `hourName` varchar(255) NOT NULL,
  `hourStartingTime` time DEFAULT '00:00:00',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '2014_10_12_000000_create_users_table', 1),
(25, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(28, '2023_06_22_042001_create_admins_table', 1),
(29, '2023_06_22_042257_create_teachers_table', 1),
(30, '2023_06_22_042323_create_students_table', 1),
(31, '2023_06_22_042640_create_grades_table', 1),
(32, '2023_06_22_042659_create_sections_table', 1),
(33, '2023_06_22_042717_create_subjects_table', 1),
(34, '2023_06_22_042750_create_attendences_table', 1),
(35, '2023_06_22_044946_create_class_rooms_table', 1),
(36, '2023_06_22_050529_create_roles_table', 1),
(37, '2023_06_22_050555_create_details_table', 1),
(38, '2023_06_22_050640_create_security_facilities_table', 1),
(39, '2023_08_26_082501_semester', 1),
(40, '2023_08_26_083014_create_departments_table', 1),
(41, '2023_08_28_143428_create_student_marks_table', 1),
(42, '2023_09_01_062547_create_subject_teacher_for_each_sections_table', 1),
(43, '2023_09_01_145636_create_constant_controllers_table', 1),
(44, '2023_09_02_150836_create_student_subject_attendances_table', 1),
(45, '2023_09_03_132547_create_days_table', 1),
(46, '2023_09_03_132825_create_hours_table', 1),
(47, '2023_09_05_141238_daily_teacher_allocation', 2),
(48, '2023_09_08_045851_create_batches_table', 3),
(49, '2023_09_13_100012_create_statuses_table', 4),
(50, '2023_09_17_113119_create_todos_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` bigint(20) UNSIGNED NOT NULL,
  `roleName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New User', 1, NULL, '2023-09-16 06:42:39'),
(2, 'Teacher', 1, NULL, NULL),
(3, 'Admin', 1, NULL, NULL),
(4, 'Student', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sectionId` bigint(20) UNSIGNED NOT NULL,
  `sectionName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sectionId`, `sectionName`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(14, 'A', 1, 1, '2023-09-18 22:46:00', '2023-09-18 22:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `security_facilities`
--

CREATE TABLE `security_facilities` (
  `securityId` bigint(20) UNSIGNED NOT NULL,
  `detail1` varchar(255) NOT NULL,
  `detail2` varchar(255) NOT NULL DEFAULT '',
  `detail3` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semesterId` bigint(20) UNSIGNED NOT NULL,
  `semesterName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semesterId`, `semesterName`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(1, 'Semester 13', 1, 1, NULL, '2023-09-16 07:08:40'),
(2, 'Semester 22', 1, 1, NULL, '2023-09-16 07:11:49'),
(3, '1', 1, 1, '2023-09-16 07:07:53', '2023-09-16 07:07:53'),
(4, 'AS', 1, 1, '2023-09-18 22:57:31', '2023-09-18 22:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `statusId` bigint(20) UNSIGNED NOT NULL,
  `statusForRoles` int(11) NOT NULL,
  `statusName` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`statusId`, `statusForRoles`, `statusName`, `created_at`, `updated_at`) VALUES
(1, 2, 'Active', '2023-09-13 04:50:25', '2023-09-13 04:50:25'),
(3, 6, 'S', '2023-09-14 11:11:13', '2023-09-14 11:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `studentDetailsId` int(11) NOT NULL,
  `studentClassroom` int(11) NOT NULL,
  `studentGrade` int(11) NOT NULL,
  `studentSection` int(11) NOT NULL,
  `studentSemester` int(11) NOT NULL,
  `studentDepartmentId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `userId`, `studentDetailsId`, `studentClassroom`, `studentGrade`, `studentSection`, `studentSemester`, `studentDepartmentId`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 3, 1, 1, 1, 1, 2, 1, NULL, '2023-09-13 03:56:32'),
(3, 8, 5, 2, 1, 1, 1, 1, 3, 1, NULL, '2023-09-13 03:56:36'),
(4, 8, 5, 2, 1, 1, 1, 1, 3, 1, NULL, '2023-09-13 03:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `student_marksId` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `classRoomId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`student_marksId`, `userId`, `studentId`, `classRoomId`, `subjectId`, `marks`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(33, 6, 1, 3, 1, 0, 3, 0, '2023-09-15 00:50:07', '2023-09-15 00:50:07'),
(34, 8, 3, 2, 1, 0, 3, 0, '2023-09-15 00:50:07', '2023-09-15 00:50:07'),
(35, 6, 1, 3, 1, 0, 3, 1, '2023-09-15 00:50:23', '2023-09-15 00:50:23'),
(36, 8, 3, 2, 1, 0, 3, 1, '2023-09-15 00:50:23', '2023-09-15 00:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject_attendances`
--

CREATE TABLE `student_subject_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classRoomId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `dayId` int(11) NOT NULL,
  `hourId` int(11) NOT NULL,
  `presentOrAbsent` int(11) NOT NULL,
  `submitted` int(11) NOT NULL,
  `dailyTeacherAllocationId` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectId` bigint(20) UNSIGNED NOT NULL,
  `semesterId` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `subjectName` varchar(255) NOT NULL,
  `subjectGrade` varchar(255) NOT NULL,
  `subjectMaxMarks` varchar(255) NOT NULL,
  `subjectTextName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectId`, `semesterId`, `departmentId`, `subjectName`, `subjectGrade`, `subjectMaxMarks`, `subjectTextName`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Data sScience', '1', '1', 'A', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher_for_each_sections`
--

CREATE TABLE `subject_teacher_for_each_sections` (
  `subjectForSectionId` bigint(20) UNSIGNED NOT NULL,
  `teacherId` int(11) NOT NULL,
  `classRoomId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_teacher_for_each_sections`
--

INSERT INTO `subject_teacher_for_each_sections` (`subjectForSectionId`, `teacherId`, `classRoomId`, `subjectId`, `departmentId`, `semesterId`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 1, 6, 1, 1, 1, '2023-09-09 07:49:09', '2023-09-09 07:49:09'),
(5, 2, 2, 2, 6, 1, 1, 1, '2023-09-09 07:49:09', '2023-09-09 07:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherId` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `teacherDetailId` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `batchId` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherId`, `userId`, `teacherDetailId`, `status`, `batchId`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 1, 1, NULL, NULL),
(2, 55, 31, 1, 1, NULL, NULL),
(3, 57, 32, 1, 1, '2023-09-17 20:59:19', '2023-09-17 20:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `detailsId` int(20) NOT NULL DEFAULT 0,
  `phone` int(20) NOT NULL DEFAULT 0,
  `role` int(20) NOT NULL DEFAULT 1,
  `batchId` int(20) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `email_verified_at`, `password`, `detailsId`, `phone`, `role`, `batchId`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'S', 'seansanthoshmanjaly@gmail.com', NULL, '$2y$10$OQ/VS7f5Tt6lhnR6uv.iM.0AjU07I1ESVsmCAf31.LFTx54Hk155a', 5, 999999999, 2, 1, NULL, '2023-09-04 10:41:09', '2023-09-07 22:05:27'),
(6, 'Sean', 'seanmanjaly@gmail.com', NULL, '$2y$10$B3zB6r7lGoIMaBVSiOSDG.LKIEi4Brjowz0ObwLD.mlzeuXc6hMIS', 3, 777, 4, 1, NULL, '2023-09-05 00:48:00', '2023-09-05 00:48:00'),
(8, 'Sean', 'seanmanjalys@gmail.com', NULL, '$2y$10$B3zB6r7lGoIMaBVSiOSDG.LKIEi4Brjowz0ObwLD.mlzeuXc6hMIS', 33, 66, 4, 1, NULL, '2023-09-05 00:48:00', '2023-09-17 21:28:05'),
(9, 'a a', 'a@a.com', '0000-00-00 00:00:00', '$2y$10$Q5FTjwyZ9.UkkHEZcfncIe5frwJp/N0BOdASPUo7tuE71Yb3LJ5yG', 4, 1, 2, 1, '', '2023-09-07 01:04:27', '2023-09-07 01:04:27'),
(13, 'g g', 'g@g', '0000-00-00 00:00:00', '$2y$10$9p7vmFyQ42T6JbFo2egj4OoQEki.a5QPdHwjw2v8oMhWhjUx3toNS', 6, 7, 4, 1, '', '2023-09-07 05:08:44', '2023-09-07 05:08:44'),
(36, 'd d', 'd@d', '0000-00-00 00:00:00', '$2y$10$NKetdoOeHSdJluwJmc5M1.osnyUcO6XcNgPl1ZDW/9AZJ576sh3Py', 22, 1, 4, 0, '', '2023-09-08 01:40:30', '2023-09-08 01:40:30'),
(37, 'q q', 'q@a', '0000-00-00 00:00:00', '$2y$10$bMheQLoq.vwd2EUcWWQ25.TK4KwGl.YmXZACtk.PJxmrBowt.ZVGi', 23, 1, 4, 0, '', '2023-09-08 01:41:04', '2023-09-08 01:41:04'),
(38, 'h h', 'h@h', '0000-00-00 00:00:00', '$2y$10$EX64SDLb27aV012xeRD8AOh1zkGIL2IbNehaNocG12pnHSW.WHlF.', 24, 5, 4, 0, '', '2023-09-08 01:42:01', '2023-09-08 01:42:01'),
(39, 'b b', 'b@n', '0000-00-00 00:00:00', '$2y$10$9nzp.2lrnS5e2RPHs2pNHejDL/1CRNTwwDQWbCGWB0EsJ7ZoAkSLO', 25, 6, 4, 0, '', '2023-09-08 01:50:56', '2023-09-08 01:50:56'),
(40, 'R R', 'rr@r', '0000-00-00 00:00:00', '$2y$10$GRhfuVaPY6dAqEBWXr/CM.rDbJiFHbCwr13/2xegQmFYfVLAwbJ5u', 26, 44, 4, 1, '', '2023-09-09 01:36:47', '2023-09-09 01:36:48'),
(41, '', 's@s', NULL, '$2y$10$2daUxKRoYK2jQChzKWOF6.J7.9KNlz0v.cOlt8d/ZXv.1K811FB0a', 0, 1, 3, 1, '', '2023-09-15 08:55:01', '2023-09-15 08:55:01'),
(43, '', 'w@waqq', NULL, '$2y$10$JA7Jpmm8frKbVJdU2WUAw.4tG5CM1ssU.SJVVQdJ4JX9uGbIiIE4a', 0, 1, 3, 1, '', '2023-09-15 09:08:34', '2023-09-15 09:08:34'),
(45, '', 'w@waqqrererere', NULL, '$2y$10$GaUP.QYiKPmU5v.OIVGLh.Z8/LAeWrUNt82t87CIqBrC5H.Rpillu', 27, 1, 3, 1, '', '2023-09-15 09:09:04', '2023-09-15 09:09:04'),
(46, '', 'w@dfdsf', NULL, '$2y$10$qXsKk5aezYlHE3vmKgTcPuq0c9B4RopJxYZtQaj1QWfAOYw1TdYJe', 0, 1, 2, 1, '', '2023-09-15 09:11:10', '2023-09-15 09:18:17'),
(48, '', 'w@dewdffdsf', NULL, '$2y$10$NeC/Meb.qwFBgFO3gKOAE..cDL05iqE5equUWvKdKLMqTXfv0ieHa', 29, 1, 3, 1, '', '2023-09-15 09:12:12', '2023-09-15 09:12:12'),
(49, 'Sam ds', 's@gfgfg', '0000-00-00 00:00:00', '$2y$10$DqGeKYKhepkNGrfWkRP.H.HZi03N5YV29rRIBcz1EZYVSltZ1jNHe', 0, 23, 4, 17, '', '2023-09-16 07:23:23', '2023-09-16 07:23:23'),
(51, 'Sam ds', 's@gfgfwwwwwwg', '0000-00-00 00:00:00', '$2y$10$.SySK1ruo24/nyry/8Y9Ee1IhMJrboK3CzPjRMHGysftwPaoXWGsm', 0, 23, 4, 17, '', '2023-09-16 07:24:22', '2023-09-16 07:24:22'),
(52, 'SS sss', 's@dscer', '0000-00-00 00:00:00', '$2y$10$VZusMelB19oGB2tKbBZoROc21w6c.gTr3joR33/Vk.L0x/pll7JUS', 0, 1, 4, 17, '', '2023-09-16 07:25:43', '2023-09-16 07:25:43'),
(54, 'g n', 'g@ggfvbx', '0000-00-00 00:00:00', '$2y$10$1yD1aUvbDdJdGS/V7/AGb..7esWZOGeNPJ/XV5jzcBrcbhXUnNVFK', 30, 3, 4, 17, '', '2023-09-16 07:27:04', '2023-09-16 07:27:04'),
(55, '', 'a@aui', NULL, '$2y$10$G.Wm2ux6trxXfwfbXdgsLunz1ziuV8jggafmrrjqTu0o9l2reQc7m', 0, 4, 2, 17, '', '2023-09-17 20:58:27', '2023-09-17 20:58:27'),
(57, '', 'a@auikio', NULL, '$2y$10$8ORvKN/ir89pOyu/JfU6xuCjaZXVfJVVfJJDJF8smhLlCiAdM5pNO', 32, 4, 2, 17, '', '2023-09-17 20:59:19', '2023-09-17 20:59:19'),
(58, 'Sharma', 'seans@gmail.com', NULL, '$2y$10$K5m03p8Y1kCsNal/v.1cZuN/A5dVZmYfHr6eNHbNabJX58vyIfAjq', 35, 0, 3, 0, '', '2023-09-17 21:26:08', '2023-09-17 21:37:28'),
(59, '', 'd@ghgv', NULL, '$2y$10$qVGDuVaZGx5jWZr25jO80.6Iah7KWrLT3e/cI2DOuyvyiBIJ8bPre', 36, 2, 3, 1, '', '2023-09-17 21:56:56', '2023-09-17 21:56:56'),
(61, '', 'dsx@rcghgv', NULL, '$2y$10$tzvTBtlmzIgGxNBGBtCEB.bzLM8QkEU3O5/QGhVrkGvdQczoTcqSa', 37, 2, 3, 1, '', '2023-09-17 21:57:45', '2023-09-17 21:57:45'),
(63, '', 'dxxxsx@rcghgv', NULL, '$2y$10$wifAkY23tI/JTvM1U.HBneuI0WmRAqYgscseoWwWeekJUCcPxU0X6', 38, 2, 3, 1, '', '2023-09-17 21:59:57', '2023-09-17 21:59:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`attendanceDataId`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batchId`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`classroomDetailId`);

--
-- Indexes for table `constant_controllers`
--
ALTER TABLE `constant_controllers`
  ADD PRIMARY KEY (`constantId`);

--
-- Indexes for table `daily_teacher_allocation`
--
ALTER TABLE `daily_teacher_allocation`
  ADD PRIMARY KEY (`daily_Teacher_AllocationId`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`dayId`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`detailId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeId`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`hourId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sectionId`);

--
-- Indexes for table `security_facilities`
--
ALTER TABLE `security_facilities`
  ADD PRIMARY KEY (`securityId`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semesterId`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`student_marksId`);

--
-- Indexes for table `student_subject_attendances`
--
ALTER TABLE `student_subject_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `subject_teacher_for_each_sections`
--
ALTER TABLE `subject_teacher_for_each_sections`
  ADD PRIMARY KEY (`subjectForSectionId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `attendanceDataId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batchId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `classroomDetailId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `constant_controllers`
--
ALTER TABLE `constant_controllers`
  MODIFY `constantId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daily_teacher_allocation`
--
ALTER TABLE `daily_teacher_allocation`
  MODIFY `daily_Teacher_AllocationId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `dayId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `detailId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `hourId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sectionId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `security_facilities`
--
ALTER TABLE `security_facilities`
  MODIFY `securityId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semesterId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `statusId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `student_marksId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student_subject_attendances`
--
ALTER TABLE `student_subject_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject_teacher_for_each_sections`
--
ALTER TABLE `subject_teacher_for_each_sections`
  MODIFY `subjectForSectionId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
