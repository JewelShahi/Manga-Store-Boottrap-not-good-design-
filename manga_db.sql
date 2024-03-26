-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 10:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manga_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 2, 14.99);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `single_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `order_date`, `single_price`) VALUES
(1, 1, 1, 2, '2024-02-13 22:00:00', 9.99),
(1, 1, 2, 1, '2024-02-13 22:00:00', 14.99),
(1, 1, 3, 3, '2024-02-13 22:00:00', 19.99),
(2, 3, 1, 2, '2024-02-14 22:00:00', 9.99),
(2, 3, 5, 1, '2024-02-14 22:00:00', 12.99),
(3, 2, 4, 2, '2024-02-14 22:00:00', 24.99),
(4, 3, 6, 1, '2024-02-14 22:00:00', 17.99),
(5, 3, 3, 1, '2024-02-16 22:00:00', 19.99),
(6, 2, 6, 1, '2024-02-17 22:00:00', 17.99),
(7, 3, 2, 2, '2024-02-17 22:00:00', 14.99),
(7, 3, 4, 2, '2024-02-17 22:00:00', 24.99),
(8, 4, 2, 2, '2024-02-18 22:00:00', 14.99),
(8, 4, 6, 2, '2024-02-18 22:00:00', 17.99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `banner` text NOT NULL,
  `characters` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity_available` int(11) NOT NULL,
  `additional_info` text NOT NULL DEFAULT '\'No information\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `banner`, `characters`, `price`, `description`, `quantity_available`, `additional_info`) VALUES
(1, 'Bleach', 'images/slider/bleach.png', '[\"images/products/bleach/chad.png\", \"images/products/bleach/ichigo.png\", \"images/products/bleach/rukia.png\", \"images/products/bleach/uryu.png\"]', 9.99, 'Japanese manga series written and illustrated by Tite Kubo. Follows the story of Ichigo Kurosaki, a teenager with the ability to see spirits who becomes a Soul Reaper to protect the living world from malevolent spirits known as Hollows.', 100, 'The \"Bleach\" manga database is a treasure trove of information essential for fans of Tite Kubo\'s iconic series. It features detailed character profiles of central figures like Ichigo Kurosaki, Rukia Kuchiki, and Sosuke Aizen, offering insights into their backgrounds, powers, and relationships. Additionally, the database delves into the intricacies of the Soul Society, including its divisions, captains, and the Gotei 13 hierarchy. It also explores the world of Hollows and Arrancars, detailing their types, abilities, and notable examples. The Zanpakuto database provides information on Zanpakuto spirits, releases, and wielders, while story arc summaries highlight key events and battles throughout the series. The database further covers important locations, Shinigami powers, Hueco Mundo, and author insights, creating a comprehensive resource that enriches the \"Bleach\" experience for dedicated fans.'),
(2, 'Jujutsu Kaisen', 'images/slider/jjk.png', '[\"images/products/jjk/gojo.png\", \"images/products/jjk/sukuna.png\", \"images/products/jjk/yuji.png\"]', 14.99, 'Japanese manga series written and illustrated by Gege Akutami. Follows the story of Yuji Itadori, a high school student who becomes involved in the world of Jujutsu, sorcery used to combat curses and supernatural threats.', 80, 'The \"Jujutsu Kaisen\" manga database encompasses a wealth of information crucial for fans and enthusiasts alike. It includes detailed character profiles of main protagonists such as Yuji Itadori, Megumi Fushiguro, and Nobara Kugisaki, providing insights into their backgrounds, abilities, and growth trajectories throughout the series. Additionally, the database features an extensive Curse Encyclopedia, cataloging the various curses encountered in the storyline, their origins, strengths, weaknesses, and notable appearances. Furthermore, it delves into the intricacies of jujutsu techniques like Domain Expansion, Cursed Energy Manipulation, and Summoning Techniques, elucidating their mechanics and significance in combat scenarios. Summaries of major story arcs, descriptions of key locations, lists of manga chapters and volumes, and insights into sorcerer organizations and cursed objects further enrich the database, offering a comprehensive exploration of the captivating world crafted by Gege Akutami.'),
(3, 'Demon Slayer', 'images/slider/ds.png', '[\"images/products/ds/inosuke.png\", \"images/products/ds/tanjiro.png\", \"images/products/ds/zenitzu.png\"]', 19.99, 'Japanese manga series written and illustrated by Koyoharu Gotouge. Follows the story of Tanjiro Kamado, a young boy who becomes a demon slayer to avenge his family and cure his sister, who was turned into a demon.', 50, 'The \"Demon Slayer: Kimetsu no Yaiba\" manga database encapsulates a wealth of information crucial for fans of Koyoharu Gotouge\'s acclaimed series. It begins with detailed character profiles of central protagonists such as Tanjiro Kamado, Nezuko Kamado, and Zenitsu Agatsuma, offering insights into their backgrounds, abilities, and character development arcs throughout the narrative. The database further explores the intricate world of demons, cataloging various demon types, their origins, powers, and notable encounters with demon slayers like Giyu Tomioka and Kyojuro Rengoku. Additionally, it delves into the intricacies of Breathing Techniques, explaining the different forms and techniques used by demon slayers in combat, including Water Breathing and Thunder Breathing. Summaries of major story arcs, including the Final Selection, Natagumo Mountain, and Infinity Castle arcs, highlight key events, battles, and character growth moments. The database also features insights into the Hashira, the highest-ranking demon slayers, their roles, and unique abilities. Furthermore, it includes a catalog of demons defeated by the main characters, along with their strengths, weaknesses, and significance in the storyline. By compiling these elements, the \"Demon Slayer\" manga database offers fans an immersive and comprehensive experience, allowing them to delve deeper into the captivating world, characters, and themes of the series.'),
(4, 'One Piece', 'images/slider/op.png', '[\"images/products/op/luffy.png\", \"images/products/op/uusopp.png\", \"images/products/op/zoro.png\"]', 24.99, 'Adventure manga written and illustrated by Eiichiro Oda. Follows the adventures of Monkey D. Luffy and his pirate crew in search of the legendary treasure known as One Piece.', 100, 'The \"One Piece\" manga database is a vast repository of information that encompasses the epic world created by Eiichiro Oda. It begins with detailed character profiles of central figures like Monkey D. Luffy, Roronoa Zoro, Nami, and the rest of the Straw Hat Pirates, providing insights into their backgrounds, abilities, and character arcs as they journey through the Grand Line. The database further explores the diverse and vibrant world of the Grand Line, including the various seas, islands, and factions encountered by the Straw Hats on their quest for the legendary One Piece treasure. It delves into the intricate power system of Devil Fruits, categorizing the different types (Paramecia, Zoan, and Logia) and detailing the abilities of known Devil Fruit users such as Luffy (Gomu Gomu no Mi), Ace (Mera Mera no Mi), and Kizaru (Pika Pika no Mi). Summaries of major story arcs, from the East Blue Saga to the Wano Country Arc, highlight key events, battles, and character developments that shape the overarching narrative. The database also includes information about the Seven Warlords of the Sea, the Yonko (Four Emperors), and the Marines, shedding light on the political landscape of the One Piece world. Additionally, it features insights into the Void Century, the ancient history of the world, and the significance of the Poneglyphs in uncovering its secrets. By compiling these elements, the \"One Piece\" manga database offers fans an immersive and comprehensive resource to explore the rich lore, dynamic characters, and adventurous spirit of the beloved series.'),
(5, 'Solo Leveling', 'images/slider/sl.png', '[\"images/products/sl/cha.png\", \"images/products/sl/smile.png\", \"images/products/sl/sung.png\"]', 12.99, 'South Korean web novel written by Chu-Gong. Follows the story of Sung Jin-Woo, a hunter in a world where dungeons suddenly appeared and monsters started running rampant.', 80, 'The \"Solo Leveling\" manga database is a valuable resource for fans of Sung Jin-Woo\'s thrilling journey in the world of hunters and dungeons. It begins with detailed character profiles of key figures such as Sung Jin-Woo, Cha Hae-In, and Jin-Woo\'s fellow hunters, providing insights into their abilities, backgrounds, and roles in the story. The database further delves into the concept of hunters and ranks, explaining the hierarchy and the challenges faced by hunters as they explore dangerous dungeons filled with monsters and treasures. It also catalogs the various types of monsters encountered in the series, their strengths, weaknesses, and notable appearances.\r\n\r\nAdditionally, the database includes a breakdown of Jin-Woo\'s growth as a hunter, from his humble beginnings as an E-rank hunter to his evolution as the powerful Shadow Monarch. It explores the mechanics of leveling up, acquiring skills, and forming alliances with other hunters and guilds. Summaries of major story arcs, including the Red Gate Arc, Ant Arc, and Jeju Island Arc, highlight key events, epic battles, and character development moments.\r\n\r\nMoreover, the database covers Jin-Woo\'s unique abilities as a player with the \"System,\" including his Shadows, dungeon exploration, and quests. It also delves into the lore behind the System, the mysteries surrounding dungeons and gates, and the implications of Jin-Woo\'s newfound powers on the world.\r\n\r\nBy compiling these elements, the \"Solo Leveling\" manga database offers fans an immersive and comprehensive experience, allowing them to delve deeper into the thrilling adventures, intense battles, and intriguing mysteries of Sung Jin-Woo\'s journey as a hunter.'),
(6, 'Bungo Stray Dogs', 'images/slider/bsd.png', '[\"images/products/bsd/akutagawa.png\", \"images/products/bsd/dazai.png\", \"images/products/bsd/kunikida.png\"]', 17.99, 'Japanese manga series written by Kafka Asagiri and illustrated by Sango Harukawa. Follows the members of the Armed Detective Agency, a group of individuals with supernatural abilities who solve mysterious cases in Yokohama.', 60, 'The \"Bungo Stray Dogs\" manga database provides a comprehensive look into the world of supernatural abilities, detective work, and intricate character dynamics crafted by Kafka Asagiri and illustrated by Sango Harukawa. The database begins with detailed character profiles of central figures such as Atsushi Nakajima, Osamu Dazai, Doppo Kunikida, and other members of the Armed Detective Agency and Port Mafia, offering insights into their backgrounds, abilities, and motivations.\r\n\r\nThe database further explores the concept of supernatural abilities or \"Gifts\" possessed by characters, categorized by their unique names and effects, such as Atsushi\'s Beast Beneath the Moonlight and Akutagawa\'s Rashomon. It also delves into the intricate history and conflicts between the Armed Detective Agency, a group of detectives with extraordinary powers, and the Port Mafia, a criminal organization with formidable abilities.\r\n\r\nSummaries of major story arcs, including the Guild, Decay of Angels, and Cannibalism arcs, highlight key events, intense battles, and character development moments that shape the overarching narrative. The database also covers significant locations such as Yokohama, where much of the series takes place, and the various factions and organizations that play crucial roles in the storyline.\r\n\r\nMoreover, the database explores the literary inspirations behind the characters\' names and abilities, drawing connections to famous literary figures and their works. It also includes insights into the thematic elements of the series, such as redemption, identity, and the consequences of wielding power.\r\n\r\nBy compiling these elements, the \"Bungo Stray Dogs\" manga database offers fans an immersive and in-depth resource to explore the rich storytelling, complex characters, and supernatural intrigue of the series.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'Alice', 'alice@example.com', 'password1'),
(2, 'Bob', 'bob@example.com', 'password2'),
(3, 'Charlie', 'charlie@example.com', 'password3'),
(4, 'Ivak', 'ivak@example.com', 'password4'),
(5, 'Divak', 'divak@example.com', 'password5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`,`user_id`,`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
