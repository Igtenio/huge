CREATE TABLE IF NOT EXISTS `huge`.`logs` (
 `log_id` int(11) ZEROFILL NOT NULL AUTO_INCREMENT,
 `log_time` bigint(20) default NULL,
 `log_users` varchar(128) NOT NULL,
 `log_type` varchar(128) NOT NULL,
 `log_text` text COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='logs';
