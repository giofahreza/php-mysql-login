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
VALUES('root', 'male', 'uk', 'mail@mail.com', 'a8f5f167f44f4964e6c998dee827110c');
