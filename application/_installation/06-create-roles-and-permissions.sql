CREATE TABLE IF NOT EXISTS `huge`.`roles` (
 `role_id` int(3) NOT NULL AUTO_INCREMENT,
 `role_inherit_id` int(3) NOT NULL DEFAULT '-1',
 `role_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
 PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `huge`.`permissions` (
 `permission_id` int(11) NOT NULL AUTO_INCREMENT,
 `role_id` int(3) NOT NULL,
 `permission_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
 `permission_granted` tinyint(1) NOT NULL,
 PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;