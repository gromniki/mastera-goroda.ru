/**
 * Karma DB installation
 */
CREATE TABLE IF NOT EXISTS `cot_karma` (
  `karma_id` int(11) NOT NULL auto_increment,
  `karma_recipient` int(11) NOT NULL default '0',
  `karma_rater` int(11) NOT NULL default '0',
  `karma_value` float NOT NULL,
  `karma_text` varchar(255) NOT NULL default '',
  `karma_fp` mediumint(8) NOT NULL default '0',
  `karma_locate` varchar(5) NOT NULL default '',
  `karma_ts`	int(11) default '0',
  `karma_al_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`karma_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=0 ;

