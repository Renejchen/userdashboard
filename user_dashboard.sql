-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: user_dashboard
-- ------------------------------------------------------
-- Server version	5.5.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_messages1_idx` (`message_id`),
  KEY `fk_comments_users1_idx` (`created_by`),
  CONSTRAINT `fk_comments_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (13,7,7,'Keep up the GREAT work! I am cheering for you!! ','2016-05-18 16:36:57',NULL),(14,7,7,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','2016-05-18 16:42:58',NULL),(15,7,7,'Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','2016-05-18 18:32:26',NULL),(16,11,7,'I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','2016-05-18 18:32:36',NULL),(17,8,7,'Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua\'','2016-05-18 18:32:56',NULL),(18,12,7,'Are you bored? have nothing to do?','2016-05-18 18:41:39',NULL),(19,16,6,'I meant to say Year!!','2016-05-19 09:46:16',NULL),(20,15,6,'you guys having fun?','2016-05-19 09:46:50',NULL),(21,11,8,'I\'m happy too! come to see me!','2016-05-19 18:28:32',NULL),(22,8,6,'在這裡～～～～','2016-05-19 18:30:01',NULL),(23,7,6,'ahaha~','2016-05-19 18:31:14',NULL),(24,19,6,'That was so cool~~ thank you for sharing!','2016-05-19 19:39:32',NULL),(25,14,6,'absolutely!','2016-05-19 19:40:45',NULL),(26,12,6,'boooooo','2016-05-19 19:41:11',NULL),(27,19,20,'Go Go miedie~~','2016-05-19 21:10:23',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users_idx` (`user_id`),
  KEY `fk_messages_users1_idx` (`created_by`),
  CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (7,6,19,'yo','2016-05-18 15:21:34',NULL),(8,6,19,'陳咩弟你在哪裡？','2016-05-18 15:23:28',NULL),(9,6,19,'Who Run the WORLD??','2016-05-18 16:10:00',NULL),(10,6,19,'What do you want to do for your birthday???','2016-05-18 16:13:47',NULL),(11,6,19,'Are you coming to US in December?','2016-05-18 16:15:44',NULL),(12,8,19,'I\'m the first one to leave the message!!!頭香！！！','2016-05-18 16:20:44',NULL),(13,8,19,'EVEN the very 2nd ONE!!! YAY!!','2016-05-18 16:21:24',NULL),(14,8,7,'I can leave message now. hope to read more from you in the future.','2016-05-18 18:42:05',NULL),(15,9,7,'Hey Bro, what\'s up!','2016-05-18 21:29:04',NULL),(16,7,6,'make sure you go to All Start this yeat too!','2016-05-19 09:45:58',NULL),(17,9,6,'panik no panic!','2016-05-19 09:46:37',NULL),(18,19,6,'Lord Auntie!','2016-05-19 09:47:17',NULL),(19,6,8,'Check it out Mie di!! www.mlb.com','2016-05-19 18:25:29',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `user_level` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `img` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Matthew','Chen','matthew@chen.com','123456789','Dadadadadadadadadada! woooooooo~~~~','normal','2016-05-13 17:17:37','2016-05-19 21:52:36','/uploads/IMG_06083.jpg'),(7,'Brandon','Crawford','brandon@crawford.com','123456789',NULL,'normal','2016-05-16 17:18:23','2016-05-18 19:27:43','/uploads/brandoncrawford.jpg'),(8,'Brandon','Belt','brandon@belt.com','123456789',NULL,'normal','2016-05-16 17:21:04','2016-05-19 18:19:58','/uploads/brandonbelt.jpg'),(9,'Joe','Panik','joe@panik.com','123456789',NULL,'noraml','2016-05-16 17:48:09',NULL,'/uploads/joepanik.jpg'),(19,'Rene','Chen','rene@chen.com','123456789','I was deleted. Now i\'m back again.','admin','2016-05-18 13:29:52','2016-05-18 15:13:59','/uploads/IMG_19529.jpg'),(20,'Madison','Bumganer','mad@bum.com','123456789',NULL,'noraml','2016-05-19 19:47:34','2016-05-19 21:09:39','/uploads/madbum4.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-20 15:24:45
