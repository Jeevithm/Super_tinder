-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 10:57 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_tinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `superhero_from` int(11) NOT NULL,
  `superhero_to` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `superhero_from` int(11) NOT NULL,
  `superhero_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `superhero_from`, `superhero_to`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 3),
(4, 1, 3),
(5, 1, 3),
(6, 1, 3),
(7, 1, 3),
(8, 1, 2),
(9, 1, 2),
(10, 1, 3),
(11, 1, 3),
(12, 1, 1),
(13, 1, 2),
(14, 1, 2),
(15, 1, 2),
(16, 1, 3),
(17, 1, 2),
(18, 1, 2),
(19, 1, 2),
(20, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `superheroes`
--

CREATE TABLE `superheroes` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `age` int(6) NOT NULL,
  `image` varchar(256) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `location` varchar(60) NOT NULL,
  `like` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superheroes`
--

INSERT INTO `superheroes` (`id`, `email`, `name`, `age`, `image`, `gender`, `location`, `like`) VALUES
(1, 'Ironman@stevejobs.com', 'Ironman', 34, 'https://imgc.allpostersimages.com/img/print/posters/iron-man-marvel-avengers-assemble-lifesize-standup_a-G-9705905-0.jpg', 'Male', '', 0),
(2, 'spooderman@dolan.dk', 'Spooderman', 25, 'https://cdn.drawception.com/images/panels/2017/12-17/dqH7EOfW2K-6.png', 'Male', 'Dolanland', 0),
(3, 'wonder69@email.dk', 'Wonderwoman', 34, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3dcTEjynvxwAL_5gLmch7dQSGo-HHB3GIaqMPv6odJbkZcwHJ', 'Female', 'Non of your business', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `superhero_from` (`superhero_from`) USING BTREE,
  ADD KEY `superhero_to` (`superhero_to`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `superhero_from` (`superhero_from`),
  ADD KEY `superhero_to` (`superhero_to`);

--
-- Indexes for table `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `superheroes`
--
ALTER TABLE `superheroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`superhero_from`) REFERENCES `superheroes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`superhero_to`) REFERENCES `superheroes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`superhero_from`) REFERENCES `superheroes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`superhero_to`) REFERENCES `superheroes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
