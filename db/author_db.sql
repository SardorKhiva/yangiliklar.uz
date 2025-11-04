--  Yangiliklar mualliflari

-- DROP TABLE IF EXISTS `author`;

CREATE TABLE IF NOT EXISTS `author`
(
    `id`     INTEGER PRIMARY KEY AUTOINCREMENT,
    `name`   VARCHAR(100) NOT NULL,
    `status` BOOLEAN DEFAULT TRUE
);

INSERT INTO `author` (`name`)
VALUES ("Отабек Матназаров")
      /*
      , (""),
       (""),
       (""),
       (""),
       (""),
       (""),
       (""),
       (""),
       (""),
       (""),
       (""),
       ("")
        */
;