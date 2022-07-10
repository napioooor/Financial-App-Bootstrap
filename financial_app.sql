-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Lip 2022, 17:39
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `financial_app`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `expense_date` date NOT NULL DEFAULT current_timestamp(),
  `category` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `payment` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `comment` varchar(250) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expense_category_default`
--

CREATE TABLE `expense_category_default` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `expense_category_default`
--

INSERT INTO `expense_category_default` (`id`, `name`) VALUES
(1, 'Jedzenie'),
(2, 'Mieszkanie'),
(3, 'Transport'),
(4, 'Telekomunikacja'),
(5, 'Opieka zdrowotna'),
(6, 'Ubrania'),
(7, 'Higiena'),
(8, 'Dzieci'),
(9, 'Rozrywka'),
(10, 'Szkolenia'),
(11, 'Wycieczka'),
(12, 'Książki'),
(13, 'Oszczędności'),
(14, 'Na złotą jesień, czyli emeryturę'),
(15, 'Spłata długów'),
(16, 'Darowizna'),
(17, 'Inne wydatki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes`
--

CREATE TABLE `incomes` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `category` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `income_date` date NOT NULL DEFAULT current_timestamp(),
  `dummy` int(11) DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `income_category_default`
--

CREATE TABLE `income_category_default` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `income_category_default`
--

INSERT INTO `income_category_default` (`id`, `name`) VALUES
(1, 'Wynagrodzenie'),
(2, 'Odsetki bankowe'),
(3, 'Sprzedaż na Allegro'),
(4, 'Inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_default`
--

CREATE TABLE `payment_default` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `payment_default`
--

INSERT INTO `payment_default` (`id`, `name`) VALUES
(1, 'Gotówka'),
(2, 'Karta debetowa'),
(3, 'Karta kredytowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nick` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `expense_category_default`
--
ALTER TABLE `expense_category_default`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `income_category_default`
--
ALTER TABLE `income_category_default`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payment_default`
--
ALTER TABLE `payment_default`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `expense_category_default`
--
ALTER TABLE `expense_category_default`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22182;

--
-- AUTO_INCREMENT dla tabeli `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `income_category_default`
--
ALTER TABLE `income_category_default`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `payment_default`
--
ALTER TABLE `payment_default`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
