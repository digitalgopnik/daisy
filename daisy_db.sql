# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.25)
# Datenbank: daisy
# Erstellt am: 2015-10-22 18:47:39 +0000
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
	(19,2,1,NULL),
	(20,2,1,NULL),
	(28,2,5,NULL),
	(29,2,7,NULL),
	(30,2,5,NULL),
	(31,2,5,NULL),
	(32,2,5,NULL),
	(33,2,2,NULL),
	(34,2,2,NULL),
	(35,2,2,NULL),
	(36,2,2,NULL),
	(37,2,2,NULL),
	(38,2,2,NULL),
	(39,2,2,NULL),
	(40,2,2,NULL),
	(41,2,2,NULL);

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
  `filename` varchar(32) DEFAULT '',
  `type` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `data` longtext,
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
	(9,2,NULL,NULL,NULL,'files/e9f444a4f4e77e40f11db44b1caa2273/D','D','D','2015-10-08 08:18:05','2015-10-08 08:18:05',NULL),
	(124,2,NULL,'rtf','none','db','test','rtf','2015-10-11 17:12:49','2015-10-11 17:12:49','{\\rtf1\\ansi\\ansicpg1252\\cocoartf1404\\cocoasubrtf110\n{\\fonttbl\\f0\\fswiss\\fcharset0 Helvetica;}\n{\\colortbl;\\red255\\green255\\blue255;}\n\\paperw11900\\paperh16840\\margl1440\\margr1440\\vieww10800\\viewh8400\\viewkind0\n\\pard\\tx566\\tx1133\\tx1700\\tx2267\\tx2834\\tx3401\\tx3968\\tx4535\\tx5102\\tx5669\\tx6236\\tx6803\\pardirnatural\\partightenfactor0\n\n\\f0\\fs24 \\cf0 Test}'),
	(125,2,1,'rtf','none','db','test','rtf','2015-10-11 17:15:30','2015-10-12 09:47:33','{\\rtf1\\ansi\\ansicpg1252\\cocoartf1404\\cocoasubrtf110\n{\\fonttbl\\f0\\fswiss\\fcharset0 Helvetica;}\n{\\colortbl;\\red255\\green255\\blue255;}\n\\paperw11900\\paperh16840\\margl1440\\margr1440\\vieww10800\\viewh8400\\viewkind0\n\\pard\\tx566\\tx1133\\tx1700\\tx2267\\tx2834\\tx3401\\tx3968\\tx4535\\tx5102\\tx5669\\tx6236\\tx6803\\pardirnatural\\partightenfactor0\n\n\\f0\\fs24 \\cf0 Test}'),
	(127,2,NULL,'rtf','none','db','test','rtf','2015-10-11 17:56:04','2015-10-11 17:56:04','{\\rtf1\\ansi\\deff3\\adeflang1025\n{\\fonttbl{\\f0\\froman\\fprq2\\fcharset0 Times New Roman;}{\\f1\\froman\\fprq2\\fcharset2 Symbol;}{\\f2\\fswiss\\fprq2\\fcharset0 Arial;}{\\f3\\froman\\fprq2\\fcharset0 Liberation Serif{\\*\\falt Times New Roman};}{\\f4\\fswiss\\fprq2\\fcharset0 Liberation Sans{\\*\\falt Arial};}{\\f5\\froman\\fprq2\\fcharset0 Helvetica{\\*\\falt Arial};}{\\f6\\fnil\\fprq2\\fcharset0 Arial Unicode MS;}}\n{\\colortbl;\\red0\\green0\\blue0;\\red0\\green0\\blue255;\\red0\\green255\\blue255;\\red0\\green255\\blue0;\\red255\\green0\\blue255;\\red255\\green0\\blue0;\\red255\\green255\\blue0;\\red255\\green255\\blue255;\\red0\\green0\\blue128;\\red0\\green128\\blue128;\\red0\\green128\\blue0;\\red128\\green0\\blue128;\\red128\\green0\\blue0;\\red128\\green128\\blue0;\\red128\\green128\\blue128;\\red192\\green192\\blue192;}\n{\\stylesheet{\\s0\\snext0\\nowidctlpar\\hyphpar0\\cf0\\kerning1\\dbch\\af6\\langfe2052\\dbch\\af6\\afs24\\alang1081\\loch\\f3\\fs24\\lang1031 Normal;}\n{\\s15\\sbasedon0\\snext16\\sb240\\sa120\\keepn\\dbch\\af6\\dbch\\af6\\afs28\\loch\\f4\\fs28 \\u220\\\'dcberschrift;}\n{\\s16\\sbasedon0\\snext16\\sl288\\slmult1\\sb0\\sa140 Textk\\u246\\\'f6rper;}\n{\\s17\\sbasedon16\\snext17\\sl288\\slmult1\\sb0\\sa140 Liste;}\n{\\s18\\sbasedon0\\snext18\\sb120\\sa120\\noline\\i\\afs24\\ai\\fs24 Beschriftung;}\n{\\s19\\sbasedon0\\snext19\\noline Verzeichnis;}\n}{\\*\\generator LibreOffice/5.0.2.2$MacOSX_X86_64 LibreOffice_project/ab9e2a14cfa5edd30bd74f156cfba09bfd5be3a0}{\\info{\\creatim\\yr0\\mo0\\dy0\\hr0\\min0}{\\revtim\\yr2015\\mo10\\dy11\\hr19\\min55}{\\printim\\yr0\\mo0\\dy0\\hr0\\min0}}\\deftab720\n\\viewscale100\n{\\*\\pgdsctbl\n{\\pgdsc0\\pgdscuse451\\pgwsxn11906\\pghsxn16838\\marglsxn1440\\margrsxn1440\\margtsxn1440\\margbsxn1440\\pgdscnxt0 Standard;}}\n\\formshade{\\*\\pgdscno0}\\paperh16838\\paperw11906\\margl1440\\margr1440\\margt1440\\margb1440\\sectd\\sbknone\\sectunlocked1\\pgndec\\pgwsxn11906\\pghsxn16838\\marglsxn1440\\margrsxn1440\\margtsxn1440\\margbsxn1440\\ftnbj\\ftnstart1\\ftnrstcont\\ftnnar\\aenddoc\\aftnrstcont\\aftnstart1\\aftnnrlc\n{\\*\\ftnsep}\\pgndec\\pard\\plain \\s0\\nowidctlpar\\hyphpar0\\cf0\\kerning1\\dbch\\af6\\langfe2052\\dbch\\af6\\afs24\\alang1081\\loch\\f3\\fs24\\lang1031\\tx566\\tx1133\\tx1700\\tx2267\\tx2834\\tx3401\\tx3968\\tx4535\\tx5102\\tx5669\\tx6236\\tx6803{\\cf1\\rtlch \\ltrch\\loch\\fs24\\loch\\f5\nAptent rhoncus class nam condimentum libero tincidunt, sed fermentum. Fames ac auctor platea tortor erat. Montes, viverra fermentum nonummy aliquam mauris nulla tristique tellus leo. Sit penatibus velit accumsan curabitur enim placerat vehicula class ac varius ac vulputate hac enim mauris quisque euismod. Senectus consectetuer nec non egestas nascetur lobortis, neque duis nascetur, class turpis suspendisse cras tempus suspendisse laoreet hymenaeos magnis cubilia auctor orci felis fusce integer dui sed dui quisque aptent dis convallis, facilisi. Vivamus natoque nunc neque proin vivamus maecenas suscipit lectus senectus quam Torquent lacus, dignissim curabitur Senectus, inceptos. Lacus cum Quam odio. At fringilla etiam viverra sociis orci placerat libero tempus fringilla feugiat ornare bibendum sollicitudin montes in aptent vitae eleifend facilisi libero varius varius velit convallis inceptos imperdiet suspendisse accumsan ut sagittis vestibulum dictumst pede imperdiet cum accumsan dictum habitasse felis duis. Mus hendrerit quisque platea porttitor ullamcorper arcu egestas dictumst commodo libero vestibulum Gravida ante id arcu consequat curae; ut. Magna Cursus senectus suscipit vestibulum parturient praesent egestas pellentesque sociis mus orci gravida torquent litora montes rutrum class pellentesque congue, cursus nibh suscipit placerat. Proin commodo libero elit nam, luctus nonummy scelerisque et gravida convallis facilisis vel cras eleifend justo accumsan per in nam congue, phasellus penatibus tristique dapibus interdum varius integer libero. Ante vitae cursus quisque sem dis odio mollis magna. Felis aliquet commodo bibendum viverra. Cursus dolor. Natoque curabitur pretium, senectus leo tortor. Eros porta primis Nec Facilisis. Volutpat sapien maecenas felis mattis pulvinar facilisis curabitur ultricies hendrerit elit lacinia fringilla proin penatibus metus fames. Torquent metus proin vestibulum phasellus. Eros scelerisque hymenaeos pretium montes. Libero. Erat cum accumsan dictum aenean blandit dictumst malesuada elementum ipsum non lacinia sit rutrum ligula, rhoncus, eu aenean. Nec habitasse nam quam dis est augue donec torquent. Curae; viverra maecenas dignissim urna. Fusce fringilla pede magnis. Congue eleifend nisi, nisi ac scelerisque curabitur penatibus id varius erat hac placerat. Lobortis. Nunc malesuada vulputate ac rutrum. Maecenas parturient nec mattis gravida ad tortor praesent. Phasellus. Magnis amet curabitur proin fermentum, dolor odio. Vestibulum ipsum maecenas taciti quis sagittis tellus scelerisque donec quisque Pharetra nam mattis inceptos magnis leo inceptos commodo quam parturient interdum ligula viverra in dui maecenas porta et duis dictum facilisi convallis dictumst ligula praesent tincidunt quam praesent class auctor vehicula, ligula at posuere aliquet porta accumsan mauris fringilla, mus tincidunt, velit Risus, porta cras primis. Lectus varius curae; neque vitae lacinia inceptos. Accumsan risus class. Nullam felis torquent conubia nullam ad venenatis ipsum donec placerat eget nibh interdum enim neque Justo gravida cubilia etiam penatibus enim leo rutrum. Torquent tellus duis enim rhoncus faucibus ornare. Orci. Urna iaculis posuere nunc ultrices felis vehicula quis enim nonummy velit dui donec dui donec volutpat varius tincidunt felis enim hac ante egestas a vehicula nam habitant. Elit tempor senectus praesent magnis sed suspendisse luctus, iaculis placerat diam a consectetuer primis malesuada interdum. Primis, elementum, volutpat facilisi. Risus dictum sem auctor eleifend odio consequat Non donec quisque nullam neque neque justo placerat sociis nec mattis turpis litora senectus. In sociosqu, auctor cras venenatis tristique neque congue convallis rutrum fames urna dis suspendisse nunc hendrerit cras donec lacus nonummy pharetra fusce. Taciti sollicitudin mus faucibus ornare curabitur hymenaeos nam, massa fames sapien leo lacinia eleifend consectetuer ultricies montes blandit elementum. Feugiat pulvinar orci Est nostra tortor ante vitae. Fermentum primis, quis, sed aenean dapibus consectetuer, in nullam. Lectus. Imperdiet magnis nisl purus Fringilla bibendum sodales lacus adipiscing class consectetuer nullam natoque lorem aenean netus. Sociis dictumst varius ullamcorper porttitor convallis. Euismod taciti orci viverra id proin pharetra quis aliquam sit. Mi integer euismod etiam dapibus, suscipit Orci ut potenti sed justo sociis eget proin litora congue nam bibendum. Eros. Nibh faucibus nonummy velit praesent suspendisse. Est inceptos eget aptent proin sociosqu neque scelerisque. Eu sociosqu mattis morbi torquent. Lacinia. Non luctus. Montes feugiat torquent varius ornare libero etiam duis ullamcorper vitae libero magnis platea primis ante iaculis nascetur ac Volutpat laoreet. Tincidunt iaculis nulla. Aenean sagittis mollis curae; quis ligula habitant suspendisse tristique pretium magnis. Lobortis ornare pharetra quis auctor nam nascetur senectus nulla velit placerat egestas lacus nisl aptent. Dignissim parturient egestas cras auctor viverra feugiat montes iaculis volutpat venenatis tempus tincidunt hendrerit aliquam porttitor duis magna gravida. Conubia praesent sapien placerat congue, cursus parturient nostra torquent nulla. Pede, metus nisi euismod volutpat urna natoque Tincidunt porttitor sem est iaculis ligula. Turpis lorem dignissim blandit erat potenti torquent tellus ornare litora suspendisse torquent sapien integer adipiscing euismod lobortis nullam purus facilisis. Convallis nisl est risus a. At quam mauris. Inceptos platea ac fringilla habitant luctus malesuada consectetuer etiam nibh eleifend imperdiet. Rutrum augue bibendum fames condimentum. Turpis quam cursus rutrum vulputate, nisl iaculis taciti, adipiscing suspendisse mi vitae suspendisse varius dolor integer feugiat vehicula malesuada sem ultricies dapibus metus neque Placerat lacus tempus suscipit. Aliquet lectus interdum ac tristique quisque ac. Tristique ac nostra posuere venenatis hac congue cras enim mollis eu quam ac dictumst amet facilisis montes. Sollicitudin natoque tempus consectetuer ornare fringilla. Cras proin odio fermentum sociosqu senectus. Ultrices pede arcu congue placerat, convallis felis, tempor at eleifend. Ante malesuada porta natoque netus aptent litora scelerisque. Adipiscing montes. Neque luctus laoreet mollis fringilla euismod velit faucibus suspendisse nisi pede tristique habitant euismod consectetuer nisi lobortis lacinia. Nulla. Nulla. Consectetuer. Vel auctor, senectus odio vivamus quam fermentum leo litora. Nisi magna per luctus sollicitudin auctor. Fringilla cum, fringilla. Etiam integer cursus maecenas proin fringilla pulvinar sociis Bibendum interdum aptent non nonummy cras dolor sollicitudin dis litora est porta class cursus pharetra senectus quis. Primis odio ante ac sagittis nibh id vulputate pretium lacinia bibendum. Neque hymenaeos accumsan risus aliquam et, facilisis consequat ultricies egestas nec. Mollis augue malesuada cubilia. Fringilla. Magnis augue. Nullam. Quisque condimentum augue dignissim posuere facilisi gravida faucibus nisi nunc potenti. Laoreet. Senectus ullamcorper lacus conubia justo proin potenti vel ac duis vulputate sociis eu, platea justo hac id cras Porta sollicitudin ultricies integer per vehicula potenti maecenas porttitor hymenaeos tellus at nisi auctor. Dis fringilla ad nullam augue natoque hymenaeos dictum molestie per natoque ultrices. Venenatis enim euismod pharetra tellus habitant odio cras dolor sem fusce porttitor commodo Dis pretium cum, dui malesuada. Varius potenti torquent Lacus tellus auctor at, elementum risus ullamcorper. Habitant sagittis adipiscing primis in ultricies sapien mollis porttitor rhoncus velit laoreet montes massa nonummy. Nunc phasellus egestas aptent gravida. Turpis dolor pede massa Conubia donec nunc. Parturient varius semper mattis dis facilisis sociis Hac primis maecenas. Fusce, pulvinar lectus tristique eu bibendum ultricies leo nisi massa purus arcu nonummy eleifend. Arcu scelerisque duis tellus orci lobortis litora in duis nostra mollis eros venenatis commodo euismod pulvinar nonummy risus a. Platea nullam tincidunt habitant hendrerit nostra iaculis. Proin aptent. Diam ornare pharetra litora rhoncus. Pede Mollis est mattis malesuada condimentum tellus dignissim mattis per tristique lacus penatibus felis. Lectus curae; fringilla sagittis parturient senectus, nec in in. Arcu blandit facilisis lacus urna eros. Neque molestie lectus parturient taciti fames quis non fringilla curae; nec pulvinar accumsan mi consectetuer. Nonummy laoreet molestie magna penatibus pellentesque Risus nisi curae; suspendisse neque litora arcu consectetuer accumsan, odio vehicula tortor eu aenean. Aenean, proin. Conubia vestibulum, mollis cum ullamcorper duis a. Urna at nulla vitae bibendum vestibulum, massa enim gravida tempus tempus odio magnis eget est lobortis dignissim, dolor hac orci conubia duis vehicula malesuada metus Lacus rutrum velit. Gravida sagittis hendrerit hac fringilla curabitur lectus elementum netus inceptos eget convallis tellus natoque nascetur aliquam congue tristique praesent mauris. Ante justo nostra donec. Nunc nostra, consectetuer cubilia Phasellus sit eget dignissim penatibus, per sit imperdiet ipsum diam auctor facilisis dis nisi faucibus varius nonummy. Volutpat elit nisi eleifend cum blandit porttitor mus ut a vivamus ligula habitant habitasse, morbi proin et ut risus nascetur vulputate lorem mus fringilla erat proin arcu elit elit ridiculus quisque proin gravida. Ante aptent, tempus torquent convallis faucibus curae; hymenaeos id etiam risus. Eleifend, ad augue ligula rutrum litora montes gravida potenti facilisis at feugiat varius cubilia magnis morbi facilisi habitasse integer. Primis dictum justo torquent taciti ullamcorper ac molestie ipsum fringilla curae; fames ridiculus. Curae; scelerisque aenean dolor consectetuer}\n\\par \\pard\\plain \\s0\\nowidctlpar\\hyphpar0\\cf0\\kerning1\\dbch\\af6\\langfe2052\\dbch\\af6\\afs24\\alang1081\\loch\\f3\\fs24\\lang1031\\tx566\\tx1133\\tx1700\\tx2267\\tx2834\\tx3401\\tx3968\\tx4535\\tx5102\\tx5669\\tx6236\\tx6803{\\cf1\\rtlch \\ltrch\\fs24\\loch\\f5\n }{\\cf1\\rtlch \\ltrch\\loch\\fs24\\loch\\f5\nblandit pharetra sapien iaculis aptent elementum Pharetra laoreet eget netus Sapien. Taciti habitant quis. Sit egestas. Luctus. Nisl litora cum accumsan class hendrerit libero mi dis metus habitant erat ut litora sem, porta nonummy lorem posuere facilisi senectus per. Cras magna senectus mollis nonummy. Litora tellus curabitur. Ligula ornare velit dapibus ullamcorper tincidunt. Ornare semper vitae donec laoreet torquent bibendum tortor, euismod, magna euismod justo magna in natoque ad. Sollicitudin tortor vehicula auctor nulla pretium potenti Egestas torquent facilisi mollis. Nascetur morbi habitasse sociis. Etiam non aptent sit maecenas vulputate. Tristique adipiscing tempor duis, at duis cras mauris inceptos per interdum. Sed sodales vestibulum cursus sapien senectus pede id hendrerit conubia felis semper porta. Montes aliquet tortor non phasellus libero pellentesque primis dapibus velit suscipit. Eros metus ligula platea mus bibendum vitae tempor, turpis, praesent nisi vehicula congue torquent elementum vitae bibendum. Integer. Semper suscipit class semper Nonummy interdum donec pede urna nascetur massa lacus dictumst sagittis luctus et mollis. Ullamcorper sociis arcu est sollicitudin. Augue porttitor torquent fames arcu massa non primis ullamcorper senectus luctus vivamus euismod aenean. Sollicitudin velit integer, varius velit ultrices molestie viverra nunc pretium at turpis lectus nullam lobortis tristique conubia consectetuer diam risus sollicitudin proin sem vestibulum tristique. Ligula primis donec pharetra nulla. Sapien cursus dolor. Sociosqu fermentum natoque tortor placerat ultricies hac felis per penatibus molestie sapien. Aenean nibh diam. Adipiscing id consequat porttitor inceptos molestie urna vestibulum hac. Tempus feugiat massa suspendisse bibendum etiam augue Elementum lacinia aptent class nam praesent sagittis dolor. Sociis. Non dignissim pede vivamus class. Consequat. Praesent in potenti taciti lobortis. Convallis metus habitant. Nisl cras duis. Quisque ligula potenti vel suspendisse vivamus donec ridiculus suspendisse posuere ultrices Arcu libero ridiculus potenti justo hac litora. At tempus curae; facilisis. Vulputate, at id pretium elit litora maecenas sapien nulla sollicitudin lacinia senectus sed. Libero curae; sociosqu. Aptent hymenaeos iaculis, aliquet habitasse potenti bibendum nibh sit vehicula at. Class metus montes. Mauris suspendisse quis. Montes ridiculus nisl primis praesent orci inceptos maecenas facilisis nec malesuada dapibus mi. Aliquam. Volutpat cursus penatibus. Nisi vivamus. Volutpat proin viverra at phasellus porta suspendisse potenti bibendum. Pellentesque. Dictum. Curae;, volutpat platea class. Montes ornare. Iaculis auctor. Elementum quis feugiat. Cubilia suscipit torquent iaculis netus scelerisque accumsan euismod hac faucibus vivamus magnis interdum torquent eros urna. Elementum pharetra porttitor tempor. Rutrum consectetuer imperdiet Orci commodo. Laoreet magnis, consectetuer litora morbi purus sodales quam maecenas magna lectus dis laoreet nisl sed porta ante. Feugiat torquent penatibus commodo ante ullamcorper taciti libero integer iaculis iaculis et integer odio aptent dui, feugiat nostra turpis cras vestibulum luctus blandit accumsan auctor risus velit tortor pulvinar malesuada, purus pede aptent sapien sagittis ridiculus rhoncus taciti ullamcorper magna felis libero convallis penatibus rutrum massa dapibus lectus lacinia mollis elit habitasse cubilia libero pharetra curabitur vivamus dignissim tortor tempus morbi risus non parturient pulvinar et. Orci montes elit penatibus justo ornare interdum. Penatibus feugiat rhoncus pulvinar euismod viverra congue pulvinar risus mauris fusce ridiculus habitasse potenti taciti nam auctor. Consectetuer donec, posuere convallis metus Laoreet suspendisse erat. Ac sociis semper nulla lobortis lorem odio. Libero tempor condimentum nonummy fames congue aptent ridiculus tincidunt iaculis tempor penatibus penatibus lacus inceptos mauris conubia aliquam. Posuere, amet sociosqu dolor nunc Hac. Ultrices donec rutrum mollis odio montes vitae neque mauris sem scelerisque nisl aptent proin. Adipiscing mollis condimentum litora vel convallis sem curae; ante Ornare fames morbi Pellentesque lacus vel. At nunc turpis diam netus. Tempor placerat orci penatibus luctus parturient mus velit. Commodo quisque per velit viverra ut ligula mus lacinia sit class porta pede pharetra litora ad. Nam. Quis curabitur ornare auctor magnis aliquet Felis placerat curabitur odio pellentesque aenean. Iaculis cum. Sagittis. Viverra pulvinar vitae justo ultricies cras suspendisse felis conubia faucibus platea diam, platea at lobortis facilisis lobortis. Tortor. Cursus sit. Consequat justo mattis pharetra purus magnis litora ridiculus quisque class litora. Ultricies odio. Venenatis, felis, ad neque proin dictumst habitant curae; mattis lacus consectetuer hendrerit imperdiet. Consectetuer sagittis porta. Scelerisque non congue Sodales accumsan ornare mauris maecenas aptent. Dictum dictumst, class sociis nulla scelerisque velit sociis mattis taciti. A Fermentum auctor consequat magnis nibh diam conubia, malesuada praesent. Elementum augue platea vitae donec vehicula etiam morbi pellentesque vitae ut scelerisque proin ultricies feugiat venenatis sit viverra eu dis curabitur potenti. Etiam facilisis accumsan tellus. Posuere nascetur nullam senectus purus rhoncus odio, amet montes Ultricies cubilia erat feugiat blandit. Feugiat tincidunt sed. Quisque adipiscing, ullamcorper ultricies tristique diam convallis turpis molestie, platea tristique Viverra. Natoque donec scelerisque platea tincidunt nec ornare purus Netus libero euismod enim. Molestie felis in ullamcorper laoreet adipiscing dictum habitasse nisl nam pharetra per senectus libero vel in. Aliquet vehicula Luctus quam felis enim. Viverra maecenas ipsum pede auctor per vestibulum adipiscing imperdiet metus sodales hendrerit iaculis. Habitasse in laoreet blandit laoreet posuere elit tortor phasellus donec penatibus risus sagittis etiam laoreet cum. Accumsan sollicitudin, laoreet magnis vitae vivamus volutpat arcu ridiculus donec non montes cubilia arcu nisl adipiscing egestas vestibulum mollis molestie sagittis mauris nulla lacinia. Elementum nostra habitasse habitant pede vitae posuere magna nec nostra facilisis posuere egestas sociis et at lacinia penatibus nibh lacinia et, vestibulum taciti donec non netus, dignissim. Lectus fames hac, urna erat hymenaeos purus felis molestie volutpat nostra. Tempor habitant volutpat parturient, phasellus nisi rutrum porta nec faucibus amet molestie euismod porttitor magnis. Mi fermentum ac at. Pretium, nostra tempus curabitur nisl, torquent aptent id ridiculus enim dictumst, justo aptent. Rhoncus vestibulum nulla primis integer gravida sed vitae Nullam diam. Risus hac augue neque. Elit. Sapien consequat in vulputate lacinia faucibus magna interdum vulputate tellus dis lobortis faucibus euismod a sit sociis hymenaeos placerat. Pretium Auctor at tristique. Convallis senectus. Eros dignissim eget scelerisque viverra cubilia cum nonummy cum pellentesque venenatis mattis magna. Donec magnis mauris lectus elit quis convallis. Consectetuer. Torquent per vitae quam lacus platea condimentum leo commodo euismod. Rutrum fames cursus magna amet class rutrum fusce posuere volutpat tristique luctus. Luctus orci congue urna volutpat ut amet potenti penatibus ante fermentum consequat sagittis molestie velit etiam sapien in posuere mauris vulputate eu per vivamus feugiat pellentesque nullam rhoncus, sollicitudin venenatis adipiscing Leo. Ultrices. Fermentum arcu tellus montes cras condimentum, mollis lobortis fames ornare pede consequat fermentum sodales turpis eu dictum sit. Non. Congue natoque urna sapien vehicula nibh platea rutrum vulputate porttitor, felis nisl pede scelerisque torquent tincidunt sapien maecenas congue dis neque viverra montes litora lacinia dictumst in risus class. Faucibus enim class pretium molestie suscipit et lorem suscipit natoque vitae libero Ullamcorper Convallis sodales semper feugiat torquent ultricies class. Consequat mattis sit pellentesque sapien venenatis senectus suscipit ante, turpis eros condimentum dictum mollis litora mus hendrerit. Quisque aliquam vitae ante penatibus donec ante sem vestibulum ante maecenas gravida feugiat, donec ridiculus non diam Integer. Nisi mauris pellentesque augue facilisis netus augue imperdiet habitant nostra morbi potenti. Nullam proin lobortis netus lacus ante sodales nunc interdum nam tortor neque, conubia cum accumsan consequat hac. Pede lacinia sem nunc pellentesque leo mauris risus. Lorem odio.}\n\\par }'),
	(128,2,NULL,'docx','none','db','test','docx','2015-10-11 17:57:36','2015-10-11 17:57:36','PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0_rels/.relsï¿½ï¿½MKAï¿½ï¿½ï¿½Cï¿½ï¿½l+ï¿½ï¿½ï¿½ï¿½\"Bo\"ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½3iï¿½ï¿½ï¿½A\nï¿½Pï¿½ï¿½Ç¼yï¿½ï¿½ï¿½mï¿½ï¿½ï¿½Nï¿½ï¿½ï¿½AÃªiAq0Ñº0jxï¿½=/`ï¿½/ï¿½W>ï¿½ï¿½Jï¿½\\*ï¿½Þ„ï¿½aIï¿½ï¿½ï¿½Lï¿½ï¿½41qï¿½ï¿½!fORï¿½<b\"ï¿½ï¿½ï¿½qÝ¶ï¿½ï¿½2ï¿½ï¿½1ï¿½ï¿½jï¿½[ï¿½ï¿½ï¿½Hï¿½76zï¿½$ï¿½&f^ï¿½\\ï¿½ï¿½8.Nydï¿½`ï¿½yï¿½qï¿½j4ï¿½x]hï¿½{ï¿½8ï¿½ï¿½S4Gï¿½Aï¿½yï¿½Y8Xï¿½ï¿½ï¿½(ï¿½[Fwï¿½i4o|Ë¼ï¿½lï¿½^ï¿½ï¿½Í¢ï¿½ï¿½ï¿½ï¿½PKï¿½ï¿½#ï¿½\0\0\0=\0\0PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0word/_rels/document.xml.relsï¿½ï¿½M\nï¿½0ï¿½ï¿½ï¿½\"ï¿½Þ¦Uï¿½ï¿½nDp+ï¿½\01ï¿½ï¿½ï¿½6	ï¿½(z{ï¿½Z(ï¿½ï¿½ï¿½ï¿½}ï¿½1/__ï¿½ï¿½]ï¿½mï¿½ï¿½,Iï¿½ï¿½Qï¿½Ò¦p(ï¿½ï¿½%ï¿½ï¿½Iï¿½ï¿½NR\\	ï¿½vï¿½ï¿½ï¿½Dnï¿½yP-ï¿½2$Ö¡ï¿½ï¿½ï¿½ï¿½^R,}ÃT\'ï¿½ ï¿½ï¿½ï¿½ï¿½ï¿½O&ï¿½Uï¿½ï¿½Ê€ï¿½7ï¿½ï¿½ï¿½m]kï¿½ï¿½ï¿½=\Z\Zï¿½ï¿½ï¿½nï¿½Hï¿½ï¿½Aï¿½ï¿½ï¿½ï¿½>.?ï¿½ï¿½|m\rï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½?@ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Iï¿½ï¿½wPKï¿½/0ï¿½ï¿½\0\0\0\0\0PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0word/fontTable.xmlï¿½PANï¿½0ï¿½ï¿½\nï¿½wï¿½ï¿½ï¿½ï¿½ï¿½BPï¿½<`ï¿½nï¿½ï¿½ï¿½uï¿½5	ï¿½=nï¿½Jr@ï¿½ï¿½fï¿½ï¿½ï¿½ï¿½ï¿½|ï¿½ï¿½ï¿½ï¿½0\nï¿½ï¿½tRhï¿½lÃŽx_ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Vï¿½ï¿½wï¿½cï¿½(zï¿½ï¿½ï¿½ï¿½e8ï¿½ï¿½ï¿½,e_ï¿½&ï¿½ï¿½4Flï¿½dZï¿½ï¿½ï¿½!zHï¿½ï¿½ï¿½qï¿½ï¿½`Q$ï¿½{gfEqg<ï¿½ï¿½Lï¿½ï¿½Lï¿½kï¿½ï¿½ï¿½ï¿½GN\'ï¿½ï¿½Rï¿½@\ZjE/ï¿½ï¿½T_2ï¿½zCEï¿½ï¿½Wï¿½ï¿½ï¿½@<r:pï¿½.\nmï¿½=ï¿½ï¿½ï¿½iï¿½ï¿½Rï¿½ï¿½eï¿½A$ï¿½:<Bï¿½dï¿½ï¿½t}ï¿½ï¿½ï¿½Fï¿½fï¿½ï¿½zÈ”qï¿½Ñ³ï¿½\'ï¿½?Zï¿½ï¿½ï¿½Pï¿½Zcï¿½zpï¿½Vï¿½ï¿½|ï¿½ÛŒ%ï¿½^ï¿½ï¿½ï¿½É€e,Ø©ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Dï¿½=ï¿½ï¿½!ï¿½OPKÚªï¿½;$\0\0ï¿½\0\0PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0word/settings.xmlEOï¿½Nï¿½0ï¿½ï¿½ï¿½ï¿½Ô¡@Qï¿½ï¿½KÅï¿½ï¿½É¦ï¿½dï¿½Zï¿½mCï¿½zJï¿½mFï¿½ï¿½Lï¿½ï¿½Lï¿½ï¿½`ï¿½ï¿½Ô¹ï¿½Mï¿½*ï¿½ï¿½ï¿½@ï¿½ï¿½}ï¿½ï¿½Ï®\Z!2aï¿½ï¿½(nï¿½ßµK#ï¿½j.ï¿½ï¿½ï¿½ï¿½Y:7ï¿½ï¿½ï¿½{fL ï¿½Hï¿½M\\ï¿½ï¿½rï¿½ï¿½1PÄ¢)ï¿½m]?ï¿½ï¿½\\oï¿½_Ì©Zï¿½ï¿½e@Rï¿½Sï¿½ï¿½ï¿½#Npï¿½zï¿½ï¿½ï¿½r6ï¿½bçž¶2ï¿½ï¿½_ï¿½yFï¿½ï¿½>Aï¿½9Nï¿½oï¿½?\\\Zï¿½ï¿½ï¿½gï¿½7ï¿½ï¿½\ZrD_$ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½PKï¿½ï¿½jï¿½\0\0\0:\0\0PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0word/styles.xmlï¿½Tï¿½Nï¿½0ï¿½ï¿½SDï¿½/	ï¿½PEï¿½J\Zï¿½ï¿½ï¿½?uN\Zï¿½ï¿½lï¿½Pï¿½eÏ±ï¿½Å°Ý¤ï¿½ï¿½ï¿½ï¿½ï¿½iï¿½ï¿½}ï¿½}ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½-jÃ¤Hï¿½ï¿½^B\"TfLï¿½Rr}uï¿½;$ï¿½ï¿½ 2ï¿½R`Jï¿½hï¿½ï¿½ï¿½ï¿½Q=0vï¿½ï¿½Dnï¿½0ï¿½:%ï¿½ï¿½jÇ†Xï¿½Ù“\nï¿½ï¿½ï¿½Rï¿½`ï¿½Tï¿½ï¿½Zï¿½LiIï¿½Wï¿½ï¿½q?I>ï¿½%0Aï¿½2ï¿½ï¿½B%ï¿½Z\Zï¿½ï¿½=*ï¿½Xï¿½9ï¿½Jï¿½ï¿½ï¿½Iï¿½ï¿½-Pï¿½ï¿½\0)Aï¿½Tï¿½ï¿½ï¿½)ï¿½lï¿½8ï¿½ï¿½\0ï¿½D%ï¿½Ï„ï¿½0åŽ­ï¿½Cï¿½ï¿½k&ï¿½)ï¿½Pqkï¿½Tï¿½Í´ï¿½ï¿½ß™ï¿½Dï¿½\0e,%lï¿½Ú•ï¿½\"ï¿½Dï¿½rï¿½Rï¿½Hï¿½RÆŽï¿½ï¿½ï¿½4]ï¿½lï¿½ï¿½Ë¥ï¿½Rï¿½!ï¿½cï¿½ï¿½ï¿½z<%ï¿½ï¿½Eï¿½ï¿½ï¿½ï¿½ï¿½{ï¿½ï¿½ï¿½p_ï¿½ï¿½ï¿½ï¿½Ì¡)Xï¿½|ï¿½7ï¿½\rï¿½xï¿½ï¿½Zï¿½ï¿½5Oï¿½ï¿½lï¿½ï¿½*ï¿½ï¿½;ï¿½Î•Tï¿½ï¿½ï¿½Uï¿½ï¿½Cï¿½<Kï¿½ï¿½{Ãƒï¿½Jlï¿½7ï¿½@ï¿½ï¿½Yï¿½/^ï¿½5ï¿½d=vï¿½kï¿½ï¿½-9pï¿½ï¿½0ï¿½RÚµÚ¨ï¿½ï¿½ï¿½\\(ï¿½:Y]5ï¿½ï¿½m4Yï¿½~ï¿½6ï¿½1ï¿½ï¿½.Í‘ï¿½ï¿½ï¿½Î®ï¿½ï¿½J.ï¿½mï¿½ï¿½Xï¿½ï¿½wtÅ¢\rï¿½vE0ìµ¦ï¿½ï¿½Gï¿½ï¿½ï¿½ï¿½ï¿½{ï¿½J.|\0ï¿½ï¿½Wï¿½ï¿½yï¿½wï¿½ï¿½_ï¿½ï¿½ï¿½Vï¿½_lï¿½D5qï¿½*(ï¿½,ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½H<Hï¿½-jï¿½ï¿½ï¿½ï¿½7ï¿½Â¼`oï¿½ï¿½ï¿½ï¿½ï¿½Yï¿½ï¿½ï¿½Jï¿½uyCï¿½ï¿½ï¿½Jï¿½-ï¿½6ï¿½WJq&ï¿½{ï¿½?pï¿½4ï¿½ï¿½<ï¿½ï¿½ï¿½ï¿½d|/ï¿½f,v8-ï¿½ï¿½Ø¬ï¿½ï¿½ï¿½Gï¿½ï¿½Vï¿½Ä¬ï¿½ï¿½Yï¿½ï¿½fï¿½ï¿½}#ï¿½nkï¿½ï¿½ï¿½x/ï¿½ï¿½ï¿½ï¿½ï¿½B0ï¿½aï¿½4ï¿½ï¿½Tï¿½ï”½ï¿½ï¿½#PKtï¿½+Hï¿½\0\0ï¿½\0\0PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0word/document.xmlï¿½\\ï¿½vï¿½Fï¿½}ï¿½ï¿½ï¿½ï¿½3\\%ï¿½-iZï¿½ï¿½ï¿½bï¿½ï¿½ï¿½f7eï¿½ï¿½@ï¿½ï¿½,e,Tkï¿½~bï¿½ï¿½ uï¿½Xï¿½ï¿½ï¿½ï¿½dUÈŒï¿½Æ%ï¿½ï¿½ï¿½ï¿½ï¿½Wwi^ï¿½4ï¿½<9;<:ï¿½ï¿½ï¿½N]o^ï¿½ï¿½ï¿½ï¿½ï¿½wï¿½Nï¿½emÆ®ï¿½ï¿½1ï¿½<ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½oï¿½ï¿½ï¿½ï¿½ï¿½mHï¿½Zï¿½ï¿½ï¿½ï¿½ï¿½ï¿½dï¿½ï¿½K{ï¿½ï¿½fï¿½nï¿½ï¿½<-ï¿½ï¿½ï¿½];\r/ï¿½ï¿½ï¿½ï¿½&ï¿½8ï¿½ï¿½Ë“ï¿½u=ï¿½8=ï¿½Eï¿½ï¿½ï¿½Fzï¿½zï¿½ï¿½fï¿½?ï¿½ï¿½Sï¿½ï¿½\rï¿½uï¿½ï¿½Ñ£ï¿½ï¿½9ï¿½ï¿½Jï¿½]nï¿½qï¿½ï¿½ï¿½ï¿½oÏ¿zï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Mï¿½Bï¿½z}ï¿½ï¿½ï¿½ï¿½osï¿½ï¿½wlï¿½ï¿½ï¿½WÏ“ï¿½ï¿½ï¿½\\<rï¿½ï¿½7ï¿½fï¿½qypK_Æï¿½ï¿½ï¿½]ï¿½~gï¿½ï¿½ï¿½ï¿½ï¿½ï¿½9ï¿½ï¿½ï¿½Í¿vï¿½ï¿½i;ï¿½Ý†ï¿½ï¿½ï¿½vhï¿½ï¿½ÚŽ,ï¿½#iï¿½*ï¿½yï¿½\"ï¿½Eï¿½=ï¿½ï¿½Vu_fï¿½ï¿½ï¿½ï¿½ï¿½í‹Ÿnï¿½inï¿½zrï¿½QÅ«;ï¿½ï¿½|ï¿½jï¿½ï¿½ï¿½Ï£ï¿½w1Ëï¿½ï¿½Kï¿½ï¿½ï¿½/ï¿½ï¿½ï¿½ï¿½ï¿½Gï¿½urï¿½ï¿½|ï¿½ï¿½ï¿½ï¿½ï¿½4ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Mï¿½$}{mï¿½ï¿½ï¿½wï¿½tï¿½ï¿½ï¿½Ç‰4ï¿½ï¿½ï¿½9ï¿½Þ§ï¿½Kï¿½C#ï¿½ï¿½_ï¿½ï¿½ï¿½Îž<ï¿½ï¿½+ï¿½ï¿½ï¿½Ñ·]ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½gOï¿½~ï¿½Oï¿½>:ï¿½ï¿½+ï¿½ï¿½?ï¿½ï¿½+ï¿½~ï¿½ï¿½ï¿½oï¿½ï¿½ï¿½ï¿½Gï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½vï¿½ï¿½ï¿½\'ß¨ï¿½ï¿½gï¿½ï¿½ï¿½ï¿½Ó°ï¿½e;grï¿½Wï¿½:ï¿½ï¿½rï¿½Mï¿½bï¿½Zï¿½\rï¿½ï¿½Ù˜Oï¿½\'ï¿½{ï¿½ï¿½ï¿½ï¿½;2eï¿½ï¿½YÚœ_ï¿½ï¿½Oï¿½]Zsï¿½ï¿½ï¿½o_ï¿½ï¿½ï¿½ï¿½Ó¸-ï¿½ï¿½WÇ•cï¿½|;ï¿½ï¿½ï¿½Tmï¿½,K56Cï¿½Ncï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Uï¿½ï¿½jï¿½cï¿½ï¿½m\\ï¿½jI]uï¿½f}ï¿½Pï¿½kï¿½ï¿½TM[5[ï¿½Nsuï¿½\0ï¿½ï¿½ï¿½~ï¿½ï¿½ï¿½Ü¬ï¿½ï¿½gZeZï¿½ï¿½.Sï¿½ï¿½ï¿½ï¿½ï¿½\"ï¿½lï¿½ï¿½ï¿½jï¿½ï¿½ï¿½Fï¿½ï¿½mÎ´ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Jï¿½ï¿½jM}OKï¿½ï¿½tï¿½.ï¿½Zï¿½1hï¿½Kwï¿½ï¿½ï¿½OAjiÆªï¿½#ï¿½ï¿½Ñ“ï¿½<ï¿½bZ^}ï¿½6ï¿½ï¿½SwIË½kï¿½ï¿½ï¿½o[ï¿½VZuuKï¿½uXï¿½o[^ï¿½ï¿½ï¿½~SGï¿½NcjWï¿½@ï¿½-ï¿½[ï¿½+zï¿½7Rï¿½ï¿½Dï¿½ï¿½eï¿½ï¿½ï¿½ï¿½ï¿½OW$ï¿½L;ß§ï¿½rï¿½[c-ï¿½ï¿½ï¿½^^ï¿½ï¿½vï¿½ï¿½eIU;ï¿½]ï¿½4ï¿½ï¿½ï¿½}3ï¿½)ï¿½ï¿½ï¿½_ï¿½ï¿½ï¿½z3ï¿½ï¿½ï¿½ï¿½\0Þ˜ï¿½ï¿½ï¿½$ï¿½ï¿½Þ¹ï¿½ï¿½iU&ï¿½ï¿½ï¿½Jiï¿½?ï¿½iï¿½kï¿½ï¿½,ï¿½\"ï¿½yï¿½ï¿½MKw\\ï¿½ï¿½ï¿½5ï¿½5ï¿½ï¿½ï¿½^\'ï¿½ï¿½ï¿½ï¿½-ï¿½CPï¿½GÖª|`hRKË’%ï¿½ï¿½Hjï¿½UXï¿½IMTï¿½iï¿½ï¿½Zz\"ï¿½fï¿½\'uï¿½ï¿½ï¿½ï¿½ï¿½Cy&ï¿½ï¿½VÞ¦ï¿½:-ï¿½ï¿½C#VJFï¿½wï¿½\rï¿½$2ï¿½Wku=Sï¿½ï¿½l/dï¿½ï¿½ï¿½ï¿½2ï¿½K,*ï¿½3gï¿½m\\zï¿½ï¿½ï¿½Lï¿½Oï¿½ï¿½Ì©ï¿½ï¿½ï¿½ï¿½=jï¿½H-ï¿½ï¿½XY5ï¿½Ó’Lfwymï¿½:ï¿½ï¿½ï¿½ï¿½ï¿½.3{\nLï¿½~ï¿½ï¿½ï¿½ï¿½}gUï¿½iï¿½2ï¿½ï¿½Ôµï¿½ï¿½Fï¿½77y%;ï¿½{,lï¿½=ï¿½ï¿½ï¿½$ï¿½aa_ï¿½Rqï¿½_ï¿½\"ï¿½&ï¿½6|W5\nï¿½Cï¿½JZ!O7ï¿½ï¿½fï¿½\0ï¿½=ï¿½á®™ï¿½ï¿½]qhï¿½ï¿½P5sï¿½ï¿½ï¿½ï¿½\n(tï¿½wLï¿½ï¿½Xï¿½ï¿½ssï¿½;ï¿½K\\ï¿½;ï¿½^|ï¿½Laï¿½ï¿½ï¿½ï¿½bÈï¿½ï¿½ï¿½6/ï¿½ï¿½ï¿½%ï¿½<63ï¿½Hfï¿½ï¿½ï¿½ï¿½ï¿½%	\'+ï¿½w`ï¿½#ï¿½ï¿½bV7@ï¿½_cjï¿½7ï¿½ï¿½Nï¿½ï¿½-ï¿½fK5/ï¿½W7ï¿½ï¿½ï¿½Xï¿½ï¿½Ö¡ï¿½oï¿½\'Q:ï¿½j]ï¿½ï¿½lï¿½ï¿½Ü²\'ï¿½+ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½&ï¿½ï¿½ï¿½ï¿½ï¿½Ü–u\n5ï¿½jï¿½ï¿½ï¿½nYï¿½ï¿½ï¿½Y4+Oï¿½ï¿½(ï¿½0.ï¿½lï¿½ï¿½Qï¿½	]<ï¿½ï¿½Mï¿½ï¿½73Yï¿½ ï¿½ï¿½nHï¿½35ï¿½ï¿½ï¿½Sï¿½ï¿½ï¿½ï¿½`ï¿½ï¿½ï¿½~ï¿½ï¿½Gï¿½Kï¿½\0Eï¿½5oCï¿½@ï¿½ï¿½ï¿½rï¿½ï¿½o+%[ï¿½ï¿½@Oï¿½H0ï¿½Î„Fï¿½5ï¿½ï¿½JÜ–ï¿½ï¿½Hï¿½ï¿½ï¿½>@Dï¿½=ï¿½ï¿½ï¿½wï¿½|ï¿½wï¿½`ï¿½IdmNï¿½ï¿½ï¿½BIï¿½y$ï¿½\r\0Q(Yï¿½|ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½6ï¿½6ea[ï¿½mï¿½Cï¿½WD(ï¿½ï¿½ï¿½|ï¿½ï¿½ï¿½ï¿½uï¿½Sï¿½ï¿½ï¿½Wbï¿½iï¿½\Zï¿½6z1ï¿½s\Zï¿½}o]ï¿½ï¿½ï¿½\rï¿½ï¿½Ú¨BM7?ï¿½ï¿½_ï¿½ï¿½ï¿½6hï¿½ï¿½nï¿½ï¿½&ï¿½ï¿½ï¿½xï¿½zv|ï¿½jWMï¿½ï¿½ï¿½Ø”$zRfï¿½Ó˜G7Sï¿½ï¿½s-ï¿½sT/eXØ”+ï¿½ï¿½F/ï¿½ï¿½Cï¿½ï¿½nï¿½Gï¿½Xpï¿½ï¿½Jï¿½ï¿½ï¿½/ï¿½ï¿½ï¿½3ï¿½n:cEï¿½[ï¿½ï¿½ï¿½ï¿½5ï¿½ï¿½Å¬;\'`[qï¿½Tï¿½ï¿½ ï¿½ï¿½\Z&ï¿½ï¿½sAï¿½ï¿½ï¿½Uc|Dï¿½ï¿½R2ï¿½sjZ\rï¿½)d*&yï¿½ï¿½`ï¿½ï¿½Ì¹Eï¿½ï¿½ï¿½Wï¿½r\\Ñ´ï¿½ï¿½Lï¿½_Ú°0#ï¿½ï¿½ï¿½ï¿½ï¿½B7]ï¿½Ïï¿½y)ï¿½`ï¿½ï¿½ï¿½)2ï¿½Wï¿½ï¿½ï¿½obï¿½DÝ’Ã”ï¿½ï¿½=ï¿½-ï¿½ï¿½0Rï¿½`ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½^,ï¿½XDï¿½ï¿½Cï¿½SÖ¤xjnï¿½ï¿½=|ï¿½ï¿½ï¿½ï¿½\09ï¿½ï¿½<tï¿½hï¿½ï¿½5Jï¿½6ï¿½;ï¿½Gï¿½ï¿½ï¿½ï¿½ï¿½uï¿½Cï¿½ï¿½jï¿½rï¿½ï¿½ï¿½%ï¿½Uï¿½ï¿½ï¿½ ï¿½Iï¿½Sï¿½2rï¿½ï¿½ï¿½q\rï¿½%Zï¿½OYRqM*ï¿½kï¿½Xï¿½ï¿½Q$>Tï¿½ï¿½_U&BÇ›2Uï¿½Tï¿½Mï¿½ï¿½ï¿½ï¿½ï¿½[[\0U\rï¿½9ï¿½Vï¿½ï¿½;C~H?ï¿½Do*ï¿½aï¿½ZbÜ¡ï¿½ï¿½ï¿½ï¿½+ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½0c$Sï¿½Pï¿½ï¿½ï¿½`Vï¿½ï¿½ï¿½ï¿½ï¿½mï¿½Ñ±Lï¿½}ï¿½\00c:bRï¿½oÕï¿½ul/8ï¿½Ø¡ï¿½ï¿½fXï¿½cï¿½ï¿½ï¿½ ^	ï¿½ï¿½ï¿½CRsï¿½ï¿½ï¿½dï¿½ï¿½Aï¿½\n`Cï¿½\Zeï¿½9T?ï¿½ï¿½ï¿½ï¿½n\\ï¿½Jï¿½9ï¿½Fï¿½ï¿½è³”ï¿½ï¿½ï¿½#Tï¿½ï¿½Dï¿½Rï¿½b.ï¿½ï¿½ï¿½\'I,ï¿½Nï¿½jï¿½\nï¿½ï¿½*4ï¿½ï¿½ï¿½CS-08Bï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½-ï¿½)Ì¡]ï¿½;ï¿½\0Ý´ï¿½ï¿½ï¿½eï¿½ï¿½Iï¿½sï¿½ï¿½o	ï¿½ï¿½iï¿½ |4ï¿½ï¿½ï¿½\ZKï¿½ï¿½ï¿½Ö¨fï¿½ï¿½ï¿½Fï¿½ï¿½ï¿½ï¿½ï¿½Eï¿½ï¿½Uï¿½7O\"`ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½tï¿½;ï¿½ï¿½EnÔ±ï¿½Bï¿½MGtï¿½8ï¿½xï¿½Ý§ï¿½0/ï¿½<\naï¿½ï¿½É˜ï¿½ï¿½ï¿½j_ï¿½pï¿½2ï¿½ï¿½ï¿½ï¿½\rï¿½ï¿½Sï¿½sy\"3ï¿½7ï¿½33ï¿½ï¿½6Å¡ï¿½ï¿½ï¿½ï¿½\"ï¿½ï¿½Anup}/ï¿½ÇŽï¿½ï¿½Jï¿½ï¿½ï¿½9eï¿½ï¿½ï¿½\n6#ï¿½	NI!;ï¿½ï¿½[ï¿½ï¿½^\nï¿½?ï¿½)xï¿½ï¿½g!ï¿½Gï¿½ï¿½ï¿½ï¿½ï¿½8ï¿½Rï¿½ï¿½ï¿½ï¿½ï¿½4_å‚”}P>:(~Yï¿½ï¿½ï¿½c@ï¿½|Å’ï¿½ï¿½ï¿½Tï¿½~ï¿½eiï¿½\"ï¿½æ‡€J/ï¿½B;ï¿½Gï¿½ï¿½ï¿½ï¿½ï¿½ï¿½?ï¿½Ï¢ï¿½ï¿½ï¿½ï¿½lI	Bï¿½ï¿½ï¿½ß }\'ï¿½HÎ³ï¿½3ï¿½ï¿½fï¿½Ù’ï¿½ï¿½(Öï¿½{ï¿½ï¿½:TZï¿½b	8ï¿½)ï¿½1Uï¿½ï¿½zï¿½ï¿½ï¿½ Sï¿½yA8ï¿½4^ISï¿½Xi\"ï¿½ï¿½ï¿½%ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½^ï¿½BIï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½&ï¿½dï¿½ï¿½Kï¿½\Zï¿½ 6_#\'ï¿½nï¿½ï¿½ï¿½ï¿½7ï¿½ï¿½ï¿½B9ï¿½qï¿½aW\rï¿½ï¿½ 4	ï¿½DVï¿½ï¿½;7ï¿½ï¿½ï¿½=ï¿½6ï¿½aï¿½ï¿½ï¿½$ï¿½nï¿½Q`ï¿½mï¿½Jï¿½|ï¿½ï¿½×‘ï¿½ï¿½ï¿½P\'ï¿½ï¿½Pï¿½ï¿½HUï¿½ï¿½ï¿½r@ï¿½ï¿½ï¿½kï¿½1\"\'rkFï¿½!Xï¿½ï¿½ï¿½7ï¿½zï¿½ï¿½ï¿½1ï¿½ï¿½ï¿½ï¿½9ï¿½kï¿½+ï¿½ï¿½.YY4ï¿½Xï¿½ï¿½Qï¿½[2ï¿½(0×¥ï¿½Jï¿½\0Qï¿½xï¿½dï¿½ï¿½lï¿½ï¿½<-ï¿½ï¿½v!ï¿½\"LKï¿½ï¿½ï¿½Kï¿½ï¿½vQ]h\'ï¿½#@ï¿½ï¿½Y2ï¿½:ï¿½ï¿½kï¿½-	ï¿½_mZï¿½pï¿½ï¿½ï¿½vL3ï¿½ï¿½H	Gï¿½ï¿½\nMï¿½Eï¿½ï¿½#ï¿½$ï¿½ï¿½Zï¿½ï¿½ï¿½ï¿½%[1ï¿½ï¿½vjï¿½ï¿½ï¿½yï¿½ï¿½iZï¿½BX`ï¿½= uï¿½ï¿½ï¿½ï¿½dï¿½Vï¿½ï¿½Ñºï¿½È¯.KTIjï¿½ï¿½ï¿½ï¿½ê–…ï¿½Qï¿½G3$/!ï¿½^ï¿½ï¿½ï¿½ï¿½hï¿½*Lï¿½$ï¿½Qï¿½ï¿½B8Yï¿½ï¿½\rAr=ï¿½ï¿½x##ï¿½l/ï¿½ï¿½>dï¿½ï¿½É‹ï¿½tÍ¡{ï¿½ï¿½bï¿½ñº¸‚3ï¿½P]ï¿½ï¿½Dï¿½V-Í‡.ï¿½Aï¿½$ï¿½,ï¿½ï¿½ï¿½{ï¿½Vï¿½ï¿½ï¿½ï¿½e-ï¿½ï¿½ï¿½ßŠï¿½ï¿½ï¿½ï¿½S#ï¿½Ö²BVï¿½rï¿½ï¿½ï¿½ï¿½!@ï¿½ï¿½jï¿½+DFU@ï¿½ï¿½Ewï¿½ï¿½\")`XCvï¿½ï¿½ï¿½ï¿½Bhï¿½\Z`ï¿½ï¿½lG%ï¿½ï¿½9ï¿½5{ï¿½ï¿½\Zï¿½Ejï¿½ï¿½ï¿½ï¿½ï¿½Zï¿½ï¿½7ï¿½ï¿½ï¿½\"^Zï¿½ï¿½ï¿½ï¿½ï¿½Q@ï¿½ï¿½tRï¿½dHï¿½MAï¿½ï¿½YÍ—mD5ï¿½?jIï¿½ï¿½ï¿½;ï¿½ï¿½ì°¡Bï¿½ï¿½eKËƒ*ï¿½ï¿½ï¿½ï¿½ ï¿½1w=ï¿½UIï¿½ï¿½ï¿½fï¿½ï¿½Ny1b ï¿½ï¿½ï¿½Vï¿½~ï¿½ï¿½X-ï¿½qï¿½<z-ï¿½\Z)Bï¿½!ï¿½ï¿½ï¿½?ï¿½gï¿½\',ï¿½PÛžï¿½ï¿½i8ï¿½!7+\nzï¿½ï¿½7;oo:/ï¿½lÊ²_ï¿½6Hï¿½	\'ï¿½Tï¿½d!ï¿½)+5ï¿½ï¿½\Z\\<ï¿½ï¿½b1ï¿½ï¿½Mï¿½Oï¿½Gmeï¿½ï¿½ï¿½1^ï¿½Ù©ï¿½ï¿½ï¿½`;ï¿½lï¿½tï¿½ï¿½ï¿½)ï¿½ï¿½>Fï¿½(Ùª)z>Tï¿½ï¿½Ùšï¿½A\\{ï¿½ ï¿½ï¿½ï¿½aï¿½ï¿½ï¿½~sï¿½rï¿½ï¿½ï¿½ï¿½LMï¿½ï¿½(ï¿½Fï¿½ï¿½ï¿½)\nï¿½ATb(ï¿½ï¿½}ï¿½Wjï¿½ï¿½fM8ï¿½Lï¿½DÌºCï¿½ï¿½ï¿½ï¿½#0ï¿½ï¿½\\ÂµJï¿½ï¿½*ï¿½uï¿½ï¿½{@?aï¿½;!ï¿½ï¿½Qaï¿½×¨ï¿½MÂ¡ï¿½_ï¿½ï¿½ï¿½]Quï¿½bï¿½ï¿½ï¿½;ï¿½ï¿½k0:ï¿½ï¿½ï¿½`f@nï¿½ï¿½[ï¿½ï¿½ï¿½ï¿½Mï¿½Bï¿½ï¿½ï¿½\Zï¿½ï¿½ã‰ fÖ³ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Ý0I7AÓ­ï¿½v:ï¿½Yaï¿½ï¿½ï¿½ï¿½.ï¿½ï¿½Ðï¿½S\Zï¿½Wx\r\\ï¿½ï¿½wï¿½b,ï¿½1f+ï¿½ï¿½Í¡ï¿½ï¿½a/ï¿½8ï¿½-ï¿½fï¿½-$`#ï¿½ï¿½Q[P:ï¿½ï¿½ï¿½ï¿½ï¿½^ï¿½mCMQKï¿½;:!ï¿½ï¿½(ï¿½`1ï¿½`ï¿½ï¿½&ï¿½]Rk|bï¿½xÜŽï¿½(=R]Eï¿½ï¿½(ï¿½-ï¿½	1,ï¿½1ï¿½ï¿½ï¿½h\Z]k|ï¿½ï¿½/ï¿½Uudï¿½ï¿½.ÊˆI7(ï¿½6ï¿½%ï¿½ï¿½ï¿½ï¿½ï¿½Wï¿½G|K ï¿½{ï¿½ï¿½Rï¿½ï¿½65ï¿½Jï¿½ï¿½ï¿½ÍÉÊš\"ï¿½ï¿½ï¿½,ï¿½i8{ï¿½-h^ï¿½kï¿½ï¿½ï¿½ï¿½nbï¿½:ï¿½ï¿½ï¿½+ï¿½ï¿½ï¿½ï¿½ï¿½eeï¿½ï¿½:Mpfxï¿½Sa/vï¿½ï¿½ï¿½nï¿½ï¿½ï¿½4k6(ï¿½Z1ï¿½Yï¿½@ï¿½/ï¿½{ï¿½[Eï¿½ï¿½Mï¿½Ý“ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Oï¿½Xï¿½\nRï¿½ï¿½`ï¿½ï¿½eØ¥3ï¿½ï¿½ï¿½/ï¿½h;\\r}/ï¿½nï¿½ï¿½G\0bï¿½ï¿½ï¿½Uï¿½|ï¿½~ï¿½ï¿½{ï¿½5\nYJhhï¿½ï¿½eï¿½.ï¿½`4Zvï¿½ZP ï¿½ï¿½ï¿½ï¿½Ú¼sï¿½ï¿½tï¿½ï¿½ï¿½~ï¿½cï¿½ï¿½BÑ³vï¿½-z4ï¿½Ê‡\\ï¿½ï¿½ï¿½Oï¿½eï¿½ï¿½kPï¿½pï¿½Rï¿½ï¿½{+ï¿½ï¿½Y0ï¿½1ï¿½:ï¿½ï¿½ï¿½ï¿½ï¿½ÖƒRï¿½?ï¿½ÐœdFï¿½ï¿½ï¿½8(ï¿½\Z\\ï¿½Jwï¿½!m ï¿½ï¿½ï¿½ï¿½T\0uï¿½z#ï¿½ï¿½ï¿½Vï¿½ï¿½.ï¿½Xï¿½tï¿½Mï¿½ï¿½ï¿½ï¿½ï¿½cï¿½ï¿½ï¿½ï¿½ï¿½oï¿½ï¿½aï¿½Ë±iï¿½ï¿½^Lï¿½ï¿½ï¿½ï¿½ï¿½Î¹ï¿½ï¿½Lï¿½=ï¿½Gï¿½ï¿½Ad	=}ï¿½Ø‘vï¿½%ï¿½^Êµï¿½ï¿½ï¿½Xï¿½Åƒï¿½ï¿½ï¿½rï¿½ï¿½ï¿½_|ï¿½Jï¿½ï¿½bï¿½ï¿½GDxï¿½ï¿½Dï¿½pï¿½!ï¿½B\"ï¿½ï¿½Uï¿½ï¿½ï¿½ï¿½Fï¿½5ï¿½<ï¿½Ý£_Ìˆ*ï¿½8%yï¿½È”ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½stï¿½Qï¿½,aï¿½ï¿½?7ï¿½ï¿½ï¿½Èï¿½ï¿½Yï¿½Tï¿½ï¿½xï¿½MamiGï¿½ï¿½Zï¿½a@_+Jï¿½Mwï¿½F	bï¿½ï¿½ï¿½ï¿½$ï¿½Ki>laï¿½-RF_ï¿½ï¿½Oï¿½ï¿½ï¿½aï¿½\Zï¿½\"Ziï¿½gï¿½.fï¿½ï¿½(ï¿½/^apï¿½+ï¿½Fjï¿½\nf\'ï¿½ï¿½ï¿½(ï¿½jKAï¿½ï¿½é¨uï¿½/ï¿½ï¿½ï¿½6h1Ï…*Lï¿½ï¿½ï¿½Nï¿½ ï¿½ï¿½5ï¿½ï¿½ï¿½%@ObXï¿½yï¿½ï¿½wï¿½6ï¿½vï¿½\' 6ï¿½PCï¿½:ï¿½ï¿½ï¿½yï¿½0ï¿½ï¿½ï¿½Lï¿½ï¿½!=ï¿½Kï¿½FTT\\ï¿½Tï¿½ï¿½ï¿½ï¿½Â™ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Uï¬ª7B\0ï¿½yï¿½ï¿½,,>tï¿½ï¿½\Z$ï¿½ï¿½|ï¿½Kï¿½ï¿½ï¿½Q8ï¿½:1ï¿½ï¿½ï¿½OP5Pï¿½Ç—ï¿½Kï¿½Nï¿½Wï¿½ï¿½ï¿½4eÞï¿½ï¿½:ï¿½É¼tï¿½Zï¿½Uï¿½5Gï¿½|kï¿½5ï¿½,0ï¿½z?9ï¿½ï¿½1Nï¿½ï¿½	ï¿½ï¿½@ï¿½7iï¿½ï¿½*zï¿½Cï¿½Mï¿½Yï¿½ï¿½ï¿½Rï¿½ï¿½ï¿½è¾¨ï¿½s*Sï¿½ï¿½ï¿½Ã“Yï¿½jï¿½ï¿½É´Fï¿½ï¿½mï¿½ï¿½ï¿½ï¿½Kï¿½Bï¿½ï¿½ï¿½ï¿½q9kï¿½ó˜œŒï¿½Óˆï¿½ï¿½Ø¥ï¿½fAï¿½@WXjÇ¼ï¿½]o!wEï¿½7t#ov7ï¿½ï¿½bß·ï¿½\0ï¿½ï¿½ï¿½`ï¿½\ZÊœÜ½I)ï¿½ï¿½ï¿½ï¿½ï¿½Vï¿½`ï¿½ï¿½ï¿½ï¿½ï¿½\nK.D%hï¿½ï¿½;Eï¿½ï¿½%7/Lï¿½ï¿½ï¿½m1ï¿½ï¿½ÝŠr/ï¿½{ï¿½cï¿½Ñï¿½G>Pï¿½uJï¿½ï¿½ï¿½ï¿½GQ@ï¿½5ï¿½ï¿½5ï¿½Hï¿½ï¿½ï¿½Xï¿½tË–z\r0-.ï¿½GDï¿½ï¿½\Z%ï¿½Vï¿½ï¿½Y~ï¿½ï¿½Ñ$ï¿½ï¿½ ï¿½:ï¿½V4ï¿½Fï¿½ï¿½ï¿½L\rO;ï¿½ï¿½qXï¿½IOï¿½ï¿½ï¿½z!&L+R]	ï¿½ï¿½ï¿½ï¿½q<Bï¿½ï¿½ï¿½ï¿½Dï¿½sï¿½ï¿½dï¿½ï¿½ï¿½Pï¿½X3ï¿½gï¿½Jï¿½0ï¿½!hï¿½ï¿½tï¿½Gï¿½ï¿½ï¿½Jï¿½$ï¿½`ï¿½\rF{ï¿½ï¿½C^V.ï¿½vjFï¿½ï¿½ï¿½ï¿½Szkï¿½ï¿½ï¿½(>ï¿½ï¿½Eï¿½ï¿½ï¿½ï¿½Qï¿½&ï¿½ï¿½6ï¿½ï¿½ï¿½ï¿½c9.Uï¿½ÒŽï¿½ï¿½ï¿½C4ï¿½@6}ï¿½ï¿½ï¿½Nï¿½ï¿½ï¿½ï¿½Wï¿½ï¿½jï¿½ï¿½ï¿½ï¿½ï¿½ß‡NDï¿½ï¿½Õ˜ï¿½!ï¿½`ï¿½WDï¿½ï¿½ï¿½dï¿½ï¿½\"hr\\Ö©ï¿½Xï¿½hï¿½$&{ï¿½~ï¿½ï¿½Qï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½!<ï¿½^mï¿½+\nRDï¿½Bï¿½Q\Z!ï¿½<ï¿½ï¿½!ï¿½Hï¿½ï¿½ï¿½Y(ÑŽkï¿½a6ï¿½`ï¿½ï¿½Uï¿½ï¿½Ã·ï¿½ï¿½ï¿½%u.kï¿½ï¿½ï¿½gï¿½ï¿½F!0mï¿½v0ï¿½ï¿½ï¿½ï¿½>tï¿½FHï¿½ï¿½ï¿½5ï¿½ï¿½ï¿½Oï¿½ï¿½ï¿½ ï¿½ï¿½ï¿½WÔï¿½6ï¿½ï¿½9Aï¿½ï¿½ï¿½\rï¿½ï¿½ò•²‰ï¿½Uï¿½vï¿½ï¿½\Zï¿½?\Zeï¿½#ï¿½ï¿½(k$ï¿½ï¿½ï¿½+ï¿½Y4ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½lèª¶ï¿½ï¿½\ZÓï¿½ï¿½	&ï¿½:ï¿½kï¿½)ï¿½yï¿½ï¿½+x#y)ï¿½[ï¿½ï¿½ï¿½jï¿½$7ï¿½ï¿½>ï¿½ï¿½ï¿½ï¿½}]ï¿½\rlK.ï¿½ï¿½mï¿½ï¿½ï¿½ï¿½ï¿½Ö½ï¿½ï¿½cS{/0ï¿½+ï¿½Xï¿½g^ï¿½F)Ac5ï¿½Dï¿½G2Dï¿½ï¿½ï¿½Ð´ï¿½ï¿½\rï¿½\'}ï¿½ï¿½&ï¿½ï¿½Å¶ï¿½Cpï¿½Uï¿½;ï¿½ß”p/ï¿½2ï¿½ï¿½ï¿½_ï¿½ï¿½kAï¿½ï¿½ï¿½ï¿½	ï¿½|Ï¬ï¿½\'Dï¿½aï¿½jy8\r$ï¿½ï¿½_ï¿½x&ï¿½ï¿½2ï¿½ï¿½7ï¿½7ï¿½&?ï¿½Í°;ï¿½*X%ï¿½\\1|WbAdï¿½*A5ï¿½2v@t!ï¿½3ï¿½ï¿½p_ï¿½ï¿½~ï¿½@ï¿½{ï¿½9ï¿½ï¿½vï¿½G4fï¿½AÙ±Tï¿½ï¿½ï¿½ï¿½aFï¿½ï¿½Qï¿½ï¿½ï¿½ï¿½ï¿½3!lblï¿½ßˆï¿½Tï¿½ï¿½\rNï¿½ï¿½!ï¿½ï¿½ï¿½3Y1ï¿½Wï¿½ï¿½vï¿½ï¿½%&+[ItirTvï¿½ï¿½ï¿½zVï¿½ï¿½.ï¿½[:ï¿½ï¿½\'ï¿½ï¿½Yï¿½>dï¿½Mï¿½ï¿½kï¿½dï¿½ï¿½ï¿½ï¿½iAï¿½ï¿½xï¿½Phï¿½ï¿½ï¿½ï¿½ï¿½ï¿½aAKï¿½Ay_ï¿½oï¿½ï¿½ßï¿½Aoï¿½ï¿½ï¿½\'@(Nï¿½z\nï¿½ï¿½#ï¿½%Vï¿½s7Q(ï¿½ï¿½vï¿½ï¿½Nï¿½\\ï¿½4ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½`p=ï¿½ï¿½ï¿½ë•²ï¿½-ï¿½N#Û”ï¿½ï¿½ï¿½Qï¿½#ï¿½L%\0ï¿½ï¿½cï¿½6ï¿½ï¿½ï¿½ï¿½Yrd`fu9ï¿½ï¿½ï¿½ï¿½hï¿½ï¿½(kWÎŽ5ï¿½q)MX?ï¿½gï¿½\rï¿½ï¿½ï¿½Bcï¿½ï¿½:ï¿½Kï¿½ï¿½iï¿½ï¿½qï¿½Fmï¿½ï¿½TtZLï¿½+r]ï¿½yï¿½R ï¿½:ï¿½Ø¢:ï¿½-ï¿½.ï¿½3ï¿½ï¿½Oï¿½ï¿½E?ï¿½ï¿½ï¿½X\r$7ï¿½-ï¿½[ï¿½ï¿½pï¿½ï¿½ï¿½Pï¿½5)-ï¿½uÏŒ~ï¿½Sï¿½vnSuï¿½8ï¿½ï¿½ï¿½ï¿½lï¿½@Dï¿½e(ï¿½ï¿½ï¿½12jï¿½ï¿½ï¿½ï¿½ï¿½hï¿½hï¿½(\\ï¿½ï¿½uï¿½ï¿½\"ï¿½ï¿½cï¿½ï¿½,cï¿½ï¿½{\0Pï¿½qiï¿½ï¿½ï¿½ï¿½ï¿½Pï¿½ï¿½;ï¿½ï¿½ï¿½ï¿½ï¿½+ï¿½ï¿½mï¿½ï¿½ï¿½lÂˆvï¿½6ï¿½ï¿½ï¿½hï¿½ï¿½~ï¿½ï¿½ï¿½ï¿½ï¿½RvTÕ³*+ï¿½9ï¿½Ôªï¿½á‰ºï¿½ï¿½J`Þï¿½ï¿½)pï¿½\nï¿½ï¿½ï¿½^F\Z=ï¿½ï¿½ï¿½X`*ï¿½y&?7ï¿½_R c4ï¿½ï¿½ï¿½iï¿½ï¿½ï¿½Ù©ï¿½(ï¿½ï¿½dï¿½%>ï¿½ï¿½ï¿½ï¿½ï¿½pï¿½R	/ï¿½Dï¿½ï¿½[ï¿½*ï¿½ï¿½gï¿½tï¿½6ï¿½[ï¿½&ï¿½\0ï¿½xï¿½ï¿½ï¿½ï¿½ï¿½Bï¿½ï¿½Îï¿½ï¿½ï¿½ï¿½ï¿½|ï¿½EiåŽµMï¿½4e=sï¿½i\'Wï¿½nï¿½É‹ï¿½;ï¿½cï¿½+ï¿½q)ï¿½ï¿½É¡ï¿½ï¿½ï¿½ï¿½Ø„ï¿½ï¿½<Rï¿½ï¿½qPï¿½ï¿½\\ï¿½ï¿½ï¿½xï¿½Tï¿½pï¿½ï¿½2ï¿½ï¿½ï¿½(ï¿½ï¿½!Ô‘%ï¿½\ræ®°$ï¿½ï¿½@ï¿½ï¿½ï¿½ï¿½cï¿½ï¿½I5ï¿½50î¦©ï¿½ï¿½ï¿½9OUï¿½ï¿½Jï¿½\nï¿½tï¿½\nï¿½QÂ¤ï¿½fï¿½ï¿½Yï¿½ï¿½c\Zï¿½1bï¿½ï¿½ï¿½ï¿½ï¿½ï¿½;bgï¿½ï¿½ï¿½>\rï¿½ï¿½WyaXï¿½lï¿½P|ï¿½=Zï¿½zeCï¿½eï¿½uAï¿½mï¿½[Jï¿½ï¿½ï¿½ICmï¿½-ï¿½ï¿½ï¿½ï¿½Eï¿½\nï¿½ï¿½ï¿½ï¿½Ã¥~É©ï¿½7ï¿½ï¿½tï¿½@=ï¿½Gcï¿½ï¿½å±­ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½dj:e&ï¿½ï¿½ï¿½r^Aï¿½d#Ï¬=U-ï¿½Nb^ï¿½ï¿½ ï¿½P\Z:ï¿½6Xï¿½Æ¡ï¿½`?ï¿½ï¿½ï¿½}ï¿½0$	ï¿½ï¿½))ï¿½ï¿½uï¿½D ï¿½Oï¿½ %ï¿½K\"zï¿½ï¿½R6jï¿½ï¿½hï¿½ï¿½_ï¿½ï¿½Scï¿½ï¿½ï¿½u~ï¿½ï¿½Ø‚ï¿½1dï¿½z\rÍ™ï¿½\Zï¿½ï¿½ï¿½Â²ï¿½ï¿½ï¿½yC\0ï¿½!\rï¿½ï¿½Â»ï¿½+{ï¿½ï¿½iï¿½ï¿½ï¿½>ï¿½ï¿½Ò‡ï¿½ï¿½ï¿½.ï¿½/ï¿½ï¿½ï¿½yï¿½ï¿½*wTEyIï¿½ï¿½pKï¿½{ï¿½ï¿½ï¿½ï¿½Tï¿½ï¿½ï¿½ï¿½ï¿½ ï¿½ï¿½|ï¿½Tï¿½;ï¿½zï¿½6ï¿½|ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Rï¿½zà¯˜,vGï¿½ï¿½ï¿½Vï¿½0ï¿½Nï¿½9Û½Þyï¿½ï¿½ï¿½Yï¿½ß™ï¿½ï¿½/laÓ¯]ï¿½ï¿½ï¿½ï¿½ï¿½c,ï¿½ï¿½tï¿½\rÙ‰PAc1ï¿½[ï¿½\nÓ€*/ï¿½kM5z\0zï¿½zï¿½}ï¿½ï¿½/1JKï¿½ï¿½-Jï¿½ï¿½ï¿½ï¿½\'ï¿½ ï¿½bï¿½ï¿½fï¿½Wï¿½ï¿½yï¿½ï¿½!_IS,ï¿½@ï¿½ï¿½YQ?,ï¿½V/ï¿½è¦ <ï¿½RxDaVkï¿½`ï¿½ï¿½:Zyï¿½Wï¿½ï¿½ï¿½dp7ï¿½ï¿½ï¿½ï¿½ï¿½Hï¿½lï¿½Hï¿½Uï¿½ï¿½ï¿½_1ï¿½cï¿½ï¿½ï¿½ï¿½gï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Dï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½<ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Ïž<ï¿½ï¿½ï¿½ï¿½2:sï¿½ï¿½Oï¿½ï¿½(Ôœonï¿½?o1W#ï¿½ï¿½1Þ¹ï¿½Hï¿½ï¿½ï¿½Õ´ï¿½ï¿½oï¿½l+ï¿½Ä£>nï¿½\']ï¿½ï¿½@ï¿½ï¿½Rï¿½}Nï¿½ï¿½ ï¿½bï¿½Ö¯ÍˆÑ–ï¿½ä™¶ï¿½ï¿½Tl\0hï¿½tï¿½owSï¿½#YSï¿½rï¿½ï¿½R`ï¿½e:ï¿½ï¿½cï¿½ï¿½kK{~ï¿½kj)#ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½?}~~vï¿½ï¿½&gLï¿½ï¿½ï¿½Õ†ï¿½ï¿½}ï¿½?ï¿½PK*jï¿½ï¿½\0\04T\0\0PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0docProps/app.xmlï¿½ï¿½QKï¿½0ï¿½ï¿½ï¿½%ï¿½ï¿½&ï¿½Öºï¿½ï¿½Cï¿½ï¿½	Vï¿½[ï¿½Inï¿½Hï¿½ï¿½$ï¿½ï¿½ï¿½Üž}<ï¿½ï¿½wï¿½=ï¿½ï¿½4ï¿½ï¿½}ï¿½Ö´ï¿½ï¿½ï¿½ï¿½+ï¿½Ù·ï¿½ï¿½ï¿½-I\"	ï¿½5Ø’3ï¿½ï¿½nï¿½oï¿½ï¿½1dï¿½`BK1ï¿½5ï¿½Apï¿½ï¿½\'ï¿½$GY?ALï¿½ï¿½ï¿½UJ|ï¿½ï¿½sBiï¿½XMï¿½ï¿½Hï¿½3ï¿½$ï¿½ï¿½ï¿½1ï¿½*ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Kï¿½ï¿½ï¿½mï¿½ï¿½ï¿½vï¿½ï¿½ï¿½ï¿½;7j1=ï¿½=iï¿½qï¿½Cï¿½Uï¿½ï¿½2/oï¿½Al_wï¿½nYï¿½\"ï¿½ï¿½Rï¿½ï¿½_a	ï¿½B(ï¿½Pï¿½9ï¿½ï¿½nï¿½ï¿½ï¿½ï¿½[q%+ï¿½sHï¿½ï¿½Y\rï¿½ï¿½ï¿½}PKï¿½ï¿½\0+ï¿½\0\0\0ï¿½\0\0PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0docProps/core.xmlmï¿½AOï¿½ ï¿½ï¿½~ï¿½ï¿½{lï¿½QÒ²ï¿½s\'MLï¿½ï¿½x#ï¿½ï¿½%ï¿½ï¿½ï¿½ï¿½Kï¿½Vï¿½dï¿½ï¿½ï¿½Çï¿½xï¿½ï¿½hï¿½ï¿½\0>ï¿½ï¿½Vï¿½e`eï¿½ï¿½ï¿½+ï¿½ï¿½Yï¿½(QX%ï¿½ï¿½Bï¿½NÐ’ß•ï¿½1ï¿½zxï¿½ï¿½5ï¿½,ï¿½l`ï¿½Uhï¿½cï¿½#Bï¿½ï¿½ï¿½mëˆï¿½ï¿½5vBï¿½ï¿½\Zï¿½ï¿½ï¿½{l \n%ï¿½ï¿½ï¿½0wï¿½ï¿½ï¿½Jï¿½Jï¿½ï¿½ï¿½ PClï¿½ï¿½ï¿½ï¿½	7/É„4:ï¿½ï¿½D/ï¿½Hï¿½ï¿½ï¿½ï¿½ï¿½n>ï¿½ï¿½ï¿½ï¿½^_Þ‡Qsmï¿½ï¿½ï¿½ï¿½xï¿½$kï¿½ï¿½ï¿½iJï¿½ _=ï¿½xzTï¿½e&}ï¿½Vï¿½ï¿½ï¿½ì¯ŸKï¿½9ZmÖˆï¿½]ï¿½ï¿½ï¿½ï¿½nï¿½#[,!ß½ï¿½Zï¿½ï¿½ï¿½x8ï¿½~ï¿½ï¿½ï¿½xZï¿½ï¿½ï¿½ï¿½/PK$ï¿½ï¿½\0\0ï¿½\0\0PK\0\0*ï¿½KG\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0[Content_Types].xmlï¿½ï¿½AOï¿½0ï¿½ï¿½ï¿½ï¿½WEï¿½`ï¿½ï¿½ï¿½Mm?ï¿½Ú¦_ï¿½Û¿ï¿½+nÄ¨ï¿½M/$ï¿½ï¿½ï¿½>OiCï¿½ï¿½}ï¿½ï¿½Úšï¿½ï¿½g9Kï¿½Hï¿½ï¿½iKï¿½Pß¦WlY-ï¿½zï¿½\0ï¿½5Xï¿½.wï¿½9ï¿½ï¿½ï¿½u`hï¿½ï¿½~ï¿½^}Ëï¿½Ï¢~ï¿½ï¿½ï¿½\\Zï¿½ï¿½4ï¿½Vï¿½ï¿½ï¿½ZAï¿½>Ü‰Jï¿½=ï¿½È³ï¿½dï¿½ï¿½{ 2K&ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Ú¨Oï¿½tGï¿½ï¿½q;ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½jï¿½ï¿½á”•/ï¿½2\Zï¿½7tCï¿½Z<ï¿½ï¿½?Ú¦ï¿½&ï¿½Xç¼•ï¿½Hï¿½E[ï¿½ï¿½g%Bï¿½ï¿½ï¿½aï¿½<ï¿½ï¿½=ï¿½ï¿½ï¿½ï¿½;ï¿½ï¿½xï¿½ï¿½ï¿½Vï¿½ï¿½!\Z\\yï¿½ï¿½ï¿½h\rï¿½PRï¿½Jï¿½Åï¿½ï¿½7ï¿½ï¿½ï¿½ï¿½_ï¿½ï¿½ï¿½Õï¿½ï¿½ï¿½Eï¿½ï¿½ï¿½Eï¿½PK$.ï¿½G)\0\0^\0\0PK\0\0\0*ï¿½KGï¿½ï¿½#ï¿½\0\0\0=\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0_rels/.relsPK\0\0\0*ï¿½KGï¿½/0ï¿½ï¿½\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0word/_rels/document.xml.relsPK\0\0\0*ï¿½KGÚªï¿½;$\0\0ï¿½\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0!\0\0word/fontTable.xmlPK\0\0\0*ï¿½KGï¿½ï¿½jï¿½\0\0\0:\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ï¿½\0\0word/settings.xmlPK\0\0\0*ï¿½KGtï¿½+Hï¿½\0\0ï¿½\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ï¿½\0\0word/styles.xmlPK\0\0\0*ï¿½KG*jï¿½ï¿½\0\04T\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0f\0\0word/document.xmlPK\0\0\0*ï¿½KGï¿½ï¿½\0+ï¿½\0\0\0ï¿½\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ï¿½!\0\0docProps/app.xmlPK\0\0\0*ï¿½KG$ï¿½ï¿½\0\0ï¿½\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ï¿½\"\0\0docProps/core.xmlPK\0\0\0*ï¿½KG$.ï¿½G)\0\0^\0\0\0\0\0\0\0\0\0\0\0\0\0\0\01$\0\0[Content_Types].xmlPK\0\0\0\0	\0	\0<\0\0ï¿½%\0\0\0\0'),
	(130,2,1,'sumo','http://google.de/','db','test url','sumo','2015-10-11 00:00:00','2015-10-12 09:47:45',''),
	(131,2,NULL,'vsd','none','db','Connection Types','vsd','2015-10-19 17:06:51','2015-10-19 17:06:51','');

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
	(1,'Sumo Paint',NULL,NULL,'https://www.sumopaint.com/home/','/img/tools/sumo.png','<h2>Sumo Paint</h2>\n              <ul>\n                <li>Zeichnen</li>\n              </ul>',NULL,0),
	(2,'Slides',NULL,NULL,'https://slides.com/mulian','','<h2>slides</h2>\r\n              <ul>\r\n                <li>Erstelle Slides</li>\r\n              </ul>',NULL,0),
	(3,'Marvel App','-','-','http://marvelapp.com','/img/tools/marvelapp.jpg','<h2>Marvelapp.com</h2>\n              <ul>\n                <li>Website-Prototyp</li>\n                <li>Lade deine Prototypen hoch, und bearbeite sie</li>\n              </ul>',NULL,0),
	(4,'Wolfram Alpha',NULL,NULL,'http://wolframalpha.com','/img/tools/wolframalpha.png','<h2>WolframAlpha</h2>               <ul>                 <li>Rechen- und Wissensanwendung</li>                 <li>Loest mathematische Probleme.</li>               </ul>',NULL,0),
	(5,'Presenter ProWise','-','-','http://www.prowise.com/presenter/start','/img/tools/prowise.jpg','<h2>ProWise Presenter</h2>\n              <ul>\n                <li>Scratchbook f?r Notizen, Ideensammlungen</li>\n                <li>Schnelles bearbeiten von Fotos und Grafiken</li>\n              </ul>',NULL,0),
	(6,'Irfan View',NULL,NULL,'IrfanView:','/img/tools/irfan_view.png','<h2>IrfanView</h2>               <ul>                 <li>Schnelles Bearbeiten von Fotos und Grafiken</li>               </ul>',NULL,1),
	(7,'Wikipedia',NULL,NULL,'http://de.wikipedia.org/wiki/Wikipedia:Hauptseite','/img/tools/wikipedia.jpg','<h2>Wikipedia</h2>',NULL,0),
	(8,'Taschenrechner',NULL,NULL,'calc:','/img/tools/calc.png','<h2>Windows Taschenrechner</h2>               <ul>                 <li>Taschenrechner Funktion</li>               </ul>',NULL,1),
	(9,'Skype',NULL,NULL,'Skype:','/img/tools/skype.png','<h2>Skype</h2>               <ul>                 <li>Ermoeglicht Video- und Telefonkonferenzen</li>               </ul>',NULL,1),
	(10,'Photoshop',NULL,NULL,'fb292065597989:','/img/tools/photoshop.png','<h2>Photoshop</h2>',NULL,1),
	(11,'Adobe Reader',NULL,NULL,'adobe:','/img/tools/adobe_reader.png','<h2>Adobe Reader</h2>',NULL,1),
	(12,'Visio',NULL,NULL,'visio:','/img/tools/visio.jpg','<h2>Visio</h2>\r\n              <ul>\r\n                <li>Erstellen von Diagrammen mit passenden Werkzeugen und Vorlagen</li>\r\n                <li>Technische Zeichnungen, UML...</li>\r\n              </ul>',NULL,1);

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
	(2,'8d63603cf652db7ab8c6fa46b4550187','f03c90375194173d89d5ab052942b462','files/e9f444a4f4e77e40f11db44b1caa2273','admin','y0054496@tu-bs.de');

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
