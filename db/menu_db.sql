-- Active: 1762165928902@@127.0.0.1@3306
-- DROP TABLE IF EXISTS `menu`; -- jadvalni o'chirish
--  Menyu jadvali
CREATE TABLE IF NOT EXISTS `menu` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `position` INTEGER DEFAULT NULL,
    `url` VARCHAR(255) DEFAULT NULL,
    `status` BOOLEAN DEFAULT TRUE
);

--  jadvalga ma'lumotlar kiritish

INSERT INTO `menu` (`name`, `position`, `url`)
VALUES('Asosiy sahifa', 1, 'index.php'),
('Biz haqimizda', 2, 'about.php'),
('Yangiliklar', 3, 'news.php'),
('Yangilik tafsilotlari', 4, 'news-details.php'),
("Biz bilan bog'lanish", 5, 'contact.php');


/*
Original menu items
Home(current)
About Us
Blog Entries
Post Details
Contact Us
*/