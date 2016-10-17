/* Location selector schema */

CREATE TABLE IF NOT EXISTS `cot_ls_regions` (
  `region_id` int(11) unsigned NOT NULL auto_increment,
  `region_country` varchar(3) collate utf8_unicode_ci NOT NULL,
  `region_name` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`region_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `cot_ls_cities` (
  `city_id` int(11) unsigned NOT NULL auto_increment,
  `city_country` varchar(3) collate utf8_unicode_ci NOT NULL,
  `city_region` int(11) unsigned NOT NULL default '4481',
  `city_name` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`city_id`),
  KEY `city_region` (`city_region`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `cot_ls_cities` (`city_id`, `city_country`, `city_region`, `city_name`) VALUES
(4482,  'ru', 4481, 'Апатиты'),
(4483,  'ru', 4481, 'Африканда'),
(4484,  'ru', 4481, 'Верхнетуломский'),
(2413243, 'ru', 4481, 'Заозерск'),
(4485,  'ru', 4481, 'Заполярный'),
(4486,  'ru', 4481, 'Зареченск'),
(4487,  'ru', 4481, 'Зашеек'),
(4488,  'ru', 4481, 'Зеленоборский'),
(4489,  'ru', 4481, 'Кандалакша'),
(4490,  'ru', 4481, 'Кильдинстрой'),
(4491,  'ru', 4481, 'Кировск'),
(4492,  'ru', 4481, 'Ковдор'),
(4493,  'ru', 4481, 'Кола'),
(4494,  'ru', 4481, 'Конда'),
(4495,  'ru', 4481, 'Мончегорск'),
(4496,  'ru', 4481, 'Мурманск'),
(4497,  'ru', 4481, 'Мурмаши'),
(4498,  'ru', 4481, 'Никель'),
(4499,  'ru', 4481, 'Оленегорск'),
(5020595, 'ru', 4481, 'Полярные Зори'),
(4500,  'ru', 4481, 'Полярный'),
(4501,  'ru', 4481, 'Североморск'),
(4778470, 'ru', 4481, 'Снежногорск'),
(4502,  'ru', 4481, 'Умба');

INSERT INTO `cot_ls_regions` (`region_id`, `region_country`, `region_name`) VALUES
(4481,	'ru',	'Мурманская обл.');