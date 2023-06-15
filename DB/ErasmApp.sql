-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: localhost
-- Χρόνος δημιουργίας: 15 Ιουν 2023 στις 23:11:53
-- Έκδοση διακομιστή: 10.4.28-MariaDB
-- Έκδοση PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `ErasmApp`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `passed_courses` int(11) DEFAULT NULL,
  `average_passed_courses` int(11) DEFAULT NULL,
  `english_certificate` varchar(255) DEFAULT NULL,
  `foreign_languages` varchar(255) DEFAULT NULL,
  `first_uni` varchar(255) DEFAULT NULL,
  `second_uni` varchar(255) DEFAULT NULL,
  `third_uni` varchar(255) DEFAULT NULL,
  `transcript` text DEFAULT NULL,
  `english_degree` text DEFAULT NULL,
  `other_degrees` text DEFAULT NULL,
  `tick_box` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `applications`
--

INSERT INTO `applications` (`application_id`, `passed_courses`, `average_passed_courses`, `english_certificate`, `foreign_languages`, `first_uni`, `second_uni`, `third_uni`, `transcript`, `english_degree`, `other_degrees`, `tick_box`) VALUES
(4, 70, 70, 'B2', 'ΝΟ', '1', '1', '1', 'files/theodor/Εργασία 3.pdf', 'files/theodor/- (4).pdf', 'files/theodor/test.pdf,files/theodor/01. logic (3).pdf', 0),
(5, 70, 80, 'C1', 'Yes', 'University of Barcelona', 'University of Vienna', 'Hanze University', 'files/theodor/Εργασία 3.pdf', 'files/theodor/ErasmApp.sql', 'files/theodor/- (4).pdf,files/theodor/Εργαστήριο_Γραφείο_Διασύνδεσης_Ανακοίνωση_v2.pdf,files/theodor/index.html,files/theodor/test.pdf', 0),
(6, 70, 70, 'B2', 'Yes', 'University of Vienna', 'University of Vienna', 'Hanze University', 'files/test/Εργασία 3.pdf', 'files/test/ErasmApp.sql', 'files/test/- (4).pdf,files/test/Εργαστήριο_Γραφείο_Διασύνδεσης_Ανακοίνωση_v2.pdf,files/test/index.html,files/test/test.pdf', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `dates`
--

CREATE TABLE `dates` (
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  `date_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `dates`
--

INSERT INTO `dates` (`date_from`, `date_to`, `enable`, `date_id`) VALUES
('2023-06-16', '2023-06-22', 0, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `fill`
--

CREATE TABLE `fill` (
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `fill`
--

INSERT INTO `fill` (`user_id`, `application_id`) VALUES
(13, 4),
(13, 5),
(10, 6);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Universities`
--

CREATE TABLE `Universities` (
  `university_id` int(11) NOT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `Universities`
--

INSERT INTO `Universities` (`university_id`, `university_name`, `country`) VALUES
(1, 'University of Barcelona', 'Barcelona'),
(2, 'Hanze University', 'Hanze'),
(3, 'University of Vienna', 'Vienna');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `a_m` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `Users`
--

INSERT INTO `Users` (`user_id`, `fname`, `lname`, `password`, `username`, `email`, `a_m`, `tel`) VALUES
(1, 'nick', 'tselikas', '1234', 'nick_tsel', 'nicktsel@gmail.com', '20222020202020', '6969696969'),
(8, 'Spyros', 'Kon', '12345!', 'SpyrosK', 'spyrokonida@gmail.com', '2022374859438', '6947418946'),
(9, 'Makis', 'kotsampasis', '12345!', 'makiskots1', 'spyrokonida@gmail.com', '2022394756478', '6947418946'),
(10, 'test', 'test', '12345!', 'test', 'spyrokonida@gmail.com', '2022348576934', '6947418946'),
(11, 'something ', 'some', '12345!', 'some', 'spyrokonida@gmail.com', '2022384567584', '6947418946'),
(12, 'jay', 'jay', '12345!', 'jay', 'spyrokonida@gmail.com', '2022394857485', '6947418946'),
(13, 'thodoris', 'maran', '1234!', 'theodor', 'theodor@gmail.com', '2022394857438', '6947418946'),
(15, 'admin', 'admin', '12345!', 'admin', 'dkkdj@gmail.com', '2022348576940', '6947418947');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `User_t`
--

CREATE TABLE `User_t` (
  `user_type_id` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `User_t`
--

INSERT INTO `User_t` (`user_type_id`, `user_type`) VALUES
(8, 0),
(9, 0),
(9, 0),
(10, 0),
(10, 0),
(11, 0),
(11, 0),
(12, 0),
(12, 0),
(13, 0),
(13, 0),
(15, 1),
(15, 1);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Ευρετήρια για πίνακα `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`date_id`);

--
-- Ευρετήρια για πίνακα `fill`
--
ALTER TABLE `fill`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `application_id` (`application_id`);

--
-- Ευρετήρια για πίνακα `Universities`
--
ALTER TABLE `Universities`
  ADD PRIMARY KEY (`university_id`);

--
-- Ευρετήρια για πίνακα `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- Ευρετήρια για πίνακα `User_t`
--
ALTER TABLE `User_t`
  ADD KEY `user_type_id` (`user_type_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `dates`
--
ALTER TABLE `dates`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `Universities`
--
ALTER TABLE `Universities`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `fill`
--
ALTER TABLE `fill`
  ADD CONSTRAINT `fill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `fill_ibfk_2` FOREIGN KEY (`application_id`) REFERENCES `applications` (`application_id`);

--
-- Περιορισμοί για πίνακα `User_t`
--
ALTER TABLE `User_t`
  ADD CONSTRAINT `user_t_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `Users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
