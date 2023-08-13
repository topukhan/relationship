-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 06:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'Digital Logic'),
(2, 'English'),
(3, 'Physics'),
(4, 'OOP'),
(5, 'Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `is_deleted`) VALUES
(428, 'Sakib Al Hasan', 0),
(439, 'Tamim Iqbal', 0),
(441, 'Sakib Al Hasan', 0),
(442, 'Sakib Al Hasan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `players_age`
--

CREATE TABLE `players_age` (
  `id` int NOT NULL,
  `age` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `players_age`
--

INSERT INTO `players_age` (`id`, `age`) VALUES
(6, 35);

-- --------------------------------------------------------

--
-- Table structure for table `player_mail`
--

CREATE TABLE `player_mail` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `player_mail`
--

INSERT INTO `player_mail` (`id`, `email`) VALUES
(1, 'sakib@gmail.com'),
(2, 'tamim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`) VALUES
(11, 13, 'Savoring Serenity: The Art of Mindful Cooking', 'Discover the therapeutic magic of cooking mindfully, where each dish becomes an opportunity for relaxation and self-expression.'),
(12, 13, 'Lost Worlds Rediscovered: Unearthing Ancient Civilizations', 'Join us on an archaeological adventure as we unearth the mysteries of civilizations long gone, revealing their remarkable legacies.'),
(14, 17, 'The Pursuit of Joy: Science-Backed Secrets to Happiness', 'Dive into the realm of positive psychology and discover actionable insights to cultivate lasting happiness and well-being.'),
(15, 17, 'Tech Horizons 2023: Navigating Digital Frontiers', 'Navigate the rapidly evolving landscape of technology trends, gaining insights into the cutting-edge innovations shaping our digital future.'),
(23, 15, 'Exploring the Mysteries of Deep Space', 'Embark on an extraordinary voyage through the cosmos as we delve into the wonders of deep space, from distant galaxies to breathtaking nebulae.'),
(36, 13, 'Efficiency Redefined: Mastering Your Productivity', 'Uncover ingenious strategies and tools to supercharge your productivity and achieve more in less time.'),
(37, 15, 'Whispers of the Wilderness: Enchanting Forest Escapes', 'Immerse yourself in the enchanting embrace of lush forests, where hidden paradises await around every corner.'),
(38, 15, 'Igniting Creativity: Nurturing Inspiration Daily', 'Explore the pathways to igniting your creative spark and infusing inspiration into every facet of your life.'),
(39, 17, 'Global Gastronomy at Home: Culinary Adventures Unleashed', 'Embark on a gastronomic journey around the world, bringing the rich tapestry of global flavors to your own kitchen.'),
(40, 17, 'Chasing Dreams: Empowerment on the Path to Success', 'Empower yourself with actionable strategies and real-life stories that will inspire you to transform your dreams into tangible achievements.');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `address`) VALUES
(9, 13, 'Tofayel', 'Ahmmad', '01652489652', 'Gazipur'),
(11, 15, 'Emily', 'Davis', '(987) 654-3210', '456 Gadget Avenue, Technocity, Innovationland, 54321'),
(13, 17, 'Liam', 'Green', '(555) 123-4567', '789 Meadow Lane, Wildernessville, Naturistan, 67890'),
(16, 20, 'Alex', 'Johnson', '(123) 456-7890', '123 Pine Street, Cityville, Stateville, 12345');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`) VALUES
(1, 'Topu', 't@g.com'),
(2, 'Khan', 'k@g.c'),
(3, 'Mr. Topper', 'topper@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_id` int NOT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_id`, `course_id`) VALUES
(1, 1),
(3, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `url`) VALUES
(1, 'http://host.com'),
(2, 'http://host.com/force'),
(4, 'h://add.g/<<'),
(5, 'http://host.com/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`) VALUES
(13, 'topukhan', 'topu@gmail.com'),
(15, 'techEnthusiast', 'tech@example.com'),
(17, 'natureLover', 'nature@example.com'),
(20, 'adventureSeeker', 'seeker@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players_age`
--
ALTER TABLE `players_age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_mail`
--
ALTER TABLE `player_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `players_age`
--
ALTER TABLE `players_age`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `player_mail`
--
ALTER TABLE `player_mail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
