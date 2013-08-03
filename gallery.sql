-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 15 apr, 2011 at 04:17 PM
-- Versione MySQL: 5.1.41
-- Versione PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `galleria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `descrizione` varchar(200) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `album`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

CREATE TABLE IF NOT EXISTS `immagini` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `descrizione` varchar(200) NOT NULL,
  `nomefile` varchar(250) NOT NULL,
  `parolechiave` varchar(250) NOT NULL,
  `foto_album` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
