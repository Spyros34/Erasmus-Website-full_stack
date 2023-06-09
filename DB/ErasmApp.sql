-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: localhost
-- Χρόνος δημιουργίας: 09 Ιουν 2023 στις 20:12:34
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

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `fill`
--

CREATE TABLE `fill` (
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Universities`
--

CREATE TABLE `Universities` (
  `university_id` int(11) NOT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'nick', 'tselikas', '1234', 'nick_tsel', 'nicktsel@gmail.com', '20222020202020', '6969696969');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `User_t`
--

CREATE TABLE `User_t` (
  `user_type_id` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

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
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `Universities`
--
ALTER TABLE `Universities`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
