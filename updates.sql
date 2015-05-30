ALTER TABLE `lessons` ADD `starts_on` DATETIME NOT NULL AFTER `duration` ;
UPDATE `lessons` SET starts_on = CONCAT(start_date, ' ', start_time);
ALTER TABLE `lessons` ADD `start_weekday` TINYINT( 2 ) UNSIGNED NOT NULL AFTER `start_date` ;
ALTER TABLE `studios` CHANGE `suburb_id` `suburb_id` INT( 11 ) UNSIGNED NULL DEFAULT NULL ;
ALTER TABLE `studios` ADD `phone` VARCHAR( 255 ) NOT NULL AFTER `descritpion` ,
ADD `website` VARCHAR( 255 ) NOT NULL AFTER `phone` ;
ALTER TABLE `studios` CHANGE `lat` `lat` DECIMAL( 11, 8 ) NULL DEFAULT NULL ,
CHANGE `lng` `lng` DECIMAL( 11, 8 ) NULL DEFAULT NULL ;
ALTER TABLE `studios` CHANGE `descritpion` `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;

ALTER TABLE `studios` ADD `email` VARCHAR( 255 ) NOT NULL AFTER `website` ,
ADD `meta_description` TEXT NOT NULL AFTER `email` ,
ADD `meta_tags` TEXT NOT NULL AFTER `meta_description` ;

ALTER TABLE `studios` CHANGE `meta_tags` `meta_keywords` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `studios` ADD `meta_title` TEXT NOT NULL AFTER `email` ;

ALTER TABLE `activities` DROP `pos` ;
RENAME TABLE `myclassfit`.`administrators` TO `myclassfit`.`admins` ;

ALTER TABLE `lessons` ADD `periodic_lesson_id` INT( 11 ) UNSIGNED NULL DEFAULT NULL AFTER `activity_id` ;
CREATE TABLE IF NOT EXISTS `periodic_lessons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studio_id` int(11) unsigned NOT NULL,
  `activity_id` smallint(5) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `slots` smallint(3) unsigned NOT NULL,
  `duration` smallint(3) unsigned NOT NULL,
  `start_time` time NOT NULL,
  `weekdays` varchar(255) NOT NULL,
  `generated_till` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `studio_id` (`studio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE `myclassfit`.`lessons` ADD INDEX ( `activity_id` ) COMMENT '';
ALTER TABLE `myclassfit`.`lessons` ADD INDEX ( `periodic_lesson_id` ) COMMENT '';
ALTER TABLE `lessons` ADD FOREIGN KEY ( `periodic_lesson_id` ) REFERENCES `myclassfit`.`periodic_lessons` (
  `id`
) ON DELETE SET NULL ON UPDATE CASCADE ;

ALTER TABLE `lessons` ADD `description` TEXT NOT NULL AFTER `title` ;
ALTER TABLE `periodic_lessons` ADD `description` TEXT NOT NULL AFTER `title` ;

ALTER TABLE `lessons` DROP `description` ;
ALTER TABLE `periodic_lessons` DROP `description` ;
ALTER TABLE `studios` ADD `classes_description` TEXT NOT NULL AFTER `description` ;

ALTER TABLE `users` CHANGE `postcode` `postcode` SMALLINT( 4 ) UNSIGNED NOT NULL ;
ALTER TABLE `users` CHANGE `postcode` `postcode` SMALLINT( 4 ) UNSIGNED NULL DEFAULT NULL ;
ALTER TABLE `users` ADD `last_login_date` DATETIME NULL DEFAULT NULL AFTER `is_active` ,
ADD `last_login_ip` VARCHAR( 15 ) NOT NULL AFTER `last_login_date` ;
ALTER TABLE `users` ADD `hash` VARCHAR( 255 ) NOT NULL AFTER `password` ;
ALTER TABLE `users` CHANGE `provider` `provider` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;

ALTER TABLE `lessons` ADD `bookings_count` SMALLINT( 5 ) UNSIGNED NOT NULL AFTER `start_time` ;

ALTER TABLE `studios` ADD `city_id` SMALLINT( 5 ) UNSIGNED NOT NULL AFTER `id` ,
ADD INDEX ( `city_id` ) ;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `state` varchar(3) NOT NULL,
  `regions` varchar(255) NOT NULL,
  `lat` decimal(11,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
INSERT INTO `cities` (`id`, `title`, `state`, `regions`, `lat`, `lng`, `created`, `modified`) VALUES
  (1, 'Sydney', 'NSW', '01,02', -33.86966014, 151.20710850, '2015-05-14 13:20:17', '2015-05-15 06:30:05'),
  (2, 'Melbourne', 'VIC', '07', -37.81770380, 144.96125221, '2015-05-15 06:25:03', '2015-05-15 06:25:03');
UPDATE `studios` AS s LEFT JOIN suburbs AS su ON su.id = s.suburb_id SET s.city_id = 1 WHERE su.state = 'NSW';
UPDATE `studios` AS s LEFT JOIN suburbs AS su ON su.id = s.suburb_id SET s.city_id = 2 WHERE su.state = 'VIC';

ALTER TABLE `users` ADD `braintree_customer_id` VARCHAR( 255 ) NOT NULL AFTER `provider_uid` ;
ALTER TABLE `users` CHANGE `name` `first_name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `users` ADD `last_name` VARCHAR( 255 ) NOT NULL AFTER `first_name` ;
DELETE FROM suburbs WHERE postcode NOT LIKE '2%' AND postcode NOT LIKE '3%';
ALTER TABLE `users` ADD `active_expires` DATETIME NULL DEFAULT NULL AFTER `is_active` ;
ALTER TABLE `users` CHANGE `is_active` `is_active` TINYINT( 1 ) UNSIGNED NOT NULL ;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` varchar(10) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  `token` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` decimal(7,2) unsigned NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `retries` tinyint(3) unsigned NOT NULL,
  `next_billing_date` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` varchar(10) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `subscription_id` varchar(10) DEFAULT NULL,
  `amount` decimal(7,2) unsigned NOT NULL,
  `success` tinyint(1) unsigned NOT NULL,
  `refunded` decimal(7,2) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `transactions`
ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `lessons` ADD `level` TINYINT( 2 ) UNSIGNED NULL DEFAULT NULL AFTER `periodic_lesson_id` ;
ALTER TABLE `periodic_lessons` ADD `level` TINYINT( 2 ) UNSIGNED NULL DEFAULT NULL AFTER `activity_id` ;

ALTER TABLE `users` ADD `referrer` VARCHAR( 255 ) NOT NULL AFTER `postcode` ;
ALTER TABLE `users` ADD `trial_used` TINYINT( 1 ) UNSIGNED NOT NULL AFTER `active_expires` ;
ALTER TABLE `subscriptions` ADD `is_trial` TINYINT( 1 ) UNSIGNED NOT NULL AFTER `is_active` ;


// Jade

