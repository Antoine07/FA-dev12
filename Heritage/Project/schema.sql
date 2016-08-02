# defined schema tables

DROP DATABASE IF EXISTS `db_theater`;
CREATE DATABASE `db_theater` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use `db_theater`;

CREATE TABLE `muppets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `rate` SMALLINT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# data

INSERT INTO `muppets` (name, rate) VALUES
  ('Frozzie',  NULL ),
  ('Frozzie',  4),
  ('Frozzie',  6),
  ('Frozzie',  7),
  ('Frozzie',  8),
  ('Frozzie',  NULL ),
  ('Frozzie',  3),
  ('Frozzie',  2),
  ('Frozzie',  1),
  ('Frozzie',  8),
  ('Kermit', 5),
  ('Kermit',  6),
  ('Kermit',  8),
  ('Kermit',  NULL ),
  ('Kermit', 2),
  ('Kermit', 3),
  ('Kermit', 4),
  ('Kermit',  6),
  ('Kermit',  8),
  ('Kermit',  NULL ),
  ('Kermit', 5),
  ('Kermit', 7),
  ('Kermit', 7),
  ('Kermit',  9),
  ('Kermit',  8),
  ('Kermit',  NULL ),
  ('Kermit', 9),
  ('Kermit', 3);