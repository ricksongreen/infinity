-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 16 mei 2018 om 08:52
-- Serverversie: 5.5.41-MariaDB
-- PHP-versie: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t08er1718_t08`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanwezigheid`
--

CREATE TABLE `aanwezigheid` (
  `ID` int(32) NOT NULL,
  `aanwezigheid` tinyint(1) NOT NULL,
  `tijd` datetime NOT NULL,
  `student_ID` int(6) NOT NULL,
  `les_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `ID` int(6) NOT NULL,
  `voornaam` varchar(40) NOT NULL,
  `tussenvoegsel` varchar(20) DEFAULT NULL,
  `achternaam` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gebruikersnaam` varchar(40) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`ID`, `voornaam`, `tussenvoegsel`, `achternaam`, `email`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'Rick', NULL, 'Verweij', 's1118875@student.windesheim.nl', 'ricksongreen', '$2y$10$bDr.xNqiD3bn4QfPY1vgFOt/6vKIN1IsZ3pmTE2p25GPszb4GAdvq'),
(2, 'Syst', NULL, 'Admin', 'admin@admin.com', 'ADMIN', '$2y$10$Tzv4Cd7i6GKMFecPHTwSSOpZk2acMLsYnex579WLbNCoC9mRrXgQ2'),
(3, 'Menno', NULL, 'Koetsier', 'MennoKoetsier@mail.com', 'MennoKoetsier', '$2y$10$HLYy2YOYylITOEeNNnu.t.CPD7A1HfyEUEfTEnkfVak/XuWo1/0ZC'),
(4, 'Sten', '', 'Ellsworth', 'Stenellsworth@hotmail.com', 'sten', '$2y$10$sak3NQz6bzG9agPYQ02XO.Th7vNxXna0qER9eKPiYJeSI2XzY7jQy'),
(5, 'TEST', NULL, 'TEST', 'TEST', 'TEST', '$2y$10$jOYVu2Wr59KCgQH0ZBCO..rSpDzFrWr1R9ombqD8ReQvIPQL2V1IG'),
(7, 'Hans', '', 'Bastiaan', 'HansBastiaan@email.com', 'HansBastiaan', '$2y$10$Oanm4LmREdSeen5BLFM40ORmxkxqjrSwK3iEyAAv0JxekYKOzo4jq'),
(9, 'mischa', 'van', 'Ek', 'mvanek@xs4all.nl', 'Derpsider', '$2y$10$9D2f.k7zgoBTlUU2/51Sm.j8ZSWvuiRHiH4nodt5IeYLKlAQY1TgK');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `ID` int(5) NOT NULL,
  `naam` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`ID`, `naam`) VALUES
(1, 'WFHBOICT17.V1A'),
(2, 'WFHBOICT17.V1B'),
(3, 'WFHBOICT17.V1C'),
(4, 'WFHBOICT17.V1D'),
(5, 'WFHBOICT17.V1E'),
(6, 'WFHBOICT17.V1F'),
(7, 'WFHBOICT17.V1G'),
(8, 'WFHBOICT17.V1H');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lessen`
--

CREATE TABLE `lessen` (
  `ID` int(8) NOT NULL,
  `naam` varchar(60) NOT NULL,
  `locatie` varchar(8) NOT NULL,
  `begintijd` datetime NOT NULL,
  `eindtijd` datetime NOT NULL,
  `klas_ID` int(5) NOT NULL,
  `docent_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE `student` (
  `ID` int(5) NOT NULL,
  `nummer` varchar(8) NOT NULL,
  `opleiding` varchar(20) DEFAULT NULL,
  `klas_ID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `student`
--

INSERT INTO `student` (`ID`, `nummer`, `opleiding`, `klas_ID`) VALUES
(1, 's1118875', 'HBO-ICT', 7),
(9, 's1118480', 'HBO-ICT', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `werknemer`
--

CREATE TABLE `werknemer` (
  `ID` int(6) NOT NULL,
  `nummer` varchar(5) NOT NULL,
  `studentbegeleider` tinyint(1) NOT NULL,
  `systeembeheerder` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `werknemer`
--

INSERT INTO `werknemer` (`ID`, `nummer`, `studentbegeleider`, `systeembeheerder`) VALUES
(2, 'ADMIN', 0, 1),
(3, 'KRM08', 0, 0),
(7, 'BNH01', 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `student_ID` (`student_ID`),
  ADD KEY `les_ID` (`les_ID`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `docent_ID` (`docent_ID`),
  ADD KEY `klas_ID` (`klas_ID`);

--
-- Indexen voor tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `klas_ID` (`klas_ID`);

--
-- Indexen voor tabel `werknemer`
--
ALTER TABLE `werknemer`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `lessen`
--
ALTER TABLE `lessen`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  ADD CONSTRAINT `aanwezigheid_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `student` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `aanwezigheid_ibfk_2` FOREIGN KEY (`les_ID`) REFERENCES `lessen` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `lessen_ibfk_1` FOREIGN KEY (`docent_ID`) REFERENCES `werknemer` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lessen_ibfk_2` FOREIGN KEY (`klas_ID`) REFERENCES `klas` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`klas_ID`) REFERENCES `klas` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `gebruiker` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `werknemer`
--
ALTER TABLE `werknemer`
  ADD CONSTRAINT `werknemer_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `gebruiker` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
