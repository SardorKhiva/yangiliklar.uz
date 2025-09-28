--- MENU TABLE ---
-- sahifalar tepasidagi menu uchun menu jadvalini hosil qilish

DROP TABLE IF EXISTS `menu`;  -- jadvalni o'chirish

-- jadval tuzilishi
CREATE TABLE IF NOT EXISTS `menu`
(
    `id`       INTEGER PRIMARY KEY AUTOINCREMENT,
--     `language` VARCHAR(30)  NOT NULL DEFAULT 'UZB-LAT', --  'sahifa tili',
    `name`     VARCHAR(255) NOT NULL,                   --  'sahifa nomi',
    `position` INT UNIQUE,                              --  'har bir menyu nomi turgan joyi',
    `url`      VARCHAR(255),                            --  'sahifa manzili',
    `status`   BOOLEAN               DEFAULT 1          --  'page on/off status'
);


-- jadvalga yozuvlar qo'shish
INSERT INTO `menu`(`name`, `position`, `url`, `status`)
VALUES ('Asosiy sahifacha', 1, '/index.php', 1),
       ('Biz haqimizda', 2, '/about.php', 1),
       ('Yangiliklar', 3, '/news.php', 1),
       ('Yangilik tafsilotlari', 4, '/news-details.php', 1),
       ('Biz bilan aloqa', 5, '/contact.php', 1);


SELECT *
FROM `menu`
WHERE `status` = 1;




-- DROP TABLE IF EXISTS `news`;

CREATE TABLE IF NOT EXISTS `news`
(
    `id`          INTEGER PRIMARY KEY AUTOINCREMENT,
    `status`      BOOLEAN      DEFAULT 1,    -- 'postni faol/nofaol qilish',
    `is_banner`   BOOLEAN      DEFAULT '1',  -- 'post bannerda chiqsinmi',
    `title`       VARCHAR(255) NOT NULL,     -- 'post sarlavhasi',
    `description` VARCHAR(500) DEFAULT NULL, -- 'post qisqa tavsifi',
    `content`     TEXT,                      -- 'post mazmuni',
    `author_id`   INTEGER      DEFAULT NULL, -- 'post muallifi',
    `theme_id`    INTEGER      DEFAULT NULL, -- 'post mavzusi',
    `img_url`     VARCHAR(255) NOT NULL,     -- 'rasm havolasi',
    `seen_count`  INTEGER      DEFAULT 0,    --  'ko''rishlar soni',
    `created_at`  DATETIME     DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  DATETIME     DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `news`
    (`theme_id`, `title`, `img_url`, `content`, `author_id`)
VALUES (1, '1-Banner sarlavhasi', '/assets/images/banner-item-01.jpg', 'Bu 1-post mazmuni', 4),
       (2, '2-Banner sarlavhasi', '/assets/images/banner-item-02.jpg', 'Bu 2-post mazmuni', 4),
       (3, '3-Banner sarlavhasi', '/assets/images/banner-item-03.jpg', 'Bu 3-post mazmuni', 4),
       (1, '4-Banner sarlavhasi', '/assets/images/banner-item-04.jpg', 'Bu 4-post mazmuni', 4),
       (2, '5-Banner sarlavhasi', '/assets/images/banner-item-05.jpg', 'Bu 5-post mazmuni', 4),
       (3, '6-Banner sarlavhasi', '/assets/images/banner-item-06.jpg', 'Bu 6-post mazmuni', 4)
;

SELECT *
FROM `news`;




-- DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social`
(
    `id`         INTEGER PRIMARY KEY AUTOINCREMENT,
    `name`       VARCHAR(50)  NOT NULL UNIQUE, --'ijtimoiy tarmoq nomi',
    `icon_class` VARCHAR(255) DEFAULT NULL,    --  'Font Awesome dan icon lar classi',
    `url`        VARCHAR(255) NOT NULL,        --  'tarmoq manzili',
    `position`   SMALLINT UNSIGNED,            -- maksimum 65 536 tarmoq qo'shsa bo'ladi
    `status`     BOOLEAN      DEFAULT 1        --  'yozuv holati, odatda faol'
);

INSERT INTO `social` (`name`, `icon_class`, `url`, `position`)
VALUES ('Facebook', 'fa-brands fa-facebook fa-2x', 'https://www.facebook.com/mohirdevuz/?locale=uz_UZ',
        1), -- fa-2x, Font Awesome dagi icon larni 2x kattalashtirish
       ('Telegram', 'fa-brands fa-telegram fa-2x', 'https://t.me/mohirdev', 2),
       ('X (Twitter)', 'fa-brands fa-twitter fa-2x', 'https://x.com/mohirdev', 3),
       ('Behance', 'fa-brands fa-behance fa-2x', 'https://www.behance.net/gallery/158282875/MOHIRDEV', 4),
       ('Linkedin', 'fa-brands fa-linkedin fa-2x', 'https://uz.linkedin.com/company/mohirdevuz', 5),
       ('Dribble', 'fa-brands fa-dribbble fa-2x', 'https://dribbble.com/search/mohirdev', 6);

SELECT *
FROM `social`;