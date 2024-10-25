-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 02:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konser`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_events` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `date_time` date NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `location` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_events`, `event_name`, `date_time`, `max_capacity`, `location`, `description`, `photo`, `created_at`, `status`) VALUES
(30, 'Autumn Music Fest', '2024-10-05', 5000, 'Central Park, New York, NY', 'This lively music festival celebrates the best of indie, rock, and electronic music, all set within the iconic surroundings of Central Park. Attendees are invited to experience an unforgettable autumn atmosphere with live performances from top artists, diverse food trucks, interactive art installations, and an atmosphere that captures the essence of fall in New York. As the leaves change, the park transforms into an enchanting setting where fans can connect with music and nature alike. Enjoy exclusive VIP lounges, activities for all ages, and vendor stalls offering unique, handmade products.', 'images/autum.jpg', '2024-10-25 12:12:56', 'open'),
(31, 'Food and Wine Expo', '2025-01-15', 2000, ' LA Convention Center, Los Angeles, CA', 'A premier destination for food lovers and wine connoisseurs alike, the Food and Wine Expo offers a chance to experience exquisite gourmet tastings, rare wine pairings, and live demonstrations by renowned chefs. This multi-day event offers seminars on the latest in food trends, sustainable farming, and the art of pairing, making it an educational and enjoyable experience for attendees. Meet and greet with celebrity chefs, discover new culinary innovations, and sample artisanal products from all over the world, all under one roof in the heart of Los Angeles.', 'images/foodwine.jpg', '2024-10-25 12:14:16', 'open'),
(32, 'Annual Book Fair', '2024-02-10', 1500, 'Boston Public Library, Boston, MA', 'The Annual Book Fair is a beloved tradition that celebrates literature, offering a space where authors and readers unite to share their passion. Featuring book talks, creative writing workshops, and autograph sessions with celebrated authors, the fair attracts bibliophiles of all ages. Visitors can explore thousands of titles across genres, discover emerging authors, and join in discussions on everything from classic literature to modern storytelling trends. With special sections for children and young adults, it\'s an enriching day for the whole family.', 'images/librarys.jpeg', '2024-10-25 12:16:34', 'open'),
(33, 'Charity Run for Wildlife', '2024-04-06', 4000, 'Hyde Park, London, UK', 'This charity run is a unique and impactful way to support wildlife conservation. Set in London\'s scenic Hyde Park, the event includes race options of different lengths, live music, and informative booths on conservation efforts. Each participant contributes to a significant cause, with proceeds directed toward protecting endangered species and natural habitats. With post-race festivities and guest speakers, it’s a day where fitness meets philanthropy, fostering a stronger connection to our environment.', 'images/run.jpeg', '2024-10-25 12:18:31', 'open'),
(34, 'Spring Craft Fair', '2024-03-27', 800, 'Seattle Center, Seattle, WA', 'The Spring Craft Fair is a celebration of local artisans and their handmade goods, offering a unique shopping experience for craft lovers. The event showcases a range of products from handcrafted jewelry and pottery to gourmet foods. Visitors can join workshops to learn traditional crafting techniques and enjoy live performances that add to the festive atmosphere. It’s an ideal outing for families, couples, and anyone who appreciates local arts and crafts.', 'images/craft2.jpeg', '2024-10-25 12:20:06', 'open'),
(35, 'Winter Fashion Week', '2024-02-15', 600, 'Paris Fashion Center, Paris, France', 'Held at the renowned Paris Fashion Center, Winter Fashion Week is a prestigious event that showcases the latest seasonal collections from world-famous designers. With high-energy runway shows, exclusive exhibitions, and designer meet-and-greet opportunities, it is an unforgettable experience for fashion aficionados. Beyond the runway, attendees have access to style workshops and trend-setting pop-up shops, making it a comprehensive fashion experience.', 'images/fasion.jpeg', '2024-10-25 12:21:45', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tickets` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registration_id`, `user_id`, `event_id`, `registration_date`, `tickets`) VALUES
(30, 0, 30, '2024-10-25 12:33:39', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(10) NOT NULL,
  `user_nama` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_events` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_nama`, `user_email`, `user_password`, `role`, `image`, `id_events`) VALUES
('C001', 'admin', 'admin@gmail.com', '$2y$10$mLKeZ/zWpQPS.P5V9T/b9.R8Xw2QpLL5sr4Idz25mDDdsAVhqp58i', 'admin', 'images/users/craft2.jpeg', NULL),
('C002', 'gigih', 'gigih@gmail.com', '$2y$10$c.CKFihNOJYNgFiPvi9z0uUOfrEV9ZDm9Lx00bYtazp0CLOHYa5wa', 'user', 'images/users/jastin.jpg', NULL),
('C003', 'jastin', 'jastin@gmail.com', '$2y$10$fjumSoSD.3Rxxg3D2YOsKu1l8HxjY6gsTRiy0t9vtP8h9aK6xG7ja', 'user', 'images/users/jastin.jpg', NULL),
('C004', 'fredlie', 'fredlie@gmail.com', '$2y$10$L8FIr7DqmE2mLMvf7W2MLeItlGTvSLMs1F6IP7Atg/O3c.1L1XiY.', 'user', 'images/users/fredlie.jpg', NULL),
('C005', 'davis', 'davis@gmail.com', '$2y$10$XYf7pluRzQJZPCa/VJrD3OrED5uH5SNZWHHX2kD.mrTa.cRc6LjjS', 'user', 'images/users/davis.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_events`),
  ADD UNIQUE KEY `created_at` (`created_at`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_id_events` (`id_events`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_events` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_id_events` FOREIGN KEY (`id_events`) REFERENCES `events` (`id_events`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
