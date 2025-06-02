-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2025 at 08:10 AM
-- Server version: 8.0.35
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djangourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `instructor_id` int NOT NULL,
  `created_at` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `level` enum('beginner','intermediate','advanced') NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status` enum('Menunggu','Disetujui') NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`) VALUES
(1, 'Web Development'),
(2, 'Mobile Development');

-- --------------------------------------------------------

--
-- Table structure for table `course_finished_materials`
--

CREATE TABLE `course_finished_materials` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_material_id` int NOT NULL,
  `finished_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_materials`
--

CREATE TABLE `course_materials` (
  `id` int NOT NULL,
  `course_id` int NOT NULL,
  `ordinal` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `video_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_tools`
--

CREATE TABLE `course_tools` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_tools`
--

INSERT INTO `course_tools` (`id`, `name`, `type`, `logo`) VALUES
(1, 'Visual Studio Code', 'Code Editor', 'vscode.png'),
(2, 'Apache', 'Web Server', 'apache.png'),
(3, 'MySQL', 'Database Management System', 'sql.png'),
(4, 'Google Chrome', 'Web Browser', 'chrome.png'),
(5, 'phpMyAdmin', 'Software', 'phpmyadmin.png'),
(6, 'Flutter', 'SDK', 'flutter.svg'),
(7, 'Android Studio', 'IDE', 'android-studio.png'),
(8, 'CodeIgniter', 'Framework', 'codeigniter.png'),
(9, 'Laravel', 'Framework', 'laravel.png'),
(10, 'React', 'Library', 'react.png');

-- --------------------------------------------------------

--
-- Table structure for table `course_tool_galleries`
--

CREATE TABLE `course_tool_galleries` (
  `id` int NOT NULL,
  `course_id` int NOT NULL,
  `tool_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `finished_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_courses`
--

CREATE TABLE `favourite_courses` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int NOT NULL,
  `credential_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `bio` text,
  `profile_img` varchar(255) DEFAULT NULL,
  `preferred_withdrawal_method` enum('paypal','dana') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'paypal',
  `balance` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'student'),
(2, 'instructor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `credential_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `coin_balance` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int DEFAULT NULL,
  `price` int NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_type` enum('purchase','topup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_requests`
--

CREATE TABLE `withdrawal_requests` (
  `id` int NOT NULL,
  `instructor_id` int NOT NULL,
  `created_at` int NOT NULL,
  `amount` int NOT NULL,
  `payment_method` enum('dana','paypal') NOT NULL,
  `status` enum('approved','rejected','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courses_to_course_categories` (`category_id`),
  ADD KEY `fk_courses_to_instructors` (`instructor_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_finished_materials`
--
ALTER TABLE `course_finished_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_finished_materials_to_students` (`student_id`),
  ADD KEY `fk_course_finished_materials_to_course_materials` (`course_material_id`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_materials_to_courses` (`course_id`);

--
-- Indexes for table `course_tools`
--
ALTER TABLE `course_tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tool_galleries`
--
ALTER TABLE `course_tool_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_tool_galleries_to_course_tools` (`tool_id`),
  ADD KEY `fk_course_tool_galleries_to_courses` (`course_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_credentials_to_roles` (`role_id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enrolled_courses_to_students` (`student_id`),
  ADD KEY `fk_enrolled_courses_to_courses` (`course_id`);

--
-- Indexes for table `favourite_courses`
--
ALTER TABLE `favourite_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_favourite_courses_to_courses` (`course_id`),
  ADD KEY `fk_favourite_courses_to_students` (`student_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_instructors_to_credentials` (`credential_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_students_to_credentials` (`credential_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transactions_to_courses` (`course_id`),
  ADD KEY `fk_transactions_to_students` (`student_id`);

--
-- Indexes for table `withdrawal_requests`
--
ALTER TABLE `withdrawal_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_withdrawal_requests_to_instructors` (`instructor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_finished_materials`
--
ALTER TABLE `course_finished_materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_tools`
--
ALTER TABLE `course_tools`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_tool_galleries`
--
ALTER TABLE `course_tool_galleries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_courses`
--
ALTER TABLE `favourite_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawal_requests`
--
ALTER TABLE `withdrawal_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_courses_to_course_categories` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_courses_to_instructors` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `course_finished_materials`
--
ALTER TABLE `course_finished_materials`
  ADD CONSTRAINT `fk_course_finished_materials_to_course_materials` FOREIGN KEY (`course_material_id`) REFERENCES `course_materials` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_course_finished_materials_to_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD CONSTRAINT `fk_course_materials_to_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `course_tool_galleries`
--
ALTER TABLE `course_tool_galleries`
  ADD CONSTRAINT `fk_course_tool_galleries_to_course_tools` FOREIGN KEY (`tool_id`) REFERENCES `course_tools` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_course_tool_galleries_to_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `credentials`
--
ALTER TABLE `credentials`
  ADD CONSTRAINT `fk_credentials_to_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD CONSTRAINT `fk_enrolled_courses_to_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_enrolled_courses_to_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `favourite_courses`
--
ALTER TABLE `favourite_courses`
  ADD CONSTRAINT `fk_favourite_courses_to_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_favourite_courses_to_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `fk_instructors_credentials` FOREIGN KEY (`credential_id`) REFERENCES `credentials` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_to_credentials` FOREIGN KEY (`credential_id`) REFERENCES `credentials` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transactions_to_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_transactions_to_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `withdrawal_requests`
--
ALTER TABLE `withdrawal_requests`
  ADD CONSTRAINT `fk_withdrawal_requests_to_instructors` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
