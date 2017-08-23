
--
-- GRANT ALL ON commentify.* TO user@localhost IDENTIFIED BY 'pass';
-- CREATE DATABASE commentify;
USE nien16;

-- Ensure UTF8 as chacrter encoding within connection.
SET NAMES utf8;

--
-- Create table for my own movie database
--
DROP TABLE IF EXISTS `ramverk1_comment`;
CREATE TABLE `ramverk1_comment`
(
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `comment` text
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;
