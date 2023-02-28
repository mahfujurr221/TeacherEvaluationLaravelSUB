-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 08:32 AM
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
-- Database: `laravel_teacher_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `course_creator` int(11) DEFAULT NULL,
  `course_editor` int(11) DEFAULT NULL,
  `course_slug` varchar(100) DEFAULT NULL,
  `course_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `dept_id`, `course_creator`, `course_editor`, `course_slug`, `course_status`, `created_at`, `updated_at`) VALUES
(1, 'CSE0101', 'Computer Fundamental', '1', NULL, NULL, 'course2063903164a0bc6', 1, '2022-12-07 06:23:32', NULL),
(2, 'LLB0100', 'Fundamental Law', '2', NULL, NULL, 'course206390317e10453', 1, '2022-12-07 06:23:58', NULL),
(3, 'PHM0101', 'Pharmacy Fundamental', '3', NULL, NULL, 'course206390319d99ca1', 1, '2022-12-07 06:24:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `default_values`
--

CREATE TABLE `default_values` (
  `default_id` bigint(20) UNSIGNED NOT NULL,
  `question_version_id` varchar(10) NOT NULL,
  `semester_year` varchar(10) DEFAULT NULL,
  `semester_id` varchar(255) NOT NULL,
  `default_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_values`
--

INSERT INTO `default_values` (`default_id`, `question_version_id`, `semester_year`, `semester_id`, `default_status`, `created_at`, `updated_at`) VALUES
(1, '1', '2022', '1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `dept_code` varchar(20) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_creator` int(11) DEFAULT NULL,
  `dept_editor` int(11) DEFAULT NULL,
  `dept_slug` varchar(100) DEFAULT NULL,
  `dept_rank` int(11) NOT NULL DEFAULT 1,
  `dept_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_code`, `dept_name`, `dept_creator`, `dept_editor`, `dept_slug`, `dept_rank`, `dept_status`, `created_at`, `updated_at`) VALUES
(1, 'CSE', 'Computer Science And Engineering', NULL, NULL, NULL, 1, 1, NULL, NULL),
(2, 'LLB', 'department of law', NULL, NULL, NULL, 1, 1, NULL, NULL),
(3, 'phm', 'Pharmacy Department', NULL, NULL, NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enroll_students`
--

CREATE TABLE `enroll_students` (
  `enroll_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `tcr_id` varchar(255) NOT NULL,
  `enroll_slug` varchar(100) DEFAULT NULL,
  `enroll_creator` int(11) DEFAULT NULL,
  `evaluation_status` int(11) NOT NULL DEFAULT 1,
  `enroll_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enroll_students`
--

INSERT INTO `enroll_students` (`enroll_id`, `student_id`, `student_name`, `course_code`, `dept_id`, `tcr_id`, `enroll_slug`, `enroll_creator`, `evaluation_status`, `enroll_status`, `created_at`, `updated_at`) VALUES
(1, 'UG-02-45-17-010', 'Mahfujur Rahman', 'CSE0101', '1', '1', 'enroll2063866d4bef37e', NULL, 1, 1, '2022-11-29 20:36:27', NULL),
(2, 'UG-02-45-17-011', 'Nilufa Yeasmin', 'CSE0101', '1', '5', 'enroll20638ae807504e4', NULL, 1, 1, '2022-12-03 06:09:11', NULL),
(3, 'UG02-45-17-006', 'Ishraq Ahmed', 'LLB0101', '3', '5', 'enroll20638b1420223f4', NULL, 1, 1, '2022-12-03 09:17:20', NULL);

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
-- Table structure for table `mcq_questions`
--

CREATE TABLE `mcq_questions` (
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `question_version_id` varchar(10) NOT NULL,
  `question_description` varchar(100) DEFAULT NULL,
  `option1_desc` varchar(50) DEFAULT NULL,
  `option2_desc` varchar(50) DEFAULT NULL,
  `option3_desc` varchar(50) DEFAULT NULL,
  `option4_desc` varchar(50) DEFAULT NULL,
  `option5_desc` varchar(50) DEFAULT NULL,
  `question_creator` int(11) DEFAULT NULL,
  `question_ceditor` int(11) DEFAULT NULL,
  `question_slug` varchar(100) DEFAULT NULL,
  `question_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcq_questions`
--

INSERT INTO `mcq_questions` (`question_id`, `question_version_id`, `question_description`, `option1_desc`, `option2_desc`, `option3_desc`, `option4_desc`, `option5_desc`, `question_creator`, `question_ceditor`, `question_slug`, `question_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Question Desccription 1', 'Very bad', 'bad', 'average', 'good', 'excellent', NULL, NULL, 'mcq2063866f4e6a419', 1, '2022-11-29 20:45:02', NULL);

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
(7, '2022_08_23_070035_create_semesters_table', 3),
(18, '2022_11_01_192207_create_default_values_table', 4),
(20, '2022_11_01_192254_create_teachers_table', 4),
(21, '2022_11_01_192307_create_students_table', 4),
(22, '2022_11_01_192328_create_courses_table', 4),
(29, '2022_11_01_210516_create_semesters_table', 6),
(39, '2022_08_23_065337_create_departments_table', 7),
(41, '2022_11_01_192350_create_offered_courses_table', 7),
(42, '2022_11_01_192443_create_enrolle_students_table', 7),
(43, '2022_11_01_192548_create_mcq_questions_table', 7),
(91, '2014_10_12_000000_create_users_table', 8),
(92, '2014_10_12_100000_create_password_resets_table', 8),
(93, '2019_08_19_000000_create_failed_jobs_table', 8),
(94, '2019_12_14_000001_create_personal_access_tokens_table', 8),
(95, '2022_11_01_192242_create_admins_table', 8),
(96, '2022_11_01_192607_create_open_questions_table', 8),
(97, '2022_11_01_204259_create_mcq_responses_table', 8),
(98, '2022_11_01_204306_create_open_responses_table', 8),
(99, '2022_11_03_163841_create_semesters_table', 8),
(105, '2022_11_19_110749_create_mcq_questions_table', 8),
(108, '2022_11_24_014532_create_open_questions_table', 8),
(109, '2022_11_24_123816_create_user_roles_table', 8),
(110, '2022_11_24_145301_create_roles_table', 8),
(111, '2022_11_17_223403_create_default_values_table', 9),
(112, '2022_11_23_115549_create_enroll_students_table', 10),
(114, '2022_11_17_012420_create_students_table', 12),
(115, '2022_11_17_205643_create_courses_table', 13),
(119, '2022_11_19_004935_create_departments_table', 15),
(120, '2022_11_14_061120_create_teachers_table', 16),
(121, '2022_11_22_124608_create_offered_courses_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `offered_courses`
--

CREATE TABLE `offered_courses` (
  `offered_course_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `tcr_id` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester_id` varchar(255) NOT NULL,
  `offered_course_creator` int(11) DEFAULT NULL,
  `offered_course_editor` int(11) DEFAULT NULL,
  `offered_course_slug` varchar(100) DEFAULT NULL,
  `enable_evaluation` int(11) NOT NULL DEFAULT 1,
  `offered_course_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offered_courses`
--

INSERT INTO `offered_courses` (`offered_course_id`, `course_id`, `dept_id`, `tcr_id`, `year`, `semester_id`, `offered_course_creator`, `offered_course_editor`, `offered_course_slug`, `enable_evaluation`, `offered_course_status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '2022', '1', NULL, NULL, 'offercourse2063904080a7436', 1, 1, '2022-12-07 07:28:00', NULL),
(2, '2', '2', '3', '2022', '1', NULL, NULL, 'offercourse2063904106666f1', 1, 1, '2022-12-07 07:30:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `open_questions`
--

CREATE TABLE `open_questions` (
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `question_version_id` varchar(10) NOT NULL,
  `question_description` varchar(100) DEFAULT NULL,
  `question_creator` int(11) DEFAULT NULL,
  `question_ceditor` int(11) DEFAULT NULL,
  `question_slug` varchar(100) DEFAULT NULL,
  `question_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `open_questions`
--

INSERT INTO `open_questions` (`question_id`, `question_version_id`, `question_description`, `question_creator`, `question_ceditor`, `question_slug`, `question_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Question Desccription 1', NULL, NULL, 'mcq2063866f70a0760', 1, '2022-11-29 20:45:36', NULL);

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
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `role_slug` varchar(50) DEFAULT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_slug`, `role_status`) VALUES
(1, 'Supper Admin', 'user1234567', 1),
(2, 'Authority Admin', 'role206386536756d78', 1),
(3, 'Department Admin', 'role2063865372b2dd1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `semester_name` varchar(100) NOT NULL,
  `semester_creator` int(11) DEFAULT NULL,
  `semester_editor` int(11) DEFAULT NULL,
  `semester_slug` varchar(100) DEFAULT NULL,
  `semester_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semester_id`, `semester_name`, `semester_creator`, `semester_editor`, `semester_slug`, `semester_status`, `created_at`, `updated_at`) VALUES
(1, 'Spring', NULL, NULL, NULL, 1, NULL, '2022-11-29 18:48:23'),
(2, 'Summer', NULL, NULL, NULL, 1, NULL, NULL),
(3, 'Fall', NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` varchar(255) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `stu_creator` int(11) DEFAULT NULL,
  `stu_editor` int(11) DEFAULT NULL,
  `stu_slug` varchar(100) DEFAULT NULL,
  `stu_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `dept_id`, `first_name`, `last_name`, `email`, `picture`, `stu_creator`, `stu_editor`, `stu_slug`, `stu_status`, `created_at`, `updated_at`) VALUES
('UG02-45-17-006', '2', 'Ishraq', 'Ahmed', 'ishraq@gmail.com', 'stu-stu20638ae6e0c476f-1670047456.jpg', NULL, NULL, 'stu20638ae6e0c476f', 1, '2022-12-03 06:04:16', '2022-12-03 06:04:16'),
('UG02-45-17-010', '1', 'Mahfujur', 'Rahman', 'mahfujurr221@gmail.com', 'stu-stu2063866941efd4f-1669753154.jpg', NULL, NULL, 'stu2063866941efd4f', 1, '2022-11-29 20:21:16', '2022-11-29 20:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tcr_id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `tcr_creator` int(11) DEFAULT NULL,
  `tcr_editor` int(11) DEFAULT NULL,
  `tcr_slug` varchar(100) DEFAULT NULL,
  `tcr_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tcr_id`, `dept_id`, `first_name`, `last_name`, `email`, `picture`, `tcr_creator`, `tcr_editor`, `tcr_slug`, `tcr_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Nirban', 'Acharjee', 'nirban@gmail.com', 'tcr-tcr20639030779631f-1670393975.jpg', NULL, NULL, 'tcr20639030779631f', 1, '2022-12-07 06:19:35', '2022-12-07 06:19:36'),
(2, '1', 'Uzzal', 'Chowdhuri', 'uzzal@gmail.com', 'tcr-tcr20639030aba9b80-1670394027.jpg', NULL, NULL, 'tcr20639030aba9b80', 1, '2022-12-07 06:20:27', '2022-12-07 06:20:27'),
(3, '2', 'Mahfujur', 'Rahman', 'mahfujurr@gmail.com', 'tcr-tcr20639030c04c0fb-1670394048.jpg', NULL, NULL, 'tcr20639030c04c0fb', 1, '2022-12-07 06:20:48', '2022-12-07 06:20:48'),
(4, '3', 'ishraq', 'Ahmed', 'ishraq@gmail.com', 'tcr-tcr20639030d4df28e-1670394068.jpg', NULL, NULL, 'tcr20639030d4df28e', 1, '2022-12-07 06:21:08', '2022-12-07 06:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin_pic` varchar(255) DEFAULT NULL,
  `role_id` varchar(255) DEFAULT NULL,
  `dept_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin_slug` varchar(255) DEFAULT NULL,
  `admin_status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `admin_pic`, `role_id`, `dept_id`, `email_verified_at`, `password`, `admin_slug`, `admin_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'limon mahfuz', 'mahfujurr221@gmail.com', NULL, '1', NULL, NULL, '$2y$10$QXvKLl98isiAXl2/YBv/GOo.ig7IAiqpLFQO4R2APbH3Tjyp.KFPi', NULL, '1', NULL, '2022-11-29 18:20:06', '2022-11-29 18:20:06'),
(4, 'anonto antor', 'anantoantor838@gmail.com', 'user-admin206386702780355-1669754919.jpg', '2', '1', NULL, '$2y$10$jFx/HW7dOl1CXGQLa5xn5.ri/aSCt2HrmdkRMSHbYJ5oxdRSYIxyq', 'admin206386702780355', '1', NULL, '2022-11-29 20:48:39', '2022-11-29 20:48:39'),
(5, 'Ishraq Ahmed', 'ishraq@gmail.com', 'user-admin20638b0ffc6a720-1670057980.jpg', '3', '1', NULL, '$2y$10$huN3jZvNbHES1ml6gI3dFeH7Qf8jCiFY7CGFn6nw2LEmqBWf2nTr6', 'admin20638b0ffc6a720', '1', NULL, '2022-12-03 08:59:40', '2022-12-03 08:59:41'),
(6, 'Rasel', 'rasel@gmail.com', 'user-admin20638b1e82db545-1670061698.jpg', '3', '1', NULL, '$2y$10$59/NyDVRNnftSuFvF46n1e5CfVhhZ5csAzUIyPWaquIqUY/V6fnzC', 'admin20638b1e82db545', '1', NULL, '2022-12-03 10:01:38', '2022-12-03 10:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `admin_creator` int(11) DEFAULT NULL,
  `admin_slug` varchar(100) DEFAULT NULL,
  `password_status` int(11) NOT NULL DEFAULT 1,
  `admin_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_04_admins`
--

CREATE TABLE `_04_admins` (
  `admin_id` varchar(255) NOT NULL,
  `dept_code` varchar(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `admin_creator` int(11) DEFAULT NULL,
  `admin_slug` varchar(100) DEFAULT NULL,
  `password_status` int(11) NOT NULL DEFAULT 1,
  `admin_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_11_open_questions`
--

CREATE TABLE `_11_open_questions` (
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `question_version_id` varchar(10) NOT NULL,
  `question_description` varchar(100) DEFAULT NULL,
  `question_answer` varchar(255) DEFAULT NULL,
  `question_creator` int(11) DEFAULT NULL,
  `question_ceditor` int(11) DEFAULT NULL,
  `question_slug` varchar(100) DEFAULT NULL,
  `question_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_12_mcq_responses`
--

CREATE TABLE `_12_mcq_responses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `stu_id` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `response` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_13_open_responses`
--

CREATE TABLE `_13_open_responses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `stu_id` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `descripted_response` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `default_values`
--
ALTER TABLE `default_values`
  ADD PRIMARY KEY (`default_id`),
  ADD UNIQUE KEY `default_values_semester_id_unique` (`semester_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `departments_dept_code_unique` (`dept_code`),
  ADD UNIQUE KEY `departments_dept_name_unique` (`dept_name`);

--
-- Indexes for table `enroll_students`
--
ALTER TABLE `enroll_students`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offered_courses`
--
ALTER TABLE `offered_courses`
  ADD PRIMARY KEY (`offered_course_id`);

--
-- Indexes for table `open_questions`
--
ALTER TABLE `open_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semester_id`),
  ADD UNIQUE KEY `semesters_semester_name_unique` (`semester_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `students_stu_id_unique` (`stu_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tcr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `_04_admins`
--
ALTER TABLE `_04_admins`
  ADD UNIQUE KEY `_04_admins_admin_id_unique` (`admin_id`),
  ADD UNIQUE KEY `_04_admins_dept_code_unique` (`dept_code`);

--
-- Indexes for table `_11_open_questions`
--
ALTER TABLE `_11_open_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `_11_open_questions_question_id_unique` (`question_id`),
  ADD UNIQUE KEY `_11_open_questions_question_version_id_unique` (`question_version_id`);

--
-- Indexes for table `_12_mcq_responses`
--
ALTER TABLE `_12_mcq_responses`
  ADD UNIQUE KEY `_12_mcq_responses_course_id_unique` (`course_id`),
  ADD UNIQUE KEY `_12_mcq_responses_course_code_unique` (`course_code`),
  ADD UNIQUE KEY `_12_mcq_responses_stu_id_unique` (`stu_id`),
  ADD UNIQUE KEY `_12_mcq_responses_question_id_unique` (`question_id`);

--
-- Indexes for table `_13_open_responses`
--
ALTER TABLE `_13_open_responses`
  ADD UNIQUE KEY `_13_open_responses_course_id_unique` (`course_id`),
  ADD UNIQUE KEY `_13_open_responses_course_code_unique` (`course_code`),
  ADD UNIQUE KEY `_13_open_responses_stu_id_unique` (`stu_id`),
  ADD UNIQUE KEY `_13_open_responses_question_id_unique` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `default_values`
--
ALTER TABLE `default_values`
  MODIFY `default_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enroll_students`
--
ALTER TABLE `enroll_students`
  MODIFY `enroll_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  MODIFY `question_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `offered_courses`
--
ALTER TABLE `offered_courses`
  MODIFY `offered_course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `open_questions`
--
ALTER TABLE `open_questions`
  MODIFY `question_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semester_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tcr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_11_open_questions`
--
ALTER TABLE `_11_open_questions`
  MODIFY `question_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
