DROP DATABASE IF EXISTS futsal;
CREATE DATABASE futsal;
USE futsal;
SET time_zone = "+05:40";

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) NOT NULL UNIQUE,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'nischal', 'nischalrzbsnt0@gmail.com', 'nischal'),
(2, 'test', 'test@test.com', 'test123'),
(3, 'sagun', 'ghimireshawgun23@gmail.com', '123456');

CREATE TABLE `futsals`{
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(10) NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `price` INT NOT NULL,
};
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.912282617878!2d85.29842417559158!3d27.719994476175252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18efaf30dc41%3A0x307d5206a9453cce!2sRiver%20Field%20futsal!5e0!3m2!1sen!2snp!4v1686129162507!5m2!1sen!2snp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
-- Insert name of futsal that are different from each other at different location with different images
INSERT INTO futsals (name, address, phone, location, image, description, type, price)
VALUES
  ('River Field', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.912282617878!2d85.29842417559158!3d27.719994476175252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18efaf30dc41%3A0x307d5206a9453cce!2sRiver%20Field%20futsal!5e0!3m2!1sen!2snp!4v1686129162507!5m2!1sen!2snp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', '9843177800', 'Location A', 'image_a.jpg', 'Description A', 'Type A', 100),
  ('Futsal B', 'Address B', '0987654321', 'Location B', 'image_b.jpg', 'Description B', 'Type B', 150),
  ('Futsal C', 'Address C', '9876543210', 'Location C', 'image_c.jpg', 'Description C', 'Type C', 120);


CREATE TABLE `futsal_time`{
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `futsalid` INT NOT NULL,
  `time` VARCHAR(30) NOT NULL,
  `status` VARCHAR(30) NOT NULL DEFAULT 'Active',
  FOREIGN KEY (`futsalid`) REFERENCES `futsals` (`id`)
};

CREATE TABLE `futsal_attributes`{
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `futsalid` INT NOT NULL,
  `attribute` VARCHAR(255) NOT NULL,
  `value` BOOLEAN NOT NULL,
  FOREIGN KEY (`futsalid`) REFERENCES `futsals` (`id`)
};


CREATE TABLE `booking` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fieldid` int NOT NULL,
  `date` date NOT NULL,
  `time` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  FOREIGN KEY (`fieldid`) REFERENCES `futsals` (`id`)
  FOREIGN KEY (`userid`) REFERENCES `users` (`userid`)
);



