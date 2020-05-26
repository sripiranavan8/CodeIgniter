-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `user_id` int unsigned NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

TRUNCATE `categories`;
INSERT INTO `categories` (`id`, `name`, `user_id`, `created_at`) VALUES
(2,	'Entertainment',	1,	'0000-00-00 00:00:00'),
(4,	'Sports',	1,	'0000-00-00 00:00:00'),
(5,	'News',	1,	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `body` text COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

TRUNCATE `comments`;
INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`) VALUES
(7,	16,	'sripiranavan',	'sripiranavan08@gmail.com',	'Good Article');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `category` int unsigned NOT NULL,
  `body` text COLLATE utf32_unicode_ci NOT NULL,
  `post_image` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `user_id` int unsigned NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

TRUNCATE `posts`;
INSERT INTO `posts` (`id`, `title`, `slug`, `category`, `body`, `post_image`, `user_id`, `created_at`) VALUES
(16,	'Article 1',	'Article-1',	2,	'<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>',	'5e9b5a4414262.jpg',	1,	'2020-04-19 10:13:22');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `zipcode` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

TRUNCATE `users`;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `zipcode`, `created_at`) VALUES
(1,	'Sripiranavan Yogarajah',	'sripiranavan08@gmail.com',	'Sripiranavan',	'$2y$10$QPUwlL6m4HbdrZAKRJ0sDegMZXVlKngWTEDGO95g8NsZ4eTCz.Aq.',	'40000',	'0000-00-00 00:00:00'),
(2,	'Biranavan Sri',	'biranavan8@gmail.com',	'Biranavan',	'$2y$10$SFDtyVUovXLNSeh/G1KZGeBQGzjwemlxhsRPWtR8lkFpsMINyAIV.',	'40000',	'0000-00-00 00:00:00'),
(4,	'Indirani',	'indirani@gmail.com',	'Indirani',	'$2y$10$Y2TnskxZAxhhgPgSJFPFLuU12F8.3VivhamaqZTT6180ai7zXZ1yK',	'40000',	'0000-00-00 00:00:00');

-- 2020-05-26 22:30:26
