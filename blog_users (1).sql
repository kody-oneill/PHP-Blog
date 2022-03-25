-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:53923
-- Generation Time: Jan 23, 2021 at 03:27 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `COMMENT_ID` int(11) NOT NULL,
  `COMMENT_BODY` varchar(300) NOT NULL,
  `BLOG_ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`COMMENT_ID`, `COMMENT_BODY`, `BLOG_ID`, `username`) VALUES
(1, 'Kodys first comment updated again	  	', 1, 'kody.oneill'),
(3, '  kodys commenting test', 2, 'kody.oneill');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `BLOG_ID` int(11) NOT NULL,
  `BLOG_TITLE` varchar(100) NOT NULL,
  `BLOG_BODY` varchar(5000) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_ID` int(11) NOT NULL,
  `BLOG_TOPIC` varchar(100) NOT NULL,
  `BLOG_ACCESS` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`BLOG_ID`, `BLOG_TITLE`, `BLOG_BODY`, `DATE`, `USER_ID`, `BLOG_TOPIC`, `BLOG_ACCESS`) VALUES
(1, 'test 1', '    \"In the Age of Ancients, the world was unformed, shrouded by fog. A land of gray crags, Archtrees and Everlasting Dragons.\r\nBut then there was fire, and with fire came disparity. Heat and cold, life and death, and of course, light and dark.\r\nThen from the dark, they came, and found the Souls of Lords within the flame.\r\nNito, the first of the dead,\r\nthe Witch of Izalith, and her Daughters of Chaos,\r\nGwyn, the Lord of Sunlight, and his faithful knights,\r\nand the furtive pygmy, so easily forgotten.\r\n\r\n\"With the Strength of Lords, they challenged the Dragons.\r\nGwyn\'s mighty bolts peeled apart their stone scales.\r\nThe Witches weaved great firestorms.\r\nNito unleashed a miasma of death and disease.\r\nAnd Seath the Scaleless betrayed his own, and the Dragons were no more.\r\n\r\n\"Thus began the Age of Fire. But soon, the flames will fade, and only Dark will remain.\r\nEven now, there are only embers, and man sees not light, but only endless nights.\r\nAnd amongst the living are seen, carriers of the accursed Darksign.\"\r\n\r\n\"Yes, indeed. The Darksign brands the Undead.\r\nAnd in this land, the Undead are corralled and led to the north,\r\nwhere they are locked away, to await the end of the world.\r\n... This is your fate.\"  ', '2021-01-10 21:47:32', 1, 'Random', 0),
(2, 'Re: Topic 1 DQ 1', '    \"In the Age of Ancients, the world was unformed, shrouded by fog. A land of gray crags, Archtrees and Everlasting Dragons.\r\nBut then there was fire, and with fire came disparity. Heat and cold, life and death, and of course, light and dark.\r\nThen from the dark, they came, and found the Souls of Lords within the flame.\r\nNito, the first of the dead,\r\nthe Witch of Izalith, and her Daughters of Chaos,\r\nGwyn, the Lord of Sunlight, and his faithful knights,\r\nand the fusdf\r\n\"With the Strength of Lords, they challenged the Dragons.\r\nGwyn\'s mighty bolts peeled apart their stone scales.\r\nThe Witches weaved great firestorms.\r\nNito unleashed a miasma of death and disease.\r\nAnd Seath the Scaleless betrayed his own, and the Dragons were no more.\r\n\r\n\"Thus began the Age of Fire. But soon, the flames will fade, and only Dark will remain.\r\nEven now, there are only embers, and man sees not light, but only endless nights.\r\nAnd amongst the living are seen, carriers of the accursed Darksign.\"\r\n\r\n\"Yes, indeed. The Darksign brands the Undead.\r\nAnd in this land, the Undead are corralled and led to the north,\r\nwhere they are locked away, to await the end of the world.\r\n... This is your fate.\"  ', '2021-01-10 21:55:41', 1, 'Politics', 1),
(3, 'BLOGGY is cute', '  Look up!', '2021-01-12 16:47:43', 3, 'Adventure', 1),
(4, 'public', '  sdaasdv xzcv', '2021-01-17 18:54:39', 1, 'Lesiure', 1),
(5, 'public', '  sadaSDasd', '2021-01-17 18:57:00', 1, 'Sports', 1),
(6, 'public', '  sdafdfsadf', '2021-01-17 18:58:28', 1, 'Random', 1),
(7, 'Bloggy is cute', '  Kody has updated this from the admin portal', '2021-01-17 19:07:39', 1, 'Lesiure', 1),
(8, 'rw blog', '  bye Donald!', '2021-01-19 16:45:15', 5, 'Politics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `LOGIN_ATTEMPTS` int(11) NOT NULL DEFAULT '0',
  `ADMIN` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `email`, `username`, `password`, `LOGIN_ATTEMPTS`, `ADMIN`) VALUES
(1, 'kody.oneill@test.com', 'kody.oneill', 'password123', 0, 1),
(3, 'rwsenser@fred.net', 'Robert.Senser', 'Bob123456', 0, 0),
(4, 'test@test.com', 'test', 'password123', 0, 0),
(5, 'rwsenser@na.com', 'rw', 'Password', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`COMMENT_ID`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`BLOG_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `BLOG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
