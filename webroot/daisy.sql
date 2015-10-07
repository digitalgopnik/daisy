-- phpMyAdmin SQL Dump
-- version 4.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 07. Okt 2015 um 10:37
-- Server-Version: 5.6.24
-- PHP-Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `daisy`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `id` int(11) NOT NULL,
  `host` varchar(64) NOT NULL,
  `ip` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `configurations`
--

INSERT INTO `configurations` (`id`, `host`, `ip`) VALUES
(1, 'http://localhost:8081/', '127.0.0.1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `item_id`, `order`) VALUES
(6, 1, 2, NULL),
(10, 2, 8, NULL),
(11, 2, 6, NULL),
(12, 2, 12, NULL),
(13, 2, 14, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `file_uploads`
--

CREATE TABLE IF NOT EXISTS `file_uploads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `app_name` varchar(128) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `src` varchar(256) NOT NULL,
  `filename` varchar(32) NOT NULL,
  `type` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `file_uploads`
--

INSERT INTO `file_uploads` (`id`, `user_id`, `group_id`, `app_name`, `url`, `src`, `filename`, `type`, `created`, `modified`) VALUES
(1, 1, NULL, NULL, NULL, 'files/d549a310a5edad7a0e0d79320fe305a6/currynudelns.jpg', 'currynudelns.jpg', 'image/jpeg', '2015-06-04 11:11:18', '2015-06-04 11:11:18'),
(2, 1, NULL, NULL, NULL, 'files/d549a310a5edad7a0e0d79320fe305a6/currynudelns.jpg', 'currynudelns.jpg', 'image/jpeg', '2015-06-04 11:11:33', '2015-06-04 11:11:33'),
(3, 1, NULL, NULL, NULL, 'files/d549a310a5edad7a0e0d79320fe305a6/currynudelns.jpg', 'currynudelns.jpg', 'image/jpeg', '2015-06-04 11:11:49', '2015-06-04 11:11:49'),
(4, 1, NULL, NULL, NULL, 'files/d549a310a5edad7a0e0d79320fe305a6/currynudelns.jpg', 'currynudelns.jpg', 'image/jpeg', '2015-06-04 11:12:01', '2015-06-04 11:12:01'),
(5, 1, 1, NULL, NULL, 'files/a52428c46b02b4746d1f056d884306dd/Index.html', 'Index.html', 'text/html', '2015-06-04 11:16:16', '2015-06-04 11:16:16'),
(6, 1, 1, NULL, NULL, 'files/a52428c46b02b4746d1f056d884306dd/currynudelns.jpg', 'currynudelns.jpg', 'image/jpeg', '2015-06-04 11:17:16', '2015-06-04 11:17:16'),
(7, 1, 2, NULL, NULL, 'files/7b6c914beb712fb747237d56f51ddcb6/schema_energieheld_cms_new.mwb', 'schema_energieheld_cms_new.mwb', 'application/octet-stream', '2015-06-04 11:20:30', '2015-06-04 11:20:30'),
(8, 1, 3, NULL, NULL, 'files/a4c01cf2c60b0eaef2174367ad222bf5/welcome.html', 'welcome.html', 'text/html', '2015-06-04 11:24:39', '2015-06-04 11:24:39');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `folder_path` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`id`, `name`, `folder_path`) VALUES
(1, 'Testgruppe', 'files/a52428c46b02b4746d1f056d884306dd');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups_users`
--

CREATE TABLE IF NOT EXISTS `groups_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `token` varchar(128) DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `groups_users`
--

INSERT INTO `groups_users` (`id`, `user_id`, `group_id`, `is_admin`, `token`, `accepted`) VALUES
(1, 2, 1, 0, '8qa5sx', 1),
(2, 1, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `auth_key` varchar(64) DEFAULT NULL,
  `auth_token` varchar(64) DEFAULT NULL,
  `url` varchar(64) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `help_text` varchar(4096) NOT NULL,
  `app_help` varchar(4096) DEFAULT NULL,
  `offline` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `items`
--

INSERT INTO `items` (`id`, `name`, `auth_key`, `auth_token`, `url`, `image_url`, `help_text`, `app_help`, `offline`) VALUES
(4, 'Creately', '-', '-', 'http://creately.com', '/img/tools/creately.png', '<h2>Creately.com</h2>\n              <ul>\n                <li>Diagramm- und Design-Software</li>\n                <li>Mindmaps, Gantt-Charts, Flowcharts</li>\n              </ul>', NULL, 0),
(5, 'Marvel App', '-', '-', 'http://marvelapp.com', '/img/tools/marvelapp.jpg', '<h2>Marvelapp.com</h2>\n              <ul>\n                <li>Website-Prototyp</li>\n                <li>Lade deine Prototypen hoch, und bearbeite sie</li>\n              </ul>', NULL, 0),
(6, 'Weebly', '-', '-', 'http://weebly.com', '/img/tools/weebly2.jpg', '<h2>Weebly.com</h2>\n              <ul>\n                <li>Erstellen einer Website</li>\n                <li>Verschiedene Kategorien und Designer wählbar</li>\n              </ul>', NULL, 0),
(7, 'Presenter ProWise', '-', '-', 'http://www.prowise.com/presenter/start', '/img/tools/prowise.jpg', '<h2>ProWise Presenter</h2>\n              <ul>\n                <li>Scratchbook für Notizen, Ideensammlungen</li>\n                <li>Schnelles bearbeiten von Fotos und Grafiken</li>\n              </ul>', NULL, 0),
(8, 'Lynda', '-', '-', 'http://lynda.com', '/img/tools/lynda.jpg', '<h2>Lynda.com</h2>\n              <ul>\n                <li>Bildungsseite</li>\n                <li>Bietet zu verschiedenen Themengebieten Kurse und Tutorials an.</li>\n              </ul>', NULL, 0),
(9, 'Wikipedia', NULL, NULL, 'http://de.wikipedia.org/wiki/Wikipedia:Hauptseite', '/img/tools/wikipedia.jpg', '<h2>Wikipedia</h2>', NULL, 0),
(10, 'Taschenrechner', NULL, NULL, 'calc:', '/img/tools/calc.png', '<h2>Windows Taschenrechner</h2>               <ul>                 <li>Taschenrechner Funktion</li>               </ul>', NULL, 1),
(11, 'Wolfram Alpha', NULL, NULL, 'http://wolframalpha.com', '/img/tools/wolframalpha.jpg', '<h2>WolframAlpha</h2>               <ul>                 <li>Rechen- und Wissensanwendung</li>                 <li>Loest mathematische Probleme.</li>               </ul>', NULL, 0),
(12, 'Skype', NULL, NULL, 'Skype:', '/img/tools/skype.png', '<h2>Skype</h2>               <ul>                 <li>Ermoeglicht Video- und Telefonkonferenzen</li>               </ul>', NULL, 1),
(13, 'Photoshop', NULL, NULL, 'fb292065597989:', '/img/tools/adobe_photoshop_express.png', '<h2>Photoshop</h2>', NULL, 1),
(14, 'Adobe Reader', NULL, NULL, 'adobe:', '/img/tools/adobe_reader.png', '<h2>Adobe Reader</h2>', NULL, 1),
(15, 'Irfan View', NULL, NULL, 'IrfanView:', '/img/tools/IrfanView.jpg', '<h2>IrfanView</h2>               <ul>                 <li>Schnelles Bearbeiten von Fotos und Grafiken</li>               </ul>', NULL, 1),
(16, 'Visio', NULL, NULL, 'visio:', '/img/tools/visio.jpg', '<h2>Visio</h2>\r\n              <ul>\r\n                <li>Erstellen von Diagrammen mit passenden Werkzeugen und Vorlagen</li>\r\n                <li>Technische Zeichnungen, UML...</li>\r\n              </ul>', NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `content` varchar(1024) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `item_id`, `content`) VALUES
(1, 2, 1, 'Dies ist eine Notiz.'),
(2, 3, 0, 'Teshfjskdfhsk'),
(7, 1, NULL, 'fhjsdfk'),
(8, 1, NULL, 'hallo ich bin im presenter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `due_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `extra` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `todos`
--

INSERT INTO `todos` (`id`, `user_id`, `name`, `done`, `due_date`, `created`, `extra`) VALUES
(1, 0, 'aufgabe_1', 1, '2015-06-03 15:25:00', '2015-06-03 10:25:26', 'test'),
(2, 0, 'aufgabe_2', 0, '2015-06-03 14:57:00', '2015-06-03 14:57:34', NULL),
(10, 1, 'test', 1, '2015-06-06 08:08:00', '2015-06-06 08:08:26', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_path` varchar(128) NOT NULL,
  `role` varchar(32) DEFAULT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_path`, `role`, `email`) VALUES
(1, '7d8bdadebe5c1691ceea49be68a45608', '6939c3fdd2511e1d9a5d628b53e662b9', 'files/d549a310a5edad7a0e0d79320fe305a6', 'student', 'y0054316@tu-bs.de'),
(2, '8d63603cf652db7ab8c6fa46b4550187', 'f03c90375194173d89d5ab052942b462', 'files/e9f444a4f4e77e40f11db44b1caa2273', 'student', 'y0054496@tu-bs.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `words`
--

CREATE TABLE IF NOT EXISTS `words` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `words`
--

INSERT INTO `words` (`id`, `name`) VALUES
(1, 'Bildbearbeitung'),
(2, 'Notizen'),
(3, 'Videos'),
(4, 'Kreativitätstechniken'),
(5, 'Tutorials'),
(6, 'Webdesign'),
(7, 'Prototyping'),
(8, 'Videokonferenzen'),
(9, 'Wissen'),
(10, 'Mathematische Probleme'),
(11, 'Präsentationen'),
(12, 'Zeichnen / malen'),
(13, 'Mindmaps'),
(14, 'Diagramme');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `words_items`
--

CREATE TABLE IF NOT EXISTS `words_items` (
  `id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `words_items`
--

INSERT INTO `words_items` (`id`, `word_id`, `item_id`) VALUES
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 9, 9);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `file_uploads`
--
ALTER TABLE `file_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `groups_users`
--
ALTER TABLE `groups_users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `words_items`
--
ALTER TABLE `words_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT für Tabelle `file_uploads`
--
ALTER TABLE `file_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `groups_users`
--
ALTER TABLE `groups_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT für Tabelle `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT für Tabelle `words_items`
--
ALTER TABLE `words_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
