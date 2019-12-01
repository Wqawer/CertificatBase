-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lis 2019, 22:45
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `certificate`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licenses`
--

CREATE TABLE `licenses` (
  `Id` int(11) NOT NULL,
  `Name` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `Surname` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `Phone` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `pathAwers` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `pathRewers` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `licenses`
--

INSERT INTO `licenses` (`Id`, `Name`, `Surname`, `Phone`, `pathAwers`, `pathRewers`) VALUES
(6, 'paweł', 'kulesza', '222543123', '{14D498AB-2ABC-79B0-ADA2-4D742A08DCF4}.jpeg', '{0B006BB2-96FB-75D7-D0A1-369BE6D1E762}.jpeg'),
(16, 'a', 'b', '135798642', '{FC29C48E-3498-01B7-45D8-21A73AA6CE61}.jpeg', '{AA59D512-22EC-0A7D-ED57-6397483B69C0}.jpeg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `licenses`
--
ALTER TABLE `licenses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
