-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2014 at 06:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `articledb`
--
CREATE DATABASE IF NOT EXISTS `articledb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `articledb`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `author`, `category`, `date`) VALUES
(1, 'Lee Kwang-soo! My Favorite Running Man Member', 'Lee Kwang-soo is a South Korean actor, entertainer and model well-known as a cast member of the show Running Man. He’s so funny that he became my favorite member of Running man. He’s one of the reasons why I got hooked and continued watching the show. He’ll make you want to watch him more and more every episode you watch. He’s so full of unique ideas to make the show very funny, using his own ways especially with his facial expression!\n\nLee Kwang-soo famous Nicknames\n\nFramer Lee Kwang-soo, he always makes fun about his Running Man members especially Song Ji Hyo, the only girl in the group by framing  them on something that they didn’t do! This is one of his way to make the show more funny, that he was nicknamed as a framer on the earlier episodes.\n\nBetrayer Kwang-soo, my favorite nickname for him. He is one of the Betrayer team composed of Suk Jin and HaHa, but he’s the worst if we’re talking about betrayal plays! He will do anything to win the race even if he’ll sacrifice his teammates for his own victory! His betraying concept makes the show more interesting and fun to watch.\n\nGiraffe Kwang-soo and Kwangvatar, this nickname was given to him because of his long legs that make him look like a Giraffe or an Avatar.\n\nThe Asian Prince, he was also recently called as the “The Asian Prince” because of his overwhelming popularity in other Asian Country. He has so many fans including me that I’m already at this point writing an article just for him!\n\nI love you!', 'jordan', 'Variety', '2014-01-10'),
(2, 'Running Man the Best!', 'My very first post will be dedicated to Running Man! Running man is my favorite and the best Variety show for me, I laugh very hard to the point that I’m already crying! I became so happy every time I watch this show, and all my stress goes away! So what exactly is this Running man?\r\n\r\nRunning Man\r\n\r\nBased on Wikipedia, Running Man is a South Korean variety show, It was first aired on July 11, 2010. This show was classified as an “urban action variety”; a never-before-seen new genre of variety shows focused in an urban environment like cities or towns. The MCs and guests complete missions in a landmark to win the race. The show has since shifted to a more familiar reality-variety show concept focused on games.\r\n\r\nDid you become interested? I know it’s a “No”, because I also did not get interested knowing that Running man is a Korean variety show. It got worse when I saw it on YouTube or on Facebook that the MCs are 6 middle aged men with 1 cute woman. I thought in my head, why will I watch this kind of show?\r\n\r\nSo what changed me to watch the show Running Man?\r\n\r\nThere was this friend of mine, who is always watching this show. He always invites me to watch this because it’s so funny, he said. I ignored him saying that it looks boring and no pretty girls to watch. But one evening in our friend’s home before starting a thesis work, He keeps on laughing so hard that got me and some of the group members to join him watch an episode of Running Man on his laptop.\r\n\r\nWe start watching and I got hooked when I saw my dream girl Im Yoona on the show! It got me and some of our group members interested and we continued to watch the show. We started laughing at the things they are doing and cursing how stupid the hosts are. Because it’s a variety show, they are trying to be funny. After watching that episode (ep. 63), It got me hooked and was unsatisfied with the ending, my friend said that it will continue with the next episode (ep. 64) which I watched it at home.\r\n\r\nHere is a link about the episode’s highlights that made me want to watch Running Man.', 'jordan', 'Entertainment', '2014-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Love'),
(3, 'Variety'),
(7, 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `type`) VALUES
(1, 'jordan', 'jordan', 'Jordan Cachero', 'jrdncchr@gmail.com', 'admin'),
(3, 'dennica', 'dennica', 'Dennica', 'den@gmail.com', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
