-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.1.29-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win32
-- HeidiSQL Versione:            9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dump della struttura del database restit
CREATE DATABASE IF NOT EXISTS `restit` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `restit`;

-- Dump della struttura di tabella restit.fasce_orarie
CREATE TABLE IF NOT EXISTS `fasce_orarie` (
  `id_fascia` int(11) NOT NULL,
  `nome_fascia` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fascia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.fasce_orarie: ~6 rows (circa)
/*!40000 ALTER TABLE `fasce_orarie` DISABLE KEYS */;
INSERT INTO `fasce_orarie` (`id_fascia`, `nome_fascia`) VALUES
	(1, 'Colazione'),
	(2, 'Brunch'),
	(3, 'Pranzo'),
	(4, 'Aperitivo'),
	(5, 'Cena'),
	(6, 'Serata');
/*!40000 ALTER TABLE `fasce_orarie` ENABLE KEYS */;

-- Dump della struttura di tabella restit.periodi
CREATE TABLE IF NOT EXISTS `periodi` (
  `id_periodo` int(11) NOT NULL,
  `nome_periodo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.periodi: ~0 rows (circa)
/*!40000 ALTER TABLE `periodi` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodi` ENABLE KEYS */;

-- Dump della struttura di tabella restit.periodi_fasce
CREATE TABLE IF NOT EXISTS `periodi_fasce` (
  `id_periodo` int(11) NOT NULL,
  `id_fascia` int(11) NOT NULL,
  `orario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_periodo`,`id_fascia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.periodi_fasce: ~0 rows (circa)
/*!40000 ALTER TABLE `periodi_fasce` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodi_fasce` ENABLE KEYS */;

-- Dump della struttura di tabella restit.prenotazioni
CREATE TABLE IF NOT EXISTS `prenotazioni` (
  `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT,
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
  `chiusura` int(11) NOT NULL,
  PRIMARY KEY (`id_prenotazione`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.prenotazioni: ~0 rows (circa)
/*!40000 ALTER TABLE `prenotazioni` DISABLE KEYS */;
/*!40000 ALTER TABLE `prenotazioni` ENABLE KEYS */;

-- Dump della struttura di tabella restit.prenotazioni_revisionare
CREATE TABLE IF NOT EXISTS `prenotazioni_revisionare` (
  `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(50) NOT NULL,
  `tel_cliente` varchar(10) NOT NULL,
  `numero` int(11) NOT NULL,
  `giorno` varchar(10) NOT NULL,
  `orario` varchar(15) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_stagione` int(11) NOT NULL,
  `id_fascia` int(11) NOT NULL,
  `note_prenotazione` text NOT NULL,
  PRIMARY KEY (`id_prenotazione`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.prenotazioni_revisionare: ~0 rows (circa)
/*!40000 ALTER TABLE `prenotazioni_revisionare` DISABLE KEYS */;
/*!40000 ALTER TABLE `prenotazioni_revisionare` ENABLE KEYS */;

-- Dump della struttura di tabella restit.sale
CREATE TABLE IF NOT EXISTS `sale` (
  `id_sala` int(11) NOT NULL,
  `nome_sala` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.sale: ~0 rows (circa)
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;

-- Dump della struttura di tabella restit.stagioni
CREATE TABLE IF NOT EXISTS `stagioni` (
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
  `domenica` int(11) NOT NULL,
  PRIMARY KEY (`id_stagione`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.stagioni: ~0 rows (circa)
/*!40000 ALTER TABLE `stagioni` DISABLE KEYS */;
/*!40000 ALTER TABLE `stagioni` ENABLE KEYS */;

-- Dump della struttura di tabella restit.stagioni_sale
CREATE TABLE IF NOT EXISTS `stagioni_sale` (
  `id_stagione` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  PRIMARY KEY (`id_stagione`,`id_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.stagioni_sale: ~0 rows (circa)
/*!40000 ALTER TABLE `stagioni_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `stagioni_sale` ENABLE KEYS */;

-- Dump della struttura di tabella restit.storico_clienti
CREATE TABLE IF NOT EXISTS `storico_clienti` (
  `id_storico` int(11) NOT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL,
  `tel_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_storico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.storico_clienti: ~0 rows (circa)
/*!40000 ALTER TABLE `storico_clienti` DISABLE KEYS */;
/*!40000 ALTER TABLE `storico_clienti` ENABLE KEYS */;

-- Dump della struttura di tabella restit.tavoli_sale
CREATE TABLE IF NOT EXISTS `tavoli_sale` (
  `id_sala` int(11) NOT NULL,
  `id_tavolo` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `num_persone` int(11) NOT NULL,
  PRIMARY KEY (`id_sala`,`id_tavolo`,`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.tavoli_sale: ~0 rows (circa)
/*!40000 ALTER TABLE `tavoli_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `tavoli_sale` ENABLE KEYS */;

-- Dump della struttura di tabella restit.utenti
CREATE TABLE IF NOT EXISTS `utenti` (
  `id_utente` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_utente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella restit.utenti: ~0 rows (circa)
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
