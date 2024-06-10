-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 03:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bowlreal_pw2024_tubes_233040028`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `menu_img` longtext NOT NULL,
  `menu_ctg` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int NOT NULL,
  `menu_qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int NOT NULL,
  `menu_img` longtext NOT NULL,
  `menu_ctg` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_img`, `menu_ctg`, `menu_name`, `menu_price`) VALUES
(4, '6665b85a7b757.jpg', 'Ramen', 'Tonkotsu Ramen', '50000'),
(5, '6665b875be5e9.jpg', 'Ramen', 'Shoyu Ramen', '55000'),
(6, '6665b87fbca51.jpg', 'Ramen', 'Miso Ramen', '45000'),
(7, '6665b88d46c20.jpg', 'Ramen', 'Shio Ramen', '35000'),
(8, '6665b89e045ce.jpg', 'Ramen', 'Spicy Ramen', '65000'),
(9, '6665b8a733edd.jpg', 'Donburi', 'Gyudon', '70000'),
(10, '6665b8b077156.jpg', 'Donburi', 'Katsudon', '65000'),
(11, '6665b8bb3f8ce.jpg', 'Donburi', 'Oyakodon', '55000'),
(12, '6665b8c6d837c.jpg', 'Donburi', 'Unadon', '56000'),
(13, '6665b8d2de05e.jpg', 'Donburi', 'Tendon', '76000'),
(14, '6665b99f9d3ae.jpg', 'Drink', 'Matcha Latte', '30000'),
(15, '6665b8f52692b.jpg', 'Drink', 'Hojicha Tea', '32000'),
(16, '6665b8fda614f.jpg', 'Drink', 'Yuzu Lemonade', '26000'),
(17, '6665b9250bf17.jpg', 'Drink', 'Ramune Soda', '28000'),
(18, '6665b93297c89.jpg', 'Drink', 'Sakura Iced Tea', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `menu_order`
--

CREATE TABLE `menu_order` (
  `trx_id` varchar(10) NOT NULL,
  `user_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `qty_order` int NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_order`
--

INSERT INTO `menu_order` (`trx_id`, `user_id`, `menu_id`, `qty_order`, `order_status`, `order_date`) VALUES
('7618160598', 1, 14, 1, 'Pending', '2024-06-09'),
('7618160598', 1, 8, 1, 'Pending', '2024-06-09'),
('7618160598', 1, 10, 1, 'Pending', '2024-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int NOT NULL,
  `review_text` longtext NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review_text`, `user_id`) VALUES
(1, 'BowlRealm offers the best ramen I have ever tasted, with rich broth and fresh toppings!', 1),
(2, 'The donburi at BowlRealm is both delicious and authentic, truly a Japanese culinary gem.', 1),
(3, 'Amazing flavors and fresh ingredients at BowlRealm. The ramen is always perfectly cooked.', 1),
(4, 'I love the unique ramen varieties at BowlRealm. Each bowl is a delightful experience.', 1),
(5, 'BowlRealm’s Gyudon is a must-try for Japanese food lovers. The beef is tender and flavorful.', 1),
(6, 'A delightful experience with every visit to BowlRealm! The food and service are exceptional.', 1),
(7, 'BowlRealm combines quality and taste perfectly. Their donburi dishes are absolutely superb.', 1),
(8, 'The atmosphere and food at BowlRealm are superb! The ramen is rich and incredibly tasty.', 1),
(9, 'BowlRealm’s dishes are both flavorful and beautifully presented. A true Japanese delight.', 1),
(10, 'Highly recommend BowlRealm for authentic Japanese cuisine. The ramen and donburi are fantastic.', 1),
(11, 'Thanks, i want more ramen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int NOT NULL,
  `role_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_img` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_img`, `user_name`, `username`, `user_email`, `password`, `role_id`) VALUES
(1, '665eb703f3e23.png', 'Aufa Ramadhan', 'aufa', 'aufa@mail.com', '$2y$10$wdvt0xxQJVgr..Qf//MIAOK3dmSD7EiR5WpzgrNoGyd9147nndZSO', 1),
(2, '6665cf01b4974.png', 'Dhaffa Galang', 'galang', 'lang@mail.com', '$2y$10$U2bxsRCHKSUXG.PzxrGJK.WciN2a1vhq5LMl9NnXmZIXBq75616sO', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_order`
--
ALTER TABLE `menu_order`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `menu_order`
--
ALTER TABLE `menu_order`
  ADD CONSTRAINT `menu_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `menu_order_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
