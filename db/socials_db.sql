--  Ijtimoiy tarmoqlar elementlari bilan ishlovchi baza

-- DROP TABLE IF EXISTS `social`;

CREATE TABLE IF NOT EXISTS `social`
(
    `id`       INTEGER PRIMARY KEY AUTOINCREMENT,
    `name`     TEXT(255) NOT NULL,     -- nomi
    `url`      TEXT(255) DEFAULT NULL, -- manzili
    `icon_class` TEXT(255) DEFAULT NULL, -- ikonkasi
    `position` INTEGER   DEFAULT NULL,
    `status`   BOOLEAN   DEFAULT 1     -- yoqib/o'chirish uchun statusi
);


INSERT INTO `social` (`name`, `icon_class`, `url`, `position`)
VALUES ('Facebook',
        'fa-brands fa-facebook fa-2xl',
        'https://www.facebook.com/mohirdevuz/?locale=uz_UZ',
        1),
       (
        'YouTube',
        'fa-brands fa-youtube fa-2xl',
        'https://youtube.com/mohirdev',
        2
       ),

       ('Telegram',
        'fa-brands fa-telegram fa-2xl',
        'https://t.me/mohirdev',
        3),

       ('X (Twitter)',
        'fa-brands fa-twitter fa-2xl',
        'https://x.com/mohirdev',
        4),

       ('Behance',
        'fa-brands fa-behance fa-2xl',
        'https://www.behance.net/gallery/158282875/MOHIRDEV',
        5),

       ('Linkedin',
        'fa-brands fa-linkedin fa-2xl',
        'https://uz.linkedin.com/company/mohirdevuz',
        6),

       ('Dribble',
        'fa-brands fa-dribbble fa-2xl',
        'https://dribbble.com/search/mohirdev',
        7);