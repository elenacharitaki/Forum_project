-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 12 Μάη 2022 στις 20:27:42
-- Έκδοση διακομιστή: 10.4.21-MariaDB
-- Έκδοση PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `db_forum`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`id`, `title`, `url`) VALUES
(0, 'Χωρίς κατηγορία', 'xoris-katigoria'),
(1, 'Ειδήσεις', 'news'),
(2, 'Κοινωνικά', 'koinonika'),
(3, 'Αθλητικά', 'sports'),
(4, 'Επιστήμη', 'epistimi'),
(5, 'Πολιτική', 'politiki'),
(6, 'Οικονομία', 'oikonomia'),
(7, 'Υγεία', 'ygeia'),
(8, 'Ψυχαγωγία', 'psixagogia'),
(9, 'Πολιτισμός', 'politismos');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `description`, `user_id`, `date_created`, `status_id`) VALUES
(26, 0, 'Title (no category)', 'Body', 3, '2022-04-26 19:05:55', 1),
(27, 1, 'Title (news)', 'Body', 3, '2022-04-26 19:06:18', 1),
(28, 2, 'Title (social)', 'Body', 3, '2022-04-26 19:06:38', 1),
(29, 3, 'Title (sports)', 'Body', 3, '2022-04-26 19:07:02', 1),
(30, 4, 'Title (science)', 'Body', 3, '2022-04-26 19:07:47', 1),
(31, 5, 'Title (politics)', 'Body', 3, '2022-04-26 19:08:06', 1),
(32, 6, 'Title (economy)', 'Body', 3, '2022-04-26 19:08:27', 1),
(33, 7, 'Title (health)', 'Body', 3, '2022-04-26 19:08:51', 1),
(34, 8, 'Title (entertainment)', 'Body', 3, '2022-04-26 19:09:29', 1),
(35, 9, 'Title (culture)', 'Body', 3, '2022-04-26 19:10:30', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Ενεργό'),
(2, 'Ανενεργό');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `backgroundcolor` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `backgroundcolor`, `date_created`) VALUES
(3, 'User', '', 'me@me.com', '81dc9bdb52d04dc20036dbd8313ed055', '#1F5E9C80', '2021-12-23 22:30:10');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID_to_categories` (`category_id`),
  ADD KEY `userID_to_users` (`user_id`),
  ADD KEY `statusID_to_status` (`status_id`);

--
-- Ευρετήρια για πίνακα `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT για πίνακα `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `categoryID_to_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `statusID_to_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `userID_to_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
