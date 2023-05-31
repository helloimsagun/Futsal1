DROP DATABASE futsal;
CREATE DATABASE futsal;
USE futsal;
SET time_zone = "+05:40";

CREATE TABLE `register` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  UNIQUE KEY `userid_unique` (`userid`)
);

CREATE TABLE `booking` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(30) NOT NULL,
  `fieldid` int NOT NULL,
  `typeid` varchar(10) NOT NULL,
  `price` int NOT NULL,
  FOREIGN KEY (`userid`) REFERENCES `register` (`userid`)
);

INSERT INTO `register` (`id`, `userid`, `email`, `password`, `cpassword`) VALUES
(1, 'nischal', 'nischalrzbsnt0@gmail.com', 'nischal', 'nischal'),
(2, 'test', 'test@test.com', 'test123', 'test123'),
(3, 'sagun', 'ghimireshawgun23@gmail.com', '123456', '123456');
