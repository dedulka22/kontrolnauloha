-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost
-- Čas generovania: St 16.Aug 2017, 09:55
-- Verzia serveru: 10.1.25-MariaDB
-- Verzia PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `test`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `nakup`
--

CREATE TABLE `nakup` (
  `pouzitie` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `zbozi` varchar(80) NOT NULL,
  `pocet_kusov` int(11) NOT NULL,
  `cena_za_zbozi` int(11) NOT NULL,
  `zakaznik_id` int(11) NOT NULL,
  `datum_nakupu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `nakup`
--

INSERT INTO `nakup` (`pouzitie`, `id`, `zbozi`, `pocet_kusov`, `cena_za_zbozi`, `zakaznik_id`, `datum_nakupu`) VALUES
(14, 1, 'rozky', 10, 2, 3, '2017-08-16 02:16:12'),
(14, 2, 'maslo', 2, 40, 3, '2017-08-16 08:56:23'),
(14, 3, 'chlieb', 5, 30, 3, '2017-07-15 04:21:04'),
(14, 4, 'sunka', 10, 10, 3, '2017-07-16 13:00:00'),
(14, 5, 'voda', 5, 15, 3, '2017-08-01 07:09:42'),
(14, 6, 'dzus', 2, 46, 3, '2017-07-17 03:33:13');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `vernostne_karty`
--

CREATE TABLE `vernostne_karty` (
  `id` int(11) NOT NULL,
  `cislo_karty` varchar(70) NOT NULL,
  `typ_karty` enum('docasna','zakladni') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `vernostne_karty`
--

INSERT INTO `vernostne_karty` (`id`, `cislo_karty`, `typ_karty`) VALUES
(1, '1234', 'docasna'),
(2, '1222', 'zakladni'),
(3, '3333', 'docasna'),
(4, '4444', 'zakladni'),
(5, '3435', 'docasna'),
(6, '7890', 'zakladni'),
(7, '4378', 'docasna'),
(8, '6778', 'zakladni'),
(9, '7899', 'docasna'),
(10, '3454', 'zakladni'),
(11, '7777', 'docasna'),
(12, '8888', 'zakladni'),
(13, '9999', 'docasna'),
(14, '1000', 'zakladni'),
(15, '5555', 'docasna');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zakaznik`
--

CREATE TABLE `zakaznik` (
  `id_zakaznik` int(11) NOT NULL,
  `meno` varchar(50) NOT NULL,
  `priezvisko` varchar(70) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(30) NOT NULL,
  `datum_registrace` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_karta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `zakaznik`
--

INSERT INTO `zakaznik` (`id_zakaznik`, `meno`, `priezvisko`, `adresa`, `email`, `telefon`, `datum_registrace`, `id_karta`) VALUES
(3, 'Deana', 'Marekova', 'Novohradska 24, Velky Krtis, 99001', 'deana.marekova.22@gmail.com', '+421908245040', '2017-08-10 11:01:46', 14),
(8, 'fe', 'fe', 'fds', 'fe@fd.kk', '999888800', '2017-08-12 08:44:54', 15),
(9, 'Deana', 'Marekova', 'Novohradska 24,Velky Krtis, 99001', 'deana.marekova.22@gmail.com', '+421908245040', '2017-08-12 09:19:49', 4),
(11, 'dfs', 'fds', 'fds', 'fds@re.sk', '444333222', '2017-08-12 09:30:03', 5),
(12, 'Marian', 'fdsfs', 'fdsfsd', 'fdsf@dsf.pp', '444333222', '2017-08-15 16:18:58', 10),
(22, 'daco', 'daco', 'fsdfdfsdsfds', 'daco@daco.ll', '999000999', '2017-08-15 21:06:40', 6),
(23, 'halo', 'halo', 'fsfds 0', 'halo@fas.kl', '777666889', '2017-08-15 21:07:12', 2),
(27, 'fsfg', 'ggffff', 'fdsfdsf', 'dfff@ę.pp', '0000999900', '2017-08-16 00:31:06', 13),
(28, 'heeeej', 'hooou', 'fds', 'ff@w.oo', '888999000', '2017-08-16 00:33:00', 8),
(29, 'gfsgfdg', 'gfdgfdg', 'fdsds 3', 'gf@rr.pp', '999000999', '2017-08-16 00:40:00', 1),
(30, 'gfsgfdg', 'gfdgfdg', 'fdsds 3', 'gf@rr.pp', '999000999', '2017-08-16 00:40:08', 3),
(37, 'gfsgfdg', 'gfdgfdg', 'fdsds 3', 'gf@rr.pp', '999000999', '2017-08-16 00:47:47', 12);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `nakup`
--
ALTER TABLE `nakup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zakaznik` (`zakaznik_id`) USING BTREE;

--
-- Indexy pre tabuľku `vernostne_karty`
--
ALTER TABLE `vernostne_karty`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `zakaznik`
--
ALTER TABLE `zakaznik`
  ADD PRIMARY KEY (`id_zakaznik`),
  ADD UNIQUE KEY `id_karta` (`id_karta`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `nakup`
--
ALTER TABLE `nakup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pre tabuľku `vernostne_karty`
--
ALTER TABLE `vernostne_karty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pre tabuľku `zakaznik`
--
ALTER TABLE `zakaznik`
  MODIFY `id_zakaznik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
