-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `im_advertises`;
CREATE TABLE `im_advertises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `space_uid` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `css` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `js` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `size` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `im_articles`;
CREATE TABLE `im_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_id` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `posted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `permalink` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `marker` tinyint(1) NOT NULL,
  `draft` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `im_categories`;
CREATE TABLE `im_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `im_fragments`;
CREATE TABLE `im_fragments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `css` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `js` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_fragments` (`id`, `uid`, `description`, `html`, `css`, `js`, `created_at`, `updated_at`) VALUES
(5,	'home.slider.d',	'Slider del home',	'<div class=\"box\">\r\n  \r\n		<div id=\"slider\">\r\n			<a href=\"#\"><img src=\"%asset%/home/img/sld-1.png\"/></a>\r\n			<a href=\"#\"><img src=\"%asset%/home/img/sld-2.png\"/></a>\r\n			<a href=\"#\"><img src=\"%asset%/home/img/sld-3.png\"/></a>\r\n			<a href=\"#\"><img src=\"%asset%/home/img/sld-4.png\"/></a>\r\n			<a href=\"#\"><img src=\"%asset%/home/img/sld-5.png\"/></a>\r\n		</div>\r\n  \r\n</div>\r\n',	'#slider {\r\n}\r\n\r\n#slider .box {\r\n  width: 100%;\r\n  width: 100vw;\r\n  margin: auto;\r\n  overflow: hidden;\r\n}\r\n\r\n#slider img {\r\n  display: block;\r\n}',	'$(function () {\r\n 	$(\'#slider\').vmcSlider({\r\n		width: 600,\r\n		height: 450,\r\n		gridCol: 10,\r\n		gridRow: 5,\r\n		gridVertical: 20,\r\n		gridHorizontal: 10,\r\n		autoPlay: true,\r\n		ascending: true,\r\n		effects: [\r\n			\'fade\', \'fadeLeft\', \'fadeRight\', \'fadeTop\', \'fadeBottom\', \'fadeTopLeft\', \'fadeBottomRight\',\r\n			\'blindsLeft\', \'blindsRight\', \'blindsTop\', \'blindsBottom\', \'blindsTopLeft\', \'blindsBottomRight\',\r\n			\'curtainLeft\', \'curtainRight\', \'interlaceLeft\', \'interlaceRight\', \'mosaic\', \'bomb\', \'fumes\'\r\n		],\r\n		ie6Tidy: false,\r\n		random: true,\r\n		duration: 2000,\r\n		speed: 900\r\n	});\r\n});',	'2015-11-06 10:14:40',	'2015-11-06 10:12:34'),
(6,	'home.frames',	'La sección del árbol',	'<div class=\"box\">\r\n  <img id=\"frames_frames\" src=\"%asset%/home/img/img-frames.png\" />\r\n  <img id=\"frames_tree\" src=\"%asset%/home/img/img-tree.png\" />\r\n</div>',	'#frames {\r\n  background-color: #cadae6;\r\n  background-image: url(\'%asset%/home/img/bg-wall.png\');\r\n  background-size: cover;\r\n  background-position: center;\r\n  background-attachment: fixed;\r\n}\r\n\r\n#frames .box {\r\n  width: 100%;\r\n  width: 100vw;\r\n  margin: auto;\r\n  overflow: hidden;\r\n}\r\n\r\n#frames img {\r\n  display: block;\r\n  width: 100%;\r\n  width: 100vw;\r\n}\r\n\r\n#frames_frames {\r\n  position: absolute;\r\n}',	'',	'2015-11-06 09:04:08',	'2015-11-06 09:04:08'),
(7,	'home.mission',	'Nuestra misión',	'<div class=\"box\">\r\n  <h1>Our Mission</h1>\r\n  <h2>Quality – Value</h2>\r\n  <p>High Quality – Fashionable Product... for today\'s “Value Conscious Customer”\r\n	We are offering the Quality not available in the Mass Market at the same affordable pricing.\r\n	Quality related to all levels of Customer Sophistication and Income Levels. Bottom Line... \r\n	<b>We take pride in supplying our valued customers</b></p>\r\n  <img src=\"%asset%/home/img/text-mission.png\" />\r\n</div>',	'#mission {\r\n  background-color: #cadae6;\r\n  background-image: url(\'%asset%/home/img/bg-mission.png\');\r\n  background-size: cover;\r\n  background-position: center;\r\n  background-attachment: fixed;\r\n}\r\n\r\n#mission .box {\r\n  min-height: 400px;\r\n  height: 100vh;\r\n  width: 100%;\r\n  width: 100vw;\r\n  margin: auto;\r\n  display: table-cell;\r\n  text-align: center;\r\n  vertical-align: middle;\r\n  overlfow: hidden;\r\n}\r\n\r\n#mission h1, #mission h2, #mission p {\r\n  display: none;\r\n}\r\n\r\n#mission img {\r\n  display: block;\r\n  width: 90%;\r\n  margin: auto;\r\n  max-width: 960px;\r\n}',	'$(document).ready(function () {\r\n  var controller = $.superscrollorama();\r\n  controller.addTween(\'#mission img\',\r\n	  TweenMax.from( $(\'#mission img\'), \r\n		  .25, {\r\n			  css: {\r\n			  	right: \'1000px\'\r\n			  },\r\n			  ease:Quad.easeInOut\r\n		  }\r\n	  )\r\n  );\r\n});',	'2015-11-14 09:10:29',	'2015-11-14 09:10:29'),
(8,	'home.getstarting',	'Let\'s Get Started',	'<div class=\"box\">\r\n  <h1>Let\'s Get Started!</h1>\r\n  <img src=\"%asset%/home/img/text-getstarting.png\" />\r\n</div>',	'#getstarting {\r\n  background-color: #cadae6;\r\n  background-image: url(\'%asset%/home/img/bg-getstarting.png\');\r\n  background-size: cover;\r\n  background-position: center;\r\n  background-attachment: fixed;\r\n}\r\n\r\n#getstarting .box {\r\n  min-height: 400px;\r\n  height: 100vh;\r\n  width: 100%;\r\n  width: 100vw;\r\n  margin: auto;\r\n  display: table-cell;\r\n  text-align: center;\r\n  vertical-align: middle;\r\n  overlfow: hidden;\r\n}\r\n\r\n#getstarting h1 {\r\n  display: none;\r\n}\r\n\r\n#getstarting img {\r\n  display: block;\r\n  width: 90%;\r\n  margin: auto;\r\n  max-width: 960px;\r\n}',	'$(document).ready(function () {\r\n  var controller = $.superscrollorama();\r\n  controller.addTween(\'#getstarting img\',\r\n	  TweenMax.from( $(\'#getstarting img\'), \r\n		  .25, {\r\n			  css: {\r\n			  	left: \'1000px\'\r\n			  },\r\n			  ease:Quad.easeInOut\r\n		  }\r\n	  )\r\n  );\r\n});',	'2015-11-14 09:10:45',	'2015-11-14 09:10:45'),
(9,	'home.slider',	'Slider del home, Slitslider',	'<div class=\"box\">\r\n	<div id=\"slider\" class=\"sl-slider-wrapper\">\r\n		<div class=\"sl-slider\">\r\n			<div class=\"sl-slide\" data-orientation=\"horizontal\" data-slice1-rotation=\"-25\" data-slice2-rotation=\"-25\" data-slice1-scale=\"2\" data-slice2-scale=\"2\">\r\n				<div class=\"sl-slide-inner\" style=\"background-image: url(\'%asset%/home/img/sld-1.png\');\"></div>\r\n			</div>\r\n			<div class=\"sl-slide\" data-orientation=\"vertical\" data-slice1-rotation=\"10\" data-slice2-rotation=\"-15\" data-slice1-scale=\"1.5\" data-slice2-scale=\"1.5\">\r\n				<div class=\"sl-slide-inner\" style=\"background-image: url(\'%asset%/home/img/sld-2.png\');\"></div>\r\n			</div>\r\n			<div class=\"sl-slide\" data-orientation=\"horizontal\" data-slice1-rotation=\"3\" data-slice2-rotation=\"3\" data-slice1-scale=\"2\" data-slice2-scale=\"1\">\r\n				<div class=\"sl-slide-inner\" style=\"background-image: url(\'%asset%/home/img/sld-3.png\');\"></div>\r\n			</div>\r\n			<div class=\"sl-slide\" data-orientation=\"vertical\" data-slice1-rotation=\"-5\" data-slice2-rotation=\"25\" data-slice1-scale=\"2\" data-slice2-scale=\"1\">\r\n				<div class=\"sl-slide-inner\" style=\"background-image: url(\'%asset%/home/img/sld-4.png\');\"></div>\r\n			</div>\r\n			<div class=\"sl-slide\" data-orientation=\"horizontal\" data-slice1-rotation=\"-5\" data-slice2-rotation=\"10\" data-slice1-scale=\"2\" data-slice2-scale=\"1\">\r\n				<div class=\"sl-slide-inner\" style=\"background-image: url(\'%asset%/home/img/sld-5.png\');\"></div>\r\n			</div>\r\n		</div>\r\n	  				\r\n		<nav id=\"nav-arrows\" class=\"nav-arrows\">\r\n			<span class=\"nav-arrow-prev\">\r\n			  <i class=\"fa fa-arrow-circle-left\"></i>\r\n			</span>\r\n			<span class=\"nav-arrow-next\">\r\n			  <i class=\"fa fa-arrow-circle-right\"></i>\r\n			</span>\r\n		</nav>\r\n	</div>\r\n</div>\r\n',	'.sl-slider-wrapper {\r\n    background: #444;\r\n	width: 100%;\r\n	width: 100vw;\r\n	height: 100%;\r\n	height: 90vh;\r\n	margin: 0 auto;\r\n	position: relative;\r\n	overflow: hidden;\r\n}\r\n\r\n.sl-slider {\r\n	position: absolute;\r\n	top: 0;\r\n	left: 0;\r\n}\r\n\r\n/* Slide wrapper and slides */\r\n\r\n.sl-slide,\r\n.sl-slides-wrapper,\r\n.sl-slide-inner {\r\n	position: absolute;\r\n	width: 100%;\r\n	height: 100%;\r\n	top: 0;\r\n	left: 0;\r\n} \r\n\r\n.sl-slide {\r\n	z-index: 1;\r\n}\r\n\r\n/* The duplicate parts/slices */\r\n\r\n.sl-content-slice {\r\n	overflow: hidden;\r\n	position: absolute;\r\n	-webkit-box-sizing: content-box;\r\n	-moz-box-sizing: content-box;\r\n	box-sizing: content-box;\r\n	background: #fff;\r\n	-webkit-backface-visibility: hidden;\r\n	-moz-backface-visibility: hidden;\r\n	-o-backface-visibility: hidden;\r\n	-ms-backface-visibility: hidden;\r\n	backface-visibility: hidden;\r\n	opacity : 1;\r\n}\r\n\r\n/* Horizontal slice */\r\n\r\n.sl-slide-horizontal .sl-content-slice {\r\n	width: 100%;\r\n	height: 50%;\r\n	left: -200px;\r\n	-webkit-transform: translateY(0%) scale(1);\r\n	-moz-transform: translateY(0%) scale(1);\r\n	-o-transform: translateY(0%) scale(1);\r\n	-ms-transform: translateY(0%) scale(1);\r\n	transform: translateY(0%) scale(1);\r\n}\r\n\r\n.sl-slide-horizontal .sl-content-slice:first-child {\r\n	top: -200px;\r\n	padding: 200px 200px 0px 200px;\r\n}\r\n\r\n.sl-slide-horizontal .sl-content-slice:nth-child(2) {\r\n	top: 50%;\r\n	padding: 0px 200px 200px 200px;\r\n}\r\n\r\n/* Vertical slice */\r\n\r\n.sl-slide-vertical .sl-content-slice {\r\n	width: 50%;\r\n	height: 100%;\r\n	top: -200px;\r\n	-webkit-transform: translateX(0%) scale(1);\r\n	-moz-transform: translateX(0%) scale(1);\r\n	-o-transform: translateX(0%) scale(1);\r\n	-ms-transform: translateX(0%) scale(1);\r\n	transform: translateX(0%) scale(1);\r\n}\r\n\r\n.sl-slide-vertical .sl-content-slice:first-child {\r\n	left: -200px;\r\n	padding: 200px 0px 200px 200px;\r\n}\r\n\r\n.sl-slide-vertical .sl-content-slice:nth-child(2) {\r\n	left: 50%;\r\n	padding: 200px 200px 200px 0px;\r\n}\r\n\r\n/* Content wrapper */\r\n/* Width and height is set dynamically */\r\n.sl-content-wrapper {\r\n	position: absolute;\r\n}\r\n\r\n.sl-content {\r\n	width: 100%;\r\n	height: 100%;\r\n	background: #fff;\r\n}\r\n\r\n/* Default styles for background colors */\r\n.sl-slide-horizontal .sl-slide-inner {\r\n	background: #ddd;\r\n}\r\n\r\n.sl-slide-vertical .sl-slide-inner {\r\n	background: #ccc;\r\n}\r\n.sl-slide-inner {\r\n  background-position: center;\r\n  background-size: cover !important;\r\n}\r\n\r\n/* Custom */\r\n\r\n\r\n.nav-arrows span {\r\n	position: absolute;\r\n	z-index: 99;\r\n	top: 50%;\r\n    display: block;\r\n	margin-top: -1em;\r\n	cursor: pointer;\r\n}\r\n\r\n.nav-arrows span {\r\n  color: rgba(255,255,255,.7);\r\n  font-size: 4em;\r\n}\r\n\r\n.nav-arrows span:hover {\r\n	color: rgba(255,255,255,0.9);\r\n}\r\n\r\n.nav-arrows span.nav-arrow-prev {\r\n	left: 5%;\r\n}\r\n\r\n.nav-arrows span.nav-arrow-next {\r\n	right: 5%;\r\n}',	'$(function () {\r\n	var Page = (function() {\r\n		var $navArrows = $(\'#nav-arrows\'),\r\n			slitslider = $(\'#slider\').slitslider(),\r\n			init = function() {\r\n				initEvents();\r\n			},\r\n			initEvents = function () {\r\n				$navArrows.children(\':last\').on(\'click\', function () {\r\n					slitslider.next(); return false;\r\n				});\r\n				$navArrows.children(\':first\').on(\'click\', function () {\r\n					slitslider.previous(); return false;\r\n				});\r\n				var sliderauto = setInterval(function () {\r\n					slitslider.next();\r\n				}, 5000);\r\n			};\r\n		return { init : init };\r\n	})();\r\n	Page.init();\r\n});',	'2015-11-06 10:28:15',	'2015-11-06 10:28:15');

DROP TABLE IF EXISTS `im_pages`;
CREATE TABLE `im_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `css` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `js` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '1',
  `route` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth` int(11) NOT NULL DEFAULT '0',
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listed` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_pages` (`id`, `uid`, `title`, `description`, `keywords`, `header`, `content`, `footer`, `css`, `js`, `created_at`, `updated_at`, `status`, `route`, `template`, `auth`, `users`, `listed`) VALUES
(1,	'soon',	'Volveremos pronto',	'',	'',	'Página en construcción',	'Estamos trabajando para mejorar, volveremos pronto!',	'',	'',	'',	'2015-10-11 18:52:58',	'2015-10-11 17:52:58',	1,	'soon',	'',	0,	'',	0),
(2,	'maintenance',	'Página en mantenimiento',	'',	'',	'Lo sentimos, estamos bajo mantenimiento.',	'Volveremos dentro de muy poco.',	'',	'',	'',	'2015-09-14 04:23:02',	'2015-09-14 03:23:02',	1,	'maintenance',	'',	0,	'',	0),
(3,	'e404',	'404 - Página no encontrada',	'',	'',	'',	'Lo sentimos pero la página que estás buscando no pudo ser encontrada...',	'',	'',	'',	'2015-09-14 01:30:48',	'0000-00-00 00:00:00',	1,	'404',	'',	0,	'',	0),
(4,	'e500',	'500 - Ha ocurrido un error',	'',	'',	'',	'Lo sentimos pero ha ocurrido un error interno en nuestro servidor...',	'',	'',	'',	'2015-09-14 01:52:18',	'0000-00-00 00:00:00',	1,	'500',	'',	0,	'',	0);

DROP TABLE IF EXISTS `im_pictures`;
CREATE TABLE `im_pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `md5` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `exif` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_pictures` (`id`, `uid`, `md5`, `content_type`, `width`, `height`, `url`, `created_at`, `updated_at`, `exif`, `group`) VALUES
(0,	'avatar',	'3d50e83f7586325304f88584f699ad33',	'image/png',	147,	147,	'3d50e83f7586325304f88584f699ad33.png',	'2015-09-09 18:33:15',	'2015-09-09 18:33:15',	'null',	'UserProfile'),
(1,	'55f632283dfe8',	'2cb8bdf02fe62b3d548c865606c1ffde',	'image/jpeg',	1920,	1280,	'2cb8bdf02fe62b3d548c865606c1ffde.jpg',	'2015-09-14 01:34:17',	'2015-09-14 01:34:17',	'{\"FileName\":\"2cb8bdf02fe62b3d548c865606c1ffde.jpg\",\"FileDateTime\":1442198056,\"FileSize\":342745,\"FileType\":2,\"MimeType\":\"image\\/jpeg\",\"SectionsFound\":\"\",\"COMPUTED\":{\"html\":\"width=\\\"1920\\\" height=\\\"1280\\\"\",\"Height\":1280,\"Width\":1920,\"IsColor\":1}}',	'Cover'),
(27,	'563037535d936',	'2018fcb4710b2e4eaf50781af53bf002',	'image/jpeg',	250,	250,	'2018fcb4710b2e4eaf50781af53bf002.jpg',	'2015-10-28 02:47:47',	'2015-10-28 02:47:47',	'{\"FileName\":\"2018fcb4710b2e4eaf50781af53bf002.jpg\",\"FileDateTime\":1446000467,\"FileSize\":25981,\"FileType\":2,\"MimeType\":\"image\\/jpeg\",\"SectionsFound\":\"\",\"COMPUTED\":{\"html\":\"width=\\\"250\\\" height=\\\"250\\\"\",\"Height\":250,\"Width\":250,\"IsColor\":1}}',	'UserProfile');

DROP TABLE IF EXISTS `im_settings`;
CREATE TABLE `im_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `updatedBy`) VALUES
(1,	'page.title',	'Crystal Art Gallery',	'2015-11-06 05:26:19',	'2015-11-06 05:26:19',	'56303784af2c2'),
(2,	'page.status',	'public',	'2015-10-12 05:18:46',	'2015-10-12 05:16:45',	'561ab03c046c2'),
(3,	'social.facebook',	'https://www.facebook.com/',	'2015-11-06 05:26:58',	'2015-11-06 05:26:58',	'56303784af2c2'),
(4,	'social.twitter',	'https://twitter.com/',	'2015-11-06 05:26:58',	'2015-11-06 05:26:58',	'56303784af2c2'),
(5,	'social.instagram',	'https://instagram.com/',	'2015-11-06 05:26:58',	'2015-11-06 05:26:58',	'56303784af2c2'),
(6,	'social.youtube',	'http://mx.linkedin.com/in/',	'2015-11-06 05:26:58',	'2015-11-06 05:26:58',	'56303784af2c2'),
(7,	'contact.email',	'sales@crystalartgallery.com',	'2015-11-06 05:27:20',	'2015-11-06 05:27:20',	'56303784af2c2'),
(8,	'third.google.analytics',	'UA-XXXXXXXX-X',	'2015-11-06 05:27:28',	'2015-11-06 05:27:28',	'56303784af2c2'),
(9,	'route.permalink',	'permalink',	'2015-10-18 20:13:36',	'2015-10-18 20:11:10',	'561ab03c046c2'),
(10,	'social.github',	'http://github.com/',	'2015-11-06 05:26:58',	'2015-11-06 05:26:58',	'56303784af2c2'),
(11,	'social.linkedin',	'http://mx.linkedin.com/in/',	'2015-11-06 05:26:58',	'2015-11-06 05:26:58',	'56303784af2c2'),
(12,	'contact.email.sales',	'sales@crystalartgallery.com',	'2015-11-06 05:49:05',	'2015-11-06 05:49:05',	'56303784af2c2'),
(13,	'contact.email.support',	'custserv@crystalartgallery.com',	'2015-11-06 05:49:05',	'2015-11-06 05:49:05',	'56303784af2c2');

DROP TABLE IF EXISTS `im_spaces_ads`;
CREATE TABLE `im_spaces_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `advertise_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_spaces_ads` (`id`, `uid`, `description`, `size`, `created_at`, `updated_at`, `status`, `visible`, `advertise_uid`) VALUES
(1,	'main.top.large',	'Página general, arriba tamaño largo',	'728x90',	'2015-10-28 02:41:22',	'2015-10-20 16:40:26',	0,	1,	''),
(2,	'main.bottom.large',	'Página general, abajo tamaño largo',	'728x90',	'2015-10-20 16:40:18',	'2015-10-20 16:14:48',	0,	1,	''),
(3,	'sidebar.right.square',	'Sidebar, derecha cuadrado',	'300x250',	'2015-10-16 02:09:12',	'0000-00-00 00:00:00',	0,	1,	''),
(4,	'note.bottom.medium',	'Sidebar, derecha cuadrado',	'728x90',	'2015-10-20 16:34:44',	'2015-10-20 16:34:44',	0,	1,	''),
(5,	'footer.left.small',	'Pie de página, izquierda pequeño',	'240x180',	'2015-10-19 16:33:54',	'0000-00-00 00:00:00',	0,	1,	''),
(6,	'footer.right.small',	'Pie de página, derecha pequeño',	'240x180',	'2015-10-19 16:33:30',	'0000-00-00 00:00:00',	0,	1,	'');

DROP TABLE IF EXISTS `im_subscribers`;
CREATE TABLE `im_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL,
  `recieve_newsletter` tinyint(1) NOT NULL DEFAULT '1',
  `recieve_promo` tinyint(1) NOT NULL DEFAULT '1',
  `recieve_updates` tinyint(1) NOT NULL DEFAULT '1',
  `recieve_alerts` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_subscribers` (`id`, `uid`, `name`, `email`, `created_at`, `updated_at`, `status`, `recieve_newsletter`, `recieve_promo`, `recieve_updates`, `recieve_alerts`, `token`) VALUES
(1,	'5639af6339189',	'Daniel García',	'im@danielgarcia.me',	'2015-11-04 07:10:27',	'2015-11-04 07:10:27',	0,	1,	1,	1,	1,	'');

DROP TABLE IF EXISTS `im_tags`;
CREATE TABLE `im_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `articles` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `im_users`;
CREATE TABLE `im_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_users` (`id`, `uid`, `username`, `password`, `name`, `email`, `avatar`, `bio`, `created_at`, `updated_at`, `remember_token`, `permission`) VALUES
(1,	'56303784af2c2',	'dannegm',	'$2y$10$9FBrRRsyq6b5NQveylWDFOto3iK0KrulbVGwvtN8FL2QPjd/YcPYK',	'Daniel García',	'im@danielgarcia.me',	'563037535d936',	'',	'2015-10-28 02:48:37',	'2015-10-28 02:48:37',	'',	'{\"users\":{\"create\":true,\"edit\":true,\"delete\":true},\"notes\":{\"create\":true,\"edit\":true,\"delete\":true},\"categories\":{\"create\":true,\"edit\":true,\"delete\":true}}'),
(2,	'563c349322c53',	'admin',	'$2y$10$DtJvBYiZjT48pISWaHABn.am/OKFEG3Yehl1D4484w..z019crqru',	'Administrador',	'admin@crystalartgallery.com',	'avatar',	'',	'2015-11-06 05:03:15',	'2015-11-06 05:03:15',	'',	'{\"users\":{\"create\":true,\"edit\":true,\"delete\":true},\"notes\":{\"create\":true,\"edit\":true,\"delete\":true},\"categories\":{\"create\":true,\"edit\":true,\"delete\":true}}');

-- 2015-11-14 09:13:44
