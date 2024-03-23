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
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `album_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int unsigned NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `album_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `album_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `album` VALUES (7,'Sasa Album','Keren',1,6,0,'2024-03-22 10:33:12','2024-03-22 10:33:12'),(8,'Master Album','123123',1,10,0,'2024-03-22 10:36:24','2024-03-22 10:36:24');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3;
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
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_photos_photo_id_foreign` (`photo_id`),
  KEY `comment_photos_user_id_foreign` (`user_id`),
  CONSTRAINT `comment_photos_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `comment_photos` WRITE;
/*!40000 ALTER TABLE `comment_photos` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `comment_photos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_photos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `like_photos_photo_id_foreign` (`photo_id`),
  KEY `like_photos_user_id_foreign` (`user_id`),
  CONSTRAINT `like_photos_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `like_photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `like_photos` WRITE;
/*!40000 ALTER TABLE `like_photos` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `like_photos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3;
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
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int unsigned NOT NULL,
  `photo_name` varchar(200) NOT NULL,
  `description` text,
  `location` varchar(100) NOT NULL,
  `url_title` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_album_id_foreign` (`album_id`),
  CONSTRAINT `photos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `photos` VALUES (8,7,'Sasa','Sasa','1711082301_32a71dc036ce05e976cc.png','sasa','2024-03-22 11:38:21','2024-03-22 11:38:21');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT 'default.png',
  `email` varchar(100) NOT NULL,
  `address` text,
  `role` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (6,'Aprillia Putri','april08','$2y$10$AojQXELnKmR6eFxHIE9y5.Gxk/CqaU7ghg/NLqO0DbxCO/PfoN4TK','default.png','aprilliaputri844@gmail.com','Jl. Jalan',0,'2024-03-17 14:54:07','2024-03-22 09:06:00'),(7,'Rizky','rizky123','$2y$10$C/fKkvVSS6eJpgtQghE/ruPhPn2CIPuqyj4UA97aX5QpsIRn8uLx2','default.png','mrizkylubis2022@gmail.com','Jl Jalan',0,'2024-03-21 09:29:59','2024-03-21 09:29:59'),(9,'Sasa','sasa20','$2y$10$KrYPN26DHtLxkfkjJAcNreHA9gZpTHrJUIpR7JuFaFERoLUw8hCHC','default.png','sasamalik@gmail.com','Jl. Jalan',0,'2024-03-21 10:27:39','2024-03-21 10:27:39'),(10,'Master','master07','$2y$10$Qs4wqcd.md0lRlvCduY8EOD3KOOY7ysLu5/enKmgW2qYO4pWhYqHS','default.png','master@gmail.com','Jl jamin ginting',1,'2024-03-22 10:35:36','2024-03-22 10:35:36');
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
`id` int unsigned
,`album_name` varchar(100)
,`username` varchar(100)
,`avatar` varchar(200)
,`fullname` varchar(100)
,`user_id` int unsigned
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

