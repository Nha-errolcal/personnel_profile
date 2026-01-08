-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 05:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` int(11) NOT NULL,
  `education_id` int(11) NOT NULL,
  `achievement_name` varchar(255) NOT NULL,
  `achievement_type` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `education_id`, `achievement_name`, `achievement_type`, `year`, `status`, `created_at`, `updated_at`) VALUES
(12, 10, 'ddd', 'ddd', '0000', 1, '2026-01-08 16:48:09', '2026-01-08 16:48:09'),
(13, 10, '1111', '11', '2011', 1, '2026-01-08 16:49:25', '2026-01-08 16:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Technical Skills', 1, '2026-01-04 07:46:36', '2026-01-04 07:46:36'),
(10, 'Soft Skills', 1, '2026-01-04 09:44:58', '2026-01-04 16:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Solution IT Company', 'Mobile App Developer', 1, '2026-01-08 08:32:11', '2026-01-08 09:10:58'),
(4, 'Solution IT Company123', 'Mobile App Developer', 1, '2026-01-08 09:11:38', '2026-01-08 10:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `end_year` year(4) DEFAULT NULL,
  `gpa` decimal(3,2) DEFAULT NULL,
  `year_of_study` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `university_name`, `degree`, `field_of_study`, `start_year`, `end_year`, `gpa`, `year_of_study`, `status`, `created_at`, `updated_at`) VALUES
(10, 'The University of Cambodia', 'Bachelor of Science in Information Technology', '1', '2022', '2025', 1.00, 'Year of Study: Final Year (4th Year)', 1, '2026-01-08 16:18:17', '2026-01-08 16:18:17'),
(12, '1', '1', '1', '2001', '2001', 1.00, '1', 1, '2026-01-08 16:31:45', '2026-01-08 16:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `education_club`
--

CREATE TABLE `education_club` (
  `education_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_link_id` int(11) DEFAULT NULL,
  `project_name` varchar(255) NOT NULL,
  `type_project` varchar(150) NOT NULL,
  `demo_link` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `technologies` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `icon_class` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_link_id`, `project_name`, `type_project`, `demo_link`, `description`, `technologies`, `status`, `icon_class`, `created_at`, `updated_at`) VALUES
(27, 3, 'School Management System', 'Final Year University Project', 'https://panha-app.vercel.app/', 'A comprehensive web-based school management system that handles student enrollment, attendance tracking, grade management, and teacher-parent communication. Features include real-time notifications, report generation, and role-based access control.', 'PHP, MySQL, JavaScript, Bootstrap, jQuery, Chart.js', 1, 'fa-brands fa-github', '2026-01-06 03:43:19', '2026-01-06 03:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `project_links`
--

CREATE TABLE `project_links` (
  `id` int(11) NOT NULL,
  `source_code_url` varchar(255) NOT NULL,
  `link_type` varchar(150) NOT NULL,
  `icon_class` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_links`
--

INSERT INTO `project_links` (`id`, `source_code_url`, `link_type`, `icon_class`, `created_at`, `updated_at`, `status`) VALUES
(2, 'http://localhost/personnel_profile/template/view/dashboard/fa-brands%20fa-github', 'GIT', 'fa-brands fa-github', '2026-01-05 03:52:27', '2026-01-05 12:06:54', 1),
(3, 'https://github.com/PanhaGit/personnel_profile', 'Github', 'fa-brands fa-gitlab', '2026-01-05 03:56:57', '2026-01-06 02:37:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Reference to categories table',
  `skill_name` varchar(100) NOT NULL,
  `level` enum('Beginner','Intermediate','Advanced') NOT NULL DEFAULT 'Beginner',
  `skill_level` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Percentage 0-100',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `category_id`, `skill_name`, `level`, `skill_level`, `created_at`, `updated_at`, `status`) VALUES
(4, 1, 'HTML & CSS', 'Intermediate', 100, '2026-01-04 16:26:03', '2026-01-04 16:26:39', 1),
(5, 1, 'JavaScript', 'Advanced', 80, '2026-01-04 16:27:14', '2026-01-04 16:27:14', 1),
(6, 1, 'PHP & MySQL', 'Intermediate', 90, '2026-01-04 16:27:28', '2026-01-04 16:28:19', 1),
(7, 1, 'React.js', 'Advanced', 85, '2026-01-04 16:27:53', '2026-01-04 16:27:53', 1),
(8, 1, 'Git & GitHub', 'Intermediate', 92, '2026-01-04 16:28:09', '2026-01-04 16:28:09', 1),
(9, 1, 'Full stack Next JS Spring boot', 'Intermediate', 89, '2026-01-04 16:28:44', '2026-01-04 16:28:44', 1),
(10, 10, 'Communication', 'Advanced', 90, '2026-01-04 16:29:08', '2026-01-05 02:02:08', 1),
(11, 10, 'Time Management', 'Intermediate', 40, '2026-01-04 16:29:28', '2026-01-04 16:39:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_id` (`education_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_club`
--
ALTER TABLE `education_club`
  ADD PRIMARY KEY (`education_id`,`club_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_link_id_2` (`project_link_id`);

--
-- Indexes for table `project_links`
--
ALTER TABLE `project_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_skills_category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project_links`
--
ALTER TABLE `project_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academics`
--
ALTER TABLE `academics`
  ADD CONSTRAINT `academics_ibfk_1` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education_club`
--
ALTER TABLE `education_club`
  ADD CONSTRAINT `education_club_ibfk_1` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `education_club_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_project_link` FOREIGN KEY (`project_link_id`) REFERENCES `project_links` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk_skills_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
