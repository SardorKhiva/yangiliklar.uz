--  Yangilik kategoriyalari jadvali

-- DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category`
(
    `id`     INTEGER PRIMARY KEY AUTOINCREMENT,
    `name`   TEXT UNIQUE NOT NULL,
    `status` BOOLEAN DEFAULT TRUE
);

INSERT INTO `category` (`name`)
VALUES ("O'zbekiston"),
       ("Jahon"),
       ("Iqtisodiyot"),
       ("Jamiyat"),
       ("Sport"),
       ("Texnologiya"),
       ("Moliya"),
       ("Audio"),
       ("Ta'lim"),
       ("Avto"),
       ("Sog'lom hayot"),
       ("Ko'chmas mulk"),
       ("Ayollar dunyosi"),
       ("Turizm"),
       ("Biznes");
