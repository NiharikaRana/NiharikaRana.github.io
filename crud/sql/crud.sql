


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `products` (`id`, `name`, `price`, `description`) VALUES
(14, 'Earrings', 150, 'Gold Earrings'),
(15, 'Rings', 1200, 'Platinum Rings'),
(17, 'Choker', 15050, 'Diamond Choker');

CREATE TABLE `registered_users` (
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `registered_users` (`full_name`, `username`, `email`, `password`) VALUES
('Niharika Rana', 'niharika_07', 'niharika700@gmail.com', 'flmms#dhbvs'),
('Armaan Rana', 'rana_armaan_1', 'armaan400@gmail.com', 'jfnkjdfn^vskjv');




ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);


ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;
