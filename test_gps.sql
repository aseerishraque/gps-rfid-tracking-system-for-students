-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2022 at 04:58 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_gps`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `classroom_id`, `title`, `description`, `document`, `created_at`, `updated_at`) VALUES
(7, 1, 'Waitress1', 'She had just succeeded in curving it down into its mouth again, and made a rush at the beginning,\'.', 'dummyfiles/3.pdf', '2022-04-07 01:37:34', '2022-04-07 03:21:22'),
(8, 1, 'Business Operations Specialist', 'Alice; \'you needn\'t be afraid of it. Presently the Rabbit came up to them to be lost: away went.', 'dummyfiles/1.pdf', '2022-04-07 01:37:34', '2022-04-07 01:37:34'),
(9, 1, 'Registered Nurse', 'Rabbit\'s--\'Pat! Pat! Where are you?\' said the Footman, and began singing in its sleep \'Twinkle.', 'dummyfiles/3.pdf', '2022-04-07 01:37:34', '2022-04-07 01:37:34'),
(10, 1, 'Nisi hic in porro is', 'Magna anim magna und', 'announcements/announcement_user_1_no_11.pdf', '2022-04-07 02:30:24', '2022-04-07 03:22:34'),
(12, 2, 'Classtest', 'Classtest', NULL, '2022-06-27 00:03:45', '2022-06-27 00:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `is_present` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `classroom_id`, `student_id`, `date`, `is_present`, `created_at`, `updated_at`) VALUES
(8, 1, 2, '2022-02-18', 1, '2022-04-06 03:06:55', '2022-04-06 03:06:55'),
(7, 1, 3, '2022-02-16', 1, '2022-02-16 01:56:04', '2022-02-16 01:56:04'),
(6, 1, 4, '2022-02-16', 1, '2022-02-16 01:30:05', '2022-02-16 01:30:05'),
(5, 1, 2, '2022-02-16', 1, '2022-02-16 01:30:05', '2022-02-16 01:30:05'),
(9, 1, 2, '2022-02-19', 1, '2022-04-06 03:06:55', '2022-04-06 03:06:55'),
(10, 1, 2, '2022-02-20', 1, '2022-04-06 03:06:55', '2022-04-06 03:06:55'),
(11, 1, 2, '2022-02-21', 1, '2022-04-06 03:06:55', '2022-04-06 03:06:55'),
(12, 1, 2, '2022-04-07', 1, '2022-04-06 22:20:13', '2022-04-06 22:20:13'),
(13, 1, 2, '2022-04-08', 1, '2022-04-06 22:20:13', '2022-04-06 22:20:13'),
(14, 1, 2, '2022-04-09', 1, '2022-04-06 22:20:13', '2022-04-06 22:20:13'),
(15, 1, 2, '2022-04-10', 1, '2022-04-06 22:20:13', '2022-04-06 22:20:13'),
(16, 1, 2, '2022-04-11', 1, '2022-04-06 22:20:13', '2022-04-06 22:20:13'),
(17, 1, 2, '2022-04-12', 1, '2022-04-06 22:20:13', '2022-04-06 22:20:13'),
(18, 1, 2, '2022-04-13', 1, '2022-04-06 22:20:13', '2022-04-06 22:20:13'),
(19, 1, 4, '2022-04-07', 1, '2022-04-06 22:44:47', '2022-04-06 22:44:47'),
(20, 1, 5, '2022-04-07', 1, '2022-04-06 22:47:42', '2022-04-06 22:47:42'),
(21, 1, 4, '2022-05-10', 1, '2022-05-10 05:47:42', '2022-05-10 05:47:42'),
(22, 1, 5, '2022-05-10', 1, '2022-05-10 05:47:42', '2022-05-10 05:47:42'),
(23, 1, 2, '2022-05-28', 1, '2022-05-28 04:59:39', '2022-05-28 04:59:39'),
(24, 1, 3, '2022-05-28', 1, '2022-05-28 04:59:39', '2022-05-28 04:59:39'),
(25, 1, 4, '2022-05-28', 1, '2022-05-28 04:59:39', '2022-05-28 04:59:39'),
(26, 1, 5, '2022-05-28', 1, '2022-05-28 04:59:39', '2022-05-28 04:59:39'),
(27, 1, 6, '2022-05-28', 1, '2022-05-28 04:59:39', '2022-05-28 04:59:39'),
(28, 1, 7, '2022-05-28', 1, '2022-05-28 04:59:39', '2022-05-28 04:59:39'),
(29, 1, 8, '2022-05-28', 1, '2022-05-28 04:59:39', '2022-05-28 04:59:39'),
(30, 2, 2, '2022-06-27', 1, '2022-06-26 22:20:00', '2022-06-27 00:01:37'),
(31, 2, 3, '2022-06-27', 1, '2022-06-26 22:20:00', '2022-06-27 00:08:19'),
(32, 2, 4, '2022-06-27', 1, '2022-06-26 22:20:00', '2022-06-27 00:08:19'),
(33, 2, 5, '2022-06-27', 1, '2022-06-26 22:20:00', '2022-06-27 00:08:19'),
(34, 2, 6, '2022-06-27', 1, '2022-06-26 22:20:00', '2022-06-27 00:08:19'),
(35, 2, 7, '2022-06-27', 1, '2022-06-26 22:20:00', '2022-06-27 00:08:19'),
(36, 2, 8, '2022-06-27', 1, '2022-06-26 22:20:00', '2022-06-27 00:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

DROP TABLE IF EXISTS `classrooms`;
CREATE TABLE IF NOT EXISTS `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_days` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `join_code` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_msg_guardian` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `user_id`, `name`, `section`, `working_days`, `marks`, `join_code`, `send_msg_guardian`, `created_at`, `updated_at`) VALUES
(1, 1, 'Class 9', 'A', 32, 100, 'WWVCL5', 1, '2021-08-05 09:47:21', '2021-08-05 09:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `classroom_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(14, 2, 2, '2022-06-26 23:59:56', '2022-06-26 23:59:56'),
(3, 1, 3, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(4, 1, 4, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(5, 1, 5, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(6, 1, 6, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(7, 1, 7, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(8, 1, 8, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(9, 1, 9, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(10, 1, 10, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(11, 1, 11, '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(12, 1, 12, '2022-04-06 22:52:58', '2022-04-06 22:52:58'),
(13, 2, 1, '2022-06-26 23:52:54', '2022-06-26 23:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_approvals`
--

DROP TABLE IF EXISTS `leave_approvals`;
CREATE TABLE IF NOT EXISTS `leave_approvals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approve` tinyint(4) NOT NULL DEFAULT '0',
  `start_date` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_approvals`
--

INSERT INTO `leave_approvals` (`id`, `user_id`, `classroom_id`, `subject`, `description`, `document`, `is_approve`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Emergency Leave', 'SOmething Important', 'leave_applications/user_2_no_1.pdf', 1, '2022-02-18', '2022-02-22', '2022-02-16 01:16:38', '2022-04-06 03:06:55'),
(4, 2, 1, 'Covid - 19', 'I have been sick for over 7days today. So I\'d like to request you to grant be leave for the next 7days.', 'leave_applications/user_2_no_2.pdf', 1, '2022-04-07', '2022-04-14', '2022-04-06 22:11:55', '2022-04-06 22:20:13'),
(5, 3, 1, 'Emergency Leave', 'I need to go to my home town because I have an emergency family matter to attend to.', 'leave_applications/user_3_no_5.pdf', 0, '2022-04-08', '2022-04-10', '2022-04-06 22:13:57', '2022-04-06 22:13:57'),
(6, 2, 1, 'Emergency Leave', 'Due to Severe Sickness I am unable to attend the classes for today', NULL, 0, '2022-05-10', '2022-05-12', '2022-05-10 05:54:12', '2022-05-10 05:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_01_152402_create_permission_tables', 1),
(5, '2021_08_04_151053_create_classrooms_table', 1),
(6, '2021_08_05_062125_create_enrollments_table', 1),
(7, '2021_08_05_155229_create_attendances_table', 1),
(8, '2021_08_10_160243_create_leave_approvals_table', 1),
(9, '2022_01_05_115936_create_student_gps_data_table', 1),
(10, '2022_01_09_104803_create_rfid_logs_table', 1),
(11, '2022_01_09_105630_create_student_rfid_card_infos_table', 1),
(13, '2022_04_07_051708_create_announcements_table', 2),
(14, '2022_04_07_093045_create_notes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(3, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 5),
(3, 'App\\User', 6),
(3, 'App\\User', 7),
(3, 'App\\User', 8),
(3, 'App\\User', 9),
(3, 'App\\User', 10),
(3, 'App\\User', 11),
(3, 'App\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `note_img_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `classroom_id`, `note_img_id`, `title`, `description`, `document`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Plant and System Operator', 'Pigeon; \'but I must have prizes.\' \'But who has won?\' This question the Dodo suddenly called out to.', 'dummyfiles/1.pdf', '2022-04-07 04:05:55', '2022-04-07 04:05:55'),
(2, 1, 1, 'City', 'And how odd the directions will look! ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH.', 'dummyfiles/3.pdf', '2022-04-07 04:05:55', '2022-04-07 04:05:55'),
(3, 1, 1, 'Insulation Worker', 'THEN--she found herself lying on the glass table as before, \'and things are \"much of a.', 'dummyfiles/2.pdf', '2022-04-07 04:05:55', '2022-04-07 04:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin.Roles and Permission', 'web', 'Admin', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(2, 'Admin.RFID', 'web', 'Admin', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(3, 'Admin.Leave Approval', 'web', 'Admin', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(4, 'Admin.Users', 'web', 'Admin', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(5, 'Admin.Reports', 'web', 'Admin', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(6, 'Admin.Take Attendance', 'web', 'Admin', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(7, 'Admin.Track Students', 'web', 'Admin', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(8, 'Classrooms.Create', 'web', 'Classrooms', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(9, 'Classrooms.View', 'web', 'Classrooms', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(10, 'Classrooms.Edit', 'web', 'Classrooms', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(11, 'Classrooms.Delete', 'web', 'Classrooms', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(12, 'Students.Apply Leave', 'web', 'Students', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(13, 'Students.All leaves', 'web', 'Students', '2022-04-06 02:49:25', '2022-04-06 02:49:25'),
(14, 'announcements.delete', 'web', 'announcements', '2022-05-09 04:15:45', '2022-05-09 04:15:45'),
(15, 'announcements.edit', 'web', 'announcements', '2022-05-09 04:16:01', '2022-05-09 04:16:01'),
(16, 'announcements.create', 'web', 'announcements', '2022-05-09 04:27:17', '2022-05-09 04:27:17'),
(17, 'Notes.create', 'web', 'Notes', '2022-05-09 04:28:18', '2022-05-09 04:28:18'),
(18, 'Notes.edit', 'web', 'Notes', '2022-05-09 04:28:26', '2022-05-09 04:28:26'),
(19, 'Notes.delete', 'web', 'Notes', '2022-05-09 04:28:33', '2022-05-09 04:28:33'),
(20, 'Students.joinClassroom', 'web', 'Students', '2022-07-22 10:34:45', '2022-07-22 10:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `rfid_logs`
--

DROP TABLE IF EXISTS `rfid_logs`;
CREATE TABLE IF NOT EXISTS `rfid_logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `in_time` timestamp NOT NULL,
  `out_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rfid_logs`
--

INSERT INTO `rfid_logs` (`id`, `student_id`, `in_time`, `out_time`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-05-28 00:51:55', NULL, '2022-02-16 00:51:55', '2022-02-16 00:56:36'),
(2, 3, '2022-05-28 00:49:14', NULL, '2022-02-22 00:49:14', '2022-02-22 00:49:14'),
(3, 4, '2022-05-28 09:49:08', NULL, NULL, NULL),
(4, 5, '2022-05-28 09:49:25', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(2, 'superadmin', 'web', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(3, 'student', 'web', '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(5, 'editor1', 'web', '2022-06-27 00:23:10', '2022-06-27 00:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(2, 1),
(2, 2),
(2, 5),
(3, 1),
(3, 2),
(3, 5),
(4, 1),
(4, 2),
(4, 5),
(5, 1),
(5, 2),
(5, 5),
(6, 1),
(6, 2),
(6, 5),
(7, 1),
(7, 2),
(7, 5),
(8, 1),
(8, 2),
(8, 5),
(9, 1),
(9, 2),
(9, 5),
(10, 1),
(10, 2),
(10, 5),
(11, 1),
(11, 2),
(11, 5),
(12, 3),
(13, 3),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 2),
(16, 5),
(17, 2),
(17, 5),
(18, 2),
(18, 5),
(19, 2),
(19, 5),
(20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_gps_data`
--

DROP TABLE IF EXISTS `student_gps_data`;
CREATE TABLE IF NOT EXISTS `student_gps_data` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lat` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_gps_data`
--

INSERT INTO `student_gps_data` (`id`, `user_id`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 2, '22.363573', '91.819835', '2022-02-06 06:14:14', '2022-04-05 00:49:53'),
(2, 3, '22.363544', '91.819927', '2022-02-06 06:14:14', '2022-04-03 02:45:39'),
(3, 4, '22.363540', '91.819856', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(4, 5, '22.363554', '91.819989', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(5, 6, '22.363655', '91.819909', NULL, NULL),
(6, 7, '22.363724', '91.819970', NULL, NULL),
(7, 8, '22.363708', '91.819805', NULL, NULL),
(8, 9, '22.363683', '91.819665', NULL, NULL),
(9, 10, '22.363761', '91.820240', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_rfid_card_infos`
--

DROP TABLE IF EXISTS `student_rfid_card_infos`;
CREATE TABLE IF NOT EXISTS `student_rfid_card_infos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `card_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_rfid_card_infos`
--

INSERT INTO `student_rfid_card_infos` (`id`, `student_id`, `card_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'ajuddi', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(2, 3, 'ajuqji', '2022-02-06 06:14:14', '2022-02-06 06:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aseer Ishraqul Hoque', 'admin', 'aseer@gmail.com', NULL, '$2y$10$0IUk3I9nrFm2/i42B6JokeC/6W523SHalznTD22XsFxwygejICBqi', NULL, '2022-02-06 06:14:13', '2022-02-06 06:14:13'),
(2, 'Aseer Ishraqul Hoque', 'ishraque', 'rau.jessica@example.org', '2022-02-06 06:14:13', '$2y$10$/159RjTfrHpef45kREUNPeS0OkhTEd9mH4d8NvPw04iQJo09i/rNO', 'ZCKgCGKVIFuMwGS2qwnAo5qB1v89o1iHoEzbub9jOzKLmXmML4xDaCz4qY7c', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(3, 'Fatema Zannat Nury', 'nury', 'koepp.tate@example.com', '2022-02-06 06:14:13', '$2y$10$a.NNCSHbUx6ueNRlpaj04ObqNy94Wn9nCU8LglXzZ23YvzTtwcr5m', 'omZ3F0p4zTGc8WNsoGecMFrGg5necAbptNsSuRUZ8m7fxQXcW9iGQOw5mNmo', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(4, 'Hoque', 'hills.mona', 'scrona@example.net', '2022-02-06 06:14:14', '$2y$10$Tw.6Tpgw6pB7/kHdIf3YWu1lef2L7PxiUyG4tXmwq.vXqfnlKFaaO', 'TKfuAisnTV', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(5, 'Orthy', 'natalie.hudson', 'kiarra77@example.com', '2022-02-06 06:14:14', '$2y$10$oS0Ko7cxJLI4sjeT50gN0.xHQreCCegcrUaiFyZs3/kprDjY3H6w.', 'XnRQnMNZyX', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(6, 'Hermina Paucek', 'adams.jaunita', 'adouglas@example.net', '2022-02-06 06:14:14', '$2y$10$5NfYoj9m1qyqHK/hoS6rTuuUhvQ49ht/6IA0aUuQNpmuWp12HvFZ.', 'DEQi2yAJ7m', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(7, 'Jordan Flatley', 'beahan.paul', 'pbode@example.org', '2022-02-06 06:14:14', '$2y$10$deTF1O4egFT2jFqHZ5e0huf0tGJyv1o8R6mJ2gzT5AkhHEG96kaGi', 'UUydFTWMKa', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(8, 'Marlen Moore', 'raven33', 'xberge@example.net', '2022-02-06 06:14:14', '$2y$10$AkZsaTSSjfDsQ8mZ5nx0kOl/LkXQgwv9hvwQIV8qRlRw2DaTq1BL.', 'DVJ8VVjK0f', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(9, 'Nicolette Parker', 'roscoe.price', 'dimitri47@example.net', '2022-02-06 06:14:14', '$2y$10$BNox.1p3EtPUlJdQRFn5I.2wAR6..xpPvizWMrNSA.MJyGym/tefu', 'i19mbmHhpw', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(10, 'Arianna Muller', 'lucile22', 'celia37@example.com', '2022-02-06 06:14:14', '$2y$10$EbwQKWKpeiNWuZV6sjgk5uOl3hxkao2OutaN.sjoxOSxjKSkVvvxC', 'hdx7951yjg', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(11, 'Ms. Verdie Bogisich', 'moen.beth', 'nelle38@example.com', '2022-02-06 06:14:14', '$2y$10$XWYkgR0UIOFfWXxaCBORy.zCBDHo/vmPNaCppT23ZbuMQnZwM5PVa', 'Kzy0L5z7ipoVTXCmx3vekTYlKiY6kQiX9CsxoGmBE9UoCtcKKKuM4ADlRci8', '2022-02-06 06:14:14', '2022-02-06 06:14:14'),
(12, 'kamal Hasan', 'kamal', 'kamal@gmail.com', NULL, '$2y$10$jnXeWn/iJ9NbtFgavkkn9.A2q3SApUuKGAgKYUTgMOv.zQa.LoK7S', NULL, '2022-04-06 22:52:39', '2022-04-06 22:52:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
