--  Sayt yangiliklari saqlaydigan baza jadvali tuzilishi
--  va ma'lumotlari

-- DROP TABLE IF EXISTS `news`;

CREATE TABLE IF NOT EXISTS `news`
(
    `id`          INTEGER PRIMARY KEY AUTOINCREMENT,
    `author_id`   INTEGER NOT NULL,         -- yangilik muallifi
    `title`       TEXT    NOT NULL,         -- yangilik sarlavhasi
    `description` TEXT,                     -- tavsif
    `category_id` INTEGER NOT NULL,         -- kategoriya id si,
    `image`       VARCHAR(255)     DEFAULT NULL,    -- yangilik rasmi
    `body`        TEXT             DEFAULT NULL,    -- yangilik tanasi, asosiy yangilik matni
    `seen_count`  INTEGER          DEFAULT 0 CHECK ( `seen_count` >= 0 ),      -- ko'rishlar soni
    `create_at`   DATETIME         DEFAULT CURRENT_TIMESTAMP,   -- yangilik yaratilgan vaqti
    `update_at`   DATETIME         DEFAULT CURRENT_TIMESTAMP,   -- yangilangan vaqti
    `status`      BOOLEAN          DEFAULT 1                 -- holati
);

INSERT INTO `news` (author_id, title, description, category_id, image, body)
VALUES
    (1,
     "Stiv Voznyak va «SI otalari» superaqlli sun’iy intellektni taqiqlashga chaqirdi",
     "800 dan ortiq taniqli shaxs, jumladan sun’iy intellektning «otalari» va Apple hamasoschisi Stiv Voznyak superaqlli sun’iy intellektni taqiqlashga chaqirdi. Ochiq xatni siyosatchilar hamda mashhur shaxslar imzoladi.",
     6,          -- Texnologiya
     "danger_super_ai.png",
     "Sun’iy intellekt xavfsizligi bilan shug‘ullanuvchi Future of Life guruhi superaqlli sun’iy intellektni taqiqlash chaqirig‘i bilan ochiq xat e’lon qildi. Mualliflar SI vositalari salomatlik va farovonlikning ilgari ko‘rilmagan darajasi kabi afzalliklar berishi mumkinligini tan olgan holda, kompaniyalar kelasi o‘n yil ichida deyarli barcha kognitiv vazifalarda insondan ancha ustun turadigan superaqlli SI yaratishga intilayotganidan xavotir bildirdi.

         Mualliflar bunday tizimlarni xavfsiz yaratish va nazorat qilish mumkinligi haqida keng ilmiy konsensus paydo bo‘lgunicha superaqlli SI ishlab chiqishni taqiqlashni talab qildi. Shuningdek, bu kabi tizimlar paydo bo‘lishidan oldin jamoatchilikning sezilarli qo‘llab-quvvatlashi zarur, deb hisoblanadi.

Murojaatda odatda tilga olinadigan xavotirlar ham qayd etildi: SI shunday ko‘p ish o‘rinlarini egallashi mumkinki, odamlar iqtisodiy jihatdan talab qilinmay qolishi ehtimoli bor. Bunday texnologiyalar vakolatlar, erkinlik, fuqarolik huquqlari, qadr-qimmat va nazoratni yo‘qotishga olib kelishi, milliy xavfsizlikka tahdid solishi mumkin. Mualliflar hatto insoniyat halokati ehtimolini ham qayd etdi.

Ochiq xatni 800 dan ortiq taniqli shaxs imzoladi, ular orasida sun’iy intellektning «otalari» Jyeffri Xinton va Yoshua Benjio, shuningdek Apple hamasoschisi Stiv Voznyak va Virgin Group asoschisi Richard Brenson bor. Qolganlar orasida — Donald Trampning sobiq bosh strategi Stiv Bennon, Qo‘shma shtablar rayosatining sobiq raisi Mayk Mullen, Glenn Bek, aktyor Jozef Gordon-Levitt, shuningdek musiqachilar Will.i.am va Grayms. Sasseks gersogi va gersoginyasi — shahzoda Garri va Megan Markl ham o‘z imzosini qo‘ydi.

Jami bo‘lib 45 mingdan ortiq kishi murojaatni qo‘llab-quvvatladi, shulardan 25 mingdan ortig‘i Ekō’ning shunga o‘xshash petitsiyasining imzolari egasi hisoblanadi.
         "),

 (1,
     "Stiv Voznyak va «SI otalari» superaqlli sun’iy intellektni taqiqlashga chaqirdi",
     "800 dan ortiq taniqli shaxs, jumladan sun’iy intellektning «otalari» va Apple hamasoschisi Stiv Voznyak superaqlli sun’iy intellektni taqiqlashga chaqirdi. Ochiq xatni siyosatchilar hamda mashhur shaxslar imzoladi.",
     6,          -- Texnologiya
        "danger_super_ai.png",
     "Sun’iy intellekt xavfsizligi bilan shug‘ullanuvchi Future of Life guruhi superaqlli sun’iy intellektni taqiqlash chaqirig‘i bilan ochiq xat e’lon qildi. Mualliflar SI vositalari salomatlik va farovonlikning ilgari ko‘rilmagan darajasi kabi afzalliklar berishi mumkinligini tan olgan holda, kompaniyalar kelasi o‘n yil ichida deyarli barcha kognitiv vazifalarda insondan ancha ustun turadigan superaqlli SI yaratishga intilayotganidan xavotir bildirdi.

Mualliflar bunday tizimlarni xavfsiz yaratish va nazorat qilish mumkinligi haqida keng ilmiy konsensus paydo bo‘lgunicha superaqlli SI ishlab chiqishni taqiqlashni talab qildi. Shuningdek, bu kabi tizimlar paydo bo‘lishidan oldin jamoatchilikning sezilarli qo‘llab-quvvatlashi zarur, deb hisoblanadi.

Murojaatda odatda tilga olinadigan xavotirlar ham qayd etildi: SI shunday ko‘p ish o‘rinlarini egallashi mumkinki, odamlar iqtisodiy jihatdan talab qilinmay qolishi ehtimoli bor. Bunday texnologiyalar vakolatlar, erkinlik, fuqarolik huquqlari, qadr-qimmat va nazoratni yo‘qotishga olib kelishi, milliy xavfsizlikka tahdid solishi mumkin. Mualliflar hatto insoniyat halokati ehtimolini ham qayd etdi.

Ochiq xatni 800 dan ortiq taniqli shaxs imzoladi, ular orasida sun’iy intellektning «otalari» Jyeffri Xinton va Yoshua Benjio, shuningdek Apple hamasoschisi Stiv Voznyak va Virgin Group asoschisi Richard Brenson bor. Qolganlar orasida — Donald Trampning sobiq bosh strategi Stiv Bennon, Qo‘shma shtablar rayosatining sobiq raisi Mayk Mullen, Glenn Bek, aktyor Jozef Gordon-Levitt, shuningdek musiqachilar Will.i.am va Grayms. Sasseks gersogi va gersoginyasi — shahzoda Garri va Megan Markl ham o‘z imzosini qo'ydi.

Jami bo‘lib 45 mingdan ortiq kishi murojaatni qo‘llab-quvvatladi, shulardan 25 mingdan ortig‘i Ekō’ning shunga o‘xshash petitsiyasining imzolari egasi hisoblanadi.
         "),

 (1,
     "Stiv Voznyak va «SI otalari» superaqlli sun’iy intellektni taqiqlashga chaqirdi",
     "800 dan ortiq taniqli shaxs, jumladan sun’iy intellektning «otalari» va Apple hamasoschisi Stiv Voznyak superaqlli sun’iy intellektni taqiqlashga chaqirdi. Ochiq xatni siyosatchilar hamda mashhur shaxslar imzoladi.",
     6,          -- Texnologiya
        "danger_super_ai.png",
     "Sun’iy intellekt xavfsizligi bilan shug‘ullanuvchi Future of Life guruhi superaqlli sun’iy intellektni taqiqlash chaqirig‘i bilan ochiq xat e’lon qildi. Mualliflar SI vositalari salomatlik va farovonlikning ilgari ko‘rilmagan darajasi kabi afzalliklar berishi mumkinligini tan olgan holda, kompaniyalar kelasi o‘n yil ichida deyarli barcha kognitiv vazifalarda insondan ancha ustun turadigan superaqlli SI yaratishga intilayotganidan xavotir bildirdi.

Mualliflar bunday tizimlarni xavfsiz yaratish va nazorat qilish mumkinligi haqida keng ilmiy konsensus paydo bo‘lgunicha superaqlli SI ishlab chiqishni taqiqlashni talab qildi. Shuningdek, bu kabi tizimlar paydo bo‘lishidan oldin jamoatchilikning sezilarli qo‘llab-quvvatlashi zarur, deb hisoblanadi.

Murojaatda odatda tilga olinadigan xavotirlar ham qayd etildi: SI shunday ko‘p ish o‘rinlarini egallashi mumkinki, odamlar iqtisodiy jihatdan talab qilinmay qolishi ehtimoli bor. Bunday texnologiyalar vakolatlar, erkinlik, fuqarolik huquqlari, qadr-qimmat va nazoratni yo‘qotishga olib kelishi, milliy xavfsizlikka tahdid solishi mumkin. Mualliflar hatto insoniyat halokati ehtimolini ham qayd etdi.

Ochiq xatni 800 dan ortiq taniqli shaxs imzoladi, ular orasida sun’iy intellektning «otalari» Jyeffri Xinton va Yoshua Benjio, shuningdek Apple hamasoschisi Stiv Voznyak va Virgin Group asoschisi Richard Brenson bor. Qolganlar orasida — Donald Trampning sobiq bosh strategi Stiv Bennon, Qo‘shma shtablar rayosatining sobiq raisi Mayk Mullen, Glenn Bek, aktyor Jozef Gordon-Levitt, shuningdek musiqachilar Will.i.am va Grayms. Sasseks gersogi va gersoginyasi — shahzoda Garri va Megan Markl ham o‘z imzosini qo'ydi.

Jami bo‘lib 45 mingdan ortiq kishi murojaatni qo‘llab-quvvatladi, shulardan 25 mingdan ortig‘i Ekō’ning shunga o‘xshash petitsiyasining imzolari egasi hisoblanadi.
         "),

 (1,
     "Stiv Voznyak va «SI otalari» superaqlli sun’iy intellektni taqiqlashga chaqirdi",
     "800 dan ortiq taniqli shaxs, jumladan sun’iy intellektning «otalari» va Apple hamasoschisi Stiv Voznyak superaqlli sun’iy intellektni taqiqlashga chaqirdi. Ochiq xatni siyosatchilar hamda mashhur shaxslar imzoladi.",
     6,          -- Texnologiya
        "danger_super_ai.png",
     "Sun’iy intellekt xavfsizligi bilan shug‘ullanuvchi Future of Life guruhi superaqlli sun’iy intellektni taqiqlash chaqirig‘i bilan ochiq xat e’lon qildi. Mualliflar SI vositalari salomatlik va farovonlikning ilgari ko‘rilmagan darajasi kabi afzalliklar berishi mumkinligini tan olgan holda, kompaniyalar kelasi o‘n yil ichida deyarli barcha kognitiv vazifalarda insondan ancha ustun turadigan superaqlli SI yaratishga intilayotganidan xavotir bildirdi.

Mualliflar bunday tizimlarni xavfsiz yaratish va nazorat qilish mumkinligi haqida keng ilmiy konsensus paydo bo‘lgunicha superaqlli SI ishlab chiqishni taqiqlashni talab qildi. Shuningdek, bu kabi tizimlar paydo bo‘lishidan oldin jamoatchilikning sezilarli qo‘llab-quvvatlashi zarur, deb hisoblanadi.

Murojaatda odatda tilga olinadigan xavotirlar ham qayd etildi: SI shunday ko‘p ish o‘rinlarini egallashi mumkinki, odamlar iqtisodiy jihatdan talab qilinmay qolishi ehtimoli bor. Bunday texnologiyalar vakolatlar, erkinlik, fuqarolik huquqlari, qadr-qimmat va nazoratni yo‘qotishga olib kelishi, milliy xavfsizlikka tahdid solishi mumkin. Mualliflar hatto insoniyat halokati ehtimolini ham qayd etdi.

Ochiq xatni 800 dan ortiq taniqli shaxs imzoladi, ular orasida sun’iy intellektning «otalari» Jyeffri Xinton va Yoshua Benjio, shuningdek Apple hamasoschisi Stiv Voznyak va Virgin Group asoschisi Richard Brenson bor. Qolganlar orasida — Donald Trampning sobiq bosh strategi Stiv Bennon, Qo‘shma shtablar rayosatining sobiq raisi Mayk Mullen, Glenn Bek, aktyor Jozef Gordon-Levitt, shuningdek musiqachilar Will.i.am va Grayms. Sasseks gersogi va gersoginyasi — shahzoda Garri va Megan Markl ham o‘z imzosini qo'ydi.

Jami bo‘lib 45 mingdan ortiq kishi murojaatni qo‘llab-quvvatladi, shulardan 25 mingdan ortig‘i Ekō’ning shunga o‘xshash petitsiyasining imzolari egasi hisoblanadi.
         "),

 (1,
     "Stiv Voznyak va «SI otalari» superaqlli sun’iy intellektni taqiqlashga chaqirdi",
     "800 dan ortiq taniqli shaxs, jumladan sun’iy intellektning «otalari» va Apple hamasoschisi Stiv Voznyak superaqlli sun’iy intellektni taqiqlashga chaqirdi. Ochiq xatni siyosatchilar hamda mashhur shaxslar imzoladi.",
     6,          -- Texnologiya
        "danger_super_ai.png",
     "Sun’iy intellekt xavfsizligi bilan shug‘ullanuvchi Future of Life guruhi superaqlli sun’iy intellektni taqiqlash chaqirig‘i bilan ochiq xat e’lon qildi. Mualliflar SI vositalari salomatlik va farovonlikning ilgari ko‘rilmagan darajasi kabi afzalliklar berishi mumkinligini tan olgan holda, kompaniyalar kelasi o‘n yil ichida deyarli barcha kognitiv vazifalarda insondan ancha ustun turadigan superaqlli SI yaratishga intilayotganidan xavotir bildirdi.

Mualliflar bunday tizimlarni xavfsiz yaratish va nazorat qilish mumkinligi haqida keng ilmiy konsensus paydo bo‘lgunicha superaqlli SI ishlab chiqishni taqiqlashni talab qildi. Shuningdek, bu kabi tizimlar paydo bo‘lishidan oldin jamoatchilikning sezilarli qo‘llab-quvvatlashi zarur, deb hisoblanadi.

Murojaatda odatda tilga olinadigan xavotirlar ham qayd etildi: SI shunday ko‘p ish o‘rinlarini egallashi mumkinki, odamlar iqtisodiy jihatdan talab qilinmay qolishi ehtimoli bor. Bunday texnologiyalar vakolatlar, erkinlik, fuqarolik huquqlari, qadr-qimmat va nazoratni yo‘qotishga olib kelishi, milliy xavfsizlikka tahdid solishi mumkin. Mualliflar hatto insoniyat halokati ehtimolini ham qayd etdi.

Ochiq xatni 800 dan ortiq taniqli shaxs imzoladi, ular orasida sun’iy intellektning «otalari» Jyeffri Xinton va Yoshua Benjio, shuningdek Apple hamasoschisi Stiv Voznyak va Virgin Group asoschisi Richard Brenson bor. Qolganlar orasida — Donald Trampning sobiq bosh strategi Stiv Bennon, Qo‘shma shtablar rayosatining sobiq raisi Mayk Mullen, Glenn Bek, aktyor Jozef Gordon-Levitt, shuningdek musiqachilar Will.i.am va Grayms. Sasseks gersogi va gersoginyasi — shahzoda Garri va Megan Markl ham o‘z imzosini qo'ydi.

Jami bo‘lib 45 mingdan ortiq kishi murojaatni qo‘llab-quvvatladi, shulardan 25 mingdan ortig‘i Ekō’ning shunga o‘xshash petitsiyasining imzolari egasi hisoblanadi.
         ");