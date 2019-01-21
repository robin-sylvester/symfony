-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 08:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movieland`
--

-- --------------------------------------------------------

--
-- Table structure for table `combined`
--

CREATE TABLE IF NOT EXISTS `combined` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `people_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_471218948F93B6FC` (`movie_id`),
  KEY `IDX_471218943147C936` (`people_id`),
  KEY `IDX_47121894D60322AC` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `combined`
--

INSERT INTO `combined` (`id`, `movie_id`, `people_id`, `role_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 2, 3),
(4, 2, 4, 1),
(5, 2, 4, 2),
(6, 2, 5, 3),
(7, 3, 6, 1),
(8, 3, 6, 2),
(9, 3, 7, 3),
(10, 4, 8, 1),
(11, 4, 8, 2),
(12, 4, 9, 3),
(13, 5, 6, 1),
(14, 5, 6, 2),
(15, 5, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `year`, `description`) VALUES
(1, 'Requiem for a Dream', '2000-01-01 00:00:00', 'The drug-induced utopias of four Coney Island people are shattered when their addictions run deep.'),
(2, 'Donnie Darko', '2001-01-01 00:00:00', 'A troubled teenager is plagued by visions of a large bunny rabbit that manipulates him to commit a series of crimes, after narrowly escaping a bizarre accident.'),
(3, 'Pulp Fiction', '1994-01-01 00:00:00', 'The lives of two mob hit men, a boxer, a gangster''s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.'),
(4, 'Kaboom', '2010-01-01 00:00:00', 'A sci-fi story centered on the sexual awakening of a group of college students.'),
(5, 'Kill Bill 1', '2003-01-01 00:00:00', 'The Bride wakens from a four-year coma. The child she carried in her womb is gone. Now she must wreak vengeance on the team of assassins who betrayed her - a team she was once part of.');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `birth_date`) VALUES
(1, 'Hubert', 'Selby Jr.', '1928-08-08 00:00:00'),
(2, 'Darren', 'Aronofsky', '1969-02-12 00:00:00'),
(3, 'Jared', 'Leto', '1971-12-26 00:00:00'),
(4, 'Richard', 'Kelly', '1975-03-28 00:00:00'),
(5, 'Jake', 'Gyllenhaal', '1980-12-19 00:00:00'),
(6, 'Quentin', 'Tarantino', '1963-03-27 00:00:00'),
(7, 'Uma', 'Thurman', '1970-04-29 00:00:00'),
(8, 'Gregg', 'Araki', '1959-12-17 00:00:00'),
(9, 'Thomas', 'Dekker', '1987-12-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_of_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name_of_role`) VALUES
(1, 'Writer'),
(2, 'Director'),
(3, 'Actor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `combined`
--
ALTER TABLE `combined`
  ADD CONSTRAINT `FK_47121894D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_471218943147C936` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_471218948F93B6FC` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
