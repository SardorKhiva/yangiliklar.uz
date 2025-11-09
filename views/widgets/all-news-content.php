<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php // SITE_NAME - const, sayt nomi; SLOGAN - const, sayt shiori?>
                            <span><?= SITE_NAME ?></span>
                            <h4> <?= SLOGAN ?> </h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a href="https://t.me/settings" target="_parent">Menga Telegramdan yozing!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">

                        <?php if (!empty($ommabopYangiliklar)): ?>
                            <?php foreach ($ommabopYangiliklar as $ommabopYangilik): ?>

                                <div class="col-lg-6">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <?php $image = getImage('news', $ommabopYangilik['news_id'], $ommabopYangilik['rasm']); ?>
                                            <a href="?controller=news_view&id=<?= $ommabopYangilik['news_id'] ?>">
                                                <img src="<?= $image; ?>" alt="<?= $ommabopYangilik['sarlavha'] ?>">
                                            </a>
                                        </div>
                                        <div class="down-content">
                                            <span> <?= $ommabopYangilik['kategoriya']; ?> </span>
                                            <a href="?controller=news_view&id=<?= $ommabopYangilik['news_id'] ?>">
                                                <h4><?= $ommabopYangilik['sarlavha']; ?> </h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#"> <?= $ommabopYangilik['muallif']; ?> </a></li>
                                                <li>
                                                    <a> <?= date('d.m.Y  |  H:i', strtotime($ommabopYangilik['yaratilgan_vaqti'])); ?> </a>
                                                </li>
                                                <li><a> <i class="fas fa-eye"></i>
                                                        Ko'rildi: <?= $ommabopYangilik['kurishlar_soni']; ?> </a></li>
                                            </ul>
                                            <a href="?controller=news_view&id=<?= htmlspecialchars($ommabopYangilik['news_id']); ?>">
                                                <p> <?= $ommabopYangilik['qisqa_tavsif'] ?> </p>
                                            </a>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            <li><a href="#">Best Templates</a>,</li>
                                                            <li><a href="#">TemplateMo</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-lg-12">
                                <p>Hozircha yangiliklar yo'q.</p>
                            </div>
                        <?php endif; ?>


                        <div class="col-lg-12">
                            <?php if (isset($totalPages) && $totalPages > 1):
                                $controller = $_GET['controller'] ?? '';
                                $baseUrl = $controller ? "?controller=$controller" : '?';
                                // Int ga cast qilish
                                $currentPageInt = (int)$currentPage;
                                $totalPagesInt = (int)$totalPages;
                                ?>
                                <ul class="page-numbers">
                                    <!-- Oldingi sahifa tugmasi -->
                                    <?php if ($currentPageInt > 1): ?>
                                        <li>
                                            <a href="<?= $baseUrl ?>&page=<?= ($currentPageInt - 1) ?>">
                                                <i class="fa fa-angle-double-left"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php
                                    // Ko'p sahifalar bo'lsa, faqat keraklilarini ko'rsatish
                                    $start = max(1, $currentPageInt - 2);
                                    $end = min($totalPagesInt, $currentPageInt + 2);

                                    // Birinchi sahifa
                                    if ($start > 1): ?>
                                        <li><a href="<?= $baseUrl ?>&page=1">1</a></li>
                                        <?php if ($start > 2): ?>
                                            <li class="disabled"><span>...</span></li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <!-- Asosiy sahifalar -->
                                    <?php for ($i = $start; $i <= $end; $i++): ?>
                                        <li <?= $i == $currentPageInt ? 'class="active"' : '' ?>>
                                            <a href="<?= $baseUrl ?>&page=<?= $i ?>"><?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <?php
                                    // Oxirgi sahifa
                                    if ($end < $totalPagesInt): ?>
                                        <?php if ($end < $totalPagesInt - 1): ?>
                                            <li class="disabled"><span>...</span></li>
                                        <?php endif; ?>
                                        <li><a href="<?= $baseUrl ?>&page=<?= $totalPagesInt ?>"><?= $totalPagesInt ?></a></li>
                                    <?php endif; ?>

                                    <!-- Keyingi sahifa tugmasi -->
                                    <?php if ($currentPageInt < $totalPagesInt): ?>
                                        <li>
                                            <a href="<?= $baseUrl ?>&page=<?= ($currentPageInt + 1) ?>">
                                                <i class="fa fa-angle-double-right"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <?php require_once __DIR__ . '/sidebar.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>