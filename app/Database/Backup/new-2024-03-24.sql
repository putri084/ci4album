/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `album_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `album_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `album` VALUES (9,'Animal','Semua Hewan',1,6,0,'2024-03-23 13:54:38','2024-03-23 13:54:38'),(10,'Modern Art','Modern Art',2,6,0,'2024-03-23 14:34:49','2024-03-23 14:34:49');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `category` VALUES (1,'Animal'),(2,'Art');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_photos_photo_id_foreign` (`photo_id`),
  KEY `comment_photos_user_id_foreign` (`user_id`),
  CONSTRAINT `comment_photos_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `comment_photos` WRITE;
/*!40000 ALTER TABLE `comment_photos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `comment_photos` VALUES (13,9,6,'cantik bngt','2024-03-23 13:56:22','2024-03-23 13:56:22'),(14,9,11,'wah indah sekali','2024-03-23 14:37:13','2024-03-23 14:37:13');
/*!40000 ALTER TABLE `comment_photos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `like_photos_photo_id_foreign` (`photo_id`),
  KEY `like_photos_user_id_foreign` (`user_id`),
  CONSTRAINT `like_photos_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `like_photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `like_photos` WRITE;
/*!40000 ALTER TABLE `like_photos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `like_photos` VALUES (33,9,6,'2024-03-23 13:56:09','2024-03-23 13:56:09');
/*!40000 ALTER TABLE `like_photos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `migrations` VALUES (1,'2024-01-28-073242','App\\Database\\Migrations\\CreateTable','default','App',1706432625,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned NOT NULL,
  `photo_name` varchar(200) NOT NULL,
  `description` text,
  `location` varchar(100) NOT NULL,
  `url_title` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_album_id_foreign` (`album_id`),
  CONSTRAINT `photos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `photos` VALUES (9,9,'Kupu kupu','Kupu kupu aesthetic','1711176956_ee4c8d39c6c8fb9e2991.jpg','kupu-kupu','2024-03-23 13:55:56','2024-03-23 13:55:56'),(10,10,'Art','Art','1711179330_e0a0073c68fee8ac98ba.jpg','art','2024-03-23 14:35:30','2024-03-23 14:35:30');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT 'default.png',
  `email` varchar(100) NOT NULL,
  `address` text,
  `role` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (6,'Aprillia Putri','april08','$2y$10$AojQXELnKmR6eFxHIE9y5.Gxk/CqaU7ghg/NLqO0DbxCO/PfoN4TK','default.png','aprilliaputri844@gmail.com','Jl. Jalan',1,'2024-03-17 14:54:07','2024-03-22 09:06:00'),(7,'Rizky','rizky123','$2y$10$C/fKkvVSS6eJpgtQghE/ruPhPn2CIPuqyj4UA97aX5QpsIRn8uLx2','default.png','rizky@gmail.com','Jl Jalan',0,'2024-03-21 09:29:59','2024-03-21 09:29:59'),(10,'Master','master07','$2y$10$Qs4wqcd.md0lRlvCduY8EOD3KOOY7ysLu5/enKmgW2qYO4pWhYqHS','default.png','master@gmail.com','Jl jamin ginting',1,'2024-03-22 10:35:36','2024-03-22 10:35:36'),(11,'aprillia','april','$2y$10$DvjFH27jIJ50610cTerceOkg2N3kYmKqS.zAiT5eJvrCA3RcL8KVm','default.png','aprilliaputri844@gmail.com','jln andansari',0,'2024-03-23 14:36:26','2024-03-23 14:36:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!50003 DROP PROCEDURE IF EXISTS `GetAlbumByCategory` */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAlbumByCategory`(IN `cat_id` INT)
BEGIN
    SELECT album.album_name, users.username, photos.photo_name, photos.description, photos.location, photos.created_at
    FROM photos
    JOIN album ON album.id = photos.album_id
    JOIN users ON users.id = album.user_id
    WHERE album.category_id = cat_id;
END ;;
DELIMITER ;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!50003 DROP PROCEDURE IF EXISTS `GetMyAlbumDetails` */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetMyAlbumDetails`(IN `session_id` INT)
BEGIN
    SELECT album.id AS id, album.album_name, users.username, users.avatar, users.fullname, users.id AS user_id
    FROM album
    JOIN users ON users.id = album.user_id
    WHERE album.user_id = session_id;
END ;;
DELIMITER ;
/*!40101 SET character_set_client = @saved_cs_client */;

CREATE TABLE IF NOT EXISTS `vw_album` (
`id` int(10) unsigned
,`album_name` varchar(100)
,`username` varchar(100)
,`avatar` varchar(200)
,`fullname` varchar(100)
,`user_id` int(10) unsigned
);
DROP TABLE IF EXISTS `vw_album`;
/*!50001 DROP VIEW IF EXISTS `vw_album`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_album` AS select `album`.`id` AS `id`,`album`.`album_name` AS `album_name`,`users`.`username` AS `username`,`users`.`avatar` AS `avatar`,`users`.`fullname` AS `fullname`,`users`.`id` AS `user_id` from (`album` join `users` on((`users`.`id` = `album`.`user_id`))) */;

/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

