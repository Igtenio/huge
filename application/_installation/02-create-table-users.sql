CREATE TABLE IF NOT EXISTS `huge`.`users` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
 `user_fname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s first name',
 `user_mname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s middle name',
 `user_lname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s last name',
 `user_phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s phone',
 `user_username` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s username, unique',
 `user_keyholder_authorized` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'authorized kh accounts',
 `user_keyholder_authorized_pending` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'pending authorized kh accounts',
  
 `user_email` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
 `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
 `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
 `user_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
 `user_role` int(3) NOT NULL DEFAULT '0' COMMENT 'user''s role',
 `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
 `session_id` varchar(48) DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
 `user_remember_me_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
 `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
 `user_suspension_timestamp` bigint(20) DEFAULT NULL COMMENT 'Timestamp till the end of a user suspension',
 `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
 `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
 `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
 `user_activation_hash` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
 `user_password_reset_hash` char(80) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
 `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
 `user_provider_type` text COLLATE utf8_unicode_ci,
 PRIMARY KEY (`user_id`),
 UNIQUE KEY `user_username` (`user_username`),
 UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

INSERT INTO `huge`.`users` (`user_id`, `session_id`, `user_username`, `user_fname`, `user_mname`, `user_lname`, `user_phone`, `user_email`, `user_password_hash`, `user_active`, `user_deleted`, `user_role`,
`user_has_avatar`, `user_remember_me_token`, `user_creation_timestamp`, `user_suspension_timestamp`, `user_last_login_timestamp`,
`user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`,
`user_password_reset_timestamp`, `user_provider_type`) VALUES
  (1, NULL, 'demo', 'Demo', 'D', 'Demoson', '123-456-7890', 'demo@demo.com', '$2y$10$OvprunjvKOOhM1h9bzMPs.vuwGIsOqZbw88rzSyGCTJTcE61g5WXi', 1, 0, 7, 0, NULL, 1422205178, NULL, 1422209189, 0, NULL, NULL, NULL, NULL, 'DEFAULT'),
  (2, NULL, 'demo2', 'Demo', 'D', 'Demoson Jr', '123-456-7890', 'demo2@demo.com', '$2y$10$OvprunjvKOOhM1h9bzMPs.vuwGIsOqZbw88rzSyGCTJTcE61g5WXi', 1, 0, 1, 0, NULL, 1422205178, NULL, 1422209189, 0, NULL, NULL, NULL, NULL, 'DEFAULT');
