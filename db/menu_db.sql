/*
===============================================================================
Jadval: menu
===============================================================================

Ushbu jadval sayt menyusini saqlash uchun mo‘ljallangan.
Har bir yozuv (row) bitta menyu elementini bildiradi.

Ustunlar:
-------------------------------------------------------------------------------
id        | INTEGER | PRIMARY KEY AUTOINCREMENT
          |        | Avtomatik raqam beriladi, har bir menyuga noyob identifikator.
-------------------------------------------------------------------------------
name      | TEXT    | NOT NULL UNIQUE
          |        | Menyu nomi (masalan, "Asosiy sahifa").
          |        | UNIQUE bo‘lgani uchun takrorlanmaydi.
-------------------------------------------------------------------------------
position  | INTEGER | NOT NULL UNIQUE
          |        | Menyudagi chiqish tartibi raqami.
          |        | UNIQUE bo‘lgani uchun ikkita menyu bir xil tartibda bo‘lolmaydi.
-------------------------------------------------------------------------------
url       | TEXT    | NOT NULL UNIQUE
          |        | Menyu havolasi (link), masalan "/", "?controller=about".
          |        | Takrorlanmaydi (UNIQUE).
-------------------------------------------------------------------------------
status    | INTEGER | NOT NULL CHECK(status IN (0, 1))
          |        | Menyu holati: 1 — faol (ACTIVE), 0 — nofaol.
          |        | CHECK orqali faqat 0 yoki 1 qabul qilinadi.

===============================================================================
Boshlang‘ich ma’lumotlar (INSERT)
===============================================================================
INSERT INTO `menu` (`name`, `position`, `url`, `status`)
VALUES
    ('Asosiy sahifa', 1, '/', 1),                  -- Bosh sahifa, faol
    ('Biz haqimizda', 2, '?controller=about', 1), -- Biz haqimizda sahifasi, faol
    ('Yangiliklar', 3, '?controller=all_news', 1),-- Yangiliklar sahifasi, faol
    ('Yangilik tafsilotlari', 4, 'news-details.php', 0), -- Tafsilotlar, nofaol
    ("Biz bilan bog'lanish", 5, '?controller=contact', 1); -- Kontakt, faol

===============================================================================
Tavsiyalar
===============================================================================
1. UNIQUE cheklovlar bilan takroriy yozuvlar oldini olish.
2. status ustunini 0 yoki 1 bilan ishlatish, PHP checkbox bilan mos.
3. position ustuni UNIQUE, shunda menyu tartibi aniq bo‘ladi.
===============================================================================
*/


-- Active: 1762165928902@@127.0.0.1@3306
-- DROP TABLE IF EXISTS `menu`; -- jadvalni o'chirish
--  Menyu jadvali

-- DROP TABLE `menu`;

CREATE TABLE IF NOT EXISTS `menu`
(
    `id`       INTEGER PRIMARY KEY AUTOINCREMENT,
    `name`     TEXT    NOT NULL,
    `position` INTEGER NOT NULL,
    `url`      TEXT    NOT NULL,
    `status`   INTEGER NOT NULL CHECK (`status` IN (0, 1))
);

INSERT INTO `menu` (`name`, `position`, `url`, `status`)
VALUES ('Asosiy sahifa', 1, '/', 1),
       ('Biz haqimizda', 2, '?controller=about', 1),
       ('Yangiliklar', 3, '?controller=all_news', 1),
       ('Yangilik tafsilotlari', 4, 'news-details.php', 0),
       ("Biz bilan bog'lanish", 5, '?controller=contact', 1);


