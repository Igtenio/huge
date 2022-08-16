CREATE TABLE `keyholders` (
  `keyholder_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `keyholder_primary_user_id` int(8) unsigned zerofill NOT NULL,
  `keyholder_status` tinyint(1) NOT NULL,
  `keyholder_perpetual_status` tinyint(1) NOT NULL,
  `keyholder_type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `keyholder_interval` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `keyholder_interval_count` int(11) NOT NULL,
  `keyholder_gems` int(8) NOT NULL,
  `keyholder_perpetual_gems` int(8) NOT NULL,
  PRIMARY KEY (`keyholder_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `keyholders` (`keyholder_id`, `keyholder_primary_user_id`, `keyholder_status`, `keyholder_perpetual_status`, `keyholder_type`, `keyholder_interval`, `keyholder_interval_count`, `keyholder_gems`, `keyholder_perpetual_gems`) VALUES
(00000001,	00000004,	1,	0,	'Golden',	'Monthly',	1,	7,	0);