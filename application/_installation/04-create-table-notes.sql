CREATE TABLE IF NOT EXISTS `huge`.`notes` (
 `note_id` int(11) ZEROFILL NOT NULL AUTO_INCREMENT,
 `note_time` bigint(20) default NULL,
 `note_author` int(8) NOT NULL,
 `note_subject` int(11) default NULL,
 `note_text` text COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user notes';
