
DROP DATABASE IF EXISTS db_game;
CREATE DATABASE db_game DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use db_game;

CREATE TABLE `monsters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `force` SMALLINT NOT NULL DEFAULT 0,
  `life` SMALLINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users`(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (username, password) VALUES ('Tony', SHA1('Tony')), ('Antoine', SHA1('Antoine'));

INSERT INTO `monsters` (name, `force`, life) VALUES ('keke', 10, 10);