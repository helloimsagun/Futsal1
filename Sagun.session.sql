DROP DATABASE IF EXISTS futsal;

CREATE DATABASE futsal;

USE futsal;

SET time_zone = "+05:45";

CREATE TABLE
    `users` (
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `username` varchar(255) NOT NULL UNIQUE,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `type` enum('admin', 'user') NOT NULL DEFAULT 'user'
    );

INSERT INTO
    `users` (
        `id`,
        `username`,
        `email`,
        `password`,
        `type`
    )
VALUES (
        1,
        'nischal',
        'nischalrzbsnt0@gmail.com',
        'nischal',
        'admin'
    ), (
        2,
        'test',
        'test@test.com',
        'test123',
        'user'
    ), (
        3,
        'sagun',
        'ghimireshawgun23@gmail.com',
        'sagun',
        'user'
    );

CREATE TABLE
    `futsals`(
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `address` VARCHAR(500) NOT NULL,
        `phone` VARCHAR(10) NOT NULL,
        `image` VARCHAR(255) NOT NULL,
        `description` VARCHAR(255) NOT NULL,
        `type` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    );

-- Insert name of futsal that are different from each other at different location with different images

INSERT INTO
    futsals (
        name,
        address,
        phone,
        image,
        description,
        type
    )
VALUES (
        'River Field',
        '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.912282617878!2d85.29842417559158!3d27.719994476175252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18efaf30dc41%3A0x307d5206a9453cce!2sRiver%20Field%20futsal!5e0!3m2!1sen!2snp!4v1686129162507!5m2!1sen!2snp" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        '014361095',
        'RiverField.jpg',
        'Located at River Banks',
        '5A'
    ), (
        'Nepa Futsal',
        '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14127.937085757228!2d85.27746658715823!3d27.717771900000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb192ede0d87b9%3A0xb30735a9b4bb5f90!2sNepa%20futsal!5e0!3m2!1sen!2snp!4v1686462386152!5m2!1sen!2snp" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        '9843199318',
        'Nepa.jpg',
        'Good field size',
        '7A'
    ), (
        'Kumari Futsal',
        '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1766.054347040229!2d85.3081162!3d27.7139301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fb7ea82b97%3A0x533a5f813eec590f!2sKumari%20Futsal!5e0!3m2!1sen!2snp!4v1686469245751!5m2!1sen!2snp" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        '015343709',
        'Kumari.jpg',
        'Nice ground',
        '5A'
    );

CREATE TABLE
    `futsal_attributes`(
        `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `futsalid` INT NOT NULL,
        `attribute` VARCHAR(255) NOT NULL,
        `value` BOOLEAN NOT NULL,
        FOREIGN KEY (`futsalid`) REFERENCES `futsals` (`id`)
    );

INSERT INTO
    futsal_attributes (futsalid, attribute, value)
VALUES (1, 'Indoor', 1), (1, 'Outdoor', 0), (1, 'Parking', 1), (1, 'Cafeteria', 1), (2, 'Indoor', 1), (2, 'Outdoor', 0), (2, 'Parking', 1), (2, 'Cafeteria', 0), (3, 'Indoor', 1), (3, 'Outdoor', 0), (3, 'Parking', 1), (3, 'Cafeteria', 1);

CREATE TABLE
    `booking` (
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `fieldid` int NOT NULL,
        `userid` int NOT NULL,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `phone` varchar(10) NOT NULL,
        `date` date NOT NULL,
        `price` int NOT NULL,
        `time` varchar(30) NOT NULL,
        `status` ENUM('Pending', 'Accepted', 'Rejected','Cancelled') NOT NULL DEFAULT 'Pending',
        FOREIGN KEY (`fieldid`) REFERENCES `futsals` (`id`),
        FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
    );