<?php
/**
 * @var $newsItem - yangilik massivi
 * @var $menus - menudagi barcha ma'lumotlar, nomi va sahifa sarlavhasi ham
 */
?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
          rel="stylesheet">

    <!-- Dinamik title $menus massivida menu ma'lumotlari bor, sahifa sarlavhasi ham dinamik o'zgaradi  -->
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);

    if ($_GET['controller'] !== 'news_view') {
//    if (($_SERVER['REQUEST_URI']) === '/') {  // 1-usulda index sahifani olish
        if (($_GET['controller']) === NULL) {     // 2-usulda
            $currentPage = SITE_NAME . ' - ' . $menus[0]['name'];
        } elseif ($_GET['controller'] === 'about') {
            $currentPage = SITE_NAME . ' - ' . $menus[1]['name']; // 'Biz haqimizda';
        } elseif ($_GET['controller'] === 'all_news') {
            $currentPage = SITE_NAME . ' - ' . $menus[2]['name'];
        } elseif ($_GET['controller'] === 'contact') {
            $currentPage = SITE_NAME . ' - ' . $menus[3]['name'];
        }
    } else {
        if (!empty($newsItem)) {
            $currentPage = htmlspecialchars($newsItem['sarlavha'], ENT_QUOTES, 'UTF-8');
        }
    }

    ?>
    <title><?= $currentPage ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger" id="errorAlert">
            <?= $_SESSION['error']; ?>
        </div>

        <?php // 3 soniyadan keyin o'chadigan JS alert   ?>

        <script>
            setTimeout(() => {
                document.getElementById('errorAlert').remove();
            }, 3000);
        </script>
        <?php unset($_SESSION['error']); endif; ?>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <?php // TODO: Sayt nomi shu yerda turadi                ?>
                <h2> <?= SITE_NAME ?? 'Sayt nomi'; ?> <em>.</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <?php if (!empty($menus)): ?>
                        <?php foreach ($menus as $menu): ?>

                            <li class="nav-item"> <!-- sariq rangli qilish uchun active classi kerak -->
                                <a class="nav-link" href="<?= $menu['url']; ?>">
                                    <?= $menu['name']; ?>
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>