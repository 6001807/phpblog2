-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.4.0-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for phpblog
CREATE DATABASE IF NOT EXISTS `phpblog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `phpblog`;

-- Dumping structure for table phpblog.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `message` text DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table phpblog.comments: ~8 rows (approximately)
DELETE FROM `comments`;
INSERT INTO `comments` (`id`, `post_id`, `name`, `message`, `created_on`) VALUES
	(33, 31, 'Admin', 'Nice weather!', '2024-05-27 09:40:11'),
	(34, 31, 'Admin', 'Beautiful landscape!', '2024-05-27 09:41:09'),
	(35, 27, 'Admin', 'Nice country', '2024-05-27 09:43:24'),
	(36, 27, 'Admin', 'Peaceful water', '2024-05-27 09:43:35'),
	(44, 32, 'Admin', 'dwegegwgrw', '2024-05-30 11:08:06'),
	(45, 32, 'Admin', 'wwww', '2024-05-30 11:33:28'),
	(46, 32, 'Admin', 'wwww', '2024-05-30 11:33:28'),
	(47, 32, 'Admin', 'qqq', '2024-05-30 11:33:32');

-- Dumping structure for table phpblog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(505) DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_on` datetime DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table phpblog.posts: ~4 rows (approximately)
DELETE FROM `posts`;
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `created_on`, `updated_on`, `deleted_on`, `user_id`) VALUES
	(15, 'Russia', 'The good part of Russia', 'The East Slavs emerged as a recognised group in Europe between the 3rd and 8th centuries CE. The first East Slavic state, Kievan Rus\', arose in the 9th century, and in 988, it adopted Orthodox Christianity from the Byzantine Empire. Rus\' ultimately disintegrated, with the Grand Duchy of Moscow growing to become the Tsardom of Russia. By the early 18th century, Russia had vastly expanded through conquest, annexation, and the efforts of Russian explorers, developing into the Russian Empire, which remains the third-largest empire in history', 'img/rus.jpg', '2024-05-24 22:10:09', '2024-05-27 11:16:20', NULL, 1),
	(27, 'Iceland', 'The land of fire and ice', 'Iceland (Icelandic: Ãsland, pronounced [Ëˆistlant] â“˜)[d] is a Nordic island country between the North Atlantic and Arctic Oceans, on the Mid-Atlantic Ridge between North America and Europe. It is linked culturally and politically with Europe and is the region\'s most sparsely populated country.[12] Its capital and largest city is ReykjavÃ­k, which is home to about 36% of the country\'s roughly 380,000 residents. The official language of the country is Icelandic.', 'img/gintchin-1.jpg', '2024-05-27 11:01:27', '2024-05-27 09:01:27', NULL, 1),
	(31, 'Norway', 'Beautiful mountains', 'Norway is a Scandinavian country encompassing mountains, glaciers and deep coastal fjords. Oslo, the capital, is a city of green spaces and museums. Preserved 9th-century Viking ships are displayed at Osloâ€™s Viking Ship Museum. Bergen, with colorful wooden houses, is the starting point for cruises to the dramatic Sognefjord. Norway is also known for fishing, hiking and skiing, notably at Lillehammerâ€™s Olympic resort.', 'img/Northern-Norway-Itinerary.jpg.optimal.jpg', '2024-05-27 11:33:25', '2024-05-27 09:33:25', NULL, 1),
	(32, 'Faroe Islands', 'The island country', 'The Faroe Islands is a self-governing archipelago, part of the kingdom of Denmark. It comprises 18 rocky, volcanic islands between Iceland and Norway.', 'img/Faroe-Islands_AdobeStock_245756398.jpg', '2024-05-29 11:12:27', '2024-05-30 11:45:02', NULL, 1);

-- Dumping structure for table phpblog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table phpblog.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
	(1, 'Admin', '$2y$10$AfB1E.pifjlNWm6GmO0hwuRwCZk3YN98BRTOTWozTeD64GYRr61WK', 1),
	(29, 'Guest', '$2y$10$SGYbU.jyqKxcZl89NO4UiOQ.hKhdVLRhHVGTVHJxKIIKaeB.Tq7Ee', 0),
	(31, 'Docent', '$2y$10$4armL4LWWchtex1NW1VEd.zeYUPttCj.UbZI8k43LZ55U3mlW66dm', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
