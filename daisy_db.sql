# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.25)
# Datenbank: daisy
# Erstellt am: 2015-10-11 16:58:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle configurations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `configurations`;

CREATE TABLE `configurations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(64) NOT NULL,
  `ip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `configurations` WRITE;
/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;

INSERT INTO `configurations` (`id`, `host`, `ip`)
VALUES
	(1,'http://localhost:8081/','127.0.0.1');

/*!40000 ALTER TABLE `configurations` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle favorites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;

INSERT INTO `favorites` (`id`, `user_id`, `item_id`, `order`)
VALUES
	(6,1,2,NULL),
	(10,2,8,NULL),
	(11,2,6,NULL),
	(12,2,12,NULL),
	(13,2,14,NULL);

/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle file_uploads
# ------------------------------------------------------------

DROP TABLE IF EXISTS `file_uploads`;

CREATE TABLE `file_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `app_name` varchar(128) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `src` varchar(256) NOT NULL,
  `filename` varchar(32) NOT NULL,
  `type` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `file_uploads` WRITE;
/*!40000 ALTER TABLE `file_uploads` DISABLE KEYS */;

INSERT INTO `file_uploads` (`id`, `user_id`, `group_id`, `app_name`, `url`, `src`, `filename`, `type`, `created`, `modified`, `data`)
VALUES
	(1,2,NULL,NULL,NULL,'files/d549a310a5edad7a0e0d79320fe305a6/currynudelns.jpg','currynudelns.jpg','image/jpeg','2015-06-04 11:11:18','2015-06-04 11:11:18',NULL),
	(2,2,NULL,NULL,NULL,'files/d549a310a5edad7a0e0d79320fe305a6/currynudelns.jpg','currynudelns.jpg','image/jpeg','2015-06-04 11:11:33','2015-06-04 11:11:33',NULL),
	(3,2,NULL,NULL,NULL,'files/d549a310a5edad7a0e0d79320fe305a6/currynudelns.jpg','currynudelns.jpg','image/jpeg','2015-06-04 11:11:49','2015-06-04 11:11:49',NULL),
	(4,2,NULL,NULL,NULL,'files/d549a310a5edad7a0e0d79320fe305a6/currynudelns.jpg','currynudelns.jpg','image/jpeg','2015-06-04 11:12:01','2015-06-04 11:12:01',NULL),
	(5,2,1,NULL,NULL,'files/a52428c46b02b4746d1f056d884306dd/Index.html','Index.html','text/html','2015-06-04 11:16:16','2015-06-04 11:16:16',NULL),
	(6,2,1,NULL,NULL,'files/a52428c46b02b4746d1f056d884306dd/currynudelns.jpg','currynudelns.jpg','image/jpeg','2015-06-04 11:17:16','2015-06-04 11:17:16',NULL),
	(7,2,1,'','','db','schema_energieheld_cms_new.mwb','application/octet-stream','2015-06-04 11:20:30','2015-10-08 08:58:54',''),
	(8,2,3,NULL,NULL,'files/a4c01cf2c60b0eaef2174367ad222bf5/welcome.html','welcome.html','text/html','2015-06-04 11:24:39','2015-06-04 11:24:39',NULL),
	(9,2,NULL,NULL,NULL,'files/e9f444a4f4e77e40f11db44b1caa2273/D','D','D','2015-10-08 08:18:05','2015-10-08 08:18:05',NULL);

/*!40000 ALTER TABLE `file_uploads` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `folder_path` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `folder_path`)
VALUES
	(1,'Testgruppe','files/a52428c46b02b4746d1f056d884306dd');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle groups_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups_users`;

CREATE TABLE `groups_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `token` varchar(128) DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `groups_users` WRITE;
/*!40000 ALTER TABLE `groups_users` DISABLE KEYS */;

INSERT INTO `groups_users` (`id`, `user_id`, `group_id`, `is_admin`, `token`, `accepted`)
VALUES
	(1,2,1,0,'8qa5sx',1),
	(2,1,1,1,NULL,1);

/*!40000 ALTER TABLE `groups_users` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `auth_key` varchar(64) DEFAULT NULL,
  `auth_token` varchar(64) DEFAULT NULL,
  `url` varchar(64) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `help_text` varchar(4096) NOT NULL,
  `app_help` varchar(4096) DEFAULT NULL,
  `offline` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`id`, `name`, `auth_key`, `auth_token`, `url`, `image_url`, `help_text`, `app_help`, `offline`)
VALUES
	(1,'Sumo Paint',NULL,NULL,'https://www.sumopaint.com/home/','/img/tools/not_there.jps','<h2>Sumo Paint</h2>\n              <ul>\n                <li>Zeichnen</li>\n              </ul>',NULL,0),
	(2,'Strut IO',NULL,NULL,'strut/','/img/tools/not_there.jps','<h2>Strut IO</h2>\n              <ul>\n                <li>Präsentation erstellen</li>\n                <li>3D</li>\n                <li>CSS</li>\n              </ul>',NULL,0),
	(5,'Marvel App','-','-','http://marvelapp.com','/img/tools/marvelapp.jpg','<h2>Marvelapp.com</h2>\n              <ul>\n                <li>Website-Prototyp</li>\n                <li>Lade deine Prototypen hoch, und bearbeite sie</li>\n              </ul>',NULL,0),
	(7,'Presenter ProWise','-','-','http://www.prowise.com/presenter/start','/img/tools/prowise.jpg','<h2>ProWise Presenter</h2>\n              <ul>\n                <li>Scratchbook f?r Notizen, Ideensammlungen</li>\n                <li>Schnelles bearbeiten von Fotos und Grafiken</li>\n              </ul>',NULL,0),
	(9,'Wikipedia',NULL,NULL,'http://de.wikipedia.org/wiki/Wikipedia:Hauptseite','/img/tools/wikipedia.jpg','<h2>Wikipedia</h2>',NULL,0),
	(10,'Taschenrechner',NULL,NULL,'calc:','/img/tools/calc.png','<h2>Windows Taschenrechner</h2>               <ul>                 <li>Taschenrechner Funktion</li>               </ul>',NULL,1),
	(11,'Wolfram Alpha',NULL,NULL,'http://wolframalpha.com','/img/tools/wolframalpha.jpg','<h2>WolframAlpha</h2>               <ul>                 <li>Rechen- und Wissensanwendung</li>                 <li>Loest mathematische Probleme.</li>               </ul>',NULL,0),
	(12,'Skype',NULL,NULL,'Skype:','/img/tools/skype.png','<h2>Skype</h2>               <ul>                 <li>Ermoeglicht Video- und Telefonkonferenzen</li>               </ul>',NULL,1),
	(13,'Photoshop',NULL,NULL,'fb292065597989:','/img/tools/adobe_photoshop_express.png','<h2>Photoshop</h2>',NULL,1),
	(14,'Adobe Reader',NULL,NULL,'adobe:','/img/tools/adobe_reader.png','<h2>Adobe Reader</h2>',NULL,1),
	(15,'Irfan View',NULL,NULL,'IrfanView:','/img/tools/IrfanView.jpg','<h2>IrfanView</h2>               <ul>                 <li>Schnelles Bearbeiten von Fotos und Grafiken</li>               </ul>',NULL,1),
	(16,'Visio',NULL,NULL,'visio:','/img/tools/visio.jpg','<h2>Visio</h2>\r\n              <ul>\r\n                <li>Erstellen von Diagrammen mit passenden Werkzeugen und Vorlagen</li>\r\n                <li>Technische Zeichnungen, UML...</li>\r\n              </ul>',NULL,1);

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `content` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;

INSERT INTO `notes` (`id`, `user_id`, `item_id`, `content`)
VALUES
	(1,2,1,'Dies ist eine Notiz.'),
	(2,3,0,'Teshfjskdfhsk'),
	(7,1,NULL,'fhjsdfk'),
	(8,1,NULL,'hallo ich bin im presenter');

/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle todos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `due_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `extra` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;

INSERT INTO `todos` (`id`, `user_id`, `name`, `done`, `due_date`, `created`, `extra`)
VALUES
	(1,0,'aufgabe_1',1,'2015-06-03 15:25:00','2015-06-03 10:25:26','test'),
	(2,0,'aufgabe_2',0,'2015-06-03 14:57:00','2015-06-03 14:57:34',NULL),
	(10,1,'test',1,'2015-06-06 08:08:00','2015-06-06 08:08:26',NULL);

/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_path` varchar(128) NOT NULL,
  `role` varchar(32) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `user_path`, `role`, `email`)
VALUES
	(1,'7d8bdadebe5c1691ceea49be68a45608','6939c3fdd2511e1d9a5d628b53e662b9','files/d549a310a5edad7a0e0d79320fe305a6','student','y0054316@tu-bs.de'),
	(2,'8d63603cf652db7ab8c6fa46b4550187','f03c90375194173d89d5ab052942b462','files/e9f444a4f4e77e40f11db44b1caa2273','student','y0054496@tu-bs.de');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle words
# ------------------------------------------------------------

DROP TABLE IF EXISTS `words`;

CREATE TABLE `words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `words` WRITE;
/*!40000 ALTER TABLE `words` DISABLE KEYS */;

INSERT INTO `words` (`id`, `name`)
VALUES
	(1,'Bildbearbeitung'),
	(2,'Notizen'),
	(3,'Videos'),
	(4,'Kreativit?tstechniken'),
	(5,'Tutorials'),
	(6,'Webdesign'),
	(7,'Prototyping'),
	(8,'Videokonferenzen'),
	(9,'Wissen'),
	(10,'Mathematische Probleme'),
	(11,'Pr?sentationen'),
	(12,'Zeichnen / malen'),
	(13,'Mindmaps'),
	(14,'Diagramme');

/*!40000 ALTER TABLE `words` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle words_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `words_items`;

CREATE TABLE `words_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `words_items` WRITE;
/*!40000 ALTER TABLE `words_items` DISABLE KEYS */;

INSERT INTO `words_items` (`id`, `word_id`, `item_id`)
VALUES
	(2,2,1),
	(3,3,1),
	(4,4,1),
	(5,5,1),
	(6,6,1),
	(7,7,1),
	(8,8,1),
	(9,9,1),
	(10,10,1),
	(11,11,1),
	(12,12,1),
	(13,13,1),
	(14,14,1),
	(15,9,9);

/*!40000 ALTER TABLE `words_items` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
