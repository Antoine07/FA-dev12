DROP DATABASE IF EXISTS db_student;
CREATE DATABASE db_student DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use db_student;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO posts (title) VALUES('php7'),('mysql'),('vagrant'),('docker'),('Angular2'), ('JS');