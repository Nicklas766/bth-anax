--
-- Table Book
--
DROP TABLE IF EXISTS ramverk1_book;
CREATE TABLE ramverk1_book (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `title` VARCHAR(80) NOT NULL,
    `author` VARCHAR(80) NOT NULL,
    `img` VARCHAR(255) NOT NULL

) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;


insert into `ramverk1_book` (`title`, `author`, `img`) values
    ("Programming in C++", "Stephen C. Dewhurst", "https://i.stack.imgur.com/P1YbC.jpg"),
    ("CSS and HTML Web Design", "Craig Grannell", "http://www.cssnewbie.com/wp-content/uploads/2015/03/must-read-html-css-books2.jpg");
