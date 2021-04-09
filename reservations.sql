-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Kwi 2021, 20:01
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `szczepienia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `res_id` int(11) NOT NULL,
  `res_date` date DEFAULT NULL,
  `res_slot` varchar(32) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `res_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `res_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `res_tel` varchar(60) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`res_id`, `res_date`, `res_slot`, `res_name`, `res_email`, `res_tel`) VALUES
(1, '2021-04-20', 'AM', 'Piotr Zajczyk', 'piotrekzajczyk@gmail.com', '883473833'),
(2, '2021-04-20', 'AM', 'Piotr Zajczyk', 'piotrekzajczyk@gmail.com', '883473833'),
(3, '2021-04-30', 'PM', 'jan', 'ghtne542@gmail.com', '123456789'),
(4, '2021-04-09', 'AM', 'jan', 'ghtne542@gmail.com', '21323617821389'),
(5, '2021-04-09', 'AM', 'jan', 'ghtne542@gmail.com', '21323617821389'),
(6, '2021-04-09', 'AM', 'jan', 'ghtne542@gmail.com', '21323617821389'),
(7, '2032-01-15', '12-16', 'Marian pazdzioch', 'bldsajidasid@wp.pl', '1234156546'),
(8, '2032-01-15', '12-16', 'Marian pazdzioch', 'bldsajidasid@wp.pl', '1234156546'),
(9, '2032-01-15', '12-16', 'Marian pazdzioch', 'bldsajidasid@wp.pl', '1234156546'),
(10, '2032-01-15', '12-16', 'Marian pazdzioch', 'bldsajidasid@wp.pl', '1234156546'),
(11, '2021-04-20', '8-10', 'xdddd', 'dsawdaeda@wp.pl', '213456676');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `res_date` (`res_date`),
  ADD KEY `res_slot` (`res_slot`),
  ADD KEY `res_name` (`res_name`),
  ADD KEY `res_email` (`res_email`),
  ADD KEY `res_tel` (`res_tel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
