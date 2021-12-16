CREATE TABLE `contents` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;