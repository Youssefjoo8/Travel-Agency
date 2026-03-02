-- SQL Export for 'users' table
-- Use this to import into InfinityFree phpMyAdmin

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admin: admin@travel.com / admin123
-- User: user@travel.com / user123
INSERT INTO `users` (`full_name`, `email`, `password`, `user_type`) VALUES
('Travel Admin', 'admin@travel.com', '$2y$10$M/3O5Z6v6v6v6v6v6v6v6O (Placeholder Hash)', 'admin'),
('Standard User', 'user@travel.com', '$2y$10$M/3O5Z6v6v6v6v6v6v6v6O (Placeholder Hash)', 'user');
