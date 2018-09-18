-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 18, 2018 alle 17:47
-- Versione del server: 10.1.35-MariaDB
-- Versione PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restit`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `fasce_orarie`
--

CREATE TABLE `fasce_orarie` (
  `id_fascia` int(11) NOT NULL,
  `nome_fascia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `fasce_orarie`
--

INSERT INTO `fasce_orarie` (`id_fascia`, `nome_fascia`) VALUES
(1, 'Colazione'),
(2, 'Brunch'),
(3, 'Pranzo'),
(4, 'Aperitivo'),
(5, 'Cena'),
(6, 'Serata');

-- --------------------------------------------------------

--
-- Struttura della tabella `periodi`
--

CREATE TABLE `periodi` (
  `id_periodo` int(11) NOT NULL,
  `nome_periodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `periodi`
--

INSERT INTO `periodi` (`id_periodo`, `nome_periodo`) VALUES
(1, 'Pranzo');

-- --------------------------------------------------------

--
-- Struttura della tabella `periodifasce`
--

CREATE TABLE `periodifasce` (
  `id_periodo` int(11) NOT NULL,
  `id_fascia` int(11) NOT NULL,
  `orario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `periodifasce`
--

INSERT INTO `periodifasce` (`id_periodo`, `id_fascia`, `orario`) VALUES
(1, 3, '12:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id_prenotazione` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `tel_cliente` varchar(10) NOT NULL,
  `numero` int(11) NOT NULL,
  `giorno` varchar(10) NOT NULL,
  `orario` varchar(15) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_stagione` int(11) NOT NULL,
  `id_fascia` int(11) NOT NULL,
  `note_prenotazione` text NOT NULL,
  `scadenza` int(11) NOT NULL,
  `arrivo` int(11) NOT NULL,
  `chiusura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazionirevisionare`
--

CREATE TABLE `prenotazionirevisionare` (
  `id_prenotazione` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `tel_cliente` varchar(10) NOT NULL,
  `numero` int(11) NOT NULL,
  `giorno` varchar(10) NOT NULL,
  `orario` varchar(15) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_stagione` int(11) NOT NULL,
  `id_fascia` int(11) NOT NULL,
  `note_prenotazione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `sale`
--

CREATE TABLE `sale` (
  `id_sala` int(11) NOT NULL,
  `nome_sala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `stagioni`
--

CREATE TABLE `stagioni` (
  `id_stagione` int(11) NOT NULL,
  `nome_stagione` varchar(50) NOT NULL,
  `inizio` varchar(50) NOT NULL,
  `fine` varchar(50) NOT NULL,
  `priorità` int(11) NOT NULL,
  `lunedi` int(11) NOT NULL,
  `martedi` int(11) NOT NULL,
  `mercoledi` int(11) NOT NULL,
  `giovedi` int(11) NOT NULL,
  `venerdi` int(11) NOT NULL,
  `sabato` int(11) NOT NULL,
  `domenica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `stagionisale`
--

CREATE TABLE `stagionisale` (
  `id_stagione` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `storicoclienti`
--

CREATE TABLE `storicoclienti` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL,
  `tel_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tavolisale`
--

CREATE TABLE `tavolisale` (
  `id_sala` int(11) NOT NULL,
  `id_tavolo` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `num_persone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id_utente` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utente`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `fasce_orarie`
--
ALTER TABLE `fasce_orarie`
  ADD PRIMARY KEY (`id_fascia`);

--
-- Indici per le tabelle `periodi`
--
ALTER TABLE `periodi`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indici per le tabelle `periodifasce`
--
ALTER TABLE `periodifasce`
  ADD PRIMARY KEY (`id_periodo`,`id_fascia`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id_prenotazione`);

--
-- Indici per le tabelle `prenotazionirevisionare`
--
ALTER TABLE `prenotazionirevisionare`
  ADD PRIMARY KEY (`id_prenotazione`);

--
-- Indici per le tabelle `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indici per le tabelle `stagioni`
--
ALTER TABLE `stagioni`
  ADD PRIMARY KEY (`id_stagione`);

--
-- Indici per le tabelle `stagionisale`
--
ALTER TABLE `stagionisale`
  ADD PRIMARY KEY (`id_stagione`,`id_sala`);

--
-- Indici per le tabelle `storicoclienti`
--
ALTER TABLE `storicoclienti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tavolisale`
--
ALTER TABLE `tavolisale`
  ADD PRIMARY KEY (`id_sala`,`id_tavolo`,`id_periodo`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `periodi`
--
ALTER TABLE `periodi`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prenotazionirevisionare`
--
ALTER TABLE `prenotazionirevisionare`
  MODIFY `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
