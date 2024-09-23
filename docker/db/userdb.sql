-- MySQL dump 10.13  Distrib 8.4.2, for Linux (x86_64)
--
-- Host: localhost    Database: userdb
-- ------------------------------------------------------
-- Server version	8.4.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent` int unsigned NOT NULL,
  `alias` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=896 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (685,'Комплектующие к Apple',0,'komplektuyushie-k-apple'),(691,'Запчасти iPad',685,'zapchasti-ipad'),(692,'Запчасти iPhone',685,'zapchasti-iphone'),(693,'Запчасти iPod',685,'zapchasti-ipod'),(694,'Запчасти Mac',685,'zapchasti-mac'),(695,'iPad',691,'ipad'),(696,'iPad 2',691,'ipad-2'),(697,'iPad NEW (iPad3)',691,'ipad-new-ipad-3'),(698,'iPad 4',691,'ipad-4'),(699,'iPad mini',691,'ipad-mini'),(700,'iPhone',692,'iphone'),(701,'iPhone 3G/3GS',692,'iphone-3g-3gs'),(702,'iPhone 4',692,'iphone-4'),(703,'iPhone 4S',692,'iphone-4s'),(704,'iPhone 5',692,'iphone-5'),(705,'Микросхемы Apple',685,'microschemy-apple'),(836,'Защитные пленки на Apple',0,'zashitnie-plenki-na-apple'),(840,'iPad',836,'ipad-840'),(841,'iPhone',836,'iphone-841'),(842,'iPod',836,'ipod'),(843,'Mac',836,'mac'),(853,'Оборудование для ремонта Apple',0,'oborudovanie-dlya-remonta-apple'),(876,'Аксессуары для Apple',0,'aksessuary-dlya-apple'),(877,'Аксессуары iPad',876,'aksesuary-ipad'),(878,'Аксессуары iPhone',876,'aksessuary-iphone'),(879,'Аксессуары iPod',876,'aksessuary-ipod'),(880,'Аксессуары Mac',876,'aksessuary-mac'),(881,'iPad',877,'ipad-881'),(882,'iPad 2',877,'ipad-2-882'),(883,'iPad NEW 3 / iPad 4',877,'ipad-new-3-ipad-4'),(884,'iPad mini',877,'ipad-mini-884'),(885,'iPhone 3G/3GS',878,'iphone-3g-3gs-885'),(886,'iPhone 4 / 4S',878,'iphone-4-4s'),(887,'iPhone 5',878,'iphone-5-887'),(888,'Аксессуары для Apple',876,'aksessuary-dlya-apple'),(895,'iPhone 5 Lamborgini',878,'iphone-5-lamborgini');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Cat 1'),(2,'Cat 2 txt'),(3,'Cat 3 text');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `base` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'ru','Русский','1'),(2,'en','English','0');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `excerpt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,2,'Adaptive design title','Adaptive design excerpt','Adaptive design text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae!','Adaptive design keywords','Adaptive design description'),(2,2,'Advise icons title','Advise icons excerpt','Advise icons text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae!','Advise icons keywords','Advise icons description'),(3,1,'Rarely selectors JQuery title','Rarely selectors JQuery excerpt','Rarely selectors JQuery text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae!','Rarely selectors JQuery keywords','Rarely selectors JQuery description'),(4,4,'Text post title','Text post excerpt','Text post text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae!','Text post keywords','Text post description'),(5,3,'SQL QUERY title','SQL QUERY excerpt','SQL QUERY text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae!','SQL QUERY keywords','SQL QUERY description'),(6,5,'html tags title','html tags excerpt','html tags text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae!','html tags keywords','html tags description'),(7,2,'PHP language title','PHP language excerpt','PHP language text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut cumque doloribus, eveniet ex fuga magnam magni nisi! Eveniet, ipsa, vitae! Cumque eaque eius, eligendi itaque porro quidem sit voluptates? Autem eius enim id iste laboriosam officiis omnis saepe vitae. Accusantium asperiores, consectetur dolorum esse expedita id maxime minima neque nobis odio placeat, vero, voluptatum. Animi deleniti doloribus inventore itaque odio, veritatis. Ad ex hic ipsa perspiciatis? Blanditiis corporis deleniti deserunt distinctio dolorem eum fugiat illum in inventore iste, laborum libero maiores minima mollitia necessitatibus nihil perspiciatis porro quidem sapiente sint tempore temporibus tenetur velit, voluptatem voluptatibus. Beatae optio quas repudiandae!','PHP language keywords','PHP language description');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user1','$2y$10$419ci7GldyXp9s6kcs5kxe9MPFR6V0FGXCFTA/VrWUyl7W/s0FiKC','ex1@example.com','MyName1','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-23 17:25:16
