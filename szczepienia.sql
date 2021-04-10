-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Kwi 2021, 11:08
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

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
-- Struktura tabeli dla tabeli `dane_uzytkownika`
--

CREATE TABLE `dane_uzytkownika` (
  `uzytkownik_id` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `wiek` int(11) NOT NULL,
  `pesel` int(11) NOT NULL,
  `email` text NOT NULL,
  `haslo` varchar(100) NOT NULL,
  `nr_telefonu` int(11) NOT NULL,
  `termin_szczepienia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dane_uzytkownika`
--

INSERT INTO `dane_uzytkownika` (`uzytkownik_id`, `imie`, `nazwisko`, `wiek`, `pesel`, `email`, `haslo`, `nr_telefonu`, `termin_szczepienia`) VALUES
(1, 'Krzysiek', 'Kowalewski', 17, 2147483647, 'krzys@wp.pl', '123', 987456123, '010 02 10:30:00'),
(2, 'Karol', 'Kowalczuk', 25, 2147483647, 'ghtne542@gmail.com', 'abcdef', 456098701, ''),
(7, 'Jan', 'Osakowicz', 12, 325040269, 'ffaasfsfs@wp.pl', '12', 123, ''),
(8, 'Filip', 'Zajczyk', 12, 325040269, 'filipz@gmail.com', '123', 123456789, ''),
(9, 'Jan', 'stefania', 2, 12312, 'cos2@wp.pl', '123', 123456789, ''),
(10, 'Bzyk', 'Osakowicz', 18, 325040269, 'k.bzyk@wp.pl', '123', 123456789, ''),
(11, 'Paweł', 'Zajczyk', 17, 320402057, 'pawelzajczyk@wp.pl', '123', 567891234, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `data_szczepienia`
--

CREATE TABLE `data_szczepienia` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `rok` year(4) NOT NULL,
  `godzina` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, '2021-04-20', 'AM', 'Piotr Zajczyk', 'piotrekzajczyk@gmail.com', '883473833'),
(6, '2021-04-09', 'AM', 'jan', 'ghtne542@gmail.com', '21323617821389'),
(7, '2032-01-15', '12-16', 'Marian pazdzioch', 'bldsajidasid@wp.pl', '1234156546'),
(11, '2021-04-20', '8-10', 'xdddd', 'dsawdaeda@wp.pl', '213456676'),
(12, '2021-04-27', '10-12', 'Paweł Zajczyk', 'pawelzajczyk@wp.pl', '791849259'),
(14, '2021-04-28', '14-16', 'Krzysiek ', 'Kowalewski@wp.pl', '123456789');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_uzytkownika`
--
ALTER TABLE `dane_uzytkownika`
  ADD PRIMARY KEY (`uzytkownik_id`);

--
-- Indeksy dla tabeli `data_szczepienia`
--
ALTER TABLE `data_szczepienia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `email` (`res_email`),
  ADD KEY `res_date` (`res_date`),
  ADD KEY `res_slot` (`res_slot`),
  ADD KEY `res_name` (`res_name`),
  ADD KEY `res_email` (`res_email`),
  ADD KEY `res_tel` (`res_tel`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane_uzytkownika`
--
ALTER TABLE `dane_uzytkownika`
  MODIFY `uzytkownik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `data_szczepienia`
--
ALTER TABLE `data_szczepienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
