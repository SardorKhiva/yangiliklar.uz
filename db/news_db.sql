--  Sayt yangiliklari saqlaydigan baza jadvali tuzilishi
--  va ma'lumotlari

DROP TABLE IF EXISTS `news`;

CREATE TABLE IF NOT EXISTS `news`
(
    `id`          INTEGER PRIMARY KEY AUTOINCREMENT,
    `author_id`   INTEGER NOT NULL,
    `is_banner`   INTEGER DEFAULT 0 CHECK (is_banner IN (0, 1)), -- 0=yo'q, 1=ha
    `title`       TEXT    NOT NULL,
    `description` TEXT,
    `category_id` INTEGER NOT NULL,
    `image`       TEXT    DEFAULT NULL,
    `body`        TEXT    DEFAULT NULL,
    `seen_count`  INTEGER DEFAULT 0 CHECK (seen_count >= 0),
    `created_at`  TEXT    DEFAULT (datetime('now', '+5 hours')), -- sqlite da datetime turi yo'q
    `updated_at`  TEXT    DEFAULT (datetime('now', '+5 hours')),
    `status`      INTEGER DEFAULT 1 CHECK (status IN (0, 1))    -- 0=nofaol, 1=faol

);

INSERT INTO news (author_id, title, description, category_id, image, body, seen_count, `created_at`, `updated_at`, status)
VALUES (1,
        "Farg‘onada chiqindidan elektr energiyasi ishlab chiqaruvchi korxona qurilishiga start berildi",
        "2 noyabr kuni Farg‘ona tumanining Oqbilol qishlog‘ida qattiq maishiy chiqindilarni yoqish orqali elektr energiyasi ishlab chiqarish loyihasi doirasida korxona qurilishi boshlandi. Qiymati taxminan 150 mln dollar bo‘lgan loyiha Xitoyning China Everbright International Ltd. kompaniyasi ishtirokida amalga oshirilmoqda.",
        1,
        " ",
        "",
        0,
        '2025-11-04 06:08:31',
        '2025-11-04 06:08:31',
        1),

    (1,
     " ",
     " ",
     2,
     " ",
     " ",
     0,
     '2025-11-04 06:08:31',
     '2025-11-04 06:08:31',
     1),

    (1,
     " ",
     " ",
     3,
     " ",
     " ",
     0,
     '2025-11-04 06:08:31',
     '2025-11-04 06:08:31',
     1),

    (1,
     " ",
     " ",
     4,
     " ",
     " ",
     0,
     '2025-11-04 06:08:31',
     '2025-11-04 06:08:31',
     1),

    (1,
     " ",
     " ",
     5,
     " ",
     " ",
     0,
     '2025-11-04 06:08:31',
     '2025-11-04 06:08:31',
     1),

    (1,
     'Stiv Voznyak va «SI otalari» superaqlli sun’iy intellektni taqiqlashga chaqirdi',
 '800 dan ortiq taniqli shaxs, jumladan sun’iy intellektning «otalari» va Apple hamasoschisi Stiv Voznyak superaqlli sun’iy intellektni taqiqlashga chaqirdi. Ochiq xatni siyosatchilar hamda mashhur shaxslar imzoladi.',
        6,
     'danger_super_ai.png',
     'Sun’iy intellekt xavfsizligi bilan shug‘ullanuvchi Future of Life guruhi superaqlli sun’iy intellektni taqiqlash chaqirig‘i bilan ochiq xat e’lon qildi. Mualliflar SI vositalari salomatlik va farovonlikning ilgari ko‘rilmagan darajasi kabi afzalliklar berishi mumkinligini tan olgan holda, kompaniyalar kelasi o‘n yil ichida deyarli barcha kognitiv vazifalarda insondan ancha ustun turadigan superaqlli SI yaratishga intilayotganidan xavotir bildirdi.

Mualliflar bunday tizimlarni xavfsiz yaratish va nazorat qilish mumkinligi haqida keng ilmiy konsensus paydo bo‘lgunicha superaqlli SI ishlab chiqishni taqiqlashni talab qildi. Shuningdek, bu kabi tizimlar paydo bo‘lishidan oldin jamoatchilikning sezilarli qo‘llab-quvvatlashi zarur, deb hisoblanadi.

Murojaatda odatda tilga olinadigan xavotirlar ham qayd etildi: SI shunday ko‘p ish o‘rinlarini egallashi mumkinki, odamlar iqtisodiy jihatdan talab qilinmay qolishi ehtimoli bor. Bunday texnologiyalar vakolatlar, erkinlik, fuqarolik huquqlari, qadr-qimmat va nazoratni yo‘qotishga olib kelishi, milliy xavfsizlikka tahdid solishi mumkin. Mualliflar hatto insoniyat halokati ehtimolini ham qayd etdi.

Ochiq xatni 800 dan ortiq taniqli shaxs imzoladi, ular orasida sun’iy intellektning «otalari» Jyeffri Xinton va Yoshua Benjio, shuningdek Apple hamasoschisi Stiv Voznyak va Virgin Group asoschisi Richard Brenson bor. Qolganlar orasida — Donald Trampning sobiq bosh strategi Stiv Bennon, Qo‘shma shtablar rayosatining sobiq raisi Mayk Mullen, Glenn Bek, aktyor Jozef Gordon-Levitt, shuningdek musiqachilar Will.i.am va Grayms. Sasseks gersogi va gersoginyasi — shahzoda Garri va Megan Markl ham o‘z imzosini qo‘ydi.

Jami bo‘lib 45 mingdan ortiq kishi murojaatni qo‘llab-quvvatladi, shulardan 25 mingdan ortig‘i Ekō’ning shunga o‘xshash petitsiyasining imzolari egasi hisoblanadi.',
        0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1),

    (1,
     " ",
     " ",
     7,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1),

    (1,
     " ",
     " ",
     8,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1),

    (1,
     " ",
     " ",
     9,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1),

    (1,
     " ",
     " ",
     10,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1
     ),


    (1,
     " ",
     " ",
     11,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1),

    (1,
     " ",
     " ",
     12,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1),

    (1,
     " ",
     " ",
     13,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02', '2025-11-05 04:37:02',
     1),

    (1,
     " ",
     " ",
     14,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1),

    (1,
     " ",
     " ",
     15,
     " ",
     " ",
     0,
     '2025-11-05 04:37:02',
     '2025-11-05 04:37:02',
     1);

