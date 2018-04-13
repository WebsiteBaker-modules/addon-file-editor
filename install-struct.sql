-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 29. Apr 2016 um 19:04
-- Server-Version: 5.6.24
-- PHP-Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_addon_file_editor`
--

DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_addon_file_editor`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_addon_file_editor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ftp_enabled` int(1) NOT NULL DEFAULT '0',
  `ftp_server` varchar(255) {FIELD_COLLATION} NOT NULL DEFAULT '',
  `ftp_user` varchar(255) {FIELD_COLLATION} NOT NULL DEFAULT '',
  `ftp_password` varchar(255) {FIELD_COLLATION} NOT NULL DEFAULT '',
  `ftp_port` int(11) NOT NULL DEFAULT '21',
  `ftp_start_dir` varchar(255) {FIELD_COLLATION} NOT NULL DEFAULT '/',
  PRIMARY KEY (`id`)
) {TABLE_ENGINE};
ALTER TABLE `{TABLE_PREFIX}mod_addon_file_editor` {FIELD_COLLATION};
ALTER TABLE `{TABLE_PREFIX}mod_addon_file_editor` CHANGE `ftp_server` `ftp_server` varchar(250){FIELD_COLLATION} NOT NULL DEFAULT '';
ALTER TABLE `{TABLE_PREFIX}mod_addon_file_editor` CHANGE `ftp_user` `ftp_user` VARCHAR(250) {FIELD_COLLATION} NOT NULL DEFAULT '';
ALTER TABLE `{TABLE_PREFIX}mod_addon_file_editor` CHANGE `ftp_password` `ftp_password` VARCHAR(250) {FIELD_COLLATION} NOT NULL DEFAULT '';
ALTER TABLE `{TABLE_PREFIX}mod_addon_file_editor` CHANGE `ftp_start_dir` `ftp_start_dir` VARCHAR(512) {FIELD_COLLATION} NOT NULL DEFAULT '';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
