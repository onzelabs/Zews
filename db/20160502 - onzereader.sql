-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-05-2016 a las 15:45:13
-- Versión del servidor: 5.1.46
-- Versión de PHP: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `onzereader`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bot`
--

CREATE TABLE IF NOT EXISTS `bot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `state` int(2) NOT NULL,
  `starts` datetime NOT NULL,
  `ends` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `bot`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bot_source`
--

CREATE TABLE IF NOT EXISTS `bot_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bot_ix` int(11) NOT NULL,
  `source_ix` int(11) NOT NULL,
  `source_type` varchar(50) NOT NULL,
  `state` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `bot_source`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `category`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tracker_ix` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_feed` varchar(50) NOT NULL,
  `category_ix` int(11) DEFAULT NULL,
  `title` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `pubdate` varchar(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `image_title` varchar(500) NOT NULL,
  `image_link` varbinary(5000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `feed`
--

INSERT INTO `feed` (`id`, `tracker_ix`, `name`, `category_feed`, `category_ix`, `title`, `link`, `description`, `pubdate`, `category`, `image_url`, `image_title`, `image_link`, `created_at`, `updated_at`) VALUES
(1, 1, 'El Pais', '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 10, NULL, '', NULL, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feed_category`
--

CREATE TABLE IF NOT EXISTS `feed_category` (
  `feed_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `feed_category`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feed_ix` int(11) NOT NULL,
  `logger_ix` int(11) NOT NULL,
  `element` varchar(500) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL,
  `guid` varchar(250) DEFAULT NULL,
  `pubdate` varchar(50) DEFAULT NULL,
  `source` varchar(500) DEFAULT NULL,
  `content` longblob,
  `state` int(2) NOT NULL COMMENT '0 loaded - 1 checked - 2 - analyzed - 99 duplicate',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6458 ;

--
-- Volcar la base de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `feed_ix`, `logger_ix`, `element`, `title`, `link`, `description`, `author`, `comments`, `guid`, `pubdate`, `source`, `content`, `state`, `created_at`, `updated_at`) VALUES
(6457, 1, 0, '', 'Desprecio patricio', 'http://elpais.com/politica/2016/01/16/actualidad/1452973177_513788.html#?ref=rss&amp;format=simple&amp;link=link', 'Los diputados del cambio libraron una batalla cultural y la ganaron, ya nadie duda de que este es un Congreso distinto', 'Íñigo Errejón', '', 'http://elpais.com/politica/2016/01/16/actualidad/1452973177_513788.html#?ref=rss&amp;format=simple&amp;link=guid', '2016-01-16 21:10:00', NULL, 0x0a3c703e4c6120656e7472616461206465206c6f7320363920646970757461646f732064656c2063616d62696f20656e20656c20436f6e677265736f206465206c6f7320446970757461646f7320686120686563686f20636f727265722072266961637574653b6f732064652074696e74612079206465206465636c61726163696f6e657320736f627265206c617320666f726d61732c206c61732070726f636564656e636961732c206c61732076657374696d656e746173206f206c6f7320636f6e74656e69646f73206465206e756573747261732070726f6d657361732061206c6120686f7261206465206173756d697220656c20636172676f207061726120656c207175652068656d6f73207369646f20656c656769646f7320706f7220656c20707565626c6f2e204d7563686173206465206573746173207265616363696f6e65732068616e2065737461646f207072657369646964617320706f7220656c20657363266161637574653b6e64616c6f206f206c6120696e6469676e616369266f61637574653b6e206465206d69656d62726f73206465206c617320266561637574653b6c6974657320706f6c266961637574653b74696361732c2065636f6e266f61637574653b6d6963617320792063756c747572616c65732c206d616e696669657374616d656e746520636f6e747261726961646f73206f207072656f63757061646f7320706f72206c6f2071756520636f6e7369646572616e20756e20696e73756c746f206f2064657370726563696f2061206c617320666f726d6173207061726c616d656e7461726961732e20457374652064656261746520657320616c74616d656e746520696c75737472617469766f2064656c206d6f6d656e746f20706f6c266961637574653b7469636f206465207472616e73696369266f61637574653b6e20656e2045737061266e74696c64653b612e3c2f703e0a3c703e3c6120687265663d22687474703a2f2f656c706169732e636f6d2f706f6c69746963612f323031362f30312f31362f61637475616c696461642f313435323937333137375f3531333738382e68746d6c233f7265663d72737326616d703b666f726d61743d73696d706c6526616d703b6c696e6b3d736567756972223e536567756972206c6579656e646f3c2f613e2e3c2f703e0a, 2, '2016-01-16 21:42:23', NULL),
(6456, 1, 0, '', 'Los tres bomberos españoles detenidos en Lesbos, ante el juez', 'http://elpais.com/politica/2016/01/16/actualidad/1452947260_909126.html#?ref=rss&amp;format=simple&amp;link=link', 'Centenares de personas se concentran en Sevilla para pedir la liberaci&oacute;n de los voluntarios, acusados de tr&aacute;fico ilegal de personas por asistir a refugiados', 'José María Jiménez Gálvez, Belén Domínguez Cebrián', '', 'http://elpais.com/politica/2016/01/16/actualidad/1452947260_909126.html#?ref=rss&amp;format=simple&amp;link=guid', '2016-01-16 21:13:00', NULL, 0x0a3c703e4c6120766973746120636f6e747261206c6f73203c6120687265663d22687474703a2f2f706f6c69746963612e656c706169732e636f6d2f706f6c69746963612f323031362f30312f31342f61637475616c696461642f313435323739303134355f3635333933362e68746d6c223e7472657320626f6d6265726f7320736576696c6c616e6f7320646574656e69646f7320656c206a756576657320656e204c6573626f732028477265636961293c2f613e20686120617272616e6361646f20657374652073266161637574653b6261646f2c20736567267561637574653b6e20686120696e666f726d61646f206c61204f4e472050726f656d2d6169642c206465206c612071756520666f726d616e2070617274652e204c6f73207472657320616e64616c756365732c2061727265737461646f73206375616e646f206173697374266961637574653b616e2061207472657320626f7465732064652072656675676961646f732c20736520656e6375656e7472616e206163757361646f73206465207472266161637574653b6669636f20696c6567616c20646520706572736f6e61732e20446563656e617320646520766f6c756e746172696f732073652068616e20636f6e63656e747261646f2065737461206d61266e74696c64653b616e61206672656e74652061206c6f73206a757a6761646f732068656c656e6f7320706172612061706f7961722061206c6f7320616374697669737461732e20556e612063697461207175652068612074656e69646f2073752072266561637574653b706c69636120656e206c61206361706974616c2068697370616c656e73652c20646f6e6465203c6120687265663d22687474703a2f2f706f6c69746963612e656c706169732e636f6d2f706f6c69746963612f323031362f30312f31352f61637475616c696461642f313435323838303031325f3233373735362e68746d6c223e63656e74656e6172657320646520706572736f6e61732073652068616e206461646f2063697461207061726120657869676972206c61206c69626572746164206465206c6f732065737061266e74696c64653b6f6c65733c2f613e2e3c2f703e0a3c703e3c6120687265663d22687474703a2f2f656c706169732e636f6d2f706f6c69746963612f323031362f30312f31362f61637475616c696461642f313435323934373236305f3930393132362e68746d6c233f7265663d72737326616d703b666f726d61743d73696d706c6526616d703b6c696e6b3d736567756972223e536567756972206c6579656e646f3c2f613e2e3c2f703e0a, 2, '2016-01-16 21:42:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_category`
--

CREATE TABLE IF NOT EXISTS `item_category` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `item_category`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logger`
--

CREATE TABLE IF NOT EXISTS `logger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tracker_ix` int(11) NOT NULL,
  `state` int(2) NOT NULL,
  `pid` int(11) NOT NULL,
  `loaded` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `duplicated` int(11) NOT NULL,
  `analized` int(11) NOT NULL,
  `saved` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1061 ;

--
-- Volcar la base de datos para la tabla `logger`
--

INSERT INTO `logger` (`id`, `tracker_ix`, `state`, `pid`, `loaded`, `verified`, `duplicated`, `analized`, `saved`, `message`, `created_at`, `updated_at`) VALUES
(1060, 1, 3, 5328, 42, 42, 0, 42, 0, '', '2016-01-16 21:42:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tracker`
--

CREATE TABLE IF NOT EXISTS `tracker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `state` int(2) DEFAULT NULL,
  `pid` int(5) DEFAULT NULL,
  `start_at` datetime NOT NULL,
  `last_listen` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `event` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `tracker`
--

INSERT INTO `tracker` (`id`, `name`, `url`, `type`, `state`, `pid`, `start_at`, `last_listen`, `active`, `event`, `created_at`, `updated_at`) VALUES
(1, 'El Pais', 'http://elpais.com/rss/elpais/portada.xml', 'rss', 3, 5328, '2016-01-16 21:42:23', '2016-01-16 21:42:23', 1, '*/2 * * * *', '2015-12-30 15:39:15', NULL),
(2, 'El Mundo', 'http://estaticos.elmundo.es/elmundo/rss/portada.xml', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '*/3 * * * *', '2015-12-30 15:44:31', NULL),
(3, 'El Confidencial', 'http://rss.elconfidencial.com/espana/', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '*/7 * * * *', '2015-12-30 15:44:31', NULL),
(4, 'Microsiervos', 'http://www.microsiervos.com/index.xml', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '*/9 * * * *', '2015-12-30 15:45:50', NULL),
(5, 'Ciencia Kanija 2.0', 'http://feeds.feedburner.com/CienciaKanija', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '*/13 * * * *', '2015-12-30 15:45:50', NULL),
(6, 'El blog de Enrique Dans', 'http://feeds2.feedburner.com/ElBlogDeEnriqueDans', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2015-12-30 15:46:25', NULL),
(7, 'SportYou', 'http://www.sportyou.es/noticias/feed', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2015-12-30 15:46:25', NULL),
(8, 'Genbeta', 'http://feeds.weblogssl.com/genbeta', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2015-12-30 15:46:55', NULL),
(9, 'El Blog Salmón', 'http://feeds.weblogssl.com/elblogsalmon2', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2015-12-30 15:46:55', NULL),
(10, 'Xataka', 'http://feeds.weblogssl.com/xataka2', 'rss', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2015-12-30 15:47:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tracker_message`
--

CREATE TABLE IF NOT EXISTS `tracker_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tracker_ix` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `is_read` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `tracker_message`
--

INSERT INTO `tracker_message` (`id`, `tracker_ix`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 2, 'STOP', 1, '2016-01-04 21:14:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `item_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `visit`
--

