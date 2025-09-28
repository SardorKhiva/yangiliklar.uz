<?php

require_once __DIR__ . '/../../config/CONSTANTS.php';  // asosiy constantalar
require_once MAIN_CONTROLLER;                          // asosiy controller
require_once SQLITE_PDO_CONN;                          // sqlite ga ulanish
global $getMenuItems;                                  // shu faylni o'zida massivni olish, boshqa sahifalar orqali kirilganda bu qator shart emas!

// bazadagi title ni olib $currentPage ga o'zlashitirish uchun pastdagi ishlar bajariladi,
// baza orqali menu ni o'zgartirsa bo'ladi
$currentFile = basename($_SERVER['PHP_SELF']); // fayl nomi

// getMenuItems massivini tekshirish
$pageItem = array_filter($getMenuItems, function ($item) use ($currentFile) {
    return ltrim($item['url'], '/') === $currentFile;
});
$pageItem = reset($pageItem);
$currentPage = !empty($pageItem['name']) ? $pageItem['name'] : SITE_NAME;
?>

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/<?= $currentFile ?> >"><h2>Stand Blog<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php if (!empty($getMenuItems)): ?>
                        <?php foreach ($getMenuItems as $menuItem): ?>

                            <li class="nav-item <?= ($menuItem['name'] === $currentPage) ? 'active' : '' ?> ">
                                <a class="nav-link" href="<?= $menuItem['url'] ?>"> <?= $menuItem['name'] ?>
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>


                            <!--                    <li class="nav-item -->
                            <?php //= $currentPage === 'Biz haqimizda' ? 'active' : '' ?><!--">-->
                            <!--                        <a class="nav-link" href="../about.php">About Us</a>-->
                            <!--                    </li>-->
                            <!--                    <li class="nav-item -->
                            <?php //= $currentPage === 'Yangiliklar' ? 'active' : '' ?><!-- ">-->
                            <!--                        <a class="nav-link" href="../news.php">Blog Entries</a>-->
                            <!--                    </li>-->
                            <!--                    <li class="nav-item -->
                            <?php //= $currentPage === 'Yangilik tafsilotlari' ? 'active' : '' ?><!--">-->
                            <!--                        <a class="nav-link" href="../news-details.php">Post Details</a>-->
                            <!--                    </li>-->
                            <!--                    <li class="nav-item -->
                            <?php //= $currentPage === 'Biz bilan aloqa' ? 'active' : '' ?><!-- ">-->
                            <!--                        <a class="nav-link" href="../contact.php">Contact Us</a>-->
                            <!--                    </li>-->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>