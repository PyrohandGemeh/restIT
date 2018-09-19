-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 19, 2018 alle 15:27
-- Versione del server: 10.1.29-MariaDB
-- Versione PHP: 7.2.0

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
  `id` int(11) NOT NULL,
  `nome_fascia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `fasce_orarie`
--

INSERT INTO `fasce_orarie` (`id`, `nome_fascia`) VALUES
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
  `id` int(11) NOT NULL,
  `nome_periodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `periodi`
--

INSERT INTO `periodi` (`id`, `nome_periodo`) VALUES
(1, 'Prova');

-- --------------------------------------------------------

--
-- Struttura della tabella `periodi_fasce`
--

CREATE TABLE `periodi_fasce` (
  `id` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_fascia` int(11) NOT NULL,
  `orario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `periodi_fasce`
--

INSERT INTO `periodi_fasce` (`id`, `id_periodo`, `id_fascia`, `orario`) VALUES
(1, 1, 3, '12:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id` int(11) NOT NULL,
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

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`id`, `nome_cliente`, `tel_cliente`, `numero`, `giorno`, `orario`, `id_sala`, `id_stagione`, `id_fascia`, `note_prenotazione`, `scadenza`, `arrivo`, `chiusura`) VALUES
(1, 'Alessandra', '123456789', 8, '15-09-2018', '20:00', 1, 1, 1, 'nulla', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni_revisionare`
--

CREATE TABLE `prenotazioni_revisionare` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `nome_sala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `sale`
--

INSERT INTO `sale` (`id`, `nome_sala`) VALUES
(1, 'Giardino');

-- --------------------------------------------------------

--
-- Struttura della tabella `stagioni`
--

CREATE TABLE `stagioni` (
  `id` int(11) NOT NULL,
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

--
-- Dump dei dati per la tabella `stagioni`
--

INSERT INTO `stagioni` (`id`, `nome_stagione`, `inizio`, `fine`, `priorità`, `lunedi`, `martedi`, `mercoledi`, `giovedi`, `venerdi`, `sabato`, `domenica`) VALUES
(1, 'stagione', '2018-06-21', '2018-06-22', 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'giorno_speciale', '2018-09-21', '2018-09-21', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `stagioni_sale`
--

CREATE TABLE `stagioni_sale` (
  `id_stagione` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `stagioni_sale`
--

INSERT INTO `stagioni_sale` (`id_stagione`, `id_sala`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `storico_clienti`
--

CREATE TABLE `storico_clienti` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL,
  `tel_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tavoli_sale`
--

CREATE TABLE `tavoli_sale` (
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
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`) VALUES
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `fasce_orarie`
--
ALTER TABLE `fasce_orarie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `periodi`
--
ALTER TABLE `periodi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `periodi_fasce`
--
ALTER TABLE `periodi_fasce`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prenotazioni_revisionare`
--
ALTER TABLE `prenotazioni_revisionare`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `stagioni`
--
ALTER TABLE `stagioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `stagioni_sale`
--
ALTER TABLE `stagioni_sale`
  ADD PRIMARY KEY (`id_stagione`,`id_sala`);

--
-- Indici per le tabelle `storico_clienti`
--
ALTER TABLE `storico_clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tavoli_sale`
--
ALTER TABLE `tavoli_sale`
  ADD PRIMARY KEY (`id_sala`,`id_tavolo`,`id_periodo`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `periodi_fasce`
--
ALTER TABLE `periodi_fasce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `prenotazioni_revisionare`
--
ALTER TABLE `prenotazioni_revisionare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
