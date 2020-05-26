-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 26.Máj 2020, 21:10
-- Verzia serveru: 10.4.11-MariaDB
-- Verzia PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `taxisluzba`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `auta`
--

CREATE TABLE `auta` (
  `id` int(11) NOT NULL,
  `znacka` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `pocet_miest` int(11) NOT NULL,
  `ecv` varchar(7) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `auta`
--

INSERT INTO `auta` (`id`, `znacka`, `pocet_miest`, `ecv`) VALUES
(1, 'BMW XDrive', 5, 'NR047HB'),
(2, 'Skoda Octavia AR', 5, 'NR204DD'),
(4, 'Dacia Duster', 6, 'NR254GB'),
(7, 'BMW', 5, 'NZ250KK');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `cennik`
--

CREATE TABLE `cennik` (
  `id` int(11) NOT NULL,
  `oblast` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `cennik`
--

INSERT INTO `cennik` (`id`, `oblast`, `cena`) VALUES
(1, 'Nitra - Staré mesto', 2),
(2, 'Nitra - Klokočina, západ', 3),
(3, 'Nitra - Klokočina, východ', 2),
(4, 'Nitra - centro', 1.5),
(5, 'Nitra - Chrenová', 2),
(6, 'Nitra - Zobor', 3),
(7, 'Nitra - Mlynárce', 4),
(8, 'Nitra - Kynek', 4),
(9, 'Nitra - Krškany', 3.5),
(10, 'Nitra - Jarok, Ivanka pri Nitre, Branč', 7);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `jazdy`
--

CREATE TABLE `jazdy` (
  `id` int(11) NOT NULL,
  `id_zamestnanec` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `id_objednavky` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `jazdy`
--

INSERT INTO `jazdy` (`id`, `id_zamestnanec`, `id_auto`, `id_objednavky`, `datum`) VALUES
(6, 10, 1, 3, '2020-05-23 12:26:08'),
(10, 16, 2, 6, '2020-05-25 13:01:19'),
(11, 16, 2, 5, '2020-05-25 13:07:14'),
(12, 16, 2, 4, '2020-05-25 13:46:01'),
(13, 15, 2, 1, '2020-05-26 18:42:00');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `objednavky`
--

CREATE TABLE `objednavky` (
  `id` int(11) NOT NULL,
  `id_zakaznik` int(11) DEFAULT NULL,
  `odkial` varchar(60) COLLATE utf8_slovak_ci NOT NULL,
  `kam` varchar(60) COLLATE utf8_slovak_ci NOT NULL,
  `id_cennik` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stav` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `objednavky`
--

INSERT INTO `objednavky` (`id`, `id_zakaznik`, `odkial`, `kam`, `id_cennik`, `datum`, `stav`) VALUES
(1, 9, 'Ivanka pri Nitre', 'Čajkovskeho 1', 10, '2020-05-26 18:46:04', 1),
(3, 9, 'Konečná 11, Ivanka pri Nitre', 'Čajkovského 24', 10, '2020-05-26 18:46:12', 0),
(4, 16, 'Kostolná 25, Ivanka pri Nitre', 'Čajkovského 24', 10, '2020-05-26 18:46:16', 0),
(5, 16, 'Beňadikova 47, Ivanka pri Nitre', 'Výstavná 40, Nitra', 10, '2020-05-26 18:46:20', 0),
(6, 16, 'Beňadikova 47, Ivanka pri Nitre', 'Výstavná 40, Nitra', 10, '2020-05-26 18:46:28', 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `pouzivatelia`
--

CREATE TABLE `pouzivatelia` (
  `id` int(11) NOT NULL,
  `meno` varchar(60) COLLATE utf8_slovak_ci NOT NULL,
  `telefon` varchar(13) COLLATE utf8_slovak_ci NOT NULL,
  `adresa` varchar(60) COLLATE utf8_slovak_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_slovak_ci NOT NULL,
  `heslo` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `pouzivatelia`
--

INSERT INTO `pouzivatelia` (`id`, `meno`, `telefon`, `adresa`, `email`, `heslo`, `role`) VALUES
(8, 'Mária Pappová', '0915638762', 'Krasna 11', 'admin@admin.sk', 'cf76297b23d393db7f7c54659c89b46da163cbbaf2389b29db6af84afc0967f33426ebef7b819fddc16d7a1d7c22644547ee3e15f28f5a007bfa9bbdec5aab57NiWHONCi8SS0xnY1La63xC0llxOHReeYapmFj4BnkCU=', 2),
(9, 'Juraj Vanko', '0951478445', 'Modrovska 2, Nitra', 'jurkovanko@ukf.sk', 'd9c3a688ca57056dcd35888d6f877d278b0f4c240b26b92c79693a5c902da108d198a326ff42de5125d4f1f6b2ca7d03f9db368119c262719327bdb4e0a6e5d6G4G3tKYZRgGSmL7qqbbQYRILJebvvYyZI7ncTvo7QPY=', 0),
(10, 'Ján Veselý', '0902456789', 'Hlavná 17, Nitra', 'janvesely@gmail.com', 'e4c6c5dd3b3da9c80bb361b1a5418ab4a8d0994521b3d1dbd53462c2d8eed845bbe76161a70faf03d7e34c02fd011cc138cdd13814925dc5079a44865ed8bbceCtmzzAhPg3U7PIezFfCX+yBMMs485/w9+tJ0CT/XfiI=', 1),
(11, 'Lukáš Smutný', '0945789621', 'Konečná 45, Zbehy', 'lukassmutny@gmail.com', 'be4cd7d45589b64e9e96a960a0e5a3b2beb51e095e6df0f49922f58fb9559b9012a37b5b53c365ac38ee62fb2c161b3f31e3955b92eaf00bb98f6c901bbae45c2RES3CDibpD742z0nMde1Eg5mCK+7IxXz9f4+PY4seU=', 1),
(12, 'Adam Nesvoj', '0954123587', 'Fialová 52, Nitra-Zobo', 'adamnesvoj@gmail.com', 'd2b668bc741f55d433012ed432ce05b4bc14103f3d7f43217204244bfff026a62d05bc966f4e8f12039b838ed09d0b47d31befc68c42fc90f3cc5065778d93542Iic1eZkVAD+uFRJzHe9U2txieIdz1orYT6imLBuaRQ=', 1),
(15, 'Juraj Vanko', '0908168144', 'Lobotkova 25, Zbehy', 'jur.vanko@gmail.com', 'dadc1a575708cb3342089374144e5ef475c8e9c0b3ee6792ae23ff17748188e33fe0a8266b9af8d190b7d261f58d2868998dea9370937ac71109df53b0c9c9f9JkLxohTN16XiuHkPp/K6Ko4H31k/ZwaJnH1v4ZjMIo4=', 1),
(16, 'Jozef Vanko', '0908168471', 'Novomestská 5, 94060 Nové Zámky', 'nightwish.vanko33@gmail.com', '6f814d8687ed9dc008e1cc46dae381241b2e453271d4a94e2ae1242d104afafe70a6ce8c1492b941307e2656434b9ba46af270efb0414fea1a09511cf0e84e52d9AL1wkE/XeBEPJ1FyCo1Bbftu8v6uKxpgQ5T+d2EQ8=', 0),
(17, 'Martin Benko', '0903654789', 'Lúčna 15, Nitra-Zobor', 'martinbenko@gmail.com', '234a8f01131bcf91b985fccf6ae6423ee95f7117bc7a0d8959d6c6816d1491c2f26beac3808cd7113bfefb55b1f6a4c3c9bf7bc3d9df6a3d9db0714d9076d57fz8yd3TiPc74FoB1IwrKdEdz9UcU7vIRwYJYo1ZwuGBg=', 1),
(18, 'Lukáš Šuster', '0945621789', 'Zbehy 11, Zbehy', 'lukassuster@gmail.com', '0554e33b9f0bff1e6e7b25fb98fb2e7e3542419e28abb1741cbc322cf556ecff4a07e902a4d0fd1e0e6e9c770f7cedc486863b71d9f8fe91c369f9d909b943caabltHA5QMdJ7TbBH+S9rzJBrvplpgr2Xz6uoyy8MzWM=', 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zamestnanci`
--

CREATE TABLE `zamestnanci` (
  `id` int(11) NOT NULL,
  `id_pouzivatelia` int(11) NOT NULL,
  `datum_narodenia` date NOT NULL,
  `rodne_cislo` int(10) NOT NULL,
  `datum_nastupu` date NOT NULL,
  `ukoncenie_sluzby` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `zamestnanci`
--

INSERT INTO `zamestnanci` (`id`, `id_pouzivatelia`, `datum_narodenia`, `rodne_cislo`, `datum_nastupu`, `ukoncenie_sluzby`) VALUES
(1, 9, '1991-05-18', 987745612, '2019-05-08', '2020-05-23'),
(2, 10, '1985-05-06', 987457212, '2016-12-08', NULL),
(3, 11, '1987-09-25', 997456215, '2016-10-11', NULL),
(4, 12, '1979-05-10', 97456218, '2020-05-08', NULL),
(5, 8, '2020-05-14', 980109255, '2020-05-21', NULL),
(8, 15, '1985-11-15', 2147483647, '2020-05-23', NULL),
(9, 17, '1975-11-23', 2147483647, '2020-05-26', NULL);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `auta`
--
ALTER TABLE `auta`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `cennik`
--
ALTER TABLE `cennik`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `jazdy`
--
ALTER TABLE `jazdy`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `pouzivatelia`
--
ALTER TABLE `pouzivatelia`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `zamestnanci`
--
ALTER TABLE `zamestnanci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `auta`
--
ALTER TABLE `auta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pre tabuľku `cennik`
--
ALTER TABLE `cennik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `jazdy`
--
ALTER TABLE `jazdy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `pouzivatelia`
--
ALTER TABLE `pouzivatelia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pre tabuľku `zamestnanci`
--
ALTER TABLE `zamestnanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
