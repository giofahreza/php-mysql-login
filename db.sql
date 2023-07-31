CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users
(username, gender, country, email, password)
VALUES('root', 'male', 'uk', 'mail@mail.com', '$2y$10$eXNleRVnkso83Mu4SW1iPu4rFKGBT6qSdxJ6CDXnbptz2rP9MwDRO');

ALTER TABLE users MODIFY COLUMN password varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;