-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 02:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlgv`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `role` enum('Admin','Lecturer') DEFAULT 'Lecturer',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `lecturer_id`, `role`, `created_at`, `updated_at`) VALUES
(13, 'admin2', '$2y$12$wiBO5Az5rENYj1gygjz4DOLjmqB.uyQ.Xch1T9S6Og/LOb0w4qxtm', 1, 'Admin', '2025-03-06 02:01:38', '2025-03-06 02:01:38'),
(14, 'maipt', '$2y$12$gTMnvA1k7b6wOzMJobTud.FnfAXlPsxYlKxKfHgCWiZHernVfZWWy', 4, 'Admin', '2025-03-06 02:34:35', '2025-03-06 02:34:35'),
(15, 'hungnv', '$2y$12$8A6C3FuUQK7Z9/LN/9RpHep8X/mlfTmL/Y0rpyiUI743L63L9M3E6', 7, 'Admin', '2025-03-06 02:36:27', '2025-03-06 02:36:27'),
(17, 'tynt', '$2y$12$NHWEYpNKewQPZoJTq1KvxOFUsotQsgmrgekwkMbgrtt7npPN4saoK', 11, 'Lecturer', '2025-03-06 22:33:29', '2025-03-06 22:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Lập trình Java', 1, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(2, 'Lập trình C++', 1, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(3, 'Phân tích dữ liệu', 9, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(4, 'Trí tuệ nhân tạo', 1, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(5, 'Quản lý dự án phần mềm', 1, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(6, 'An toàn thông tin', 1, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(7, 'Marketing kỹ thuật số', 2, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(8, 'Kế toán tài chính', 2, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(9, 'Thương mại điện tử', 2, '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(10, 'Luật kinh doanh', 3, '2025-03-05 01:38:20', '2025-03-05 01:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(11) NOT NULL,
  `degree_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `degree_name`, `created_at`, `updated_at`) VALUES
(1, 'Cử nhân', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(2, 'Kỹ sư', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(3, 'Thạc sĩ', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(4, 'Tiến sĩ', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(5, 'Phó giáo sư', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(6, 'Giáo sư', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(7, 'Bác sĩ chuyên khoa', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(8, 'Thạc sĩ chuyên ngành', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(9, 'Nghiên cứu sinh', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(10, 'Chuyên viên cao cấp', '2025-03-05 01:38:20', '2025-03-05 01:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Khoa Công nghệ Thông tin', 'Lầu 1', '02132165456', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(2, 'Khoa Kinh tế', 'Lầu 2', '0987654321', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(3, 'Khoa Luật', 'Lầu 3', '0915141855', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(4, 'Khoa Y Dược', 'Lầu 4', '0123456789', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(5, 'Khoa Ngoại Ngữ', 'Lầu 5', '0246813579', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(6, 'Khoa Điện - Điện Tử', 'Lầu 6', '0135792468', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(7, 'Khoa Môi Trường', 'Lầu 7', '0246801357', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(8, 'Khoa Nông Nghiệp', 'Lầu 8', '0369258147', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(9, 'Khoa Khoa Học Cơ Bản', 'Lầu 9', '0159753486', '2025-03-05 01:38:20', '2025-03-05 01:38:20'),
(10, 'Khoa Báo Chí Truyền Thông', 'Lầu 10', '0147258369', '2025-03-05 01:38:20', '2025-03-05 01:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'lecturer_image/default.jpg',
  `department_id` int(11) DEFAULT NULL,
  `degree_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `contract_type` enum('Biên chế','Hợp đồng','Thỉnh giảng') NOT NULL,
  `salary` int(15) DEFAULT NULL,
  `salary_coefficient` decimal(5,2) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `graduation_year` year(4) DEFAULT NULL,
  `certifications` text DEFAULT NULL,
  `teaching_subjects` text DEFAULT NULL,
  `teaching_experience_years` int(11) DEFAULT NULL,
  `previous_workplaces` text DEFAULT NULL,
  `published_papers` text DEFAULT NULL,
  `published_books` text DEFAULT NULL,
  `awards` text DEFAULT NULL,
  `commendations` text DEFAULT NULL,
  `pedagogical_certificate` tinyint(1) DEFAULT 0,
  `it_certificates` text DEFAULT NULL,
  `language_certificates` text DEFAULT NULL,
  `other_professional_activities` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `full_name`, `date_of_birth`, `hire_date`, `gender`, `email`, `phone`, `address`, `image`, `department_id`, `degree_id`, `created_at`, `updated_at`, `contract_type`, `salary`, `salary_coefficient`, `major`, `university`, `graduation_year`, `certifications`, `teaching_subjects`, `teaching_experience_years`, `previous_workplaces`, `published_papers`, `published_books`, `awards`, `commendations`, `pedagogical_certificate`, `it_certificates`, `language_certificates`, `other_professional_activities`) VALUES
(1, 'Trần Văn Minh', '1980-03-15', '2010-09-01', 'Male', 'minh.tran@university.edu.vn', '0987654321', 'Số 12 Đường Láng, Hà Nội', 'lecturer_image/1741260342_download (2).jpg', 1, 2, '2025-03-05 14:08:00', '2025-03-06 21:51:55', 'Biên chế', 3800000, 1.00, 'Khoa học Máy tính', 'Đại học Sư Phạm Kỹ Thuật TP. HCM', '2005', 'Chứng chỉ MCSE, AWS Solution Architect', 'Lập trình, Cấu trúc dữ liệu', 15, NULL, '3 bài báo khoa học về trí tuệ nhân tạo', 'Giáo trình Lập trình Python', 'Giải thưởng Sinh viên Nghiên cứu Khoa học', NULL, 0, 'Microsoft Certified: Azure Developer', 'TOEIC 900', NULL),
(2, 'Nguyễn Thị Hương', '1985-07-22', '2012-11-15', 'Male', 'huong.nguyen@university.edu.vn', '0912345678', 'Số 45 Trần Phú, Đà Nẵng', 'lecturer_image/1741260116_download.jpg', 2, 3, '2025-03-05 14:08:00', '2025-03-06 12:56:59', 'Hợp đồng', 3800000, 1.00, 'Quản trị Kinh doanh', 'Đại học Kinh tế Quốc dân', '2007', 'Chứng chỉ PMP, Digital Marketing', 'Quản trị chiến lược, Marketing', 12, NULL, '5 bài báo về quản trị kinh doanh', 'Sách chuyên khảo Chiến lược Kinh doanh', 'Giải thưởng Nhà Giáo Trẻ Xuất sắc', NULL, 0, 'Google Analytics Certification', 'IELTS 7.5', NULL),
(3, 'Lê Văn Tùng', '1975-11-10', '2005-06-01', 'Male', 'tung.le@university.edu.vn', '0978123456', 'Số 78 Nguyễn Trãi, TP. Hồ Chí Minh', 'lecturer_image/default.jpg', 3, 1, '2025-03-05 14:08:00', '2025-03-06 12:57:04', 'Biên chế', 3800000, 1.00, 'Vật lý', 'Đại học Khoa học Tự nhiên', '2000', 'Chứng chỉ Nghiên cứu Khoa học', 'Vật lý đại cương, Vật lý hiện đại', 20, NULL, '10 bài báo trong tạp chí quốc tế', 'Giáo trình Vật lý Lượng tử', 'Giải thưởng Khoa học Quốc gia', NULL, 0, 'Matlab Certification', 'TOEFL 100', NULL),
(4, 'Phạm Thị Mai', '1990-01-30', '2018-02-15', 'Male', 'mai.pham@university.edu.vn', '0901234567', 'Số 22 Lê Lợi, Huế', 'lecturer_image/1741231089_default.jpg', 4, 2, '2025-03-05 14:08:00', '2025-03-06 12:57:11', 'Hợp đồng', 3800000, 1.00, 'Văn học', 'Đại học Sư phạm Hà Nội', '2012', 'Chứng chỉ Sư phạm Nâng cao', 'Văn học Việt Nam, Lý luận Văn học', 8, NULL, '2 bài báo về văn học đương đại', 'Tập nghiên cứu về văn học miền Nam', 'Giải thưởng Nghiên cứu Văn học Trẻ', NULL, 0, 'Adobe Creative Cloud Certification', 'IELTS 8.0', NULL),
(5, 'Trần Đức Anh', '1982-09-05', '2008-10-01', 'Male', 'anh.tran@university.edu.vn', '0965432109', 'Số 56 Pasteur, Nha Trang', 'lecturer_image/1741230185_CozyRoom.png', 3, 5, '2025-03-05 14:08:00', '2025-03-06 12:57:16', 'Biên chế', 3800000, 1.00, 'Hóa học', 'Đại học Cần Thơ', '2006', 'Chứng chỉ An toàn Phòng thí nghiệm', 'Hóa vô cơ, Hóa hữu cơ', 16, NULL, '7 bài báo về hóa học môi trường', 'Sách chuyên khảo về Hóa học Xanh', 'Giải thưởng Nghiên cứu Khoa học', NULL, 0, 'Safety Certification in Laboratory', 'TOEIC 850', NULL),
(6, 'Võ Thị Lan', '1988-12-20', '2015-03-15', 'Female', 'lan.vo@university.edu.vn', '0934567890', 'Số 33 Điện Biên Phủ, Cần Thơ', 'lecturer_image/default.jpg', 1, 1, '2025-03-05 14:08:00', '2025-03-06 12:57:19', 'Hợp đồng', 3800000, 1.00, 'Công nghệ Thông tin', 'Đại học Công nghệ Thông tin', '2010', 'Chứng chỉ CISSP, Cybersecurity', 'Lập trình Web, An ninh Mạng', 10, NULL, '4 bài báo về an toàn thông tin', 'Hướng dẫn An ninh Mạng', 'Giải thưởng Nhà Khoa học Trẻ', NULL, 0, 'Certified Ethical Hacker', 'TOEFL 95', NULL),
(7, 'Nguyễn Văn Hùng', '1979-06-12', '2003-08-01', 'Male', 'hung.nguyen@university.edu.vn', '0987123456', 'Số 89 Lý Thường Kiệt, Hải Phòng', 'lecturer_image/1741231890_CozyRoom.png', 2, 10, '2025-03-05 14:08:00', '2025-03-06 12:57:26', 'Biên chế', 3800000, 1.00, 'Toán học', 'Đại học Sư phạm Hà Nội', '2002', 'Chứng chỉ Giảng dạy Toán Nâng cao', 'Đại số, Giải tích', 22, NULL, '6 bài báo về lý thuyết số', 'Giáo trình Toán cao cấp', 'Giải thưởng Toán học Quốc gia', NULL, 0, 'LaTeX Professional Certification', 'IELTS 7.0', NULL),
(8, 'Zakuza', '1992-04-18', '2020-01-15', 'Male', 'thuy.do@university.edu.vn', '0912789456', 'Số 17 Nguyễn Du, Quy Nhơn', 'lecturer_image/1741231760_476867143_1590607448238877_2116094028939920549_n.jpg', 1, 2, '2025-03-05 14:08:00', '2025-03-07 18:21:05', 'Hợp đồng', 19000000, 5.00, 'Môi trường', 'Đại học SPKT Vĩnh Long', '2014', 'Chứng chỉ Quản lý Môi trường', 'Quản lý Môi trường, Sinh thái học', 8, NULL, '3 bài báo về bảo vệ môi trường', 'Sách về Phát triển Bền vững', 'Giải thưởng Nghiên cứu Môi trường', NULL, 0, 'GIS Professional Certification', 'TOEIC 800', NULL),
(9, 'Hoàng Văn Tuấn', '1983-08-25', '2009-12-01', 'Male', 'tuan.hoang@university.edu.vn', '0976543210', 'Số 66 Trần Hưng Đạo, Vinh', 'lecturer_image/default.jpg', 4, 1, '2025-03-05 14:08:00', '2025-03-06 12:57:43', 'Biên chế', 3800000, 1.00, 'Lịch sử', 'Đại học Khoa học Xã hội và Nhân văn', '2007', 'Chứng chỉ Nghiên cứu Sử học', 'Lịch sử Việt Nam, Lịch sử Thế giới', 14, NULL, '5 bài báo về lịch sử địa phương', 'Sách chuyên khảo về Chiến tranh Việt Nam', 'Giải thưởng Nghiên cứu Lịch sử', NULL, 0, 'Digital Archiving Certification', 'IELTS 7.5', NULL),
(10, 'Phan Thị Kim', '1987-10-03', '2014-07-15', 'Female', 'kim.phan@university.edu.vn', '0903456789', 'Số 41 Trưng Trắc, Bắc Ninh', 'lecturer_image/default.jpg', 5, 2, '2025-03-05 14:08:00', '2025-03-06 12:57:47', 'Hợp đồng', 3800000, 1.00, 'Tâm lý học', 'Đại học Giáo dục', '2009', 'Chứng chỉ Tư vấn Tâm lý', 'Tâm lý Giáo dục, Tư vấn Tâm lý', 11, NULL, '4 bài báo về tâm lý học', 'Sách hướng dẫn Tư vấn Học đường', 'Giải thưởng Nhà Giáo Sáng tạo', NULL, 0, 'Psychological Assessment Certification', 'TOEFL 90', NULL),
(11, 'Nguyễn Thành Tỷ', '2004-07-16', '2025-01-05', 'Male', '22004071@st.vlute.edu.vn', '0914161844', '111 Ngô Quyền, Phường 4, quận Bạc Liêu, TP Cà Mau', 'lecturer_image/1741229954_images.jpg', 1, 9, '2025-03-05 07:39:37', '2025-03-06 12:57:51', 'Biên chế', 3800000, 1.00, 'Công nghệ thông tin', 'Đại học Sư Phạm Kỹ Thuật Vĩnh Long', '2026', 'Kỹ năng nghề 3/5 nghề Lắp cáp mạng thông tin cấp Quốc gia', 'Lập trình ứng dụng cho thiết bị di động, Lập trình Web, Hệ thống thông tin quang', 1, 'Trường Cao Đẳng Bách Khoa Nam Sài Gòn', 'Hệ thống nhúng IoT trên máy bay', 'Lập trình viên GenZ', 'CCNA Pro Russia', 'V.I.P PRO Du Học Sinh', 1, 'MOS PRO', 'B1', 'Kỹ thuật viên tin học');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_courses`
--

CREATE TABLE `lecturer_courses` (
  `id` int(11) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_projects`
--

CREATE TABLE `research_projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Ongoing','Completed','Cancelled') DEFAULT 'Ongoing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `lecturer_id` (`lecturer_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_name` (`course_name`),
  ADD KEY `courses_ibfk_1` (`department_id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `degree_name` (`degree_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `degree_id` (`degree_id`);

--
-- Indexes for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturer_id` (`lecturer_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `research_projects`
--
ALTER TABLE `research_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `research_projects`
--
ALTER TABLE `research_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `lecturers_ibfk_2` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`);

--
-- Constraints for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  ADD CONSTRAINT `lecturer_courses_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lecturer_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `research_projects`
--
ALTER TABLE `research_projects`
  ADD CONSTRAINT `research_projects_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
